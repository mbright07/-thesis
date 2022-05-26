<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function company($job_id, $job_name, $job_salary)
    {
        Cart::add($job_id, $job_name, 1, $job_salary)->associate('App\Models\Job');
        session()->flash('success_message', 'Item added in Wishlish');
        return redirect()->route('job.bookmark');
    }

    public function render()
    {
        $job = Job::where('slug', $this->slug)->first();
        $popular_jobs = Job::inRandomOrder()->limit(4)->get();
        $related_jobs = Job::where('category_id', $job->category_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component', ['job' => $job, 'popular_jobs' => $popular_jobs, 'related_jobs' => $related_jobs])->layout('layouts.base');
    }
}
