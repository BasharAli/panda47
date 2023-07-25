<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactDetails;


class ContactDetailsController extends Controller
{
    public function index ()
    {
        $contactDetails = ContactDetails::all();
        return response()->json(['data' => $contactDetails], 200);
    }
}
