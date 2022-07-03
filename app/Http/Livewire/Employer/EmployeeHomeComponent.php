<?php

namespace App\Http\Livewire\Employer;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Job;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Cart;
use Livewire\Component;

class EmployeeHomeComponent extends Component
{
    public function render()
    {
        $ljobs = Job::orderBy('created_at', 'DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);
        $categories = Category::whereIn('id', $cats)->get();
        $no_of_jobs = $category->no_of_jobs;
        $top_views = User::orderBy('totalviews', 'DESC')->get()->take(8);
        foreach ($top_views as $top_view) {
            if ($top_view->workPreference) {
                $top_view->expectedLocationName = Category::whereIn('id', array_column($top_view->workPreference->toArray(), 'category_id'))->get('name');
            }
        }
        $lposts = Post::orderBy('created_at', 'DESC')->get()->take(8);

        if (Auth::check()) {
            Cart::instance('bookmark')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        return view('livewire.employer.employee-home-component', ['ljobs' => $ljobs, 'categories' => $categories, 'no_of_jobs' => $no_of_jobs, 'top_views' => $top_views, 'lposts' => $lposts])->layout('layouts.base');
    }
}
