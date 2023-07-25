<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class SideCartComponent extends Component
{
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent' );

    }

    public function render()
    {
        return view('livewire.side-cart-component');
    }
}
