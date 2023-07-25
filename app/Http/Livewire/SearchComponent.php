<?php

namespace App\Http\Livewire;
use Cart;
use Livewire\Component;
use App\Models\Product;


class SearchComponent extends Component
{
    public $search;

    public function mount()
    {
        $this->search;
        $this->fill(request()->only('search'));

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


    public function render()
    {
        $products = Product::where('name' , 'like', '%'.$this->search.'%')->get();
        return view('livewire.search-component', ['products' => $products])->layout('layouts.base');
    }
}
