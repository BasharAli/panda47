<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TwinAds;
use App\Models\SingleAd;


class AdsController extends Controller
{
    public function twinAds()
    {
        $twins = TwinAds::take(2)->get();
        return response()->json(['data' => $twins],200);

    }

    public function singleAd()
    {
        $single = SingleAd::take(1)->get();
        return response()->json(['data' => $single], 200);
    }
}
