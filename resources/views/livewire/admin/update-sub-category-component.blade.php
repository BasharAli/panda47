<div>
    <!-- CONTENT WRAPPER -->

 
         <div class="ec-content-wrapper">
             <div class="content">
                 <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                         <h1>Edit Sub-Category</h1>
                         <p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
                             <span><i class="mdi mdi-chevron-right"></i></span>Edit Sub-Category</p>
                 </div>
                 <div class="row">
                     <div class="col-xl-12 col-lg-12">
                         <div class="ec-cat-list card card-default mb-24px">
                             <div class="card-body">
                                 <div class="ec-cat-form">
                                     <h4>Edit Sub-Category</h4>

                                     <form enctype="multipart/form-data" wire:submit.prevent="updatesubCategory">

                                        <div class="form-group row">
                                            <label for="text" class="col-12 col-form-label">Name</label> 
                                            <div class="col-12">
                                                <input id="text" name="text" class="form-control here slug-title" type="text" wire:model="name" wire:keyup="generateslug">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="slug" class="col-12 col-form-label">Slug</label> 
                                            <div class="col-12">
                                                <input id="slug" wire:model="slug" class="form-control here set-slug" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="parent-category" class="col-12 col-form-label">Parent Category</label> 
                                            <div class="col-12">
                                                <select id="parent-category"  class="custom-select" wire:model="category_id"> 
                                                    @foreach ($category as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                
                                                </select>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group row">
                                            <label for="cat_img" class="col-12 col-form-label">Sub-Category Image</label> 
                                            <div class="col-12">
                                                <input id="cat_img"  class="form-control here slug-title" type="file" wire:model="newsubCategory_image">
                                            </div>
                                            <div class="col-12 mt-3">
                                                @if ($newsubCategory_image)
                                                <img width="100px" src="{{$newsubCategory_image->temporaryUrl()}}" alt="">
                                                @else
                                                <img width="100px" src="{{asset('main')}}/images/subcategories/{{$subcategory_image}}" alt="">

                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <button  type="submit" class="btn btn-primary">Submit</button>
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
