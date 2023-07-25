<?php

namespace App\Http\Livewire;

use App\Models\ContactDetails;
use Livewire\Component;
use App\Models\PaymentMethods;
use App\Models\Shop;
use App\Models\ShopActivationPayment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;



class PaymentStepComponent extends Component
{
    use WithFileUploads;

    public $user_id;
    public $shop_id;
    public $shop_slug;
    public $amount;
    public $dekont;
    public $payment_status;


    public function mount()
    {
        $paymentAmount = ContactDetails::first();
        $this->user_id = Auth::user()->id;
        $shop = Shop::where('user_id', $this->user_id)->first();
        $this->shop_id = $shop->id;
        $this->shop_slug = $shop->slug;

        $this->amount = $paymentAmount->fiyat;
        $this->payment_status = "pending";

    }

    public function paynow()
    {
        $messages = [
            'dekont.required' => 'The dekont file is required.',
            'dekont.file'     => 'The dekont must be a valid file.',
            'dekont.mimes'    => 'The dekont must be a file of type: pdf, doc, docx.',
            'dekont.max'      => 'The dekont size must not be larger than 2048 kilobytes.',
        ];

        $this->validate([
            'dekont' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ], $messages);

        $pay = new ShopActivationPayment();
        $pay->user_id = $this->user_id;
        $pay->shop_id = $this->shop_id;
        $pay->amount = $this->amount;


        if ($this->dekont) {
            $dekontName = Carbon::now()->timestamp. '.' . $this->dekont->extension();
            $this->dekont->storeAs('dekonts' , $dekontName);
            $pay->dekont = $dekontName;
        }

        $pay->payment_status = $this->payment_status;

        $pay->save();
        return redirect('status/'.$this->shop_slug);

    }


    public function render()
    {
        
        $method = PaymentMethods::first();
        $paymentAmount = ContactDetails::first();
        return view('livewire.payment-step-component', compact('method', 'paymentAmount'))->layout('layouts.base');
    }
}
