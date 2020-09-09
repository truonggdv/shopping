@extends('frontend.layouts.index')
@section('title','Thông tin')
@section('content')
		<!-- main -->

		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="about-flex">
						<div class="col-one-forth">
							<div class="row">
								<div class="col-md-12 about">
									<h2 class="text-center">Thông tin</h2>

									<ul>
										<li class="text-center"><a href="{{url('thong-tin/lich-su')}}">Lịch sử phát triển</a></li>
										<li class="text-center"><a href="{{url('thong-tin/thanh-tuu')}}">Thành tựu</a></li>
										<li class="text-center"><a href="{{url('thong-tin/tam-nhin')}}">Tầm nhìn</a></li>
										<li class="text-center"><a href="{{url('thong-tin/su-menh')}}">Sứ mệnh</a></li>

									</ul>
								</div>
							</div>
						</div>
						<div class="col-three-forth">
                            @yield('note')
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end main -->
@stop
