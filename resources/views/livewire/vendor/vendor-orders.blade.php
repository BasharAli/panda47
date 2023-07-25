<div>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Vendor Dashboard</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="ec-breadcrumb-item"><a href="{{url('myaccount/'.$shop->slug)}}">My Shop</a></li>
                                <li class="ec-breadcrumb-item active">Dashboard</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Vendor dashboard section -->
    <section class="ec-page-content ec-vendor-dashboard section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
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
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    
                    <div class="ec-vendor-dashboard-card space-bottom-30">
                        <div class="ec-vendor-card-header">
                            <h5>Latest Orders</h5>
                            <div class="ec-header-btn">
                            </div>
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                <table class="table ec-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Items</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Payment Method</th>
                                            <th scope="col">Order Date & Time</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row"><span>#OR{{$order->id}}</span></th>
                                            <td><span>{{ count($order->orderItems->where('product.shop_id', $order->orderItems->first()->product->shop_id)) }}</span></td>
                                            <td><span>{{$order->status}}</span></td>
                                            <td><span>
                                                @if ($order->transactionss->mode == 'cod')
                                                    {{__('Cash On Delivery')}}
                                                @else
                                                    {{__('Online Payment')}}
                                                @endif
                                            </span></td>
                                            <td><span>{{$order->created_at}}</span></td>
                                            <td><a href="{{url('myaccount/'.$shop->slug.'/orders/order-details/'.$order->id)}}" role="button" class="btn btn-success">{{__('See Order')}}</a></td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Vendor dashboard section -->
</div>

