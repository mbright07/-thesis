<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class BlogComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $min_salary;
    public $max_salary;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_salary = 1;
        $this->max_salary = 1000;
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
            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'regular_salary') {
            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->orderBy('regular_salary', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price-desc') {
            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->orderBy('regular_salary', 'DESC')->paginate($this->pagesize);
        } else {
            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->paginate($this->pagesize);
        }

        $categories = Category::all();

        return view('livewire.blog-component', ['jobs' => $jobs, 'categories' => $categories])->layout("layouts.base");
    }
}
