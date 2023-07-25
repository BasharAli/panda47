<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupons;

class CouponsController extends Controller
{
    public function index()
    {
        $coupons = Coupons::all();
        return response()->json(['data' => $coupons], 200);
    }
}
