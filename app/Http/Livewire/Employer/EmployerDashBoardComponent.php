<?php

namespace App\Http\Livewire\Employer;

use App\Models\Job;
use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use Auth;
use Carbon\Carbon;
use Livewire\Component;

class EmployerDashBoardComponent extends Component
{
    public function render()
    {
        $job_ids = Job::where('user_id', Auth::user()->id)->pluck('id')->toArray();
        $recruitment_ids = RecruitmentJob::whereIn('job_id', $job_ids)->pluck('recruitment_id')->toArray();

        $recruitments = Recruitment::whereIn('id', $recruitment_ids)->orderBy('created_at', 'DESC')->get()->take(10);
        $totalRecruitments = Recruitment::whereIn('id', $recruitment_ids)->where('status', 'pending')->count();
        $totalRecruitments_processing = Recruitment::whereIn('id', $recruitment_ids)->where('status', 'processing')->count();
        $totalRecruitments_canceled = Recruitment::whereIn('id', $recruitment_ids)->where('status', 'canceled')->count();
        $totalRecruitments_today = Recruitment::whereIn('id', $recruitment_ids)->where('status', 'pending')->whereDate('created_at', Carbon::today())->count();
        return view('livewire.employer.employer-dashboard-component', [
            'recruitments' => $recruitments,
            'totalRecruitments' => $totalRecruitments,
            'totalRecruitments_processing' => $totalRecruitments_processing,
            'totalRecruitments_canceled' => $totalRecruitments_canceled,
            'totalRecruitments_today' => $totalRecruitments_today
        ])->layout("layouts.base");
    }
}
