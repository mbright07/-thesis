<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Job;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $ljobs = Job::orderBy('created_at', 'DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);
        $categories = Category::whereIn('id', $cats)->get();
        $no_of_jobs = $category->no_of_jobs;
        return view('livewire.home-component', ['sliders' => $sliders, 'ljobs' => $ljobs, 'categories' => $categories, 'no_of_jobs' => $no_of_jobs])->layout('layouts.base');
    }
}
