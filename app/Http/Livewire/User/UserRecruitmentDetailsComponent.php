<?php

namespace App\Http\Livewire\User;

use App\Models\Recruitment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Notifications\UpdateRecruitmentStatus;
use Pusher\Pusher;

class UserRecruitmentDetailsComponent extends Component
{
    public $recruitment_id;

    public function mount($recruitment_id)
    {
        $this->recruitment_id = $recruitment_id;
    }

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
        $recruitment = Recruitment::where('user_id', Auth::user()->id)->where('id', $this->recruitment_id)->first();
        return view('livewire.user.user-recruitment-details-component', ['recruitment' => $recruitment])->layout('layouts.base');
    }
}
