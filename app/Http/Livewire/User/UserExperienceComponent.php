<?php

namespace App\Http\Livewire\User;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Certification;
use App\Models\Education;
use App\Models\Language;
use App\Models\Reference;
use App\Models\Skill;
use App\Models\Work_history;
use Livewire\Component;
use App\Models\User;
use App\Models\Work_preference;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class UserExperienceComponent extends Component
{
    public $position, $company, $from_month, $to_month, $description, $work_histories, $work_history_id;
    public $subject, $school, $qualification, $edu_from_month, $edu_to_month, $achievement, $my_education, $education_id;
    public $skillname, $proficiency, $skills, $skill_id;
    public $language, $lang_proficiency, $languages, $language_id;
    public $activity_name, $activity_description, $activities, $activity_id;
    public $certification_name, $certification_description, $certifications, $certification_id;
    public $category_id, $expected_salary, $work_preferences, $work_preference_id;
    public $re_name, $re_position, $re_company, $re_email, $re_phone, $references, $reference_id;
    public $user;
    public $isOpen_work = 0;
    public $isOpen_edu = 0;
    public $isOpen_skill = 0;
    public $isOpen_lang = 0;
    public $isOpen_act = 0;
    public $isOpen_cer = 0;
    public $isOpen_pre = 0;
    public $isOpen_re = 0;
    // ------------Work History-------------//
    public function openModalWorkHistory()
    {
        $this->isOpen_work = true;
    }

    public function closeModalWorkHistory()
    {
        $this->isOpen_work = false;
    }


    public function addWorkHistory()
    {
        $this->openModalWorkHistory();
        $this->resetInputFields();
    }

    public function storeWorkHistory()
    {
        $this->validate([
            'position' => 'required',
            'company' => 'required',
            'from_month' => 'required',
            'to_month' => 'required',
            'description' => 'required',
        ]);
        Work_history::updateOrCreate(['id' => $this->work_history_id], [
            'position' => $this->position,
            'company' => $this->company,
            'from_month' => $this->from_month,
            'to_month' => $this->to_month,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
        ]);

        session()->flash(
            'message',
            $this->work_history_id ? 'Work history Updated Successfully.' : 'Work history Created Successfully.'
        );
        $this->closeModalWorkHistory();
        $this->resetInputFields();
    }

    public function editWorkHistory($id)
    {
        $work_history = Work_history::findOrFail($id);
        $this->work_history_id = $id;
        $this->position = $work_history->position;
        $this->company = $work_history->company;
        $this->from_month = $work_history->from_month;
        $this->to_month = $work_history->to_month;
        $this->description = $work_history->description;
        $this->openModalWorkHistory();
    }

    public function resetInputFields()
    {
        $this->position = '';
        $this->company = '';
        $this->from_month = '';
        $this->to_month = '';
        $this->description = '';
    }

    public function deleteWorkHistory($id)
    {
        Work_history::find($id)->delete();
        session()->flash('message', 'Work history Deleted Successfully.');
    }

    //---------------------Education------------------//
    public function openModalEdu()
    {
        $this->isOpen_edu = true;
    }

    public function closeModalEdu()
    {
        $this->isOpen_edu = false;
    }

    public function resetInputFields_edu()
    {
        $this->subject = '';
        $this->school = '';
        $this->qualification = '';
        $this->edu_from_month = '';
        $this->edu_to_month = '';
        $this->achievement = '';
    }

    public function addEducation()
    {
        $this->openModalEdu();
        $this->resetInputFields_edu();
    }

    public function storeEducation()
    {
        $this->validate([
            'subject' => 'required',
            'school' => 'required',
            'qualification' => 'required',
            'edu_from_month' => 'required',
            'edu_to_month' => 'required',
            'achievement' => 'required',
        ]);
        Education::updateOrCreate(['id' => $this->education_id], [
            'subject' => $this->subject,
            'school' => $this->school,
            'qualifications' => $this->qualification,
            'from_month' => $this->edu_from_month,
            'to_month' => $this->edu_to_month,
            'achievements' => $this->achievement,
            'user_id' => Auth::user()->id,
        ]);

        session()->flash(
            'message',
            $this->education_id ? 'Education Updated Successfully.' : 'Education Created Successfully.'
        );
        $this->closeModalEdu();
        $this->resetInputFields_edu();
    }

    public function editEducation($id)
    {
        $education = Education::findOrFail($id);
        $this->education_id = $id;
        $this->subject = $education->subject;
        $this->school = $education->school;
        $this->qualification = $education->qualifications;
        $this->edu_from_month = $education->from_month;
        $this->edu_to_month = $education->to_month;
        $this->achievement = $education->achievements;
        $this->openModalEdu();
    }

    public function deleteEducation($id)
    {
        Education::find($id)->delete();
        session()->flash('message', 'Education Deleted Successfully.');
    }

    //---------------- Skill-----------------------//
    public function openModalSkill()
    {
        $this->isOpen_skill = true;
    }

    public function closeModalSkill()
    {
        $this->isOpen_skill = false;
    }
    public function addSkill()
    {
        $this->openModalSkill();
        $this->resetInputFields_skill();
    }

    public function storeSkill()
    {
        $this->validate([
            'skillname' => 'required',
            'proficiency' => 'required',
        ]);
        Skill::updateOrCreate(['id' => $this->skill_id], [
            'skill_name' => $this->skillname,
            'proficiency' => $this->proficiency,
            'user_id' => Auth::user()->id,
        ]);

        session()->flash(
            'message',
            $this->skill_id ? 'Skill Updated Successfully.' : 'Skill Created Successfully.'
        );
        $this->closeModalSkill();
        $this->resetInputFields_skill();
    }

    public function editSkill($id)
    {
        $skill = Skill::findOrFail($id);
        $this->skill_id = $id;
        $this->skillname = $skill->skill_name;
        $this->proficiency = $skill->proficiency;
        $this->openModalSkill();
    }

    public function resetInputFields_skill()
    {
        $this->skillname = '';
        $this->proficiency = '';
    }

    public function deleteSkill($id)
    {
        Skill::find($id)->delete();
        session()->flash('message', 'Skill Deleted Successfully.');
    }

    //-----------------Language------------------------//
    public function openModalLang()
    {
        $this->isOpen_lang = true;
    }

    public function closeModalLang()
    {
        $this->isOpen_lang = false;
    }
    public function addLanguage()
    {
        $this->openModalLang();
        $this->resetInputFields_lang();
    }

    public function storeLanguage()
    {
        $this->validate([
            'language' => 'required',
            'lang_proficiency' => 'required',
        ]);
        Language::updateOrCreate(['id' => $this->language_id], [
            'language' => $this->language,
            'proficiency' => $this->lang_proficiency,
            'user_id' => Auth::user()->id,
        ]);

        session()->flash(
            'message',
            $this->language_id ? 'Language Updated Successfully.' : 'Language Created Successfully.'
        );
        $this->closeModalLang();
        $this->resetInputFields_lang();
    }

    public function editLanguage($id)
    {
        $language = Language::findOrFail($id);
        $this->language_id = $id;
        $this->language = $language->language;
        $this->lang_proficiency = $language->proficiency;
        $this->openModalLang();
    }

    public function resetInputFields_lang()
    {
        $this->language = '';
        $this->lang_proficiency = '';
    }

    public function deleteLanguage($id)
    {
        Language::find($id)->delete();
        session()->flash('message', 'Language Deleted Successfully.');
    }

    //-----------------------Activity-------------------------//
    public function openModalAct()
    {
        $this->isOpen_act = true;
    }

    public function closeModalAct()
    {
        $this->isOpen_act = false;
    }
    public function addActivity()
    {
        $this->openModalAct();
        $this->resetInputFields_act();
    }

    public function storeActivity()
    {
        $this->validate([
            'activity_name' => 'required',
            'activity_description' => 'required',
        ]);
        Activity::updateOrCreate(['id' => $this->activity_id], [
            'activity_name' => $this->activity_name,
            'description' => $this->activity_description,
            'user_id' => Auth::user()->id,
        ]);

        session()->flash(
            'message',
            $this->activity_id ? 'Activity Updated Successfully.' : 'Activity Created Successfully.'
        );
        $this->closeModalAct();
        $this->resetInputFields_act();
    }

    public function editActivity($id)
    {
        $activity = Activity::findOrFail($id);
        $this->activity_id = $id;
        $this->activity_name = $activity->activity_name;
        $this->activity_description = $activity->description;
        $this->openModalAct();
    }

    public function resetInputFields_act()
    {
        $this->activity_name = '';
        $this->activity_description = '';
    }

    public function deleteActivity($id)
    {
        Activity::find($id)->delete();
        session()->flash('message', 'Activity Deleted Successfully.');
    }

    //----------------------Certifications---------------//
    public function openModalCer()
    {
        $this->isOpen_cer = true;
    }

    public function closeModalCer()
    {
        $this->isOpen_cer = false;
    }
    public function addCertification()
    {
        $this->openModalCer();
        $this->resetInputFields_cer();
    }

    public function storeCertification()
    {
        $this->validate([
            'certification_name' => 'required',
            'certification_description' => 'required',
        ]);
        Certification::updateOrCreate(['id' => $this->certification_id], [
            'certification_name' => $this->certification_name,
            'description' => $this->certification_description,
            'user_id' => Auth::user()->id,
        ]);

        session()->flash(
            'message',
            $this->certification_id ? 'Certification Updated Successfully.' : 'Certification Created Successfully.'
        );
        $this->closeModalCer();
        $this->resetInputFields_cer();
    }

    public function editCertification($id)
    {
        $certification = Certification::findOrFail($id);
        $this->certification_id = $id;
        $this->certification_name = $certification->certification_name;
        $this->certification_description = $certification->description;
        $this->openModalCer();
    }

    public function resetInputFields_cer()
    {
        $this->certification_name = '';
        $this->certification_description = '';
    }

    public function deleteCertification($id)
    {
        Certification::find($id)->delete();
        session()->flash('message', 'Activity Deleted Successfully.');
    }

    //--------------------Work Preference----------------------//
    public function openModalPre()
    {
        $this->isOpen_pre = true;
    }

    public function closeModalPre()
    {
        $this->isOpen_pre = false;
    }
    public function addWorkPreference()
    {
        $this->openModalPre();
        $this->resetInputFields_pre();
    }

    public function storeWorkPreference()
    {
        $str_validate = $this->work_preference_id ? [
            'category_id' => ['required', 'unique:work_preferences,category_id,'.$this->work_preference_id.',id,user_id,'.Auth::user()->id],
        ] : [
            'category_id' => ['required', 'unique:work_preferences,category_id,'.$this->category_id.',id,user_id,'.Auth::user()->id],
        ];
        $str_validate['expected_salary'] = 'required|numeric';
        $this->validate($str_validate);
        Work_preference::updateOrCreate(['id' => $this->work_preference_id], [
            'category_id' => $this->category_id,
            'expected_salary' => $this->expected_salary,
            'user_id' => Auth::user()->id,
        ]);

        session()->flash(
            'message',
            $this->work_preference_id ? 'Work Preference Updated Successfully.' : 'Work Preference Created Successfully.'
        );
        $this->closeModalPre();
        $this->resetInputFields_pre();
    }

    public function editWorkPreference($id)
    {
        $work_preference = Work_preference::findOrFail($id);
        $this->work_preference_id = $id;
        $this->category_id = $work_preference->category_id;
        $this->expected_salary = $work_preference->expected_salary;
        $this->openModalPre();
    }

    public function resetInputFields_pre()
    {
        $this->category_id = '';
        $this->expected_salary = '';
    }

    public function deleteWorkPreference($id)
    {
        Work_preference::find($id)->delete();
        session()->flash('message', 'Work Preference Deleted Successfully.');
    }

    //---------------------Reference------------------------------//
    public function openModalRe()
    {
        $this->isOpen_re = true;
    }

    public function closeModalRe()
    {
        $this->isOpen_re = false;
    }


    public function addReference()
    {
        $this->openModalRe();
        $this->resetInputFields_re();
    }

    public function storeReference()
    {
        $this->validate([
            're_name' => 'required',
            're_email' => 'required|email',
            're_position' => 'required',
            're_company' => 'required',
            're_phone' => 'required|numeric',
        ]);
        Reference::updateOrCreate(['id' => $this->reference_id], [
            'name' => $this->re_name,
            'position' => $this->re_position,
            'company' => $this->re_company,
            'email' => $this->re_email,
            'phone' => $this->re_phone,
            'user_id' => Auth::user()->id,
        ]);

        session()->flash(
            'message',
            $this->reference_id ? 'Reference Updated Successfully.' : 'Reference Created Successfully.'
        );
        $this->closeModalRe();
        $this->resetInputFields_re();
    }

    public function editReference($id)
    {
        $reference = Reference::findOrFail($id);
        $this->reference_id = $id;
        $this->re_name = $reference->name;
        $this->re_position = $reference->position;
        $this->re_company = $reference->company;
        $this->re_phone = $reference->phone;
        $this->re_email = $reference->email;
        $this->openModalRe();
    }

    public function resetInputFields_re()
    {
        $this->re_name = '';
        $this->re_position = '';
        $this->re_company = '';
        $this->re_phone = '';
        $this->re_email = '';
    }

    public function deleteReference($id)
    {
        Reference::find($id)->delete();
        session()->flash('message', 'Reference Deleted Successfully.');
    }

    //---------------------Download------------------------------//
    public function download()
    {
        $work_histories = Work_history::all();
        $my_education = Education::all();
        $skills = Skill::all();
        $languages = Language::all();
        $activities = Activity::all();
        $certifications = Certification::all();
        $work_preferences = Work_preference::all();
        foreach ($work_preferences as $work_preference) {
            $work_preference->expected_location = Category::where('id', $work_preference->category_id)->get('name');
        }
        $references = Reference::all();
        $categories = Category::all();
        $users = User::find(Auth::user()->id);
        $pdf = PDF::loadView('livewire.user.user-resume-component', [
            'categories' => $categories,
            'users' => $users,
            'work_histories' => $work_histories,
            'my_education' => $my_education,
            'skills' => $skills,
            'languages' => $languages,
            'activities' => $activities,
            'certifications' => $certifications,
            'work_preferences' => $work_preferences,
            'references' => $references,
        ]);
        return $pdf->stream();
    }

    public function render()
    {
        $this->work_histories = Work_history::all();
        $this->my_education = Education::all();
        $this->skills = Skill::all();
        $this->languages = Language::all();
        $this->activities = Activity::all();
        $this->certifications = Certification::all();
        $this->work_preferences = Work_preference::all();
        foreach ($this->work_preferences as $work_preference) {
            $work_preference->expected_location = Category::where('id', $work_preference->category_id)->get('name')->get(0);
        }
        $this->references = Reference::all();
        $categories = Category::all();
        $users = User::find(Auth::user()->id);
        //$profiles = $users->profile;
        //$this->download();
        return view('livewire.user.user-experience-component', ['categories' => $categories, 'users' => $users])->layout('layouts.base');
    }
}
