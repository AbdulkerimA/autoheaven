<?php

namespace App\Livewire;

use Livewire\Component;

class NotificationWidget extends Component
{
     public $message = '';
    public $type = 'success'; // success | error | warning

    protected $listeners = [
        'notify' => 'showNotification'
    ];

    public function showNotification($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
    }
    
    public function render()
    {
        return view('livewire.notification-widget');
    }
}
