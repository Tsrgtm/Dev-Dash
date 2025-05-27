<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public string $type;
    public string|null $name;
    public string|null $label;

    public function __construct(string $type = 'text', string $name = null, string $label = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.input');
    }
}