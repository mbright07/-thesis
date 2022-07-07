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
        $this->recruitment_id = $recruitment_id;
    }

    public function render()
    {
        /*$job_ids = RecruitmentJob::where('recruitment_id', $this->recruitment_id)->pluck('job_id')->toArray();
        $jobs = Job::where('user_id', Auth::user()->id)->whereIn('id', $job_ids)->get();

        if (!$jobs) {
            abort(403);
        }*/

        $recruitment = Recruitment::find($this->recruitment_id);
        return view('livewire.employer.employee-recruitment-details-component', ['recruitment' => $recruitment])->layout('layouts.base');
    }
}
