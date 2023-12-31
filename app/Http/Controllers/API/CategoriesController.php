<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json(['data' => $categories], 200);

    }
}
