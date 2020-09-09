@extends('frontend.pages.thong-tin.about')
@section('title','Lịch sử')
@section('note')

<div>
    <h2 class="text-center">LỊCH SỬ PHÁT TRIỂN</h2>
    @if($data == null)
        {!! $data->history !!}
    @else
        <h5 class="text-center">Không có bài viết nào !</h5>
    @endif
</div>
    @stop
