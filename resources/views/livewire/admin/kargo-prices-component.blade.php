<div>
    <!-- CONTENT WRAPPER -->

	
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Delivery Prices</h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Delivery Prices</p>
					</div>
					<div class="row">
                        
                        <div class="col-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add New Delivery Price</h4>
										<form  enctype="multipart/form-data" wire:submit.prevent = "addDelivery">

                                            <div class="form-group row">
												<label for="parent-category" class="col-12 col-form-label">Company Name</label> 
												<div class="col-12">
													<select id="parent-category"  class="custom-select" wire:model="company_id"> 
														<option value="" selected="selected">Select Company</option>
                                                        @foreach ($companies as $company)
                                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                                        @endforeach
													</select>
												</div>
											</div>

                                            <div class="form-group row">
                                                <label for="kg" class="col-12 col-form-label">KG</label> 
                                                <div class="col-12">
                                                    <input id="kg"  class="form-control here slug-title" type="number" wire:model = "kg">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Charge</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model = "charge">
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
						
						<div class="col-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>Name</th>
                                                    <th>KG</th>
                                                    <th>Charge</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($prices as $price)
                                                <tr>
													<td>
                                                        {{$price->company->name}}
                                                    </td>
                                                    <td>
                                                        {{$price->kg}}
                                                    </td>
                                                    <td>
                                                        {{$price->charge}} TRY
                                                    </td>
													<td>
														<div class="">
                                                            <a class="btn btn-danger" wire:click.prevent="deleteDelivery({{$price->id}})" style="cursor: pointer">Delete</a>
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