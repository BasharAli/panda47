
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
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('categories')}}">All Categories</a></li>
                                <li><a href="{{url('all-shops')}}">Shops</a></li>
                                <li><a href="{{url('about-us')}}">About Us</a></li>
                                <li><a href="{{url('contactus')}}">Contact Us</a></li>
                                <li><a href="{{url('offer')}}">Hot Offers</a></li>
                                @auth
                                    @if ($hasShop)
                                        <li><a href="{{url('vendorapplication')}}">My Shop</a></li>
                                        @else
                                        <li><a href="{{url('becomeavendor')}}">Become A Vendor</a></li>
                                    @endif
                                @else
                                 <li><a href="{{url('vendorapplication')}}">Become A Vendor</a></li>
                                @endauth
                                


                                <li class="dropdown"><a href="javascript:void(0)">More</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{url('faq')}}">FAQ</a></li>
                                        <li><a href="{{url('track-order')}}">Track Order</a></li>
                                        <li><a href="{{url('terms')}}">Terms Condition</a></li>
                                        <li><a href="{{url('privacy')}}">Privacy Policy</a></li>
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
                <span class="menu_title">My Menu</span>
                <button class="ec-close">×</button>
            </div>
            <div class="ec-menu-inner">
                <div class="ec-menu-content">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('categories')}}">All Categories</a></li>
                        <li><a href="{{url('shops')}}">Shops</a></li>
                                <li><a href="{{url('about-us')}}">About Us</a></li>
                                <li><a href="{{url('contactus')}}">Contact Us</a></li>
                                <li><a href="{{url('offer')}}">Hot Offers</a></li>
                                <li><a href="offer.html">Become A Vendor</a></li>


                                <li class="dropdown"><a href="javascript:void(0)">More</a>
                                    <ul class="sub-menu">
                                        <li><a href="faq.html">FAQ</a></li>
                                        <li><a href="track-order.html">Track Order</a></li>
                                        <li><a href="terms-condition.html">Terms Condition</a></li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    </ul>
                                </li>
                    
                    </ul>
                </div>
                <div class="header-res-lan-curr">
                    <div class="header-top-lan-curr">
                        <!-- Language Start -->
                        <div class="header-top-lan dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Italiano</a></li>
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