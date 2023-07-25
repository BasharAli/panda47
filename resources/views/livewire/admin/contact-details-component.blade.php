<div>
    <!-- CONTENT WRAPPER -->

	
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Details And Settings</h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Details And Settings</p>
					</div>
					<div class="row">
                        @if ($limited)
                        <div class="col-xl-4 col-lg-12">
							<h4>
                                You had reached the limit of Details you can add.
                            </h4>
						</div>
                        @else
                        <div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add New Details And Setting</h4>

										<form  enctype="multipart/form-data" wire:submit.prevent = "storeDetails">
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Address</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model = "address">
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="email" class="col-12 col-form-label">Email</label> 
                                                <div class="col-12">
                                                    <input id="email"  class="form-control here slug-title" type="email" wire:model="email">
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="phone" class="col-12 col-form-label">Phone Number</label> 
                                                <div class="col-12">
                                                    <input id="phone"  class="form-control here slug-title" type="text" wire:model="phone">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="fiyat" class="col-12 col-form-label">Subscription Fiyat</label> 
                                                <div class="col-12">
                                                    <input id="fiyat"  class="form-control here slug-title" type="text" wire:model="fiyat">
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
                        @endif
						
						<div class="col-xl-8 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>Email</th>
													<th>Phone</th>
													<th>Address</th>
                                                    <th>Fiyat</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($details as $dt)
                                                <tr>

													<td>
                                                        {{$dt->email}}
                                                    </td>
													<td>
														{{$dt->phone_number}}
													</td>
													<td>
														{{$dt->address}}
													</td>
                                                    <td>
														{{$dt->fiyat}} TRY
													</td>
													<td>
														<div class="">
                                                            <a class="btn btn-danger" wire:click.prevent="deleteDetail({{$dt->id}})" style="cursor: pointer">Delete</a>
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