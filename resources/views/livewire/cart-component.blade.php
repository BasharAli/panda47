<div id="main">
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('Cart')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Cart')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec cart page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                    <!-- cart content Start -->
                    <div class="ec-cart-content">
                        <div class="ec-cart-inner">
                            <div class="row">
                                <form action="#">
                                    @if (Cart::instance('cart')->count() > 0)
                                    
                                    <div class="table-content cart-table-content mb-3">
                                        @foreach (Cart::instance('cart')->content()->groupBy('options.shop_id') as $groupedItems)
                                            @php
                                                $shop = \App\Models\Shop::where('id', $groupedItems->first()->options['shop_id'])->first();
                                                $totalPrice = $groupedItems->sum(function ($item) {
                                                    return $item->price * $item->qty;
                                                });
                                            @endphp
                                        <table class="mb-4">
                                            
                                            <thead>
                                                <tr>
                                                    <th> <strong>SHOP:</strong> {{$shop->shopname}}</th>
                                                    @if ($totalPrice > 100)
                                                    <th colspan="4"><strong class="text-success">Free Delivery</th>
                                                    @else
                                                    <th colspan="4"><strong>Delivery Charge:</strong> {{$shop->deliveryPrice->charge}} TRY</th>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>{{__('Products')}}</th>
                                                    <th>{{__('Price')}}</th>
                                                    <th style="text-align: center;">{{__('Quantity')}}</th>
                                                    <th>{{__('Total')}}</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                           
                                                
                                            
                                            <tbody>
                                                @foreach ($groupedItems as $product)
                                                <tr>
                                                    <td data-label="Product" class="ec-cart-pro-name"><a
                                                            href="{{url('product/'.$product->model->slug)}}"><img class="ec-cart-pro-img mr-4"
                                                                src="{{asset('main')}}/images/products/{{$product->model->image}}"
                                                                alt="" />{{$product->model->name}}</a></td>
                                                    <td data-label="Price" class="ec-cart-pro-price"><span
                                                            class="amount">TRY {{$product->price}}</span></td>
                                                    <td data-label="Quantity" class="ec-cart-pro-qty"
                                                        style="text-align: center;">
                                                        <div class="row">
                                                            <div  class="col-3">
                                                                <a wire:click.prevent="increaseQuantity('{{$product->rowId}}')" ><span>+</span></a>
                                                            </div>
                                                            <div class="col-4">
                                                                <span>{{$product->qty}}</span>
                                                            </div>
                                                            <div class="col-3">
                                                                <a wire:click.prevent="decreaseQty('{{$product->rowId}}')" ><span>-</span></a>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="cart-qty-plus-minus">
                                                            <input class="cart-plus-minus" type="text"
                                                                name="cartqtybutton" value="{{$product->qty}}" />
                                                        </div> --}}
                                                    </td>
                                                    <td data-label="Total" class="ec-cart-pro-subtotal">TRY {{$product->subtotal}}</td>
                                                    <td data-label="Remove" class="ec-cart-pro-remove">
                                                        <a wire:click.prevent="destroy('{{$product->rowId}}')"><i class="ecicon eci-trash-o"></i></a>
                                                    </td>
                                                </tr>

                                                
                                                @endforeach
                                                
                                            </tbody>
                                            
                                        </table>
                                        @endforeach

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ec-cart-update-bottom">
                                                <a href="{{url('all-shops')}}">{{__('Continue Shopping')}}</a>
                                                <button role="link" wire:click.prevent="checkout" class="btn btn-primary">{{__('Checkout')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="col-12">
                                        <h1 class="text-center"> {{__('Your Shopping Cart Is Empty!')}}</h1>
                                    </div>
                                    <div class="col-12">
                                        
                                    </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>

                <!-- Sidebar Area Start -->
                <div class="ec-cart-rightside col-lg-4 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">{{__('Summary')}}</h3>
                            </div>
                            

                            <div class="ec-sb-block-content">
                                <div class="ec-cart-summary-bottom">
                                    <div class="ec-cart-summary">
                                        <div>
                                            <span class="text-left">{{__('Total')}}</span>
                                            <span class="text-right">TRY {{Cart::instance('cart')->subtotal()}}</span>
                                        </div>
                                        <div>
                                            <span class="text-left">{{__('Tax')}}</span>
                                            <span class="text-right">{{__('Included')}}</span>
                                        </div>
                                        <div>
                                            <span class="text-left">{{__('Please Proceed to Check Out to see Delivery Methods and Charges')}}</span>
                                        </div>
                                        @if (!Session::has('coupon'))
                                            <div>
                                                <span class="text-left">{{__('Coupon Discount')}}</span>
                                                <span class="text-right"><a class="ec-cart-coupan">{{__('Apply Coupon')}}</a></span>
                                            </div>
                                            <div class="ec-cart-coupan-content">
                                                <form class="ec-cart-coupan-form" wire:submit.prevent="applyCouponCode">
                                                    <input class="ec-coupan" type="text" required=""
                                                        placeholder="{{__('Enter Your Coupon Code')}}" name="ec-coupan" value=""  wire:model.defer="couponCode">
                                                    <button class="ec-coupan-btn button btn-primary" type="submit">{{__('Apply')}}</button>
                                                    
                                                </form>
                                                
                                            </div>
                                            @if (Session::has('coupon_message'))
                                                        <div class="text-danger">{{Session::get('coupon_message')}}</div>
                                            @endif
                                        @else
                                        <div>
                                            <span class="text-left">{{__('Coupon Applied')}} ({{Session::get('coupon')['code']}})</span>
                                            <span class="text-right"><a class="ec-cart-coupan" wire:click.prevent="removeCoupon">{{__('Remove Coupon')}}</a></span>
                                        </div>
                                        <div>
                                            <span class="text-left">{{__('Total Discount')}}</span>
                                            <span class="text-right">TRY {{$discount}}</span>
                                        </div>
                                        
                                        @endif
                                        
                                        <div class="ec-cart-summary-total">
                                            @if (Session::has('coupon'))
                                            <span class="text-left">{{__('Total Amount')}}</span>
                                            <span class="text-right">TRY {{$totalAfterDiscount}}</span>
                                            @else
                                            <span class="text-left">{{__('Total Amount')}}</span>
                                            <span class="text-right">TRY {{Cart::instance('cart')->total()}}</span>
                                            @endif
                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    

</div>
