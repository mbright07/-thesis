<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class NotificationComponent extends Component
{
    public function render()
    {
        $notifications = [];

        if (Auth::user() && in_array(Auth::user()->role_id, [1, 2, 3])) {
            $notifications = Auth::user()->notifications;
        }

        return view('livewire.notification-component', ['notifications' => $notifications])->layout('layout.base');
    }
}
