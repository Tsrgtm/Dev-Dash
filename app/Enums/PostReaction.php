<?php

namespace App\Enums;

enum PostReaction: string
{
    case THUMBS_UP = 'thumbs_up';
    case HEART = 'heart';
    case LAUGH = 'laugh';
    case WOW = 'wow';
    case SAD = 'sad';
    case ANGRY = 'angry';
    case PARTY = 'party';
    case CLAP = 'clap';
    case THINKING = 'thinking';
    case CELEBRATE = 'celebrate';

    public static function values(): array
    {
        return [
            self::THUMBS_UP->value,
            self::HEART->value,
            self::LAUGH->value,
            self::WOW->value,
            self::SAD->value,
            self::ANGRY->value,
            self::PARTY->value,
            self::CLAP->value,
            self::THINKING->value,
            self::CELEBRATE->value
        ];
    }

}
