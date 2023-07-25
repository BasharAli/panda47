<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BrandsComponent extends Component
{
    public function render()
    {
        return view('livewire.brands-component')->layout('layouts.base');
    }
}
