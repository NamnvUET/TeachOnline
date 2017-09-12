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
<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('home')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Teach Online</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->avatar == NULL)
                                <img src="{{asset('node_modules/admin-lte/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{Auth::user()->name}}</span>
                            @else
                                <img src="{{asset('public/avatar').'/'.Auth::user()->avatar}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{Auth::user()->name}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if(Auth::user()->avatar == NULL)
                                    <img src="{{asset('node_modules/admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                @else
                                    <img src="{{asset('public/avatar').'/'.Auth::user()->avatar}}" class="img-circle" alt="User Image">
                                @endif

                                <p>
                                    {{Auth::user()->name}}
                                    <small>Member since {{Auth::user()->created_at}}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{url('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- =============================================== -->
</div>

{{--Content--}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Headewrapperr (Page header) -->
    <section class="content-header">
        <h1>
            Lesson Page
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manager Lesson</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Lesson of {{$class->name}}</h3>
                        <a href="{{url('adminpage/lesson/add')}}" style="float: right">Thêm mới</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- notification -->
                        @if (session('noti'))
                            <div class="alert alert-success">
                                {{ session('noti') }}
                            </div>
                        @endif

                        <table id="list_lesson" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>Path of Doc</th>
                                <th>Comment</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Modify</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{$lesson->id}}</td>
                                    <td>{{$lesson->title}}</td>
                                    <td>
                                        @if($lesson->want_check_comment)
                                            <a href="{{url('manageClass/'.$class->id.'/'.$class->name_without_sign.'/'.$lesson->id.'/allcomment')}}">Xem tất cả</a>
                                            hoặc
                                            <a href="{{url('manageClass/'.$class->id.'/'.$class->name_without_sign.'/'.$lesson->id.'/duyetcomment')}}">Duyệt comment</a>
                                        @else
                                            <a href="{{url('manageClass/'.$class->id.'/'.$class->name_without_sign.'/'.$lesson->id.'/allcomment')}}">Xem tất cả</a>
                                        @endif
                                    </td>
                                    <td>{{$lesson->path}}</td>
                                    <td>
                                        @if($lesson->want_check_comment == 1)
                                            Duyệt trước
                                        @else
                                            Không duyệt
                                        @endif
                                    </td>
                                    <td>{{$lesson->created_at}}</td>
                                    <td>{{$lesson->updated_at}}</td>
                                    <td class="text-center"><a href="{{url('manageClass/'.$class->id.'/'.$class->name_without_sign.'/modifyLesson/'.$lesson->id) }}"><button class="btn btn-warning"><span class="fa fa-edit"></span></button></a></td>
                                    <td class="text-center"><a href="{{url('manageClass/'.$class->id.'/'.$class->name_without_sign.'/deleteLesson/'.$lesson->id)}}"><button class="btn btn-warning"><span class="fa fa-trash "></span></button></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Comment</th>
                                <th>Path of Doc</th>
                                <th>Comment</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Modify</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- jQuery 2.2.3 -->
<script src="{{asset('node_modules/admin-lte/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script>
    $(function () {
        $("#list_lesson").DataTable();
    });
</script>
{{--End Content--}}

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                {{--<img src="{{asset('node_modules/admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">--}}
                @if(Auth::user()->avatar == NULL)
                    <img src="{{asset('node_modules/admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                @else
                    <img src="{{asset('public/avatar').'/'.Auth::user()->avatar}}" class="img-circle" alt="User Image">
                @endif
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="{{url('manageClass/'.$class->id.'/'.$class->name_without_sign)}}" data="class">
                    <i class="fa fa-dashboard"></i> <span>Manager Class</span>
                </a>
            </li>
            <li class="treeview">
                <a href="javascript.void(0)">
                    <i class="fa fa-dashboard"></i> <span>Lesson of Class</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('manageClass/'.$class->id.'/'.$class->name_without_sign.'/listLesson')}}"><i class="fa fa-circle-o"></i>List Lesson</a></li>
                    <li><a href="{{url('manageClass/'.$class->id.'/'.$class->name_without_sign.'/addLesson')}}"><i class="fa fa-circle-o"></i>Add new Lesson</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->
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
