<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    
    <title>Panda 47 | Home</title>
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

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="{{asset('main')}}/css/backgrounds/bg-4.css">
</head>
<body class="checkout_page">
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
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Top social End -->
                    <!-- Header Top Message Start -->
                    <div class="col text-center header-top-center">
                        <div class="header-top-message text-upper">
                            <span>Free Shipping</span>This Week Order Over - $75
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
                                <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                                        class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu">
                                    <li class="active"><a class="dropdown-item" href="#">Turkish</a></li>
                                    <li><a class="dropdown-item" href="#">Arabic</a></li>
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
                                    <li><a class="dropdown-item" href="{{url('register')}}">Register</a></li>
                                    <li><a class="dropdown-item" href="{{url('login')}}">Login</a></li>
                                </ul>
                            </div>
                            <!-- Header User End -->
                            <!-- Header wishlist Start -->
                            <a href="wishlist.html" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon"><img src="{{asset('main')}}/images/icons/wishlist.svg"
                                        class="svg_img header_svg" alt="" /></div>
                                <span class="ec-header-count">4</span>
                            </a>
                            <!-- Header wishlist End -->
                            <!-- Header Cart Start -->
                            <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                <div class="header-icon"><img src="{{asset('main')}}/images/icons/cart.svg"
                                        class="svg_img header_svg" alt="" /></div>
                                <span class="ec-header-count cart-count-lable">3</span>
                            </a>
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
                                    Panda <span style="color: rgb(255,211,21)" >47</span>
                                </a>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->

                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="header-search">
                                <form class="ec-btn-group-form" action="#">
                                    <input class="form-control ec-search-bar" placeholder="Search products..." type="text">
                                    <button class="submit" type="submit"><img src="{{asset('main')}}/images/icons/search.svg"
                                            class="svg_img header_svg" alt="" /></button>
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
                                        <li><a class="dropdown-item" href="{{url('register')}}">Register</a></li>
                                        <li><a class="dropdown-item" href="login.html">Login</a></li>
                                    </ul>
                                </div>
                                <!-- Header User End -->
                                <!-- Header wishlist Start -->
                                <a href="wishlist.html" class="ec-header-btn ec-header-wishlist">
                                    <div class="header-icon"><img src="{{asset('main')}}/images/icons/wishlist.svg"
                                            class="svg_img header_svg" alt="" /></div>
                                    <span class="ec-header-count">4</span>
                                </a>
                                <!-- Header wishlist End -->
                                <!-- Header Cart Start -->
                                <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                    <div class="header-icon"><img src="{{asset('main')}}/images/icons/cart.svg"
                                            class="svg_img header_svg" alt="" /></div>
                                    <span class="ec-header-count cart-count-lable">3</span>
                                </a>
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
                    <!-- Ec Header Search Start -->
                    <div class="col">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="#">
                                <input class="form-control ec-search-bar" placeholder="Search products..." type="text">
                                <button class="submit" type="submit"><img src="{{asset('main')}}/images/icons/search.svg"
                                        class="svg_img header_svg" alt="icon" /></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->
                </div>
            </div>
        </div>
        <!-- Header responsive Bottom  End -->