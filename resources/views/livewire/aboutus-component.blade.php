
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('About Us')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('About Us')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec About Us page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">{{__('About Us')}}</h2>
                        <h2 class="ec-title">{{__('About Us')}}</h2>
                        <p class="sub-title mb-3">{{__('About our business Firm')}}</p>
                    </div>
                </div>
                <div class="ec-common-wrapper">
                    @foreach ($abouts as $about)
                    <div class="row">
                        <div class="col-md-6 ec-cms-block ec-abcms-block text-center">
                            <div class="ec-cms-block-inner">
                            <img class="a-img" src="{{asset('main')}}/images/about/{{$about->image}}" alt="about">
                            </div>
                        </div>
                        <div class="col-md-6 ec-cms-block ec-abcms-block text-center">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">{{__($about->title)}}</h3>
                                <p>{{ __($about->description) }}</p>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach 
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Ec testmonial Start -->
    <section class="section ec-test-section section-space-ptb-100 section-space-m">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title mb-0">
                        <h2 class="ec-bg-title">{{__('Testimonials')}}</h2>
                        <h2 class="ec-title">{{__('Client Review')}}</h2>
                        <p class="sub-title mb-3">{{__('What clients say about us')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ec-test-outer">
                    <ul id="ec-testimonial-slider">
                        <li class="ec-test-item">
                            <img src="{{asset('main')}}/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="{{asset('main')}}/images/testimonial/1.jpg" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen</div>
                                    <div class="ec-test-name">John Doe</div>
                                    <div class="ec-test-designation">General Manager</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                </div>
                            </div>
                            <img src="{{asset('main')}}/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom"
                                alt="" />
                        </li>
                        <li class="ec-test-item">
                            <img src="{{asset('main')}}/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="{{asset('main')}}/images/testimonial/2.jpg" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen</div>
                                    <div class="ec-test-name">John Doe</div>
                                    <div class="ec-test-designation">General Manager</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                </div>
                            </div>
                            <img src="{{asset('main')}}/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom"
                                alt="" />
                        </li>
                        <li class="ec-test-item">
                            <img src="{{asset('main')}}/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="{{asset('main')}}/images/testimonial/2.jpg" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen</div>
                                    <div class="ec-test-name">John Doe</div>
                                    <div class="ec-test-designation">General Manager</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                </div>
                            </div>
                            <img src="{{asset('main')}}/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom"
                                alt="" />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ec testmonial end -->

    <!-- Services Section Start -->
    <section class="section ec-services-section section-space-p">
        <h2 class="d-none">Features</h2>
        <div class="container">
            <div class="row">
                <div class="ec_ser_content ec_ser_content_1 col-sm-12 col-md-6 col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{asset('main')}}/images/icons/service_1.svg" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>{{__('Free Shipping')}}</h2>
                            <p>{{__('Free shipping on all Turkey for products above 100 TRY')}}</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_2 col-sm-12 col-md-6 col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{asset('main')}}/images/icons/service_2.svg" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>{{__('24X7 Support')}}</h2>
                            <p>{{__('Contact us 24 hours a day, 7 days a week')}}</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_3 col-sm-12 col-md-6 col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{asset('main')}}/images/icons/service_3.svg" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>{{__('15 Days Return')}}</h2>
                            <p>{{__('Simply return it within 15 days for an exchange')}}</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_4 col-sm-12 col-md-6 col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{asset('main')}}/images/icons/service_4.svg" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>{{__('Secure Payment')}}</h2>
                            <p>{{__('We Provide A Secure Payment Options For Safe Transactions')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->
