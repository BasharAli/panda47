<div>
    <!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Coupons Settings</h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Coupons Settings</p>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add Coupon</h4>

										<form enctype="multipart/form-data" wire:submit.prevent="storeCoupon">
											<div class="form-group row">
												<label for="text" class="col-12 col-form-label">Coupon Code</label> 
												<div class="col-12">
													<input class="form-control here slug-title" type="text" wire:model="code" required>
												</div>
											</div>
                                            <div class="form-group row">
												<label for="parent-category" class="col-12 col-form-label">Type</label> 
												<div class="col-12">
													<select id="parent-category"  class="custom-select" wire:model="type"> 
														<option value="" selected="selected">Select Type</option>
                                                        <option value="fixed" >Fixed</option>
                                                        <option value="percent" >Percentage</option>
													</select>
												</div>
											</div>

                                            <div class="form-group row">
												<label for="text" class="col-12 col-form-label">Coupon Value</label> 
												<div class="col-12">
													<input   class="form-control here slug-title" type="text" wire:model="value" required>
												</div>
											</div>

                                            <div class="form-group row">
												<label for="text" class="col-12 col-form-label">Cart Value</label> 
												<div class="col-12">
													<input  class="form-control here slug-title" type="text" wire:model="cart_value" required>
												</div>
											</div>

                                            <div class="form-group row">
												<label for="text" class="col-12 col-form-label">Expiry Date</label> 
												<div class="col-12" wire:ignore>
													<input id="expiry-date" placeholder="YYYY/MM/DD" class="form-control here slug-title" type="text" wire:model="expiry" required>
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
													<th>Code</th>
													<th>Type</th>
													<th>Value</th>
													<th>Cart Value</th>
                                                    <th>Expiry</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($coupons as $coupon)
                                                    
												<tr>
													<td>{{$coupon->code}}</td>
													<td>{{$coupon->type}}</td>

                                                    @if ($coupon->type == 'fixed')
                                                        <td>
                                                            {{$coupon->value}} TRY
                                                        </td>
                                                        @else
                                                        <td>
                                                            {{$coupon->value}}%
                                                        </td>
                                                    @endif
													
													<td>
														{{$coupon->cart_value}}
													</td>
                                                    <td>
														{{$coupon->expiry_date}}
													</td>
													<td>
														<div class="btn-group">
															<div class="">
																<a class="btn btn-danger" type="button" style="cursor: pointer" wire:click.prevent="deleteCoupon({{$coupon->id}})">Delete</a>
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
@push('scripts')
    <script>
        $(function(){
            $('#expiry-date').datetimepicker({
                format : 'YYYY-MM-DD',
            })
            .on('dp.change', function(ev){
                var data = $('#expiry-date').val();
                @this.set('expiry', data);
            });
        });
    </script>
@endpush
