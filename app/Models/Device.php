<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Device extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token'
    ];

    /**
     * User Relation
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
