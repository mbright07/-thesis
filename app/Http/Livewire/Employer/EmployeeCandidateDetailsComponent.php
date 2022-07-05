<?php

namespace App\Http\Livewire\Employer;

use App\Models\Job;
use App\Models\User;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeeCandidateDetailsComponent extends Component
{

    public $user_id;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function company($job_id, $job_name, $job_salary)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            Cart::instance('bookmark_candidate')->add($job_id, $job_name, 1, $job_salary)->associate('App\Models\User');
            session()->flash('success_message', 'Job bookmark successful');
            return redirect()->route('job.bookmark');
        }
    }

    public function render()
    {
        $user = User::where('id', $this->user_id)->first();
        $total_view = User::where('id', $this->user_id)->increment('totalviews');

        return view('livewire.employer.employee-candidate-details-component', ['user' => $user])->layout('layouts.base');
    }
}

