<?php

namespace App\Http\Livewire\User;

use App\Models\Recruitment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserRecruitmentDetailsComponent extends Component
{
    public $recruitment_id;

    public function mount($recruitment_id)
    {
        $this->recruitment_id = $recruitment_id;
    }

    public function render()
    {
        $recruitment = Recruitment::where('user_id', Auth::user()->id)->where('id', $this->recruitment_id)->first();
        return view('livewire.user.user-recruitment-details-component', ['recruitment' => $recruitment])->layout('layouts.base');
    }
}
