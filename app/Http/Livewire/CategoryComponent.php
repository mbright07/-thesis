<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
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
        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        if ($this->sorting == 'created_at') {
            $jobs = Job::where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'regular_salary') {
            $jobs = Job::where('category_id', $category_id)->orderBy('regular_salary', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price-desc') {
            $jobs = Job::where('category_id', $category_id)->orderBy('regular_salary', 'DESC')->paginate($this->pagesize);
        } else {
            $jobs = Job::where('category_id', $category_id)->paginate($this->pagesize);
        }

        $categories = Category::all();

        return view('livewire.category-component', ['jobs' => $jobs, 'categories' => $categories, 'category_name' => $category_name])->layout("layouts.base");
    }
}
