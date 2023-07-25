<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;


class SubCategoriesController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::all();
        return response()->json(['data' => $subCategories], 200);
        
    }
}
