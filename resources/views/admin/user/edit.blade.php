@extends('admin.master')
@section('title',"Sua tai khoan")
@section('active_home', 'menu-item-active')
@section('name_page', 'Sua tai khoan')

@section('main')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            {{-- <h5>Form</h5>--}}
        </div>
        <div class="card-body">
            <form id="validation-form123" action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Name">
                            </div>
                            @error('first_name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">First name</label>
                                <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}" placeholder="First name">
                            </div>
                            @error('first_name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Last name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last name" value="{{$user->last_name}}">
                            </div>
                            @error('last_name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Avatar</label>
                                <div>
                                    <input type="file" class="validation-file form-control" name="images"  accept="image/*">
                                </div>
                            </div>
                            @error('images')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="d-flex justify-content-center align-items-center">
                                <div>
                                    <img class="mr-auto p-b-20" src="{{asset("$user->images")}}" style="width:250px;" id="output_image" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <select class="js-example-basic-single form-control" name="gender" id="">
                                    <option value="1" @if($user->gender ==1) seleted @endif>Male</option>
                                    <option value="1" @if($user->gender ==2) seleted @endif>Female</option>
                                </select>
                            </div>
                            @error('gender')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{$user->email}}">
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Birthday</label>
                                <input type="birth_date" class="form-control" name="birthday" value="{{$user->birthday}}" placeholder="Url">
                            </div>
                            @error('birthday')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" value="{{$user->address}}">
                            </div>
                            @error('address')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select class="js-example-basic-single form-control" name="is_active">
                                    <option value="1" @if($user->is_active == 1) selected @endif>Activate</option>
                                    <option value="0" @if($user->is_active == 0) selected @endif>Deactivate</option>
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
@endsection
