<?php

namespace App\Http\Livewire\User;

use App\Models\Job;
use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserRecruitmentsComponent extends Component
{
    use WithPagination;
    public $active = null;
    public $sortBy = 'ASC';
    public $job_id;

    public function render()
    {
        $recruitments = Recruitment::where('user_id', Auth::user()->id)
            ->when($this->active, function ($query) {
                $query->where('status', $this->active);
            })->orderBy('created_at', $this->sortBy)
            ->paginate(12);
        return view('livewire.user.user-recruitments-component', ['recruitments' => $recruitments])->layout('layouts.base');
    }
}
