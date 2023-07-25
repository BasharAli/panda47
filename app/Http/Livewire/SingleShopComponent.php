<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Shop;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class SingleShopComponent extends Component
{

    public $sorting;
    public $slug;
    public $min_price;
    public $max_price;

    public function mount($slug)
    {
        $this->sorting = 'default';
        $this->slug = $slug;
        $this->min_price = 1;
        $this->max_price = 1000000;
    }

    public function store($product_id, $product_name, $product_price, $shop_id)
    {
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price, ["shop_id" => $shop_id])->associate(Product::class);
        session()->flash('success_message', 'Item Added');
        return redirect()->route('product.cart');

    }

    public function addToWishlist($product_id, $product_name, $product_price, $shop_id)
    {
        Cart::instance('wishlist')->add($product_id, $product_name,1, $product_price, ["shop_id" => $shop_id])->associate(Product::class);
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

    public function render(Request $request)
    {


        $slug = $this->slug;
        $shop = Shop::where('slug' , $slug)->first();

        $products = $shop->products()->whereBetween('normal_price' , [$this->min_price, $this->max_price])->get();


        return view('livewire.single-shop-component', ['shop' => $shop, 'products' => $products])->layout('layouts.base');
    }
}
