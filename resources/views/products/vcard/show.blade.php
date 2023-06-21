@extends('layouts.main')
@section('main')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl py-10">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">

                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-5">

                    <!--begin::Card widget 14-->
                        <div class="card mb-15">
                            <!--begin::Body-->
                            <div class="card-body text-center pb-5">
                                <!--begin::Overlay-->
                                    <div class="d-block overlay" href='{{url("storage/images/vcard/$cards->image")}}'>
                                        <!--begin::Image-->
                                        <img class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded w-100 mb-7" style="height: 300px;" src="{{url("storage/images/vcard/$cards->image")}}" alt="">
                                        <!--end::Image-->
                                    </div>
                                <!--end::Overlay-->
                                    <!--begin::Name-->
                                    <h2 class="fw-bold mb-3">{{$cards->name}}</h2>
                                    <!--end::Name-->
                                    @if($cards->company_name != null)<h4 class="fw-bold mb-3 text-gray-700">{{$cards->company_name}}</h4> @endif

                                    <!--begin::Position-->
                                    <div class="mb-9">@if($cards->company_name != null)<div class="badge badge-lg badge-light-primary d-inline">{{$cards->company_work}}</div> @endif</div>


                            </div>
                            <!--end::Body-->
                        </div>
                    <!--end::Card widget 14-->

                    <!--begin::Card widget 14-->
                    @if(count($cards->Contact) > 0)
                        <div class="card mb-15">
                            <div class="card-header">
                                <h3 class="card-title">{{__('words.vcardContact')}}</h3>
                            </div>

                            <!--begin::Body-->
                            <div class="card-body row aligin-center">
                                @foreach ($cards->Contact as $value)
                                    <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6">
                                        <a
                                            @if($value->contact_name == 'phone')
                                            href="tel:+{{$value->country}}{{preg_replace("/[^0-9]/", "", $value->contact);}}"
                                            @elseif($value->contact_name == 'whatsapp')
                                            href="https://wa.me/+{{$value->country}}{{ preg_replace("/[^0-9]/", "", $value->contact);}}"
                                            @elseif($value->contact_name == 'viber')
                                            @endif
                                            class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-100px pt-5 pb-2">
                                        
                                            <!--begin::Icon-->
                                            <div class="nav-icon mb-3">
                                                @if($value->contact_name == 'phone')
                                                <i class="fa-solid fa-phone-volume fs-1"></i>
                                                @elseif($value->contact_name == 'whatsapp')
                                                <i class="fa-brands fa-whatsapp fs-1"></i>
                                                @elseif($value->contact_name == 'viber')
                                                <i class="fa-brands fa-viber fs-1"></i>
                                                @endif
                                            </div>
                                            <!--begin::Title-->
                                            @if($value->contact_name == 'phone')
                                            <div class="nav-text text-gray-800 fw-bold fs-7 lh-1">{{__('words.vcardPhone')}}</div>
                                            @elseif($value->contact_name == 'whatsapp')
                                            <div class="nav-text text-gray-800 fw-bold fs-7 lh-1">Whatsapp</div>
                                            @elseif($value->contact_name == 'viber')
                                            <div class="nav-text text-gray-800 fw-bold fs-7 lh-1">Viber</div>
                                            @endif
                                            <span class="text-muted text-gray-700 fs-9 mt-3">{{'+'.$value->country}} {{$value->contact}}</span>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                            <!--end::Body-->
                        </div>
                    @endif
                <!--end::Card widget 14-->
                </div>
                <!--end::Sidebar-->

                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Overview Tab pane  -->
                        <div class="">

                            @if(count($cards->SocialMedia) > 0)
                                <div class="card card-custom bg-body border-0 h-md-100 mb-15">

                                    <div class="card-header">
                                        <h3 class="card-title">{{__('words.vcardSocialMediaTieil')}}</h3>
                                    </div>
                                
                                    <!--begin::Body-->
                                    <div class="card-body row aligin-center">
                                        @foreach ($cards->SocialMedia as $value)
                                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-4 col-lg-2">
                                                <a
                                                    @if($value->media_name == 'email')
                                                        href="mailto:{{$value->media_link}}"
                                                    @elseif($value->media_name == 'webSitesi' or $value->media_name == 'sahibinden' or $value->media_name == 'appleStory' or $value->media_name == 'googlePlay' or $value->media_name == 'amazon' or $value->media_name == 'linkedin')
                                                        href="https://{{$value->media_link}}"
                                                    @elseif($value->media_name == 'google-drive')
                                                        href="https://drive.google.com/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'facebook')
                                                        href="https://facebook.com/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'instagram')
                                                        href="https://instagram.com/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'snapchat')
                                                        href="https://snapchat.com/add/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'youtube')
                                                        href="https://youtube.com/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'twitter')
                                                        href="https://twitter.com/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'tiktok')
                                                        href="https://tiktok.com/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'telegram')
                                                        href="https://telegram.me/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'discord')

                                                    @elseif($value->media_name == 'reddit')
                                                        href="https://reddit.com/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'pinterest')
                                                        href="https://pinterest.com/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'twitch')
                                                        href="https://twitch.tv/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'skype')
                                                        href="https://join.skype.com/{{$value->media_link}}"
                                                    @elseif($value->media_name == 'behance')
                                                        href="https://behance.net/{{$value->media_link}}"
                                                    @endif
                                                    class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-75px pt-5 pb-2">
                                                
                                                    <!--begin::Icon-->
                                                    <div class="nav-icon">
                                                        @if($value->media_name == 'email')
                                                            <i class="fa-solid fa-envelope fs-1"></i>
                                                        @elseif($value->media_name == 'webSitesi')
                                                            <i class="fa fa-globe fs-1"></i>
                                                        @elseif($value->media_name == 'sahibinden')
                                                            <i class="fa-solid fa-s fs-1"></i>
                                                        @elseif($value->media_name == 'googlePlay')
                                                            <i class="fa-brands fa-google-play fs-1"></i>
                                                        @elseif($value->media_name == 'appleStory')
                                                            <i class="fa-brands fa-apple fs-1"></i>
                                                        @else
                                                            <i class="fa-brands fa-{{$value->media_name}} fs-1"></i>
                                                        @endif
                                                    </div>

                                                    <!--begin::Title-->
                                                    @if($value->media_name == 'email')
                                                    <div class="text-gray-800 fw-bold fs-6 lh-1 my-2 text-hover-primary fw-bold">{{__('words.vcardEmail')}}</div>
                                                    @elseif($value->media_name == 'webSitesi')
                                                    <div class="text-gray-800 fw-bold fs-6 lh-1 my-2 text-hover-primary fw-bold">{{__('words.vcardWebSite')}}</div>
                                                    @elseif($value->media_name == 'discord')
                                                    <div class="text-gray-800 fw-bold fs-7 lh-1 my-2 text-hover-primary fw-bold">{{'@'.$value->media_link}}</div>
                                                    @else
                                                    <div class="text-gray-800 fw-bold fs-7 lh-1 my-2 text-hover-primary fw-bold">{{Str::headline($value->media_name);}}</div>
                                                    @endif
                                                </a>
                                            </div>
                                        @endforeach

                                    </div>
                                    <!--end::Body-->
                                </div>
                            @endif

                            @if(count($cards->bank) > 0)
                                <!--begin::Tasks-->
                                <div class="card mb-6 mb-xl-9">

                                    <!--begin::Card header-->
                                    <div class="card-header mt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title flex-column">
                                            <h2 class="mb-1">{{__('words.vcardBankHeader')}}</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->

                                    <div class="row">
                                        @foreach($cards->Bank as $value)
                                            <!--begin::Body-->
                                            <div class="col-md-6">
                                                <div class="card-body p-5">
                                                    <!--begin::Invoice 2 sidebar-->
                                                    <div class=" border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
                                                        <!--begin::Icon-->
                                                        <div class="symbol symbol-50px me-5 mb-4">
                                                            <span class="symbol-label">
                                                                <img src="{{url('assets/media/Bankicon/'.$value->bank.'.png')}}" class="h-40px align-self-center" alt="">
                                                            </span>
                                                        </div>
                                                        <!--end::Icon-->
                                                        <!--begin::Item-->
                                                        <div class="mb-3">
                                                            <div class="fw-semibold text-gray-600 fs-7">{{__('words.vcardBankName')}}</div>
                                                            <table id="kt_security_license_usage_table">
                                                                <div>
                                                                    <td class="fw-bold fs-6" data-bs-target="license">{{$value->bank_name}}</td>
                                                                    <td class="ps-5">
                                                                        <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-400 btn-sm btn-outline-light">
                                                                            <i class="ki-duotone ki-copy fs-2"></i>
                                                                        </button>
                                                                    </td>
                                                                </div>
                                                            </table>
                                                        </div>
                                                        <!--end::Item-->
                                                        <!--begin::Item-->
                                                        <div class="mb-6" id="kt_security_license_usage_table">

                                                            <div class="fw-semibold text-gray-600 fs-7">{{__('words.vcardBankIban')}}</div>
                                                            @if($value->bank == 'papara' or $value->bank == 'paypal' or $value->bank == 'BankIban' or $value->bank == 'hsbc')
                                                                <div class="fw-bold text-gray-800 fs-6">{{$value->bank_iban}}</div>
                                                            @else
                                                                <table id="kt_security_license_usage_table">
                                                                    <div>
                                                                        <td class="fw-bold fs-7" data-bs-target="license">TR{{$value->bank_iban}}</td>
                                                                        <td class="ps-1">
                                                                            <button type="button" data-action="copy" class="btn btn-active-color-primary btn-icon btn-color-gray-400 btn-sm btn-outline-light">
                                                                                <i class="ki-duotone ki-copy fs-2"></i>
                                                                            </button>
                                                                        </td>
                                                                    </div>
                                                                </table>
                                                            @endif
                                                        </div>
                                                        <!--end::Item-->
                                                    </div>
                                                    <!--end::Invoice 2 sidebar-->
                                                </div>
                                            <!--end::Body-->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Tasks-->
                            @endif

                            @if(count($cards->Address) > 0)
                                <!--begin::Tasks-->
                                <div class="card mb-6 mb-xl-9">

                                    <!--begin::Card header-->
                                    <div class="card-header mt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title flex-column">
                                            <h2 class="mb-1">{{__('words.vcardAddrres')}}</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->

                                    <div class="row">
                                        @foreach($cards->Address as $value)
                                            <!--begin::Body-->
                                            <div class="nav nav-pills nav-pills-custom justify-content-center col-12">
                                                <div class="nav-link btn ">
                                                    <!--begin::Invoice 2 sidebar-->
                                                    <div class=" border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
                                                        <!--begin::Icon-->
                                                        <div class="symbol symbol-50px me-5 mt-5">
                                                            <span class="symbol-label">
                                                                <i class="fa fa-location-dot fs-1"></i>
                                                            </span>
                                                        </div>
                                                        <!--end::Icon-->
                                                        <!--begin::Title-->
                                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap mt-5">
                                                            <div class="flex-grow-1 me-2">                                                    
                                                                <span href="#" class="text-gray-800 text-hover-primary fs-3 fw-bold">{{$value->country}}</span><br>
                                                                <span href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">{{$value->province}}/{{$value->district}}</span>
                                                                <span class="text-muted fw-semibold d-block fs-5">{{$value->address1}}</span>
                                                                <span class="text-muted fw-semibold d-block fs-5">{{$value->address2}}</span>
                                                            </div>
                                                        </div>
                                                        <!--end::Title-->

                                                    </div>
                                                    <!--end::Invoice 2 sidebar-->
                                                </div>
                                            <!--end::Body-->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Tasks-->
                            @endif

                            @if(count($cards->note) > 0)
                                <!--begin::Tasks-->
                                <div class="card mb-6 mb-xl-9">

                                    <!--begin::Card header-->
                                    <div class="card-header mt-6">
                                        <!--begin::Card title-->
                                        <div class="card-title flex-column">
                                            <h2 class="mb-1">{{__('words.vcardNotes')}}</h2>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--end::Card header-->

                                    <div class="row">
                                        @foreach($cards->note as $value)
                                            <!--begin::Body-->
                                            <div class="col-12">
                                                <div class="card-body p-5 aligin-center">
                                                    <!--begin::Invoice 2 sidebar-->
                                                    <div class=" border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">

                                                        <!--begin::Title-->
                                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                            <div class="flex-grow-1 me-2">                                                    
                                                                <h2 class="text-gray-800 text-hover-primary fw-bold">{{$value->title}}</h2><br>
                                                                <p  class="text-muted fw-semibold d-block">{{$value->description}}</p>
                                                            </div>
                                                        </div>
                                                        <!--end::Title-->

                                                    </div>
                                                    <!--end::Invoice 2 sidebar-->
                                                </div>
                                            <!--end::Body-->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Tasks-->
                            @endif

                        </div>
                        <!--end:::Overview Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->

            </div>
            <!--end::Layout-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->
</div>
<!--end:::Main-->
@endsection