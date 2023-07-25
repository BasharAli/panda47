<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlider;


class HomeSlidersController extends Controller
{
    public function index()
    {
        $sliders = HomeSlider::all();
        return response()->json(['data' => $sliders], 200);
    }
}
