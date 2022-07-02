<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;
    public $sub_category_slug;

    public $salary_below;
    public $salary_above;

    public function mount($category_slug, $sub_category_slug = null)
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
        $this->sub_category_slug = $sub_category_slug;
    }

    public function company($job_id, $job_name, $job_salary)
    {
        Cart::add($job_id, $job_name, 1, $job_salary)->associate('App\Models\Job');
        session()->flash('success_message', 'Job bookmark successful');
        return redirect()->route('job.bookmark');
    }

    use WithPagination;
    public function render()
    {
        var_dump($this->salary_below);
        $category_id = null;
        $category_name = "";
        $filter = "";
        if ($this->sub_category_slug) {
            $sub_category = Subcategory::where('slug', $this->sub_category_slug)->first();
            $category_id = $sub_category->id;
            $category_name = $sub_category->name;
            $filter = "sub_";
        } else {
            $category = Category::where('slug', $this->category_slug)->first();
            $category_id = $category->id;
            $category_name = $category->name;
            $filter = "";
        }

        if ($this->sorting == 'created_at') {
            $jobs = Job::where($filter . 'category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'regular_salary') {
            $jobs = Job::where($filter . 'category_id', $category_id)->orderBy('regular_salary', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price-desc') {
            $jobs = Job::where($filter . 'category_id', $category_id)->orderBy('regular_salary', 'DESC')->paginate($this->pagesize);
        } else {
            $jobs = Job::where($filter . 'category_id', $category_id)->paginate($this->pagesize);
        }

        $categories = Category::all();

        return view('livewire.category-component', ['jobs' => $jobs, 'categories' => $categories, 'category_name' => $category_name])->layout("layouts.base");
    }
}
