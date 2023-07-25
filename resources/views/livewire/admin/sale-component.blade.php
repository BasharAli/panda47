<div>
    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
                <h1>Time-Sale Settings</h1>
                <p class="breadcrumbs"><span><a href="{{url('admin/dashboard')}}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Time-Sale Settings</p>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-12">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            <div class="ec-cat-form">
                                <h4>Add Time-Sale</h4>

                                <form enctype="multipart/form-data" wire:submit.prevent="storeSale">
                                    <div class="form-group row">
                                        <label for="text" class="col-12 col-form-label">Sale Date</label>
                                        <div class="col-12">
                                            <input id="" placeholder="YYYY/MM/DD H:M:S" class="form-control here slug-title" type="datetime-local" required wire:model.defer="timesale">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="parent-category" class="col-12 col-form-label">Product</label>
                                        <div class="col-12">
                                            <select id="parent-category" class="custom-select" wire:model.defer="product_id" required>
                                                <option value="" selected>Select Product</option>
                                                @foreach ($products as $product)
                                                <option value="{{$product->id}}">{{$product->SKU}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="parent-category" class="col-12 col-form-label">Status</label>
                                        <div class="col-12">
                                            <select id="parent-category" class="custom-select" wire:model.defer="status" required>
                                                <option value="" selected>Select Status</option>
                                                <option value="0">Inactive</option>
                                                <option value="1">Active</option>

                                            </select>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">ADD</button>
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
                                            <th>Product Name</th>
                                            <th>Date & time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($sales as $sale)
                                        <tr>
                                            <td><img class="cat-thumb" src="{{asset('main')}}/images/products/{{$sale->product->image}}" alt="product Image" /></td>
                                            <td>{{$sale->product->name}}</td>
                                            <td>
                                                {{$sale->sale}}
                                            </td>
                                            <td>
                                                @if ($sale->status == 1)
                                                Active
                                                @else
                                                Inactive
                                                @endif
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="">
                                                        @if ($sale->status == 1)
                                                        <button type="button" class="btn btn-primary" wire:click.prevent="disableSale({{$sale->id}})">Disable</button>

                                                        @else
                                                        <button type="button" class="btn btn-success" wire:click.prevent="enableSale({{$sale->id}})">Enable</button>

                                                        @endif
                                                        <button type="button" class="btn btn-danger" wire:click.prevent="deleteSale({{$sale->id}})">Delete</button>
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
    @push('scripts')
    <script>
        $(function() {
            $('#sale-date').datetimepicker({
                    format: 'YYYY-MM-DD h:m:s'
                , })
                .on('dp.change', function(ev) {

                });
        });

    </script>
    @endpush
</div>

