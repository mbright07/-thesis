<?php

namespace App\Http\Livewire\Employer;

use App\Models\Category;
use App\Models\User;
use App\Models\Work_preference;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeeCandidatesComponent extends Component
{
    public $pagesize;

    public $search;
    public $job_cat;
    public $job_cat_id;

    public $type;

    public $selected_salary_min;
    public $selected_salary_max;
    public $max_salary;

    public function mount()
    {
        $this->pagesize = 12;

        $this->max_salary = Work_preference::query()->max('expected_salary');

        $this->selected_salary_min = 1;
        $this->selected_salary_max = $this->max_salary;

        $this->fill(request()->only('search', 'job_cat', 'job_cat_id', 'is_sub_cat'));
    }

    public function company($user_id, $user_name, $workPreference)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            Cart::instance('bookmark_candidate')->add($user_id, $user_name, 1, 0, $workPreference)->associate('App\Models\User');
            session()->flash('success_message', 'Candidate bookmark successful');
            return redirect()->route('employer.candidates.bookmark');
        }
    }

    public function render()
    {

        $candidate_ids = Work_preference::query()
            ->whereBetween('expected_salary', [$this->selected_salary_min, $this->selected_salary_max])
            ->pluck('user_id')->toArray();

        $lcandidates = User::where('users.role_id', 2)
            ->when($this->job_cat_id, function ($query) {
                $userIdList = Work_preference::query()->where('category_id', $this->job_cat_id)->pluck('user_id');
                $query->whereIn('id', $userIdList);
            })
            ->where('name', 'LIKE', '%'.trim($this->search).'%')
            ->whereIn('id', $candidate_ids)
            ->paginate($this->pagesize);

        foreach ($lcandidates as $lcandidate) {
            if ($lcandidate->workPreference) {
                foreach($lcandidate->workPreference as $item) {
                    $item->expected_location_name = Category::where('id', $item->category_id)->pluck('name')->first();
                }
            }
        }

        return view('livewire.employer.employee-candidates-component', ['lcandidates' => $lcandidates])->layout("layouts.base");
    }

}
