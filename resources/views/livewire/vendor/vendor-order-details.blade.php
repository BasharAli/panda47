<div>
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('Order Details')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Orders Details')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <!-- <div class="ec-vendor-block-bg"></div>
                                <div class="ec-vendor-block-detail">
                                    <img class="v-img" src="/images/user/1.jpg" alt="vendor image">
                                    <h5>Mariana Johns</h5>
                                </div> -->
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
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <div class="ec-vendor-block-img space-bottom-30">
                                            
                                            <div class="ec-vendor-block-detail">
                                                <h5 class="name">{{__('Order NO.')}} #OR{{$order->id}}</h5>
                                            </div>
                                        </div>
                                        <h5>{{__('Shipping Info')}}</h5>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                    <h6>{{__('Shipping Number')}} </h6>
                                                    <ul>
                                                        <li>824625661</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Shipping Company')}}</h6>
                                                    <ul>
                                                        <li>{{$shop->delivery->name}}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Shipping Price')}}</h6>
                                                    <ul>
                                                        <li>
                                                            TRY {{$shop->deliveryPrice->charge}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <h5>{{__('Order Info')}}</h5>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                    <h6>{{__('Number of Items')}} </h6>
                                                    <ul>
                                                        <li>{{$orderItems->count()}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Total Amount Paid')}}</h6>
                                                    <ul>
                                                        <li>{{$orderItems->sum('final_price')}}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Payment Method Used')}}</h6>
                                                    <ul>
                                                        <li>
                                                            @if ($order->transactionss->mode == 'cod')
                                                                {{__('Cash On Delivery')}}
                                                            @else
                                                                {{__('Online Payment')}}
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Shipped to Name')}}</h6>
                                                    <ul>
                                                        <li>{{$order->firstname}} {{$order->lastname}}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Contact Mobile Number')}}</h6>
                                                    <ul>
                                                        <li>{{$order->mobile}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Contact Email')}}</h6>
                                                    <ul>
                                                        <li>{{$order->email}}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Order Status')}}</h6>
                                                    <ul>
                                                        <li>{{$order->status}}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Order Date & Time')}}</h6>
                                                    <ul>
                                                        <li>{{$order->created_at}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-shop-rightside col-lg-12 col-md-12 mt-5">
                    <div class="ec-vendor-dashboard-card space-bottom-30">
                        <div class="ec-vendor-card-header">
                            <h5>{{__('Order Details')}}</h5>
                            
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                <table class="table ec-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product Image</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price (including tax)</th>
                                            <th scope="col">From Shop</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Sub-Total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orderItems as $order)
                                        <tr>
                                            <th scope="row"><span>#{{$order->product->SKU}}</span></th>
                                            <td><img class="prod-img" src="{{asset('main')}}/images/products/{{$order->product->image}}"
                                                alt="product image"></td>
                                            <td><span>{{$order->product->name}}</span></td>
                                            <td><span>TRY {{$order->product->final_price}}</span></td>
                                            <td><span>{{$order->product->shop->shopname}}</span></td>
                                            
                                            <td><span>{{$order->quantity}}</span></td>
                                            <td><span>{{$order->final_price}}</span></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <th scope="row">{{__('Total')}}: {{$orderItems->sum('final_price')}}</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>