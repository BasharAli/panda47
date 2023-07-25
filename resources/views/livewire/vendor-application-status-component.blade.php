<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">{{__('Shop Application Status')}}</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                            <li class="ec-breadcrumb-item active">{{__('Shop Application Status')}}</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- Ec Track Order section -->
<section class="ec-page-content section-space-p">
    <div class="container">
        <!-- Track Order Content Start -->
        <div class="ec-trackorder-content col-md-12">
            <div class="ec-trackorder-inner">
                <div class="ec-trackorder-top">
                    <h2 class="ec-order-id">{{__('Shop Name')}}: {{$status->shopname}}</h2>
                    <div class="ec-order-detail">
                        <div>{{__('Application Submitted on')}}: {{$status->created_at->format('Y-m-d')}}</div>
                    </div>
                </div>
                <div class="ec-trackorder-bottom">
                    <div class="ec-progress-track">
                        <ul id="ec-progressbar">
                            <li class="step0 active"><span class="ec-track-icon"> </span><span class="ec-progressbar-track"></span><span class="ec-track-title">
                                {!! __('Application :BR Received', ['BR' => '<br>']) !!}</span>
                            </li>
                            <li class="step0 active"><span class="ec-track-icon"> </span><span class="ec-progressbar-track"></span><span class="ec-track-title">
                                {!!__('Contract :BR Sent', ['BR'=>'<br>'])!!}</span></li>
                            @if ($status->payment_status == "no")
                            <li 
                            @if ($status->payments()->where('payment_status', 'approved')->exists())
                            class="step0 active"
                            @else
                            class="step0"
                            @endif
                            ><span class="ec-track-icon"> </span><span class="ec-progressbar-track"></span><span class="ec-track-title">
                                 {!! __('Pending :BR Payment', ['BR'=>'<br>'])!!}</span>
                                @if ($status->payments()->where('payment_status', 'pending')->exists())
                                <a class="btn btn-primary mt-1 ml-1" href="javascript:void(0)">{{__('Pending')}}</a></li>
                                @elseif(!$status->payments()->exists())
                                <a class="btn btn-primary mt-1 ml-1" href="{{url('/'.$status->slug.'/pay')}}">{{__('Pay Now')}}</a></li>
                                @else
                                <a class="btn btn-primary mt-1 ml-1" href="javascript:void(0)">{{__('Payment Approved')}}</a></li>
                                @endif

                            @elseif($status->payment_status == "yes")
                            <li class="step0 active"><span class="ec-track-icon"> </span><span class="ec-progressbar-track"></span><span class="ec-track-title">
                                {!! __('Pending :BR Payment', ['BR'=>'<br>'])!!}</span></li>

                                <li class="step0 active"><span class="ec-track-icon"> </span><span class="ec-progressbar-track"></span><span class="ec-track-title">
                                 {!!__('Pending :BR Approval', ['BR'=>'<br>'])!!}</span></li>
                             
                            <li @if ($status->shop_status == "pending")
                                class="step0"
                                @else
                                class="step0 active"
                                @endif
                                ><span class="ec-track-icon"></span><span class="ec-progressbar-track"></span><span class="ec-track-title">
                                {!!__('Shop :BR Active', ['BR'=>'<br>'])!!}</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
                @if ($status->shop_status == "active")
                <div class="container-fluid text-center mt-5">
                    <a href="{{url('/myaccount/'.$status->slug)}}"  class="btn btn-primary">{{__('Go To Your Shop')}}</a>
                </div>
                @endif
            </div>
        </div>
        <!-- Track Order Content end -->
    </div>
</section>
<!-- End Track Order section -->

