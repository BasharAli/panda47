<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactDetails;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        $details = ContactDetails::all();
        return response()->json(['data' => $details], 200);
    }
}
