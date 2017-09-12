<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--<meta http-equiv="pragma" content="no-cache" />--}}
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
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/homeHeader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/homeBody.css')}}">
    <style>
    </style>

</head>
<body>

    <!-- Header-->
    @include('layouts.header')
    <!-- End header-->

    <!-- Content -->
    @yield('content')
    <!-- End content -->
    {{--@include('layouts.footer')--}}
</body>

</html>