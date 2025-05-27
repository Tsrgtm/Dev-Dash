<?php

namespace App\Enums;

enum NotificationType: string
{
    case FOLLOW = 'follow';
    case LIKE = 'like';
    case COMMENT = 'comment';
    case REPLY = 'reply';
    case MENTION = 'mention';
    case REACTION = 'reaction';
    case SYSTEM = 'system';
    case ALERT = 'alert';
    case ACCOUNT = 'account';
    case DEFAULT = 'default';

    public static function values(): array
    {
        return [
            self::FOLLOW->value,
            self::LIKE->value,
            self::COMMENT->value,
            self::REPLY->value,
            self::MENTION->value,
            self::REACTION->value,
            self::SYSTEM->value,
            self::ALERT->value,
            self::ACCOUNT->value,
            self::DEFAULT ->value
        ];
    }
}
