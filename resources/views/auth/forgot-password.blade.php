{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
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
                            <h2 class="ec-breadcrumb-title">Forgot Password</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                <li class="ec-breadcrumb-item active">Forgot Password</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec login page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Forgot Your Password?</h2>
                        <h2 class="ec-title">Forgot Your Password?</h2>
                        <p class="sub-title mb-3">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

                        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-danger">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif
                    </div>
                </div>
                <div class="ec-login-wrapper">
                    <div class="ec-login-container">
                        <div class="ec-login-form">
                            <x-jet-validation-errors class="mb-4" />

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <span class="ec-login-wrap">
                                    <label>Email Address*</label>
                                    <input type="email" name="email" placeholder="Enter your email add..." :value="old('email')" required autofocus  />
                                </span>
                                <span class="ec-login-wrap ec-login-btn">
                                    <button class="btn btn-primary" type="submit">Submit Email</button>
                                </span>
                            </form>

                            <form method="GET" action="{{route('logout')}}">
                                @csrf
                                <span class="ec-login-wrap ec-login-btn">
                                    <button class="btn btn-primary" type="submit">Logout</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>

