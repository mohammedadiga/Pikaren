
@extends('layouts.main')
@section('main')
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Navbar-->
            <div class="card mb-5 mb-xl-10">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <!--begin: Pic-->
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="assets/media/avatars/300-1.jpg" alt="image" />
                                <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Info-->
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Max Smith</a>
                                        <a href="#">
                                            <i class="ki-duotone ki-verify fs-1 text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>Developer</a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                        <i class="ki-duotone ki-geolocation fs-4 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>SF, Bay Area</a>
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                        <i class="ki-duotone ki-sms fs-4 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>max@kt.com</a>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::User-->
                                <!--begin::Actions-->
                                <div class="d-flex my-4">
                                    <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                        <i class="ki-duotone ki-check fs-3 d-none"></i>
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Follow</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        <!--end::Indicator progress-->
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a>
                                    <!--begin::Menu-->
                                    <div class="me-0">
                                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-solid ki-dots-horizontal fs-2x me-1"></i>
                                        </button>
                                        <!--begin::Menu 3-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                            <!--begin::Heading-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Create Invoice</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                                                    <i class="ki-duotone ki-information fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span></a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Generate Bill</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                <a href="#" class="menu-link px-3">
                                                    <span class="menu-title">Subscription</span>
                                                    <span class="menu-arrow"></span>
                                                </a>
                                                <!--begin::Menu sub-->
                                                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Plans</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Billing</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">Statements</a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3">
                                                            <!--begin::Switch-->
                                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                                <!--begin::Input-->
                                                                <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                                <!--end::Input-->
                                                                <!--end::Label-->
                                                                <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                <!--end::Label-->
                                                            </label>
                                                            <!--end::Switch-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu sub-->
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3">Settings</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu 3-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap flex-stack">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-400">Earnings</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="80">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-400">Projects</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
                                            </div>
                                            <!--end::Number-->
                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-400">Success Rate</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Progress-->
                                <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                    <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                        <span class="fw-semibold fs-6 text-gray-400">Profile Compleation</span>
                                        <span class="fw-bold fs-6">50%</span>
                                    </div>
                                    <div class="h-5px mx-3 w-100 bg-light mb-3">
                                        <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <!--end::Progress-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo2/dist/account/overview.html">Overview</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo2/dist/account/settings.html">Settings</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="../../demo2/dist/account/security.html">Security</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo2/dist/account/activity.html">Activity</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo2/dist/account/billing.html">Billing</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo2/dist/account/statements.html">Statements</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo2/dist/account/referrals.html">Referrals</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo2/dist/account/api-keys.html">API Keys</a>
                        </li>
                        <!--end::Nav item-->
                        <!--begin::Nav item-->
                        <li class="nav-item mt-2">
                            <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../../demo2/dist/account/logs.html">Logs</a>
                        </li>
                        <!--end::Nav item-->
                    </ul>
                    <!--begin::Navs-->
                </div>
            </div>
            <!--end::Navbar-->
            <!--begin::Row-->
            <div class="row g-xxl-9">
                <!--begin::Col-->
                <div class="col-xxl-8">
                    <!--begin::Security summary-->
                    <div class="card card-xxl-stretch mb-5 mb-xl-10">
                        <!--begin::Header-->
                        <div class="card-header card-header-stretch">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h3 class="m-0 text-gray-900">Security Summary</h3>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-line-tabs nav-stretch border-transparent fs-5 fw-bold" id="kt_security_summary_tabs">
                                    <li class="nav-item">
                                        <a class="nav-link text-active-primary active" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_security_summary_tab_pane_hours">12 Hours</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-active-primary" data-kt-countup-tabs="true" data-bs-toggle="tab" id="kt_security_summary_tab_day" href="#kt_security_summary_tab_pane_day">Day</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-active-primary" data-kt-countup-tabs="true" data-bs-toggle="tab" id="kt_security_summary_tab_week" href="#kt_security_summary_tab_pane_week">Week</a>
                                    </li>
                                </ul>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-7 pb-0 px-0">
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <!--begin::Tab panel-->
                                <div class="tab-pane fade active show" id="kt_security_summary_tab_pane_hours" role="tabpanel">
                                    <!--begin::Row-->
                                    <div class="row p-0 mb-5 px-9">
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                                                <span class="fs-4 fw-semibold text-success d-block">User Sign-in</span>
                                                <span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="36899">0</span>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                                                <span class="fs-4 fw-semibold text-primary d-block">Admin Sign-in</span>
                                                <span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="72">0</span>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                                                <span class="fs-4 fw-semibold text-danger d-block">Failed Attempts</span>
                                                <span class="fs-2hx fw-bold text-gray-900" data-kt-countup="true" data-kt-countup-value="291">0</span>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Container-->
                                    <div class="pt-2">
                                        <!--begin::Tabs-->
                                        <div class="d-flex align-items-center pb-6 px-9">
                                            <!--begin::Title-->
                                            <h3 class="m-0 text-gray-900 flex-grow-1">Activity Chart</h3>
                                            <!--end::Title-->
                                            <!--begin::Nav pills-->
                                            <ul class="nav nav-pills nav-line-pills border rounded p-1">
                                                <li class="nav-item me-2">
                                                    <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_security_summary_tab_hours_agents" href="#kt_security_summary_tab_pane_hours_agents">Agents</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_security_summary_tab_hours_clients" href="#kt_security_summary_tab_pane_hours_clients">Clients</a>
                                                </li>
                                            </ul>
                                            <!--end::Nav pills-->
                                        </div>
                                        <!--end::Tabs-->
                                        <!--begin::Tab content-->
                                        <div class="tab-content px-3">
                                            <!--begin::Tab pane-->
                                            <div class="tab-pane fade active show" id="kt_security_summary_tab_pane_hours_agents" role="tabpanel">
                                                <!--begin::Chart-->
                                                <div id="kt_security_summary_chart_hours_agents" style="height: 300px"></div>
                                                <!--end::Chart-->
                                            </div>
                                            <!--end::Tab pane-->
                                            <!--begin::Tab pane-->
                                            <div class="tab-pane fade" id="kt_security_summary_tab_pane_hours_clients" role="tabpanel">
                                                <!--begin::Chart-->
                                                <div id="kt_security_summary_chart_hours_clients" style="height: 300px"></div>
                                                <!--end::Chart-->
                                            </div>
                                            <!--end::Tab pane-->
                                        </div>
                                        <!--end::Tab content-->
                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div class="tab-pane fade" id="kt_security_summary_tab_pane_day" role="tabpanel">
                                    <!--begin::Row-->
                                    <div class="row p-0 mb-5 px-9">
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                                                <span class="fs-4 fw-semibold text-success d-block">User Sign-in</span>
                                                <span class="fs-2hx fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="30467">0</span>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                                                <span class="fs-4 fw-semibold text-primary d-block">Admin Sign-in</span>
                                                <span class="fs-2hx fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="120">0</span>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                                                <span class="fs-4 fw-semibold text-danger d-block">Failed Attempts</span>
                                                <span class="fs-2hx fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="23">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Container-->
                                    <div class="pt-2">
                                        <!--begin::Tabs-->
                                        <div class="d-flex align-items-center pb-9 px-9">
                                            <h3 class="m-0 text-gray-800 flex-grow-1">Activity Chart</h3>
                                            <!--begin::Nav pills-->
                                            <ul class="nav nav-pills nav-line-pills border rounded p-1">
                                                <li class="nav-item me-2">
                                                    <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-semibold active" data-bs-toggle="tab" id="kt_security_summary_tab_day_agents" href="#kt_security_summary_tab_pane_day_agents">Agents</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_security_summary_tab_day_clients" href="#kt_security_summary_tab_pane_day_clients">Clients</a>
                                                </li>
                                            </ul>
                                            <!--end::Nav pills-->
                                        </div>
                                        <!--end::Tabs-->
                                        <!--begin::Tab content-->
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="kt_security_summary_tab_pane_day_agents" role="tabpanel">
                                                <!--begin::Chart-->
                                                <div id="kt_security_summary_chart_day_agents" style="height: 300px"></div>
                                                <!--end::Chart-->
                                            </div>
                                            <div class="tab-pane fade" id="kt_security_summary_tab_pane_day_clients" role="tabpanel">
                                                <!--begin::Chart-->
                                                <div id="kt_security_summary_chart_day_clients" style="height: 300px"></div>
                                                <!--end::Chart-->
                                            </div>
                                        </div>
                                        <!--end::Tab content-->
                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div class="tab-pane fade" id="kt_security_summary_tab_pane_week" role="tabpanel">
                                    <!--begin::Row-->
                                    <div class="row p-0 mb-5 px-9">
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                                                <span class="fs-lg-4 fs-6 fw-semibold text-success d-block">User Sign-in</span>
                                                <span class="fs-lg-2hx fs-2 fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="340">0</span>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                                                <span class="fs-lg-4 fs-6 fw-semibold text-primary d-block">Admin Sign-in</span>
                                                <span class="fs-lg-2hx fs-2 fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="90">0</span>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <div class="border border-dashed border-gray-300 text-center min-w-125px rounded pt-4 pb-2 my-3">
                                                <span class="fs-lg-4 fs-6 fw-semibold text-danger d-block">Failed Attempts</span>
                                                <span class="fs-lg-2hx fs-2 fw-bold text-gray-800" data-kt-countup="true" data-kt-countup-value="230">0</span>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Container-->
                                    <div class="pt-2">
                                        <!--begin::Tabs-->
                                        <div class="d-flex align-items-center pb-9 px-9">
                                            <h3 class="m-0 text-gray-800 flex-grow-1">Activity Chart</h3>
                                            <!--begin::Nav pills-->
                                            <ul class="nav nav-pills nav-line-pills border rounded p-1">
                                                <li class="nav-item me-2">
                                                    <a class="nav-link btn btn-active-light py-2 px-5 fs-6 btn-active-color-gray-700 btn-color-gray-400 fw-semibold active" data-bs-toggle="tab" id="kt_security_summary_tab_week_agents" href="#kt_security_summary_tab_pane_week_agents">Agents</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link btn btn-active-light py-2 px-5 btn-active-color-gray-700 btn-color-gray-400 fs-6 fw-semibold" data-bs-toggle="tab" id="kt_security_summary_tab_week_clients" href="#kt_security_summary_tab_pane_week_clients">Clients</a>
                                                </li>
                                            </ul>
                                            <!--end::Nav pills-->
                                        </div>
                                        <!--end::Tabs-->
                                        <!--begin::Tab content-->
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="kt_security_summary_tab_pane_week_agents" role="tabpanel">
                                                <!--begin::Chart-->
                                                <div id="kt_security_summary_chart_week_agents" style="height: 300px"></div>
                                                <!--end::Chart-->
                                            </div>
                                            <div class="tab-pane fade" id="kt_security_summary_tab_pane_week_clients" role="tabpanel">
                                                <!--begin::Chart-->
                                                <div id="kt_security_summary_chart_week_clients" style="height: 300px"></div>
                                                <!--end::Chart-->
                                            </div>
                                        </div>
                                        <!--end::Tab content-->
                                    </div>
                                    <!--end::Container-->
                                </div>
                                <!--end::Tab panel-->
                            </div>
                            <!--end::Tab content-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Security summary-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xxl-4">
                    <!--begin::Security recent alerts-->
                    <div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Carousel-->
                            <div id="kt_security_recent_alerts" class="carousel carousel-custom carousel-stretch slide" data-bs-ride="carousel" data-bs-interval="8000">
                                <!--begin::Heading-->
                                <div class="d-flex flex-stack align-items-center flex-wrap">
                                    <h4 class="text-gray-400 fw-semibold mb-0 pe-2">Recent Alerts</h4>
                                    <!--begin::Carousel Indicators-->
                                    <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                                        <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="0" class="ms-1 active"></li>
                                        <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="1" class="ms-1"></li>
                                        <li data-bs-target="#kt_security_recent_alerts" data-bs-slide-to="2" class="ms-1"></li>
                                    </ol>
                                    <!--end::Carousel Indicators-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Carousel inner-->
                                <div class="carousel-inner pt-6">
                                    <!--begin::Item-->
                                    <div class="carousel-item active">
                                        <!--begin::Wrapper-->
                                        <div class="carousel-wrapper">
                                            <!--begin::Description-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <a href="#" class="fs-5 fw-bold text-dark text-hover-primary">Latest Announcements</a>
                                                <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">In the last year, you’ve probably had to adapt to new ways of living and working.</p>
                                            </div>
                                            <!--end::Description-->
                                            <!--begin::Summary-->
                                            <div class="d-flex flex-stack pt-8">
                                                <span class="badge badge-light-primary fs-7 fw-bold me-2">Jun 10, 2021</span>
                                                <a href="#" class="btn btn-sm btn-light">Learn More</a>
                                            </div>
                                            <!--end::Summary-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="carousel-item">
                                        <!--begin::Wrapper-->
                                        <div class="carousel-wrapper">
                                            <!--begin::Description-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <a href="#" class="fw-bold text-dark text-hover-primary">Login Attempt Failed</a>
                                                <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">As we approach one year of working remotely, we wanted to take a look back and share some ways teams around the world have collaborated effectively.</p>
                                            </div>
                                            <!--end::Description-->
                                            <!--begin::Summary-->
                                            <div class="d-flex flex-stack pt-8">
                                                <span class="badge badge-light-primary fs-7 fw-bold me-2">Oct 05, 2021</span>
                                                <a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">Join</a>
                                            </div>
                                            <!--end::Summary-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="carousel-item">
                                        <!--begin::Wrapper-->
                                        <div class="carousel-wrapper">
                                            <!--begin::Description-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <a href="#" class="fw-bold text-dark text-hover-primary">Top Picks For You</a>
                                                <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">Today we are excited to share an amazing certification opportunity which is designed to teach you everything</p>
                                            </div>
                                            <!--end::Description-->
                                            <!--begin::Summary-->
                                            <div class="d-flex flex-stack pt-8">
                                                <span class="badge badge-light-primary fs-7 fw-bold me-2">Sep 11, 2021</span>
                                                <a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">Collaborate</a>
                                            </div>
                                            <!--end::Summary-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Carousel inner-->
                            </div>
                            <!--end::Carousel-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Security recent alerts-->
                    <!--begin::Security guidelines-->
                    <div class="card card-xxl-stretch-50 mb-5 mb-xl-10">
                        <!--begin::Body-->
                        <div class="card-body pt-5">
                            <!--begin::Carousel-->
                            <div id="kt_security_guidelines" class="carousel carousel-custom carousel-stretch slide" data-bs-ride="carousel" data-bs-interval="8000">
                                <!--begin::Heading-->
                                <div class="d-flex flex-stack align-items-center flex-wrap">
                                    <h4 class="text-gray-400 fw-semibold mb-0 pe-2">Security Guidelines</h4>
                                    <!--begin::Carousel Indicators-->
                                    <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                                        <li data-bs-target="#kt_security_guidelines" data-bs-slide-to="0" class="ms-1 active"></li>
                                        <li data-bs-target="#kt_security_guidelines" data-bs-slide-to="1" class="ms-1"></li>
                                        <li data-bs-target="#kt_security_guidelines" data-bs-slide-to="2" class="ms-1"></li>
                                    </ol>
                                    <!--end::Carousel Indicators-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Carousel inner-->
                                <div class="carousel-inner pt-6">
                                    <!--begin::Item-->
                                    <div class="carousel-item active">
                                        <!--begin::Wrapper-->
                                        <div class="carousel-wrapper">
                                            <!--begin::Description-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <a href="#" class="fs-5 fw-bold text-dark text-hover-primary">Get Start Your Security</a>
                                                <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">In the last year, you’ve probably had to adapt to new ways of living and working.</p>
                                            </div>
                                            <!--end::Description-->
                                            <!--begin::Summary-->
                                            <div class="d-flex flex-stack pt-8">
                                                <span class="text-muted fw-semibold fs-6 pe-2">34, Soho Avenue, Tokio</span>
                                                <a href="#" class="btn btn-sm btn-light">Register</a>
                                            </div>
                                            <!--end::Summary-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="carousel-item">
                                        <!--begin::Wrapper-->
                                        <div class="carousel-wrapper">
                                            <!--begin::Description-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <a href="#" class="fw-bold text-dark text-hover-primary">Security Policy Update</a>
                                                <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">As we approach one year of working remotely, we wanted to take a look back and share some ways teams around the world have collaborated effectively.</p>
                                            </div>
                                            <!--end::Description-->
                                            <!--begin::Summary-->
                                            <div class="d-flex flex-stack pt-8">
                                                <span class="badge badge-light-primary fs-7 fw-bold me-2">Oct 05, 2021</span>
                                                <a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">Explore</a>
                                            </div>
                                            <!--end::Summary-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="carousel-item">
                                        <!--begin::Wrapper-->
                                        <div class="carousel-wrapper">
                                            <!--begin::Description-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <a href="#" class="fw-bold text-dark text-hover-primary">Terms Of Use Document</a>
                                                <p class="text-gray-600 fs-6 fw-semibold pt-3 mb-0">Today we are excited to share an amazing certification opportunity which is designed to teach you everything</p>
                                            </div>
                                            <!--end::Description-->
                                            <!--begin::Summary-->
                                            <div class="d-flex flex-stack pt-8">
                                                <span class="badge badge-light-primary fs-7 fw-bold me-2">Nov 10, 2021</span>
                                                <a href="#" class="btn btn-light btn-sm btn-color-muted fs-7 fw-bold px-5">Discover</a>
                                            </div>
                                            <!--end::Summary-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Carousel inner-->
                            </div>
                            <!--end::Carousel-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Security guidelines-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Login sessions-->
            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Heading-->
                    <div class="card-title">
                        <h3>Login Sessions</h3>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <div class="my-1 me-4">
                            <!--begin::Select-->
                            <select class="form-select form-select-sm form-select-solid w-125px" data-control="select2" data-placeholder="Select Hours" data-hide-search="true">
                                <option value="1" selected="selected">1 Hours</option>
                                <option value="2">6 Hours</option>
                                <option value="3">12 Hours</option>
                                <option value="4">24 Hours</option>
                            </select>
                            <!--end::Select-->
                        </div>
                        <a href="#" class="btn btn-sm btn-primary my-1">View All</a>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-0">
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                            <!--begin::Thead-->
                            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                <tr>
                                    <th class="min-w-250px">Location</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="min-w-150px">Device</th>
                                    <th class="min-w-150px">IP Address</th>
                                    <th class="min-w-150px">Time</th>
                                </tr>
                            </thead>
                            <!--end::Thead-->
                            <!--begin::Tbody-->
                            <tbody class="fw-6 fw-semibold text-gray-600">
                                <tr>
                                    <td>
                                        <a href="#" class="text-hover-primary text-gray-600">USA(5)</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                                    </td>
                                    <td>Chrome - Windows</td>
                                    <td>236.125.56.78</td>
                                    <td>2 mins ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="text-hover-primary text-gray-600">United Kingdom(10)</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                                    </td>
                                    <td>Safari - Mac OS</td>
                                    <td>236.125.56.78</td>
                                    <td>10 mins ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="text-hover-primary text-gray-600">Norway(-)</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-danger fs-7 fw-bold">ERR</span>
                                    </td>
                                    <td>Firefox - Windows</td>
                                    <td>236.125.56.10</td>
                                    <td>20 mins ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="text-hover-primary text-gray-600">Japan(112)</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                                    </td>
                                    <td>iOS - iPhone Pro</td>
                                    <td>236.125.56.54</td>
                                    <td>30 mins ago</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="#" class="text-hover-primary text-gray-600">Italy(5)</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-light-warning fs-7 fw-bold">WRN</span>
                                    </td>
                                    <td>Samsung Noted 5- Android</td>
                                    <td>236.100.56.50</td>
                                    <td>40 mins ago</td>
                                </tr>
                            </tbody>
                            <!--end::Tbody-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table wrapper-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Login sessions-->
            <!--begin::License usage-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Heading-->
                    <div class="card-title">
                        <h3>License Usage</h3>
                    </div>
                    <!--end::Heading-->
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <div class="my-1 me-4">
                            <!--begin::Select-->
                            <select class="form-select form-select-sm form-select-solid w-125px" data-control="select2" data-placeholder="Select Hours" data-hide-search="true">
                                <option value="1">1 Hours</option>
                                <option value="2">6 Hours</option>
                                <option value="3" selected="selected">12 Hours</option>
                                <option value="4">24 Hours</option>
                            </select>
                            <!--end::Select-->
                        </div>
                        <a href="#" class="btn btn-sm btn-primary my-1">Download Report</a>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body p-0">
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered table-row-solid gy-4" id="kt_security_license_usage_table">
                            <!--begin::Thead-->
                            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                <tr>
                                    <th class="w-150px ps-9">Status</th>
                                    <th class="px-0 min-w-250px">Operator</th>
                                    <th class="min-w-150px">IP Address</th>
                                    <th class="min-w-150px">Created</th>
                                    <th class="pe-0 min-w-150px">API Keys</th>
                                    <th class="min-w-50px"></th>
                                </tr>
                            </thead>
                            <!--end::Thead-->
                            <!--begin::Tbody-->
                            <tbody class="fw-6 fw-semibold text-gray-600">
                                <tr>
                                    <td class="ps-9">
                                        <span class="badge badge-light-success fs-7 fw-bold">License</span>
                                    </td>
                                    <td class="ps-0">
                                        <a href="" class="text-hover-primary text-gray-600">DSI: Workstation 2</a>
                                    </td>
                                    <td>236.125.56.78</td>
                                    <td>2 mins ago</td>
                                    <td data-bs-target="license">fftt456765gjkkjhi8306767</td>
                                    <td class="ps-5">
                                        <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-400 btn-sm btn-outline-light d-">
                                            <i class="ki-duotone ki-copy fs-2"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-9">
                                        <span class="badge badge-light-danger fs-7 fw-bold">Unknown</span>
                                    </td>
                                    <td class="ps-0">
                                        <a href="" class="text-hover-primary text-gray-600">ReXe: Workstation 29</a>
                                    </td>
                                    <td>236.125.56.78</td>
                                    <td>3 mins ago</td>
                                    <td data-bs-target="license">none</td>
                                    <td class="ps-5"></td>
                                </tr>
                                <tr>
                                    <td class="ps-9">
                                        <span class="badge badge-light-success fs-7 fw-bold">License</span>
                                    </td>
                                    <td class="ps-0">
                                        <a href="" class="text-hover-primary text-gray-600">RamenLC: Workstation 2</a>
                                    </td>
                                    <td>654.125.56.34</td>
                                    <td>5 mins ago</td>
                                    <td data-bs-target="license">ertt456765gjkkjhi83034344</td>
                                    <td class="ps-5">
                                        <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-400 btn-sm btn-outline-light d-">
                                            <i class="ki-duotone ki-copy fs-2"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-9">
                                        <span class="badge badge-light-success fs-7 fw-bold">License</span>
                                    </td>
                                    <td class="ps-0">
                                        <a href="" class="text-hover-primary text-gray-600">Nest Five: Workstation 86</a>
                                    </td>
                                    <td>423.125.56.54</td>
                                    <td>1 mins ago</td>
                                    <td data-bs-target="license">dctt456765gjkkjhi83093985</td>
                                    <td class="ps-5">
                                        <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-400 btn-sm btn-outline-light d-">
                                            <i class="ki-duotone ki-copy fs-2"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-9">
                                        <span class="badge badge-light-danger fs-7 fw-bold">Unknown</span>
                                    </td>
                                    <td class="ps-0">
                                        <a href="" class="text-hover-primary text-gray-600">DSI: Workstation 2</a>
                                    </td>
                                    <td>236.125.56.78</td>
                                    <td>7 mins ago</td>
                                    <td data-bs-target="license">none</td>
                                    <td class="ps-5"></td>
                                </tr>
                                <tr>
                                    <td class="ps-9">
                                        <span class="badge badge-light-success fs-7 fw-bold">License</span>
                                    </td>
                                    <td class="ps-0">
                                        <a href="" class="text-hover-primary text-gray-600">ReXe: Workstation 7</a>
                                    </td>
                                    <td>745.234.56.21</td>
                                    <td>3 mins ago</td>
                                    <td data-bs-target="license">uytt456765gjkkjhi4312673</td>
                                    <td class="ps-5">
                                        <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-400 btn-sm btn-outline-light d-">
                                            <i class="ki-duotone ki-copy fs-2"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-9">
                                        <span class="badge badge-light-warning fs-7 fw-bold">To be Paid</span>
                                    </td>
                                    <td class="ps-0">
                                        <a href="" class="text-hover-primary text-gray-600">Swedline: Workstation 54</a>
                                    </td>
                                    <td>441.967.56.54</td>
                                    <td>8 mins ago</td>
                                    <td data-bs-target="license">ygd456765gjkkjhi83095427</td>
                                    <td class="ps-5">
                                        <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-400 btn-sm btn-outline-light d-">
                                            <i class="ki-duotone ki-copy fs-2"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <!--end::Tbody-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table wrapper-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::License usage-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
@endsection