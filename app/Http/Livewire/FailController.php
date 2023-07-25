<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FailController extends Component
{
    public function render()
    {
        return view('livewire.fail-controller')->layout('layouts.base');
    }
}
