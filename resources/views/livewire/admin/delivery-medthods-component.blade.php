<div>
    <!-- CONTENT WRAPPER -->

	
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Delivery Methods</h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Delivery Methods</p>
					</div>
					<div class="row">
                        
                        <div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add New Delivery Methods</h4>
										<form  enctype="multipart/form-data" wire:submit.prevent = "addDelivery">
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Delivery Company Name</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model = "name">
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
													<th>Name</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($methods as $method)
                                                <tr>
													<td>
                                                        {{$method->name}}
                                                    </td>
													<td>
														<div class="">
                                                            <a class="btn btn-danger" wire:click.prevent="deleteDelivery({{$method->id}})" style="cursor: pointer">Delete</a>
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