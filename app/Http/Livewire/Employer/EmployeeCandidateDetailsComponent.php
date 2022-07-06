<?php

namespace App\Http\Livewire\Employer;

use App\Models\Category;
use App\Models\Job;
use App\Models\Recruitment;
use App\Models\User;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeeCandidateDetailsComponent extends Component
{

    public $user_id;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function company($user_id, $user_name)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            Cart::instance('bookmark_candidate')->add($user_id, $user_name)->associate('App\Models\User');
            session()->flash('success_message', 'Candidate bookmark successful');
            return redirect()->route('candidate.bookmark');
        }
    }

    public function render()
    {
        $user = User::where('id', $this->user_id)->first();
        $total_view = User::where('id', $this->user_id)->increment('totalviews');
        $processing = Recruitment::where('user_id', $this->user_id)->where('status', 'Processing')->first();

        $available = !$processing;

        if ($user->workPreference) {
            foreach($user->workPreference as $item) {
                $item->expected_location_name = Category::where('id', $item['category_id'])->pluck('name')->first();
            }
        }

        return view('livewire.employer.employee-candidate-details-component', [
            'user' => $user,
            'total_view' => $total_view,
            'available' => $available,
        ])->layout('layouts.base');
    }
}

