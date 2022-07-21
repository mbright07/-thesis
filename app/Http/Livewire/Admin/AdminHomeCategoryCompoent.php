<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\User;
use Livewire\Component;

class AdminHomeCategoryCompoent extends Component
{
    public $selected_categories = [];
    public $numberofjobs;

    public function mount()
    {
        $company = HomeCategory::find(1);
        $this->selected_categories = explode(',', $company->sel_categories);
        $this->numberofjobs = $company->no_of_jobs;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'selected_categories' => 'required',
            'numberofjobs' => 'required'
        ]);
    }

    public function updateHomeCategory()
    {   
        $this->validate([
            'selected_categories' => 'required',
            'numberofjobs' => 'required'
        ]);
        $company = HomeCategory::find(1);
        $company->sel_categories = implode(',', $this->selected_categories);
        $company->no_of_jobs = $this->numberofjobs;
        $company->save();
        session()->flash('message', 'Company has been updated successfully!');
    }

    public function render()
    {
        $companies = User::where('users.role_id',3)->get();
        return view('livewire.admin.admin-home-category-compoent', ['companies' => $companies])->layout('layouts.base');
    }
}
