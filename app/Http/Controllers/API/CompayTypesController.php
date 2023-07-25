<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Types;


class CompayTypesController extends Controller
{
    public function companyTypes()
    {
        $types = Types::all();
        return response()->json(['data'=>$types], 200);
    }
}
