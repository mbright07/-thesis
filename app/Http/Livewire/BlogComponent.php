<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;

class BlogComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $jobs = Job::paginate(12);
        return view('livewire.blog-component', ['jobs' => $jobs])->layout("layouts.base");
    }
}
