@extends('layouts.main')
@section('main')
{{-- {{dd($cards->toArray());}} --}}

@if($cards && count($cards) > 0)
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">

                <!--begin::Row-->
                <div class="row g-6 mb-6 g-xl-9 mb-xl-9">

                    <!--begin::Followers-->
                        @foreach($cards as $card)
                            <!--begin::Col-->
                            <div class="col-md-6 col-xxl-4">
                                <!--begin::Card-->
                                <div class="card">
                                    <!--begin::Card body-->
                                    <div class="card-body d-flex flex-center flex-column py-9 px-5">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-150px symbol-circle mb-5">
                                            <img src="{{url('storage/images/vcard/' . $card->image)}}" alt="image" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Name-->
                                        <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-5">{{$card->name}}</a>
                                        <!--end::Name-->

                                        <a href="{{route('vcard.show', ['vcard' => $card['slug']])}}" class="btn btn-sm btn-light-primary btn-flex btn-center">
                                            <!--begin::Indicator label-->
                                            <span class="indicator-label">{{__('words.reviewVcard')}}</span>
                                            <!--end::Indicator label-->
                                        </a>

                                    </div>
                                    <!--begin::Card body-->
                                </div>
                                <!--begin::Card-->
                            </div>
                            <!--end::Col-->
                        @endforeach
                    <!--end::Followers-->

                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

</div>
<!--end:::Main-->
@else
@auth
<!--begin::Content-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
    <!--begin::Content container-->
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Heading-->
                <div class="card-px text-center pt-15 pb-15">
                    <!--begin::Title-->
                    <h2 class="fs-2x fw-bold mb-0">{{__('words.NewVcardTitle')}}</h2>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <p class="text-gray-400 fs-4 fw-semibold py-7">{{__('words.NewVcardDescription')}}</p>
                    <!--end::Description-->
                    <!--begin::Illustration-->
                    <div class="text-center pb-15 px-5">
                        <img src="assets/media/illustrations/sigma-1/4.png" alt="" class="mw-100 h-200px h-sm-325px" />
                    </div>
                    <!--end::Illustration-->
                    <!--begin::Action-->
                    <a href="{{route('vcard.create')}}" class="btn btn-primary er fs-6 px-8 py-4" >{{__('words.AddNewVcard')}}</a>
                    <!--end::Action-->
                </div>
                <!--end::Heading-->

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->
@else
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">

                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Heading-->
                        <div class="card-px text-center pt-15 pb-15">
                            <!--begin::Title-->
                            <h2 class="fs-2x fw-bold mb-0">{{__('words.NoVcardTotoDisplay')}}</h2>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Illustration-->
                        <div class="text-center pb-15 px-5">
                            <img src="assets/media/illustrations/sigma-1/21.png" alt="" class="mw-100 h-200px h-sm-325px" />
                        </div>
                        <!--end::Illustration-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->

    </div>
    <!--end::Content wrapper-->
</div>
<!--end:::Main-->
@endauth
@endif



@endsection