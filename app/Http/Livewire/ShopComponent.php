<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Product;
use App\Models\Shop;
use Cart;

class ShopComponent extends Component
{

    public function store($product_id, $product_name, $product_price, $shop_id)
    {
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price, ["shop_id" => $shop_id])->associate(Product::class);
        session()->flash('success_message', 'Item Added');
        return redirect()->route('product.cart');

    }

    protected $paginationTheme = 'bootstrap';


    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_price)->associate(Product::class);
        $this->emitTo('wishlist-count-component', 'refreshComponent');

    }

    public function removeFromWihlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component', 'refreshComponent' );
                return;
            }
        }
    }
    
    public function render()
    {
        $shops = Shop::has('products')->with('products')->get()->map(function ($shop) {
            $shop->products = $shop->products->take(12);
            return $shop;
        });
            return view('livewire.shop-component',['shops' => $shops] )->layout('layouts.base');
    }
}
