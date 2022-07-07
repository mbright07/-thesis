<?php

namespace App\Http\Livewire\Employer;

use App\Models\User;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EmployeeCandidatesBookmarkComponent extends Component
{
    public function destroy($rowId)
    {
        Cart::instance('bookmark')->remove($rowId);
        session()->flash('success_message', 'Bookmark has been removed!');
    }

    public function destroyAll()
    {
        Cart::instance('bookmark')->destroy();
        session()->flash('success_message', 'All Bookmark has been removed!');
    }

    public function render()
    {
        if (Auth::check()) {
            Cart::instance('bookmark_candidate')->store(Auth::user()->email);
        }
        $top_views = User::orderBy('totalviews', 'DESC')->get()->take(8);
        return view('livewire.employer.employee-candidates-bookmark-component', ['top_views' => $top_views])->layout("layouts.base");
    }
}
