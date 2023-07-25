<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;

use App\Models\Delivery;
use App\Models\Shop;
use App\Models\ShopSettings;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class VendorEditSettings extends Component
{

    use WithFileUploads;
    
    public $shopname;
    public $slug;
    public $new_shop_slug;
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
    public $pref_delivery_id;
    public $shop;
    public $new_logo;
    public $new_cover;
    public $setting_id;

    


    public function mount($slug)
    {
        $this->slug = $slug;
        $this->user_id = Auth::user()->id ;
        $shop = Shop::where('slug' , $this->slug)->where('user_id', $this->user_id)->first();
        $this->shop = $shop;
        $this->shopname = $shop->shopname;
        $this->new_shop_slug = $shop->slug;
        $this->slogan = $shop->shop_slogan;
        $this->email = $shop->shop_email ;
        $this->phone = $shop->shop_phone ;
        $this->type = $shop->type ;
        $this->tckn = $shop->tckn ;
        $this->city = $shop->city ;
        $this->district = $shop->district ;
        $this->taxidn = $shop->taxid ;
        $this->logo = $shop->shop_logo ;
        $this->cover = $shop->shop_cover ;
        $this->description = $shop->shop_description ;
        $this->bank_name = $shop->setting->bank_name ;
        $this->account_name = $shop->setting->account_name ;
        $this->iban = $shop->setting->iban ;
        $this->shop_id = $shop->id;
        $this->pref_delivery_id = $shop->setting->pref_delivery_id ;
        $settings = ShopSettings::where('shop_id', $this->shop_id)->first();
        $this->setting_id = $settings->id;


    }

    public function generateSlug()
    {
        $this->new_shop_slug = Str::slug($this->shopname, '-');

    }

    public function updateStore()
    {
        $shop = Shop::find($this->shop_id);
        $shop->shopname = $this->shopname;
        $shop->shop_slogan = $this->slogan;
        $shop->shop_email = $this->email;
        $shop->shop_phone = $this->phone;
        $shop->type = $this->type;
        $shop->tckn = $this->tckn;
        $shop->city = $this->city;
        $shop->district = $this->district;
        $shop->taxid = $this->taxidn;
        $shop->slug = $this->new_shop_slug;

        if ($this->new_logo) {
            $imageName = Carbon::now()->timestamp. '.' . $this->new_logo->extension();
            $this->new_logo->storeAs('logos' , $imageName);
            $shop->shop_logo = $imageName;
        }

        if ($this->new_cover) {
            $imageName = Carbon::now()->timestamp. '.' . $this->new_cover->extension();
            $this->new_cover->storeAs('covers' , $imageName);
            $shop->shop_cover = $imageName;
        }

        $shop->shop_description = $this->description;
        $shop->shop_status = 'pending';
        $shop->user_id  = $this->user_id;

        $shop->save();

        $settings = ShopSettings::find($this->setting_id);

        $settings->bank_name = $this->bank_name;
        $settings->account_name = $this->account_name;
        $settings->iban = $this->iban;
        // $settings->pref_delivery_id = $this->pref_delivery_id;
        $settings->shop_id = $this->shop_id;
        
        $settings->save();

        return redirect('status/'.$shop->slug);


    }

    public function render()
    {

        $cTypes = Types::all();
        $deliveries = Delivery::all();
        
        return view('livewire.vendor.vendor-edit-settings', ['cTypes' => $cTypes, 'deliveries' => $deliveries])->layout('layouts.base');
    }
}
