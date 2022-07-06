<?php

namespace App\Http\Livewire\Employer;

use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use App\Models\Work_preference;
use Cart;
use DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeeCandidatesComponent extends Component
{
    public $pagesize;

    public $search;
    public $job_cat;
    public $job_cat_id;

    public $type;

    public function mount()
    {
        $this->pagesize = 12;

        $this->fill(request()->only('search', 'job_cat', 'job_cat_id', 'is_sub_cat'));
    }

    public function render()
    {
        $lcandidates = User::where('users.role_id', 2)
            ->when($this->job_cat_id, function ($query) {
                $userIdList = Work_preference::query()->where('category_id', $this->job_cat_id)->pluck('user_id');
                $query->whereIn('id', $userIdList);
            })
            ->where('name', 'LIKE', '%'.trim($this->search).'%')
            ->paginate($this->pagesize);

        foreach ($lcandidates as $lcandidate) {
            if ($lcandidate->workPreference) {
                $lcandidate->expectedLocationName = Category::whereIn('id', array_column($lcandidate->workPreference->toArray(), 'category_id'))->pluck('name');
            }
        }

        if (Auth::check()) {
            Cart::instance('bookmark')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        return view('livewire.employer.employee-candidates-component', ['lcandidates' => $lcandidates])->layout("layouts.base");
    }

}
