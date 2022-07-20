<?php

namespace App\Http\Livewire\Employer;

use App\Models\Job;
use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use App\Models\User;
use App\Notifications\UpdateRecruitmentStatus;
use Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Pusher\Pusher;

class EmployeeRecruitmentComponent extends Component
{
    use WithPagination;
    public $active = null;
    public $search;
    public $sortBy = 'ASC';
    public $job_id;

    public function updateRecruitmentStatus($recruitment_id, $status)
    {
        $recruitment = Recruitment::find($recruitment_id);
        $recruitment->status = $status;
        if ($status == 'processing') {
            $recruitment->processed_date = DB::raw('CURRENT_DATE');
        } else if ($status == 'canceled') {
            $recruitment->canceled_date = DB::raw('CURRENT_DATE');
        }
        $recruitment->save();
        session()->flash('recruitment_message', 'Recruitment status has been updated successfully!');

        $user = \Illuminate\Support\Facades\Auth::user();

        $jobs = [];
        foreach ($recruitment->recruitmentJob as $recruitmentJob) {
            $job['id'] = $recruitmentJob->job->id;
            $job['name'] = $recruitmentJob->job->name;
            $jobs[] = $job;
        }

        $data = [
            'recruitment_id' => $recruitment->id,
            'status' => $recruitment->status,
            'responder_id' => $user->id,
            'responder_name' => $user->name,
            'jobs' => json_encode($jobs),
            'receiver_id' => $recruitment->user_id,
        ];

        $receiver = User::find($recruitment->user_id);
        $receiver->notify(new UpdateRecruitmentStatus($data));

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true,
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options,
        );

        $pusher->trigger('NotificationEvent', 'send-message', json_encode($data));
    }
    public function render()
    {
        $jobs = Job::where('user_id', Auth::user()->id)->get();

        $recruitments = Recruitment::
            when($this->active, function ($query) {
                $query->where('status', $this->active);
            })
            ->when(!$this->job_id, function ($query) {
                $job_ids = Job::where('user_id', Auth::user()->id)->pluck('id')->toArray();
                $recruitment_ids = RecruitmentJob::whereIn('job_id', $job_ids)->pluck('recruitment_id')->toArray();
                $query->whereIn('id', $recruitment_ids);
            })
            ->when($this->job_id, function ($query) {
                $recruitment_ids = RecruitmentJob::where('job_id', $this->job_id)->pluck('recruitment_id');
                $query->whereIn('id', $recruitment_ids);
            })
            ->search(trim($this->search))
            ->orderBy('created_at', $this->sortBy)
            ->paginate(12);

        return view('livewire.employer.employee-recruitment-component', [
            'recruitments' => $recruitments,
            'jobs' => $jobs,
        ])->layout('layouts.base');
    }
}
