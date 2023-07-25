 <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__($category->name)}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__($category->name)}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    

    

    <section class="section ec-category-section ec-category-wrapper-5 section-space-p">
        <div class="container ec-category-wrapper-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">{{__($category->name)}}</h2>
                        <h2 class="ec-title">{{__($category->name)}}</h2>
						<p class="sub-title">{!! __('Browse our wonderful sub-categories collection of :SUBCATNAME ', ['SUBCATNAME' => __($category->name)]) !!}</p>
                    </div>
                </div>
            </div>


            <div class="row cat-space-2 margin-minus-tb-15">

                @foreach ($category->subcategories as $subcategory)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="cat-card">
                            <img class="cat-icon" src="{{asset('main')}}/images/subcategories/{{$subcategory->image}}" alt="cat-icon">
                            <a class="btn-primary btn-primary-1" href="{{url('categories/'.$category->slug .'/'.$subcategory->slug)}}">{{__('Shop Now')}}</a>
                            <div class="cat-detail">
                                <div class="cat-detail-block">
                                    <h4>{{__($subcategory->name)}}</h4>
                                    <h5></h5>
                                    <a class="btn-primary" href="{{url('categories/'.$category->slug .'/'.$subcategory->slug)}}">{{__('Shop Now')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>