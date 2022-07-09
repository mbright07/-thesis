<?php

namespace App\Http\Livewire\Employer;

use App\Models\Job;
use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use Auth;
use Livewire\Component;

class EmployeeRecruitmentDetailsComponent extends Component
{
    public $recruitment_id;
    public function mount($recruitment_id)
    {
        $job_ids = RecruitmentJob::where('recruitment_id', $this->recruitment_id)->pluck('job_id')->toArray();
        $job = Job::where('user_id', Auth::user()->id)->whereIn('id', $job_ids)->first();

        if (!$job) {
            abort(403);
        }

        $this->recruitment_id = $recruitment_id;
    }

    public function render()
    {
        $recruitment = Recruitment::find($this->recruitment_id);
        return view('livewire.employer.employee-recruitment-details-component', ['recruitment' => $recruitment])->layout('layouts.base');
    }
}
