<div>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Add Product</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Add Product</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Vendor upload section -->
    <section class="ec-page-content ec-vendor-uploads section-space-p">
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
                    <div class="ec-vendor-dashboard-card">
                        <div class="ec-vendor-card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="ec-vendor-img-upload">
                                        <div class="ec-vendor-main-img">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type='file' id="imageUpload" class="ec-image-upload"
                                                        accept=".png, .jpg, .jpeg" wire:model="newimage" />
                                                    <label for="imageUpload"><img src="{{asset('main')}}/images/icons/edit.svg"
                                                            class="svg_img header_svg" alt="edit" /></label>
                                                </div>
                                                <div class="avatar-preview ec-preview">
                                                    <div class="imagePreview ec-div-preview">
                                                        
                                                        <img class="ec-image-preview"
                                                        @if ($newimage)
                                                        src="{{$newimage->temporaryUrl()}}"
                                                        @else
                                                        src="{{asset('main')}}/images/products/{{$product_img}}"
                                                        @endif

                                                        alt="edit" />
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center mb-2">
                                                <label for="" class="form-label">Images Gallery:</label>
                                            </div>
                                            @if (!$newimages)
                                                <div class="thumb-upload-set colo-md-12">
                                                    <div class="thumb-upload">
                                                        <div class="thumb-edit">
                                                            <input type='file' id="thumbUpload01" class="ec-image-upload"
                                                                accept=".png, .jpg, .jpeg, .webp" multiple wire:model="newimages"/>
                                                            <label for="imageUpload"><img src="{{asset('main')}}/images/icons/edit.svg"
                                                                    class="svg_img header_svg" alt="edit" /></label>
                                                        </div>
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview"
                                                                    src="{{asset('main')}}/images/product-image/vender-upload-thumb-preview.jpg"
                                                                    alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>                                                
                                                </div>
                                            @endif

                                            @if ($newimages)
                                                @foreach ($newimages as $image)
                                                <div class="thumb-upload-set">
                                                    <div class="thumb-upload">
                                                        <div class="thumb-preview ec-preview">
                                                            <div class="image-thumb-preview">
                                                                <img class="image-thumb-preview ec-image-preview"
                                                                    src="{{$image->temporaryUrl()}}"
                                                                    alt="edit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @else
                                                @php
                                                    $imagess  = explode(',' , $images);
                                                @endphp
                                                @foreach ($imagess as $image)
                                                    @if ($image)
                                                    <div class="thumb-upload-set">
                                                        <div class="thumb-upload">
                                                            <div class="thumb-preview ec-preview">
                                                                <div class="image-thumb-preview">
                                                                    <img class="image-thumb-preview ec-image-preview"
                                                                        src="{{asset('main')}}/images/products/{{$image}}"
                                                                        alt="edit" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                            @error('images.*') <span class="error text-danger text-center">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="ec-vendor-upload-detail">
                                        <form class="row g-3" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Product name</label>
                                                <input type="text" class="form-control" id="name" wire:model= "name" wire:keyup="generateSlug">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="slug" class="form-label">Slug</label>
                                                <input type="text" class="form-control" id="slug" wire:model="new_product_slug">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="normal_price" class="form-label">Price (TL)</label>
                                                <input type="text" class="form-control" id="normal_price" wire:model="normal_price">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="sale_price" class="form-label">Sale Price (TL)</label>
                                                <input type="text" class="form-control" id="sale_price" wire:model="sale_price">
                                            </div>
                                            <div class="col-md-6">
                                                <label  class="form-label">Select Tax</label>
                                                <select  id="Categories" class="form-select" wire:model="tax">
                                                    <option value="" selected  >Select Tax</option>
                                                    @foreach ($taxes as $tax)
                                                    <option value="{{$tax->tax_value}}">{{$tax->name}}({{$tax->tax_value}})</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="final_price" class="form-label">Final Price (TL)</label>
                                                <input type="text" class="form-control" id="final_price" wire:model="final_price" readonly>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="commission" class="form-label">Commission (TL)</label>
                                                <input type="text" class="form-control" id="commission" wire:model="commision" readonly>
                                            </div>

                                            <div class="col-md-6">
                                                <label  class="form-label">Select Category</label>
                                                <select  id="Categories" class="form-select" wire:model="category_id">
                                                    <option value="" selected  >Select Category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label  class="form-label">Select Sub Category</label>
                                                <select  id="subCategories" class="form-select" wire:model="subcategory_id">
                                                    <option value="" selected >Select Sub-Category</option>
                                                    @foreach ($subCategories as $subcategory)
                                                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label  class="form-label">Select Brand</label>
                                                <select id="brand" class="form-select" wire:model="brand_id">
                                                    <option value="" selected  >Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Short Description</label>
                                                <textarea class="form-control"
                                                    rows="2" wire:model="short_description"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Full Description</label>
                                                <textarea class="form-control"
                                                    rows="5" wire:model="full_description"></textarea>
                                            </div>
                                            <div class="col-md-4 mb-25">
                                                <label class="form-label">Colors</label>
                                                <input type="color" class="form-control form-control-color"
                                                    id="exampleColorInput1" value="#ff6191" title="Choose your color">
                                                <input type="color" class="form-control form-control-color"
                                                    id="exampleColorInput2" value="#33317d" title="Choose your color">
                                                <input type="color" class="form-control form-control-color"
                                                    id="exampleColorInput3" value="#56d4b7" title="Choose your color">
                                                <input type="color" class="form-control form-control-color"
                                                    id="exampleColorInput4" value="#009688" title="Choose your color">
                                            </div>
                                            <div class="col-md-8 mb-25">
                                                <label class="form-label">Size</label>
                                                <div class="form-checkbox-box">
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="size1" value="size">
                                                        <label>S</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="size1" value="size">
                                                        <label>M</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="size1" value="size">
                                                        <label>L</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="size1" value="size">
                                                        <label>XL</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" name="size1" value="size">
                                                        <label>XXL</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" class="form-control" id="quantity1" wire:model="quantity">
                                            </div>

                                            <div class="col-md-6">
                                                <label  class="form-label">Stock Status</label>
                                                <select name="stock" id="stock" class="form-select" wire:model="stock_status">
                                                    <option value="" selected disabled>Select stock status</option>
                                                    <option value="instock">In Stock</option>
                                                    <option value="outofstock">Out Of Stock</option>
                                                    
                                                </select>
                                            </div>
                                            <input type="hidden" wire:model="shop_id">
                                            
                                            
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Vendor upload section -->
</div>
