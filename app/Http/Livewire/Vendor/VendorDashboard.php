<?php

namespace App\Http\Livewire\Vendor;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use App\Models\Shop;
use App\Models\Product;


use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class VendorDashboard extends Component
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

        $orderedP = OrderItem::whereHas('product', function($query) use ($shopId) {
            $query->where('shop_id', $shopId);
        });

        $earnings = Product::whereHas('orderItem', function ($query) use ($shopId) {
            $query->whereHas('product', function ($query) use ($shopId) {
                $query->where('shop_id', $shopId);
            });
        })
        ->sum('final_price');

        $orders = Order::whereHas('orderItems', function ($query) use ($shopId) {
            $query->whereHas('product', function ($query) use ($shopId) {
                $query->where('shop_id', $shopId);
            });
        })
        ->latest() // Retrieve the orders based on the latest created_at timestamp
        ->take(5)  // Limit the number of orders to 5
        ->get();

        

        return view('livewire.vendor.vendor-dashboard', ['shop' => $shop, 'orderedP' => $orderedP, 'earnings' => $earnings, 'orders' => $orders])->layout('layouts.base');
    }
}
