<div>
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                <h1>Translations</h1>
                <p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Translations</p>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation" wire:ignore>
                    <button class="nav-link active " id="english-tab" data-bs-toggle="tab" data-bs-target="#english" type="button" role="tab" aria-controls="home" aria-selected="true">English</button>
                </li>
                <li class="nav-item" role="presentation" wire:ignore>
                    <button class="nav-link" id="turkish-tab" data-bs-toggle="tab" data-bs-target="#turkish" type="button" role="tab" aria-controls="turkish" aria-selected="false">Turkish</button>
                </li>
                <li class="nav-item" role="presentation" wire:ignore>
                    <button class="nav-link" id="arabic-tab" data-bs-toggle="tab" data-bs-target="#arabic" type="button" role="tab" aria-controls="arabic" aria-selected="false">Arabic</button>
                </li>
                <li class="nav-item" role="presentation" wire:ignore>
                    <button class="nav-link" id="russian-tab" data-bs-toggle="tab" data-bs-target="#russian" type="button" role="tab" aria-controls="russian" aria-selected="false">Russian</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- EN Content -->
                <div class="tab-pane fade show active" id="english" role="tabpanel" aria-labelledby="english-tab" wire:ignore.self>
                    
                    <div class="row" >
						<div class="col-xl-12 col-lg-12" >
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add Key Value (EN)</h4>

										<form enctype="multipart/form-data" wire:submit.prevent="addEnTrans">
											<div class="form-group row">
												<label for="key" class="col-12 col-form-label">KEY</label> 
												<div class="col-12">
                                                    <textarea name="" id="key" cols="30" rows="2" wire:model.defer="en_key" >    </textarea>
												</div>
											</div>

                                            <div class="form-group row">
												<label for="value" class="col-12 col-form-label">VALUE</label> 
												<div class="col-12">
                                                    <textarea name="" id="value" cols="30" rows="2" wire:model.defer="en_value" >    </textarea>
												</div>
											</div>

											<div class="row">
												<div class="col-12">
													<button  type="submit" class="btn btn-primary">Add</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>KEY</th>
													<th>VALUE</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												@foreach ($english as $en)
												<tr>
													<td>{{$en->key}}</td>
													<td>
														{{$en->value}}
													</td>
													<td>
														<div class="">
															

															<div class="">
																<a class="btn btn-danger" style="cursor: pointer" wire:click.prevent="deleteTrans({{$en->id}})">Delete</a>
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

                </div>
                <!-- EN Content -->
                <div class="tab-pane fade" id="turkish" role="tabpanel" aria-labelledby="turkish-tab" wire:ignore.self>
                    <div class="row" >
						<div class="col-xl-12 col-lg-12" >
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add Key Value (TR)</h4>

										<form enctype="multipart/form-data" wire:submit.prevent="addTrTrans">
											<div class="form-group row">
												<label for="key" class="col-12 col-form-label">KEY</label> 
												<div class="col-12">
                                                    <textarea name="" id="key" cols="30" rows="2" wire:model.defer="tr_key" >    </textarea>
												</div>
											</div>

                                            <div class="form-group row">
												<label for="value" class="col-12 col-form-label">VALUE</label> 
												<div class="col-12">
                                                    <textarea name="" id="value" cols="30" rows="2" wire:model.defer="tr_value" >    </textarea>
												</div>
											</div>

											<div class="row">
												<div class="col-12">
													<button  type="submit" class="btn btn-primary" wire:target="turkish">Add</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>KEY</th>
													<th>VALUE</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												@foreach ($turkish as $tr)
												<tr>
													<td>{{$tr->key}}</td>
													<td>
														{{$tr->value}}
													</td>
													<td>
														<div class="">
															

															<div class="">
																<a class="btn btn-danger" style="cursor: pointer" wire:click.prevent="deleteTrans({{$tr->id}})">Delete</a>
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
                </div>
                <div class="tab-pane fade" id="arabic" role="tabpanel" aria-labelledby="arabic-tab" wire:ignore.self>
                    <div class="row" >
						<div class="col-xl-12 col-lg-12" >
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add Key Value (AR)</h4>

										<form enctype="multipart/form-data" wire:submit.prevent="addArTrans">
											<div class="form-group row">
												<label for="key" class="col-12 col-form-label">KEY</label> 
												<div class="col-12">
                                                    <textarea name="" id="key" cols="30" rows="2" wire:model.defer="ar_key" >    </textarea>
												</div>
											</div>

                                            <div class="form-group row">
												<label for="value" class="col-12 col-form-label">VALUE</label> 
												<div class="col-12">
                                                    <textarea name="" id="value" cols="30" rows="2" wire:model.defer="ar_value" >    </textarea>
												</div>
											</div>

											<div class="row">
												<div class="col-12">
													<button  type="submit" class="btn btn-primary" >Add</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>KEY</th>
													<th>VALUE</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												@foreach ($arabic as $ar)
												<tr>
													<td>{{$ar->key}}</td>
													<td>
														{{$ar->value}}
													</td>
													<td>
														<div class="">
															

															<div class="">
																<a class="btn btn-danger" style="cursor: pointer" wire:click.prevent="deleteTrans({{$ar->id}})">Delete</a>
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
                </div>
                <div class="tab-pane fade" id="russian" role="tabpanel" aria-labelledby="russian-tab" wire:ignore.self>
                    <div class="row" >
						<div class="col-xl-12 col-lg-12" >
							<div class="ec-cat-list card card-default mb-24px">
								<div class="card-body">
									<div class="ec-cat-form">
										<h4>Add Key Value (RU)</h4>

										<form enctype="multipart/form-data" wire:submit.prevent="addRuTrans">
											<div class="form-group row">
												<label for="key" class="col-12 col-form-label">KEY</label> 
												<div class="col-12">
                                                    <textarea name="" id="key" cols="30" rows="2" wire:model.defer="ru_key" >    </textarea>
												</div>
											</div>

                                            <div class="form-group row">
												<label for="value" class="col-12 col-form-label">VALUE</label> 
												<div class="col-12">
                                                    <textarea name="" id="value" cols="30" rows="2" wire:model.defer="ru_value" >    </textarea>
												</div>
											</div>

											<div class="row">
												<div class="col-12">
													<button  type="submit" class="btn btn-primary" >Add</button>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-lg-12">
							<div class="ec-cat-list card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table">
											<thead>
												<tr>
													<th>KEY</th>
													<th>VALUE</th>
													<th>Action</th>
												</tr>
											</thead>

											<tbody>
												@foreach ($russian as $ru)
												<tr>
													<td>{{$ru->key}}</td>
													<td>
														{{$ru->value}}
													</td>
													<td>
														<div class="">
															

															<div class="">
																<a class="btn btn-danger" style="cursor: pointer" wire:click.prevent="deleteTrans({{$ru->id}})">Delete</a>
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
                </div>

            </div>
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->
    @push('scripts')
        {{-- <script>
            $(document).ready(function() {
            // Your jQuery code goes here
            $('#englishInput').val('en');
            });
        </script> --}}
    @endpush    
</div>

