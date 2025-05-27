<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Enums\NotificationType;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendDatabaseNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userId;
    public $title;
    public $body;
    public $link;
    public $type;
    public $actionButtons;

    public function __construct($userId, $title, $body = null, $link = null, NotificationType $type, array $actionButtons = [])
    {
        $this->userId = $userId;
        $this->title = $title;
        $this->body = $body;
        $this->link = $link;
        $this->type = $type;
        $this->actionButtons = $actionButtons;
    }

    public function handle()
    {
        Notification::create([
            'user_id' => $this->userId,
            'title' => $this->title,
            'body' => $this->body,
            'link' => $this->link,
            'type' => $this->type,
            'action_buttons' => $this->actionButtons,
        ]);
    }
}

