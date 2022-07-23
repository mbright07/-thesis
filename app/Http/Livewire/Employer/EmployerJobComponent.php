<?php

namespace App\Http\Livewire\Employer;

use App\Models\Category;
use Livewire\Component;
use App\Models\Job;
use Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class EmployerJobComponent extends Component
{
    use WithPagination;

    public $active = '';
    public $search;
    public $location = null;
    public $sortBy = 'ASC';
    public $category_id;
    public $pagesize = 10;


    public function deleteJob($id)
    {
        $job = Job::find($id);
        if ($job->image) {
            unlink('assets/images/products' . '/' . $job->image);
        }

        $job->delete();
        session()->flash('message', 'Job has been deleted successfully!');
    }

    public function render()
    {
        $jobs = Job::query()->where('user_id', Auth::user()->id)
            ->when($this->active, function ($query) {
                $query->where('stock_status', $this->active);
            })
            ->when($this->category_id, function ($query) {
                $query->where('category_id', $this->category_id);
            })
            ->search(trim($this->search))
            ->orderBy('created_at', $this->sortBy)
            ->paginate(10);
        return view(
            'livewire.employer.employer-job-component',
            [
                'categories' => Category::all(),
                'jobs' => $jobs,
            ]
        )->layout('layouts.base');
    }
}
