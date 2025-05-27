<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public User $user;

    public function mount(string $username): void
    {
        $this->user = User::where('username', $username)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.user.index');
    }
}