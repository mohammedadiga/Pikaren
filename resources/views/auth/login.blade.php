@extends('layouts.authMain')
@section('authMain')
<!--begin::Wrapper-->
<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{ route('login') }}" method="POST">
        @csrf

            <div class="text-center mb-10">
                    <img alt="Logo" src="{{url('assets/media/logos/logo1.png')}}" class="theme-light-show w-150px w-lg-300px" />
                    <img alt="Logo" src="{{url('assets/media/logos/logo2.png')}}" class="theme-dark-show w-150px w-lg-300px" />
            </div>

        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">{{__('auth.Login')}}</h1>
            <!--end::Title-->
            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">{{__('auth.Welcomeback')}}</div>
            <!--end::Subtitle=-->
        </div>
        <!--begin::Heading-->

        {{-- <!--begin::Login options-->
        <div class="row g-3 mb-9">
            <!--begin::Col-->
            <div class="col-md-6">
                <!--begin::Google link=-->
                <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3" />Sign in with Google</a>
                <!--end::Google link=-->
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-md-6">
                <!--begin::Google link=-->
                <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                <img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show h-15px me-3" />
                <img alt="Logo" src="assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show h-15px me-3" />Sign in with Apple</a>
                <!--end::Google link=-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Login options-->
        
        <!--begin::Separator-->
        <div class="separator separator-content my-14">
            <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
        </div>
        <!--end::Separator--> 
        --}}

        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input id="email" type="text" placeholder="{{__('auth.Email')}}" name="email" value="{{old('email')}}" required autocomplete="off" class="form-control bg-transparent" />
            <div class="fv-plugins-message-container invalid-feedback">
                <x-input-error :messages="$errors->get('email')"/>
            </div>
            <!--end::Email-->
        </div>
        <!--end::Input group=-->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <input id="password" type="password" placeholder="{{__('auth.Password')}}" required name="password" autocomplete="off" class="form-control bg-transparent" />
            <div class="fv-plugins-message-container invalid-feedback">
                <x-input-error :messages="$errors->get('password')"/>
            </div>

            <!--end::Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            <!--begin::Link-->
            @if (Route::has('password.request'))
                <a href="{{route('password.request')}}" class="link-primary">{{__('auth.ForgotYourPassword') }}</a>
            @endif
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">{{__('auth.Login')}}</span>
                <!--end::Indicator label-->
            </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">{{__('auth.NotAMemberYet')}}
        <a href="{{ route('register') }}" class="link-primary"> {{__('auth.SignUp')}}</a></div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->
</div>
<!--end::Wrapper-->

@endsection

