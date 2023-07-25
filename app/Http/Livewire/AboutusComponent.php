<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\About;


class AboutusComponent extends Component
{
    public function render()
    {
        $abouts = About::all();

        return view('livewire.aboutus-component', ['abouts' => $abouts])->layout('layouts.base');
    }
}
