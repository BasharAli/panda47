
<div>
    <!-- CONTENT WRAPPER -->

	
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Twin page Ads</h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Twin Page Ads</p>
					</div>
					<div class="row">
                        @if ($limited)
                        <div class="col-xl-4 col-lg-12">
							<h4>
                                You had reached the limit of ads you can ad for Twin Ads.
                            </h4>
						</div>
                        @else
                        <div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add New Ad</h4>

										<form  enctype="multipart/form-data" wire:submit.prevent = "addTwinAd">
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Ad Name</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model = "ad_name">
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Ad Title</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model="title">
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Ad Short Decription</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model="short_desc">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Ad Link</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model="link">
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="brand_img" class="col-12 col-form-label">Ad Image (800 x 400)</label> 
                                                <div class="col-12">
                                                    <input id="brand_img" class="form-control here set-slug" type="file" wire:model="image">
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
													<th>Image</th>
													<th>Name</th>
													<th>title</th>
													<th>Short Description</th>
                                                    <th>Link</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($twinads as $ad)
                                                <tr>
													<td><img width="100px" src="{{asset('main')}}/images/ads/{{$ad->image}}" alt="slider Image" /></td>
													<td>
                                                        {{$ad->ad_name}}
                                                    </td>
													<td>
														{{$ad->title}}
													</td>
													<td>
														{{$ad->short_desc}}
													</td>
                                                    <td>
														<a href="{{$ad->link}}" target="_blank">Slider Link</a>
													</td>
													<td>
														<div class="">
                                                            <a class="btn btn-danger" wire:click.prevent="deleteSlider({{$ad->id}})" style="cursor: pointer">Delete</a>
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