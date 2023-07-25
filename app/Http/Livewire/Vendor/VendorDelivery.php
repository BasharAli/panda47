<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;
use App\Models\Shop;


class VendorDelivery extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
        
    }


    public function render()
    {
        $slug = $this->slug;
        $shop = Shop::where('slug' , $slug)->first();
        return view('livewire.vendor.vendor-delivery', compact('shop'))->layout('layouts.base');
    }
}
