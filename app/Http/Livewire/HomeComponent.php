<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Admin\VendorList;
use Livewire\Component;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeSlider;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Sale;
use App\Models\SingleAd;
use App\Models\SubCategory;
use App\Models\TwinAds;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;



class HomeComponent extends Component
{

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
        $this->render();
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
        $user=Auth::user();
        $hasShop = Shop::whereHas('user', function ($query) {
            $query->whereNotNull('id');
        })->with('user')->get();
        $sliders = HomeSlider::all();
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(8);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $sproducts = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(5);
        $sale = Sale::where('status' , 1)->get()->take(5);
        $twinfirst = TwinAds::first();
        $twinsecond = TwinAds::skip(1)->first();
        $singleAd = SingleAd::first();

        $topVendors = Shop::select('shops.*', DB::raw('count(*) as order_count'))
        ->join('products', 'shops.id', '=', 'products.shop_id')
        ->join('order_items', 'products.id', '=', 'order_items.product_id')
        ->groupBy(array_map(function ($column) {
            return "shops.$column";
        }, Schema::getColumnListing('shops')))
        ->orderByRaw('count(*) DESC')
        ->take(5)
        ->get();

        $latestproducts = Product::whereBetween('created_at', [now()->subDays(3), now()])
        ->orderByDesc('created_at')
        ->take(4)
        ->get();

        $brands = Brand::all();


        

        return view('livewire.home-component', compact('hasShop', 'sliders', 'lproducts', 'categories' , 'subcategories', 'sproducts', 'sale', 'twinfirst', 'twinsecond', 'singleAd', 'topVendors', 'latestproducts', 'brands'))->layout('layouts.base');
    }
}
