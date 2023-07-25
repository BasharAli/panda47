<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;


class OdemeOnayComponent extends Component
{

    public function render(Request $request)
    {
        $RequestContent = urldecode($request->AuthenticationResponse);
        $xxml=simplexml_load_string($RequestContent) or die("Error: Cannot create object");
        return view('livewire.odeme-onay-component', ['xxml' => $xxml])->layout('layouts.base');
    }
}
