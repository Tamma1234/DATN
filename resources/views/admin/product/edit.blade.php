@extends('admin.master')
@section('title',"Sửa Sản Phẩm")
@section('active_home', 'menu-item-active')
@section('name_page', 'Sửa Sản Phẩm')

@section('main')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            {{-- <h5>Form</h5>--}}
        </div>
        <div class="card-body">
            <form id="validation-form123" action="{{route('product.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$products->id}}">
                <div class="row">
                    <div class="col-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$products->name}}" placeholder="Name">
                            </div>
                            @error('first_name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{$products->slug}}" placeholder="Slug">
                            </div>
                            @error('slug')
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
                                    <img class="mr-auto p-b-20" src="{{asset("$products->images")}}" style="width:250px;" id="output_image" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Description" value="{{$products->description}}">
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="price" value="{{$products->price}}">
                            </div>
                            @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Sale_percent</label>
                                <input type="birth_date" class="form-control" name="sale_percent" value="{{$products->sale_percent}}" placeholder="Url">
                            </div>
                            @error('sale_percent')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Stocks</label>
                                <input type="text" class="form-control" name="stocks" placeholder="stocks" value="{{$products->stocks}}">
                            </div>
                            @error('stocks')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select class="js-example-basic-single form-control" name="is_active">
                                    <option value="1" @if($products->is_active == 1) selected @endif>Activate</option>
                                    <option value="0" @if($products->is_active == 0) selected @endif>Deactivate</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn  btn-primary">Submit</button>
                            <a href="{{route('product.index')}}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
