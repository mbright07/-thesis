<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Review;
use App\Models\RecruitmentJob;

class UserReviewComponent extends Component
{
    public $recruitment_job_id;
    public $rating;
    public $comment;

    public function mount($recruitment_job_id)
    {
        $this->recruitment_job_id = $recruitment_job_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'rating' => 'required',
            'comment' => 'required'
        ]);
    }

    public function addReview()
    {
        $this->validate([
            'rating' => 'required',
            'comment' => 'required'
        ]);

        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->recruitment_job_id = $this->recruitment_job_id;
        $review->save();

        $recruitmentJob = RecruitmentJob::find($this->recruitment_job_id);
        $recruitmentJob->rstatus = true;
        $recruitmentJob->save();
        session()->flash('message', 'Your review has been added successfully!');
    }

    public function render()
    {
        $recruitmentJob = RecruitmentJob::find($this->recruitment_job_id);
        return view('livewire.user.user-review-component', ['recruitmentJob' => $recruitmentJob])->layout('layouts.base');
    }
}
