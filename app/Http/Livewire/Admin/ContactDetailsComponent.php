<?php

namespace App\Http\Livewire\Admin;

use App\Models\ContactDetails;
use Livewire\Component;

class ContactDetailsComponent extends Component
{

    public $address;
    public $phone;
    public $fiyat;
    public $email;

    public $limited;



    public function storeDetails()
    {
        $detail = new ContactDetails();
        $detail->address = $this->address;
        $detail->phone_number = $this->phone;
        $detail->email = $this->email;
        $detail->fiyat = $this->fiyat;

        $detail->save();
        $this->reset();

    }

    public function deleteDetail($detail_id)
    {
        $delete = ContactDetails::find($detail_id);

        $delete->delete();

    }

    public function isLimited()
    {
        if (ContactDetails::all()->count() == 1) {
            $this->limited  = 1;
        } else {
            $this->limited = 0;
        }

    }


    public function render()
    {
        $this->isLimited();
        $details = ContactDetails::all();
        return view('livewire.admin.contact-details-component', compact('details'))->layout('layouts.admin');
    }
}
