@include('layouts.header')
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

					<!--begin::navbar-->
                    @include('layouts.template.navbar')
					<!--end::navbar-->

					<!--begin::navbar-->
                    @include('layouts.template.toolbar')
					<!--end::navbar-->

                    @yield('main')

					<!--begin::footer-->
                    @include('layouts.template.footer')
                    <!--end::footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
@include('layouts.model')
@include('layouts.footer')