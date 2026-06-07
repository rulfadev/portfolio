<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['client_review_link_id', 'project_id', 'client_name', 'client_role', 'company', 'rating', 'message', 'suggestions', 'consent_to_publish', 'ip_address', 'user_agent', 'submitted_at'])]
class ClientReview extends Model
{
    protected function casts(): array
    {
        return [
            'consent_to_publish' => 'boolean',
            'submitted_at' => 'datetime',
        ];
    }

    public function reviewLink(): BelongsTo
    {
        return $this->belongsTo(ClientReviewLink::class, 'client_review_link_id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
