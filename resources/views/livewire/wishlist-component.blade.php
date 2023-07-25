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
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Wishlist</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Wishlist</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec Wishlist page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <!-- Compare Content Start -->
                <div class="ec-wish-rightside col-lg-12 col-md-12">
                    <!-- Compare content Start -->
                    <div class="ec-compare-content">
                        <div class="ec-compare-inner">
                            <div class="row margin-minus-b-30">
                                @if (Cart::instance('wishlist')->count() > 0)

                                @foreach (Cart::instance('wishlist')->content() as $product)
                                    
                                @endforeach
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="{{url('product/'.$product->model->slug)}}" class="image">
                                                    <img class="main-image"
                                                        src="{{asset('main')}}/images/products/{{$product->model->image}}" alt="Product" />
                                                    <img class="hover-image"
                                                        src="{{asset('main')}}/images/products/{{$product->model->image}}" alt="Product" />
                                                </a>
                                                <span class="ec-com-remove ec-remove-wish"><a href="javascript:void(0)" wire:click.prevent="removeFromWishlist({{$product->model->id}})">×</a></span>
                                                @if ($product->model->sale_price)
                                                <span class="percentage">{{round( 100  -  ($product->model->sale_price * 100 / $product->model->normal_price) )}}%</span>
                                                @endif
                                                
                                                <div class="ec-pro-actions">
                                                    
                                                    <a  title="Add To Cart"  class="add-to-cart"  wire:click.prevent="moveProduct('{{$product->rowId}}')"><img
                                                        src="{{asset('main')}}/images/icons/cart.svg" class="svg_img pro_svg"
                                                        alt="" /> Add To Cart</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <p class="ec-description"> {{$product->model->brand->name}}</p>

                                            <h5 class="ec-pro-title"><a href="{{url('product/'.$product->model->slug)}}">{{$product->model->name}}</a></h5>
                                            <div class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star"></i>
                                            </div>
                                            <div class="ec-pro-list-desc">
                                                {!! $product->model->short_description !!}
                                            </div>
                                            <span class="ec-price">
                                                @if ($product->model->sale_price)
                                                    <span class="old-price">TRY {{$product->model->normal_price}}</span>
                                                    <span class="new-price">TRY {{$product->model->sale_price}}</span>
                                                @else
                                                    <span class="new-price">TRY {{$product->model->normal_price}}</span>
                                                @endif
                                                
                                            </span>
                                            <div class="ec-pro-option">
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="ec-wish-rightside col-lg-12 col-md-12"><p class="emp-wishlist-msg">Your wishlist is empty!</p></div>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                    <!--compare content End -->
                </div>
                <!-- Compare Content end -->
            </div>
        </div>
    </section>
</div>   

