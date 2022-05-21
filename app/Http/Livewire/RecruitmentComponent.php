<?php

namespace App\Http\Livewire;

use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

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
            $recruitmentJob->salary = $job->salary;
            $recruitmentJob->save();
        }

        $this->thankyou = 1;
        Cart::instance('bookmark')->destroy();
        session()->forget('recruitment');
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
        return view('livewire.recruitment-component')->layout("layouts.base");
    }
}
