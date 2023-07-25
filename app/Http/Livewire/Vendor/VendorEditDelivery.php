<?php

namespace App\Http\Livewire\Vendor;

use App\Models\KargoCompanies;
use App\Models\KargoPrices;
use Livewire\Component;
use App\Models\Shop;


class VendorEditDelivery extends Component
{
    public $slug;
    public $delivery_company;
    public $delivery_option;

    public function mount($slug)
    {
        $this->slug = $slug;
        $shop = Shop::where('slug' , $slug)->first();

        if ($shop->delivery_company) {
            $this->delivery_company = $shop->delivery_company;
        }

        if ($shop->delivery_option) {
            $this->delivery_option = $shop->delivery_option;
        }
        

        
    }

    public function updateDelivery()
    {
        $this->validate([
            'delivery_company' => 'required',
            'delivery_option' => 'required'
        ]);

        $shop = Shop::where('slug' , $this->slug)->first();
        $shop->delivery_company = $this->delivery_company;
        $shop->delivery_option = $this->delivery_option;

        $shop->save();

        return redirect()->route('deliveries', ['slug' => $this->slug]);

        
    }


    public function render()
    {
        $slug = $this->slug;
        $shop = Shop::where('slug' , $slug)->first();
        $kargo_companies = KargoCompanies::all();
        $kargo_prices = KargoPrices::all();
        return view('livewire.vendor.vendor-edit-delivery', compact('shop', 'kargo_companies', 'kargo_prices'))->layout('layouts.base');
    }
}
