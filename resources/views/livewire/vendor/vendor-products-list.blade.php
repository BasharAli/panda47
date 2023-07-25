<div>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Vendor Dashboard</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="ec-breadcrumb-item"><a href="{{url('myaccount/'.$shop->slug)}}">My Shop</a></li>
                                <li class="ec-breadcrumb-item active">Dashboard</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Vendor dashboard section -->
    <section class="ec-page-content ec-vendor-dashboard section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <div class="ec-vendor-block-bg" style="background-image: url(/main/images/covers/{{$shop->shop_cover}})"></div>
                                <div class="ec-vendor-block-detail">
                                    <img class="v-img" src="{{asset('main')}}/images/logos/{{$shop->shop_logo}}" alt="vendor image">
                                    <h5>{{$shop->shopname}}</h5>
                                </div>
                                <div class="ec-vendor-block-items">
                                    <ul>
                                        <li><a href="{{url('myaccount/'.$shop->slug)}}">Dashboard</a></li>
                                        <li><a href="{{url('myaccount/'.$shop->slug.'/orders')}}">Orders</a></li>
                                        <li><a href="{{url('myaccount/'.$shop->slug.'/products')}}">Products</a></li>
                                        <li><a href="{{url('myaccount/'.$shop->slug.'/info')}}">Shop Info</a></li>
                                        <li><a href="{{url('myaccount/'.$shop->slug.'/delivery')}}">Delivery Prefferences</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card space-bottom-30">
                        <div class="ec-vendor-card-header">
                            <h5>Product List</h5>
                            <div class="ec-header-btn">
                                <a class="btn btn-lg btn-primary" href="{{url('/myaccount/'.$shop->slug.'/add-product')}}">Add</a>
                            </div>
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                <table class="table ec-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Sale Price</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($shop->products as $product)
                                        <tr>
                                            <th scope="row"><span>{{$product->SKU}}</span></th>
                                            <td><img class="prod-img" src="{{asset('main')}}/images/products/{{$product->image}}"
                                                    alt="product image"></td>
                                            <td><span>{{$product->name}}</span></td>
                                            <td><span>{{$product->normal_price}}</span></td>
                                            <td><span>@if ($product->sale_price)
                                                {{$product->sale_price}}
                                            @else
                                                Not On Sale
                                            @endif</span></td>
                                            <td><span>{{$product->quantity}}</span></td>
                                            <td>
                                                    {{-- <a class="btn btn-primary" href="{{url('/myaccount/'.$shop->slug.'/products/'.$product->slug.'/view')}}"><i class="ecicon eci-eye"></i></a> --}}
                                                    <div class="mb-2"></div>
                                                    <a class="btn btn-primary" wire:click.prevent = "deleteProduct({{$product->id}})"><i class="ecicon eci-trash"></i></a>
                                                    <div class="mb-2"></div>
                                                    <a class="btn btn-primary" href="{{url('/myaccount/'.$shop->slug.'/products/'.$product->slug.'/edit')}}"><i class="ecicon eci-edit"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Vendor dashboard section -->
</div>
