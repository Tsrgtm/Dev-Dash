<?php

namespace App\Services;

use App\Jobs\LogUserActivityJob;
use Illuminate\Support\Facades\Auth;

class ActivityLoggerService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Log user activity.
     *
     * @param  string  $description
     * @return void
     */
    public function log(string $activity, ?string $details = null, ?int $userId = null): void
    {
        LogUserActivityJob::dispatch($activity, $details, $userId, request()->ip() ?? 'Unknown', request()->userAgent() ?? 'Unknown');
    }

}

