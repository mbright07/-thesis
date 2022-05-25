<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
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

    public function switchToSaveForLater($rowId)
    {
        $job = Cart::instance('bookmark')->get($rowId);
        Cart::instance('bookmark')->remove($rowId);
        Cart::instance('saveForLater')->add($job->id, $job->name, 1, $job->salary)->associate('App\Models\Job');
        session()->flash('success_message', 'Job has been saved for later');
    }

    public function moveToBookmark($rowId)
    {
        $job = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('bookmark')->add($job->id, $job->name, 1, $job->salary)->associate('App\Models\Job');
        session()->flash('s_success_message', 'Job has been move to Bookmark');
    }

    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('s_success_message', 'Job has been removed from save for later');
    }

    public function Recruitment()
    {
        if (Auth::check()) {
            return redirect()->route('recruitment');
        } else {
            return redirect()->route('login');
        }
    }

    public function setAmountForRecruitment()
    {
        if (!Cart::instance('bookmark')->count() > 0) {
            session()->forget('recruitment');
            return;
        }
    }

    // public function switchToApplied($rowId)
    // {
    //     $job = Cart::instance('bookmark')->get($rowId);
    //     Cart::instance('bookmark')->remove($rowId);
    //     Cart::instance('applied')->add($job->id, $job->name, 1, $job->salary)->associate('App\Models\Job');
    //     session()->flash('success_message', 'Job has been applied');
    // }

    public function render()
    {
        $this->setAmountForRecruitment();

        if (Auth::check()) {
            Cart::instance('bookmark')->store(Auth::user()->email);
        }

        return view('livewire.cart-component')->layout("layouts.base");
    }
}
