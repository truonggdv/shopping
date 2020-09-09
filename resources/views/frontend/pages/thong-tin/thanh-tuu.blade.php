@extends('frontend.pages.thong-tin.about')
@section('title','Thành tựu')
@section('note')

    <div>
        <h2 class="text-center">THÀNH TỰU</h2>
        @if($data == null)
            {!! $data->achievement !!}
        @else
            <h5 class="text-center">Không có bài viết nào !</h5>
        @endif
    </div>
@stop
