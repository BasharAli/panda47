
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('Categories')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Categories')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    

    

    <!--  Category Section Start -->
    <section class="section ec-category-section ec-category-wrapper-3 section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">{{__('All Categories')}}</h2>
                        <h2 class="ec-title">{{__('Be Classic')}}</h2>
                        <p class="sub-title">{{__('Browse Our Wonderful collection of categories for all your needs')}}</p>
                    </div>
                </div>
            </div>
            <div class="row cat-space-2 margin-minus-tb-15">
                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="cat-card">
                            <img class="cat-icon" width="600" height="170" src="{{asset('main')}}/images/categories/{{$category->image}}" alt="cat-icon">
                            <div class="cat-detail">
                                <h4 class="text-warning">{{__($category->name)}}</h4>
                                <h5></h5>
                                <a class="btn-primary" href="{{url('categories/'.$category->slug)}}">{{__('Shop Now')}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    
