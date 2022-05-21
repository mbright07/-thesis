<?php

namespace App\Http\Livewire\Admin;

use App\Models\Recruitment;
use Livewire\Component;

class AdminRecruitmentDetailsComponent extends Component
{
    public $recruitment_id;
    public function mount($recruitment_id)
    {
        $this->recruitment_id = $recruitment_id;
    }

    public function render()
    {
        $recruitment = Recruitment::find($this->recruitment_id);
        return view('livewire.admin.admin-recruitment-details-component', ['recruitment' => $recruitment])->layout('layouts.base');
    }
}
