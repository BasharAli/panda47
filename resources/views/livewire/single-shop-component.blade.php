<div>

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


    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{$shop->shopname}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{$shop->shopname}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->
    <!-- Page detail section -->
    <section class="ec-bnr-detail ec-catalog-vendor-sec section-space-pt">
        <div class="ec-page-detail">
            <div class="container">
                <div class="ec-main-heading d-none">
                    <h2>Vendor Details</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 profile-banner space-info margin-bottom-30">
                        
                        <div class="ec-page-description ec-page-description-info" style="background-image: url(/main/images/covers/{{$shop->shop_cover}})">
                            <div class="ec-page-block">
                                <div class="ec-catalog-vendor">
                                    <img src="{{asset('main')}}/images/logos/{{$shop->shop_logo}}" alt="vendor img">
                                </div>
                                
                                <div class="ec-catalog-vendor-info row">
                                    <div class="col-lg-4 col-md-6 ec-catalog-name pad-15">
                                        <a href="{{url('singleshop/'.$shop->slug)}}">
                                            <h6 class="name">{{$shop->shopname}}</h6>
                                        </a>
                                        <p></p>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6 ec-catalog-pro-count pad-15">
                                        <h6>{{__('Seller Products')}}</h6>
                                        <p>{{$shop->products->count()}}</p>
                                    </div>
                                    <div class="col-lg-4 col-md-6 ec-catalog-since pad-15">
                                        <h6>{{__('Seller since')}}</h6>
                                        <p>{{$shop->updated_at->format('Y-m-d')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 margin-bottom-30">
                        <div class="ec-page-description p-30">
                            <h5 class="ec-desc-title">{{__('About Our Firm')}}</h5>
                            <p>
                                {{$shop->shop_description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ec catalog page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-9 order-lg-last col-md-12 order-md-first margin-b-30">
                    <!-- Shop Top Start -->
                    <div class="ec-pro-list-top d-flex">
                        <div class="col-md-6 ec-grid-list">
                            <div class="ec-gl-btn">
                                <button class="btn btn-grid active"><img src="{{asset('main')}}/images/icons/grid.svg"
                                        class="svg_img gl_svg" alt="" /></button>
                                <button class="btn btn-list"><img src="{{asset('main')}}/images/icons/list.svg"
                                        class="svg_img gl_svg" alt="" /></button>
                            </div>
                        </div>
                        {{-- <div class="col-md-6 ec-sort-select">
                            <span class="sort-by">Sort by</span>
                            <div class="ec-select-inner">
                                <select name="ec-select" id="ec-select" wire:model="sorting">
                                    <option selected="selected" value="default" >Newest First</option>
                                    <option value="price-asc">Price, low to high</option>
                                    <option value="price-desc">Price, high to low</option>
                                </select>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Shop Top End -->

                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="shop-pro-inner">
                            <div class="row">
                                @php
                                    $witems = Cart::instance('wishlist')->content()->pluck('id');
                                @endphp
                                @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="{{url('product/'.$product->slug)}}" class="image">
                                                    <img class="main-image"
                                                        src="{{asset('main')}}/images/products/{{$product->image}}" alt="Product" />
                                                    <img class="hover-image"
                                                        src="{{asset('main')}}/images/products/{{$product->image}}" alt="Product" />
                                                </a>
                                                @if ($product->sale_price)
                                                <span class="percentage">{{round( 100  -  ($product->sale_price * 100 / $product->normal_price) )}}%</span>
                                                @endif
                                                
                                                <div class="ec-pro-actions">
                                                    
                                                    <a  title="Add To Cart"  class="add-to-cart"  wire:click.prevent="store('{{$product->id }}','{{$product->name}}', {{$product->final_price}}, '{{$product->shop_id}}')"><img
                                                            src="{{asset('main')}}/images/icons/cart.svg" class="svg_img pro_svg"
                                                            alt="" /> {{__('Add To Cart')}}</a>
                                                            @if($witems->contains($product->id))
                                                            <a class="ec-btn-group " title="Wishlist" href="{{url('wishlist')}}" ><img
                                                                src="{{asset('main')}}/images/icons/wishlist.svg"
                                                                class="svg_img pro_svg" alt="" /></a>
                                                            @else
                                                            <a class="ec-btn-group " wire:click="addToWishlist('{{$product->id }}','{{$product->name}}', {{$product->final_price}}, '{{$product->shop_id}}')"><img
                                                                src="{{asset('main')}}/images/icons/wishlist.svg"
                                                                class="svg_img pro_svg" alt="" /></a>
                                                            @endif
                                                    
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
                        </div>
                        <!-- Ec Pagination Start -->
                        {{-- <div class="ec-pro-pagination">
                            <span>Showing 1-12 of 21 item(s)</span>
                            <ul class="ec-pro-pagination-inner">
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a class="next" href="#">Next <i class="ecicon eci-angle-right"></i></a></li>
                            </ul>
                        </div> --}}
                        <!-- Ec Pagination End -->
                    </div>
                    <!--Shop content End -->
                </div>
                
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12 order-lg-first order-md-last">
                    <div class="ec-sidebar-wrap">
                    
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">{{__('Categories')}}</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" checked /> <a href="#">clothes</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">Bags</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">Shoes</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">cosmetics</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">electrics</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">phone</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li id="ec-more-toggle-content" style="padding: 0; display: none;">
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" /> <a href="#">Watch</a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" /> <a href="#">Cap</a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item ec-more-toggle">
                                            <span class="checked"></span><span id="ec-more-toggle">More
                                                Categories</span>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Size Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Size</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" checked /><a href="#">S</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">M</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /> <a href="#">L</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">XL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">XXL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Color item -->
                        <div class="ec-sidebar-block ec-sidebar-block-clr">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Color</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#78a4fc;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ff8b9e;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#3d3d3d;"></span></div>
                                    </li>
                                    <li class="active">
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#9fffad;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ff8367;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#f691ff;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#ffc601;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#600ad6;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#09e3db;"></span></div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item"><span
                                                style="background-color:#0bc27f;"></span></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Price Block -->
                        <div class="ec-sidebar-block" >
                            <div class="ec-sb-title" >
                                <h3 class="ec-sidebar-title">{{__('Price')}} <span class="text-info">${{$min_price}} - {{$max_price}}</span></h3>
                            </div>
                            <div class="ec-sb-block-content es-price-slider" wire:ignore>
                                <div class="ec-price-filter">
                                    <div class="slider-styled" id="slider-round"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Price Block -->
                        {{-- <div class="ec-sidebar-block ec-contact-form">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Contact With Seller</h3>
                            </div>
                            <div class="ec-sb-block-content ec-sb-block-form">
                                <form action="">
                                    <label for="fname">Your Name</label>
                                    <input type="text" id="fname" name="firstname" placeholder="Your name.."
                                        required="required">

                                    <label for="lname">Your Email Id</label>
                                    <input type="text" id="lname" name="lastname" placeholder="Your email is.."
                                        required="required">

                                    <label for="subject">Your Message</label>
                                    <textarea id="subject" name="subject" placeholder="Write Messages.." rows="4"
                                        required="required"></textarea>

                                    <button type="submit" class="btn btn-lg btn-primary" tabindex="0">Submit</button>
                                </form>
                            </div>
                        </div> --}}
                    </div>
                </div>
                

                </div>
            </div>
    </section>



</div>
@push('scripts')
    <script>
        var slider = document.getElementById('slider-round');
        noUiSlider.create(slider,{
            start: [1, 1000000],
            connect: true,
            range: {
                'min' : 1,
                'max' : 1000000
            },
            pips: {
                mode: 'steps',
                stepped: true,
                density:5
            }
        });
        slider.noUiSlider.on('update', function (value) {
           @this.set('min_price', value[0]);
           @this.set('max_price', value[1]);
        });
    </script>
@endpush