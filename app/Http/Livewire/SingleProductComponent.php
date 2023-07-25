<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Shop;
use Illuminate\Http\Request;
use Cart;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class SingleProductComponent extends Component
{
    public $slug;
    public $qty;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    

    public function increaseQuantity()
    {
        $this->qty++;
    }

    public function decreaseQuantity()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }

    public function store($product_id, $product_name, $product_price, $shop_id)
    {
        Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price, ["shop_id" => $shop_id])->associate(Product::class);
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
        $product = Product::where('slug' , $this->slug)->first();
        return view('livewire.single-product-component', ['product' => $product])->layout('layouts.base');
    }
}
