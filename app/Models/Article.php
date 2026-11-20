<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'slug', 'body', 'image'];

    // Penulis artikel
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Route model binding memakai slug, bukan id
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // $article->image_url: URL gambar, atau placeholder jika kosong
    // $article->image_url: URL gambar, atau placeholder ilustrasi DiceBear jika kosong
    protected function imageUrl(): Attribute
    {
        return Attribute::get(
            fn () => $this->image
                ?: 'https://api.dicebear.com/9.x/shapes/svg?seed=article-' . $this->id
        );
    }
}