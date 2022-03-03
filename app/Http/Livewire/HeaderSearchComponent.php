<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $search;
    public $job_cat;
    public $job_cat_id;

    public function mount()
    {
        $this->job_cat = 'All location';
        $this->fill(request()->only('search', 'job_cat', 'job_cat_id'));
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.header-search-component', ['categories' => $categories]);
    }
}
