<?php

namespace App\Http\Livewire;

use App\Models\Coupons;
use Carbon\Carbon;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;


class CartComponent extends Component
{
    public $couponCode;
    public $discount;
    public $totalAfterDiscount;
    public $delivery_charge;

    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1 ;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component', 'refreshComponent' );

    }

    public function decreaseQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1 ;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component', 'refreshComponent' );

    }

    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent' );

    }

    public function applyCouponCode()
    {
        $coupon = Coupons::where('code', $this->couponCode)->where('expiry_date', '>=', Carbon::today())->where('cart_value', '<=', Cart::instance('cart')->total())->first();

        if (!$coupon) {
            session()->flash('coupon_message' , 'This Coupon is invalid!');
            return;

        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value,
            'expiry_date' => $coupon->expiry_date,


        ]);

    }

    public function calculateDiscounts()
    {
     if (session()->has('coupon')) {
        if (session()->get('coupon')['type'] == 'fixed') {
            $this->discount = session()->get('coupon')['value'];

        }else{
            $this->discount = (Cart::instance('cart')->total() * session()->get('coupon')['value'])/100;

        }
        $this->totalAfterDiscount = Cart::instance('cart')->total() - $this->discount;

     }
    }

    

   

    public function continueShopping()
    {
        return redirect()->back();
    }

    public function removeCoupon()
    {
        session()->forget('coupon');

    }

    public function checkout()
    {
        if (Auth::check()) {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
        
    }

    public function setAmountForCheckout()
    {
        $shopsDeliveryCharge = [];

        foreach (Cart::instance('cart')->content()->groupBy('options.shop_id') as $groupedItems) {

            $shop = Shop::where('id', $groupedItems->first()->options['shop_id'])->first();

            $totalPrice = $groupedItems->sum(function ($item) {
                return $item->price * $item->qty;
            });

            if ($totalPrice > 100) {

                $shopsDeliveryCharge[$shop->id] = 0;

            } else {

                $shopsDeliveryCharge[$shop->id] = $shop->deliveryPrice->charge;

            }
            $this->delivery_charge = array_sum($shopsDeliveryCharge);
            
        }

        
        if (!Cart::instance('cart')->count() > 0) {
                session()->forget('checkout');
                return;
        }

        if (session()->has('coupon')) {
            session()->put('checkout',[
                'discount' => $this->discount,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => $this->totalAfterDiscount,
                'charges' => $this->delivery_charge,
            ]);
        } else {
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
                'charges' => $this->delivery_charge,

            ]);
        }
        
    }

    public function render()
    {
        if (session()->has('coupon') && session()->get('coupon')['expiry_date']) {
                if (Cart::instance('cart')->total() < session()->get('coupon')['cart_value']) {
                        session()->forget('coupon');
                }else{
                    $this->calculateDiscounts();
                }
        }

        $cartItems = Cart::instance('cart')->content();
        $groupedCartItems = $cartItems->groupBy('product.shop_id');
        $shopIds = $groupedCartItems->keys();
        $shops = Shop::whereIn('id', $shopIds)->get();
        $this->setAmountForCheckout();


        return view('livewire.cart-component', ['groupedCartItems' => $groupedCartItems, 'shops' => $shops])->layout('layouts.base');
    }
}
