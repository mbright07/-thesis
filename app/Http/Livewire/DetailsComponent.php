<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\Profile;
use App\Models\User;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function company($job_id, $job_name, $job_salary)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            Cart::instance('bookmark')->add($job_id, $job_name, 1, $job_salary)->associate('App\Models\Job');
            session()->flash('success_message', 'Job bookmark successful');
            return redirect()->route('job.bookmark');
        }
    }

    public function Recruitment()
    {
        if (Auth::check()) {
            return redirect()->route('recruitment');
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        $job = Job::where('slug', $this->slug)->first();
        $total_view = Job::where('slug', $this->slug)->increment('totalviews');
        $popular_jobs = Job::inRandomOrder()->limit(4)->get();
        $related_jobs = Job::where('category_id', $job->category_id)->inRandomOrder()->limit(5)->get();
        $user = User::query()->where('id', $job->user_id)->first();
        return view('livewire.details-component', ['job' => $job, 'popular_jobs' => $popular_jobs, 'related_jobs' => $related_jobs, 'total_view' => $total_view, 'user' => $user])->layout('layouts.base');
    }
}
