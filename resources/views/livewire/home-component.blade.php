 <div id="main">
    @if (session()->has('error_message'))
    <div class="error-dialog">
        <div class="error-dialog-content">
            <h3>{{__('Error')}}</h3>
            <p>{{ __(session('error_message')) }}</p>
            <button onclick="closeErrorDialog()">{{__('Close')}}</button>
        </div>
    </div>

    <style>
        .error-dialog {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .error-dialog-content {
            background-color: white;
            padding: 20px;
            text-align: center;
        }
    </style>

    <script>
        function closeErrorDialog() {
            document.querySelector('.error-dialog').remove();
        }
    </script>
@endif

     <!-- Category Sidebar start -->
     <div class="ec-side-cat-overlay"></div>
     <div class="col-lg-3 category-sidebar" data-animation="fadeIn">
         <div class="cat-sidebar">
             <div class="cat-sidebar-box">
                 <div class="ec-sidebar-wrap" style="border: 0 !important">
                     <!-- Sidebar Category Block -->

                     <div class="ec-sidebar-block">
                         <div class="ec-sb-title">
                             <h3 class="ec-sidebar-title">{{__('Categories')}}<button class="ec-close">×</button></h3>
                         </div>
                         @foreach ($categories as $category)
                         <div class="ec-sb-block-content">
                             <ul>
                                 <li>
                                     <div class="ec-sidebar-block-item">{{__($category->name)}}</div>
                                     <ul>
                                         @foreach ($category->subcategories as $subcategory)
                                         <li>
                                             <div class="ec-sidebar-sub-item"><a href="{{url('categories/'.$category->slug .'/'.$subcategory->slug)}}">{{__($subcategory->name)}} <span title="Available Stock">- {{$subcategory->products->count()}}</span></a>
                                             </div>
                                         </li>
                                         @endforeach
                                     </ul>
                                 </li>
                             </ul>
                         </div>
                         @endforeach
                     </div>
                     <!-- Sidebar Category Block -->
                 </div>
             </div>

         </div>
     </div>

     <!-- Main Slider Start -->
     <div class="sticky-header-next-sec ec-main-slider section section-space-pb">
         <div class="ec-slider swiper-container main-slider-nav main-slider-dot">
             <!-- Main slider -->
             <div class="swiper-wrapper">
                 @foreach ($sliders as $slider)
                 <div class="ec-slide-item swiper-slide d-flex ec-slide-1" style="background-image: url(/main/images/sliders/{{$slider->image}});">
                     <div class="container align-self-center">
                         <div class="row">
                             <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center">
                                 <div class="ec-slide-content slider-animation">
                                     <h1 class="ec-slide-title">{{__($slider->title)}}</h1>
                                     <h2 class="ec-slide-stitle">{{__($slider->subtitle)}}</h2>
                                     <p>{{__($slider->short_desc)}}</p>
                                     <a href="{{$slider->link}}" class="btn btn-lg btn-secondary">{{__('See More')}}</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
             <div class="swiper-pagination swiper-pagination-white"></div>
             <div class="swiper-buttons">
                 <div class="swiper-button-next"></div>
                 <div class="swiper-button-prev"></div>
             </div>
         </div>
     </div>
     <!-- Main Slider End -->

     <!-- Product tab Area Start -->
     <section class="section ec-product-tab section-space-p" id="collection">
         <div class="container">
             <div class="row">
                 <div class="col-md-12 text-center">
                     <div class="section-title">
                         <h2 class="ec-bg-title"> {{__('Our Top Collection')}}</h2>
                         <h2 class="ec-title"> {{__('Our Top Collection')}}</h2>
                         <p class="sub-title">{{__('Browse The Collection of Top Products')}}</p>
                     </div>
                 </div>


             </div>
             <div class="row">
                 <div class="col">
                     <div class="tab-content">
                         <!-- 1st Product tab start -->

                         <div class="row">
                             <!-- Product Content -->
                             @foreach ($lproducts as $product)
                             <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="fadeIn">
                                 <div class="ec-product-inner">
                                     <div class="ec-pro-image-outer">
                                         <div class="ec-pro-image">
                                             <a href="{{url('product/'.$product->slug)}}" class="image">
                                                 <img class="main-image" id="765x850" src="{{asset('main')}}/images/products/{{$product->image}}" alt="Product" />
                                                 <img class="hover-image" src="{{asset('main')}}/images/products/{{$product->image}}" alt="Product" />
                                             </a>
                                             @if ($product->sale_price)
                                             <span class="percentage">{{round( 100  -  ($product->sale_price * 100 / $product->normal_price) )}}%</span>
                                             @endif
                                             <div class="ec-pro-actions">
                                                 <a title="Add To Cart" class="add-to-cart" wire:click.prevent="store('{{$product->id }}','{{$product->name}}', {{$product->final_price}}, '{{$product->shop_id}}')"><img src="{{asset('main')}}/images/icons/cart.svg" class="svg_img pro_svg" alt="" /> {{__('Add To Cart')}}</a>



                                             </div>
                                         </div>
                                     </div>
                                     <div class="ec-pro-content">
                                         <p class="ec-description"> {{$product->brand->name}}</p>

                                         <h5 class="ec-pro-title"><a href="{{url('product/'.$product->slug)}}">{{$product->name}}</a></h5>
                                         <div class="ec-pro-rating">
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star"></i>
                                         </div>
                                         <div class="ec-pro-list-desc">
                                             {!! $product->short_description !!}
                                         </div>
                                         <span class="ec-price">
                                             @if ($product->sale_price)
                                             <span class="old-price">TRY {{$product->normal_price}}</span>
                                             <span class="new-price">TRY {{$product->sale_price}}</span>
                                             @else
                                             <span class="new-price">TRY {{$product->normal_price}}</span>
                                             @endif

                                         </span>
                                         <div class="ec-pro-option">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             @endforeach
                         </div>
                         <!-- ec 1st Product tab end -->

                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- ec Product tab Area End -->

     <!-- ec Banner Section Start -->
     @if ($twinfirst)
     <section class="ec-banner section section-space-p">
         <div class="container">
             <!-- ec Banners Start -->
             <div class="ec-banner-inner">
                 <!--ec Banner Start -->
                 <div class="ec-banner-block ec-banner-block-2">
                     <div class="row">
                         <div class="banner-block col-lg-6 col-md-12 margin-b-30" data-animation="slideInRight">
                             <div class="bnr-overlay">
                                 <img src="{{asset('main')}}/images/ads/{{$twinfirst->image}}" alt="" />
                                 <div class="banner-text">
                                     <span class="ec-banner-stitle">{{__($twinfirst->ad_name)}}</span>
                                     <span class="ec-banner-title">{{__($twinfirst->title)}}</span>
                                     <span class="ec-banner-discount">{{__($twinfirst->short_desc)}}</span>
                                 </div>
                                 <div class="banner-content">
                                     <span class="ec-banner-btn"><a href="{{$twinfirst->link}}">{{__('Order Now')}}</a></span>
                                 </div>
                             </div>
                         </div>
                         @if ($twinsecond)
                         <div class="banner-block col-lg-6 col-md-12" data-animation="slideInLeft">
                             <div class="bnr-overlay">
                                 <img src="{{asset('main')}}/images/ads/{{$twinsecond->image}}" alt="" />
                                 <div class="banner-text">
                                     <span class="ec-banner-stitle">{{__($twinsecond->ad_name)}}</span>
                                     <span class="ec-banner-title">{{__($twinsecond->title)}}</span>
                                     <span class="ec-banner-discount">{{__($twinsecond->short_desc)}}</span>
                                 </div>
                                 <div class="banner-content">
                                     <span class="ec-banner-btn"><a href="{{$twinsecond->link}}">{{__('Order Now')}}</a></span>
                                 </div>
                             </div>
                         </div>
                         @endif

                     </div>
                     <!-- ec Banner End -->
                 </div>
                 <!-- ec Banners End -->
             </div>
         </div>
     </section>
     @endif

     <!-- ec Banner Section End -->


     <!--  Feature & Special Section Start -->
     <section class="section ec-fre-spe-section section-space-p" id="offers">
         <div class="container">
             <div class="row">
                 <!--  Feature Section Start -->
                 <div class="ec-fre-section col-lg-6 col-md-6 col-sm-6 margin-b-30" data-animation="slideInRight">
                     <div class="col-md-12 text-left">
                         <div class="section-title">
                             <h2 class="ec-bg-title">{{__('On Sale')}}</h2>
                             <h2 class="ec-title">{{__('On Sale')}}</h2>
                         </div>
                     </div>

                     <div class="ec-fre-products">
                         @foreach ($sproducts as $sproduct)
                         <div class="ec-fs-product">
                             <div class="ec-fs-pro-inner">
                                 <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                     <div class="ec-fs-pro-image">
                                         <a href="{{url('product/'.$sproduct->slug)}}" class="image"><img class="main-image" src="{{asset('main')}}/images/products/{{$sproduct->image}}" alt="Product" /></a>
                                     </div>
                                 </div>
                                 <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                     <h5 class="ec-fs-pro-title"><a href="{{url('product/'.$sproduct->slug)}}">{{$sproduct->name}}</a>
                                     </h5>
                                     <div class="ec-fs-pro-rating">
                                         <span class="ec-fs-rating-icon">
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star"></i>
                                         </span>
                                         <span class="ec-fs-rating-text">4 Review</span>
                                     </div>
                                     <div class="ec-fs-price">
                                         @if ($sproduct->sale_price)
                                         <span class="old-price">TRY {{$sproduct->normal_price}}</span>
                                         <span class="new-price">TRY {{$sproduct->sale_price}}</span>
                                         @else
                                         <span class="new-price">TRY {{$sproduct->normal_price}}</span>
                                         @endif
                                     </div>

                                     <div class="ec-fs-pro-desc">
                                         {{$sproduct->short_description}}
                                     </div>
                                     <div class="ec-fs-pro-btn">
                                         <a href="#" class="btn btn-lg btn-secondary" wire:click.prevent="store('{{$sproduct->id }}','{{$sproduct->name}}', {{$sproduct->final_price}}, '{{$sproduct->shop_id}}')">{{__('Add To Cart')}}</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         @endforeach


                     </div>
                 </div>
                 <!--  Feature Section End -->
                 <!--  Special Section Start -->
                 <div class="ec-spe-section col-lg-6 col-md-6 col-sm-6" data-animation="slideInLeft">
                     <div class="col-md-12 text-left">
                         <div class="section-title">
                             <h2 class="ec-bg-title">{{__('Limited Time Offer')}}</h2>
                             <h2 class="ec-title">{{__('Limited Time Offer')}}</h2>
                         </div>
                     </div>

                     <div class="ec-spe-products">

                         @foreach ($sale as $saleItem)
                         @if ($saleItem)
                         <div class="ec-fs-product">
                             <div class="ec-fs-pro-inner">
                                 <div class="ec-fs-pro-image-outer col-lg-6 col-md-6 col-sm-6">
                                     <div class="ec-fs-pro-image">
                                         <a href="{{url('product/'.$saleItem->product->slug)}}" class="image"><img class="main-image" src="{{asset('main')}}/images/products/{{$saleItem->product->image}}" alt="Product" /></a>

                                     </div>
                                 </div>
                                 <div class="ec-fs-pro-content col-lg-6 col-md-6 col-sm-6">
                                     <h5 class="ec-fs-pro-title"><a href="{{url('product/'.$saleItem->product->slug)}}">{{$saleItem->product->name}}</a>
                                     </h5>
                                     <div class="ec-fs-pro-rating">
                                         <span class="ec-fs-rating-icon">
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star fill"></i>
                                             <i class="ecicon eci-star"></i>
                                         </span>
                                         <span class="ec-fs-rating-text">4 Review</span>
                                     </div>
                                     <div class="ec-fs-price">
                                         @if ($saleItem->product->sale_price)
                                         <span class="old-price">TRY {{$saleItem->product->normal_price}}</span>
                                         <span class="new-price">TRY {{$saleItem->product->sale_price}}</span>
                                         @else
                                         <span class="new-price">TRY {{$saleItem->product->normal_price}}</span>
                                         @endif
                                     </div>
                                     <div class="countdowntimer"><span id="ec-fs-count-{{$saleItem->id}}"></span></div>
                                     <script>
                                         $("#ec-fs-count-{{$saleItem->id}}").countdowntimer({
                                             startDate: "{{$saleItem->created_at}}"
                                             , dateAndTime: "{{$saleItem->sale}}"
                                             , labelsFormat: true
                                             , displayFormat: "DHMS"
                                         });

                                     </script>
                                     <div class="ec-fs-pro-desc">
                                         {{$saleItem->product->short_description}}
                                     </div>
                                     <div class="ec-fs-pro-btn">
                                         <a href="javascript:void(0)" class="btn btn-lg btn-secondary" wire:click.prevent="store('{{$saleItem->id }}','{{$saleItem->name}}', {{$saleItem->final_price}}, '{{$saleItem->shop_id}}')">{{__('Add To Cart')}}</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         @endif

                         @endforeach



                     </div>
                 </div>
                 <!--  Special Section End -->
             </div>
         </div>
     </section>
     <!-- Feature & Special Section End -->

     <!--  Top Vendor Section Start -->
     <section class="section section-space-p" id="vendors">
         <div class="container">
             <div class="row">
                 <div class="col-md-12 text-center">
                     <div class="section-title">
                         <h2 class="ec-bg-title">{{__('Top Vendors')}}</h2>
                         <h2 class="ec-title">{{__('Top Vendors')}}</h2>
                     </div>
                 </div>
             </div>
             <div class="row margin-minus-t-15 margin-minus-b-15">

                 @foreach ($topVendors as $tVendor)
                 <div class="col-sm-12 col-md-6 col-lg-3 ec_ven_content" data-animation="zoomIn">
                     <div class="ec-vendor-card">
                         <div class="ec-vendor-detail">
                             <div class="ec-vendor-avtar">
                                 <img src="{{asset('shops')}}/logo/{{$tVendor->shop_logo}}" alt="vendor img">
                             </div>
                             <div class="ec-vendor-info">
                                 <a href="{{url('singleshop/'.$tVendor->slug)}}" class="name">{{$tVendor->shopname}}</a>
                                 <p class="prod-count">{{$tVendor->products()->count()}} {{__('Products')}}</p>
                                 <p class="prod-count">{{$tVendor->order_count}} {{__('Sales')}}</p>



                             </div>
                         </div>
                         <div class="ec-vendor-prod">
                             @foreach ($tVendor->products as $prod)
                             @if($loop->iteration > 4)
                             @break
                             @endif
                             <div class="ec-prod-img">
                                 <a href="{{url('product/'.$prod->slug)}}"><img src="{{asset('main')}}/images/products/{{$prod->image}}" alt="vendor img"></a>
                             </div>
                             @endforeach

                         </div>
                     </div>
                 </div>
                 @endforeach


             </div>
         </div>
     </section>
     <!--  Top Vendor Section End -->

     <!--  services Section Start -->
     <section class="section ec-services-section section-space-p" id="services">
         <h2 class="d-none">Features</h2>
         <div class="container">
             <div class="row">
                 <div class="ec_ser_content ec_ser_content_1 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
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
                 <div class="ec_ser_content ec_ser_content_2 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
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
                 <div class="ec_ser_content ec_ser_content_3 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
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
                 <div class="ec_ser_content ec_ser_content_4 col-sm-12 col-md-6 col-lg-3" data-animation="zoomIn">
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
     <!--services Section End -->

     <!--  offer Section Start -->
     @if($singleAd)
     <section class="section ec-offer-section section-space-p section-space-m" style="background-image: url(/main/images/ads/{{$singleAd->img2}})">
         <h2 class="d-none">Offer</h2>
         <div class="container">
             <div class="row justify-content-end">
                 <div class="col-xl-6 col-lg-7 col-md-7 col-sm-7 align-self-center ec-offer-content">
                     <h2 class="ec-offer-title">{{$singleAd->name}}</h2>
                     <h3 class="ec-offer-stitle" data-animation="slideInDown">{{$singleAd->title}}</h3>
                     <span class="ec-offer-img" data-animation="zoomIn"><img src="{{asset('main')}}/images/ads/{{$singleAd->img1}}" alt="offer image" /></span>
                     <span class="ec-offer-desc">{{$singleAd->short_desc_1}}</span>
                     <span class="ec-offer-price">{{$singleAd->short_desc_2}}</span>
                     <a class="btn btn-primary" href="{{$singleAd->link}}" data-animation="zoomIn">{{__('Shop Now')}}</a>
                 </div>
             </div>
         </div>
     </section>
     @endif

     <!-- offer Section End -->

     <!-- New Product Start -->
     <section class="section ec-new-product section-space-p" id="arrivals">
         <div class="container">
             <div class="row">
                 <div class="col-md-12 text-center">
                     <div class="section-title">
                         <h2 class="ec-bg-title">{{__('New Arrivals')}}</h2>
                         <h2 class="ec-title">{{__('New Arrivals')}}</h2>
                         <p class="sub-title">{{__('Recommendations for you')}}</p>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <!-- New Product Content -->
                 @foreach ($latestproducts as $newArrival)
                 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6  ec-product-content" data-animation="flipInY">
                     <div class="ec-product-inner">
                         <div class="ec-pro-image-outer">
                             <div class="ec-pro-image">
                                 <a href="{{url('product/'.$newArrival->slug)}}" class="image">
                                     <img class="main-image" src="{{asset('main')}}/images/products/{{$newArrival->image}}" alt="Product" />
                                     <img class="hover-image" src="{{asset('main')}}/images/products/{{$newArrival->image}}" alt="Product" />
                                 </a>
                                 @if ($newArrival->sale_price)
                                 <span class="flags">
                                     <span class="sale">{{__('Sale')}}</span>
                                 </span>
                                 @endif


                             </div>
                         </div>
                         <div class="ec-pro-content">
                             <h5 class="ec-pro-title"><a href="{{url('product/'.$newArrival->slug)}}">{{$newArrival->name}}</a></h5>
                             <div class="ec-pro-rating">
                                 <i class="ecicon eci-star fill"></i>
                                 <i class="ecicon eci-star fill"></i>
                                 <i class="ecicon eci-star fill"></i>
                                 <i class="ecicon eci-star fill"></i>
                                 <i class="ecicon eci-star"></i>
                             </div>
                             <span class="ec-price">
                                 @if ($newArrival->sale_price)
                                 <span class="old-price">TRY {{$newArrival->normal_price}}</span>
                                 <span class="new-price">TRY {{$newArrival->sale_price}}</span>
                                 @else
                                 <span class="new-price">TRY {{$newArrival->normal_price}}</span>
                                 @endif
                             </span>

                         </div>
                     </div>
                 </div>
                 @endforeach

             </div>
         </div>
 </div>
 </section>
 <!-- New Product end -->

 <!-- ec testmonial Start -->
 <section class="section ec-test-section section-space-ptb-100 section-space-m" id="reviews">
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
                             <div class="ec-test-img"><img alt="testimonial" title="testimonial" src="{{asset('main')}}/images/testimonial/1.jpg" /></div>
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
                         <img src="{{asset('main')}}/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom" alt="" />
                     </li>
                     <li class="ec-test-item ">
                         <img src="{{asset('main')}}/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                         <div class="ec-test-inner">
                             <div class="ec-test-img"><img alt="testimonial" title="testimonial" src="{{asset('main')}}/images/testimonial/2.jpg" /></div>
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
                         <img src="{{asset('main')}}/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom" alt="" />
                     </li>
                     <li class="ec-test-item">
                         <img src="{{asset('main')}}/images/testimonial/top-quotes.svg" class="svg_img test_svg top" alt="" />
                         <div class="ec-test-inner">
                             <div class="ec-test-img"><img alt="testimonial" title="testimonial" src="{{asset('main')}}/images/testimonial/3.jpg" /></div>
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
                         <img src="{{asset('main')}}/images/testimonial/bottom-quotes.svg" class="svg_img test_svg bottom" alt="" />
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </section>
 <!-- ec testmonial end -->

 <!-- Ec Brand Section Start -->
 <section class="section ec-brand-area section-space-p">
     <h2 class="d-none">{{__('Brands')}}</h2>
     <div class="container">
         <div class="row">
             <div class="ec-brand-outer">
                 <ul id="ec-brand-slider">
                     @foreach ($brands as $brand)
                     <li class="ec-brand-item" data-animation="zoomIn">
                         <div class="ec-brand-img"><a><img alt="brand" title="brand" src="{{asset('main')}}/images/brands/{{$brand->image}}" /></a></div>
                     </li>
                     @endforeach

                 </ul>
             </div>
         </div>
     </div>
 </section>
 </div>
