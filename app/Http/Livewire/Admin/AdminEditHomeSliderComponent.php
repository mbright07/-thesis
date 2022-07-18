<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $salary;
    public $link;
    public $image;
    public $status;
    public $newimage;
    public $slider_id;

    public function mount($slider_id)
    {
        $slider = HomeSlider::find($slider_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->salary = $slider->salary;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->slider_id = $slider->id;
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

    public function updateSlide()
    {   
        $this->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'salary' => 'required',
            'link' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'status' => 'required'
        ]);
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->salary = $this->salary;
        $slider->link = $this->link;
        if ($this->newimage) {
            $imagename = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('sliders', $imagename);
            $slider->image = $imagename;
        }
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'Slide has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.base');
    }
}
