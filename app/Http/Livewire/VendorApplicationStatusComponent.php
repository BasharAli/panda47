<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shop;
use Illuminate\Http\Request;


class VendorApplicationStatusComponent extends Component
{
    public function render(Request $request)
    {
        $slug = $request->route('slug');
        $status= Shop::where('slug', $slug)->first();
        return view('livewire.vendor-application-status-component', ['status' => $status])->layout('layouts.base');
    }
}
