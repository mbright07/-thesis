<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class BlogComponent extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
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
            $jobs = Job::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'regular_salary') {
            $jobs = Job::orderBy('regular_salary', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price-desc') {
            $jobs = Job::orderBy('regular_salary', 'DESC')->paginate($this->pagesize);
        } else {
            $jobs = Job::paginate($this->pagesize);
        }

        return view('livewire.blog-component', ['jobs' => $jobs])->layout("layouts.base");
    }
}
