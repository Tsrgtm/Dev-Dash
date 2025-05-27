<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;

class LivewireLink extends Component
{
    public string|null $title;
    public string $defaultClass = 'text-blue-600 hover:underline';

    public function __construct(string $title = null)
    {
        $this->title = $title;
    }

    public function attributesWithDefaultClasses(ComponentAttributeBag $attributes): ComponentAttributeBag
    {
        return $attributes
            ->merge(['wire:navigate' => ''])
            ->class(!$attributes->has('class') ? $this->defaultClass : '');
    }

    public function render()
    {
        return view('components.livewire-link');
    }
}

