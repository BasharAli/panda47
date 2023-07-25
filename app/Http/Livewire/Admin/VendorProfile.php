<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Shop;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;


class VendorProfile extends Component
{
    use WithFileUploads;

    public $slug;
    public $contract;


    public function mount($slug)
    {
        $this->slug = $slug;

    }

    public function uploadContract()
    {
        $contract = Shop::where('slug' , $this->slug)->first();
            $contractName = Carbon::now()->timestamp. '.' . $this->contract->extension();
            $this->contract->storeAs('contracts' , $contractName);
            $contract->contract = $contractName;
        $contract->save();

        

    }


    public function render()
    {
        $shop = Shop::where('slug' , $this->slug)->first();

        return view('livewire.admin.vendor-profile', ['shop' => $shop])->layout('layouts.admin');
    }
}
