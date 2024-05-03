<?php

namespace App\Enums\Database;

enum UserEnum: string
{
    case ID = 'id';
    case NAME = 'name';
    case EMAIL = 'email';
    case EMAIL_VERIFIED_AT = 'email_verified_at';
    case PASSWORD = 'password';
    case REMEMBER_TOKEN = 'remember_token';
    case CREATED_AT = 'created_at';
    case UPDATED_AT = 'updated_at';
}
