<div>
    <!-- CONTENT WRAPPER -->

	
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Taxes</h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Taxes</p>
					</div>
					<div class="row">
                        
                        <div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add New Tax</h4>
										<form  enctype="multipart/form-data" wire:submit.prevent = "addTax">
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Tax Name</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model = "name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="txvalue" class="col-12 col-form-label">Tax Value</label> 
                                                <div class="col-12">
                                                    <input id="txvalue"  class="form-control here slug-title" type="text" wire:model = "value">
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
                                                    <th>Value</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($taxes as $tax)
                                                <tr>
													<td>
                                                        {{$tax->name}}
                                                    </td>
                                                    <td>
														{{$tax->tax_value}}
													</td>
													<td>
														<div class="">
                                                            <a class="btn btn-danger" wire:click.prevent="deleteTax({{$tax->id}})" style="cursor: pointer">Delete</a>
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