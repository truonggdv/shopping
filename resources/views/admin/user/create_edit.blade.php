@extends('admin.layouts.index')
@section('title','Quản lí tài khoản')
@section('main')
    @role('admin')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{{route('user.index')}}">Quản lý thành viên</a></li>
                <li class="active">
                    @if (isset($data))
                        Chỉnh sửa
                    @else
                        Thêm mới
                    @endif
                </li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    @if(isset($data))
                        Thành viên: {{$data->name}}
                    @else
                        Thêm mới
                    @endif
                </h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <!-- <div class="alert alert-danger">Email đã tồn tại !</div> -->
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
                            <form role="form" method="{{isset($data)?"POST":"POST"}}" enctype="multipart/form-data" action="{{ isset($data) ? route('user.update',$data->id):route('user.store')}}">
                                {{csrf_field()}}
                                @if(isset($data))
                                    <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input name="name" required class="form-control" value="{{ old('name', isset($data) ? $data->name : null) }}" placeholder="Nhập tên...">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="email" required type="text" value="{{old ('email', isset($data) ? $data->email : null )}}" @if(isset($data)) ? readonly @endif class="form-control" placeholder="Nhập email...">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input name="password" value="{{old ('email', isset($data) ? $data->password : null )}}" required type="password"  class="form-control">
                                </div>
                                {{--                                <div class="form-group">--}}
                                {{--                                    <label>Nhập lại mật khẩu</label>--}}
                                {{--                                    <input name="password_re" required type="password"  class="form-control">--}}
                                {{--                                </div>--}}
                                <label>Quyền</label>
                                @if(isset($data))
                                    @foreach($role as $ro)
                                        <div class="form-group">
                                            <input class="form-check-input" name="roles[]"  type="checkbox" id="inlineCheckbox1" value="{{ $ro->name }}" multiple="multiple"

                                            @foreach ($id_roles as $idr)
                                                {{ $idr->name == $ro->name ? 'checked' : "" }}
                                                @endforeach
                                            >
                                            <label class="form-check-label" for="inlineCheckbox1">{{$ro->title}}</label>
                                        </div>
                                    @endforeach
                                @else
                                    @foreach($role as $ro)
                                        <div class="form-group">
                                            <input class="form-check-input" name="roles[]"  type="checkbox" id="inlineCheckbox1" value="{{ $ro->name }}" multiple="multiple" >
                                            <label class="form-check-label" for="inlineCheckbox1">{{$ro->title}}</label>
                                        </div>
                                    @endforeach
                                @endif
                                @if(isset($data))
                                    <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                                @else
                                    <button type="submit" class="btn btn-success">Thêm mới</button>
                                @endif
                                <button type="reset" class="btn btn-default">Nhập lại</button>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
        @else
            <div class="alert alert-danger" style="color = #000;  text-align: center"> Bạn không có quyền truy cập vào trang này !</div>
            @endrole
    </div>	<!--/.main-->
@stop
