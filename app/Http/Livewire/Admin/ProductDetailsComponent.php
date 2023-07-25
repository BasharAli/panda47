<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ProductDetailsComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.product-details-component')->layout('layouts.admin');
    }
}
