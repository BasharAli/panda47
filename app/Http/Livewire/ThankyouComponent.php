<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Http\Request;
use Livewire\Component;

class ThankyouComponent extends Component
{
    public function render()
    {
        return view('livewire.thankyou-component')->layout('layouts.base');
    }

    public function vInvoice(Request $request)
    {
        $order_id = $request->order_id;
        $user_id  = $request->user_id;
        $order = Order::where('id', $order_id)
              ->where('user_id', $user_id)
              ->first();
        return view('livewire.user.invoice_display', compact('order'));
    }
}
