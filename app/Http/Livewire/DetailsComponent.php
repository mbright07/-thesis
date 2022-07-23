<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\Profile;
use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use App\Models\Review;
use App\Models\User;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\stringContains;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function company($job_id, $job_name, $job_salary)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            Cart::instance('bookmark')->add($job_id, $job_name, 1, $job_salary)->associate('App\Models\Job');
            session()->flash('success_message', 'Job bookmark successful');
            return redirect()->route('user.jobs.bookmark');
        }
    }

    public function recruitment($job_id)
    {
        if (Auth::check()) {
            $recruitment_ids = Recruitment::where('user_id', Auth::user()->id)->pluck('id');
            $recruitment_jobs = RecruitmentJob::whereIn('recruitment_id', $recruitment_ids->toArray())
                ->where('job_id', $job_id)->first();

            if ($recruitment_jobs) {
                $message = 'You have applied this job!';
                $this->dispatchBrowserEvent('jobApplied', ['message' => $message]);
            } else {
                return redirect()->route('user.recruitment.job_id', ['job_id' => $job_id]);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function deleteReview ($review_id) {
        $review = Review::find($review_id);
        $review->delete();
        session()->flash('message', 'Review has been deleted successfully!');
    }

    public function render()
    {
        $job = Job::where('slug', $this->slug)->first();

        if ($job->recruitmentJobs) {
            foreach ($job->recruitmentJobs as $recruitmentJob) {
                if ($recruitmentJob->reviews) {
                    $job->review_cnt = count($recruitmentJob->reviews->toArray());
                    $job->rating_avg = 0;
                    foreach ($recruitmentJob->reviews as $review) {
                        $job->rating_avg += $review->rating;
                    }
                    if ($job->review_cnt != 0) {
                        $job->rating_avg /= $job->review_cnt;
                    }
                }
            }
        }

        $total_view = Job::where('slug', $this->slug)->increment('totalviews');
        $popular_jobs = Job::inRandomOrder()->limit(4)->get();
        $related_jobs = Job::where('category_id', $job->category_id)->inRandomOrder()->limit(5)->get();
        $user = User::query()->where('id', $job->user_id)->first();
        return view('livewire.details-component', ['job' => $job, 'popular_jobs' => $popular_jobs, 'related_jobs' => $related_jobs, 'total_view' => $total_view, 'user' => $user])->layout('layouts.base');
    }
}
