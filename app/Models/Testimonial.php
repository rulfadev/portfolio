<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'role', 'company', 'message', 'rating', 'is_anonymous', 'is_active', 'sort_order'])]
class Testimonial extends Model
{
    protected function casts(): array
    {
        return [
            'is_anonymous' => 'boolean',
            'is_active' => 'boolean',
        ];
    }
}
