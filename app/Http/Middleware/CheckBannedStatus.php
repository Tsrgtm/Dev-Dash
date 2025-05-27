<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBannedStatus
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $isBannedPage = $request->routeIs('banned.page');

        if (!$user && !$isBannedPage) {
            return $next($request);
        }


        if (!$user && $isBannedPage) {
            return redirect()->intended(route('home'));
        }

        $isBanned = $user->is_banned;


        if ($isBanned && !$isBannedPage) {
            // Banned user trying to access other pages
            return redirect()->route('banned.page');
        }

        if (!$isBanned && $isBannedPage) {
            // Non-banned user trying to access the banned page
            return redirect()->intended(route('home'));
        }

        return $next($request);
    }
}

