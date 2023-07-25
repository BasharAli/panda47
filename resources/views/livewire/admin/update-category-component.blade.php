<div>
       <!-- CONTENT WRAPPER -->

	
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Edit Category</h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Edit Category</p>
					</div>
					<div class="row">
						<div class="col-xl-12 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Edit Category</h4>

										<form enctype="multipart/form-data"  wire:submit.prevent="updateCategory">
											<div class="form-group row">
												<label for="text" class="col-12 col-form-label">Category Name</label> 
												<div class="col-12">
													<input class="form-control here slug-title" type="text" wire:model="name" wire:keyup="generateslug" required>
												</div>
											</div>

											<div class="form-group row">
												<label for="text" class="col-12 col-form-label">Category Slug</label> 
												<div class="col-12">
													<input id="" class="form-control here slug-title" type="text" wire:model="slug">
												</div>
											</div>

											<div class="form-group row">
												<label for="cat_img" class="col-12 col-form-label">Category Image</label> 
												<div class="col-12">
													<input id="cat_img"  class="form-control here slug-title" type="file" wire:model="newCategory_image">
													<div class="col-12 mt-3">
														@if ($newCategory_image)
														<img width="100px" src="{{$newCategory_image->temporaryUrl()}}" alt="">
														@else
														<img width="100px" src="{{asset('main')}}/images/categories/{{$category_image}}" alt="">
														@endif
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-12">
													<button type="submit"  class="btn btn-primary">Edit</button>
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
