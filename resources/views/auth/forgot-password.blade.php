@extends('layouts.authMain')
@section('authMain')
<!--begin::Wrapper-->
<div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="text-center mb-10">
            <img alt="Logo" src="{{url('assets/media/logos/logo1.png')}}" class="theme-light-show w-150px w-lg-300px" />
            <img alt="Logo" src="{{url('assets/media/logos/logo2.png')}}" class="theme-dark-show w-150px w-lg-300px" />
        </div>

        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
            <h1 class="text-dark fw-bolder mb-3">{{__('auth.ForgotYourPassword') }}</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-500 fw-semibold fs-6">{{ __('auth.ForgotYourPasswordTitle') }}</div>
            <!--end::Link-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="{{__('auth.Email')}}" name="email" autocomplete="off" class="form-control bg-transparent" value="{{old('email')}}" required autofocus/>
            <x-input-error :messages="$errors->get('email')" class="badge badge-light-danger fs-8 fw-bold my-3 mx-5" />
            <!--end::Email-->
        </div>
        <!--begin::Actions-->
        <div class="d-flex flex-wrap justify-content-center pb-lg-0">
            <button type="Submit" class="btn btn-primary me-4">
                <!--begin::Indicator label-->
                <span class="indicator-label">{{__('auth.submit')}}</span>
                <!--end::Indicator label-->
            </button>
            <a href="{{ route('login') }}" class="btn btn-light">{{__('words.vcardCancel')}}</a>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Wrapper-->
@endsection
