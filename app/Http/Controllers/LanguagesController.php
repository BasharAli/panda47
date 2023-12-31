<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('lang'))) {
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
}
