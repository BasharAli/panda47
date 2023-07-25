<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    
    
    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{public_path('main/css/vendor/ecicons.min.css')}}" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{public_path('main/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{public_path('main/css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{public_path('main/css/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{public_path('main/css/plugins/countdownTimer.css')}}" />
    <link rel="stylesheet" href="{{public_path('main/css/plugins/slick.min.css')}}" />
    <link rel="stylesheet" href="{{public_path('main/css/plugins/nouislider.css')}}" />

    <link rel="stylesheet" href="{{public_path('main/css/plugins/bootstrap.css')}}" />

    <!-- Main Style -->
    
    <link rel="stylesheet" href="{{public_path('main/css/demo1.css')}}" />
    <link rel="stylesheet" href="{{public_path('main/css/style.css')}}" />
    <link rel="stylesheet" href="{{public_path('main/css/responsive.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" integrity="sha512-WWc9iSr5tHo+AliwUnAQN1RfGK9AnpiOFbmboA0A0VJeooe69YR2rLgHw13KxF1bOSLmke+SNnLWxmZd8RTESQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" integrity="sha512-KRrxEp/6rgIme11XXeYvYRYY/x6XPGwk0RsIC6PyMRc072vj2tcjBzFmn939xzjeDhj0aDO7TDMd7Rbz3OEuBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Background css -->
    
    <link rel="stylesheet" id="bg-switcher-css" href="{{public_path('main/css/backgrounds/bg-4.css')}}">
    @if (App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{public_path('main/css/rtl.css')}}" class="rtl">
    @endif
    @livewireStyles
    @livewireScripts

    <style>
        #slider-round {
    height: 10px;
}

#slider-round .noUi-connect {
    background: rgb(255,211,21);
}

#slider-round .noUi-handle {
    height: 18px;
    width: 18px;
    top: -5px;
    right: -9px; /* half the width */
    border-radius: 9px;
}
    </style>
</head>

<body>

<div>
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card">
                        <div class="ec-vendor-card-header">
                            <h5>Invoice</h5>
                        </div>
                        <div class="ec-vendor-card-body padding-b-0">
                            <div class="page-content">
                                <div class="page-header text-blue-d2">
                                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('main/images/logo/logo-5.png'))) }}" alt="Site Logo" width="70" height="150">
                                </div>
                                <div class="container px-0">
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <hr class="row brc-default-l1 mx-n1 mb-4" />
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="my-2">
                                                        <span class="text-sm text-grey-m2 align-middle">To : </span>
                                                        <span class="text-600 text-110 text-blue align-middle">{{$order->user->firstname . ' ' . $order->user->lastname}}</span>
                                                    </div>
                                                    <div class="text-grey-m2">
                                                        <div class="my-2">
                                                            {{$order->line1 . ', ' . $order->line2}}
                                                        </div>
                                                        <div class="my-2">
                                                            {{$order->city . ', ' . $order->province . ', ' . $order->country . ', ' . $order->zipcode}}
                                                        </div>
                                                        <div class="my-2"><b class="text-600">Phone : </b>{{$order->user->phone}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.col -->

                                                <div
                                                    class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                    <hr class="d-sm-none" />
                                                    <div class="text-grey-m2">
                                                        <div class="my-2"><span class="text-600 text-90">Issue Date :
                                                            </span> {{ $order->invoice->created_at->format('M d, Y') }}</div>

                                                        <div class="my-2"><span class="text-600 text-90">Invoice No :
                                                            </span>{{$order->invoice->invoiceNumber}}</div>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>

                                            <div class="mt-4">

                                                <div class="text-95 text-secondary-d3">
                                                    <div class="ec-vendor-card-table">
                                                        <table class="table ec-table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">ID</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">Qty</th>
                                                                    <th scope="col">Shop Name</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($order->orderItems as $ord)
                                                                    <tr>
                                                                        <th><span>#{{$ord->product->SKU}}</span></th>
                                                                        <td><span>{{$ord->product->name}}</span></td>
                                                                        <td><span>TRY {{$ord->product->final_price}}</span></td>
                                                                        <td><span>{{$ord->quantity}}</span></td>
                                                                        <td><span>{{$ord->product->shop->shopname}}</span></td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                
                                                                <tr>
                                                                    
                                                                    <td class="border-color m-m15"
                                                                        colspan="1"><span><strong>Total</strong></span>
                                                                    </td>
                                                                    <td class="border-color m-m15">
                                                                        <span>TRY {{$order->total}}</span></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
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
        </div>
    </section>
</div>

</body>
</html>
