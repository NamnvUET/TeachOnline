<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Teach Online</title>
    <base href="{{ asset('') }}">
    <!--Font-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato" type="text/css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('node_modules/bootstrap/dist/css/bootstrap-theme.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <script
            src="http://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
    </script>
    <script src="{{asset('node_modules/bootstrap/dist/js/bootstrap.js')}}"></script>
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/homeHeader.css')}}">
</head>
<body>

<!-- Header-->
@include('layouts.header')
<!-- End header-->

<!-- form login -->
<div class="container login-body">
    <div class="row">
        <div class="col-md-12">
            <div id="loginbox" class="mainbox col-md-6 col-md-offset-3">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title" style="text-align: center"><b>Đăng nhập</b></div>
                    </div>
                    <div class="panel-body" >
                        <form id="loginform" class="form-horizontal" role="form" method="post" action="{{ url('login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{csrf_field()}}
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-user" type="text" class="form-control" name="username" value="" placeholder="Your Username">
                            </div>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="Your Password">
                            </div>
                            {{-- <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> Ghi nhớ đăng nhập
                                    </label>
                                </div>
                            </div> --}}
                            <div id= "login-btn">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                @if (session('noti'))
                    <div class="alert alert-danger" style="text-align: center">
                        {{ session('noti') }}
                    </div>
                @endif

                @if (session('noti-success'))
                    <div class="alert alert-success" style="text-align: center">
                        {{ session('noti-success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

</body>

</html>