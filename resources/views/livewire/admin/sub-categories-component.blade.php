<div>
    <!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
						<h1>Sub Category</h1>
						<p class="breadcrumbs"><span><a href="index.html">Home</a></span>
							<span><i class="mdi mdi-chevron-right"></i></span>Sub Category</p>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add Sub Category</h4>

										<form enctype="multipart/form-data" wire:submit.prevent="storesubCategory">

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
														<option value="" selected  >Select Category</option>
														@foreach ($category as $cat)
														<option value="{{$cat->id}}">{{$cat->name}}</option>
														@endforeach
													
													</select>
												</div>
											</div>

											<div class="form-group row">
												<label for="cat_img" class="col-12 col-form-label">Sub-Category Image</label> 
												<div class="col-12">
													<input id="cat_img"  class="form-control here slug-title" type="file" wire:model="subcategory_image">
												</div>
												<div class="col-12 mt-3">
													@if ($subcategory_image)
													<img width="100px" src="{{$subcategory_image->temporaryUrl()}}" alt="">
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
						<div class="col-xl-8 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>Thumb</th>
													<th>Name</th>
													<th>Main Category</th>
													<th>Products</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												@foreach ($subCategories as $sub)
												<tr>
													<td><img class="cat-thumb" src="{{asset('main')}}/images/subcategories/{{$sub->image}}" alt="subcategory Image" /></td>
													<td>{{$sub->name}}</td>
													<td>
														{{$sub->category->name}}
													</td>
													<td>
														<span class="ec-sub-cat-list">
														<span class="ec-sub-cat-count" title="Total Sub Categories">{{$sub->products->count()}}</span>
														</span>
													</td>
													<td>
														<div class="btn-group">
															<button type="button"
																class="btn btn-outline-success">Info</button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only">Info</span>
															</button>

															<div class="dropdown-menu">
																<a class="dropdown-item" href="{{url('admin/subcategories/'.$sub->slug.'/edit')}}">Edit</a>
																<a class="dropdown-item" style="cursor: pointer" wire:click.prevent="deletesubCategory({{$sub->id}})">Delete</a>
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
