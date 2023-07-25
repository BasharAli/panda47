<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\Session;


class deliveryCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $cartItems = Cart::instance('cart')->content();
        $errorMessage = null;

        
        foreach ($cartItems as $cartItem) {
            $shopId = $cartItem->options->shop_id;
            $product = Product::find($cartItem->id);
            $shop = Shop::find($shopId);
            
            if (!$shop->delivery_option) {
                Cart::instance('cart')->remove($cartItem->rowId);
                $errorMessage = 'Items From This Shop Cannot be Added to The Cart Because This Shop Has no Delivery Options Available';
                break;
            }
        }

        if ($errorMessage) {
            Session::flash('error_message', $errorMessage);
            return redirect()->back();
        }


        return $next($request);
    }
}
