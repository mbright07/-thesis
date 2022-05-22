<?php

namespace App\Http\Livewire\Admin;

use App\Models\Recruitment;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AdminRecruitmentComponent extends Component
{
    use WithPagination;

    public function updateRecruitmentStatus($recruitment_id, $status)
    {
        $recruitment = Recruitment::find($recruitment_id);
        $recruitment->status = $status;
        if ($status == 'processing') {
            $recruitment->processed_date = DB::raw('CURRENT_DATE');
        } else if ($status == 'canceled') {
            $recruitment->canceled_date = DB::raw('CURRENT_DATE');
        }
        $recruitment->save();
        session()->flash('recruitment_message', 'Recruitment status has been updated successfully!');
    }
    public function render()
    {
        $recruitments = Recruitment::orderBy('created_at', 'DESC')->paginate(12);
        return view('livewire.admin.admin-recruitment-component', ['recruitments' => $recruitments])->layout('layouts.base');
    }
}
