<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $job = Job::where('slug', $this->slug)->first();
        $popular_jobs = Job::inRandomOrder()->limit(4)->get();
        $related_jobs = Job::where('category_id', $job->category_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component', ['job' => $job, 'popular_jobs' => $popular_jobs, 'related_jobs' => $related_jobs])->layout('layouts.base');
    }
}
