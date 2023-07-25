<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class TopVendorController extends Controller
{
    public function topVendors(){
        $topVendors = Shop::select('shops.*', DB::raw('count(*) as order_count'))
        ->join('products', 'shops.id', '=', 'products.shop_id')
        ->join('order_items', 'products.id', '=', 'order_items.product_id')
        ->groupBy(array_map(function ($column) {
            return "shops.$column";
        }, Schema::getColumnListing('shops')))
        ->orderByRaw('count(*) DESC')
        ->take(5)
        ->get();

        return response()->json(['data' => $topVendors], 200);
    }
}
