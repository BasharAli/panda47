{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">{{__('Register')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Register')}}</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Start Register -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">{{__('Register')}}</h2>
                        <h2 class="ec-title">{{__('Register')}}</h2>
                        <p class="sub-title mb-3">{{__('REGISTER, BUY, WIN!')}}</p>
                    </div>
                    
                </div>
                <div class="ec-register-wrapper">
                    <div class="ec-register-container">
                        <div class="ec-register-form">
                            <x-jet-validation-errors class="mb-4" />
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('First Name')}}*</label>
                                    <input type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="name"/>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('Last Name')}}*</label>
                                    <input type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="name" />
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('Email')}}*</label>
                                    <input type="email" name="email" :value="old('email')" required/>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>{{__('Phone Number')}}*</label>
                                    <input type="text" name="phone" placeholder=""
                                        required />
                                </span>

                                <span class="ec-register-wrap">
                                    <label>{{__('Birth Date')}}*</label>
                                    <input type="date" name="birthdate" placeholder="" required />
                                </span>
                                
                                <span class="ec-register-wrap">
                                    <label>{{__('Password')}}*</label>
                                    <input type="password" name="password" placeholder="" required />
                                </span>

                                <span class="ec-register-wrap">
                                    <label>{{__('Confirm Password')}}*</label>
                                    <input type="password" name="password_confirmation" placeholder="" required />
                                </span>
                                
                                {{-- <span class="ec-register-wrap">
                                    <label>Address</label>
                                    <input type="text" name="address" placeholder="Address Line 1" required/>
                                </span>
                                
                                <span class="ec-register-wrap ec-register-half">
                                    <label>City *</label>
                                    <span class="ec-rg-select-inner">
                                        <select name="ec_select_city" id="ec-select-city" class="ec-register-select" required>
                                            <option selected disabled>City</option>
                                            <option value="1">City 1</option>
                                            <option value="2">City 2</option>
                                            <option value="3">City 3</option>
                                            <option value="4">City 4</option>
                                            <option value="5">City 5</option>
                                        </select>
                                    </span>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Post Code</label>
                                    <input type="text" name="postalcode" placeholder="Post Code" required/>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Country *</label>
                                    <span class="ec-rg-select-inner">
                                        <select name="ec_select_country" id="ec-select-country"
                                            class="ec-register-select">
                                            <option selected disabled>Country</option>
                                            <option value="1">Country 1</option>
                                            <option value="2">Country 2</option>
                                            <option value="3">Country 3</option>
                                            <option value="4">Country 4</option>
                                            <option value="5">Country 5</option>
                                        </select>
                                    </span>
                                </span>
                                <span class="ec-register-wrap ec-register-half">
                                    <label>Region State</label>
                                    <span class="ec-rg-select-inner">
                                        <select name="ec_select_state" id="ec-select-state" class="ec-register-select" required>
                                            <option selected disabled>Region/State</option>
                                            <option value="1">Region/State 1</option>
                                            <option value="2">Region/State 2</option>
                                            <option value="3">Region/State 3</option>
                                            <option value="4">Region/State 4</option>
                                            <option value="5">Region/State 5</option>
                                        </select>
                                    </span>
                                </span> --}}
                                {{-- <span class="ec-register-wrap ec-recaptcha">
                                    <span class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S"
                                        data-callback="verifyRecaptchaCallback"
                                        data-expired-callback="expiredRecaptchaCallback"></span>
                                    <input class="form-control d-none" data-recaptcha="true" required
                                        data-error="Please complete the Captcha">
                                    <span class="help-block with-errors"></span>
                                </span> --}}
                                <span class="ec-register-wrap ec-register-btn">
                                    <button name="submit" class="btn btn-primary" type="submit">{{__('Register')}}</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Register -->
</x-guest-layout>
