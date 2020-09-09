@extends('frontend.pages.thong-tin.about')
@section('title','Tầm nhìn')
@section('note')
    <div>
        <h2 class="text-center">TẦM NHÌN</h2>
        @if($data==null)
            {!! $data->vision !!}
        @else
            <h5 class="text-center">Không có bài viết nào !</h5>
        @endif
    </div>
@stop
