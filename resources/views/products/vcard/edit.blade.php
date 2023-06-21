@extends('layouts.main')
@section('main')

{{-- {{dd($vcards->image)}} --}}

@if ($errors->any())
<!--begin::Toast-->
<div class="position-fixed bottom-0 start-0 p-3 z-index-3">
    <div id="kt_docs_toast_toggle" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="ki-duotone ki-abstract-19 fs-2 text-danger me-3"><span class="path1"></span><span class="path2"></span></i>
            <strong class="me-auto">PikarenNFC</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            @foreach ($errors->all() as $error)
                <div class="text-danger">{{$error }} </br></div>
            @endforeach
        </div>
    </div>
</div>
<!--end::Toast-->
@endif

<!--begin::Container-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <!--begin::Post-->
    <div class="content flex-row-fluid" id="kt_content">

        <form id="vcardForm" action="{{route('vcard.update', $vcards->slug)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <!--begin::Row-->
            <div class="row g-5 g-xl-8 mb-4">

                <!--begin::Col-->
                <div class="col-xl-4">
                    <div class="card card-custom bg-body border-0 h-md-100">

                        <div class="card-header">
                            <h3 class="card-title">{{__('words.vcardPhoto')}}</h3>
                        </div>
                        <!--begin::Body-->
                        <div class="card-body justify-content-center ">

                            <div class="text-center mb-4">

                                <!--begin::Image input-->
                                    <!--begin::Image input placeholder-->
                                    <style>.image-input-placeholder { background-image: url('{{url("storage/images/vcard/$vcards->image")}}'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('{{url("storage/images/vcard/$vcards->image")}}'); }</style>
                                    <!--end::Image input placeholder-->
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-150px h-150px w-lg-250px h-lg-250px" style="background-image: url('{{url("storage/images/vcard/$vcards->image")}}')"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Label-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-30px h-30px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{__('words.changeImage')}}">
                                            <i class="ki-outline ki-pencil fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="hidden" name="oldimage" value="{{$vcards->image}}" />
                                            <input type="file" name="image" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-30px h-30px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{__('words.CancelImage')}}">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-30px h-30px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="{{__('words.removeImage')}}">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                <!--end::Image input-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{__('words.AllowedFileTypes')}}: png, jpg, jpeg.</div>
                                <!--end::Description-->
                            </div>

                        </div>
                        <!--end::Body-->
                    </div>
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="
                    @if(count($vcards->Contact) > 0 or count($vcards->SocialMedia) > 0 or count($vcards->Bank) > 0 or count($vcards->Address) > 0 or count($vcards->note) > 0)
                    col-xl-4
                    @else
                    col-xl-8
                    @endif
                    ">
                    <div class="card card-custom bg-body border-0 h-md-100">
                        <div class="card-header">
                            <h3 class="card-title">{{__('words.vcardNameAndWord')}}</h3>
                        </div>

                        <div class="card-body">
                            <!--begin::Input group-->
                            <div class="mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="form-label required">{{__('words.vcardName')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control mb-2" placeholder="{{__('words.vcardNamePlaceholder')}}" value="{{$vcards->name}}" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{__('words.vcardEnternformation')}}</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="form-label">{{__('words.vcardcompanyName')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="company_name" class="form-control mb-2" placeholder="{{__('words.vcardcompanyNamePlaceholder')}}" value="{{$vcards->company_name}}" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{__('words.vcardEnternformation')}}</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-5 fv-row">
                                <!--begin::Label-->
                                <label class=" form-label">{{__('words.vcardcompanyWork')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="company_work" class="form-control mb-2" placeholder="{{__('words.vcardcompanyWorkPlaceholder')}}" value="{{$vcards->company_work}}" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">{{__('words.vcardEnternformation')}}</div>
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                        </div>

                    </div>
                </div>
                <!--end::Col-->

        </form>
                @if(count($vcards->Contact) > 0 or count($vcards->SocialMedia) > 0 or count($vcards->Bank) > 0 or count($vcards->Address) > 0 or count($vcards->note) > 0)
                    <!--begin::Col-->
                    <div class="col-xl-4">

                        <!--begin::Tab Content-->
                            <div class="card card-custom bg-body border-0 h-md-100">


                                <div class="card-header">
                                    <h3 class="card-title">{{__('words.vcardPhoto')}}</h3>
                                </div>
                                    <div class="card-body aligin-center">
                                        <div class="tab-content justify-content-center hover-scroll-overlay-y me-n6 row" style="height: 390px">

                                            @if(count($vcards->Contact) > 0 )
                                                <!--begin::Example-->
                                                <div class="separator separator-dotted separator-content border-primary mt-5 mb-10"><span class="h2">{{__('words.vcardContact')}}</span></div>
                                                <!--end::Example-->
                                            @endif

                                            @foreach($vcards->Contact as $value)
                                                <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6">
                                                    <!--begin::Link-->
                                                    <div class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2 active">
                                                        <a
                                                            @if($value->contact_name == 'phone')
                                                            href="tel:+{{$value->country}}{{preg_replace("/[^0-9]/", "", $value->contact);}}"
                                                            @elseif($value->contact_name == 'whatsapp')
                                                            href="https://wa.me/+{{$value->country}}{{ preg_replace("/[^0-9]/", "", $value->contact);}}"
                                                            @elseif($value->contact_name == 'viber')
                                                            @endif
                                                            
                                                            >
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
                                                            <!--end::Icon-->
                                                            <!--begin::Title-->
                                                            @if($value->contact_name == 'phone')
                                                            <div class="text-gray-800 fw-bold fs-6 lh-1 my-3 text-hover-primary fw-bold">{{__('words.vcardPhone')}}</div>
                                                            @elseif($value->contact_name == 'whatsapp')
                                                            <div class="text-gray-800 fw-bold fs-6 lh-1 my-3 text-hover-primary fw-bold">Whatsapp</div>
                                                            @elseif($value->contact_name == 'viber')
                                                            <div class="text-gray-800 fw-bold fs-6 lh-1 my-3 text-hover-primary fw-bold">Viber</div>
                                                            @endif
                                                            <span class="text-muted fw-semibold fs-7">{{'+'.$value->country}} {{$value->contact}}</span>
                                                            <!--end::Title-->
                                                            <!--begin::Icon-->

                                                            <!--begin::Bullet-->
                                                            <!--end::Bullet-->
                                                        </a>
                                                        <div class="bullet-custom position-absolute bottom-0 w-100 h-20px bg-light-danger bg-hover-danger">
                                                            <form action="{{route('vcard.destroy', $value->id)}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <input type="hidden" name="value" value="contact">
                                                                <button type="submit" class="ki-outline ki-cross fs-2 text-gray-800 btn btn-sm btn-icon h-20px w-100"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            @if(count($vcards->SocialMedia) > 0)
                                                <!--begin::Example-->
                                                <div class="separator separator-dotted separator-content border-primary my-10"><span class="h2">{{__('words.vcardSocialMediaTieil')}}</span></div>
                                                <!--end::Example-->
                                            @endif

                                            @foreach($vcards->SocialMedia as $value)
                                                <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6">
                                                    <!--begin::Link-->
                                                    <div class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-100px pt-5 pb-2 active">
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
                                                            >
                                                            <!--begin::Icon-->
                                                            <div class="mx-5">
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
                                                            <!--end::Icon-->

                                                            <!--begin::Title-->
                                                            @if($value->media_name == 'email')
                                                            <div class="text-gray-800 fw-bold fs-6 lh-1 my-3 text-hover-primary fw-bold">{{__('words.vcardEmail')}}</div>
                                                            @elseif($value->media_name == 'webSitesi')
                                                            <div class="text-gray-800 fw-bold fs-6 lh-1 my-3 text-hover-primary fw-bold">{{__('words.vcardWebSite')}}</div>
                                                            @elseif($value->media_name == 'discord')
                                                            <div class="text-gray-800 fw-bold fs-7 lh-1 my-3 text-hover-primary fw-bold">{{'@'.$value->media_link}}</div>
                                                            @else
                                                            <div class="text-gray-800 fw-bold fs-7 lh-1 my-3 text-hover-primary fw-bold">{{Str::headline($value->media_name);}}</div>
                                                            @endif
                                                            <!--end::Title-->
                                                            <!--begin::Icon-->

                                                            <!--begin::Bullet-->
                                                            <!--end::Bullet-->
                                                        </a>
                                                        <div class="bullet-custom position-absolute bottom-0 w-100 h-20px bg-light-danger bg-hover-danger">
                                                            <form action="{{route('vcard.destroy', $value->id)}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <input type="hidden" name="value" value="media">
                                                                <button type="submit" class="ki-outline ki-cross fs-2 text-gray-800 btn btn-sm btn-icon h-20px w-100"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            @if(count($vcards->Bank) > 0)
                                                <!--begin::Example-->
                                                <div class="separator separator-dotted separator-content border-primary my-10"><span class="h2">{{__('words.vcardBankHeader')}}</span></div>
                                                <!--end::Example-->
                                            @endif

                                            @foreach($vcards->Bank as $value)
                                                <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-12">
                                                    <!--begin::Link-->
                                                    <div class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-150px pt-5 pb-2 active">
                                                            <!--begin::Icon-->
                                                            <div class="symbol symbol-50px me-5">
                                                                <span class="symbol-label">
                                                                    <img src="{{url('assets/media/Bankicon/'.$value->bank.'.png')}}" class="h-100 align-self-center" alt="">
                                                                </span>
                                                            </div>
                                                            <!--end::Icon-->

                                                            <!--begin::Title-->
                                                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                                <div class="flex-grow-1 me-2">
                                                                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">{{$value->bank_name}}</a>
                                                                    @if($value->bank == 'papara' or $value->bank == 'paypal' or $value->bank == 'BankIban' or $value->bank == 'hsbc')
                                                                        <span class="text-muted fw-semibold d-block fs-7">{{$value->bank_iban}}</span>
                                                                    @else
                                                                        <span class="text-muted fw-semibold d-block fs-7">TR{{$value->bank_iban}}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <!--end::Title-->
                                                            <!--begin::Icon-->

                                                            <!--begin::Bullet-->
                                                            <!--end::Bullet-->
                                                        </a>
                                                        <div class="bullet-custom position-absolute bottom-0 w-100 h-20px bg-light-danger bg-hover-danger">
                                                            <form action="{{route('vcard.destroy', $value->id)}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <input type="hidden" name="value" value="bank">
                                                                <button type="submit" class="ki-outline ki-cross fs-2 text-gray-800 btn btn-sm btn-icon h-20px w-100"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            @if(count($vcards->Address) > 0)
                                                <!--begin::Example-->
                                                <div class="separator separator-dotted separator-content border-primary my-10"><span class="h2">{{__('words.vcardAddrres')}}</span></div>
                                                <!--end::Example-->
                                            @endif

                                            @foreach($vcards->Address as $value)
                                                <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-12">
                                                    <!--begin::Link-->
                                                    <div class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-200px pb-2 active">
                                                    <!--begin::Icon-->
                                                    <div class="symbol symbol-50px me-5 mt-5">
                                                        <span class="symbol-label">
                                                            <i class="fa fa-location-dot fs-1"></i>
                                                        </span>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                        <div class="flex-grow-1 me-2">                                                    
                                                            <span href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">{{$value->country}}</span><br>
                                                            <span href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">{{$value->province}}/{{$value->district}}</span>
                                                            <span class="text-muted fw-semibold d-block fs-8">{{$value->address1}}</span>
                                                            <span class="text-muted fw-semibold d-block fs-8">{{$value->address2}}</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Title-->
                                                        <div class="bullet-custom position-absolute bottom-0 w-100 h-20px bg-light-danger bg-hover-danger">
                                                            <form action="{{route('vcard.destroy', $value->id)}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <input type="hidden" name="value" value="address">
                                                                <button type="submit" class="ki-outline ki-cross fs-2 text-gray-800 btn btn-sm btn-icon h-20px w-100"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            
                                            @if(count($vcards->note) > 0)
                                                <!--begin::Example-->
                                                <div class="separator separator-dotted separator-content border-primary my-10"><span class="h2">{{__('words.vcardNotes')}}</span></div>
                                                <!--end::Example-->
                                            @endif

                                            @foreach($vcards->note as $value)
                                                <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-12">
                                                    <!--begin::Link-->
                                                    <div class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-200px pb-2 active">
                                                    <!--begin::Icon-->
                                                    <div class="symbol symbol-50px me-5 mt-5">
                                                        <span class="symbol-label">
                                                            <i class="fa fa-clipboard fs-5"></i>
                                                        </span>
                                                    </div>
                                                    <!--end::Icon-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                                        <div class="flex-grow-1 me-2">                                                    
                                                            <span href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">{{$value->title}}</span><br>
                                                            <span class="text-muted fw-semibold d-block fs-8">{{$value->description}}</span>
                                                        </div>
                                                    </div>
                                                    <!--end::Title-->
                                                        <div class="bullet-custom position-absolute bottom-0 w-100 h-20px bg-light-danger bg-hover-danger">
                                                            <form action="{{route('vcard.destroy', $value->id)}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <input type="hidden" name="value" value="note">
                                                                <button type="submit" class="ki-outline ki-cross fs-2 text-gray-800 btn btn-sm btn-icon h-20px w-100"></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                            </div>
                        <!--end::Tab Content-->
                    </div>
                    <!--end::Col-->
                @endif

                <!--begin::Col-->
                <div class="col-xl-12">

                    <div class="card card-custom bg-body border-0 h-md-100">
                        
                        <!--begin::Body-->
                        <div class="card-body row justify-content-center aligin-center">

                            <!--begin::Example-->
                            <div class="separator separator-dotted separator-content border-primary my-15"><span class="h2">{{__('words.vcardContact')}}</span></div>
                            <!--end::Example-->

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#phone">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-solid fa-phone-volume fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-7 lh-1">{{__('words.vcardPhone')}}</span>
                                </a>

                            </div>
                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#whatsapp">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-whatsapp fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-7 lh-1">Whatsapp</span>
                                </a>

                            </div>
                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#email">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-solid fa-envelope fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-7 lh-1">{{__('words.vcardEmail')}}</span>
                                </a>

                            </div>
                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#address">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa fa-location-dot fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-7 lh-1">{{__('words.vcardAddress')}}</span>
                                </a>

                            </div>
                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#webSitesi">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa fa-globe fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">{{__('words.vcardWebSite')}}</span>
                                </a>

                            </div>
                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#googleDrive">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-google-drive fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Google Drive</span>
                                </a>

                            </div>
                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#not">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa fa-clipboard fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-7 lh-1">Not</span>
                                </a>

                            </div>
                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100px h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#viber">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-viber fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-7 lh-1">Viber</span>
                                </a>

                            </div>

                            <!--begin::Example-->
                            <div class="separator separator-dotted separator-content border-primary my-15"><span class="h2">{{__('words.vcardSocialMediaTieil')}}</span></div>
                            <!--end::Example-->

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#facebook">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-facebook fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Facebook</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#instagram">
                                    <!--begin::Icon-->
                                    <div class=" mb-3">
                                        <i class="fa-brands fa-instagram fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Instagram</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#snapchat">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-snapchat fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Snapchat</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#youtube">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-youtube fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Youtube</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#twitter">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-twitter fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Twitter</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#tiktok">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-tiktok fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">TikTok</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#telegram">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-telegram fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Telegram</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#discord">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-discord fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Discord</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#reddit">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-reddit fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Reddit</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#pinterest">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-pinterest fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Pinterest</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#twitch">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-twitch fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Twitch</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-1">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#skype">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-skype fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-8 lh-1">Skype</span>
                                </a>

                            </div>

                            <!--begin::Example-->
                            <div class="separator separator-dotted separator-content border-primary my-15"><span class="h2">{{__('words.vcardBankHeader')}}</span></div>
                            <!--end::Example-->

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#enpara">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Enpara.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Enpara</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#ziraat">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Ziraat.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Ziraat Bankası</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#garanti">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Garanti.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Garanti Bankası</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#yapikredi">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Yapikredi.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Yapı Kredi Bankası</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#halk">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Halk.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Halk Bankası</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#papara">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Papara.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Papara</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#vakif">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Vakif.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Vakıf Bankası</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#deniz">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" class="w-50px h-50px" src="{{url('assets/media/Bankicon/Deniz.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Deniz Bankası</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#akbank">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Akbank.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Akbank</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#is">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/is.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">İş Bankası</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#paypal">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Paypal.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Paypal</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#BankIban">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Bankiban.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Bank Iban</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#albaraka">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Albaraka.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Albaraka</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#kuveyt">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Kuveyt.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Kuveyt Türk</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#qnb">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/QNB.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">QNB Finans Bankası</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#ing">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/ING.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">ING Bankası</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#hsbc">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/hsbc.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">HSBC</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#teb">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/TEB.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">TEB</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#fibabanka">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Fibabanka.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Fibabanka</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#emlak">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/emlak.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Emlak Katılım Bankası</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#vakifkatilim">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/Vakifkatilim.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Vakıf Katılım</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                            
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-125px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#sekerbank">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <img class="w-50px h-50px" src="{{url('assets/media/Bankicon/sekerbank.png')}}" alt="">
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Şekerbank</span>
                                </a>

                            </div>

                            <!--begin::Example-->
                            <div class="separator separator-dotted separator-content border-primary my-15"><span class="h2">{{__('words.vcardBusiness')}}</span></div>
                            <!--end::Example-->

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#behance">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-behance fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Behance</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#Sahibinden">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-solid fa-s fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Sahibinden</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#googlePlay">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-google-play fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Google Play Store</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#appleStory">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-apple fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Apple Store</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#amazon">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-amazon fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Amazon</span>
                                </a>

                            </div>

                            <div class="nav nav-pills nav-pills-custom justify-content-center mb-3 col-6 col-lg-2">
                                
                                <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-column overflow-hidden w-100 h-85px pt-5 pb-2" data-bs-toggle="modal" data-bs-target="#linkedin">
                                    <!--begin::Icon-->
                                    <div class="nav-icon mb-3">
                                        <i class="fa-brands fa-linkedin fs-1"></i>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Title-->
                                    <span class="nav-text text-gray-800 fw-bold fs-6 lh-1">Linkedin</span>
                                </a>

                            </div>

                        </div>
                        <!--end::Body-->
                    </div>

                </div>

            </div>
            <!--end::Row-->

            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="{{route('vcard.index')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">{{__('words.vcardCancel')}}</a>
                <!--end::Button-->
                <!--begin::Button-->
                <button onclick="myFunction()" type="submit" class="btn btn-primary">
                    <span class="indicator-label">{{__('words.vcardSave')}}</span>
                </button>
                <!--end::Button-->
            </div>        
    </div>
    <!--end::Post-->
</div>
<!--end::Container-->

{{-- Contact Moderls --}}
<div>
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="phone" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-450px" id="phone">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>{{__('words.vcardPhone')}}</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf

                        <label class="form-label">{{__('words.vcardPhone')}}</label>
                        <input type="hidden" name="contact_name" value="phone">
                        <!--begin::Form group-->
                        <div class="row mb-3">
                            <div class="col-md-12 mb-5">
                                <select class="form-select" name="phone_contact" data-dropdown-parent="#phone" data-control="select2" data-placeholder="{{__('words.vcardPhoneName')}}...">
                                    <option></option>
                                    <option value="213">Algeria (+213)</option>
                                    <option value="376">Andorra (+376)</option>
                                    <option value="244">Angola (+244)</option>
                                    <option value="1264">Anguilla (+1264)</option>
                                    <option value="1268">Antigua &amp; Barbuda (+1268)</option>
                                    <option value="54">Argentina (+54)</option>
                                    <option value="374">Armenia (+374)</option>
                                    <option value="297">Aruba (+297)</option>
                                    <option value="61">Australia (+61)</option>
                                    <option value="43">Austria (+43)</option>
                                    <option value="994">Azerbaijan (+994)</option>
                                    <option value="1242">Bahamas (+1242)</option>
                                    <option value="973">Bahrain (+973)</option>
                                    <option value="880">Bangladesh (+880)</option>
                                    <option value="1246">Barbados (+1246)</option>
                                    <option value="375">Belarus (+375)</option>
                                    <option value="32">Belgium (+32)</option>
                                    <option value="501">Belize (+501)</option>
                                    <option value="229">Benin (+229)</option>
                                    <option value="1441">Bermuda (+1441)</option>
                                    <option value="975">Bhutan (+975)</option>
                                    <option value="591">Bolivia (+591)</option>
                                    <option value="387">Bosnia Herzegovina (+387)</option>
                                    <option value="267">Botswana (+267)</option>
                                    <option value="55">Brazil (+55)</option>
                                    <option value="673">Brunei (+673)</option>
                                    <option value="359">Bulgaria (+359)</option>
                                    <option value="226">Burkina Faso (+226)</option>
                                    <option value="257">Burundi (+257)</option>
                                    <option value="855">Cambodia (+855)</option>
                                    <option value="237">Cameroon (+237)</option>
                                    <option value="1">Canada (+1)</option>
                                    <option value="238">Cape Verde Islands (+238)</option>
                                    <option value="1345">Cayman Islands (+1345)</option>
                                    <option value="236">Central African Republic (+236)</option>
                                    <option value="56">Chile (+56)</option>
                                    <option value="86">China (+86)</option>
                                    <option value="57">Colombia (+57)</option>
                                    <option value="269">Comoros (+269)</option>
                                    <option value="242">Congo (+242)</option>
                                    <option value="682">Cook Islands (+682)</option>
                                    <option value="506">Costa Rica (+506)</option>
                                    <option value="385">Croatia (+385)</option>
                                    <option value="53">Cuba (+53)</option>
                                    <option value="90392">Cyprus North (+90392)</option>
                                    <option value="357">Cyprus South (+357)</option>
                                    <option value="42">Czech Republic (+42)</option>
                                    <option value="45">Denmark (+45)</option>
                                    <option value="253">Djibouti (+253)</option>
                                    <option value="1809">Dominica (+1809)</option>
                                    <option value="1809">Dominican Republic (+1809)</option>
                                    <option value="593">Ecuador (+593)</option>
                                    <option value="20">Egypt (+20)</option>
                                    <option value="503">El Salvador (+503)</option>
                                    <option value="240">Equatorial Guinea (+240)</option>
                                    <option value="291">Eritrea (+291)</option>
                                    <option value="372">Estonia (+372)</option>
                                    <option value="251">Ethiopia (+251)</option>
                                    <option value="500">Falkland Islands (+500)</option>
                                    <option value="298">Faroe Islands (+298)</option>
                                    <option value="679">Fiji (+679)</option>
                                    <option value="358">Finland (+358)</option>
                                    <option value="33">France (+33)</option>
                                    <option value="594">French Guiana (+594)</option>
                                    <option value="689">French Polynesia (+689)</option>
                                    <option value="241">Gabon (+241)</option>
                                    <option value="220">Gambia (+220)</option>
                                    <option value="7880">Georgia (+7880)</option>
                                    <option value="49">Germany (+49)</option>
                                    <option value="233">Ghana (+233)</option>
                                    <option value="350">Gibraltar (+350)</option>
                                    <option value="30">Greece (+30)</option>
                                    <option value="299">Greenland (+299)</option>
                                    <option value="1473">Grenada (+1473)</option>
                                    <option value="590">Guadeloupe (+590)</option>
                                    <option value="671">Guam (+671)</option>
                                    <option value="502">Guatemala (+502)</option>
                                    <option value="224">Guinea (+224)</option>
                                    <option value="245">Guinea - Bissau (+245)</option>
                                    <option value="592">Guyana (+592)</option>
                                    <option value="509">Haiti (+509)</option>
                                    <option value="504">Honduras (+504)</option>
                                    <option value="852">Hong Kong (+852)</option>
                                    <option value="36">Hungary (+36)</option>
                                    <option value="354">Iceland (+354)</option>
                                    <option value="91">India (+91)</option>
                                    <option value="62">Indonesia (+62)</option>
                                    <option value="98">Iran (+98)</option>
                                    <option value="964">Iraq (+964)</option>
                                    <option value="353">Ireland (+353)</option>
                                    <option value="972">Israel (+972)</option>
                                    <option value="39">Italy (+39)</option>
                                    <option value="1876">Jamaica (+1876)</option>
                                    <option value="81">Japan (+81)</option>
                                    <option value="962">Jordan (+962)</option>
                                    <option value="7">Kazakhstan (+7)</option>
                                    <option value="254">Kenya (+254)</option>
                                    <option value="686">Kiribati (+686)</option>
                                    <option value="850">Korea North (+850)</option>
                                    <option value="82">Korea South (+82)</option>
                                    <option value="965">Kuwait (+965)</option>
                                    <option value="996">Kyrgyzstan (+996)</option>
                                    <option value="856">Laos (+856)</option>
                                    <option value="371">Latvia (+371)</option>
                                    <option value="961">Lebanon (+961)</option>
                                    <option value="266">Lesotho (+266)</option>
                                    <option value="231">Liberia (+231)</option>
                                    <option value="218">Libya (+218)</option>
                                    <option value="417">Liechtenstein (+417)</option>
                                    <option value="370">Lithuania (+370)</option>
                                    <option value="352">Luxembourg (+352)</option>
                                    <option value="853">Macao (+853)</option>
                                    <option value="389">Macedonia (+389)</option>
                                    <option value="261">Madagascar (+261)</option>
                                    <option value="265">Malawi (+265)</option>
                                    <option value="60">Malaysia (+60)</option>
                                    <option value="960">Maldives (+960)</option>
                                    <option value="223">Mali (+223)</option>
                                    <option value="356">Malta (+356)</option>
                                    <option value="692">Marshall Islands (+692)</option>
                                    <option value="596">Martinique (+596)</option>
                                    <option value="222">Mauritania (+222)</option>
                                    <option value="269">Mayotte (+269)</option>
                                    <option value="52">Mexico (+52)</option>
                                    <option value="691">Micronesia (+691)</option>
                                    <option value="373">Moldova (+373)</option>
                                    <option value="377">Monaco (+377)</option>
                                    <option value="976">Mongolia (+976)</option>
                                    <option value="1664">Montserrat (+1664)</option>
                                    <option value="212">Morocco (+212)</option>
                                    <option value="258">Mozambique (+258)</option>
                                    <option value="95">Myanmar (+95)</option>
                                    <option value="264">Namibia (+264)</option>
                                    <option value="674">Nauru (+674)</option>
                                    <option value="977">Nepal (+977)</option>
                                    <option value="31">Netherlands (+31)</option>
                                    <option value="687">New Caledonia (+687)</option>
                                    <option value="64">New Zealand (+64)</option>
                                    <option value="505">Nicaragua (+505)</option>
                                    <option value="227">Niger (+227)</option>
                                    <option value="234">Nigeria (+234)</option>
                                    <option value="683">Niue (+683)</option>
                                    <option value="672">Norfolk Islands (+672)</option>
                                    <option value="670">Northern Marianas (+670)</option>
                                    <option value="47">Norway (+47)</option>
                                    <option value="968">Oman (+968)</option>
                                    <option value="680">Palau (+680)</option>
                                    <option value="507">Panama (+507)</option>
                                    <option value="675">Papua New Guinea (+675)</option>
                                    <option value="595">Paraguay (+595)</option>
                                    <option value="51">Peru (+51)</option>
                                    <option value="63">Philippines (+63)</option>
                                    <option value="48">Poland (+48)</option>
                                    <option value="351">Portugal (+351)</option>
                                    <option value="1787">Puerto Rico (+1787)</option>
                                    <option value="974">Qatar (+974)</option>
                                    <option value="262">Reunion (+262)</option>
                                    <option value="40">Romania (+40)</option>
                                    <option value="7">Russia (+7)</option>
                                    <option value="250">Rwanda (+250)</option>
                                    <option value="378">San Marino (+378)</option>
                                    <option value="239">Sao Tome &amp; Principe (+239)</option>
                                    <option value="966">Saudi Arabia (+966)</option>
                                    <option value="221">Senegal (+221)</option>
                                    <option value="381">Serbia (+381)</option>
                                    <option value="248">Seychelles (+248)</option>
                                    <option value="232">Sierra Leone (+232)</option>
                                    <option value="65">Singapore (+65)</option>
                                    <option value="421">Slovak Republic (+421)</option>
                                    <option value="386">Slovenia (+386)</option>
                                    <option value="677">Solomon Islands (+677)</option>
                                    <option value="252">Somalia (+252)</option>
                                    <option value="27">South Africa (+27)</option>
                                    <option value="34">Spain (+34)</option>
                                    <option value="94">Sri Lanka (+94)</option>
                                    <option value="290">St. Helena (+290)</option>
                                    <option value="1869">St. Kitts (+1869)</option>
                                    <option value="1758">St. Lucia (+1758)</option>
                                    <option value="249">Sudan (+249)</option>
                                    <option value="597">Suriname (+597)</option>
                                    <option value="268">Swaziland (+268)</option>
                                    <option value="46">Sweden (+46)</option>
                                    <option value="41">Switzerland (+41)</option>
                                    <option value="963">Syria (+963)</option>
                                    <option value="886">Taiwan (+886)</option>
                                    <option value="7">Tajikstan (+7)</option>
                                    <option value="66">Thailand (+66)</option>
                                    <option value="228">Togo (+228)</option>
                                    <option value="676">Tonga (+676)</option>
                                    <option value="1868">Trinidad &amp; Tobago (+1868)</option>
                                    <option value="216">Tunisia (+216)</option>
                                    <option value="90">Turkey (+90)</option>
                                    <option value="7">Turkmenistan (+7)</option>
                                    <option value="993">Turkmenistan (+993)</option>
                                    <option value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                    <option value="688">Tuvalu (+688)</option>
                                    <option value="256">Uganda (+256)</option>
                                    <option value="44">UK (+44)</option>
                                    <option value="380">Ukraine (+380)</option>
                                    <option value="971">United Arab Emirates (+971)</option>
                                    <option value="598">Uruguay (+598)</option>
                                    <option value="1">USA (+1)</option>
                                    <option value="7">Uzbekistan (+7)</option>
                                    <option value="678">Vanuatu (+678)</option>
                                    <option value="379">Vatican City (+379)</option>
                                    <option value="58">Venezuela (+58)</option>
                                    <option value="84">Vietnam (+84)</option>
                                    <option value="84">Virgin Islands - British (+1284)</option>
                                    <option value="84">Virgin Islands - US (+1340)</option>
                                    <option value="681">Wallis &amp; Futuna (+681)</option>
                                    <option value="969">Yemen (North)(+969)</option>
                                    <option value="967">Yemen (South)(+967)</option>
                                    <option value="260">Zambia (+260)</option>
                                    <option value="263">Zimbabwe (+263)</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-5">
                                <input type="text" class="form-control" name="phone_value" placeholder="{{__('words.vcardPhonePlaceholder')}}" id="kt_inputmask_2" inputmode="text">
                            </div>
                        </div>
                        <!--end::Form group-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->

    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="whatsapp" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-450px" id="whatsapp">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Whatsapp</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf

                        <label class="form-label">Whatsapp</label>
                        <input type="hidden" name="contact_name" value="whatsapp">
                        <!--begin::Form group-->
                        <div class="row mb-3">
                            <div class="col-md-12 mb-5">
                                <select class="form-select" name="phone_contact" data-dropdown-parent="#whatsapp" data-control="select2" data-placeholder="{{__('words.vcardPhoneName')}}...">
                                    <option></option>
                                    <option value="213">Algeria (+213)</option>
                                    <option value="376">Andorra (+376)</option>
                                    <option value="244">Angola (+244)</option>
                                    <option value="1264">Anguilla (+1264)</option>
                                    <option value="1268">Antigua &amp; Barbuda (+1268)</option>
                                    <option value="54">Argentina (+54)</option>
                                    <option value="374">Armenia (+374)</option>
                                    <option value="297">Aruba (+297)</option>
                                    <option value="61">Australia (+61)</option>
                                    <option value="43">Austria (+43)</option>
                                    <option value="994">Azerbaijan (+994)</option>
                                    <option value="1242">Bahamas (+1242)</option>
                                    <option value="973">Bahrain (+973)</option>
                                    <option value="880">Bangladesh (+880)</option>
                                    <option value="1246">Barbados (+1246)</option>
                                    <option value="375">Belarus (+375)</option>
                                    <option value="32">Belgium (+32)</option>
                                    <option value="501">Belize (+501)</option>
                                    <option value="229">Benin (+229)</option>
                                    <option value="1441">Bermuda (+1441)</option>
                                    <option value="975">Bhutan (+975)</option>
                                    <option value="591">Bolivia (+591)</option>
                                    <option value="387">Bosnia Herzegovina (+387)</option>
                                    <option value="267">Botswana (+267)</option>
                                    <option value="55">Brazil (+55)</option>
                                    <option value="673">Brunei (+673)</option>
                                    <option value="359">Bulgaria (+359)</option>
                                    <option value="226">Burkina Faso (+226)</option>
                                    <option value="257">Burundi (+257)</option>
                                    <option value="855">Cambodia (+855)</option>
                                    <option value="237">Cameroon (+237)</option>
                                    <option value="1">Canada (+1)</option>
                                    <option value="238">Cape Verde Islands (+238)</option>
                                    <option value="1345">Cayman Islands (+1345)</option>
                                    <option value="236">Central African Republic (+236)</option>
                                    <option value="56">Chile (+56)</option>
                                    <option value="86">China (+86)</option>
                                    <option value="57">Colombia (+57)</option>
                                    <option value="269">Comoros (+269)</option>
                                    <option value="242">Congo (+242)</option>
                                    <option value="682">Cook Islands (+682)</option>
                                    <option value="506">Costa Rica (+506)</option>
                                    <option value="385">Croatia (+385)</option>
                                    <option value="53">Cuba (+53)</option>
                                    <option value="90392">Cyprus North (+90392)</option>
                                    <option value="357">Cyprus South (+357)</option>
                                    <option value="42">Czech Republic (+42)</option>
                                    <option value="45">Denmark (+45)</option>
                                    <option value="253">Djibouti (+253)</option>
                                    <option value="1809">Dominica (+1809)</option>
                                    <option value="1809">Dominican Republic (+1809)</option>
                                    <option value="593">Ecuador (+593)</option>
                                    <option value="20">Egypt (+20)</option>
                                    <option value="503">El Salvador (+503)</option>
                                    <option value="240">Equatorial Guinea (+240)</option>
                                    <option value="291">Eritrea (+291)</option>
                                    <option value="372">Estonia (+372)</option>
                                    <option value="251">Ethiopia (+251)</option>
                                    <option value="500">Falkland Islands (+500)</option>
                                    <option value="298">Faroe Islands (+298)</option>
                                    <option value="679">Fiji (+679)</option>
                                    <option value="358">Finland (+358)</option>
                                    <option value="33">France (+33)</option>
                                    <option value="594">French Guiana (+594)</option>
                                    <option value="689">French Polynesia (+689)</option>
                                    <option value="241">Gabon (+241)</option>
                                    <option value="220">Gambia (+220)</option>
                                    <option value="7880">Georgia (+7880)</option>
                                    <option value="49">Germany (+49)</option>
                                    <option value="233">Ghana (+233)</option>
                                    <option value="350">Gibraltar (+350)</option>
                                    <option value="30">Greece (+30)</option>
                                    <option value="299">Greenland (+299)</option>
                                    <option value="1473">Grenada (+1473)</option>
                                    <option value="590">Guadeloupe (+590)</option>
                                    <option value="671">Guam (+671)</option>
                                    <option value="502">Guatemala (+502)</option>
                                    <option value="224">Guinea (+224)</option>
                                    <option value="245">Guinea - Bissau (+245)</option>
                                    <option value="592">Guyana (+592)</option>
                                    <option value="509">Haiti (+509)</option>
                                    <option value="504">Honduras (+504)</option>
                                    <option value="852">Hong Kong (+852)</option>
                                    <option value="36">Hungary (+36)</option>
                                    <option value="354">Iceland (+354)</option>
                                    <option value="91">India (+91)</option>
                                    <option value="62">Indonesia (+62)</option>
                                    <option value="98">Iran (+98)</option>
                                    <option value="964">Iraq (+964)</option>
                                    <option value="353">Ireland (+353)</option>
                                    <option value="972">Israel (+972)</option>
                                    <option value="39">Italy (+39)</option>
                                    <option value="1876">Jamaica (+1876)</option>
                                    <option value="81">Japan (+81)</option>
                                    <option value="962">Jordan (+962)</option>
                                    <option value="7">Kazakhstan (+7)</option>
                                    <option value="254">Kenya (+254)</option>
                                    <option value="686">Kiribati (+686)</option>
                                    <option value="850">Korea North (+850)</option>
                                    <option value="82">Korea South (+82)</option>
                                    <option value="965">Kuwait (+965)</option>
                                    <option value="996">Kyrgyzstan (+996)</option>
                                    <option value="856">Laos (+856)</option>
                                    <option value="371">Latvia (+371)</option>
                                    <option value="961">Lebanon (+961)</option>
                                    <option value="266">Lesotho (+266)</option>
                                    <option value="231">Liberia (+231)</option>
                                    <option value="218">Libya (+218)</option>
                                    <option value="417">Liechtenstein (+417)</option>
                                    <option value="370">Lithuania (+370)</option>
                                    <option value="352">Luxembourg (+352)</option>
                                    <option value="853">Macao (+853)</option>
                                    <option value="389">Macedonia (+389)</option>
                                    <option value="261">Madagascar (+261)</option>
                                    <option value="265">Malawi (+265)</option>
                                    <option value="60">Malaysia (+60)</option>
                                    <option value="960">Maldives (+960)</option>
                                    <option value="223">Mali (+223)</option>
                                    <option value="356">Malta (+356)</option>
                                    <option value="692">Marshall Islands (+692)</option>
                                    <option value="596">Martinique (+596)</option>
                                    <option value="222">Mauritania (+222)</option>
                                    <option value="269">Mayotte (+269)</option>
                                    <option value="52">Mexico (+52)</option>
                                    <option value="691">Micronesia (+691)</option>
                                    <option value="373">Moldova (+373)</option>
                                    <option value="377">Monaco (+377)</option>
                                    <option value="976">Mongolia (+976)</option>
                                    <option value="1664">Montserrat (+1664)</option>
                                    <option value="212">Morocco (+212)</option>
                                    <option value="258">Mozambique (+258)</option>
                                    <option value="95">Myanmar (+95)</option>
                                    <option value="264">Namibia (+264)</option>
                                    <option value="674">Nauru (+674)</option>
                                    <option value="977">Nepal (+977)</option>
                                    <option value="31">Netherlands (+31)</option>
                                    <option value="687">New Caledonia (+687)</option>
                                    <option value="64">New Zealand (+64)</option>
                                    <option value="505">Nicaragua (+505)</option>
                                    <option value="227">Niger (+227)</option>
                                    <option value="234">Nigeria (+234)</option>
                                    <option value="683">Niue (+683)</option>
                                    <option value="672">Norfolk Islands (+672)</option>
                                    <option value="670">Northern Marianas (+670)</option>
                                    <option value="47">Norway (+47)</option>
                                    <option value="968">Oman (+968)</option>
                                    <option value="680">Palau (+680)</option>
                                    <option value="507">Panama (+507)</option>
                                    <option value="675">Papua New Guinea (+675)</option>
                                    <option value="595">Paraguay (+595)</option>
                                    <option value="51">Peru (+51)</option>
                                    <option value="63">Philippines (+63)</option>
                                    <option value="48">Poland (+48)</option>
                                    <option value="351">Portugal (+351)</option>
                                    <option value="1787">Puerto Rico (+1787)</option>
                                    <option value="974">Qatar (+974)</option>
                                    <option value="262">Reunion (+262)</option>
                                    <option value="40">Romania (+40)</option>
                                    <option value="7">Russia (+7)</option>
                                    <option value="250">Rwanda (+250)</option>
                                    <option value="378">San Marino (+378)</option>
                                    <option value="239">Sao Tome &amp; Principe (+239)</option>
                                    <option value="966">Saudi Arabia (+966)</option>
                                    <option value="221">Senegal (+221)</option>
                                    <option value="381">Serbia (+381)</option>
                                    <option value="248">Seychelles (+248)</option>
                                    <option value="232">Sierra Leone (+232)</option>
                                    <option value="65">Singapore (+65)</option>
                                    <option value="421">Slovak Republic (+421)</option>
                                    <option value="386">Slovenia (+386)</option>
                                    <option value="677">Solomon Islands (+677)</option>
                                    <option value="252">Somalia (+252)</option>
                                    <option value="27">South Africa (+27)</option>
                                    <option value="34">Spain (+34)</option>
                                    <option value="94">Sri Lanka (+94)</option>
                                    <option value="290">St. Helena (+290)</option>
                                    <option value="1869">St. Kitts (+1869)</option>
                                    <option value="1758">St. Lucia (+1758)</option>
                                    <option value="249">Sudan (+249)</option>
                                    <option value="597">Suriname (+597)</option>
                                    <option value="268">Swaziland (+268)</option>
                                    <option value="46">Sweden (+46)</option>
                                    <option value="41">Switzerland (+41)</option>
                                    <option value="963">Syria (+963)</option>
                                    <option value="886">Taiwan (+886)</option>
                                    <option value="7">Tajikstan (+7)</option>
                                    <option value="66">Thailand (+66)</option>
                                    <option value="228">Togo (+228)</option>
                                    <option value="676">Tonga (+676)</option>
                                    <option value="1868">Trinidad &amp; Tobago (+1868)</option>
                                    <option value="216">Tunisia (+216)</option>
                                    <option value="90">Turkey (+90)</option>
                                    <option value="7">Turkmenistan (+7)</option>
                                    <option value="993">Turkmenistan (+993)</option>
                                    <option value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                    <option value="688">Tuvalu (+688)</option>
                                    <option value="256">Uganda (+256)</option>
                                    <option value="44">UK (+44)</option>
                                    <option value="380">Ukraine (+380)</option>
                                    <option value="971">United Arab Emirates (+971)</option>
                                    <option value="598">Uruguay (+598)</option>
                                    <option value="1">USA (+1)</option>
                                    <option value="7">Uzbekistan (+7)</option>
                                    <option value="678">Vanuatu (+678)</option>
                                    <option value="379">Vatican City (+379)</option>
                                    <option value="58">Venezuela (+58)</option>
                                    <option value="84">Vietnam (+84)</option>
                                    <option value="84">Virgin Islands - British (+1284)</option>
                                    <option value="84">Virgin Islands - US (+1340)</option>
                                    <option value="681">Wallis &amp; Futuna (+681)</option>
                                    <option value="969">Yemen (North)(+969)</option>
                                    <option value="967">Yemen (South)(+967)</option>
                                    <option value="260">Zambia (+260)</option>
                                    <option value="263">Zimbabwe (+263)</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-5">
                                <input type="text" class="form-control" name="phone_value" placeholder="{{__('words.vcardPhonePlaceholder')}}" id="kt_inputmask_2" inputmode="text">
                            </div>
                        </div>
                        <!--end::Form group-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->

    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="viber" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-450px" id="viber">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Viber</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf

                        <label class="form-label">Viber</label>
                        <input type="hidden" name="contact_name" value="viber">
                        <!--begin::Form group-->
                        <div class="row mb-3">
                            <div class="col-md-12 mb-5">
                                <select class="form-select" name="phone_contact" data-dropdown-parent="#viber" data-control="select2" data-placeholder="{{__('words.vcardPhoneName')}}...">
                                    <option></option>
                                    <option value="213">Algeria (+213)</option>
                                    <option value="376">Andorra (+376)</option>
                                    <option value="244">Angola (+244)</option>
                                    <option value="1264">Anguilla (+1264)</option>
                                    <option value="1268">Antigua &amp; Barbuda (+1268)</option>
                                    <option value="54">Argentina (+54)</option>
                                    <option value="374">Armenia (+374)</option>
                                    <option value="297">Aruba (+297)</option>
                                    <option value="61">Australia (+61)</option>
                                    <option value="43">Austria (+43)</option>
                                    <option value="994">Azerbaijan (+994)</option>
                                    <option value="1242">Bahamas (+1242)</option>
                                    <option value="973">Bahrain (+973)</option>
                                    <option value="880">Bangladesh (+880)</option>
                                    <option value="1246">Barbados (+1246)</option>
                                    <option value="375">Belarus (+375)</option>
                                    <option value="32">Belgium (+32)</option>
                                    <option value="501">Belize (+501)</option>
                                    <option value="229">Benin (+229)</option>
                                    <option value="1441">Bermuda (+1441)</option>
                                    <option value="975">Bhutan (+975)</option>
                                    <option value="591">Bolivia (+591)</option>
                                    <option value="387">Bosnia Herzegovina (+387)</option>
                                    <option value="267">Botswana (+267)</option>
                                    <option value="55">Brazil (+55)</option>
                                    <option value="673">Brunei (+673)</option>
                                    <option value="359">Bulgaria (+359)</option>
                                    <option value="226">Burkina Faso (+226)</option>
                                    <option value="257">Burundi (+257)</option>
                                    <option value="855">Cambodia (+855)</option>
                                    <option value="237">Cameroon (+237)</option>
                                    <option value="1">Canada (+1)</option>
                                    <option value="238">Cape Verde Islands (+238)</option>
                                    <option value="1345">Cayman Islands (+1345)</option>
                                    <option value="236">Central African Republic (+236)</option>
                                    <option value="56">Chile (+56)</option>
                                    <option value="86">China (+86)</option>
                                    <option value="57">Colombia (+57)</option>
                                    <option value="269">Comoros (+269)</option>
                                    <option value="242">Congo (+242)</option>
                                    <option value="682">Cook Islands (+682)</option>
                                    <option value="506">Costa Rica (+506)</option>
                                    <option value="385">Croatia (+385)</option>
                                    <option value="53">Cuba (+53)</option>
                                    <option value="90392">Cyprus North (+90392)</option>
                                    <option value="357">Cyprus South (+357)</option>
                                    <option value="42">Czech Republic (+42)</option>
                                    <option value="45">Denmark (+45)</option>
                                    <option value="253">Djibouti (+253)</option>
                                    <option value="1809">Dominica (+1809)</option>
                                    <option value="1809">Dominican Republic (+1809)</option>
                                    <option value="593">Ecuador (+593)</option>
                                    <option value="20">Egypt (+20)</option>
                                    <option value="503">El Salvador (+503)</option>
                                    <option value="240">Equatorial Guinea (+240)</option>
                                    <option value="291">Eritrea (+291)</option>
                                    <option value="372">Estonia (+372)</option>
                                    <option value="251">Ethiopia (+251)</option>
                                    <option value="500">Falkland Islands (+500)</option>
                                    <option value="298">Faroe Islands (+298)</option>
                                    <option value="679">Fiji (+679)</option>
                                    <option value="358">Finland (+358)</option>
                                    <option value="33">France (+33)</option>
                                    <option value="594">French Guiana (+594)</option>
                                    <option value="689">French Polynesia (+689)</option>
                                    <option value="241">Gabon (+241)</option>
                                    <option value="220">Gambia (+220)</option>
                                    <option value="7880">Georgia (+7880)</option>
                                    <option value="49">Germany (+49)</option>
                                    <option value="233">Ghana (+233)</option>
                                    <option value="350">Gibraltar (+350)</option>
                                    <option value="30">Greece (+30)</option>
                                    <option value="299">Greenland (+299)</option>
                                    <option value="1473">Grenada (+1473)</option>
                                    <option value="590">Guadeloupe (+590)</option>
                                    <option value="671">Guam (+671)</option>
                                    <option value="502">Guatemala (+502)</option>
                                    <option value="224">Guinea (+224)</option>
                                    <option value="245">Guinea - Bissau (+245)</option>
                                    <option value="592">Guyana (+592)</option>
                                    <option value="509">Haiti (+509)</option>
                                    <option value="504">Honduras (+504)</option>
                                    <option value="852">Hong Kong (+852)</option>
                                    <option value="36">Hungary (+36)</option>
                                    <option value="354">Iceland (+354)</option>
                                    <option value="91">India (+91)</option>
                                    <option value="62">Indonesia (+62)</option>
                                    <option value="98">Iran (+98)</option>
                                    <option value="964">Iraq (+964)</option>
                                    <option value="353">Ireland (+353)</option>
                                    <option value="972">Israel (+972)</option>
                                    <option value="39">Italy (+39)</option>
                                    <option value="1876">Jamaica (+1876)</option>
                                    <option value="81">Japan (+81)</option>
                                    <option value="962">Jordan (+962)</option>
                                    <option value="7">Kazakhstan (+7)</option>
                                    <option value="254">Kenya (+254)</option>
                                    <option value="686">Kiribati (+686)</option>
                                    <option value="850">Korea North (+850)</option>
                                    <option value="82">Korea South (+82)</option>
                                    <option value="965">Kuwait (+965)</option>
                                    <option value="996">Kyrgyzstan (+996)</option>
                                    <option value="856">Laos (+856)</option>
                                    <option value="371">Latvia (+371)</option>
                                    <option value="961">Lebanon (+961)</option>
                                    <option value="266">Lesotho (+266)</option>
                                    <option value="231">Liberia (+231)</option>
                                    <option value="218">Libya (+218)</option>
                                    <option value="417">Liechtenstein (+417)</option>
                                    <option value="370">Lithuania (+370)</option>
                                    <option value="352">Luxembourg (+352)</option>
                                    <option value="853">Macao (+853)</option>
                                    <option value="389">Macedonia (+389)</option>
                                    <option value="261">Madagascar (+261)</option>
                                    <option value="265">Malawi (+265)</option>
                                    <option value="60">Malaysia (+60)</option>
                                    <option value="960">Maldives (+960)</option>
                                    <option value="223">Mali (+223)</option>
                                    <option value="356">Malta (+356)</option>
                                    <option value="692">Marshall Islands (+692)</option>
                                    <option value="596">Martinique (+596)</option>
                                    <option value="222">Mauritania (+222)</option>
                                    <option value="269">Mayotte (+269)</option>
                                    <option value="52">Mexico (+52)</option>
                                    <option value="691">Micronesia (+691)</option>
                                    <option value="373">Moldova (+373)</option>
                                    <option value="377">Monaco (+377)</option>
                                    <option value="976">Mongolia (+976)</option>
                                    <option value="1664">Montserrat (+1664)</option>
                                    <option value="212">Morocco (+212)</option>
                                    <option value="258">Mozambique (+258)</option>
                                    <option value="95">Myanmar (+95)</option>
                                    <option value="264">Namibia (+264)</option>
                                    <option value="674">Nauru (+674)</option>
                                    <option value="977">Nepal (+977)</option>
                                    <option value="31">Netherlands (+31)</option>
                                    <option value="687">New Caledonia (+687)</option>
                                    <option value="64">New Zealand (+64)</option>
                                    <option value="505">Nicaragua (+505)</option>
                                    <option value="227">Niger (+227)</option>
                                    <option value="234">Nigeria (+234)</option>
                                    <option value="683">Niue (+683)</option>
                                    <option value="672">Norfolk Islands (+672)</option>
                                    <option value="670">Northern Marianas (+670)</option>
                                    <option value="47">Norway (+47)</option>
                                    <option value="968">Oman (+968)</option>
                                    <option value="680">Palau (+680)</option>
                                    <option value="507">Panama (+507)</option>
                                    <option value="675">Papua New Guinea (+675)</option>
                                    <option value="595">Paraguay (+595)</option>
                                    <option value="51">Peru (+51)</option>
                                    <option value="63">Philippines (+63)</option>
                                    <option value="48">Poland (+48)</option>
                                    <option value="351">Portugal (+351)</option>
                                    <option value="1787">Puerto Rico (+1787)</option>
                                    <option value="974">Qatar (+974)</option>
                                    <option value="262">Reunion (+262)</option>
                                    <option value="40">Romania (+40)</option>
                                    <option value="7">Russia (+7)</option>
                                    <option value="250">Rwanda (+250)</option>
                                    <option value="378">San Marino (+378)</option>
                                    <option value="239">Sao Tome &amp; Principe (+239)</option>
                                    <option value="966">Saudi Arabia (+966)</option>
                                    <option value="221">Senegal (+221)</option>
                                    <option value="381">Serbia (+381)</option>
                                    <option value="248">Seychelles (+248)</option>
                                    <option value="232">Sierra Leone (+232)</option>
                                    <option value="65">Singapore (+65)</option>
                                    <option value="421">Slovak Republic (+421)</option>
                                    <option value="386">Slovenia (+386)</option>
                                    <option value="677">Solomon Islands (+677)</option>
                                    <option value="252">Somalia (+252)</option>
                                    <option value="27">South Africa (+27)</option>
                                    <option value="34">Spain (+34)</option>
                                    <option value="94">Sri Lanka (+94)</option>
                                    <option value="290">St. Helena (+290)</option>
                                    <option value="1869">St. Kitts (+1869)</option>
                                    <option value="1758">St. Lucia (+1758)</option>
                                    <option value="249">Sudan (+249)</option>
                                    <option value="597">Suriname (+597)</option>
                                    <option value="268">Swaziland (+268)</option>
                                    <option value="46">Sweden (+46)</option>
                                    <option value="41">Switzerland (+41)</option>
                                    <option value="963">Syria (+963)</option>
                                    <option value="886">Taiwan (+886)</option>
                                    <option value="7">Tajikstan (+7)</option>
                                    <option value="66">Thailand (+66)</option>
                                    <option value="228">Togo (+228)</option>
                                    <option value="676">Tonga (+676)</option>
                                    <option value="1868">Trinidad &amp; Tobago (+1868)</option>
                                    <option value="216">Tunisia (+216)</option>
                                    <option value="90">Turkey (+90)</option>
                                    <option value="7">Turkmenistan (+7)</option>
                                    <option value="993">Turkmenistan (+993)</option>
                                    <option value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                    <option value="688">Tuvalu (+688)</option>
                                    <option value="256">Uganda (+256)</option>
                                    <option value="44">UK (+44)</option>
                                    <option value="380">Ukraine (+380)</option>
                                    <option value="971">United Arab Emirates (+971)</option>
                                    <option value="598">Uruguay (+598)</option>
                                    <option value="1">USA (+1)</option>
                                    <option value="7">Uzbekistan (+7)</option>
                                    <option value="678">Vanuatu (+678)</option>
                                    <option value="379">Vatican City (+379)</option>
                                    <option value="58">Venezuela (+58)</option>
                                    <option value="84">Vietnam (+84)</option>
                                    <option value="84">Virgin Islands - British (+1284)</option>
                                    <option value="84">Virgin Islands - US (+1340)</option>
                                    <option value="681">Wallis &amp; Futuna (+681)</option>
                                    <option value="969">Yemen (North)(+969)</option>
                                    <option value="967">Yemen (South)(+967)</option>
                                    <option value="260">Zambia (+260)</option>
                                    <option value="263">Zimbabwe (+263)</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-5">
                                <input type="text" class="form-control" name="phone_value" placeholder="{{__('words.vcardPhonePlaceholder')}}" id="kt_inputmask_2" inputmode="text">
                            </div>
                        </div>
                        <!--end::Form group-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->

    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="email" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-450px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>{{__('words.vcardEmail')}}</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">{{__('words.vcardEmail')}}</label>
                            <!--begin::Input-->
                            <input type="hidden" name="media_name" value="email">
                            <input type="email" class="form-control" name="media_link" placeholder="{{__('words.vcardEmailPlaceholder')}}" />
                            <!--end::Input-->
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->

    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="address" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-850px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>{{__('words.vcardAddress')}}</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-5 fw-semibold mb-2 ">
                                <span class="form-label">{{__('words.vcardCountry')}}</span>
                            </label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <input type="hidden" name="address" value="address">
                            <select name="country" data-control="select2" data-dropdown-parent="#address" data-placeholder="{{__('words.vcardSelecACountry')}}..."  class="form-select">
                                <option></option>
                                <option value='Afghanistan'>Afghanistan</option>
                                <option value='Aland Islands'>Aland Islands</option>
                                <option value='Albania'>Albania</option>
                                <option value='Algeria'>Algeria</option>
                                <option value='American Samoa'>American Samoa</option>
                                <option value='Andorra'>Andorra</option>
                                <option value='Angola'>Angola</option>
                                <option value='Anguilla'>Anguilla</option>
                                <option value='Antigua and Barbuda'>Antigua and Barbuda</option>
                                <option value='Argentina'>Argentina</option>
                                <option value='Armenia'>Armenia</option>
                                <option value='Aruba'>Aruba</option>
                                <option value='Australia'>Australia</option>
                                <option value='Austria'>Austria</option>
                                <option value='Azerbaijan'>Azerbaijan</option>
                                <option value='Bahamas'>Bahamas</option>
                                <option value='Bahrain'>Bahrain</option>
                                <option value='Bangladesh'>Bangladesh</option>
                                <option value='Barbados'>Barbados</option>
                                <option value='Belarus'>Belarus</option>
                                <option value='Belgium'>Belgium</option>
                                <option value='Belize'>Belize</option>
                                <option value='Benin'>Benin</option>
                                <option value='Bermuda'>Bermuda</option>
                                <option value='Bhutan'>Bhutan</option>
                                <option value='Bolivia Plurinational State of'>Bolivia Plurinational State of</option>
                                <option value='Bonaire Sint Eustatius and Saba'>Bonaire Sint Eustatius and Saba</option>
                                <option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option>
                                <option value='Botswana'>Botswana</option>
                                <option value='Brazil'>Brazil</option>
                                <option value='British Indian Ocean Territory'>British Indian Ocean Territory</option>
                                <option value='Brunei Darussalam'>Brunei Darussalam</option>
                                <option value='Bulgaria'>Bulgaria</option>
                                <option value='Burkina Faso'>Burkina Faso</option>
                                <option value='Burundi'>Burundi</option>
                                <option value='Cambodia'>Cambodia</option>
                                <option value='Cameroon'>Cameroon</option>
                                <option value='Canada'>Canada</option>
                                <option value='Cape Verde'>Cape Verde</option>
                                <option value='Cayman Islands'>Cayman Islands</option>
                                <option value='Central African Republic'>Central African Republic</option>
                                <option value='Chad'>Chad</option>
                                <option value='Chile'>Chile</option>
                                <option value='China'>China</option>
                                <option value='Christmas Island'>Christmas Island</option>
                                <option value='Cocos Keeling Islands'>Cocos Keeling Islands</option>
                                <option value='Colombia'>Colombia</option>
                                <option value='Comoros'>Comoros</option>
                                <option value='Cook Islands'>Cook Islands</option>
                                <option value='Costa Rica'>Costa Rica</option>
                                <option value='Côte d Ivoire'>Côte d Ivoire</option>
                                <option value='Croatia'>Croatia</option>
                                <option value='Cuba'>Cuba</option>
                                <option value='Curaçao'>Curaçao</option>
                                <option value='Czech Republic'>Czech Republic</option>
                                <option value='Denmark'>Denmark</option>
                                <option value='Djibouti'>Djibouti</option>
                                <option value='Dominica'>Dominica</option>
                                <option value='Dominican Republic'>Dominican Republic</option>
                                <option value='Ecuador'>Ecuador</option>
                                <option value='Egypt'>Egypt</option>
                                <option value='El Salvador'>El Salvador</option>
                                <option value='Equatorial Guinea'>Equatorial Guinea</option>
                                <option value='Eritrea'>Eritrea</option>
                                <option value='Estonia'>Estonia</option>
                                <option value='Ethiopia'>Ethiopia</option>
                                <option value='Falkland Islands Malvinas'>Falkland Islands Malvinas</option>
                                <option value='Fiji'>Fiji</option>
                                <option value='Finland'>Finland</option>
                                <option value='France'>France</option>
                                <option value='French Polynesia'>French Polynesia</option>
                                <option value='Gabon'>Gabon</option>
                                <option value='Gambia'>Gambia</option>
                                <option value='Georgia'>Georgia</option>
                                <option value='Germany'>Germany</option>
                                <option value='Ghana'>Ghana</option>
                                <option value='Gibraltar'>Gibraltar</option>
                                <option value='Greece'>Greece</option>
                                <option value='Greenland'>Greenland</option>
                                <option value='Grenada'>Grenada</option>
                                <option value='Guam'>Guam</option>
                                <option value='Guatemala'>Guatemala</option>
                                <option value='Guernsey'>Guernsey</option>
                                <option value='Guinea'>Guinea</option>
                                <option value='Guinea-Bissau'>Guinea-Bissau</option>
                                <option value='Haiti'>Haiti</option>
                                <option value='Holy See Vatican City State'>Holy See Vatican City State</option>
                                <option value='Honduras'>Honduras</option>
                                <option value='Hong Kong'>Hong Kong</option>
                                <option value='Hungary'>Hungary</option>
                                <option value='Iceland'>Iceland</option>
                                <option value='India'>India</option>
                                <option value='Indonesia'>Indonesia</option>
                                <option value='Iran Islamic Republic of'>Iran Islamic Republic of</option>
                                <option value='Iraq'>Iraq</option>
                                <option value='Ireland'>Ireland</option>
                                <option value='Isle of Man'>Isle of Man</option>
                                <option value='Israel'>Israel</option>
                                <option value='Italy'>Italy</option>
                                <option value='Jamaica'>Jamaica</option>
                                <option value='Japan'>Japan</option>
                                <option value='Jersey'>Jersey</option>
                                <option value='Jordan'>Jordan</option>
                                <option value='Kazakhstan'>Kazakhstan</option>
                                <option value='Kenya'>Kenya</option>
                                <option value='Kiribati'>Kiribati</option>
                                <option value='Korea Democratic People s Republic of'>Korea Democratic People s Republic of
                                <option value='Kuwait'>Kuwait</option>
                                <option value='Kyrgyzstan'>Kyrgyzstan</option>
                                <option value='Lao People s Democratic Republic'>Lao People s Democratic Republic</option>
                                <option value='Latvia'>Latvia</option>
                                <option value='Lebanon'>Lebanon</option>
                                <option value='Lesotho'>Lesotho</option>
                                <option value='Liberia'>Liberia</option>
                                <option value='Libya'>Libya</option>
                                <option value='Liechtenstein'>Liechtenstein</option>
                                <option value='Lithuania'>Lithuania</option>
                                <option value='Luxembourg'>Luxembourg</option>
                                <option value='Macao'>Macao</option>
                                <option value='Madagascar'>Madagascar</option>
                                <option value='Malawi'>Malawi</option>
                                <option value='Malaysia'>Malaysia</option>
                                <option value='Maldives'>Maldives</option>
                                <option value='Mali'>Mali</option>
                                <option value='Malta'>Malta</option>
                                <option value='Marshall Islands'>Marshall Islands</option>
                                <option value='Martinique'>Martinique</option>
                                <option value='Mauritania'>Mauritania</option>
                                <option value='Mauritius'>Mauritius</option>
                                <option value='Mexico'>Mexico</option>
                                <option value='Micronesia Federated States of'>Micronesia Federated States of</option>
                                <option value='Moldova Republic of'>Moldova Republic of</option>
                                <option value='Monaco'>Monaco</option>
                                <option value='Mongolia'>Mongolia</option>
                                <option value='Montenegro'>Montenegro</option>
                                <option value='Montserrat'>Montserrat</option>
                                <option value='Morocco'>Morocco</option>
                                <option value='Mozambique'>Mozambique</option>
                                <option value='Myanmar'>Myanmar</option>
                                <option value='Namibia'>Namibia</option>
                                <option value='Nauru'>Nauru</option>
                                <option value='Nepal'>Nepal</option>
                                <option value='Netherlands'>Netherlands</option>
                                <option value='New Zealand'>New Zealand</option>
                                <option value='Nicaragua'>Nicaragua</option>
                                <option value='Niger'>Niger</option>
                                <option value='Nigeria'>Nigeria</option>
                                <option value='Niue'>Niue</option>
                                <option value='Norfolk Island'>Norfolk Island</option>
                                <option value='Northern Mariana Islands'>Northern Mariana Islands</option>
                                <option value='Norway'>Norway</option>
                                <option value='Oman'>Oman</option>
                                <option value='Pakistan'>Pakistan</option>
                                <option value='Palau'>Palau</option>
                                <option value='Palestinian Territory Occupied'>Palestinian Territory Occupied</option>
                                <option value='Panama'>Panama</option>
                                <option value='Papua New Guinea'>Papua New Guinea</option>
                                <option value='Paraguay'>Paraguay</option>
                                <option value='Peru'>Peru</option>
                                <option value='Philippines'>Philippines</option>
                                <option value='Poland'>Poland</option>
                                <option value='Portugal'>Portugal</option>
                                <option value='Puerto Rico'>Puerto Rico</option>
                                <option value='Qatar'>Qatar</option>
                                <option value='Romania'>Romania</option>
                                <option value='Russian Federation'>Russian Federation</option>
                                <option value='Rwanda'>Rwanda</option>
                                <option value='Saint Barthélemy'>Saint Barthélemy</option>
                                <option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option>
                                <option value='Saint Lucia'>Saint Lucia</option>
                                <option value='Saint Martin French part'>Saint Martin French part</option>
                                <option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option>
                                <option value='Samoa'>Samoa</option>
                                <option value='San Marino'>San Marino</option>
                                <option value='Sao Tome and Principe'>Sao Tome and Principe</option>
                                <option value='Saudi Arabia'>Saudi Arabia</option>
                                <option value='Senegal'>Senegal</option>
                                <option value='Serbia'>Serbia</option>
                                <option value='Seychelles'>Seychelles</option>
                                <option value='Sierra Leone'>Sierra Leone</option>
                                <option value='Singapore'>Singapore</option>
                                <option value='Sint Maarten Dutch part'>Sint Maarten Dutch part</option>
                                <option value='Slovakia'>Slovakia</option>
                                <option value='Slovenia'>Slovenia</option>
                                <option value='Solomon Islands'>Solomon Islands</option>
                                <option value='Somalia'>Somalia</option>
                                <option value='South Africa'>South Africa</option>
                                <option value='South Korea'>South Korea</option>
                                <option value='South Sudan'>South Sudan</option>
                                <option value='Spain'>Spain</option>
                                <option value='Sri Lanka'>Sri Lanka</option>
                                <option value='Sudan'>Sudan</option>
                                <option value='Suriname'>Suriname</option>
                                <option value='Swaziland'>Swaziland</option>
                                <option value='Sweden'>Sweden</option>
                                <option value='Switzerland'>Switzerland</option>
                                <option value='Syrian Arab Republic'>Syrian Arab Republic</option>
                                <option value='Taiwan Province of China'>Taiwan Province of China</option>
                                <option value='Tajikistan'>Tajikistan</option>
                                <option value='Tanzania United Republic of'>Tanzania United Republic of</option>
                                <option value='Thailand'>Thailand</option>
                                <option value='Togo'>Togo</option>
                                <option value='Tokelau'>Tokelau</option>
                                <option value='Tonga'>Tonga</option>
                                <option value='Trinidad and Tobago'>Trinidad and Tobago</option>
                                <option value='Tunisia'>Tunisia</option>
                                <option value='Turkey'>Turkey</option>
                                <option value='Turkmenistan'>Turkmenistan</option>
                                <option value='Turks and Caicos Islands'>Turks and Caicos Islands</option>
                                <option value='Tuvalu'>Tuvalu</option>
                                <option value='Uganda'>Uganda</option>
                                <option value='Ukraine'>Ukraine</option>
                                <option value='United Arab Emirates'>United Arab Emirates</option>
                                <option value='United Kingdom'>United Kingdom</option>
                                <option value='United States'>United States</option>
                                <option value='Uruguay'>Uruguay</option>
                                <option value='Uzbekistan'>Uzbekistan</option>
                                <option value='Vanuatu'>Vanuatu</option>
                                <option value='Venezuela Bolivarian Republic of'>Venezuela Bolivarian Republic of</option>
                                <option value='Vietnam'>Vietnam</option>
                                <option value='Virgin Islands'>Virgin Islands</option>
                                <option value='Yemen'>Yemen</option>
                                <option value='Zambia'>Zambia</option>
                                <option value='Zimbabwe'>Zimbabwe</option>
                            </select>
                            <!--end::Select-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row g-9 mb-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2 form-label">{{__('words.vcardState')}}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control" placeholder="{{__('words.vcardStatePlaceholder')}}" name="state" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="fs-5 fw-semibold mb-2 form-label">{{__('words.vcardDistrictAndHometown')}} </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control" placeholder="{{__('words.vcardDistrictAndHometownPlaceholder')}}" name="districtanhometown" />
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2 form-label">{{__('words.vcardAddressLine1')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" placeholder="{{__('words.vcardAddressLine1Placeholder')}}" name="address1" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-5 fv-row">
                            <!--begin::Label-->
                            <label class=" fs-5 fw-semibold mb-2 form-label">{{__('words.vcardAddressLine2')}}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control" placeholder="{{__('words.vcardAddressLine2Placeholder')}}" name="address2" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->

    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="webSitesi" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-450px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>{{__('words.vcardWebsite')}}</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                <form action="{{route('vcard.update', $vcards->slug)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{__('words.vcardWebsite')}}</label>
                        <!--begin::Input-->
                        <input type="hidden" name="media_name" value="webSitesi">
                        <input type="text" class="form-control" name="media_link" placeholder="{{__('words.vcardWebsitePlaceholder')}}" />
                    </div>
                    <!--end::Input-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-stack pt-2">
                        <!--begin::Wrapper-->
                        <div>
                            <button type="submit" class="btn btn-lg btn-primary">
                                <span class="indicator-label">{{__('words.vcardSave')}}
                                <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                            </button>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Actions-->
                </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->

    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="googleDrive" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Google Drive</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Google Drive</label>
                    <div class="input-group mb-5">
                        <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="media_name" value="google-drive">
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">drive.google.com/</span>
                                <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3"/>
                            </div>
                            <!--begin::Actions-->
                            <div class="d-flex flex-stack pt-2">
                                <!--begin::Wrapper-->
                                <div>
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <span class="indicator-label">{{__('words.vcardSave')}}
                                        <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                    </button>
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Actions-->
                        </form>
                    </div>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->

    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="not" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-750px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Not</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <!--begin::Input group-->
                    <div class="mb-5 fv-row">
                    <form action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf

                        <!--begin::Label-->
                        <label class=" form-label">{{__('words.vcardAboutUsTitle')}}</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input type="text" name="title" class="form-control" placeholder="{{__('words.vcardTitlePlaceholder')}}" value="" />
                        <!--end::Input-->

                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div>
                        <!--begin::Label-->
                        <label class="form-label">{{__('words.vcardAboutUsDescription')}}</label>
                        <!--end::Label-->

                        <!--begin::Description-->
                        <!--begin::Input-->
                        <textarea class="form-control h-150px mb-5" name="description" placeholder="{{__('words.vcardDescriptionPlaceholder')}}"></textarea>
                        <!--end::Input-->
                        <!--end::Description-->

                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="d-flex flex-stack pt-2">
                        <!--begin::Wrapper-->
                        <div>
                            <button type="submit" class="btn btn-lg btn-primary">
                                <span class="indicator-label">{{__('words.vcardSave')}}
                                <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                            </button>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Actions-->
                </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
</div>

{{-- Social Media Moderls --}}
<div>
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="facebook" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Facebook</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Facebook</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="facebook">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">facebook.com/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="instagram" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Instagram</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Instagram</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="instagram">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">instagram.com/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="snapchat" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Snapchat</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Snapchat</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="snapchat">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">snapchat.com/add/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="youtube" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>YouTube</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">YouTube</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="youtube">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">youtube.com/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3"  placeholder="{{'@' . __('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="twitter" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Twitter</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Twitter</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="twitter">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">twitter.com/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="tiktok" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>TikTok</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">TikTok</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="tiktok">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">tiktok.com/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{'@' . __('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="telegram" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Telegram</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Telegram</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="telegram">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">telegram.me/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="discord" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Discord</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Discord</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="discord">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">@</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="reddit" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Reddit</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Reddit</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="reddit">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">reddit.com/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="pinterest" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Pinterest</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Pinterest</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="pinterest">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">pinterest.com/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="twitch" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Twitch</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Twitch</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="twitch">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">twitch.tv/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
    <!--begin::phoneModal - Offer A Deal-->
    <div class="modal fade" id="skype" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Skype</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Skype</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="skype">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">join.skype.com/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>
    <!--end::phoneModal - Offer A Deal-->
</div>

{{-- Bank Moderls --}}
<div>

    <div class="modal fade" id="enpara" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Enpara</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="enpara">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="ziraat" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Ziraat Bankası</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="ziraat">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="garanti" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Garanti Bankası</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="garanti">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="yapikredi" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Yapı Kredi Bankası</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="garanti">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="halk" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Halk Bankası</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="halk">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="papara" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Papara</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="papara">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_iban" placeholder="{{__('words.vcardBankIban')}}" />
                            <!--end::Input-->
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="vakif" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Vakif Bankası</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="vakif">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="deniz" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Deniz Bankası</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="deniz">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="akbank" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Akbank</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="akbank">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="is" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>İş Banksaı</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="is">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="paypal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Paypal</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="paypal">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="BankIban" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Bank Iban</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="BankIban">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="albaraka" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Albaraka</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="albaraka">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="kuveyt" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Kuveyt Türk</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="kuveyt">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="qnb" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>QNB Finans Bankası</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="qnb">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="ing" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>IMG Bankası</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="ing">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="hsbc" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>HSBC</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="hsbc">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="teb" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>TEB</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="teb">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="fibabanka" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Fibabanka</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="fibabanka">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="emlak" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Emlak Katılım Bankası</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="emlak">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="vakifkatilim" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Vakıf Katılım</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="vakifkatilim">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="sekerbank" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Şekerbank</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="bank" value="sekerbank">
                        <div class="mb-5">
                            <label class="form-label">{{__('words.vcardBankName')}}</label>
                            <!--begin::Input-->
                            <input type="text" class="form-control" name="bank_name" placeholder="{{__('words.vcardBankName')}}" />
                            <!--end::Input-->
                            
                            <label class="form-label mt-4">{{__('words.vcardBankIban')}}</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text" id="basic-addon3">TR</span>
                                <input type="text" class="form-control text-10px" name="bank_iban" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardBankIban')}}"/>
                            </div>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

</div>

{{-- Business Moderls --}}
<div>

    <div class="modal fade" id="behance" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Behance</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">

                    <label class="form-label">Behance</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="behance">
                        <div class="input-group mb-5">
                            <span class="input-group-text" id="basic-addon3">behance.net/</span>
                            <input type="text" class="form-control text-10px" name="media_link" id="basic-url" aria-describedby="basic-addon3" placeholder="{{__('words.vcardYourAccountLink')}}"/>
                        </div>
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="Sahibinden" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Sahibinden</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">

                    <label class="form-label">Sahibinden</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="sahibinden">
                        <!--begin::Input-->
                        <input type="text" class="form-control mb-5" name="media_link" placeholder="{{__('words.vcardWebsitePlaceholder')}}" />
                        <!--end::Input-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="googlePlay" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Google Play Store</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">
                    <label class="form-label">Google Play Store</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="googlePlay">
                        <!--begin::Input-->
                        <input type="text" class="form-control mb-5" name="media_link" placeholder="{{__('words.vcardWebsitePlaceholder')}}" />
                        <!--end::Input-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="appleStory" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Apple Store</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">

                    <label class="form-label">Apple Store</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="appleStory">
                        <!--begin::Input-->
                        <input type="text" class="form-control mb-5" name="media_link" placeholder="{{__('words.vcardWebsitePlaceholder')}}" />
                        <!--end::Input-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="amazon" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Amazon</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">

                    <label class="form-label">Amazon</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="amazon">
                        <!--begin::Input-->
                        <input type="text" class="form-control mb-5" name="media_link" placeholder="{{__('words.vcardWebsitePlaceholder')}}" />
                        <!--end::Input-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

    <div class="modal fade" id="linkedin" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Linkedin</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y m-5">

                    <label class="form-label">Linkedin</label>
                    <form class="w-100" action="{{route('vcard.update', $vcards->slug)}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="media_name" value="linkedin">
                        <!--begin::Input-->
                        <input type="text" class="form-control mb-5" name="media_link" placeholder="{{__('words.vcardWebsitePlaceholder')}}" />
                        <!--end::Input-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-2">
                            <!--begin::Wrapper-->
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    <span class="indicator-label">{{__('words.vcardSave')}}
                                    <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i></span>
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                </div>
                <!--begin::Modal body-->
            </div>
        </div>

    </div>

</div>



@endsection