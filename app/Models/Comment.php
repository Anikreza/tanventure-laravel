<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'guest_name',
        'guest_email',
        'comment',
        'article_id'
    ];

    public function articles():BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

}
