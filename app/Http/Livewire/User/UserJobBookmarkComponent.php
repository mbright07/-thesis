<?php

namespace App\Http\Livewire\User;

use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;

class UserJobBookmarkComponent extends Component
{
    public function destroy($rowId)
    {
        Cart::instance('bookmark')->remove($rowId);
        session()->flash('success_message', 'Bookmark has been removed!');
    }

    public function destroyAll()
    {
        Cart::instance('bookmark')->destroy();
        session()->flash('success_message', 'All Bookmark has been removed!');
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
                return redirect()->route('recruitment.job_id', ['job_id' => $job_id]);
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function setAmountForRecruitment()
    {
        if (!Cart::instance('bookmark')->count() > 0) {
            session()->forget('recruitment');
            return;
        }
    }

    public function render()
    {
        $this->setAmountForRecruitment();

        if (Auth::check()) {
            Cart::instance('bookmark')->store(Auth::user()->email);
        }
        $top_views = Job::orderBy('totalviews', 'DESC')->get()->take(8);
        return view('livewire.user.user-job-bookmark-component', ['top_views' => $top_views])->layout("layouts.base");
    }
}
