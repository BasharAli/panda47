<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;




class OrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id  = $order_id;
    }


    public function render()
    {
        $orders = Order::where('id', $this->order_id)->first();
        $user = Auth::user();
        return view('livewire.user.order-details-component', ['orders' => $orders , 'user' => $user])->layout('layouts.base');
    }
}
