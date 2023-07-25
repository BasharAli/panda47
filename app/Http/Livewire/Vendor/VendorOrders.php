<?php

namespace App\Http\Livewire\Vendor;

use App\Models\Order;
use Livewire\Component;
use App\Models\Shop;

class VendorOrders extends Component
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
        $shopId = $shop->id;

        $orders = Order::whereHas('orderItems', function ($query) use ($shopId) {
            $query->whereHas('product', function ($query) use ($shopId) {
                $query->where('shop_id', $shopId);
            });
        })
        ->latest() // Retrieve the orders based on the latest created_at timestamp
        ->get();
        return view('livewire.vendor.vendor-orders' , ['shop' => $shop, 'orders' => $orders])->layout('layouts.base');
    }
}
