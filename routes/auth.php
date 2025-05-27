<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\CheckBannedStatus;
use App\Services\ActivityLoggerService;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/signup', [RegisterController::class, 'register'])->name('register');
    Route::get('/signup', [RegisterController::class, 'index'])->name('register');

});

Route::middleware('auth')->group(function () {
    Route::post('/logout', function (ActivityLoggerService $activityLoggerService) {
        $activityLoggerService->log('logout', 'User logged out.');
        auth()->logout();
        return redirect()->intended('login');
    })->name('logout');
});

Route::get('/banned', function () {
    return view('auth.banned');
})->middleware(CheckBannedStatus::class)->name('banned.page');