<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\ShopSettings;
use Carbon\Carbon;

use App\Models\User;
use App\Notifications\ShopApplicationSubmitEmail;
use Illuminate\Support\Facades\Notification;



class BecomeAvendorController extends Controller
{

    public function sendContract($user_id)
    {
        $file = public_path('main/images/contract.pdf');

        $user = User::where('id', $user_id)->get()->first();

        Notification::send($user, new ShopApplicationSubmitEmail($file));
    }

    public function createStore(Request $request)
    {
        $validatedData = $request->validate([
            'shopname' => 'required',
            'shop_email' => 'required',
            'shop_phone' => 'required',
            'type' => 'required',
            'tckn' => 'required',
            'city' => 'required',
            'district' => 'required',
            'taxid' => 'required',
            'slug' => 'required',
        ]);

        $shop = new Shop();
        $shop->shopname = $validatedData['shopname'];
        $shop->shop_email = $validatedData['shop_email'];
        $shop->shop_phone = $validatedData['shop_phone'];
        $shop->type = $validatedData['type'];
        $shop->tckn = $validatedData['tckn'];
        $shop->city = $validatedData['city'];
        $shop->district = $validatedData['district'];
        $shop->taxid = $validatedData['taxid'];
        $shop->slug = $validatedData['slug'];
        $shop->shop_slogan = $request->shop_slogan;
        $shop->shop_description = $request->shop_description;
        $shop->shop_status = 'pending';
        $shop->payment_status ='no' ;
        $shop->user_id = $request->user_id;
        $shop->ref_name = $request->ref_name;

        if ($request->hasFile('shop_logo')) {
        $logo = $request->file('shop_logo');
        $logoName = Carbon::now()->timestamp. '.' . $logo->extension();
        $logo->storeAs('logos' , $logoName);
        $shop->shop_logo = $logoName;
        } else {
            $shop->shop_logo = null;
        }
        
        if ($request->hasFile('shop_cover')) {
        $cover = $request->file('shop_cover');
        $coverName = Carbon::now()->timestamp. '.' . $logo->extension();
        $cover->storeAs('covers' , $coverName);
        $shop->shop_cover = $coverName;
        } else {
            $shop->shop_cover = null;
        }

        $shop->save();

        $setting = new ShopSettings();
        $setting->bank_name = $request->bank_name;
        $setting->account_name = $request->account_name;
        $setting->iban = $request->iban;
        $setting->shop_id = $shop->id;

        $setting->save();

        $this->sendContract($shop->user_id);
        $finalShopState = Shop::where('id', $shop->id)->with('setting')->get()->first();
        return response()->json(['data' => $finalShopState], 201);


    }
}
