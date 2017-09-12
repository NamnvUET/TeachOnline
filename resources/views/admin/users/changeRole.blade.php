@extends('admin.adminLayout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Change Role Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Change Role User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Change Role User</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @if (session('noti'))
                                <div class="alert alert-success">
                                    {{ session('noti') }}
                                </div>
                            @endif
                            <form action="{{ url('adminpage/user/changerole/'.$user->id) }}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label>Role: </label>
                                    <label class="radio-inline">
                                        <input name="is_admin" value="1"
                                               @if($user->is_admin == 1)
                                               {{ "checked" }}
                                               @endif
                                               type="radio">Admin
                                    </label>
                                    <label class="radio-inline">
                                        <input name="is_admin" value="0"
                                               @if($user->is_admin == 0)
                                               {{ "checked" }}
                                               @endif
                                               type="radio">Thành viên
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-success">Đổi</button>
                                <a href="{{ url('adminpage/user/list') }}"><button type="button" class="btn btn-default">Quay về Danh sách</button></a>
                                <form>
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
    <script>
        $(document).ready(function() {
            $(".nav-menu li a[data=user]").parent('li').addClass('active');
        });
    </script>
@endsection