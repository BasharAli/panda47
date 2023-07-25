<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class VendorApplicationController extends Controller
{
    public function hasShop()
    {
        $user=Auth::user();
        $hasShop = Shop::where('user_id', $user->id)->first();

        if ($hasShop) {

            if ($hasShop->shop_status === 'pending') {
                return redirect('status/'.$hasShop->slug);
            } else {
                return redirect('myaccount/'.$hasShop->slug);
            }
            
            // 
        } else {
            return redirect('/becomeavendor');
        }
    }
}
