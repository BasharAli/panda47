<?php

namespace App\Http\Livewire\Vendor;

use App\Models\Order;
use Livewire\Component;
use App\Models\Shop;

class VendorOrderDetails extends Component
{
    public $slug;
    public $order_id;

    public function mount($slug, $order_id)
    {
        $this->slug = $slug;
        $this->order_id = $order_id;
        
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        $shop = Shop::where('slug', $this->slug)->first();

        $orderItems = $order->orderItems()->whereHas('product', function ($query) use ($shop) {
            $query->where('shop_id', $shop->id);
        })->get();

        $totalPrice = $orderItems->sum(function ($item) {
            return $item->product->final_price;
        });
        return view('livewire.vendor.vendor-order-details', compact('order', 'shop', 'orderItems', 'totalPrice'))->layout('layouts.base');
    }
}
