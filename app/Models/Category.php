<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_bn',
        'slug_en',
        'slug_bn',
        'excerpt',
        'keywords',
        'is_published',
        'is_video',
        'position',
        'categories',
    ];

    /**
     * @return BelongsToMany
     */
    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class, 'article_categories', 'category_id', 'article_id');
    }
}
