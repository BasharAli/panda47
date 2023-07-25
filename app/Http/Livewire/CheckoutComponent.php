<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Node\Query\OrExpr;
use Livewire\Component;
use Cart;
use Kuveytturk;
use Livewire\LivewireManager;
use Livewire\Livewire;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use TurkeyBank;

class CheckoutComponent extends Component
{
    public $selectedRadio;

    public $name;
    public $lastname;
    public $email;
    public $phone;
    public $line1;
    public $line2;
    public $city;
    public $zipcode;
    public $province;
    public $country;

    

    public $oldAddress;

    public $paymentMethod = 'cod';
    public $thankyou; 

    public $card_number;
    public $expiry_date;
    public $expiry_month;
    public $expiry_year;
    public $cvv;
    public $nameOnCard;

    public $final_delivery_charge;
    public $api_url = "https://boatest.kuveytturk.com.tr/boa.virtualpos.services/Home/ThreeDModelPayGate";

    public $user_id;
    public $subtotal;
    public $discount;
    public $tax;
    public $total;



    public function mount()
    {
        $this->verifyForCheckout();
        $this->user_id = Auth::user()->id;
        $this->subtotal = session()->get('checkout')['subtotal'] ;
        $this->discount = session()->get('checkout')['discount'];
        $this->tax = session()->get('checkout')['tax'];
        $this->total = session()->get('checkout')['total'];
        $this->final_delivery_charge = session()->get('checkout')['charges'];
    }

    public function generateInvoice($orderId, $shippingId)
    {
        $order = Order::with('user', 'orderItems', 'shipping', 'transactionss')->findOrFail($orderId);
        

        $invoice = new Invoice();
        $invoice->shipping_id = $shippingId;
        $invoice->order_id = $order->id;
        $invoice->user_id = $this->user_id;
        $invoice->invoiceName = 'invoice_' . $order->id . '.pdf';
        $invoice->invoiceNumber = 'FA' . rand(1000, 9999);
        $invoice->order_final_price = $order->total;
        $invoice->save();

        $view = view('livewire.user.invoice', compact('order'));
        $html = $view->render();
        
        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $output = $dompdf->output();
        $savePath = public_path('main/images/invoices/' . $invoice->invoiceName);
        file_put_contents($savePath, $output);
        session(['user_id' => $order->user_id]);
        session(['order_id' => $order->id]);
    }

    public function placeOrder()
    {
        if ($this->selectedRadio == 'new') {

            $order = new Order();
            $order->user_id = $this->user_id;
            $order->subtotal = (float)str_replace(',', '', $this->subtotal);
            $order->discount = (float)str_replace(',', '', $this->discount);
            $order->tax = (float)str_replace(',', '', $this->tax);
            $order->total = (float)str_replace(',', '', $this->total);
            $order->firstname = $this->name;
            $order->lastname = $this->lastname;
            $order->email = $this->email;
            $order->mobile = $this->phone;
            $order->line1 = $this->line1;
            $order->line2 = $this->line2;
            $order->city = $this->city;
            $order->zipcode = $this->zipcode;
            $order->province = $this->province;
            $order->country = $this->country;
            $order->status = 'ordered';
            $order->is_shipping_different = 1;
            $order->save();


            foreach (Cart::instance('cart')->content() as $item) {
                $orderItem = new OrderItem();
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->price = $item->price;
                $orderItem->quantity = $item->qty;
                $orderItem->final_price =($item->qty * $item->price);
                $orderItem->save();
            }

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->user_id = Auth::user()->id;
            $shipping->firstname = $this->name;
            $shipping->lastname = $this->lastname;
            $shipping->email = $this->email;
            $shipping->mobile = $this->phone;
            $shipping->line1 = $this->line1;
            $shipping->line2 = $this->line2;
            $shipping->city = $this->city;
            $shipping->zipcode = $this->zipcode;
            $shipping->province = $this->province;
            $shipping->country = $this->country;

            $shipping->save();

            $this->generateInvoice($order->id, $shipping->id);


        } else {

            $address = Shipping::where('id' , $this->oldAddress)->first();
            $order = new Order();
            $order->user_id = $this->user_id;
            $order->subtotal = (float)str_replace(',', '', $this->subtotal);
            $order->discount = (float)str_replace(',', '', $this->discount);
            $order->tax = (float)str_replace(',', '', $this->tax);
            $order->total = (float)str_replace(',', '', $this->total);
            $order->firstname = $address->firstname;
            $order->lastname = $address->lastname;
            $order->email = $address->email;
            $order->mobile = $address->mobile;
            $order->line1 = $address->line1;
            $order->line2 = $address->line2;
            $order->city = $address->city;
            $order->zipcode = $address->zipcode;
            $order->province = $address->province;
            $order->country = $address->country;
            $order->status = 'ordered';
            $order->is_shipping_different = 0;
            $order->save();


            foreach (Cart::instance('cart')->content() as $item) {
                $orderItem = new OrderItem();
                $orderItem->product_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->price = $item->price;
                $orderItem->quantity = $item->qty;
                $orderItem->final_price =($item->qty * $item->price);
                $orderItem->save();
            }

            $this->generateInvoice($order->id ,$address->id);
            
        }

        if ($this->paymentMethod == 'cod') {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
        }
        else if ($this->paymentMethod == 'card')
        {
            // list($this->expiry_month, $this->expiry_year) = explode('/', $this->expiry_date);
            // $kuveytturk = Kuveytturk::setName($this->nameOnCard)
            //             ->setCardNumber($this->card_number)
            //             ->setCardExpireDateMonth($this->expiry_month)
            //             ->setCardExpireDateYear($this->expiry_year)
            //             ->setCardCvv2($this->cvv)
            //             ->setOrderId($order->id)
            //             ->setAmount(session()->get('checkout')['total'])
            //             ->pay();

            // $this->makeTransaction($order->id, 'approved');

            // function pay()
            // {

            // }
            $this->pay();
        }

        
        
    }


    public function pay()
    {

        $TurkeyBank = TurkeyBank::setName('test test')
        ->setCardNumber(4025903160410013)
        ->setCardExpireDateMonth(07)
        ->setCardExpireDateYear(20)
        ->setCardCvv2(123)
        ->setOrderId('01-eticaret')
        ->setAmount(100)
        ->pay();


        // list($this->expiry_month, $this->expiry_year) = explode('/', $this->expiry_date);
        // $Name = $this->nameOnCard;
        // $CardNumber = $this->card_number;
        // $CardExpireDateMonth = $this->expiry_month;
        // $CardExpireDateYear = $this->expiry_year;
        // $CardCVV2 = $this->cvv;
        // $MerchantOrderId = "01-eticaret";
        // $Amount = "1037";
        // $CustomerId = "400235";
        // $MerchantId = "496";
        // $OkUrl = route("payment.success") ;
        // $FailUrl = route("payment.failure");
        // $UserName = "apiuser1";
        // $Password = "Api123";
        // $HashedPassword = base64_encode(sha1($Password, "ISO-8859-9"));
        // $HashData  = base64_encode(sha1($MerchantId.$MerchantOrderId.$Amount.$OkUrl.$FailUrl.$UserName.$HashedPassword , "ISO-8859-9"));

        // $xml= '<KuveytTurkVPosMessage xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">'
		// 		.'<APIVersion>1.0.0</APIVersion>'
		// 		.'<OkUrl>'.$OkUrl.'</OkUrl>'
		// 		.'<FailUrl>'.$FailUrl.'</FailUrl>'
		// 		.'<HashData>'.$HashData.'</HashData>'
		// 		.'<MerchantId>'.$MerchantId.'</MerchantId>'
		// 		.'<CustomerId>'.$CustomerId.'</CustomerId>'
		// 		.'<UserName>'.$UserName.'</UserName>'
		// 		.'<CardNumber>'.$CardNumber.'</CardNumber>'
		// 		.'<CardExpireDateYear>'.$CardExpireDateYear.'</CardExpireDateYear>'
		// 		.'<CardExpireDateMonth>'.$CardExpireDateMonth.'</CardExpireDateMonth>'
		// 		.'<CardCVV2>'.$CardCVV2.'</CardCVV2>'
		// 		.'<CardHolderName>'.$Name.'</CardHolderName>'
		// 		.'<CardType>Visa</CardType>'
		// 		.'<BatchID>0</BatchID>'
		// 		.'<TransactionType>Sale</TransactionType>'
		// 		.'<InstallmentCount>0</InstallmentCount>'
		// 		.'<Amount>'.$Amount.'</Amount>'
		// 		.'<DisplayAmount>'.$Amount.'</DisplayAmount>'
		// 		.'<CurrencyCode>0949</CurrencyCode>'
		// 		.'<MerchantOrderId>'.$MerchantOrderId.'</MerchantOrderId>'
		// 		.'<TransactionSecurity>1</TransactionSecurity>'
		// 		.'</KuveytTurkVPosMessage>';
        //         try {
        //             $ch = curl_init();  
        //             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //             curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml', 'Content-length: '. strlen($xml)) );
        //             curl_setopt($ch, CURLOPT_POST, true); //POST Metodu kullanarak verileri g�nder  
        //             curl_setopt($ch, CURLOPT_HEADER, false); //Serverdan gelen Header bilgilerini �nemseme.  
        //             curl_setopt($ch, CURLOPT_URL,'https://boatest.kuveytturk.com.tr/boa.virtualpos.services/Home/ThreeDModelPayGate'); //Baglanacagi URL  
        //             curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            
                
        //             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Transfer sonu�larini al.
        //             $data = curl_exec($ch);  
        //             curl_close($ch);
        //             dd($data);
        
        //             // Process the response and handle any errors if necessary
        
        //             // Redirect to the appropriate page based on the response
                    
        //         } catch (\Exception $e) {
        //             // Handle any exceptions that may occur during the cURL request
        //             // Redirect to a custom error page or show an error message
        //             return redirect()->route('payment.failure')->with('error', 'An error occurred during payment processing.');
        //         }
        
        

    }

    // private function isPaymentSuccessful($xmlResponse)
    // {
    //     // Parse the XML response using SimpleXMLElement
    //     $responseXml = new \SimpleXMLElement($xmlResponse);

    //     // Check the response for success or failure based on your API's response structure
    //     // Example: Assume success if the response contains a certain element or attribute
    //     if (isset($responseXml->Status) && (string) $responseXml->Status === 'SUCCESS') {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function proccessPayment()
    // {
    //     list($this->expiry_month, $this->expiry_year) = explode('/', $this->expiry_date);

    //     $Name = $this->nameOnCard;
    //     $CardNumber = $this->card_number;
    //     $CardExpireDateMonth = $this->expiry_month;
    //     $CardExpireDateYear = $this->expiry_year;
    //     $CardCVV2 = $this-> cvv;
    //     $MerchantOrderId = "01-eticaret";
    //     $Amount = "1037";
    //     $CustomerId = "400235";
    //     $MerchantId = "496";
    //     $OkUrl = route("payment.success") ;
    //     $FailUrl = route("payment.failure");
    //     $UserName = "apiuser1";
    //     $Password = "Api123";
    //     $HashedPassword = base64_encode(sha1($Password, "ISO-8859-9"));
    //     $HashData  = base64_encode(sha1($MerchantId.$MerchantOrderId.$Amount.$OkUrl.$FailUrl.$UserName.$HashedPassword , "ISO-8859-9"));
    //     $xml = '<KuveytTurkVPosMessage xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">'
    //     .'<APIVersion>1.0.0</APIVersion>'
    //     .'<OkUrl>'.$OkUrl.'</OkUrl>'
    //     .'<FailUrl>'.$FailUrl.'</FailUrl>'
    //     .'<HashData>'.$HashData.'</HashData>'
    //     .'<MerchantId>'.$MerchantId.'</MerchantId>'
    //     .'<CustomerId>'.$CustomerId.'</CustomerId>'
    //     .'<UserName>'.$UserName.'</UserName>'
    //     .'<CardNumber>'.$CardNumber.'</CardNumber>'
    //     .'<CardExpireDateYear>'.$CardExpireDateYear.'</CardExpireDateYear>'
    //     .'<CardExpireDateMonth>'.$CardExpireDateMonth.'</CardExpireDateMonth>'
    //     .'<CardCVV2>'.$CardCVV2.'</CardCVV2>'
    //     .'<CardHolderName>'.$Name.'</CardHolderName>'
    //     .'<CardType>MasterCard</CardType>'
    //     .'<BatchID>0</BatchID>'
    //     .'<TransactionType>Sale</TransactionType>'
    //     .'<InstallmentCount>0</InstallmentCount>'
    //     .'<Amount>'.$Amount.'</Amount>'
    //     .'<DisplayAmount>'.$Amount.'</DisplayAmount>'
    //     .'<CurrencyCode>0949</CurrencyCode>'
    //     .'<MerchantOrderId>'.$MerchantOrderId.'</MerchantOrderId>'
    //     .'<TransactionSecurity>3</TransactionSecurity>'
    //     .'</KuveytTurkVPosMessage>';


    //     try {
    //         $ch = curl_init();
    //         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml', 'Content-length: '. strlen($xml)) );
    //         curl_setopt($ch, CURLOPT_POST, true); //POST Metodu kullanarak verileri gönder 
    //         curl_setopt($ch, CURLOPT_HEADER, false); //Serverdan gelen Header bilgilerini önemseme.
    //         curl_setopt($ch,CURLOPT_URL,$this->api_url); //Baglanacagi URL
    //         curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Transfer sonuçlarini al.
    //         $data = curl_exec($ch); curl_close($ch);
    //         }
    //         catch (Exception $e) {
    //         echo 'Caught exception: ', $e->getMessage(), "\n";
    //         }

    //         echo($data);
    //         error_reporting(E_ALL); 
    //         ini_set("display_errors", 1); 
            

        

    // }

    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentMethod;
        $transaction->status = $status;
        $transaction->save();
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {

            return redirect()->route('login');

        } else if ($this->thankyou) {

            return redirect()->route('thankyou');

        } else if (!session()->get('checkout')) {

            return redirect()->route('product.cart');

        }
        
        
        
    }



    
    public function render()
    {
        
        $this->verifyForCheckout();
        $addresses = Shipping::all();
        return view('livewire.checkout-component', ['addresses' => $addresses])->layout('layouts.base');
    }
}
