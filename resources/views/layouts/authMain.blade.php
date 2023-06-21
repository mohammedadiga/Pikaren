
@include('layouts.header')
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page bg image-->
    <style>body { background-image: url("{{url('assets/media/auth/bg10.jpeg')}}"); } [data-bs-theme="dark"] body { background-image: url("{{url('assets/media/auth/bg10.jpeg')}}"); }</style>
    <!--end::Page bg image-->

    <!--begin::Authentication-->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <!--begin::Aside-->
        <div class="d-flex flex-lg-row-fluid d-none d-xl-flex">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                <!--begin::Image-->
                <img class="theme-light-show mx-auto mw-100 w-150px w-lg-400px mb-10 mb-lg-20" src="assets/media/illustrations/authImg.png" alt="" />
                <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-400px mb-10 mb-lg-20" src="assets/media/illustrations/authImg.png" alt="" />
                <!--end::Image-->
                <!--begin::Title-->
                <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">{{__('words.dashboardWelcome')}}</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-gray-600 w-100 w-lg-400px fs-base text-center fw-semibold">{{__('words.dashboardWelcomeTitle')}}</div>
                <!--end::Text-->
            </div>
            <!--end::Content-->
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
            <!--begin::Wrapper-->
            
            <div class="bg-body d-flex flex-column flex-center rounded-4 h-lg-100 w-950px w-md-600px p-10">

                <!--begin::Content-->
                <div class="d-flex flex-center flex-column align-items-stretch w-100 w-md-400px">

                        @yield('authMain')
                    
                    <!--begin::Footer-->
                    <div class="d-flex flex-stack">
                        <!--begin::Languages-->
                        <div class="me-10">

                            <!--begin::Toggle-->
                            <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement=@if(Session::get('locale') == 'ar') "bottom-end" @else "bottom-start" @endif>
                                <i class="ki-duotone ki-night-day theme-light-show fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                    <span class="path7"></span>
                                    <span class="path8"></span>
                                    <span class="path9"></span>
                                    <span class="path10"></span>
                                </i>
                                <i class="ki-duotone ki-moon theme-dark-show fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </button>
                            <!--end::Toggle-->

                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-duotone ki-night-day fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                                <span class="path6"></span>
                                                <span class="path7"></span>
                                                <span class="path8"></span>
                                                <span class="path9"></span>
                                                <span class="path10"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">{{__('words.Light')}}</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-duotone ki-moon fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">{{__('words.Dark')}}</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-0">
                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                        <span class="menu-icon" data-kt-element="icon">
                                            <i class="ki-duotone ki-screen fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </i>
                                        </span>
                                        <span class="menu-title">{{__('words.System')}}</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Languages-->

                        <!--begin::Languages-->
                        <div class="me-10">

                            <!--begin::Toggle-->
                            <button class="btn btn-flex btn-link btn-color-gray-700 btn-active-color-primary rotate fs-base" data-kt-menu-trigger="click" data-kt-menu-placement=@if(Session::get('locale') == 'ar') "bottom-end" @else "bottom-start" @endif data-kt-menu-offset="0px, 0px">
                                @if(Session::get('locale') == 'en')
                                <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="assets/media/flags/united-states.svg" alt="" />
                                <span data-kt-element="current-lang-name" class="me-1">English</span>
                                <i class="ki-outline ki-down fs-5 text-muted rotate-180 m-0"></i>
                                @elseif(Session::get('locale') == 'ar')
                                <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="assets/media/flags/egypt.svg" alt="" />
                                <span data-kt-element="current-lang-name" class="me-1">عربي</span>
                                <i class="ki-outline ki-down fs-5 text-muted rotate-180 m-0"></i>
                                @elseif(Session::get('locale') == 'tr')
                                <img data-kt-element="current-lang-flag" class="w-20px h-20px rounded me-3" src="assets/media/flags/turkey.svg" alt="" />
                                <span data-kt-element="current-lang-name" class="me-1">Türkçe</span>
                                <i class="ki-outline ki-down fs-5 text-muted rotate-180 m-0"></i>
                                @endif
                            </button>
                            <!--end::Toggle-->

                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-4 fs-7" data-kt-menu="true" id="kt_auth_lang_menu">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{route('locale.show', ['locale' => 'en'])}}" class="menu-link d-flex px-5" data-kt-lang="English">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/united-states.svg" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">English</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{route('locale.show', ['locale' => 'ar'])}}" class="menu-link d-flex px-5" data-kt-lang="Spanish">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/egypt.svg" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">عربي</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{route('locale.show', ['locale' => 'tr'])}}" class="menu-link d-flex px-5" data-kt-lang="German">
                                        <span class="symbol symbol-20px me-4">
                                            <img data-kt-element="lang-flag" class="rounded-1" src="assets/media/flags/turkey.svg" alt="" />
                                        </span>
                                        <span data-kt-element="lang-name">Türkçe</span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
    
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Languages-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Content-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication-->

</div>
<!--end::Root-->
@include('layouts.footer')