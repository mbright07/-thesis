<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\Job;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $ljobs = Job::orderBy('created_at', 'DESC')->get()->take(8);
        return view('livewire.home-component', ['sliders' => $sliders, 'ljobs' => $ljobs])->layout('layouts.base');
    }
}
