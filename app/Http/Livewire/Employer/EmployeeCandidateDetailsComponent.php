<?php

namespace App\Http\Livewire\Employer;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Certification;
use App\Models\Education;
use App\Models\Job;
use App\Models\Language;
use App\Models\Recruitment;
use App\Models\Reference;
use App\Models\ReviewCandidate;
use App\Models\Skill;
use App\Models\User;
use App\Models\Work_history;
use App\Models\Work_preference;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeeCandidateDetailsComponent extends Component
{

    public $user_id;

    public $work_histories;

    public $my_educations;

    public $languages;

    public $activities;

    public $skills;

    public $certifications;

    public $work_preferences;

    public $references;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
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

    public function deleteReview ($review_id) {
        $review = ReviewCandidate::find($review_id);
        $review->delete();
        session()->flash('message', 'Review has been deleted successfully!');
    }

    public function render()
    {
        $user = User::where('id', $this->user_id)->first();

        if ($user->recruitments) {
            foreach ($user->recruitments as $recruitment) {
                foreach ($recruitment->recruitmentJob as $recruitmentJob) {
                    if ($recruitmentJob->reviewCandidates) {
                        $user->review_cnt = count($recruitmentJob->reviewCandidates->toArray());
                        $user->rating_avg = 0;
                        foreach ($recruitmentJob->reviewCandidates as $review) {
                            $user->rating_avg += $review->rating;
                        }
                        if ($user->review_cnt != 0) {
                            $user->rating_avg /= $user->review_cnt;
                        }
                    }
                }
            }
        }

        $total_view = User::where('id', $this->user_id)->increment('totalviews');
        $processing = Recruitment::where('user_id', $this->user_id)->where('status', 'Processing')->first();

        $available = !$processing;

        if ($user->workPreference) {
            foreach($user->workPreference as $item) {
                $item->expected_location_name = Category::where('id', $item->category_id)->pluck('name')->first();
            }
        }

        $this->work_histories = Work_history::all();
        $this->my_educations = Education::all();
        $this->skills = Skill::all();
        $this->languages = Language::all();
        $this->activities = Activity::all();
        $this->certifications = Certification::all();
        $this->work_preferences = Work_preference::all();
        foreach ($this->work_preferences as $work_preference) {
            $work_preference->expected_location = Category::where('id', $work_preference->category_id)->get('name')->get(0);
        }
        $this->references = Reference::all();

        return view('livewire.employer.employee-candidate-details-component', [
            'user' => $user,
            'total_view' => $total_view,
            'available' => $available,
        ])->layout('layouts.base');
    }
}

