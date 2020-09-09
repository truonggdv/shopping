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
            <div class="panel-heading">Lấy lại mật khẩu đăng nhập</div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            {{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
                            @error('email')
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Gửi') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
</body>

</html>
