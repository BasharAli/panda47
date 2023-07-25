<div>
    
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Vendor Edit Delivery</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="ec-breadcrumb-item"><a href="{{url('myaccount/'.$shop->slug)}}">My Shop</a></li>
                                <li class="ec-breadcrumb-item active">Edit Delivery</li>
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
                            <form wire:submit.prevent="updateDelivery" enctype="multipart/form-data">
                               

                                <span class="ec-bill-wrap ec-bill-half">
                                    <label>{{__('Preffered Delivery Option')}} *</label>
                                    <span class="ec-bl-select-inner">
                                        <select id="ec-select-city" class="ec-bill-select" wire:model="delivery_company">
                                            <option value="" selected >{{__('Delivery Company')}}</option>
                                            @foreach ($kargo_companies as $delivery)
                                            <option value="{{$delivery->id}}">{{$delivery->name}}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </span>

                                <span class="ec-bill-wrap ec-bill-half">
                                    <label>{{__('Preffered Delivery Price and Weight')}} *</label>
                                    <span class="ec-bl-select-inner">
                                        <select name="delivery" id="ec-select-city" class="ec-bill-select" wire:model="delivery_option">
                                            <option value="" selected >{{__('Delivery Option')}}</option>
                                            @foreach ($kargo_prices as $price)
                                            <option value="{{$price->id}}">{{$price->kg}} KG:  ({{$price->charge}} TRY)</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </span>
                                



                               
                                
                                <span class="ec-register-wrap ec-register-btn">
                                    <button name="submit" class="btn btn-primary" type="submit">{{__('Edit')}}</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
