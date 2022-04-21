<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Job;
use Livewire\WithPagination;

class AdminJobComponentnent extends Component
{
    use WithPagination;
    public function deleteJob($id)
    {
        $job = Job::find($id);
        $job->delete();
        session()->flash('message', 'Job has been deleted successfully!');
    }
    public function render()
    {
        $jobs = Job::paginate(10);
        return view('livewire.admin.admin-job-componentnent', ['jobs' => $jobs])->layout('layouts.base');
    }
}
