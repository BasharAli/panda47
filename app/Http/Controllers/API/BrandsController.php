<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return response()->json(['data' => $brands], 200);

    }
}
