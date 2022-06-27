<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class BlogComponent extends Component
{
    public $category;
    public $sorting;
    public $pagesize;

    public $min_salary;
    public $max_salary;

    public $popular_jobs;

    public function mount()
    {
        $this->category = 'default';
        $this->sorting = "default";
        $this->pagesize = 12;

        $this->min_salary = 1;
        $this->max_salary = 1000;

        $this->popular_jobs = Job::orderBy('totalviews', 'desc')->limit(12)->get();
    }

    public function company($job_id, $job_name, $job_salary)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            Cart::instance('bookmark')->add($job_id, $job_name, 1, $job_salary)->associate('App\Models\Job');
            session()->flash('success_message', 'Job bookmark successful');
            return redirect()->route('job.bookmark');
        }
    }

    public function addToWishList($job_id, $job_name, $job_salary)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else {
            Cart::instance('wishlist')->add($job_id, $job_name, 1, $job_salary)->associate('App\Models\Job');
            $this->emitTo('wishlist-count-component', 'refreshComponent');
        }
    }

    public function removeFromWishlist($job_id)
    {
        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $job_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            }
        }
    }

    public function Recruitment()
    {
        if (Auth::check()) {
            return redirect()->route('recruitment');
        } else {
            return redirect()->route('login');
        }
    }

    use WithPagination;
    public function render()
    {
        if ($this->sorting == 'created_at') {
            $this->popular_jobs = Job::orderBy('totalviews', 'desc')->limit(1)->get();
            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'regular_salary') {
            $this->popular_jobs = Job::orderBy('totalviews', 'desc')->limit(2)->get();
            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->orderBy('regular_salary', 'ASC')->paginate($this->pagesize);
        } else if ($this->sorting == 'regular_salary-desc') {
            $this->popular_jobs = Job::orderBy('totalviews', 'desc')->limit(3)->get();
            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->orderBy('regular_salary', 'DESC')->paginate($this->pagesize);
        } else {
            $this->popular_jobs = Job::orderBy('totalviews', 'desc')->limit(12)->get();
            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->paginate($this->pagesize);
        }

//        dump($this->sorting . '  ' . $jobs[1]['id']);

        $categories = Category::all();

        if (Auth::check()) {
            Cart::instance('bookmark')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        return view('livewire.blog-component', ['jobs' => $jobs, 'categories' => $categories])->layout("layouts.base");
    }

//    public function updatedSorting()
//    {
//        if ($this->sorting == 'created_at') {
//            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
//        } else if ($this->sorting == 'regular_salary') {
//            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->orderBy('regular_salary', 'ASC')->paginate($this->pagesize);
//        } else if ($this->sorting == 'regular_salary-desc') {
//            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->orderBy('regular_salary', 'DESC')->paginate($this->pagesize);
//        } else {
//            $jobs = Job::whereBetween('regular_salary', [$this->min_salary, $this->max_salary])->paginate($this->pagesize);
//        }
//
//        dump($this->sorting . '  ' . $jobs[1]['id']);
//
//        $categories = Category::all();
//
//        if (Auth::check()) {
//            Cart::instance('bookmark')->store(Auth::user()->email);
//            Cart::instance('wishlist')->store(Auth::user()->email);
//        }
//
//        return view('livewire.blog-component', ['jobs' => $jobs, 'categories' => $categories])->layout("layouts.base");
//    }
}
