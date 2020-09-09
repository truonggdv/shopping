@extends('admin.layouts.index')
@section('title','Phản hồi khách hàng')
@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Phản hồi khách hàng</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phản hồi khách hàng</h1>
            </div>
        </div><!--/.row-->
        <div class="row">
            <div class="col-md-12">
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table
                            data-toolbar="#toolbar"
                            data-toggle="table">
                            <thead>
                            <tr>
                                <th style="text-align: center" data-field="id" data-sortable="true">ID</th>
                                <th style="text-align: center">Khách hàng</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Chủ đề</th>
                                <th style="text-align: center">Lời nhắn</th>
                                <th style="text-align: center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td style="width:3%; text-align: center">{{$item->id}}</td>
                                    <td style="width: 10%; text-align: center">{{$item->name}}</td>
                                    <td style="text-align: center">{{$item->email}}</td>
                                    <td style="width: 20%; text-align: center">{{$item->subject}}</td>
                                    <td style="">{{$item->message}}</td>
                                    <td style="text-align: center" class="form-group">
                                        <button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#exampleModal" data-action="{{route('feedback.destroy',[$item->id])}}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">XÓA DANH MỤC</h5>
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
            </div>
        </div><!--/.row-->
    </div>	<!--/.main-->
@stop
