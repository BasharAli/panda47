
<div>
    <!-- CONTENT WRAPPER -->

	
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
							<h1>Home Sliders</h1>
							<p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Home Sliders</p>
					</div>
					<div class="row">
						<div class="col-xl-4 col-lg-12">
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add New Slider</h4>

										<form  enctype="multipart/form-data" wire:submit.prevent = "addSlider">
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Slider Title</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model = "title">
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Slider Sub-title</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model="subtitle">
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Slider Short Decription</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model="short_desc">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="text" class="col-12 col-form-label">Slider Link</label> 
                                                <div class="col-12">
                                                    <input id="text"  class="form-control here slug-title" type="text" wire:model="link">
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label for="brand_img" class="col-12 col-form-label">Slider Image (1920 x 800)</label> 
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
						<div class="col-xl-8 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>Thumb</th>
													<th>Title</th>
													<th>Sub-Title</th>
													<th>Short Description</th>
                                                    <th>Link</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
                                                @foreach ($sliders as $slider)
                                                <tr>
													<td><img width="100px" src="{{asset('main')}}/images/sliders/{{$slider->image}}" alt="slider Image" /></td>
													<td>
                                                        {{$slider->title}}
                                                    </td>
													<td>
														{{$slider->subtitle}}
													</td>
													<td>
														{{$slider->short_desc}}
													</td>
                                                    <td>
														<a href="{{$slider->link}}" target="_blank">Slider Link</a>
													</td>
													<td>
														<div class="btn-group">
															
															<button type="button"
																class="btn btn-outline-success dropdown-toggle"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only">Info</span>
															</button>

															<div class="dropdown-menu">
																<a class="dropdown-item" href="{{url('admin/homesliders/'.$slider->id.'/edit')}}">Edit</a>
																<a class="dropdown-item" wire:click.prevent="deleteSlider({{$slider->id}})" style="cursor: pointer">Delete</a>
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