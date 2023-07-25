<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KargoCompanies;
use App\Models\KargoPrices;


class KargoController extends Controller
{
    public function kgCompanies()
    {
        $companies = KargoCompanies::all();
        return response()->json(['data' => $companies], 200);
    }

    public function kgPrices()
    {
        $prices = KargoPrices::all();
        return response()->json(['data' => $prices], 200);
    }
}
