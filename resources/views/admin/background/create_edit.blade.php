@extends('admin.layouts.index')
@section('title','Hình nền')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{{route('background.index')}}">Ảnh nền</a></li>
                <li class="active">
                    @if(isset($data))
                        Chỉnh sửa ảnh
                    @else
                        Thêm ảnh
                    @endif
                </li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    @if(isset($data))
                    Chỉnh sửa ảnh
                    @else
                        Thêm ảnh vào thư viện
                    @endif
                </h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-6">
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
                            <form role="form" method="{{isset($data)?"POST":"POST"}}" enctype="multipart/form-data" action="{{ isset($data) ? route('background.update',$data->id):route('background.store')}}">
                                {{csrf_field()}}
                                @if(isset($data))
                                    <input type="hidden" name="_method" value="PUT">
                                @endif
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
