<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public $active = null;
    public $search;
    public $sortBy = 'ASC';

    public function deleteSlide($id)
    {
        $slider = HomeSlider::find($id);
        $slider->delete();
        session()->flash('message', 'Slide has been deleted successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-home-slider-component', [
            'sliders' => HomeSlider::orderBy('created_at', 'ASC')->paginate(10),
            'sliders' => HomeSlider::when($this->active, function ($query) {
                $query->where('status', $this->active);
            })->search(trim($this->search))
                ->orderBy('created_at', $this->sortBy)
                ->paginate(10),
        ])->layout('layouts.base');
    }
}
