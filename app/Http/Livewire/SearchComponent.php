<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class SearchComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $search;
    public $job_cat;
    public $job_cat_id;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search', 'job_cat', 'job_cat_id'));
    }

    public function company($job_id, $job_name, $job_salary)
    {
        Cart::add($job_id, $job_name, 1, $job_salary)->associate('App\Models\Job');
        session()->flash('success_message', 'Job bookmark successful');
        return redirect()->route('job.cart');
    }

    use WithPagination;
    public function render()
    {
        if ($this->sorting == 'created_at') {
            $jobs = Job::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->job_cat_id . '%')->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'regular_salary') {
            $jobs = Job::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->job_cat_id . '%')->orderBy('regular_salary', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price-desc') {
            $jobs = Job::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->job_cat_id . '%')->orderBy('regular_salary', 'DESC')->paginate($this->pagesize);
        } else {
            $jobs = Job::where('name', 'like', '%' . $this->search . '%')->where('category_id', 'like', '%' . $this->job_cat_id . '%')->paginate($this->pagesize);
        }

        $categories = Category::all();

        return view('livewire.search-component', ['jobs' => $jobs, 'categories' => $categories])->layout("layouts.base");
    }
}
