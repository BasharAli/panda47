<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutUsController extends Controller
{
    public function aboutUs()
    {
        $about = About::all();
        return response()->json(['data' => $about], 200);
    }
}
