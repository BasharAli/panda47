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

    <section class="sec-tp el-prod section-space-p">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="section-title">
						@if ($products->count() > 0)
						<p class="sub-title">{{__('You searched for')}}:</p>
						<br>
							<h2 class="ec-title">{{$this->search}}</h2>
							<br>
						@else
						<h2 class="ec-title">{{__('No Products Matched Your Search')}}</h2>

						@endif
						
					</div>
				</div>
			</div>
			<div class="row">
				@php
				$witems = Cart::instance('wishlist')->content()->pluck('id');
			@endphp
                @foreach ($products as $product)
				
					<div class="col-lg-3 col-md-6 col-sm-6">
						<!-- START single card -->
						<div class="ec-product-tp">
							<div class="ec-product-image">
								<a href="{{url('product/'.$product->slug)}}">
									<img src="{{asset('main')}}/images/products/{{$product->image}}" class="img-center" alt="">
								</a>
								@if ($product->sale_price)
													<span class="ec-product-ribbon">{{round( 100  -  ($product->sale_price * 100 / $product->normal_price) )}}%</span>
													@endif
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
							<div class="ec-product-body">
								<h3 class="ec-title"><a href="{{url('product/'.$product->slug)}}">{{$product->name}}</a></h3>
								<ul style="text-align: center" class="ec-breadcrumb-list">
									<li class="ec-breadcrumb-item"><a href="{{url('categories/'.$product->category->slug)}}">{{$product->category->name}}</a></li>
									<li class="ec-breadcrumb-item active"> <a href="{{url('categories/'.$product->category->slug .'/'.$product->subcategory->slug)}}"> {{$product->subcategory->name}}</a></li>
								</ul>
								<p class="ec-description">
									{{$product->brand->name}}
								</p>
								<ul class="ec-rating">
									<li class="ecicon eci-star fill"></li>
									<li class="ecicon eci-star fill"></li>
									<li class="ecicon eci-star fill"></li>
									<li class="ecicon eci-star fill"></li>
									<li class="ecicon eci-star"></li>
								</ul>
								
								@if ($product->sale_price)
									<div class="ec-price"><span>TRY {{$product->normal_price}}</span> TRY {{$product->sale_price}}</div>
									@else
									<div class="ec-price"> TRY {{$product->normal_price}}</div>
								@endif
								<div class="ec-link-btn">
									<a class=" ec-add-to-cart" wire:click.prevent="store('{{$product->id }}','{{$product->name}}', {{$product->final_price}}, '{{$product->shop_id}}')">{{('Add To Cart')}}</a>
								</div>
							</div>

						</div>
						<!-- START single card -->
					</div>
                @endforeach
			</div>
		</div>
	</section>
</div>
