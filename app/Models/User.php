<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravelista\Comments\Commenter;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens,Commenter;

    public const ADMIN = 1;
    public const STAFF = 2;
    public const USER = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name_en',
        'last_name_en',
        'first_name_bn',
        'last_name_bn',
        'image',
        'gender',
        'address',
        'bio_en',
        'types_en',
        'bio_bn',
        'types_bn',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
    /**
     * @return HasMany
     */
    public function information(): HasMany
    {
        return $this->hasMany(Information::class);
    }

    public function getUserTypeAttribute(): string
    {
        switch (auth()->user()->role) {
            case User::ADMIN:
                $type = 'admin';
                break;
            case User::STAFF:
                $type = 'staff';
                break;
            default:
                $type = 'user';
        }
        return $type;
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword(): string
    {
        return $this->attributes['password'];
    }

    protected $appends = ['name'];


    public function getNameAttribute(): string
    {
        return $this->getTitleAttribute() . ' ' . $this->attributes['first_name'.'_'.app()->getLocale()] . ' ' . $this->attributes['last_name'.'_'.app()->getLocale()];
    }

    public function getTitleAttribute(): string
    {
        return $this->attributes['gender'] == 'm' ? trans('general.mr') : trans('general.miss');
    }

}
