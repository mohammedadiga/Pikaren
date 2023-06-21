@extends('layouts.main')
@section('main')

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

        <form action="{{route('vcard.store')}}" method="post" enctype="multipart/form-data">
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
                                        <style>.image-input-placeholder { background-image: url('../assets/media/svg/files/blank-image.svg'); } [data-bs-theme="dark"] .image-input-placeholder { background-image: url('../assets/media/svg/files/blank-image-dark.svg'); }</style>
                                        <!--end::Image input placeholder-->
                                        <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-150px h-150px w-lg-250px h-lg-250px"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-30px h-30px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{__('words.changeImage')}}">
                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg" />
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
                    <div class="col-xl-8">
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
                                    <input type="text" name="name" class="form-control mb-2" placeholder="{{__('words.vcardNamePlaceholder')}}" value="" />
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
                                    <input type="text" name="company_name" class="form-control mb-2" placeholder="{{__('words.vcardcompanyNamePlaceholder')}}" value="" />
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
                                    <input type="text" name="company_work" class="form-control mb-2" placeholder="{{__('words.vcardcompanyWorkPlaceholder')}}" value="" />
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
                </div>
                <!--end::Row-->

                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <a href="{{route('vcard.index')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">{{__('words.vcardCancel')}}</a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">{{__('words.vcardSave')}}</span>
                    </button>
                    <!--end::Button-->
                </div>
        </form>

        
    </div>
    <!--end::Post-->
</div>
<!--end::Container-->

@endsection