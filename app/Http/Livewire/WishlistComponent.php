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
        $hasBookmarked = Cart::instance('bookmark')->content()->where('rowId', $rowId)->isNotEmpty();

        Cart::instance('wishlist')->remove($rowId);

        $this->emitTo('wishlist-count-component', 'refreshComponent');

        if ($hasBookmarked) {
            session()->flash('success_message', 'Job has been saved for later1223123');
            return;
        }
        Cart::instance('bookmark')->add($job->id, $job->name, 1, $job->price)->associate('App\Models\Job');
    }

    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
