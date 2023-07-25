<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KargoCompanies;
use Illuminate\Http\Request;

class kargoCompaniesController extends Controller
{
    public function index()
    {
        $kargoCompanies = KargoCompanies::all();
        return response()->json(['data' => $kargoCompanies], 200);
    }
}
