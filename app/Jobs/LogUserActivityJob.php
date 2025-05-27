<?php

namespace App\Jobs;

use App\Models\UserActivity;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Auth;

class LogUserActivityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public ?int $userId;
    public string $activity;
    public ?string $details;
    public ?string $ipAddress;
    public ?string $userAgent;

    public function __construct(string $activity, ?string $details = null, ?int $userId = null, ?string $ipAddress, ?string $userAgent)
    {
        $this->userId = $userId ?? Auth::id();
        $this->activity = $activity;
        $this->details = $details;
        $this->ipAddress = $ipAddress;
        $this->userAgent = $userAgent;
    }

    public function handle(): void
    {
        UserActivity::create([
            'user_id' => $this->userId,
            'activity' => $this->activity,
            'details' => $this->details,
            'ip_address' => $this->ipAddress,
            'user_agent' => $this->userAgent,
        ]);
    }
}