@extends('admin.layouts.index')
@section('title','Banner')
@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{{route('banner.index')}}">Banner Header</a></li>
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
                        {!! $data->title !!}
                    @else
                    Thêm mới
                    @endif
                </h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
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
                            <form role="form" method="{{isset($data)?"POST":"POST"}}" enctype="multipart/form-data" action="{{ isset($data) ? route('banner.update',$data->id):route('banner.store')}}">
                                {{csrf_field()}}
                                @if(isset($data))
                                    <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <textarea id="editor1" name="title" class="form-control ckeditor" rows="3">{{old('name', isset($data) ? $data->title : null ) }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea id="editor1" name="content" class="form-control ckeditor" rows="3">{{old('name', isset($data) ? $data->content : null ) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh</label>

                                    <input name="image" type="file">
                                    <br>
                                    <div>
                                        <img width="150" height="100" src="{{\App\Library\Files::media(old('image', isset($data) ? $data->image : null) )}}">
                                    </div>
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

    </div>
    <!--/.main-->
@stop
