<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['data' => $users], 200);
    }
}
