<?php

namespace App\Http\Livewire\User;

use App\Models\Profile;
use App\Models\Recruitment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfileComponent extends Component
{
    use WithFileUploads;
    public $user;
    public $name;
    public $email;
    public $mobile;
    public $image;
    public $newimage;
    public $date_of_birth;
    public $intro;
    public $gender;
    public $marital_status;
    public $city;
    public $province;
    public $country;
    public $address;

    public function mount()
    {
        $user = User::find(Auth::user()->id);
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user ? $user->email : '';
        $this->mobile = $user->profile ? $user->profile->mobile : '';
        $this->image = $user->profile ? $user->profile->image : '';
        $this->date_of_birth = $user->profile ? $user->profile->date_of_birth : '';
        $this->intro = $user->profile ? $user->profile->intro : '';
        $this->gender = $user->profile ? $user->profile->gender : '';
        $this->marital_status = $user->profile ? $user->profile->marital_status : '';
        $this->city = $user->profile ? $user->profile->city : '';
        $this->province = $user->profile ? $user->profile->province : '';
        $this->country = $user->profile ? $user->profile->country : '';
        $this->address = $user->profile ? $user->profile->address : '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'date_of_birth' => 'required',
            'intro' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'address' => 'required'
        ]);
    }

    public function saveProfile()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'date_of_birth' => 'required',
            'intro' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'address' => 'required'
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        $profile = $user->profile ?? new Profile(['user_id' => $user->id]);
        $profile->mobile = $this->mobile;
        if ($this->newimage) {
            if ($this->image) {
                unlink('assets/images/profile/' . $this->image);
            }
            $imagename = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('profile', $imagename);
            $user->profile->image = $imagename;
        }

        $profile->date_of_birth = $this->date_of_birth;
        $profile->intro = $this->intro;
        $profile->gender = $this->gender;
        $profile->marital_status = $this->marital_status;
        $profile->city = $this->city;
        $profile->province = $this->province;
        $profile->country = $this->country;
        $profile->address = $this->address;
        $profile->save();
        session()->flash('message', 'Profile has been updated successfull!');
    }

    public function render()
    {
        $recruitments = Recruitment::orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->get()->take(10);
        $totalRecruitments = Recruitment::where('status', 'pending')->where('user_id', Auth::user()->id)->count();
        $totalRecruitments_processing = Recruitment::where('status', 'processing')->where('user_id', Auth::user()->id)->count();
        $totalRecruitments_canceled = Recruitment::where('status', 'canceled')->where('user_id', Auth::user()->id)->count();
        return view('livewire.user.user-profile-component', [
            'user' => $this->user,
            'recruitments' => $recruitments,
            'totalRecruitments' => $totalRecruitments,
            'totalRecruitments_processing' => $totalRecruitments_processing,
            'totalRecruitments_canceled' => $totalRecruitments_canceled
        ])->layout('layouts.base');
    }
}
