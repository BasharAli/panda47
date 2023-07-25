<?php

namespace App\Http\Livewire\Admin;

use App\Models\KargoCompanies;
use App\Models\KargoPrices;
use Livewire\Component;

class KargoPricesComponent extends Component
{
    public $company_id;
    public $kg;
    public $charge;

    public function addDelivery()
    {
        $price = new KargoPrices();
        $price->company_id = $this->company_id;
        $price->kg = $this->kg;
        $price->charge = $this->charge;

        $price->save();
        $this->reset();
    }

    public function deleteDelivery($charge_id)
    {
        $delete = KargoPrices::find($charge_id);
        $delete->delete();

    }


    public function render()
    {
        $prices = KargoPrices::all();
        $companies  = KargoCompanies::all();
        return view('livewire.admin.kargo-prices-component', compact('prices', 'companies'))->layout('layouts.admin');
    }
}
