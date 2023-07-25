<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\Shop;


class VendorList extends Component
{
    public function render()
    {

        $shops = Shop::where('shop_status' , 'active')->get();
        return view('livewire.admin.vendor-list', ['shops' => $shops])->layout('layouts.admin');
    }
}
