<div>
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('Subscription Payment')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Subscription Payment')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ec-page-content section-space-p">
        <div class="container">
            <!-- Track Order Content Start -->
            <div class="ec-trackorder-content  ">
                <div class="ec-trackorder-inner">
                    <div class="ec-trackorder-top row">
                        <h2 class="ec-order-id col-12 text-center mb-3">{!! __('Please pay an amount of :FIYAT TRY as instructed below', ['FIYAT' => $paymentAmount->fiyat]) !!}</h2>
                        <div class="ec-order-detail col-12 mt-3 mb-3 row">
                            <div class="col-md-6">
                                @if ($method)
                                <div>{{__('Bank Name')}}: <strong>{{$method->bank_name}}</strong></div><br>
                                <div>{{__('Account Name')}}: <strong>{{$method->account_name}}</strong></div><br>
                                <div>{{__('IBAN')}}: <strong>{{$method->iban}}</strong></div><br>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <form action="" wire:submit.prevent="paynow">
                                    <input type="hidden" value="" name="" wire:model.defer="user_id">
                                    <input type="hidden" value="" name="" wire:model.defer="shop_id">
                                    <input type="hidden" value="" name="" wire:model.defer="amount">

                                    <div class="form-group">
                                    <label for="dekont">
                                        {{__('Upload Receipt')}}
                                    </label>
                                    <input type="file"
                                        class="form-control" name="" id="dekont" aria-describedby="helpId" placeholder="" wire:model.defer="dekont">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">{{__('Pay Now')}}</button>
                                    @error('dekont') <span class="error">{{ $message }}</span> @enderror
                                </form>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <h5><span class="text-danger">{{__('IMPORTANT INSTRUCTIONS')}}:</span><br>
                                {{__('Please pay the required amount to the provided bank account, after payment please upload the pdf dekont file to the box above and click "PAY NOW".')}}
                            </h5>
                            <p>
                                {{__('For Urgent Help Please Call Us On This Hotline')}} : {{$paymentAmount->phone_number}}
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Track Order Content end -->
        </div>
    </section>
</div>
