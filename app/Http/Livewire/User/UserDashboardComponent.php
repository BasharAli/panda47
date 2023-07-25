<?php

namespace App\Http\Livewire\User;

use App\Models\Shipping;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserDashboardComponent extends Component
{

    public function deleteAddress($adres_id)
    {
        $delete = Shipping::find($adres_id);
        $delete->delete();
        
    }


    public function render()
    {
        $user = Auth::user();
        return view('livewire.user.user-dashboard-component' , ['user' => $user])->layout('layouts.base');
    }
}
