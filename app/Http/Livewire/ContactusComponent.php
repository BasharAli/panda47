<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactDetails;


class ContactusComponent extends Component
{
    public function render()
    {
        $details = ContactDetails::get()->first();
        return view('livewire.contactus-component', compact('details'))->layout('layouts.base');
    }
}
