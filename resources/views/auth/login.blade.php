<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Store Shop</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/bootstrap/dist/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/Ionicons/css/ionicons.min.css')}}">    <link rel="stylesheet" href="{{asset('adminlte/css/AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{asset('adminlte/css/AdminLTE-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/iCheck/square/blue.css')}}">

   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="{{url('/home')}}">Store Shop</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">قم بتسجيل الدخول</p>

        <form action="{{url('/login')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" placeholder="البريد الالكتروني" required="" name="email">
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" placeholder="كلمة المرور" required="" name="password">
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-flat">تسجيل الدخول</button>
        </form>



    </div>

</div>
<script src="{{asset('adminlte/plugins/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
