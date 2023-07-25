<?php

namespace App\Http\Livewire\Vendor;

use App\Models\Product;
use Livewire\Component;
use App\Models\Shop;

class VendorProductsList extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
        
    }
    
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        
    }

    public function render()
    {
        $slug = $this->slug;
        $shop = Shop::where('slug' , $slug)->first();
        return view('livewire.vendor.vendor-products-list', ['shop' => $shop])->layout('layouts.base');
    }

    
}
