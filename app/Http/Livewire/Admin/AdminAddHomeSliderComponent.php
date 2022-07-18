<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $salary;
    public $link;
    public $image;
    public $status;

    public function mount()
    {
        $this->status = 0;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required',
            'subtitle' => 'required',
            'salary' => 'required',
            'link' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);
    }

    public function addSlide()
    {   
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'salary' => 'required',
            'link' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->salary = $this->salary;
        $slider->link = $this->link;
        $imagename = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('sliders', $imagename);
        $slider->image = $imagename;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'home slider has been created successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
