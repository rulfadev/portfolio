<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'image', 'category_id', 'author_id', 'views'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (auth()->check()) {
                $article->user_id = auth()->id();
                $article->slug = Str::slug($article->title);
            }
        });

        static::updating(function ($article) {
            if (auth()->check()) {
                $article->user_id = auth()->id();
                $article->slug = Str::slug($article->title);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Enkripsi sebelum menyimpan ke database
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = $value ? Crypt::encryptString($value) : null;
    }

    // Dekripsi saat mengambil dari database
    public function getImageAttribute($value)
    {
        return $value ? Crypt::decryptString($value) : null;
    }

    public function incrementViews()
    {
        $this->increment('views');
    }
}
