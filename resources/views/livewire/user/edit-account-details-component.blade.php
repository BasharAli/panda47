<div>
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{$firstname}}'s Profile</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Edit User Info</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <!-- <div class="ec-vendor-block-bg"></div>
                                <div class="ec-vendor-block-detail">
                                    <img class="v-img" src="/images/user/1.jpg" alt="vendor image">
                                    <h5>Mariana Johns</h5>
                                </div> -->
                                <div class="ec-vendor-block-items">
                                    <ul>
                                        <li><a href="{{url('user/dashboard')}}">{{__('Profile')}}</a></li>
                                        <li><a href="{{url('user/dashboard/order-history')}}">{{__('History')}}</a></li>
                                        {{-- <li><a href="track-order.html">{{__('Track Order')}}</a></li> --}}
                                        <li><a href="{{url('user/dashboard/invoices')}}">{{__('Invoices')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <div class="ec-vendor-block-img space-bottom-30">
                                            
                                            <div class="ec-vendor-block-detail">
                                                <h5 class="name">{{$firstname}} {{$lastname}}</h5>
                                            </div>
                                            <p>Hello <span>{{$firstname}} {{$lastname}}</span></p>
                                            <p>You are here beacause you wish to edit your personal info</p>
                                        </div>
                                        <h5>Account Information</h5>
                                        <form wire:submit.prevent="updatePersonalInfo">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                        <h6>Edit Your E-mail address </h6>
                                                        <div class="form-group">
                                                        <input type="email"
                                                            class="form-control" name="emailEdit" id="emailEdit" placeholder="example@someone.com" wire:model="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                        <h6>Edit Contact nubmer</h6>
                                                        <div class="form-group">
                                                            <input type="text"
                                                            class="form-control" name="phoneEdit" id="phoneEdit" placeholder="example@someone.com" wire:model="phone">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                        <h6>Edit Full Name</h6>
                                                        <div class="row">
                                                            <div class="form-group col-6">
                                                                <input type="text"
                                                                class="form-control" name="fname" id="fname"  wire:model="firstname">
                                                            </div>

                                                            <div class="form-group col-6">
                                                                <input type="text"
                                                                class="form-control" name="lname" id="lname"  wire:model="lastname">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                        <h6>Edit Birthdate</h6>
                                                        <div class="form-group">
                                                            <input type="date"
                                                            class="form-control" name="date" id="date"  wire:model="date">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <button type="submit" name="submit" class="btn  btn-primary mt-3">Update Your Details</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>