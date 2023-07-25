<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;


class EditAccountDetailsComponent extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $date;
    public $userId;


    public function mount($user_id)
    {
        $info = User::find($user_id);
        $this->firstname = $info->firstname;
        $this->lastname = $info->lastname;
        $this->email = $info->email;
        $this->phone = $info->phone;
        $this->date  = $info->date;
        $this->userId  = $info->id;
    }

    public function updatePersonalInfo()
    {
        $user_info = User::find($this->userId);
        $user_info->firstname = $this->firstname;
        $user_info->lastname = $this->lastname;
        $user_info->email = $this->email;
        $user_info->date = $this->date;
        $user_info->phone = $this->phone;

        $user_info->save();

        redirect()->route('myaccount');
    }



    public function render()
    {
        return view('livewire.user.edit-account-details-component')->layout('layouts.base');
    }
}
