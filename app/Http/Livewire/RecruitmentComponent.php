<?php

namespace App\Http\Livewire;

use App\Mail\RecruitmentMail;
use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use Cart;
use DB;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Job;

class RecruitmentComponent extends Component
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
            $fileName = $this->file->getClientOriginalName();
            $this->file->storeAs('recruitments', $fileName);
            $recruitment->file = $fileName;
            $recruitment->status = 'pending';
            $recruitment->save();

            foreach (Cart::instance('bookmark')->content() as $job) {
                $recruitmentJob = new RecruitmentJob();
                $recruitmentJob->job_id = $job->id;
                $recruitmentJob->recruitment_id = $recruitment->id;
                $recruitmentJob->salary = $job->price;
                $recruitmentJob->save();
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }

        $this->sendRecruitmentConfirmationMail($recruitment);

        $this->thankyou = 1;
        Cart::instance('bookmark')->destroy();
        session()->forget('recruitment');
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
        return view('livewire.recruitment-component', ['top_views' => $top_views])->layout("layouts.base");
    }
}
