<?php

namespace App\Http\Livewire\Employer;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Cart;
use Livewire\Component;

class EmployeeHomeComponent extends Component
{
    public function render()
    {
        $lcandidates = User::where('role_id', 2)->orderBy('created_at', 'DESC')->get()->take(8);
        foreach ($lcandidates as $lcandidate) {
            if ($lcandidate->workPreference) {
                foreach($lcandidate->workPreference as $item) {
                    $item->expected_location_name = Category::where('id', $item->category_id)->pluck('name')->first();
                }
            }
        }

        $top_views = User::where('role_id', 2)->orderBy('totalviews', 'DESC')->get()->take(8);
        foreach ($top_views as $top_view) {
            if ($top_view->workPreference) {
                foreach($top_view->workPreference as $item) {
                    $item->expected_location_name = Category::where('id', $item->category_id)->pluck('name')->first();
                }
            }
        }
        $lposts = Post::orderBy('created_at', 'DESC')->get()->take(8);

        if (Auth::check()) {
            Cart::instance('bookmark')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        return view('livewire.employer.employee-home-component', ['lcandidates' => $lcandidates, 'top_views' => $top_views, 'lposts' => $lposts])->layout('layouts.base');
    }
}
