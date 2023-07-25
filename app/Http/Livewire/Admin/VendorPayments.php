<?php

namespace App\Http\Livewire\Admin;

use App\Models\Shop;
use App\Models\ShopActivationPayment;
use Livewire\Component;

class VendorPayments extends Component
{

    public function approvePayment($payment_id){

        $vPayment = ShopActivationPayment::find($payment_id);
        $vPayment->payment_status = 'approved';
        $vPayment->save();
        $shop_id = $vPayment->shop_id;
        $isPaid = Shop::find($shop_id);
        $isPaid->payment_status = 'yes';
        $isPaid->save();

    }


    public function render()
    {
        $payments = ShopActivationPayment::all();
        return view('livewire.admin.vendor-payments', ['payments' => $payments])->layout('layouts.admin');
    }
}
