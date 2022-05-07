<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message', 'Bookmark has been removed!');
    }

    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        session()->flash('success_message', 'All Bookmark has been removed!');
    }

    public function switchToSaveForLater($rowId)
    {
        $job = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($job->id, $job->name, 1, $job->salary)->associate('App\Models\Job');
        session()->flash('success_message', 'Job has been saved for later');
    }

    public function moveToBookmark($rowId)
    {
        $job = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($job->id, $job->name, 1, $job->salary)->associate('App\Models\Job');
        session()->flash('s_success_message', 'Job has been move to Bookmark');
    }

    public function deleteFromSaveForLater($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('s_success_message', 'Job has been removed from save for later');
    }

    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
