<div id="main">
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('Checkout')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Checkout')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec checkout page -->
    <form wire:submit.prevent="placeOrder">
        <section class="ec-page-content section-space-p">
            <div class="container">
                <div class="row">
                    <div class="ec-checkout-leftside col-lg-8 col-md-12 ">
                        <!-- checkout content Start -->
                        <div class="ec-checkout-content">
                            <div class="ec-checkout-inner">
                                
                                <div class="ec-checkout-wrap margin-bottom-30 padding-bottom-3">
                                    <div class="ec-checkout-block ec-check-bill">
                                        <h3 class="ec-checkout-title">{{__('Billing Details')}}</h3>
                                        <div class="ec-bl-block-content">
                                            <div class="ec-check-subtitle">{{__('Checkout Options')}}</div>
                                            <span class="ec-bill-option">
                                                {{-- <span>
                                                    <input type="radio" id="bill1" name="radio-group" wire:model="selectedRadio" value="old" checked>
                                                    <label for="bill1">I want to use an existing address</label>
                                                </span>
                                                <span>
                                                    <input type="radio" id="bill2" name="radio-group" wire:model="selectedRadio" value="new">
                                                    <label for="bill2">I want to use new address</label>
                                                </span> --}}

                                                <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="new" id="new" value="new" wire:model="selectedRadio" style="margin-right: 10px; padding: inherit; margin-top: 3px;">
                                                    {{__('Ship to a new address')}}
                                                </label>
                                                </div>
                                            </span>

                                            @if ($selectedRadio == 'new')
                                            <div class="ec-check-bill-form">
                                                    <span class="ec-bill-wrap ec-bill-half">
                                                        <label>{{__('First Name')}}*</label>
                                                        <input type="text" name="firstname"
                                                            placeholder="{{__('First Name')}}" wire:model="name" required />
                                                    </span>
                                                    <span class="ec-bill-wrap ec-bill-half">
                                                        <label>{{__('Last Name')}}*</label>
                                                        <input type="text" name="lastname"
                                                            placeholder="{{__('Last Name')}}" wire:model="lastname" required />
                                                    </span>
                                                    <span class="ec-bill-wrap ec-bill-half">
                                                        <label>{{__('Email')}}*</label>
                                                        <input type="email" name="email"
                                                            placeholder="example@example.com" wire:model="email" required />
                                                    </span>
                                                    <span class="ec-bill-wrap ec-bill-half">
                                                        <label>{{__('Phone Number')}}*</label>
                                                        <input type="number" name="phone"
                                                            placeholder="+90XXXXXXXXX" wire:model="phone" required />
                                                    </span>
                                                    <span class="ec-bill-wrap">
                                                        <label>{{__('Address 1')}}*</label>
                                                        <input type="text" name="address1" wire:model="line1" placeholder="Address Line 1" required />
                                                    </span>
                                                    <span class="ec-bill-wrap">
                                                        <label>{{__('Address 2')}}</label>
                                                        <input type="text" name="address2" wire:model="line2" placeholder="Address Line 2" />
                                                    </span>
                                                
                                                    <span class="ec-bill-wrap ec-bill-half">
                                                        <label>{{__('City')}}*</label>
                                                        <input type="text" name="city"
                                                            placeholder="Enter your city" wire:model="city" required />
                                                    </span>
                                                    <span class="ec-bill-wrap ec-bill-half">
                                                        <label>{{__('Post Code')}}</label>
                                                        <input type="text" name="postalcode" wire:model="zipcode" placeholder="Post Code" />
                                                    </span>
                                                    
                                                    <span class="ec-bill-wrap ec-bill-half">
                                                        <label>{{__('Province')}} *</label>
                                                        <input type="text" name="province" wire:model="province" placeholder="Province" />
                                                    </span>
                                                    
                                                    <span class="ec-bill-wrap ec-bill-half">
                                                        <label>{{__('Country')}} *</label>
                                                        <input type="text" name="country" wire:model="country" placeholder="Country" />
                                                    </span>
                                                
                                            </div>
                                            @else
                                            <div class="ec-check-bill-form">
                                                    <span class="ec-bill-wrap ec-bill-half">
                                                        <label>{{__('Please select an existing address')}} *</label>
                                                        <span class="ec-bl-select-inner">
                                                            <select name="ec_select_city" id="ec-select-city" class="ec-bill-select" wire:model="oldAddress">
                                                                <option selected value="">{{__('Saved Address')}}</option>
                                                                @foreach ($addresses as $adres)
                                                                <option value="{{$adres->id}}">{{$adres->city}}</option>
                                                                @endforeach
                                                            </select>
                                                        </span>
                                                    </span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--cart content End -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <div class="ec-checkout-rightside col-lg-4 col-md-12">
                        <div class="ec-sidebar-wrap">
                            <!-- Sidebar Summary Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">{{__('Summary')}}</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <div class="ec-checkout-summary">
                                        <div>
                                            <span class="text-left">{{__('Sub-Total')}}</span>
                                            <span class="text-right">
                                            @if (Session::has('checkout'))
                                                TRY {{Session::get('checkout')['total']}} 
                                                @endif 
                                            </span>
                                        </div>
                                        <div>
                                            <span class="text-left">{{__('Delivery Charges')}}</span>
                                            <span class="text-right">
                                                @if ($final_delivery_charge > 0)
                                                {{$final_delivery_charge}} TRY
                                                @else
                                                    Free Delivery
                                                @endif
                                            </span>
                                        </div>
                                    
                                        <div class="ec-checkout-summary-total">
                                            <span class="text-left">{{__('Total Amount')}}</span>
                                            <span class="text-right">
                                                @if (Session::has('checkout')) 
                                                TRY {{number_format((float)str_replace(',', '', Session::get('checkout')['total']) + Session::get('checkout')['charges'], 2, '.', ',')}}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- Sidebar Summary Block -->
                        </div>
                        {{-- <div class="ec-sidebar-wrap ec-checkout-del-wrap">
                            <!-- Sidebar Summary Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">Delivery Method</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <div class="ec-checkout-del">
                                        <div class="ec-del-desc">Please select the preferred shipping method to use on this
                                            order.</div>
                                        <form action="#">
                                            <span class="ec-del-option">
                                                <span>
                                                    <span class="ec-del-opt-head">Free Shipping</span>
                                                    <input type="radio" id="del1" name="radio-group" checked>
                                                    <label for="del1">Rate - $0 .00</label>
                                                </span>
                                                <span>
                                                    <span class="ec-del-opt-head">Flat Rate</span>
                                                    <input type="radio" id="del2" name="radio-group">
                                                    <label for="del2">Rate - $5.00</label>
                                                </span>
                                            </span>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Summary Block -->
                        </div> --}}
                        <div class="ec-sidebar-wrap ec-checkout-pay-wrap">
                            <!-- Sidebar Payment Block -->
                            <div class="ec-sidebar-block">
                                <div class="ec-sb-title">
                                    <h3 class="ec-sidebar-title">{{__('Payment Method')}}</h3>
                                </div>
                                <div class="ec-sb-block-content">
                                    <div class="ec-checkout-pay">
                                        <div class="ec-pay-desc">{{__('Please select the preferred payment method to use on this order')}}.</div>
                                            <span class="ec-pay-option">
                                                    <input type="radio" id="pay1" name="radio-group" value="cod" wire:model="paymentMethod">
                                                    <label for="pay1">{{__('Cash On Delivery')}} ({{__('Cash On Delivery Option is not Available right now, please proceed with online payment')}})</label>
                                            </span>
                                            
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Payment Block -->
                        </div>
                        <div class="ec-sidebar-wrap ec-check-pay-img-wrap">
                            <!-- Sidebar Payment Block -->
                            <div class="ec-sidebar-block">
                                <span class="ec-pay-option">
                                    <span>
                                        <input type="radio" id="pay2" name="radio-group" value="card" wire:model="paymentMethod" >
                                        <label for="pay2">{{__('Online Payment')}}</label>
                                    </span>
                                </span>
                                @if ($paymentMethod == 'card')
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                        <input type="text"
                                            class="form-control" name="cardnumber" id="cardnumber" aria-describedby="helpId" placeholder="Card Number" wire:model="card_number">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                        <input type="text"
                                            class="form-control" name="expiryDate" id="expiryDate" aria-describedby="exphelp" placeholder="MM/YY" wire:model="expiry_date">
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                        <input type="password"
                                            class="form-control" name="cvvinput" id="cvvinput" aria-describedby="cvvhelp" placeholder="CVV" wire:model="cvv">
                                        </div>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                        <input type="text"
                                            class="form-control" name="nameonCard" id="nameonCard" aria-describedby="helpId" placeholder="Your Name On Card" wire:model="nameOnCard">
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="ec-sb-block-content">
                                    <div class="ec-check-pay-img-inner">
                                        
                                        
                                        <div class="ec-check-pay-img">
                                            <img src="{{asset('main')}}/images/icons/payment4.png" alt="">
                                        </div>
                                        <div class="ec-check-pay-img">
                                            <img src="{{asset('main')}}/images/icons/payment5.png" alt="">
                                        </div>
                                    
                                        <div class="ec-check-pay-img">
                                            <img src="{{asset('main')}}/images/icons/payment7.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar Payment Block -->
                        </div>
                        <span class="ec-check-order-btn">
                            <button type="submit" role="submit" class="btn btn-primary">{{__('Place Order')}}</button>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>