<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function company($job_id, $job_name, $job_salary)
    {
        Cart::instance('cart')->add($job_id, $job_name, 1, $job_salary)->associate('App\Models\Job');
        session()->flash('success_message', 'Job bookmark successful');
        return redirect()->route('job.cart');
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
    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
