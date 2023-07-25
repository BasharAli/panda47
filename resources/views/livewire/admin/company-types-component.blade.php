<div>
    <!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Company Types </h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Company Types</p>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add Company Type</h4>

										<form enctype="multipart/form-data" wire:submit.prevent="storeType">
											<div class="form-group row">
												<label for="text" class="col-12 col-form-label">Type</label> 
												<div class="col-12">
													<input class="form-control here slug-title" type="text" wire:model.defer="cType" required>
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
													<th>Type</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($types as $type)
                                                    
												<tr>
													<td>{{$type->cType}}</td>
													
													<td>
														<div class="btn-group">
															<div class="">
																<a class="btn btn-danger" type="button" style="cursor: pointer" wire:click.prevent="deleteType({{$type->id}})">Delete</a>
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

