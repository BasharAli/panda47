<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    
    <title>Panda 47 | Türkiye</title>
    <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="basharAli">

    <!-- site Favicon -->
    <link rel="icon" href="{{asset('main')}}/images/logo/logo-5.png" sizes="32x45" />
    <link rel="apple-touch-icon" href="{{asset('main')}}/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="{{asset('main')}}/images/favicon/favicon.png" />

    
    
    <!-- css Icon Font -->
    <link rel="stylesheet" href="{{asset('main')}}/css/vendor/ecicons.min.css" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{asset('main')}}/css/plugins/animate.css" />
    <link rel="stylesheet" href="{{asset('main')}}/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{asset('main')}}/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="{{asset('main')}}/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="{{asset('main')}}/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="{{asset('main')}}/css/plugins/nouislider.css" />

    <link rel="stylesheet" href="{{asset('main')}}/css/plugins/bootstrap.css" />

    <!-- Main Style -->
    
    <link rel="stylesheet" href="{{asset('main')}}/css/demo1.css" />
    <link rel="stylesheet" href="{{asset('main')}}/css/style.css" />
    <link rel="stylesheet" href="{{asset('main')}}/css/responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" integrity="sha512-WWc9iSr5tHo+AliwUnAQN1RfGK9AnpiOFbmboA0A0VJeooe69YR2rLgHw13KxF1bOSLmke+SNnLWxmZd8RTESQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css" integrity="sha512-KRrxEp/6rgIme11XXeYvYRYY/x6XPGwk0RsIC6PyMRc072vj2tcjBzFmn939xzjeDhj0aDO7TDMd7Rbz3OEuBQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Background css -->
    
    <link rel="stylesheet" id="bg-switcher-css" href="{{asset('main')}}/css/backgrounds/bg-4.css">
    @if (App::getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('main')}}/css/rtl.css" class="rtl">
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
<body class="checkout_page compare_page">
    <div>
    <div id="ec-overlay"><span class="loader_img"></span></div>

    <!-- Header start  -->
    <header class="ec-header">
        <!--Ec Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Header Top social Start -->
                    <div class="col text-left header-top-left d-none d-lg-block">
                        <div class="header-top-social">
                            <span class="social-text text-upper">{{__('Follow us on')}}:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="https://www.facebook.com/profile.php?id=100092391584891"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="https://www.instagram.com/panda47net/"><i class="ecicon eci-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Top social End -->
                    <!-- Header Top Message Start -->
                    <div class="col text-center header-top-center">
                        <div class="header-top-message text-upper">
                            <span>{{__('Free Shipping For Products Over 100 TRY')}}
                        </div>
                    </div>
                    <!-- Header Top Message End -->
                    <!-- Header Top Language Currency -->
                    <div class="col header-top-right d-none d-lg-block">
                        <div class="header-top-lan-curr d-flex justify-content-end">
                            <!-- Currency Start -->
                            {{-- <div class="header-top-curr dropdown">
                                <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                        class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu">
                                    <li class="active"><a class="dropdown-item" href="#">USD </a></li>
                                    <li><a class="dropdown-item" href="#">TRY </a></li>
                                </ul>
                            </div> --}}
                            <!-- Currency End -->
                            <!-- Language Start -->
                            <div class="header-top-lan dropdown">
                                <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">{{ __(Config::get('lang')[App::getLocale()]['display']) }} <i
                                        class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu">
                                    @foreach (Config::get('lang') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                    
                                    <li><a class="dropdown-item" href="{{ Route('lang.switch', $lang) }}">{{ __($language['display']) }}</a></li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Language End -->

                        </div>
                    </div>
                    <!-- Header Top Language Currency -->
                    <!-- Header Top responsive Action -->
                    <div class="col d-lg-none ">
                        <div class="ec-header-bottons">
                            <!-- Header User Start -->
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                                        src="{{asset('main')}}/images/icons/user.svg" class="svg_img header_svg" alt="" /></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    
                                    @if (Route::has('login'))
                                        @auth
                                            @if (Auth::user()->utype === "ADM")
                                                <li><a class="dropdown-item" href="{{route('adminpanel')}}">{{__('Go To Admin Panel')}}</a></li>
                                                <li><a class="dropdown-item" href="{{route('logout')}}">{{__('logout')}}</a></li>
                                                @else
                                                <li><a class="dropdown-item" href="{{route('myaccount')}}">{{__('My Account')}}</a></li>
                                                <li><a class="dropdown-item" href="{{route('logout')}}">{{__('logout')}}</a></li>
                                            @endif
                                        @else
                                            <li><a class="dropdown-item" href="{{route('register')}}">{{__('Register')}}</a></li>
                                            <li><a class="dropdown-item" href="{{route('login')}}">{{__('Login')}}</a></li>
                                        @endif
                                    @endif

                                </ul>
                            </div>
                            <!-- Header User End -->
                            <!-- Header wishlist Start -->
                            @livewire('wishlist-count-component')

                            <!-- Header wishlist End -->
                            <!-- Header Cart Start -->
                            @livewire('cart-count-component')

                            <!-- Header Cart End -->
                            <a href="javascript:void(0)" class="ec-header-btn ec-sidebar-toggle">
                                <img src="{{asset('main')}}/images/icons/category-icon.svg" class="svg_img header_svg" alt="icon" />
                            </a>
                            <!-- Header menu Start -->
                            <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                                <img src="{{asset('main')}}/images/icons/menu.svg" class="svg_img header_svg" alt="icon" />
                            </a>
                            <!-- Header menu End -->
                        </div>
                    </div>
                    <!-- Header Top responsive Action -->
                </div>
            </div>
        </div>
        <!-- Ec Header Top  End -->
        <!-- Ec Header Bottom  Start -->
        <div class="ec-header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="ec-flex">
                        <!-- Ec Header Logo Start -->
                        <div class="align-self-center">
                            <div class="header-logo">
                                <a style="color: rgb(60,130,206); font-weight: bold; font-size: 30px " class="navbar-brand" href="{{url('/')}}">
                                    <img src="{{asset('main')}}/images/logo/logo-5.png" style="width: 50px !important" height="60px" alt="Site Logo" />
                                    {{__('Panda')}} <span style="color: rgb(255,211,21)" >{{__('47')}}</span>
                                </a>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->

                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="header-search">
                                <form class="ec-btn-group-form" action="{{route('product.search')}}" method="GET">
                                    <input name="search" class="form-control ec-search-bar" placeholder="{{__('Search products')}}..." type="text">
                                    <button name="" class="submit" type="submit"><img src="{{asset('main')}}/images/icons/search.svg"
                                            class="svg_img header_svg" alt="icon" /></button>
                                </form>
                            </div>
                        </div>
                        <!-- Ec Header Search End -->

                        <!-- Ec Header Button Start -->
                        <div class="align-self-center">
                            <div class="ec-header-bottons">
                                <!-- Header User Start -->
                                <div class="ec-header-user dropdown">
                                    <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                                            src="{{asset('main')}}/images/icons/user.svg" class="svg_img header_svg" alt="" /></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        @if (Route::has('login'))
                                            @auth
                                                @if (Auth::user()->utype === "ADM")
                                                    <li><a class="dropdown-item" href="{{route('adminpanel')}}">{{__('Go To Admin Panel')}}</a></li>
                                                    <li><a class="dropdown-item" href="{{route('logout')}}">{{__('logout')}}</a></li>
                                                    @else
                                                    <li><a class="dropdown-item" href="{{route('myaccount')}}">{{__('My Account')}}</a></li>
                                                    <li><a class="dropdown-item" href="{{route('logout')}}">{{__('logout')}}</a></li>
                                                @endif
                                            @else
                                                <li><a class="dropdown-item" href="{{route('register')}}">{{__('Register')}}</a></li>
                                                <li><a class="dropdown-item" href="{{route('login')}}">{{__('Login')}}</a></li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                                <!-- Header User End -->
                                <!-- Header wishlist Start -->
                                @livewire('wishlist-count-component')
                                <!-- Header wishlist End -->
                                <!-- Header Cart Start -->
                                @livewire('cart-count-component')
                                <!-- Header Cart End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Header Button End -->
        <!-- Header responsive Bottom  Start -->
        <div class="ec-header-bottom d-lg-none">
            <div class="container position-relative">
                <div class="row ">
                    <!-- Ec Header Logo Start -->
                    <div class="col">
                        <div class="header-logo">
                            <a href="index.html">
                                <img style="height: 90px; width: 70px;" src="{{asset('main')}}/images/logo/logo-5.png" alt="Site Logo" />
                            </a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->
                    <div>
                        <!-- Ec Header Search Start -->
                        <div class="col">
                            <div class="header-search">
                                <form class="ec-btn-group-form" action="{{route('product.search')}}" method="GET">
                                    <input name="search" class="form-control ec-search-bar" placeholder="{{__('Search products')}}..." type="text">
                                    <button name="" class="submit" type="submit"><img src="{{asset('main')}}/images/icons/search.svg"
                                            class="svg_img header_svg" alt="icon" /></button>
                                </form>
                            </div>
                        </div>
                        <!-- Ec Header Search End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Header responsive Bottom  End -->

        <!-- EC Main Menu Start -->
        <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="ec-main-menu">
                            <a class="ec-header-btn ec-sidebar-toggle navbar-brand">
                                <img src="{{asset('main')}}/images/icons/category-icon.svg" class="svg_img header_svg" alt="icon" />
                            </a>
                            <ul>
                                <li><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li><a href="{{url('categories')}}">{{__('All Categories')}}</a></li>
                                <li><a href="{{url('all-shops')}}">{{__('Shops')}}</a></li>
                                <li><a href="{{url('about-us')}}">{{__('About Us')}}</a></li>
                                <li><a href="{{url('contactus')}}">{{__('Contact Us')}}</a></li>
                                {{-- <li><a href="{{url('offer')}}">{{__('Hot Offers')}}</a></li> --}}
                                @auth
                                    @if ($hasShop)
                                        <li><a href="{{url('vendorapplication')}}">{{__('My Shop')}}</a></li>
                                        @else
                                        <li><a href="{{url('becomeavendor')}}">{{__('Become A Vendor')}}</a></li>
                                    @endif
                                @else
                                 <li><a href="{{url('vendorapplication')}}">{{__('Become A Vendor')}}</a></li>
                                @endauth

                                <li class="dropdown"><a href="javascript:void(0)">{{__('More')}}</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{url('faq')}}">{{__('FAQ')}}</a></li>
                                        {{-- <li><a href="{{url('track-order')}}">{{__('Track Order')}}</a></li> --}}
                                        {{-- <li><a href="{{url('terms')}}">{{__('Terms Condition')}}</a></li> --}}
                                        {{-- <li><a href="{{url('privacy')}}">{{__('Privacy Policy')}}</a></li> --}}
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Main Menu End -->
        <!-- ekka Mobile Menu Start -->
        <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
            <div class="ec-menu-title">
                <span class="menu_title">{{__('My Menu')}}</span>
                <button class="ec-close">×</button>
            </div>
            <div class="ec-menu-inner">
                <div class="ec-menu-content">
                    <ul>
                        <li><a href="{{url('/')}}">{{__('Home')}}</a></li>
                        <li><a href="{{url('categories')}}">{{__('All Categories')}}</a></li>
                        <li><a href="{{url('shops')}}">{{__('Shops')}}</a></li>
                                <li><a href="{{url('about-us')}}">{{__('About Us')}}</a></li>
                                <li><a href="{{url('contactus')}}">{{__('Contact Us')}}</a></li>
                                {{-- <li><a href="{{url('offer')}}">{{__('Hot Offers')}}</a></li> --}}
                                @auth
                                    @if ($hasShop)
                                        <li><a href="{{url('vendorapplication')}}">{{__('My Shop')}}</a></li>
                                        @else
                                        <li><a href="{{url('becomeavendor')}}">{{__('Become A Vendor')}}</a></li>
                                    @endif
                                @else
                                 <li><a href="{{url('vendorapplication')}}">{{__('Become A Vendor')}}</a></li>
                                @endauth


                                <li class="dropdown"><a href="javascript:void(0)">{{__('More')}}</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{url('faq')}}">{{__('FAQ')}}</a></li>
                                        {{-- <li><a href="track-order.html">{{__('Track Order')}}</a></li> --}}
                                        {{-- <li><a href="terms-condition.html">{{__('Terms Condition')}}</a></li> --}}
                                        {{-- <li><a href="privacy-policy.html">{{__('Privacy Policy')}}</a></li> --}}
                                    </ul>
                                </li>
                    
                    </ul>
                </div>
                <div class="header-res-lan-curr">
                    <div class="header-top-lan-curr">
                        <!-- Language Start -->
                        <div class="header-top-lan dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">{{ __(Config::get('lang')[App::getLocale()]['display']) }} <i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                @foreach (Config::get('lang') as $lang => $language)
                                @if ($lang != App::getLocale())
                                
                                <li><a class="dropdown-item" href="{{ Route('lang.switch', $lang) }}">{{ __($language['display']) }}</a></li>
                                @endif
                                @endforeach
                            </ul>
                        </div>

                        
                        <!-- Language End -->
                        <!-- Currency Start -->
                        {{-- <div class="header-top-curr dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                <li><a class="dropdown-item" href="#">EUR €</a></li>
                            </ul>
                        </div> --}}
                        <!-- Currency End -->
                    </div>
                    <!-- Social Start -->
                    <div class="header-res-social">
                        <div class="header-top-social">
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Social End -->
                </div>
            </div>
        </div>
        <!-- ekka mobile Menu End -->
    </header>
    <!-- Header End  -->
    <!-- ekka Cart Start -->
@livewire('side-cart-component')
<!-- ekka Cart End -->
    <div>
    {{$slot}};
    </div>



    <!-- Footer Start -->
    <footer class="ec-footer section-space-mt">
        <div class="footer-container">
            <div class="footer-offer">
                <div class="container">
                    <div class="row">
                        <div class="text-center footer-off-msg">
                            <span>{{__('Thanks For Your Visit')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-top section-space-footer-p">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-3 ec-footer-contact">
                            <div class="ec-footer-widget">
                                <div class="ec-footer-logo"><a href="{{url('/')}}"><img src="{{asset('main')}}/images/logo/logo-5.png"
                                            alt=""><img class="dark-footer-logo" src="{{asset('main')}}/images/logo/logo-5.png"
                                            alt="Site Logo" style="display: none;" /></a></div>
                                <h4 class="ec-footer-heading">{{__('Contact Us')}}</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link">{{$details->address}}</li>
                                        <li class="ec-footer-link"><span>{{__('Call Us')}}:</span><a href="tel:{{$details->phone_number}}">
                                            {{$details->phone_number}}</a></li>
                                        <li class="ec-footer-link"><span>{{__('Email')}}:</span><a
                                                href="mailto:{{$details->email}}">{{$details->email}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 ec-footer-info">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">{{__('Information')}}</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="{{url('about-us')}}">{{__('About Us')}}</a></li>
                                        <li class="ec-footer-link"><a href="{{url('faq')}}">{{__('FAQ')}}</a></li>
                                        {{-- <li class="ec-footer-link"><a href="{{url('track-order')}}">Track Order</a></li> --}}
                                        <li class="ec-footer-link"><a href="{{url('contactus')}}">{{__('Contact Us')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 ec-footer-account">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">{{__('Account')}}</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        @if (Route::has('login'))
                                            @auth
                                                @if (Auth::user()->utype === "ADM")
                                                    <li class="ec-footer-link"><a href="{{route('adminpanel')}}">{{__('Go To Admin Panel')}}</a></li>
                                                    <li class="ec-footer-link"><a href="{{route('logout')}}">{{__('logout')}}</a></li>
                                                    @else
                                                    <li class="ec-footer-link"><a href="{{route('myaccount')}}">{{__('My Account')}}</a></li>
                                                    <li class="ec-footer-link"><a href="{{route('logout')}}">{{__('logout')}}</a></li>
                                                @endif
                                            @else
                                                <li class="ec-footer-link"><a href="{{route('register')}}">{{__('Register')}}</a></li>
                                                <li class="ec-footer-link"><a href="{{route('login')}}">{{__('Login')}}</a></li>
                                            @endif
                                        @endif
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-sm-12 col-lg-2 ec-footer-service">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">Services</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link"><a href="track-order.html">Discount Returns</a></li>
                                        <li class="ec-footer-link"><a href="privacy-policy.html">Policy & policy </a></li>
                                        <li class="ec-footer-link"><a href="terms-condition.html">Customer Service</a></li>
                                        <li class="ec-footer-link"><a href="terms-condition.html">Term & condition</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-sm-12 col-lg-3 ec-footer-news">
                            <div class="ec-footer-widget">
                                <h4 class="ec-footer-heading">{{__('Newsletter')}}</h4>
                                <div class="ec-footer-links">
                                    <ul class="align-items-center">
                                        <li class="ec-footer-link">{{__('Get instant updates about our new products and special promos!')}}</li>
                                    </ul>
                                    <div class="ec-subscribe-form">
                                        <form id="ec-newsletter-form" name="ec-newsletter-form" method="post"
                                            action="#">
                                            <div id="ec_news_signup" class="ec-form">
                                                <input class="ec-email" type="email" required=""
                                                    placeholder="Enter your email here..." name="ec-email" value="" />
                                                <button id="ec-news-btn" class="button btn-primary" type="submit"
                                                    name="subscribe" value=""><i class="ecicon eci-paper-plane-o"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Footer social Start -->
                        <div class="col text-left footer-bottom-left">
                            <div class="footer-bottom-social">
                                <span class="social-text text-upper">{{__('Follow us on')}}:</span>
                                <ul class="mb-0">
                                    <li class="list-inline-item"><a class="hdr-facebook" href="https://www.facebook.com/profile.php?id=100092391584891"><i class="ecicon eci-facebook"></i></a></li>
                                    <li class="list-inline-item"><a class="hdr-instagram" href="https://www.instagram.com/panda47net/"><i class="ecicon eci-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer social End -->
                        <!-- Footer Copyright Start -->
                        <div class="col text-center footer-copy">
                            <div class="footer-bottom-copy ">
                                <div class="ec-copy">Copyright © 2023-2024 <a class="site-name text-upper"
                                        href="{{url('/')}}">Panda 47<span>.</span></a>. All Rights Reserved</div>
                            </div>
                        </div>
                        <!-- Footer Copyright End -->
                        <!-- Footer payment -->
                        <div class="col footer-bottom-right">
                            <div class="footer-bottom-payment d-flex justify-content-end">
                                <div class="payment-link">
                                    <img src="{{asset('main')}}/images/icons/payment.png" alt="">
                                </div>

                            </div>
                        </div>
                        <!-- Footer payment -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Footer navigation panel for responsive display -->
    <div class="ec-nav-toolbar">
        <div class="container">
            <div class="ec-nav-panel">
                <div class="ec-nav-panel-icons">
                    <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><img
                            src="{{asset('main')}}/images/icons/menu.svg" class="svg_img header_svg" alt="icon" /></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><img
                            src="{{asset('main')}}/images/icons/cart.svg" class="svg_img header_svg" alt="icon" />
                            @if (Cart::instance('cart')->count() > 0)
                            <span class="ec-cart-noti ec-header-count cart-count-lable">{{Cart::instance('cart')->count()}}</span>
                            @endif
                        </a>
                            
                                            
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="{{url('/')}}" class="ec-header-btn"><img src="{{asset('main')}}/images/icons/home.svg"
                            class="svg_img header_svg" alt="icon" /></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="{{url('wishlist')}}" class="ec-header-btn"><img src="{{asset('main')}}/images/icons/wishlist.svg"
                            class="svg_img header_svg" alt="icon" />
                            @if (Cart::instance('wishlist')->count() > 0)
                            <span class="ec-cart-noti"></span>
                                        @endif
                        </a>
                            
                </div>
                <div class="ec-nav-panel-icons">
                    @if (Auth::user())
                    <a href="{{route('myaccount')}}" class="ec-header-btn"><img src="{{asset('main')}}/images/icons/user.svg"
                        class="svg_img header_svg" alt="icon" /></a>
                    @else
                    <a href="{{route('login')}}" class="ec-header-btn"><img src="{{asset('main')}}/images/icons/user.svg"
                        class="svg_img header_svg" alt="icon" /></a>
                    @endif
                    
                </div>

            </div>
        </div>
    </div>
    <!-- Footer navigation panel for responsive display end -->



    <!-- Cart Floating Button -->
    <div class="ec-cart-float">
        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
            <div class="header-icon"><img src="{{asset('main')}}/images/icons/cart.svg" class="svg_img header_svg" alt="cart" />
            </div>
            <span class="ec-cart-count cart-count-lable">3</span>
        </a>
    </div>
    <!-- Cart Floating Button end -->

    



    <!-- Vendor JS -->
    <script src="{{asset('main')}}/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="{{asset('main')}}/js/vendor/popper.min.js"></script>
    <script src="{{asset('main')}}/js/vendor/bootstrap.min.js"></script>
    <script src="{{asset('main')}}/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{asset('main')}}/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="{{asset('main')}}/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{asset('main')}}/js/plugins/countdownTimer.min.js"></script>
    <script src="{{asset('main')}}/js/plugins/scrollup.js"></script>
    <script src="{{asset('main')}}/js/plugins/jquery.zoom.min.js"></script>
    <script src="{{asset('main')}}/js/plugins/slick.min.js"></script>
    <script src="{{asset('main')}}/js/plugins/infiniteslidev2.js"></script>
    <script src="{{asset('main')}}/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('main')}}/js/plugins/jquery.sticky-sidebar.js"></script>


    <!-- Google translate Js -->
    <script src="{{asset('main')}}/js/vendor/google-translate.js"></script>
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({ pageLanguage: 'en' }, 'google_translate_element');
        }
    </script>
    <!-- Main Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js" integrity="sha512-Y+0b10RbVUTf3Mi0EgJue0FoheNzentTMMIE2OreNbqnUPNbQj8zmjK3fs5D2WhQeGWIem2G2UkKjAL/bJ/UXQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js" integrity="sha512-EnXkkBUGl2gBm/EIZEgwWpQNavsnBbeMtjklwAa7jLj60mJk932aqzXFmdPKCG6ge/i8iOCK0Uwl1Qp+S0zowg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('main')}}/js/vendor/index.js"></script>
    <script src="{{asset('main')}}/js/main.js"></script>


    @stack('scripts')


    


</div>
</body>
</html>

