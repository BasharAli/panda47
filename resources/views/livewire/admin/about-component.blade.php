<div>
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                <h1>About Us </h1>
                <p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>About Us</p>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            @if ($limited)
                            <div class="text-center">
                                <h4>
                                    You Have Reached the limit of ABOUT additions.
                                </h4>
                            </div>
                            @else
                            <div class="ec-cat-form">
                                <h4>Add About Us</h4>

                                <form enctype="multipart/form-data" wire:submit.prevent="addAbout">
                                    <div class="form-group row">
                                        <label for="text" class="col-12 col-form-label">Title</label>
                                        <div class="col-12">
                                            <input class="form-control here slug-title" type="text" wire:model.defer="title" required>
                                        </div>

                                        <label for="desc" class="col-12 col-form-label">Description</label>
                                        <div class="col-12">
                                            <textarea name="" id="desc" cols="30" rows="10" wire:model.defer="description"></textarea>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cat_img" class="col-12 col-form-label">About Us Image</label>
                                            <div class="col-12">
                                                <input id="cat_img" class="form-control here slug-title" type="file" wire:model.defer="image">
                                            </div>
                                            <div class="col-12 mt-3">
                                                @if ($image)
                                                <img width="100px" src="{{$image->temporaryUrl()}}" alt="">
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12">
                    <div class="ec-cat-list card card-default">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="responsive-data-table" class="table">
                                    <thead>
                                        <tr>
                                            <th>Thumb</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($abouts as $about)

                                        <tr>
                                            <td><img class="cat-thumb" src="{{asset('main')}}/images/about/{{$about->image}}" alt="category Image" /></td>
                                            <td>{{$about->title}}</td>
                                            <td>{{$about->description}}</td>

                                            <td>
                                                <div class="btn-group">
                                                    <div class="">
                                                        <a class="btn btn-danger" type="button" style="cursor: pointer" wire:click.prevent="deleteAbout({{$about->id}})">Delete</a>
                                                    </div>
                                                </div>
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
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
</div>

