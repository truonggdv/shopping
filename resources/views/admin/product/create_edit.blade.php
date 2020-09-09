`@extends('admin.layouts.index')
@section('title','Sản phẩm')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{{route('product.index')}}">Quản lý sản phẩm</a></li>
                <li class="active">
                    @if(isset($data))
                    Chỉnh sửa
                        @else
                    Thêm mới
                    @endif
                </li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    @if(isset($data))
                        {{$data->name}}
                    @else
                    Thêm sản phẩm
                    @endif
                </h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-body">
                            <form role="form" method="{{isset($data)?"POST":"POST"}}" enctype="multipart/form-data" action="{{ isset($data) ? route('product.update',$data->id):route('product.store')}}">
                                {{csrf_field()}}
                                @if(isset($data))
                                    <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <textarea required name="name" class="form-control" rows="3">{{old('name', isset($data) ? $data->name : null ) }}</textarea>
                                </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input required name="prd_id" type="text" min="0" class="form-control" value="{{old('name', isset($data) ? $data->prd_id : null ) }}">
                                    </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input required name="price" type="number" min="0" class="form-control" value="{{old('name', isset($data) ? $data->price : null ) }}">
                                </div>
                                <div class="form-group">
                                    <label>Mức sale</label>
                                    <input required name="sale" type="number" min="0" class="form-control" value="{{old('name', isset($data) ? $data->sale : null ) }}">
                                </div>
                                <div class="form-group">
                                    <label>Chi tiết sản phẩm</label>
                                    <textarea required id="editor1" name="details" class="form-control ckeditor" rows="3">{{old('name', isset($data) ? $data->details : null ) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    @if(isset($data))
                                    <select name="cat_id" class="form-control">
                                        @foreach($category as $cat)
                                            <option {{$data->cat_id == $cat->cat_id ? 'selected': ''  }} value={{$cat->cat_id}}>{{$cat->cat_name}}</option>
                                        @endforeach
                                    </select>
                                        @else
                                        <select name="cat_id" class="form-control">
                                            @foreach($category as $cat)
                                            <option value={{$cat->cat_id}}>{{$cat->cat_name}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>

                                <input name="image" type="file" value="{{old('image', isset($data) ? $data->image : null ) }}">
                                <br>
                                <div>
                                    <img width="150" height="180" src="{{\App\Library\Files::media(old('image', isset($data) ? $data->image : null) )}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Sản phẩm nổi bật</label>
                                <div class="checkbox">
                                    @if(isset($data))
                                    <label>
                                            <input name="featured"  {{ $data->featured == 1 ? 'checked' : "" }} type="checkbox" value="1">Nổi bật
                                    </label>
                                    @else
                                        <label>
                                            <input name="featured" type="checkbox" value="1">Nổi bật
                                        </label>
                                    @endif
                                </div>
                            </div>
                            @if(isset($data))
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            @else
                                <button type="submit" class="btn btn-success">Thêm mới</button>
                            @endif
                            <button type="reset" class="btn btn-default">Nhập lại</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row -->

    </div>
    <!--/.main-->
@stop
`
