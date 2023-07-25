<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupons;


class CouponsComponent extends Component
{
    public $code;
    public $value;
    public $type;
    public $cart_value;
    public $expiry;

    public function storeCoupon()
    {
        $coupon = new Coupons();
        $coupon->code = $this->code;
        $coupon->value = $this->value;
        $coupon->type = $this->type;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry;

        $coupon->save();
    }

    public function deleteCoupon($coupon_id)
    {
        $coupon = Coupons::find($coupon_id);
        $coupon->delete();

    }
    public function render()
    {
        $coupons = Coupons::all();
        return view('livewire.admin.coupons-component', ['coupons' => $coupons])->layout('layouts.admin');
    }
}
