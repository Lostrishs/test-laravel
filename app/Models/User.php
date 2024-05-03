<?php

namespace App\Models;

use App\Enums\Database\ArticleEnum;
use App\Enums\Database\UserEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $with = ['articles'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        UserEnum::NAME->value,
        UserEnum::EMAIL->value,
        UserEnum::PASSWORD->value,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        UserEnum::PASSWORD->value,
        UserEnum::REMEMBER_TOKEN->value,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            UserEnum::EMAIL_VERIFIED_AT->value => 'datetime',
            UserEnum::PASSWORD->value => 'hashed',
        ];
    }

    /**
     * @return HasMany
     */
    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, ArticleEnum::USER_ID->value);
    }
}
