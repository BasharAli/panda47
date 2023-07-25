<div id="main">
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('Apply to be a Vendor')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Become A Vendor')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Start Register -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">{!!__('Sell on :PANDA47 Application', ['PANDA47' => '<span style="color: rgb(60,130,206);">PANDA</span><span> 47</span>'])!!}</h2>

                        {{-- <h2 class="ec-bg-title">Sell on <span style="color: rgb(60,130,206);">PANDA</span><span> 47</span> Application</h2> --}}
                        <h2 class="ec-title">{!!__('Sell on :PANDA47 Application', ['PANDA47' => '<span style="color: rgb(60,130,206);">PANDA</span><span> 47</span>'])!!}</h2>
                        <p class="sub-title mb-3">{{__('Best Place To Sell Your Products')}}</p>
                    </div>
                    
                </div>
                <div class="ec-register-wrapper">
                    <div class="ec-register-container ec-checkout-wrap">
                        <div class="ec-register-form ec-check-bill-form">
                            <x-jet-validation-errors class="mb-4" />
                            <form wire:submit.prevent="createStore" enctype="multipart/form-data">
                                @auth
                                <input type="hidden" value="" name="user_id" wire:model="user_id">
                                @endauth
                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('Shop Name')}}*</label>
                                    <input type="text" name="shopname" value="" required autofocus wire:model="shopname" wire:keyup="generateSlug"/>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('Shop Slug')}}*</label>
                                    <input type="text" name="shopname" value="" required autofocus wire:model="slug" />
                                </span>
                                <span class="ec-register-wrap">
                                    <label>{{__('Shop Slogan')}} ({{__('Optional')}})</label>
                                    <input type="text" name="shop_slogan" value="" autofocus wire:model="slogan" />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('Business Email')}}*</label>
                                    <input type="email" name="shop_email" value="" required wire:model="email"/>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('Business Phone Number')}}*</label>
                                    <input type="text" name="shop_phone" placeholder=""
                                        required wire:model="phone" />
                                </span>

                                <span class="ec-bill-wrap ec-bill-half">
                                    <label>{{__('Company Type')}} *</label>
                                    <span class="ec-bl-select-inner">
                                        <select name="type" id="ec-select-city" class="ec-bill-select" wire:model="type">
                                            <option value="" selected >{{__('Company Type')}}</option>
                                            @foreach ($cTypes as $type)
                                            <option value="{{$type->cType}}">{{$type->cType}}</option>
                                            @endforeach
                                            
                                            
                                        </select>
                                    </span>
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>TCKN / VKN*</label>
                                    <input type="text" name="tckn" placeholder=""
                                        required wire:model="tckn"/>
                                </span>

                                <span class="ec-register-wrap  ">
                                    <label>{{__('TAX IDENTIFICATION NUMBER')}}*</label>
                                    <input type="text" name="taxid" value="" required autofocus wire:model="taxidn"/>
                                </span>

                                <span class="ec-register-wrap ec-register-half ">
                                    <label>{{__('Bank Name')}}*</label>
                                    <input type="text" name="bank_name" value="" required autofocus wire:model="bank_name"/>
                                </span>

                                <span class="ec-register-wrap ec-register-half ">
                                    <label>{{__('Account Name')}}*</label>
                                    <input type="text" name="account_name" value="" required autofocus wire:model="account_name"/>
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('IBAN')}}*</label>
                                    <input type="text" name="iban" value="" required autofocus wire:model="iban"/>
                                </span>

                                {{-- <span class="ec-bill-wrap ec-bill-half">
                                    <label>{{__('Preffered Delivery Company')}} *</label>
                                    <span class="ec-bl-select-inner">
                                        <select name="delivery" id="ec-select-city" class="ec-bill-select" wire:model="delivery_company">
                                            <option value="" selected >{{__('Delivery Option')}}</option>
                                            @foreach ($deliveries as $delivery)
                                            <option value="{{$delivery->id}}">{{$delivery->name}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </span>

                                <span class="ec-bill-wrap ec-bill-half">
                                    <label>{{__('Preffered Delivery KGs and Prices')}} *</label>
                                    <span class="ec-bl-select-inner">
                                        <select name="prices" id="ec-select-city" class="ec-bill-select" wire:model="delivery_option">
                                            <option value="" selected >{{__('Delivery Option')}}</option>
                                            @foreach ($delivery_prices as $prices)
                                            <option value="{{$prices->id}}">{{$prices->company->name}} - {{$prices->kg}}: {{$prices->charge}} TRY</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </span> --}}
                                



                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('City')}}*</label>
                                    <input type="text" name="city" placeholder=""
                                        required wire:model="city"/>
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('District')}}*</label>
                                    <input type="text" name="district" placeholder=""
                                        required wire:model="district"/>
                                </span>

                                

                                <span class="ec-register-wrap ">
                                    <label>{{__('Shop Logo')}}*</label>
                                    <input type="file" name="shop_logo"  required autofocus wire:model="logo" />
                                </span>

                                <span class="ec-register-wrap ">
                                    <label>{{__('Shop Cover Photo')}} ({{__('Optional')}})</label>
                                    <input type="file" name="shop_cover" value="" autofocus wire:model="cover" />
                                </span>

                                <span class="ec-register-wrap ">
                                    <label>{{__('Shop Description')}} ({{__('Optional')}})</label>
                                    <textarea type="text" name="shop_description" rows="15" value="" autofocus wire:model="description"> </textarea>
                                </span>

                                <span class="ec-register-wrap mt-2 ">
                                    <label>{{__('Refferal Name')}} ({{__('Optional')}})</label>
                                    <input type="text" name="ref" placeholder=""
                                         wire:model="ref_name"/>
                                </span>
                                
                                <span class="ec-register-wrap ec-register-btn">
                                    <button name="submit" class="btn btn-primary" type="submit">{{__('Apply')}}</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Register -->
</div>