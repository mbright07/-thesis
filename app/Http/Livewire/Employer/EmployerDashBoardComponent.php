<?php

namespace App\Http\Livewire\Employer;

use App\Models\Recruitment;
use Carbon\Carbon;
use Livewire\Component;

class EmployerDashBoardComponent extends Component
{
    public function render()
    {
        $recruitments = Recruitment::orderBy('created_at', 'DESC')->get()->take(10);
        $totalRecruitments = Recruitment::where('status', 'pending')->count();
        $totalRecruitments_processing = Recruitment::where('status', 'processing')->count();
        $totalRecruitments_canceled = Recruitment::where('status', 'canceled')->count();
        $totalRecruitments_today = Recruitment::where('status', 'pending')->whereDate('created_at', Carbon::today())->count();
        return view('livewire.employer.employer-dashboard-component', [
            'recruitments' => $recruitments,
            'totalRecruitments' => $totalRecruitments,
            'totalRecruitments_processing' => $totalRecruitments_processing,
            'totalRecruitments_canceled' => $totalRecruitments_canceled,
            'totalRecruitments_today' => $totalRecruitments_today
        ])->layout("layouts.base");
    }
}
