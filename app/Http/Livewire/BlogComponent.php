<?php

namespace App\Http\Livewire;

use App\Models\Job;
use App\Models\Recruitment;
use App\Models\RecruitmentJob;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class BlogComponent extends Component
{
    public $sorting;
    public $pagesize;

    public $max_salary;

    public $popular_jobs;

    public $search;
    public $job_cat;
    public $job_cat_id;
    public $is_sub_cat;

    public $type;

    public $selected_salary_min;
    public $selected_salary_max;

    public function mount()
    {
        $this->sorting = "";
        $this->pagesize = 12;

        $this->max_salary = Job::max('regular_salary');

        $this->selected_salary_min = 1;
        $this->selected_salary_max = $this->max_salary;

        $this->popular_jobs = Job::orderBy('totalviews', 'desc')->limit(10)->get();

        $this->fill(request()->only('search', 'job_cat', 'job_cat_id', 'is_sub_cat'));
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

    // public function addToWishList($job_id, $job_name, $job_salary)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login');
    //     } else {
    //         Cart::instance('wishlist')->add($job_id, $job_name, 1, $job_salary)->associate('App\Models\Job');
    //         $this->emitTo('wishlist-count-component', 'refreshComponent');
    //     }
    // }

    // public function removeFromWishlist($job_id)
    // {
    //     foreach (Cart::instance('wishlist')->content() as $witem) {
    //         if ($witem->id == $job_id) {
    //             Cart::instance('wishlist')->remove($witem->rowId);
    //             $this->emitTo('wishlist-count-component', 'refreshComponent');
    //             return;
    //         }
    //     }
    // }

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

    use WithPagination;
    public function render()
    {
        $this->popular_jobs = Job::orderBy('totalviews', 'desc')->limit(10)->get();

        $jobs = Job::query()
            ->when($this->is_sub_cat, function ($query) {
                $query->where('sub_category_id', $this->job_cat_id);
            })
            ->when(!$this->is_sub_cat, function ($query) {
                if ($this->job_cat_id) {
                    $query->where('category_id', $this->job_cat_id);
                }
            })
            ->whereBetween('regular_salary', [$this->selected_salary_min, $this->selected_salary_max])
            ->when($this->type, function ($query) {
                $query->where('type', $this->type);
            })
            ->search(trim($this->search))
            ->when($this->sorting == 'created_at', function ($query) {
                $query->orderBy('created_at', 'DESC');
            })
            ->when($this->sorting == 'created_at', function ($query) {
                $query->orderBy('created_at', 'DESC');
            })
            ->when($this->sorting == 'regular_salary', function ($query) {
                $query->orderBy('regular_salary', 'ASC');
            })
            ->when($this->sorting == 'regular_salary-desc', function ($query) {
                $query->orderBy('regular_salary', 'DESC');
            })
            ->paginate($this->pagesize);

        $categories = Category::all();

        if (Auth::check()) {
            Cart::instance('bookmark')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        return view('livewire.blog-component', ['jobs' => $jobs, 'categories' => $categories])->layout("layouts.base");
    }
}
