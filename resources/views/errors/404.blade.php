<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Not Found</title>

    @include('admin._share.style')

    <link href="{{ asset('assets/css/pages/error/error.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Error-->
            <div class="error error-5 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(assets/media/error/bg5.jpg);">
                <!--begin::Content-->
                <div class="container d-flex flex-row-fluid flex-column justify-content-md-center p-12">
                    <h1 class="error-title font-weight-boldest text-info mt-10 mt-md-0 mb-12">Oops!</h1>
                    <p class="font-weight-boldest display-4">Đã xảy ra lỗi ở đây.</p>
                    <p class="font-size-h3">Chúng tôi đang nghiên cứu và sẽ sớm khắc phục sự cố. Bạn có thể quay lại hoặc sử dụng Trung tâm trợ giúp của chúng tôi.</p>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Error-->
        </div>
    </body>
    <!--end::Body-->
</body>
</html>
