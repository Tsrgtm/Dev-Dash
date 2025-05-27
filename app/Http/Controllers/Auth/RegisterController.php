<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\ActivityLoggerService;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request, UserService $userService, ActivityLoggerService $activityLoggerService)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'unique:users', 'regex:/^[a-z0-9_]+$/'],
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'The name is required.',
            'username.required' => 'The username is required.',
            'username.regex' => 'The username must contain only lowercase letters, numbers and underscores.',
            'email.required' => 'The email is required.',
            'email.unique' => 'The email has already been taken.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = $userService->register($data);

        auth()->login($user);

        $activityLoggerService->log('register', 'User registered successfully.');

        return redirect()->intended(route('home'));
    }


}
