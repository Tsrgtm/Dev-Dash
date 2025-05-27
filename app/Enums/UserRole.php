<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case USER = 'user';

    case PREMIUM = 'premium';

    public static function values(): array
    {
        return [
            self::ADMIN->value,
            self::USER->value,
            self::PREMIUM->value
        ];
    }
}