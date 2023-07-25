<div>
    
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Vendor Delivery Prefferences</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="ec-breadcrumb-item"><a href="{{url('myaccount/'.$shop->slug)}}">My Shop</a></li>
                                <li class="ec-breadcrumb-item active">Delivery Prefferences</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ec-page-content ec-vendor-uploads section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
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
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        
                                        
                                        <h5>Delivery Information</h5>
                                        

                                        <div class="row">
                                            
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30 space-bottom-30">
                                                    <h6>Preffered Delivery Option</h6>
                                                    <ul>
                                                        <li>
                                                            @if ($shop->delivery)
                                                                {{$shop->delivery->name}}
                                                            @else
                                                                <p>Not Selected</p>
                                                            @endif
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30 space-bottom-30">
                                                    <h6>Preffered Delivery Option</h6>
                                                    <ul>
                                                        <li>
                                                            @if ($shop->deliveryPrice)
                                                                {{$shop->deliveryPrice->kg}} KG: ({{$shop->deliveryPrice->charge}})TRY
                                                            @else
                                                                <p>Not Selected</p>
                                                            @endif
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <a href="{{url('myaccount/'.$shop->slug.'/delivery/edit')}}" class="btn btn-lg btn-primary" >Edit</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
