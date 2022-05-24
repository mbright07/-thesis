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
        $setting = Setting::orderBy('id', 'DESC')->first();

        $this->email =  $setting ? $setting->email : '';
        $this->phone = $setting ? $setting->phone : '';
        $this->phone2 = $setting ? $setting->phone2 : '';
        $this->address = $setting ? $setting->address : '';
        $this->map = $setting ? $setting->map : '';
        $this->twitter = $setting ? $setting->twitter : '';
        $this->facebook = $setting ? $setting->facebook : '';
        $this->pinterest = $setting ? $setting->pinterest : '';
        $this->instagram = $setting ? $setting->instagram : '';
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

        $setting = Setting::orderBy('id', 'DESC')->first();
        if (!$setting) {
            $setting = new Setting();
        }
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

    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
