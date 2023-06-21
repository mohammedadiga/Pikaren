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
    <form class="form w-100" novalidate="novalidate" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="text-center mb-10">
            <img alt="Logo" src="{{url('assets/media/logos/logo1.png')}}" class="theme-light-show w-150px w-lg-300px" />
            <img alt="Logo" src="{{url('assets/media/logos/logo2.png')}}" class="theme-dark-show w-150px w-lg-300px" />
        </div>

        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">{{ __('auth.Register') }}</h1>
            <!--end::Title-->
            {{-- <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
            <!--end::Subtitle=--> --}}
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
        <!--end::Separator--> --}}

        <!--begin::Input group=-->
        <div class="fv-row mb-8">

            <!--begin::Email-->
            <input type="text" placeholder="{{__('auth.Name')}}" value="{{old('name')}}" name="name" autocomplete="off" class="form-control bg-transparent" required/>
            <div class="fv-plugins-message-container invalid-feedback">
                <x-input-error :messages="$errors->get('name')"/>
            </div>
            <!--end::Email-->
        </div>

        <!--begin::Input group=-->
        <div class="fv-row mb-8">
        <!--begin::Email-->
        <input type="text" placeholder="{{__('auth.Email')}}" value="{{old('email')}}" name="email" autocomplete="off" class="form-control bg-transparent" required/>
        <div class="fv-plugins-message-container invalid-feedback">
            <x-input-error :messages="$errors->get('email')"/>
        </div>
        <!--end::Email-->
        </div>

        <!--begin::Input group-->
        <div class="fv-row mb-8" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control bg-transparent" type="password" placeholder="{{__('auth.Password')}}" name="password" autocomplete="off" required/>
                    <div class="fv-plugins-message-container invalid-feedback">
                        <x-input-error :messages="$errors->get('password')"/>
                    </div>
                </div>
                <!--end::Input wrapper-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Input group=-->

        <!--end::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Repeat Password-->
            <input placeholder="{{__('auth.ConfirmPassword')}}" name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent" required/>
            <div class="fv-plugins-message-container invalid-feedback">
                <x-input-error :messages="$errors->get('password_confirmation')"/>
            </div>
            <!--end::Repeat Password-->
        </div>
        <!--end::Input group=-->

        {{-- <!--begin::Accept-->
        <div class="fv-row mb-8">
            <label class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1" />
                <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the
                <a href="#" class="ms-1 link-primary">Terms</a></span>
            </label>
        </div>
        <!--end::Accept--> --}}

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" class="btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">{{ __('auth.Register') }}</span>
                <!--end::Indicator label-->
            </button>
        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-7">{{ __('auth.AlreadyRegistered')}}
        <a href="{{ route('login') }}" class="link-primary fw-semibold">{{__('auth.Login')}}</a></div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->
</div>
<!--end::Wrapper-->

@endsection

