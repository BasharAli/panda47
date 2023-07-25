<div>
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('Thank You')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Thank You')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ec-page-content section-space-p">
        <div class="container">
            <!-- Track Order Content Start -->
            <div class="ec-trackorder-content col-md-12">
                <div class="ec-trackorder-inner">
                    <div class="ec-trackorder-top">
                        <h2 class="ec-order-id">{{__('Thank You for your order')}}</h2>
                        <div><a href="{{ url('thank-you/' . session('user_id') . '/' . session('order_id')) }}">{{__('See Invoice')}}</a></div>
                        <div class="ec-order-detail">
                            <div>{{__('A confirmation email was sent')}}</div>
                            <div><a href="{{url('all-shops')}}">{{__('Continue Shopping')}}</a></div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Track Order Content end -->
        </div>
    </section>
</div>
