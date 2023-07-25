<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Invoice extends Component
{
    public function render()
    {
        return view('livewire.user.invoice')->layout('layouts.base');
    }
}
