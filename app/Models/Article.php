<?php

namespace App\Models;

use App\Enums\Database\ArticleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Article extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        ArticleEnum::TITLE->value,
        ArticleEnum::TEXT->value,
        ArticleEnum::STATUS->value,
        ArticleEnum::USER_ID->value,
    ];
}
