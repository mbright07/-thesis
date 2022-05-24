<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class FooterComponent extends Component
{
    public function render()
    {
        $setting = Setting::orderBy('id', 'DESC')->first();
        return view('livewire.footer-component', ['setting' => $setting]);
    }
}
