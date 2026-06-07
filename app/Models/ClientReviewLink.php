<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable(['project_id', 'client_name', 'client_email', 'client_phone', 'token', 'is_active', 'expires_at'])]
class ClientReviewLink extends Model
{
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'expires_at' => 'datetime',
        ];
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function review(): HasOne
    {
        return $this->hasOne(ClientReview::class);
    }

    public function getReviewUrlAttribute(): string
    {
        return route('client-reviews.edit', $this->token);
    }

    public function getIsExpiredAttribute(): bool
    {
        return $this->expires_at && now()->greaterThan($this->expires_at);
    }

    public function getCanBeUsedAttribute(): bool
    {
        return $this->is_active && ! $this->is_expired;
    }
}
