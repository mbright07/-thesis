<?php

namespace App\Http\Livewire\User;

use App\Models\Recruitment;
use Auth;
use Livewire\Component;
use Carbon\Carbon;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $recruitments = Recruitment::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get()->take(10);
        $totalRecruitments = Recruitment::where('status', 'pending')->where('user_id', Auth::user()->id)->count();
        $totalRecruitments_processing = Recruitment::where('status', 'processing')->where('user_id', Auth::user()->id)->count();
        $totalRecruitments_canceled = Recruitment::where('status', 'canceled')->where('user_id', Auth::user()->id)->count();
        return view(
            'livewire.user.user-dashboard-component',
            [
                'recruitments' => $recruitments,
                'totalRecruitments' => $totalRecruitments,
                'totalRecruitments_processing' => $totalRecruitments_processing,
                'totalRecruitments_canceled' => $totalRecruitments_canceled
            ]
        )->layout("layouts.base");
    }
}
