@extends('admin.master')
@section('title', 'Thêm tài khoản')
@section('active_home', 'menu-item-active')
@section('name_page', 'Thêm tài khoản')
    {{-- @section('active', 'Trang thống kê')
@section('active_1', 'active')
@section('url', 'Trang thống kê') --}}
@section('main')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <!--begin::Title-->
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">New User</h5>
                    <!--end::Title-->
                    <!--begin::Separator-->
                    <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Search Form-->
                    <div class="d-flex align-items-center" id="kt_subheader_search">
                        <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">Enter user details and
                            submit</span>
                    </div>
                    <!--end::Search Form-->
                </div>
                <!--end::Details-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Button-->
                    <a href="{{route('user.index')}}" class="btn btn-default font-weight-bold btn-sm px-3 font-size-base">Back</a>
                    <!--end::Button-->
                    <!--begin::Dropdown-->
                    <div class="btn-group ml-2">
                        <button type="button"
                            class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base">Submit</button>
                        <button type="button"
                            class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base dropdown-toggle dropdown-toggle-split"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu dropdown-menu-sm p-0 m-0 dropdown-menu-right">
                            <ul class="navi py-5">
                                <li class="navi-item">
                                    <a href="{{route('user.store')}}" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="flaticon2-writing"></i>
                                        </span>
                                        <span class="navi-text">Save &amp; continue</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="flaticon2-medical-records"></i>
                                        </span>
                                        <span class="navi-text">Save &amp; add new</span>
                                    </a>
                                </li>
                                <li class="navi-item">
                                    <a href="#" class="navi-link">
                                        <span class="navi-icon">
                                            <i class="flaticon2-hourglass-1"></i>
                                        </span>
                                        <span class="navi-text">Save &amp; exit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end::Dropdown-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h5>Form</h5>--}}
                    </div>
                    <div class="card-body">
                        <form id="validation-form123" action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="name">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">First name</label>
                                            <input type="text" class="form-control" name="first_name" placeholder="first_name">
                                        </div>
                                        @error('first_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Last name</label>
                                            <input type="text" class="form-control" name="last_name"  placeholder="last_name">
                                        </div>
                                        @error('last_name')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">File</label>
                                            <div>
                                                <input type="file" class="validation-file form-control" name="images" onchange="preview_image(event)" accept="image/*">
                                            </div>
                                        </div>
                                        @error('images')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div>
                                                <img class="mr-auto" src="" style="width:250px;" id="output_image" />
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-6">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Gender</label>
                                            <select class="js-example-basic-single form-control" name="gender">
                                                <option value="1">Male</option>
                                                <option value="0">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Dirthday</label>
                                            <input type="text" class="form-control" name="birthday" placeholder="birthday">
                                        </div>
                                        @error('birthday')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Address</label>
                                            <input type="text" class="form-control" name="address" placeholder="address">
                                        </div>
                                        @error('address')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Email</label>
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="password">
                                        </div>
                                        @error('password')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label font-weight-bold">Status</label>
                                            <select class="js-example-basic-single form-control" name="is_active">
                                                <option value="1">Activate</option>
                                                <option value="0">Deactivate</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn  btn-primary">Submit</button>
                                        <a href="{{route('user.index')}}" class="btn btn-warning">Back</a>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        <!--end::Entry-->
    </div>

@endsection
@section('script')
<script>
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
