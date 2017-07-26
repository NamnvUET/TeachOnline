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
    <style>
        .validation-message {
            color: red;
            font-weight: normal;
        }
    </style>

</head>
<body>

<!-- Header-->
@include('layouts.header')
<!-- End header-->

<!-- form signup -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="signupbox" class="mainbox col-md-6 col-md-offset-3">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title" ><b>Đăng ký</b></div>
                    </div>
                    <div class="panel-body" >
                        <form id="signupform" class="form-horizontal" role="form" method="post" action="{{ url('signup') }}">
                            {{--{{csrf_field()}}--}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="lastname" class="col-md-3 control-label">Tên đăng nhập</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="username" placeholder=" username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Email</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="email" placeholder=" email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label">Mật khẩu</label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="password" placeholder=" password" id="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-3 control-label" style="padding-top: 0px">Nhập lại mật khẩu</label>
                                <div class="col-md-8">
                                    <input type="password" class="form-control" name="confirmpass" placeholder=" confirm password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone_number" class="col-md-3 control-label" style="padding-top: 0px">Phone Number</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="phone_number" placeholder="phone_number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="job" class="col-md-3 control-label" style="padding-top: 0px">Job</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="job" placeholder="Job">
                                </div>
                            </div>

                            <div id="signup-btn" class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- errors -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger" style="text-align: center">
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

            <!-- notification -->
                @if (session('noti'))
                    <div class="alert alert-success" style="text-align: center">
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
{{--<script src="public/js/bootstrap.min.js" type="text/javascript"></script>--}}
{{--<script src="public/js/jquery-3.1.1.min.js"></script>--}}
{{--<script src="public/js/bootstrap.min.js"></script>--}}
{{--<script src="public/js/jquery.validate.js"></script>--}}
{{--<script src="public/js/additional-methods.min.js"></script>--}}

{{--<script>--}}
    {{--$(document).ready(function() {--}}
        {{--$("#signupform").validate({--}}
            {{--rules: {--}}
                {{--username: {--}}
                    {{--required: true,--}}
                    {{--minlength: 6,--}}
                    {{--maxlength: 20--}}
                {{--},--}}
                {{--email: {--}}
                    {{--required: true,--}}
                    {{--email: true,--}}
                    {{--vnumail: true--}}
                {{--},--}}
                {{--password: {--}}
                    {{--required: true,--}}
                    {{--minlength: 6--}}
                {{--},--}}
                {{--confirmpass: {--}}
                    {{--required: true,--}}
                    {{--equalTo: "#password"--}}
                {{--}--}}
            {{--},--}}

            {{--messages: {--}}
                {{--username: {--}}
                    {{--required: "<span class='validation-message'>Tên đăng nhập không được để trống</span>",--}}
                    {{--minlength: "<span class='validation-message'>Tên đăng nhập tối thiểu có 6 ký tự</span>",--}}
                    {{--maxlength: "<span class='validation-message'>Tên đăng nhập tối đa 20 ký tự</span>"--}}
                {{--},--}}
                {{--email: {--}}
                    {{--required: "<span class='validation-message'>Email không được để trống</span>",--}}
                    {{--email: "<span class='validation-message'>Email không hợp lệ</span>",--}}
                    {{--vnumail: "<span class='validation-message'>Sử email @vnu.edu.vn</span>"--}}
                {{--},--}}
                {{--password: {--}}
                    {{--required: "<span class='validation-message'>Mật khẩu không được để trống</span>",--}}
                    {{--minlength: "<span class='validation-message'>Mật khẩu tối thiểu có 6 ký tự</span>"--}}
                {{--},--}}
                {{--confirmpass: {--}}
                    {{--required: "<span class='validation-message'>Không được bỏ trống</span>",--}}
                    {{--equalTo: "<span class='validation-message'>Mật khẩu không khớp</span>"--}}
                {{--}--}}
            {{--}--}}
        {{--});--}}

        {{--jQuery.validator.setDefaults({--}}
            {{--debug: true,--}}
            {{--success: "valid"--}}
        {{--});--}}

        {{--jQuery.validator.addMethod("vnumail", function(value, element) {--}}
            {{--return /^.+@vnu.edu.vn$/.test(value);--}}
        {{--}, "Only @vnu.edu.vn are allowed");--}}
    {{--});--}}
{{--</script>--}}

</body>

</html>