<?php

namespace App\Services;

use App\Enums\NotificationType;
use App\Jobs\SendDatabaseNotification;

class NotificationService
{
    public static function send($userId, $title, $body = null, $link = null, NotificationType $type, array $buttons = [])
    {
        SendDatabaseNotification::dispatch(
            userId: $userId,
            title: $title,
            body: $body,
            link: $link,
            type: $type,
            actionButtons: $buttons
        );
    }
}
