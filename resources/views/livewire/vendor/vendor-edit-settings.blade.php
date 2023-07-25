<div>
    
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Vendor Edit Settings</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="ec-breadcrumb-item"><a href="{{url('myaccount/'.$shop->slug)}}">My Shop</a></li>
                                <li class="ec-breadcrumb-item active">Edit Settings</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ec-page-content ec-vendor-uploads  section-space-p">


        <div class="container">
            <div class="row">
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <div class="ec-vendor-block-bg" style="background-image: url(/main/images/covers/{{$shop->shop_cover}})"></div>
                                <div class="ec-vendor-block-detail">
                                    <img class="v-img" src="{{asset('main')}}/images/logos/{{$shop->shop_logo}}" alt="vendor image">
                                    <h5>{{$shop->shopname}}</h5>
                                </div>
                                <div class="ec-vendor-block-items">
                                    <ul>
                                        <li><a href="{{url('myaccount/'.$shop->slug)}}">Dashboard</a></li>
                                        <li><a href="{{url('myaccount/'.$shop->slug.'/orders')}}">Orders</a></li>
                                        <li><a href="{{url('myaccount/'.$shop->slug.'/products')}}">Products</a></li>
                                        <li><a href="{{url('myaccount/'.$shop->slug.'/info')}}">Shop Info</a></li>
                                        <li><a href="{{url('myaccount/'.$shop->slug.'/delivery')}}">Delivery Prefferences</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ec-register-wrapper col-lg-9 col-md-12">
                    <div class="ec-register-container ec-checkout-wrap">
                        <div class="ec-register-form ec-check-bill-form">
                            <x-jet-validation-errors class="mb-4" />
                            <form wire:submit.prevent="updateStore" enctype="multipart/form-data">
                                @auth
                                <input type="hidden" value="" name="user_id" wire:model="user_id">
                                @endauth
                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('Shop Name')}}*</label>
                                    <input type="text" name="shopname" value="" required autofocus wire:model="shopname" wire:keyup="generateSlug"/>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('Shop Slug')}}*</label>
                                    <input type="text" name="shopname" value="" required autofocus wire:model="new_shop_slug" />
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
                                    <input type="text" name="shop_phone" placeholder="Enter your phone number"
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
                                    <input type="text" name="tckn" placeholder="Enter your phone number"
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
                                    <input type="text" name="taxid" value="" required autofocus wire:model="account_name"/>
                                </span>

                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('IBAN')}}*</label>
                                    <input type="text" name="taxid" value="" required autofocus wire:model="iban"/>
                                </span>

                                {{-- <span class="ec-bill-wrap ec-bill-half">
                                    <label>{{__('Preffered Delivery Option')}} *</label>
                                    <span class="ec-bl-select-inner">
                                        <select name="delivery" id="ec-select-city" class="ec-bill-select" wire:model="pref_delivery_id">
                                            <option value="" selected >{{__('Delivery Option')}}</option>
                                            @foreach ($deliveries as $delivery)
                                            <option value="{{$delivery->id}}">{{$delivery->name}} ({{$delivery->charge}})</option>
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
                                    <input type="file" name="shop_logo"   autofocus wire:model="new_logo" />
                                </span>

                                <span class="ec-register-wrap ">
                                    <label>{{__('Shop Cover Photo')}} ({{__('Optional')}})</label>
                                    <input type="file" name="shop_cover" value="" autofocus wire:model="new_cover" />
                                </span>

                                <span class="ec-register-wrap ">
                                    <label>{{__('Shop Description')}} ({{__('Optional')}})</label>
                                    <textarea type="text" name="shop_description" rows="15" value="" autofocus wire:model="description"> </textarea>
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


</div>
