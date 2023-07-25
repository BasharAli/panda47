<?php

namespace App\Http\Livewire;

use App\Models\Delivery;
use Illuminate\Support\Facades\Notification;

use App\Models\Shop;
use App\Models\ShopSettings;
use App\Models\Types;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Notifications\ShopApplicationSubmitEmail;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\KargoCompanies;
use App\Models\KargoPrices;

class BecomeVendorLivewire extends Component
{

    use WithFileUploads;
    
    public $shopname;
    public $slug;
    public $slogan;
    public $email;
    public $phone;
    public $type;
    public $tckn;
    public $city;
    public $district;
    public $taxidn;
    public $logo;
    public $cover;
    public $description;
    public $user_id;
    public $bank_name;
    public $account_name;
    public $iban;
    public $shop_id;
    public $delivery_company;
    public $delivery_option;
    public $ref_name;




    public function mount()
    {
        $this->phone = "+90";
        $this->user_id = Auth::user()->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->shopname, '-');

    }

    public function sendContract()
    {
        $file = public_path('main/images/contract.pdf');
        $user = auth()->user();

        Notification::send($user, new ShopApplicationSubmitEmail($file));
    }

    public function createStore()
    {

        $shop = new Shop();
        $shop->shopname = $this->shopname;
        $shop->slug = $this->slug;
        $shop->shop_slogan = $this->slogan;
        $shop->shop_email = $this->email;
        $shop->shop_phone = $this->phone;
        $shop->type = $this->type;
        $shop->tckn = $this->tckn;
        $shop->city = $this->city;
        $shop->district = $this->district;
        $shop->taxid = $this->taxidn;
        $shop->ref_name = $this->ref_name;

        $logoName = Carbon::now()->timestamp. '.' . $this->logo->extension();
        $this->logo->storeAs('logos' , $logoName);
        $shop->shop_logo = $logoName;
        // $shop->edit = $this->logo;

        if ($this->cover) {
            $coverName = Carbon::now()->timestamp. '.' . $this->cover->extension();
        $this->cover->storeAs('covers' , $coverName);
        $shop->shop_cover = $coverName;
        // $shop->edit = $this->cover;
        } else {
            $shop->shop_cover = NULL;
        }
        
        
        $shop->shop_description = $this->description;
        $shop->user_id = $this->user_id;
        // $shop->delivery_company = $this->delivery_company;
        // $shop->delivery_option = $this->delivery_option;

        $shop->save();

        $setting = new ShopSettings();
        $setting->bank_name = $this->bank_name;
        $setting->account_name = $this->account_name;
        $setting->iban = $this->iban;
        $setting->shop_id = $shop->id;


        $setting->save();

        $this->sendContract();

        return redirect('status/'.$this->slug);

        
    }

    public function render()
    {
        $cTypes = Types::all();
        $deliveries = KargoCompanies::all();
        $delivery_prices = KargoPrices::all();

        return view('livewire.become-vendor-livewire', ['cTypes' => $cTypes, 'deliveries' => $deliveries, 'delivery_prices' => $delivery_prices])->layout('layouts.base');
        
    }

}

//     public function store(Request $request){

//         $request->validate([

//             'shopname'=>'required',
//             'shop_email'=>'required|email|unique:shops,shop_email',
//             'shop_phone'=>'required',
//             'type'=>'required',
//             'tckn'=>'required',
//             'city'=>'required',
//             'district'=>'required',
//             'taxid'=>'required',
//             'shop_logo'=>'required',
//         ]);

//         $shop_name = $request->shopname;
//         $slug = Str::slug($shop_name);

//         $shop_logo = $request->file('shop_logo');

//         if ($shop_logo){
//             $shopLogoName = $slug.time().'.'.$shop_logo->getClientOriginalExtension();
//             $shop_logo->move(public_path('shops/logo'), $shopLogoName);
//         }else{
//             $shopLogoName = null;
//         }

//         $shop_cover = $request->file('shop_cover');

//         if ($shop_cover){
//             $shopCoverName = $slug.time().'.'.$shop_cover->getClientOriginalExtension();
//             $shop_cover->move(public_path('shops/logo'), $shopCoverName);
//         }else{
//             $shopCoverName = null;
//         }

//         $shop = new Shop();
//         $shop->shopname = $shop_name;
//         $shop->shop_slogan = $request->shop_slogan;
//         $shop->shop_email = $request->shop_email;
//         $shop->shop_phone = $request->shop_phone;
//         $shop->type = $request->type;
//         $shop->tckn = $request->tckn;
//         $shop->city = $request->city;
//         $shop->district = $request->district;
//         $shop->taxid = $request->taxid;
//         $shop->slug = $slug;
//         $shop->shop_logo = $shopLogoName;
//         $shop->shop_cover = $shopCoverName;
//         $shop->shop_description = $request->shop_description;
//         $shop->user_id = $request->user_id;
        

//     }
// }
