<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class SaleController extends Controller
{
    public function priceSale(){
        $sproducts = Product::with('brand', 'category', 'subcategory')->where('sale_price', '>', 0)->inRandomOrder()->get()->take(5);
        foreach ($sproducts as &$product) {
            $images = array_values(array_filter(explode(',', $product->images)));

        // Add single image name to the array of images
        if (is_array($images)) {
            array_unshift($images, $product->image);
        } else {
            $images = [$product->image];
        }

        $product->images = $images;
        }
        return response()->json(['data' => $sproducts], 200);
    }

    public function timeSale(){
        $sale = Sale::with('product.brand', 'product.category', 'product.subcategory')->get()->take(5);
        return response()->json(['data' => $sale], 200);
    }
}
