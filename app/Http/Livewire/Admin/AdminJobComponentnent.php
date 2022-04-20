<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Job;
use Livewire\WithPagination;

class AdminJobComponentnent extends Component
{
    use WithPagination;
    public function render()
    {
        $jobs = Job::paginate(10);
        return view('livewire.admin.admin-job-componentnent', ['jobs' => $jobs])->layout('layouts.base');
    }
}
