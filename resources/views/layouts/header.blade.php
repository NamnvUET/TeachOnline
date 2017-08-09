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
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-theme.css">
    <script
            src="http://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
    </script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <link type="text/css" rel="stylesheet" href="public/css/home.css">
    <style>
    </style>

</head>
<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('home') }}">Teach Online</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-form">
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Các chủ đề
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                    <li role="presentation"><a role="menuitem" href="#">Lập trình Web</a></li>
                                    <li role="presentation"><a role="menuitem" href="#">Lập trình Android</a></li>
                                    <li role="presentation"><a role="menuitem" href="#">Cơ sở dữ liệu</a></li>
                                    {{--<li role="presentation" class="divider"></li>--}}
                                    {{--<li role="presentation"><a role="menuitem" href="#">About Us</a></li>--}}
                                </ul>
                            </div>
                        </li>
                    </ul>

                    <form class="navbar-form navbar-left" role="search" action="{{ url('search') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Nhập...">
                        </div>
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </form>

                    <ul class="nav navbar-nav navbar-right account">
                        @if (!(Auth::check() && Auth::user()->active == 1))
                            <li><a href="{{ url('signup') }}">Đăng ký</a></li>
                            <li><a href="{{ url('login') }}">Đăng nhập</a></li>
                        @else
                            <li><a href="{{ url('upload-file') }}"><span class="glyphicon glyphicon-open"></span> Tải lên</a></li>
                            <li><a href="{{ url('my-upload/list') }}"><span class="glyphicon glyphicon-folder-open"></span> Tài liệu của tôi</a></li>
                            <li><a href="{{ url('profile') }}"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a></li>
                            <li><a href="{{ url('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>
