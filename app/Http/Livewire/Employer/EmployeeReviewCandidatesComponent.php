<?php

namespace App\Http\Livewire\Employer;

use App\Models\RecruitmentJob;
use App\Models\ReviewCandidate;
use Livewire\Component;

class EmployeeReviewCandidatesComponent extends Component
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

        $reviewCandidate = new ReviewCandidate();
        $reviewCandidate->rating = $this->rating;
        $reviewCandidate->comment = $this->comment;
        $reviewCandidate->recruitment_job_id = $this->recruitment_job_id;
        $reviewCandidate->save();

        $recruitmentJob = RecruitmentJob::find($this->recruitment_job_id);
        $recruitmentJob->save();
        session()->flash('message', 'Your review has been added successfully!');
    }

    public function render()
    {
        $recruitmentJob = RecruitmentJob::find($this->recruitment_job_id);
        return view('livewire.employer.employee-review-candidates-component', ['recruitmentJob' => $recruitmentJob])->layout('layouts.base');
    }
}
