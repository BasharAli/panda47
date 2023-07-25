<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class UserProfileComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.user-profile-component')->layout('layouts.admin');
    }
}
