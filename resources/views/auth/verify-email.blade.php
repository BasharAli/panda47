{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <div>
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    {{ __('Edit Profile') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
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
                            <h2 class="ec-breadcrumb-title">{{__('Verify Email')}}</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="{{url('/')}}">{{__('Home')}}</a></li>
                                <li class="ec-breadcrumb-item active">{{__('Verify Email')}}</li>
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
                        <h2 class="ec-bg-title">{{__('Verify Your Email')}}</h2>
                        <h2 class="ec-title">{{__('Verify Your Email')}}</h2>
                        <p class="sub-title mb-3">{{__('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')}}</p>

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

                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <span class="ec-login-wrap ec-login-btn">
                                    <button class="btn btn-primary" type="submit">{{__('Resend Email')}}</button>
                                </span>
                            </form>

                            <form method="GET" action="{{route('logout')}}">
                                @csrf
                                <span class="ec-login-wrap ec-login-btn">
                                    <button class="btn btn-primary" type="submit">{{__('logout')}}</button>
                                </span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>




