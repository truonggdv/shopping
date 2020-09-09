@extends('admin.layouts.index')
@section('title','Thêm chức năng')
@section('main')
    @role('admin')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{route('dashboard.index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="{{route('permission.index')}}">Quản lí hành động quyền</a></li>
				<li class="active">
                    @if(isset($data))
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
                        Danh mục: {{$data->name}}
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
                        	<!-- <div class="alert alert-danger">Danh mục đã tồn tại !</div> -->
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
                            <form role="form" method="{{isset($data)?"POST":"POST"}}" enctype="multipart/form-data" action="{{ isset($data) ? route('permission.update',$data->id):route('permission.store')}}">
                            {{csrf_field()}}
                            @if(isset($data))
                                    <input type="hidden" name="_method" value="PUT">
                                @endif
                            <div class="form-group">
                                <label>Tên Quyền</label>
                                <input required type="text" name="title" class="form-control" value="{{old('name',isset($data) ? $data->title : null)}}" placeholder="Quyền...">
                            </div>
                            <div class="form-group">
                                <label>Key</label>
                                <input required type="text" name="name" class="form-control" value="{{old('name',isset($data) ? $data->name : null)}}" placeholder="Người được cấp quyền...">
                            </div>
                                <div class="form-group">
                                    <label>Guard_name</label>
                                    <input required type="text" name="guard_name" class="form-control" value="web" readonly>
                                </div>
                            @if(isset($data))
                            <button type="submit" class="btn btn-success">Chỉnh sửa</button>
                            @else
                            <button type="submit" class="btn btn-success">Thêm mới</button>
                            @endif
                            <button type="reset" class="btn btn-default">Nhập lại</button>
                        </div>

                    	</form>
                    </div>
                </div>
                @else
                    <div class="alert alert-danger" style="color = #000; text-align: center"> Bạn không có quyền truy cập vào trang này !</div>
                    @endrole
            </div><!-- /.col-->
	</div>	<!--/.main-->
@stop
