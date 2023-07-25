<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Taxes;


class TaxesComponent extends Component
{
    public $name;
    public $value;

    public function addTax()
    {
        $tax = new Taxes();
        $tax->name = $this->name;
        $tax->tax_value = $this->value;
        $tax->save();

        $this->reset();
         
    }

    public function deleteTax($tax_id)
    {
        $tax = Taxes::find($tax_id);
        $tax->delete();
    }


    public function render()
    {
        $taxes = Taxes::all();
        return view('livewire.admin.taxes-component', ['taxes' => $taxes])->layout('layouts.admin');
    }
}
