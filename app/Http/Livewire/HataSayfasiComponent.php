<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;


class HataSayfasiComponent extends Component
{
    public function render(Request $request)
    {
        $RequestContent = urldecode($request->AuthenticationResponse);
        $xxml=simplexml_load_string($RequestContent) or die("Error: Cannot create object");
        return view('livewire.hata-sayfasi-component', ['xxml' => $xxml])->layout('layouts.base');
    }
}
