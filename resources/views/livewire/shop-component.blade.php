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


    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('All Shops')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('All Shops')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <div class="section-space-p">
        @foreach ($shops as $shop)
        <!-- Vendor list Section Start -->
        <section class="section ec-catalog-multi-vendor margin-bottom-30">
            <div class="container">
                <div class="row">
                    <div class="ec-multi-vendor-detail">
                        <div class="ec-page-description ec-page-description-info">
                            <div class="ec-catalog-vendor">
                                <img width="200px" height="200px" src="{{asset('main')}}/images/logos/{{$shop->shop_logo}}" alt="shop img">
                            </div>
                            <div class="ec-catalog-vendor-info">
                                <div class="row vendor-card-height">
                                    <div class="col-lg-6 col-md-6 detail-card-space">
                                        <div class="seller-name-level catalog-detail-card">

                                            <a href="{{url('singleshop/'.$shop->slug)}}">
                                                <h6 class="name">{{$shop->shopname}}</h6>
                                            </a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6 detail-card-space">
                                        <div class="ec-catalog-pro-count catalog-detail-card">
                                            <h6>{{__('Seller Products')}}</h6>
                                            <p>{{$shop->products->count()}}</p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row vendor-row">
                    <div class="ec-multi-vendor-slider">
                        @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        @foreach ($shop->products as $product)
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
                                            
                                            <a wire:click.prevent="store('{{$product->id }}','{{$product->name}}', {{$product->final_price}}, '{{$product->shop_id}}')" title="Add To Cart" class="add-to-cart"><img
                                                    src="{{asset('main')}}/images/icons/cart.svg" class="svg_img pro_svg"
                                                    alt="" /> {{__('Add To Cart')}}</a>
                                            
                                                    {{-- @if($witems->contains($product->id))
                                                            <a class="ec-btn-group wishlist" title="Wishlist" href="{{url('wishlist')}}" ><img
                                                                src="{{asset('main')}}/images/icons/wishlist.svg"
                                                                class="svg_img pro_svg" alt="" /></a>
                                                            @else
                                                            <a class="ec-btn-group wishlist" wire:click.defer="addToWishlist('{{$product->id }}','{{$product->name}}', {{$product->final_price}})"><img
                                                                src="{{asset('main')}}/images/icons/wishlist.svg"
                                                                class="svg_img pro_svg" alt="" /></a>
                                                            @endif --}}
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
                                    <div class="ec-pro-list-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dutmmy text ever since the 1500s, when an unknown printer took a galley.</div>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Vendor list Section End -->
        @endforeach
                      
    </div>
    {{-- <div class="ec-pro-pagination">
        <ul class="ec-pro-pagination-inner">
            {{$shops->links()}}
        </ul>
    </div> 
    <div>
        <button wire:click="gotoPage(1)">1</button>
        <button wire:click="previousPage">Previous</button>
        <button wire:click="nextPage">Next</button>
        <button wire:click="gotoPage({{ $shops->lastPage() }})">{{ $shops->lastPage() }}</button>
    </div> --}}
</div>