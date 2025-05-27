<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected UserRepository $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    // Create new user
    public function register(array $data): User
    {
        return $this->userRepo->create($data);
    }

    // Update personal info (avatar, name, username, email)
    public function updatePersonalInfo(User $user, array $data): bool
    {
        return $this->userRepo->updatePersonalInfo($user, $data);
    }

    // Update basic profile info (website, location, bio)
    public function updateBasicInfo(User $user, array $data): bool
    {
        return $this->userRepo->updateBasicInfo($user, $data);
    }

    // Update social media links
    public function updateSocialMedia(User $user, array $data): bool
    {
        return $this->userRepo->updateSocialMedia($user, $data);
    }

    // Update work & education
    public function updateWorkAndEducation(User $user, array $data): bool
    {
        return $this->userRepo->updateWorkAndEducation($user, $data);
    }

    // Update branding color
    public function updateBranding(User $user, array $data): bool
    {
        return $this->userRepo->updateBranding($user, $data);
    }

    // Change password
    public function changePassword(User $user, string $newPassword): bool
    {
        return $this->userRepo->updatePassword($user, $newPassword);
    }

    // Get user by email
    public function getUserByEmail(string $email): ?User
    {
        return $this->userRepo->findByEmail($email);
    }


    // Login
    public function login(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function logout()
    {
        Auth::logout();
    }
}
