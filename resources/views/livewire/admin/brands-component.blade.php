<div>
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Brand</h1>
                    <p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span> Brand</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            <div class="ec-cat-form">
                                <h4>Add New Brand</h4>

                                <form enctype="multipart/form-data" wire:submit.prevent="storeBrand">
                                    <div class="form-group row">
                                        <label for="text" class="col-12 col-form-label">Brand Name</label>
                                        <div class="col-12">
                                            <input class="form-control here slug-title" type="text" wire:model="name" wire:keyup="generateslug" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="text" class="col-12 col-form-label">Brand Slug</label>
                                        <div class="col-12">
                                            <input id="" class="form-control here slug-title" type="text" wire:model="slug">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="cat_img" class="col-12 col-form-label">Brand Image</label>
                                        <div class="col-12">
                                            <input id="cat_img" class="form-control here slug-title" type="file" wire:model="image">
                                        </div>
                                        <div class="col-12 mt-3">
                                            @if ($image)
                                            <img width="100px" src="{{$image->temporaryUrl()}}" alt="">

                                            @endif
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12 col-lg-12 product-brand card card-default p-24px">
                    <div class="row mb-m-24px">
                        @foreach ($brands as $brand)
                        <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                            <div class="card card-default">
                                <div class="card-body text-center p-24px">
                                    <div class="image mb-3">
                                        <img src="{{asset('main')}}/images/brands/{{$brand->image}}" class="img-fluid rounded-circle" alt="Avatar Image">
                                    </div>

                                    <h5 class="card-title text-dark">{{$brand->name}}</h5>
                                    <p class="item-count">{{$brand->products->count()}}<span> Products</span></p>
                                    <span class="brand-delete mdi mdi-delete-outline" wire:click.prevent="deleteBrand({{$brand->id}})"></span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <!-- Modal -->

        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
</div>

