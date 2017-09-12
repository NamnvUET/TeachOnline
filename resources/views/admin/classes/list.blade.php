@extends('admin.adminLayout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Class Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Manager Class</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Class</h3>
                            <a href="{{url('adminpage/class/add')}}" style="float: right">Thêm mới</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- notification -->
                            @if (session('noti'))
                                <div class="alert alert-success">
                                    {{ session('noti') }}
                                </div>
                            @endif

                            <table id="class_list" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image Link</th>
                                    <th>Student Number</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Modify</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($classes as $class)
                                    <tr>
                                        <td>{{$class->id}}</td>
                                        <td>{{$class->user->name}}</td>
                                        <td>{{$class->name}}</td>
                                        <td>{{$class->description}}</td>
                                        <td>
                                            <img src="{{asset("public/image/".$class->image)}}" height="50px" alt="">
                                        </td>
                                        <td>{{$class->student_number}}</td>
                                        <td>{{$class->created_at}}</td>
                                        <td>{{$class->updated_at}}</td>
                                        <td class="text-center"><a href="{{ url('adminpage/class/modify/'.$class->id) }}"><button class="btn btn-warning"><span class="fa fa-edit"></span></button></a></td>
                                        <td class="text-center"><a href="{{ url('adminpage/class/delete/'.$class->id) }}"><button class="btn btn-warning"><span class="fa fa-trash "></span></button></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image Link</th>
                                    <th>Student Number</th>
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
            $("#class_list").DataTable({
            });
        });
    </script>
@endsection