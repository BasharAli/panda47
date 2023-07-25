<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class OrderHistoryComponent extends Component
{

    public function render()
    {
        $user = Auth::user()->id;
        $orders = Order::where('user_id', $user)->get();

        return view('livewire.user.order-history-component', ['orders' => $orders])->layout('layouts.base');
    }
}
