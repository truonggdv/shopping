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
            <div class="panel-heading">Leoo Shop - Administrator</div>
            <div class="panel-body">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br>
                        @endforeach
                    </div>
                @endif
                <form role="form" method="post">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" value="{{ old('email') }}" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }} value="Remember Me">Nhớ tài khoản
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        <a href="{{ route('register') }}" type="submit" class="btn btn-success">Đăng kí</a>
                        <br/>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ ('Quên mật khẩu ?') }}
                            </a>
                        @endif
                    </fieldset>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
</body>

</html>
