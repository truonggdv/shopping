@extends('frontend.pages.thong-tin.about')
@section('title','Sứ mệnh')
@section('note')
    <div>
        <h2 class="text-center">SỨ MỆNH</h2>
        @if($data==null)
            {!! $data->mission !!}
        @else
            <h5 class="text-center">Không có bài viết nào !</h5>
        @endif
    </div>
@stop
