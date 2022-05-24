<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminSettingComponent extends Component
{
    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $map;
    public $twitter;
    public $facebook;
    public $instagram;
    public $pinterest;

    public function mount()
    {
        $setting = Setting::find(1);
        if ($setting) {
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->phone2 = $setting->phone2;
            $this->address = $setting->address;
            $this->map = $setting->map;
            $this->twitter = $setting->twitter;
            $this->facebook = $setting->facebook;
            $this->pinterest = $setting->pinterest;
            $this->instagram = $setting->instagram;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'pinterest' => 'required',
            'instagram' => 'required'
        ]);
    }

    public function saveSettings()
    {
        $this->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'phone2' => 'required',
            'address' => 'required',
            'map' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
            'pinterest' => 'required',
            'instagram' => 'required'
        ]);

        $setting = Setting::find(1);
        if (!$setting) {
            $setting = new Setting();
            $setting->email = $this->email;
            $setting->phone = $this->phone;
            $setting->phone2 = $this->phone2;
            $setting->address = $this->address;
            $setting->map = $this->map;
            $setting->twitter = $this->twitter;
            $setting->facebook = $this->facebook;
            $setting->pinterest = $this->pinterest;
            $setting->instagram = $this->instagram;
            $setting->save();
            session()->flash('message', 'Setting has been saved successfully!');
        }
    }

    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
