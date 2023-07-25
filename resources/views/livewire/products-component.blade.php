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
                            <h2 class="ec-breadcrumb-title">{{__($subCategory->name)}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
								<li class="ec-breadcrumb-item "> <a href="{{url('categories/'.$subCategory->category->slug)}}">{{__($subCategory->category->name)}}</a> </li>
                                <li class="ec-breadcrumb-item active">{{__($subCategory->name)}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Ec breadcrumb end -->

	

	

	<!-- START Product Left Side Content Style -->
	<section class="sec-lsc el-prod section-space-p">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="section-title">
						<h2 class="ec-bg-title">{{__($subCategory->name)}}</h2>
						<h2 class="ec-title">{{__($subCategory->name)}}</h2>
						<p class="sub-title">{!! __('Browse The Collection of :CATNAME Products', ['CATNAME' => __($subCategory->name)]) !!}</p>

					</div>
				</div>
			</div>
			<div class="row">
				@php
				$witems = Cart::instance('wishlist')->content()->pluck('id');
			@endphp

				@foreach ($subCategory->products as $product)
				<div class="col-lg-3 col-md-6 col-sm-6">
					<!-- START single card -->
					<div class="ec-product-lsc">
						<div class="ec-product-image">
							<a href="{{url('product/'.$product->slug)}}">
								<img src="{{asset('main')}}/images/products/{{$product->image}}" class="img-center" alt="">
							</a>
							{{-- <span class="">New</span> --}}
							@if ($product->sale_price)
                                                <span class="ec-product-ribbon">{{round( 100  -  ($product->sale_price * 100 / $product->normal_price) )}}%</span>
                                                @endif
						</div>
						<div class="ec-product-body">
							<p class="ec-description"> {{$product->brand->name}} @if ($product->stock_status == "instock")
								<span>{{__('In stock')}}</span>
							@else
							<span>{{__('Out of stock')}}</span>
							@endif </p>
							<h3 class="ec-title"><a href="{{url('product/'.$product->slug)}}">{{$product->name}}</a></h3>

							
							<div class="ec-el-price">
								@if ($product->sale_price)
													<p class="ec-o-price"> TRY {{$product->sale_price}}   </p>
													<p class="ec-d-price" style="left: 130px !important"> TRY {{$product->normal_price}}</p>
                                                @else
													<p class="ec-o-price"> TRY {{$product->normal_price}} </p>
                                                @endif
								
							</div>
							
							<div class="ec-link-btn">
								<a class=" ec-add-to-cart add-to-cart" wire:click.prevent="store('{{$product->id }}','{{$product->name}}', {{$product->final_price}}, '{{$product->shop_id}}')">{{__('Add To Cart')}}</a>
								<div class="ec-link-icon">
									@if($witems->contains($product->id))
									
										<a href="{{url('wishlist')}}" data-tip="Add to Wishlist"><img src="{{asset('main')}}/images/icons/wishlist.svg"
											class="svg_img header_svg pro_svg" alt="wishlist" /></a>
									@else
									
										<a wire:click="addToWishlist('{{$product->id }}','{{$product->name}}', {{$product->final_price}})"  data-tip="Add to Wishlist"><img src="{{asset('main')}}/images/icons/wishlist.svg"
											class="svg_img header_svg pro_svg" alt="wishlist"  /></a>
									@endif
									
								</div>
							</div>
						</div>
					</div>
					<!-- START single card -->
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!--/END Product Left Side Content Style -->

</div>