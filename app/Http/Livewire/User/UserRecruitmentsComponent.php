<?php

namespace App\Http\Livewire\User;

use App\Models\Recruitment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserRecruitmentsComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $recruitments = Recruitment::where('user_id', Auth::user()->id)->paginate(12);
        return view('livewire.user.user-recruitments-component', ['recruitments' => $recruitments])->layout('layouts.base');
    }
}
