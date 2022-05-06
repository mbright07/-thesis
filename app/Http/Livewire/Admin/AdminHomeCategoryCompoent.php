<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryCompoent extends Component
{
    public $selected_categories = [];
    public $numberofjobs;

    public function mount()
    {
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',', $category->sel_categories);
        $this->numberofjobs = $category->no_of_jobs;
    }

    public function updateHomeCategory()
    {
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',', $this->selected_categories);
        $category->no_of_jobs = $this->numberofjobs;
        $category->save();
        session()->flash('message', 'HomeLocation has been updated successfully!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-compoent', ['categories' => $categories])->layout('layouts.base');
    }
}
