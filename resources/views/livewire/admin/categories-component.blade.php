<div>
    <!-- CONTENT WRAPPER -->

	
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Main Categories</h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Main Categories</p>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add New Category</h4>

										<form enctype="multipart/form-data" wire:submit.prevent="storeCategory">
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
													<input id="cat_img"  class="form-control here slug-title" type="file" wire:model="category_image">
												</div>
												<div class="col-12 mt-3">
													@if ($category_image)
													<img width="100px" src="{{$category_image->temporaryUrl()}}" alt="">

													@endif
												</div>
											</div>

											

											<div class="row">
												<div class="col-12">
													<button type="submit"  class="btn btn-primary">ADD</button>
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
													<th>Sub Categories</th>
													<th>Products</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												@foreach ($categories as $category)
												<tr>
													<td><img class="cat-thumb" src="{{asset('main')}}/images/categories/{{$category->image}}" alt="category Image" /></td>
													<td>{{$category->name}}</td>
													<td>
														<span class="ec-sub-cat-list">
														<span class="ec-sub-cat-count" title="Total Sub Categories">{{$category->subcategories->count()}}</span>
														</span>
													</td>
													<td>
														<span class="ec-sub-cat-list">
														<span class="ec-sub-cat-count" title="Total Sub Categories">{{$category->products->count()}}</span>
														</span>
													</td>
													<td>
														<div >
															
															

															<div class="">
																<a class="btn btn-success" href="{{url('admin/categories/'.$category->slug.'/edit')}}">Edit</a>
																<a class="btn btn-danger" style="cursor: pointer" wire:click.prevent="deleteCategory({{$category->id}})">Delete</a>
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
