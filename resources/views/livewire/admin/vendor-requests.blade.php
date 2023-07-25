<div id="main">
    <!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-contacts">
						<div>
							<h1>Vendor Requests</h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Vendor</p>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="ec-vendor-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>Shop Name</th>
													<th>Vendor Name</th>
													<th>Shop Email</th>
													<th>Company Type</th>
													<th>Vendor Address</th>
													<th>Status</th>
													<th>Ref. Name</th>
													<th>Join On</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												@foreach ($shops as $shop)
													<tr>
														<td>{{$shop->shopname}}</td>
														<td>{{$shop->user->firstname}} {{$shop->user->lastname}}</td>
														<td>{{$shop->shop_email}}</td>
														<td>{{$shop->type}}</td>
														<td>{{$shop->city}} / {{$shop->district}}  </td>
														<td>{{$shop->shop_status}}</td>
														<td>{{$shop->ref_name}}</td>
														<td>{{$shop->created_at->format('Y-m-d')}}</td>
														<td>
															<div class="">
																<div class="">
																	<a class="btn btn-primary mb-1" href="#">Info</a>
																	<button class="btn btn-warning" type="button" wire:click.prevent="approveVendor({{$shop->id}})">Approve</button>
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
					<!-- Add Vendor Modal  -->
					{{-- <div class="modal fade modal-add-contact" id="addVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
							<div class="modal-content">
								<form >
									<div class="modal-header px-4">
										<h5 class="modal-title" id="exampleModalCenterTitle">Add New Vendor</h5>
									</div>
									
									<div class="modal-body px-4">
										<div class="form-group row mb-6">
											<label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Vendor Image</label>
											
											<div class="col-sm-8 col-lg-10">
												<div class="custom-file mb-1">
													<input type="file" class="custom-file-input" id="coverImage" required>
													<label class="custom-file-label" for="coverImage">Choose file...</label>
													<div class="invalid-feedback">Example invalid custom file feedback</div>
												</div>
											</div>
										</div>
										
										<div class="row mb-2">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="firstName">First name</label>
													<input type="text" class="form-control" id="firstName" value="John">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group">
													<label for="lastName">Last name</label>
													<input type="text" class="form-control" id="lastName" value="Deo">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="userName">User name</label>
													<input type="text" class="form-control" id="userName" value="johndoe">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="email">Email</label>
													<input type="email" class="form-control" id="email" value="johnexample@gmail.com">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="Birthday">Birthday</label>
													<input type="text" class="form-control" id="Birthday" value="10-12-1991">
												</div>
											</div>
											
											<div class="col-lg-6">
												<div class="form-group mb-4">
													<label for="event">Address</label>
													<input type="text" class="form-control" id="event" value="Address here">
												</div>
											</div>
										</div>
									</div>
									
									<div class="modal-footer px-4">
										<button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
										<button type="button" class="btn btn-primary btn-pill">Save Contact</button>
									</div>
								</form>
							</div>
						</div>
					</div> --}}
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->
</div>
