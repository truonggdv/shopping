@extends('admin.layouts.index')
@section('title','Quuyền người dùng')
@section('main')
    @role('admin')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="{{route('dashboard.index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Phân Quyền</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Quản lí Quyền</h1>
			</div>
		</div><!--/.row-->
        @can('permission-add')
		<div id="toolbar" class="btn-group">
            <a href="{{route('role.create')}}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Thêm Quyền
            </a>
        </div>
        @endcan
		<div class="row">
			<div class="col-md-12">
			@if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                @can('permission-add')
					<div class="panel panel-default">
							<div class="panel-body">
								<table
									data-toolbar="#toolbar"
									data-toggle="table">

									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Tên Quyền</th>
										<th>Người được cấp</th>
										<th>Hành động</th>
									</tr>
									</thead>
									<tbody>
									@foreach ($data as $item)
										<tr>
											<td style="">{{$item->id}}</td>
											<td style="">{{$item->title}}</td>
											<td style="">{{$item->name}}</td>
											<td class="form-group">
                                                @can('permission-edit')
												<a href="{{route('role.edit',[$item->id])}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                                @endcan
                                                    @can('permission-delete')
												<button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#exampleModal" data-action="{{route('role.destroy',[$item->id])}}">
                                        		<i class="fas fa-trash-alt"></i>
                                        		</button>
                                                    @endcan
											</td>
										</tr>
									@endforeach
									</tbody>

									<!-- model -->

									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">XÓA BÀI VIẾT</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có muốn xóa?
                                        </div>
                                        <div class="modal-footer">
                                            <form id="form-delete" role="form" method="POST" enctype="multipart/form-data" action="">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<script>
							$(document).ready(function(){

								$('#exampleModal').on('show.bs.modal', function(e) {
										var action=$( e.relatedTarget).data('action');
										$('#form-delete').attr('action',action );
									});

							});


                            </script>
								</table>
							</div>
							<div class="panel-footer">
							{{ $data->links() }}
							</div>
						</div>
                @endcan
			</div>
            @else
                <div class="alert alert-danger" style="color = #000;  text-align: center"> Bạn không có quyền truy cập vào trang này !</div>
                @endrole
		</div><!--/.row-->

	</div>	<!--/.main-->

@stop
