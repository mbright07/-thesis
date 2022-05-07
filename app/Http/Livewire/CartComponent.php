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

    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
