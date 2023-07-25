<div>
    
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Vendor Settings</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="ec-breadcrumb-item"><a href="{{url('myaccount/'.$shop->slug)}}">My Shop</a></li>
                                <li class="ec-breadcrumb-item active">Settings</li>
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
                                        <div class="ec-vendor-block-img space-bottom-30">
                                            <div class="ec-vendor-block-bg" style="background-image: url(/main/images/covers/{{$shop->shop_cover}})">
                                                <a href="{{url('myaccount/'.$shop->slug.'/info/edit')}}" class="btn btn-lg btn-primary" >Edit Details</a>
                                            </div>
                                            <div class="ec-vendor-block-detail">
                                                <img class="v-img" src="{{asset('main')}}/images/logos/{{$shop->shop_logo}}" alt="vendor image">
                                                <h5 class="name">{{$shop->shopname}}</h5>
                                                <p>{{$shop->shop_slogan}}</p>
                                            </div>
                                        </div>
                                        <div class="ec-vendor-block-about space-bottom-30">
                                            <h5>About Our Firm</h5>
                                            <p>
                                                {{$shop->shop_description}}
                                            </p>
                                            
                                        </div>
                                        <h5>Shop Information</h5>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                    <h6>E-mail address </h6>
                                                    <ul>
                                                        <li><strong>Email 1 : </strong>{{$shop->shop_email}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>Contact nubmer</h6>
                                                    <ul>
                                                        <li><strong>Phone Nubmer 1 : </strong>{{$shop->shop_phone}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30 space-bottom-30">
                                                    <h6>Address</h6>
                                                    <ul>
                                                        <li><strong>Store : </strong>
                                                            {{$shop->city}}, {{$shop->district}}
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30 space-bottom-30">
                                                    <h6>Preffered Delivery Option</h6>
                                                    <ul>
                                                        <li>
                                                            @if ($shop->setting->delivery)
                                                                {{$shop->setting->delivery->name}} ({{$shop->setting->delivery->charge}})
                                                            @else
                                                                <p>Not Selected</p>
                                                            @endif
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>Legal Information</h6>
                                                    <ul>
                                                        <li><strong>Tax ID: </strong>{{$shop->taxid}}</li>
                                                        <li><strong>TCKN : </strong>{{$shop->tckn}}</li>
                                                        <li><strong>Business Type : </strong>{{$shop->type}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>Financial Information</h6>
                                                    <ul>
                                                        <li><strong>Bank Name: </strong>{{$shop->setting->bank_name}}</li>
                                                        <li><strong>Account Name: </strong>{{$shop->setting->account_name}}</li>
                                                        <li><strong>IBAN : </strong>{{$shop->setting->iban}}</li>
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
            </div>
        </div>
    </section>


</div>
