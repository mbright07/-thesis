<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
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

    public function moveJobFromWishlistToBookmark($rowId)
    {
        $job = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('bookmark')->add($job->id, $job->name, 1, $job->salary)->associate('App\Models\Job');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
