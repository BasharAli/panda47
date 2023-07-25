<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KargoPrices;


class kargoPricesController extends Controller
{
    public function index()
    {
        $prices = KargoPrices::all();
        return response()->json(['data' => $prices], 200);
    }
}
