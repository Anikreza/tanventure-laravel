<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdSpace extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content', 'image', 'is_google', 'location'];

    protected $appends = ['formatted_name', 'formatted_content', 'image_url'];

    public function getFormattedNameAttribute(): string
    {
        return ucwords(str_replace('_', ' ', $this->attributes['name']));
    }

    public function getFormattedContentAttribute(): string
    {
        if ($this->attributes['is_google']) {
            return $this->attributes['content'];
        } else {
            $img = asset($this->attributes['content']);
            $title = $this->attributes['location'];

            return "<img class='mx-auto d-block img-fluid' src='{$img}' alt='{$title}'/>";
        }
    }

    public function getImageUrlAttribute(): ?string
    {
        if ($this->attributes['is_google']) return null;

        return asset($this->attributes['content']);
    }
}
