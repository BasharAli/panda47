<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductsComponent extends Component


{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }


    public function store($product_id, $product_name, $product_price, $shop_id)
    {
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price, ["shop_id" => $shop_id])->associate(Product::class);
        session()->flash('success_message', 'Item Added');
        return redirect()->route('product.cart');

    }

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


    public function render(Request $request)
    {
        $subCategory = SubCategory::where('slug' , $this->slug)->first() ;
        return view('livewire.products-component' , ['subCategory' => $subCategory])->layout('layouts.base');
    }
}
