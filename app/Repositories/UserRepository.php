<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    // Create new user
    public function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'avatar' => $data['avatar'] ?? null,
        ]);
    }

    public function updatePersonalInfo(User $user, array $data): bool
    {
        $user->name = $data['name'] ?? $user->name;
        $user->username = $data['username'] ?? $user->username;
        $user->email = $data['email'] ?? $user->email;
        $user->avatar = $data['avatar'] ?? $user->avatar;

        return $user->save();
    }



    // Update personal info: bio, location, avatar, branding color
    public function updateBasicInfo(User $user, array $data): bool
    {
        $user->website = $data['website'] ?? $user->website;
        $user->location = $data['location'] ?? $user->location;
        $user->bio = $data['bio'] ?? $user->bio;

        return $user->save();
    }


    // Update basic data: name, username, email, role
    public function updateSocialMedia(User $user, array $data): bool
    {
        $user->github = $data['github'] ?? $user->github;
        $user->twitter = $data['twitter'] ?? $user->twitter;
        $user->instagram = $data['instagram'] ?? $user->instagram;
        $user->linkedin = $data['linkedin'] ?? $user->linkedin;
        $user->youtube = $data['youtube'] ?? $user->youtube;

        return $user->save();
    }



    // Update social media links
    public function updateWorkAndEducation(User $user, array $data): bool
    {
        $user->job_title = $data['job_title'] ?? $user->job_title;
        $user->company = $data['company'] ?? $user->company;
        $user->education = $data['education'] ?? $user->education;

        return $user->save();
    }

    public function updateBranding(User $user, array $data): bool
    {
        $user->branding_color = $data['branding_color'] ?? $user->branding_color;
        return $user->save();
    }



    // Update password
    public function updatePassword(User $user, string $password): bool
    {
        $user->password = Hash::make($password);
        return $user->save();
    }

    // Find user by email
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }
}

