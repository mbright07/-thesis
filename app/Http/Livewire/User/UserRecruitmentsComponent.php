<?php

namespace App\Http\Livewire\User;

use App\Models\Job;
use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use App\Models\User;
use App\Notifications\UpdateRecruitmentStatus;
use DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Pusher\Pusher;

class UserRecruitmentsComponent extends Component
{
    use WithPagination;
    public $active = null;
    public $sortBy = 'ASC';
    public $job_id;

    public function updateRecruitmentStatus($recruitment_id, $status)
    {
        $recruitment = Recruitment::find($recruitment_id);
        $recruitment->status = $status;
        if ($status == 'canceled') {
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
        foreach ($recruitment->recruitmentJob as $recruitmentJob) {
            $data = [
                'recruitment_id' => $recruitment->id,
                'status' => $recruitment->status,
                'sender_id' => $user->id,
                'sender_name' => $user->name,
                'jobs' => json_encode($jobs),
                'receiver_id' => $recruitmentJob->job->user->id,
                'type' => 'have new noti',
            ];

            $receiver = User::find($recruitmentJob->job->user->id);
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
    }

    public function render()
    {
        $totalRecruitments = Recruitment::where('status', 'pending')->where('user_id', Auth::user()->id)->count();
        $totalRecruitments_processing = Recruitment::where('status', 'processing')->where('user_id', Auth::user()->id)->count();
        $totalRecruitments_canceled = Recruitment::where('status', 'canceled')->where('user_id', Auth::user()->id)->count();
        $recruitments = Recruitment::where('user_id', Auth::user()->id)
            ->when($this->active, function ($query) {
                $query->where('status', $this->active);
            })->orderBy('created_at', $this->sortBy)
            ->paginate(12);
        return view('livewire.user.user-recruitments-component', [
            'recruitments' => $recruitments,
            'totalRecruitments' => $totalRecruitments,
            'totalRecruitments_processing' => $totalRecruitments_processing,
            'totalRecruitments_canceled' => $totalRecruitments_canceled
        ])->layout('layouts.base');
    }
}
