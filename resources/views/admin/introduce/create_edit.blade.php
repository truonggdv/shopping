@extends('admin.layouts.index')
@section('title','Giới thiệu')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{{route('introduce.index')}}">Quản lý thông tin </a></li>
                <li class="active">
                    @if(isset($data))
                        Chỉnh sửa thông tin
                        @else
                    Thêm mới thông tin
                    @endif
                </li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    @if(isset($data))
                        Chỉnh sửa thông tin
                    @else
                    Thêm mới thông tin
                    @endif
                </h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
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
                        <div class="col-md-8">
                            <form role="form" method="{{isset($data)?"POST":"POST"}}" enctype="multipart/form-data" action="{{ isset($data) ? route('introduce.update',$data->id):route('introduce.store')}}">
                                {{csrf_field()}}
                                @if(isset($data))
                                    <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="form-group">
                                    <label>Tên shop</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name', isset($data) ? $data->name : null ) }}">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input name="address" type="text" class="form-control" value="{{old('name', isset($data) ? $data->address : null ) }}">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input name="phone" type="text" class="form-control" value="{{old('name', isset($data) ? $data->phone : null ) }}">
                                </div>
                                <div class="form-group">
                                    <label>Mail liên hệ</label>
                                    <input name="contact" type="email" class="form-control" value="{{old('name', isset($data) ? $data->contact : null ) }}">
                                </div>
                                <div class="form-group">
                                    <label>Liên kết facebook</label>
                                    <input name="facebook" type="text" class="form-control" value="{{old('name', isset($data) ? $data->facebook : null ) }}">
                                </div>
                                <div class="form-group">
                                    <label>Liên kết youtube</label>
                                    <input name="youtube" type="text" class="form-control" value="{{old('name', isset($data) ? $data->youtube : null ) }}">
                                </div>
                                <div class="form-group">
                                    <label>Liên kết instagram</label>
                                    <input name="instagram" type="text" class="form-control" value="{{old('name', isset($data) ? $data->instagram : null ) }}">
                                </div>
                                <div class="form-group">
                                    <label>Lịch sử phát triển</label>
                                    <textarea required id="editor1" name="history" class="form-control ckeditor" rows="3">{{old('history', isset($data) ? $data->history : null ) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Thành tựu</label>
                                    <textarea required id="editor1" name="achievement" class="form-control ckeditor" rows="3">{{old('achievement', isset($data) ? $data->achievement : null ) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tầm nhìn</label>
                                    <textarea required id="editor1" name="vision" class="form-control ckeditor" rows="3">{{old('vision', isset($data) ? $data->vision : null ) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Sứ mệnh</label>
                                    <textarea required id="editor1" name="mission" class="form-control ckeditor" rows="3">{{old('mission', isset($data) ? $data->mission : null ) }}</textarea>
                                </div>
                                @if(isset($data))
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
                                @else
                                    <button type="submit" class="btn btn-success">Thêm mới</button>
                                @endif
                                <button type="reset" class="btn btn-default">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row -->
    @stop
