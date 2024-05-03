<?php

namespace App\Enums\Database;

enum ArticleEnum: string
{
    case ID = 'id';
    case USER_ID = 'FK_user_id';
    case TITLE = 'title';
    case TEXT = 'text';
    case STATUS = 'status';
    case CREATED_AT = 'created_at';
    case UPDATED_AT = 'updated_at';

    case STATUS_REVIEW = 'review';
    case STATUS_DECLINED = 'declined';
    case STATUS_PUBLISHED = 'published';
}
