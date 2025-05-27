<?php

namespace App\Livewire;

use Livewire\Component;

class ShowAlerts extends Component
{
    public $message = '';
    public $type = 'light'; // Default alert type
    public $show = false;
    public $alerts = []; // Stack of alerts

    protected $listeners = ['showAlert'];

    public function showAlert($params)
    {
        // Store up to 3 alerts in the stack
        $this->alerts[] = [
            'message' => $params['message'] ?? 'New Notification',
            'type' => $params['type'] ?? 'light'
        ];

        // Keep only the latest 3 alerts
        if (count($this->alerts) > 3) {
            array_shift($this->alerts);
        }

        $this->show = true;
    }

    public function dismissAlert($index)
    {
        unset($this->alerts[$index]);
        $this->alerts = array_values($this->alerts); // Re-index array
        if (empty($this->alerts)) {
            $this->show = false;
        }
    }

    public function render()
    {
        return view('livewire.show-alerts');
    }
}
