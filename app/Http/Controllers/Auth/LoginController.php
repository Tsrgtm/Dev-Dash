<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use App\Services\ActivityLoggerService;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request, ActivityLoggerService $activityLoggerService)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check if the user has exceeded the rate limit
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 3)) {
            session()->flash('error', 'Too many attempts. Try again later after ' . RateLimiter::availableIn($this->throttleKey($request)) . ' seconds.');
            return;
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            RateLimiter::clear($this->throttleKey($request));
            $activityLoggerService->log('login', 'User logged in successfully.');
            return redirect()->intended(route('home'));
        }

        RateLimiter::hit($this->throttleKey($request), 60);

        session()->flash('error', 'Invalid credentials. Please try again.');
        return redirect()->back();
    }

    protected function throttleKey(Request $request)
    {
        return strtolower($request->email) . '|' . request()->ip();
    }
}

