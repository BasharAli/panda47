<div>
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('History')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('History')}}</li>
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
                    <div class="ec-vendor-dashboard-card space-bottom-30">
                        <div class="ec-vendor-card-header">
                            <h5>{{__('Invoices')}}</h5>
                            
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                <table class="table ec-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">{{__('ID')}}</th>
                                            <th scope="col">{{__('Amount Paid')}}</th>
                                            <th scope="col">{{__('Order Date & Time')}}</th>
                                            <th scope="col">{{__('Actions')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invoices as $invoice)
                                        <tr>
                                            <th scope="row"><span>#{{$invoice->invoiceNumber}}</span></th>
                                            <td><span>TRY {{$invoice->order->total}}</span></td>                                            
                                            <td><span>{{ $invoice->created_at->format('M d, Y') }}</span></td>
                                            <td>
                                                <a href="{{ url('thank-you/' . $invoice->user_id . '/' . $invoice->order_id) }}" role="button" class="btn btn-success">{{__('See Invoice')}}</a>
                                                <a wire:click="downloadInvoice({{$invoice->id}})" role="button" class="btn btn-success">{{__('Download Invoice')}}</a>
                                            </td>
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
</div>