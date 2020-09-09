<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leoo Shop - Administrator</title>

    <link href="{{url('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/datepicker3.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/bootstrap-table.css')}}" rel="stylesheet">
    <link href="{{url('backend/css/styles.css')}}" rel="stylesheet">

</head>

<body>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Leoo Shop - Xác minh tài khoản</div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Xác minh địa chỉ Email của bạn') }}</div>

                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Một liên kết xác minh đã được gửi tới emal đăng kí của bạn') }}
                                </div>
                            @endif

                            {{ __('Trước khi xác thực vui lòng kiểm tra email của bạn') }}
                            {{ __('Nếu bạn không nhận được email xác thực') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Bấm vào đây để yêu cầu lại') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
</body>

</html>
