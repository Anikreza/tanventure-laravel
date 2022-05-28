<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Laravelista\Comments\Commentable;

class Article extends BaseModel
{
    use HasFactory;
    use Commentable;

    protected $appends = ['image_url', 'thumb_image_url'];

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'excerpt',
        'cover_caption',
        'image',
        'image_disk', // 'default: local, option: s3, gc (google cloud), if null then external link'
        'meta_title',
        'featured',
        'read_time',
        'published',
        'is_video',
        'viewed'
    ];

    /**
     * Article Author Relation
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Article Categories Pivot Relation
     * @return BelongsToMany
     */

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_categories', 'article_id', 'category_id')->withPivot('id');
    }

    /**
     * Article Keyword pivot collection
     * @return BelongsToMany
     */
    public function keywords(): BelongsToMany
    {
        return $this->belongsToMany(Keyword::class, 'article_keywords', 'article_id', 'keyword_id')->withPivot('id');
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::disk('public')->url('articles/' . basename($this->image)) : null;
    }
    public function getThumbImageUrlAttribute(): ?string
    {
        return $this->image ? Storage::disk('public')->url('articles/' . basename($this->image)) : '';
    }

}
