<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Types;


class CompanyTypesComponent extends Component
{
    public $cType;

    public function storeType()
    {
        $type = new Types();
        $type->cType = $this->cType;
        $type->save();

        $this->reset();
    }


    public function deleteType($type_id)
    {
        $type = Types::find($type_id);
        $type->delete();

    }


    public function render()
    {
        $types = Types::all();

        return view('livewire.admin.company-types-component', ['types' => $types])->layout('layouts.admin');
    }
}

// Panda 47 company is an online firm established and represented online on year 2023, as marketing site for clothes and fashion and electronics & accessories , Home stuff , and cosmetics, in Mersin.



