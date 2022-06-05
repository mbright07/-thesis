<?php

namespace App\Http\Livewire\User;

use App\Models\Profile;
use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfileComponent extends Component
{

    public function render()
    {
        $userProfile = Profile::where('user_id', Auth::user()->id)->first();
        if (!$userProfile) {
            $profile = new Profile();
            $profile->user_id = Auth::user()->id;
            $profile->save();
        }
        $user = User::find(Auth::user()->id);
        $recruitments = Recruitment::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get()->take(10);
        $totalRecruitments = Recruitment::where('status', 'pending')->where('user_id', Auth::user()->id)->count();
        $totalRecruitments_processing = Recruitment::where('status', 'processing')->where('user_id', Auth::user()->id)->count();
        $totalRecruitments_canceled = Recruitment::where('status', 'canceled')->where('user_id', Auth::user()->id)->count();
        return view('livewire.user.user-profile-component', [
            'user' => $user,
            'recruitments' => $recruitments,
            'totalRecruitments' => $totalRecruitments,
            'totalRecruitments_processing' => $totalRecruitments_processing,
            'totalRecruitments_canceled' => $totalRecruitments_canceled
        ])->layout('layouts.base');
    }
}
