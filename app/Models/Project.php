<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'slug', 'category', 'client_name', 'is_client_private', 'thumbnail', 'gallery', 'summary', 'description', 'problem', 'solution', 'result', 'features', 'tech_stack', 'demo_url', 'repo_url', 'status', 'year', 'seo_title', 'seo_description', 'is_featured', 'is_active', 'sort_order'])]
class Project extends Model
{
    protected function casts(): array
    {
        return [
            'gallery' => 'array',
            'features' => 'array',
            'tech_stack' => 'array',
            'is_client_private' => 'boolean',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}
