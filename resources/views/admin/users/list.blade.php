@extends('admin.adminLayout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Manager User</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List User</h3>
                            <a href="{{url('adminpage/user/add')}}" style="float: right">Thêm mới</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th data-sortable="false">Avatar</th>
                                    <th>Phone Number</th>
                                    <th>Job</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th data-sortable="false">Change Role</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if($user->avatar == NULL)
                                                    Chưa có
                                                @else
                                                    <img src="{{asset("public/avatar/".$user->avatar)}}" alt="avatar" height="50px">
                                                @endif
                                            </td>
                                            <td>{{$user->phone_number}}</td>
                                            <td>{{$user->job}}</td>
                                            <td>{{$user->created_at}}</td>
                                            <td>{{$user->updated_at}}</td>
                                            <td class="text-center"><a href="{{ url('adminpage/user/changerole/'.$user->id) }}"><button class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span></button></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th>Phone Number</th>
                                    <th>Job</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th data-sortable="false">Change Role</th>
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
        $("#example1").DataTable();
    });
    </script>
@endsection