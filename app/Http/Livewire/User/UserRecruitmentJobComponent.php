<?php

namespace App\Http\Livewire\User;

use App\Mail\RecruitmentMail;
use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use App\Models\User;
use App\Notifications\NewRecruitment;
use Cart;
use DB;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Job;
use Pusher\Pusher;

class UserRecruitmentJobComponent extends Component
{
    use WithFileUploads;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $intro;
    public $city;
    public $province;
    public $country;
    public $file;

    public $thankyou;

    public $job_id;

    public function mount($job_id)
    {
        $this->job_id = $job_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'intro' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'file' => 'required'
        ]);
    }
    public function placeRecruitment()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'intro' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'file' => 'required'
        ]);

        if (Auth::check()) {
            $recruitment_ids = Recruitment::where('user_id', Auth::user()->id)->pluck('id');
            $recruitment_jobs = RecruitmentJob::whereIn('recruitment_id', $recruitment_ids->toArray())
                ->where('job_id', $this->job_id)->first();

            if ($recruitment_jobs) {
                $message = 'You have applied this job!';
                $this->dispatchBrowserEvent('jobApplied', ['message' => $message]);
            } else {
                DB::beginTransaction();
                try {
                    $recruitment = new Recruitment();
                    $recruitment->user_id = Auth::user()->id;
                    $recruitment->firstname = $this->firstname;
                    $recruitment->lastname = $this->lastname;
                    $recruitment->email = $this->email;
                    $recruitment->mobile = $this->mobile;
                    $recruitment->intro = $this->intro;
                    $recruitment->city = $this->city;
                    $recruitment->province = $this->province;
                    $recruitment->country = $this->country;
                    $fileName = Auth::user()->id . '_' . $this->job_id . '.' . $this->file->extension();
                    $this->file->storeAs('recruitments', $fileName);
                    $recruitment->file = $fileName;
                    $recruitment->status = 'pending';
                    $recruitment->save();

                    $recruitmentJob = new RecruitmentJob();
                    $recruitmentJob->job_id = $this->job_id;
                    $recruitmentJob->recruitment_id = $recruitment->id;
                    $recruitmentJob->salary = Job::where('id', $this->job_id)->pluck('regular_salary')->first();
                    $recruitmentJob->save();

                    DB::commit();

                    $this->sendRecruitmentConfirmationMail($recruitment);

                    $this->thankyou = 1;

                    if (Cart::instance('bookmark')->count() > 0) {
                        foreach (Cart::instance('bookmark')->content() as $item) {
                            if ($item->model->id == $this->job_id) {
                                Cart::instance('bookmark')->remove($item->rowId);
                            }
                        }
                    }
                    session()->forget('recruitment');

                    $user = Auth::user();

                    foreach ($recruitment->recruitmentJob as $recruitmentJob) {
                        $data = [
                            'recruitment_id' => $recruitment->id,
                            'candidate_id' => $user->id,
                            'candidate_name' => $user->name,
                            'job_id' => $recruitmentJob->job->id,
                            'job_name' => $recruitmentJob->job->name,
                            'receiver_id' => $recruitmentJob->job->user->id,
                        ];
                        $receiver = User::find($recruitmentJob->job->user->id);
                        $receiver->notify(new NewRecruitment($data));

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
                } catch (Exception $e) {
                    DB::rollBack();

                    throw new Exception($e->getMessage());
                }
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function sendRecruitmentConfirmationMail($recruitment)
    {
        Mail::to($recruitment->email)->send(new RecruitmentMail($recruitment));
    }

    public function verifyForRecruitment()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('thankyou');
        }
        // } else if (!session()->get('recruitment')) {
        //     return redirect()->route('job.bookmark');
        // }
    }
    public function render()
    {
        $this->verifyForRecruitment();
        $top_views = Job::orderBy('totalviews', 'DESC')->get()->take(8);
        return view('livewire.user.user-recruitment-job-component', ['top_views' => $top_views])->layout("layouts.base");
    }
}
