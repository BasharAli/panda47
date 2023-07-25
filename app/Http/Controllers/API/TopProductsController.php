<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class TopProductsController extends Controller
{
    public function topProducts()
    {
        $lproducts = Product::with('brand', 'category', 'subcategory', 'shop')
        ->orderBy('created_at', 'DESC')->get()->take(8);
        foreach ($lproducts as &$product) {
            $images = array_values(array_filter(explode(',', $product->images)));

        // Add single image name to the array of images
        if (is_array($images)) {
            array_unshift($images, $product->image);
        } else {
            $images = [$product->image];
        }

        $product->images = $images;
        }
        return response()->json(['data' => $lproducts], 200);

    }

    public function allProducts(Request $request)
    {
        $searchTerm = $request->input('search');

        $query = Product::with('brand', 'category', 'subcategory', 'shop');

        if ($searchTerm) {
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
        }

        $allProducts = $query->get()->all();

        foreach ($allProducts as &$product) {
            $images = array_values(array_filter(explode(',', $product->images)));

        // Add single image name to the array of images
        if (is_array($images)) {
            array_unshift($images, $product->image);
        } else {
            $images = [$product->image];
        }

        $product->images = $images;
        }

        return response()->json(['data' => $allProducts], 200);
    }

    Public function newComingProducts(){
        $latestproducts = Product::with('brand', 'category', 'subcategory', 'shop')->whereBetween('created_at', [now()->subDays(3), now()])
        ->orderByDesc('created_at')
        ->take(10)
        ->get();

        foreach ($latestproducts as &$product) {
            $images = array_values(array_filter(explode(',', $product->images)));

        // Add single image name to the array of images
        if (is_array($images)) {
            array_unshift($images, $product->image);
        } else {
            $images = [$product->image];
        }

        $product->images = $images;
        }

        return response()->json(['data' => $latestproducts], 200);
    }
}
