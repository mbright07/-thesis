<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use App\Models\Job;
use Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class AdminJobComponentnent extends Component
{
    use WithPagination;

    public $active = 1;
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
        return view('livewire.admin.admin-job-componentnent', [
            'categories' => Category::all(),
            'jobs' => Job::orderBy('created_at', 'ASC')->paginate(10),
            'jobs' => Job::when($this->active, function ($query) {
                $query->where('stock_status', $this->active);
            })->search(trim($this->search))
                ->orderBy('created_at', $this->sortBy)
                ->paginate(10),
            // 'jobs' => Job::with('category')->where('category_id', $this->location)
            //     ->paginate(10),
        ])->layout('layouts.base');
    }
}
