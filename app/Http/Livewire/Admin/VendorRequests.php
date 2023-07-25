<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Shop;
use App\Models\Product;


class VendorRequests extends Component
{

    public function approveVendor($shop_id)
    {
        $vRequest = Shop::find($shop_id);
        $vRequest->shop_status = 'active';
        $vRequest->save();
        

    }


    public function render()
    {
        $shops = Shop::where('shop_status' , 'pending')->get() ;
        return view('livewire.admin.vendor-requests', ['shops' => $shops])->layout('layouts.admin');
    }
}
