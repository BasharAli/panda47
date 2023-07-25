<div>
    <!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Product</h1>
							<p class="breadcrumbs"><span><a href="{{url('/')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Product</p>
						</div>
						<div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table"
											style="width:100%">
											<thead>
												<tr>
													<th>Product</th>
													<th>Name</th>
													<th>Price</th>
													<th>Offer</th>
													<th>Sale Price</th>
													<th>Purchased</th>
													<th>Stock</th>
													<th>Date</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												@foreach ($products as $product)
												<tr>
													<td><img class="tbl-thumb" src="{{asset('admin')}}/img/products/p1.jpg" alt="Product Image" /></td>
													<td>{{$product->name}}</td>
													<td>TRY {{$product->normal_price}}</td>
													<td>@if ($product->sale_price)
														{{round( 100  -  ($product->sale_price * 100 / $product->normal_price) )}}% OFF
													@else
														NO SALE
													@endif </td>
													<td>@if ($product->sale_price)
														TRY {{$product->sale_price }}
													@else
														NO SALE
													@endif </td>
													<td>61</td>
													<td>5421</td>
													<td>{{$product->updated_at->format('Y-m-d')}}</td>
													<td>
														<div class="btn-group mb-1">
															<button type="button"
																class="btn btn-outline-success">Info</button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only">Info</span>
															</button>

															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
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
