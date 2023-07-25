<div>
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{!!__(':USER Profile', ['USER' => $user->firstname])!!}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Profile')}}</li>
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
                                        <li><a href="{{url('user/dashboard')}}">{{__('Profile')}}</a></li>
                                        <li><a href="{{url('user/dashboard/order-history')}}">{{__('History')}}</a></li>
                                        {{-- <li><a href="track-order.html">{{__('Track Order')}}</a></li> --}}
                                        <li><a href="{{url('user/dashboard/invoices')}}">{{__('Invoices')}}</a></li>
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
                                                <h5 class="name">{{$user->firstname}} {{$user->lastname}}</h5>
                                            </div>
                                            <p>{{__('Hello')}} <span>{{$user->firstname}} {{$user->lastname}}</span></p>
                                            <p>{{__('From your account you can easily view and track orders. You can manage and change your account information.')}}</p>
                                        </div>
                                        <h5>{{__('Account Information')}}</h5>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                    <h6>{{__('E-mail address')}} </h6>
                                                    <ul>
                                                        <li>{{$user->email}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Contact number')}}</h6>
                                                    <ul>
                                                        <li>{{$user->phone}}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Full Name')}}</h6>
                                                    <ul>
                                                        <li>{{$user->firstname}} {{$user->lastname}}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>{{__('Birthdate')}}</h6>
                                                    <ul>
                                                        <li>{{$user->date}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address">
                                                    <h6>{{__('Shipping Addresses')}} <small>{{__('You can add new address while on checkout')}}</small> </h6>
                                                    <ul>
                                                        @foreach ($user->shippings as $adres)
                                                        <li style="border: 1px solid black; padding:10px;">
                                                            <strong>{{$adres->city}} : </strong>
                                                            {{$adres->country}}, {{$adres->zipcode}}, {{$adres->city}}, {{$adres->province}}, {{$adres->line1}} @if ($adres->line2)
                                                                , {{$adres->line2}}
                                                            @endif
                                                        </li> <a href="" wire:click.prevent="deleteAddress({{$adres->id}})">{{__('Delete')}}</a>
                                                        @endforeach
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="{{url('user/dashboard/edit-account-details/'.$user->id)}}" class="btn  btn-primary mt-3" >{{__('Edit Your Details')}}</a>
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