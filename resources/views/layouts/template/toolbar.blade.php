<!--begin::Toolbar-->
<div class="toolbar py-5 pb-lg-15" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">
            <!--begin::Title-->
            <h1 class="d-flex text-white fw-bold my-1 fs-3">{{__('words.dashboardVCardPlus')}}</h1>
            <!--end::Title-->
        </div>
        <!--end::Page title-->

        <!--begin::Actions-->
        <div class="d-flex align-items-center py-3 py-md-1">
            <!--begin::Button-->
            @auth
                @if(Route::is('vcard.show'))
                    <a href="{{route('vcard.edit', $cards->slug)}}" data-bs-theme="light" class="btn bg-body btn-active-color-primary" >{{__('words.vcardEdit')}}</a>
                    @if(Auth::user()-> role == 1)
                    <form class="app-navbar flex-shrink-0 ms-4" action="{{ route('vcard.destroy', $cards->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="vcard" value="vcard"/>
                        <button type="submit" name="Delete" data-bs-theme="light" class="btn bg-body btn-active-color-primary" >{{__('words.vcardRemov')}}</button>
                    </form>
                    @endif
                @endif
            @endauth

            @if(Route::is('vcard.index') && Auth::check() && Auth::user()-> role == 1)
                <button type="submit" name="Delete" data-bs-theme="light" class="btn bg-body btn-active-color-primary" >
                    <a href="{{route('vcard.create')}}">{{__('words.AddNewVcard')}}</a>
                </button>
            @endif

            @if(Route::is('vcard.edit'))
            <button onclick="myFunction()" type="submit" data-bs-theme="light" class="btn bg-body btn-active-color-primary" >{{__('words.vcardSave')}}</button>
            @endif

            @if(!Auth::check())
            <button data-bs-theme="light" class="btn bg-body btn-active-color-primary me-3" ><a class="text-gray-900" href="{{route('login')}}">{{__('auth.Login')}}</a></button>

            <button data-bs-theme="light" class="btn bg-body btn-active-color-primary" ><a class="text-gray-900" href="{{route('register')}}">{{__('auth.SignUp')}}</a></button>
            @endif



            <!--end::Button-->
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->