<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;



class AuthController extends Controller
{
    use HasApiTokens;

    public function signUp(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'password' => 'required',
        ]);

        $date = \DateTime::createFromFormat('d-m-Y', $validatedData['date']);
        $formattedDate = $date->format('Y-m-d');

        $user = User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'date' => $formattedDate,
            'password' => Hash::make($validatedData['password']),
        ]);
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['data' => $user, 'token' => $token], 201);
    }

    public function logIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['token' => $token, 'data' => $user], 200);
        } else {
            // Authentication failed
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }
}
