<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;


class UsersListComponent extends Component
{
    public function render()
    {
        $users = User::all();

        return view('livewire.admin.users-list-component', compact('users'))->layout('layouts.admin');
    }
}
