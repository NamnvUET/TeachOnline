<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Fixed Layout</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('node_modules/admin-lte/bootstrap/css/bootstrap.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('node_modules/admin-lte/plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('node_modules/admin-lte/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('node_modules/admin-lte/dist/css/skins/_all-skins.min.css')}}">
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
    @include('admin.adminLayout.header')
    {{--Content--}}
    @yield('content')
    {{--End Content--}}
    @include('admin.adminLayout.menu')

    @include('admin.adminLayout.footer')

<!-- jQuery 2.2.3 -->
<script src="{{asset('node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('node_modules/admin-lte/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('node_modules/admin-lte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('node_modules/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('node_modules/admin-lte/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('node_modules/admin-lte/dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('node_modules/admin-lte/dist/js/demo.js')}}"></script>
</body>
</html>