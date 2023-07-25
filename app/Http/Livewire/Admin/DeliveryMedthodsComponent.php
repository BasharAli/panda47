<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Delivery;
use App\Models\KargoCompanies;



class DeliveryMedthodsComponent extends Component
{
    public $name;

    public function addDelivery()
    {
        $del = new KargoCompanies();
        $del->name = $this->name;
        $del->save();
        $this->reset();
        
    }

    public function deleteDelivery($method_id)
    {
        $del = KargoCompanies::find($method_id);
        $del->delete();
        
    }

    public function render()
    {
        $methods = KargoCompanies::all();

        return view('livewire.admin.delivery-medthods-component', ['methods' => $methods])->layout('layouts.admin');
    }
}
