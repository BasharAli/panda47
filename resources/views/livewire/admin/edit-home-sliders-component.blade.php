<div>
    <!-- CONTENT WRAPPER -->

 
         <div class="ec-content-wrapper">
             <div class="content">
                 <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                         <h1>Edit Slider</h1>
                         <p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
                             <span><i class="mdi mdi-chevron-right"></i></span>Edit Slider</p>
                 </div>
                 <div class="row">
                     <div class="col-xl-12 col-lg-12">
                         <div class="ec-cat-list card card-default mb-24px">
                             <div class="card-body">
                                 <div class="ec-cat-form">
                                     <h4>Edit Slider</h4>

                                     <form  enctype="multipart/form-data" wire:submit.prevent = "updateSlider">
                                        <div class="form-group row">
                                            <label for="text" class="col-12 col-form-label">Slider Title</label> 
                                            <div class="col-12">
                                                <input id="text"  class="form-control here slug-title" type="text" wire:model = "title">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="text" class="col-12 col-form-label">Slider Sub-title</label> 
                                            <div class="col-12">
                                                <input id="text"  class="form-control here slug-title" type="text" wire:model="subtitle">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="text" class="col-12 col-form-label">Slider Short Decription</label> 
                                            <div class="col-12">
                                                <input id="text"  class="form-control here slug-title" type="text" wire:model="short_desc">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="text" class="col-12 col-form-label">Slider Link</label> 
                                            <div class="col-12">
                                                <input id="text"  class="form-control here slug-title" type="text" wire:model="link">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="brand_img" class="col-12 col-form-label">Slider Image (1920 x 800)</label> 
                                            <div class="col-12">
                                                <input id="brand_img" class="form-control here set-slug" type="file" wire:model="newimage">
                                            </div>
                                            <div class="col-12 mt-3">
                                                <img width="100px"
                                                @if ($newimage)
                                                src="{{$newimage->temporaryUrl()}}" alt=""
                                                @else
                                                src="{{asset('main')}}/images/sliders/{{$image}}" alt=""
                                                @endif
                                                >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit"  class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>

                                 </div>
                             </div>
                         </div>
                     </div>
                     
                 </div>
             </div> <!-- End Content -->
         </div> <!-- End Content Wrapper -->
</div>

