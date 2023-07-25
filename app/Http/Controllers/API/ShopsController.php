<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;


class ShopsController extends Controller
{
    public function index()
    {
        $shops = Shop::has('products')->with('user')->get()->all();
        return response()->json(['data' => $shops], 200);
    }
}
