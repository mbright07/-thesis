<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class BlogComponent extends Component
{
    public function company($job_id, $job_name, $job_salary)
    {
        Cart::add($job_id, $job_name, 1, $job_salary)->associate('App\Models\Job');
        session()->flash('success_message', 'Job bookmark successful');
        return redirect()->route('job.cart');
    }

    use WithPagination;
    public function render()
    {
        $jobs = Job::paginate(12);
        return view('livewire.blog-component', ['jobs' => $jobs])->layout("layouts.base");
    }
}
