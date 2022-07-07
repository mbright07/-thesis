<?php

namespace App\Http\Livewire\Employer;

use App\Models\Category;
use App\Models\User;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeeCandidatesBookmarkComponent extends Component
{
    public function destroy($rowId)
    {
        Cart::instance('bookmark_candidate')->remove($rowId);
        session()->flash('success_message', 'Bookmark has been removed!');
    }

    public function destroyAll()
    {
        Cart::instance('bookmark_candidate')->destroy();
        session()->flash('success_message', 'All Bookmark has been removed!');
    }

    public function render()
    {
        if (Auth::check()) {
            Cart::instance('bookmark_candidate')->store(Auth::user()->email);
        }
        $top_views = User::orderBy('totalviews', 'DESC')->get()->take(8);
        foreach ($top_views as $top_view) {
            if ($top_view->workPreference) {
                foreach($top_view->workPreference as $item) {
                    $item->expected_location_name = Category::where('id', $item->category_id)->pluck('name')->first();
                }
            }
        }
        return view('livewire.employer.employee-candidates-bookmark-component', ['top_views' => $top_views])->layout("layouts.base");
    }
}
