@extends('frontend.layouts.index')
@section('title','Liên hệ')
@section('content')
		<!-- main -->
		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h3>Thông tin liên hệ</h3>
						<div class="row contact-info-wrap">
							<div class="col-md-3">
								<p><span><i class="icon-location"></i></span> {{$data->address}}</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="tel://0988 550 553">{{$data->phone}}</a>
								</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="fab fa-facebook-square"></i></i></span> <a
										href="{{$data->facebook}}">Facebook</a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="fab fa-instagram"></i> <a href="{{$data->instagram}}">instagram</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Liên hệ</h3>
							<form action="{{url('lien-he')}}" method="post">
                                {{csrf_field()}}
								<div class="row form-group">
									<div class="col-md-12 padding-bottom">
										<label for="name">Họ & Tên</label>
										<input type="text" name="name" id="name" class="form-control" placeholder="Họ và tên">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" class="form-control"
											placeholder="Email của bạn">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="subject">Chủ đề</label>
										<input type="text" name="subject" id="subject" class="form-control" placeholder="Nhập chủ đề">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="message">Lời nhắn</label>
										<textarea name="message" id="message" cols="30" rows="10" class="form-control"
											placeholder="Nói gì đó cho chúng tôi"></textarea>
									</div>
								</div>
								<div class="form-group text-center">
									<input name="sbm" type="submit" value="Gửi liên hệ" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="map" class="colorlib-map"></div>
		<!-- end main -->

		<script>
			$(document).ready(function () {

				var quantitiy = 0;
				$('.quantity-right-plus').click(function (e) {

					// Stop acting like a button
					e.preventDefault();
					// Get the field name
					var quantity = parseInt($('#quantity').val());

					// If is not undefined

					$('#quantity').val(quantity + 1);


					// Increment

				});

				$('.quantity-left-minus').click(function (e) {
					// Stop acting like a button
					e.preventDefault();
					// Get the field name
					var quantity = parseInt($('#quantity').val());

					if (quantity > 0) {
						$('#quantity').val(quantity - 1);
					}
				});

			});
		</script>
@stop
