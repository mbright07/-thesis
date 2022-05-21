<?php

namespace App\Http\Livewire\Admin;

use App\Models\Recruitment;
use Livewire\Component;
use Livewire\WithPagination;

class AdminRecruitmentComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $recruitments = Recruitment::orderBy('created_at', 'DESC')->paginate(12);
        return view('livewire.admin.admin-recruitment-component', ['recruitments' => $recruitments])->layout('layouts.base');
    }
}
