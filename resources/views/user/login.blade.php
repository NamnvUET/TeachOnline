<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Teach Online</title>
    <base href="{{ asset('') }}">

    <!-- Bootstrap -->
    {{--<link href="public/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Pattaya&amp;subset=vietnamese" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="public/css/style.css">--}}
    {{--<link rel="stylesheet" href="public/css/style-signup-login.css">--}}
    <style>
    </style>

</head>
<body>

<!-- Header-->
@include('layouts.header')
<!-- End header-->

<!-- form login -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="loginbox" class="mainbox col-md-4 col-md-offset-4">
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title" style="text-align: center"><b>Đăng nhập</b></div>
                    </div>
                    <div class="panel-body" >
                        <form id="loginform" class="form-horizontal" role="form" method="post" action="{{ url('login') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-email" type="text" class="form-control" name="username" value="" placeholder="username">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            {{-- <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1"> Ghi nhớ đăng nhập
                                    </label>
                                </div>
                            </div> --}}
                            <div id= "login-btn" class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
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

<!-- js-->
<script src="public/js/bootstrap.min.js" type="text/javascript"></script>
<script src="public/js/jquery-3.1.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/jquery.validate.js"></script>
<script src="public/js/additional-methods.min.js"></script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
{{-- <link rel="stylesheet" href="public/js/example.js"> --}}
{{-- <script src="https://code.jquery.com/jquery-1.11.3.js"></script> --}}
{{-- <script type="text/javascript" src="public/js/jsindex.js"></script> --}}

</body>

</html>