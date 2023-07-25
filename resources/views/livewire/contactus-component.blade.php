<div>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('Contact Us')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Contact Us')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec Contact Us page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-common-wrapper">
                    <div class="ec-contact-leftside">
                        <div class="ec-contact-container">
                            <div class="ec-contact-form">
                                <form action="#" method="post">
                                    <span class="ec-contact-wrap">
                                        <label>{{__('First Name')}}*</label>
                                        <input type="text" name="firstname" placeholder="{{__('Enter your first name')}}"
                                            required />
                                    </span>
                                    <span class="ec-contact-wrap">
                                        <label>{{__('Last Name')}}*</label>
                                        <input type="text" name="lastname" placeholder="{{__('Enter your last name')}}"
                                            required />
                                    </span>
                                    <span class="ec-contact-wrap">
                                        <label>{{__('Email')}}*</label>
                                        <input type="email" name="email" placeholder="{{__('Enter your email address')}}"
                                            required />
                                    </span>
                                    <span class="ec-contact-wrap">
                                        <label>{{__('Phone Number')}}*</label>
                                        <input type="text" name="phonenumber" placeholder="{{__('Enter your phone number')}}"
                                            required />
                                    </span>
                                    <span class="ec-contact-wrap">
                                        <label>{{__('Message')}}*</label>
                                        <textarea name="address"
                                            placeholder="{{__('Please leave your comments here')}}.."></textarea>
                                    </span>
                                    <span class="ec-contact-wrap ec-recaptcha">
                                        <span class="g-recaptcha"
                                            data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"
                                            data-callback="verifyRecaptchaCallback"
                                            data-expired-callback="expiredRecaptchaCallback"></span>
                                        <input class="form-control d-none" data-recaptcha="true" required
                                            data-error="Please complete the Captcha">
                                        <span class="help-block with-errors"></span>
                                    </span>
                                    <span class="ec-contact-wrap ec-contact-btn">
                                        <button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="ec-contact-rightside">
                        <div class="ec_contact_map">
                            <div class="ec_map_canvas">
                                <iframe id="ec_map_canvas"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83202.04395114639!2d34.524075282569136!3d36.77635889882153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1527f4a4c0be6e9f%3A0x4dbef2b1f81e7d77!2sMersin%2C%20Akdeniz%2FMersin!5e0!3m2!1sen!2str!4v1682964139995!5m2!1sen!2str"></iframe>
                                <a href="https://sites.google.com/view/maps-api-v2/mapv2"></a>
                            </div>
                        </div>
                        <div class="ec_contact_info">
                            <h1 class="ec_contact_info_head">{{__('Contact Us')}}</h1>
                            <ul class="align-items-center">
                                <li class="ec-contact-item"><i class="ecicon eci-map-marker"
                                        aria-hidden="true"></i><span>{{__('Address')}} :</span>  {{$details->address}}</li>
                                    
                                <li class="ec-contact-item align-items-center"><i class="ecicon eci-phone"
                                        aria-hidden="true"></i><span>{{__('Call Us')}} :</span><a href="tel:{{$details->phone_number}}">
                                            {{$details->phone_number}}</a></li>
                                <li class="ec-contact-item align-items-center"><i class="ecicon eci-envelope"
                                        aria-hidden="true"></i><span>{{__('Email')}} :</span><a
                                        href="mailto:{{$details->email}}">{{$details->email}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
