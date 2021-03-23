<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Style CSS -->
    @include('admin._share.style')

</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::HeaderMobile-->
    @include('admin._share.header_mobile')
    <!--end::HeaderMobile-->

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Siderbar-->
            @include('admin._share.sidebar')
            <!--end::Siderbar-->

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                <!--begin::Header Menu-->
                @include('admin._share.header_menu')
                <!--end::Header Menu-->

                <!--begin::Content-->
                @include('admin._share.content')
                <!--end::Content-->

                <!--begin::Footer-->
                @include('admin._share.footer')
                <!--end::Footer-->

            </div>
            <!--end::Wrapper-->

        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

    <!--begin::User Panel Sidebar-->
        @include('admin._share.user_sidebar')
    <!--end::User Panel Sidebar-->

    <!--begin::Extentions-->
    @include('admin._share.extensions')
    <!--end::Extentions-->

    <!--begin::Chat Panel-->
    @include('admin._share.chat_panel')
    <!--end::Chat Panel-->


    <!-- JS -->
    @include('admin._share.script')
    @yield('script')
</body>
</html>
