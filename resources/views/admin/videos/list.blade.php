@extends('admin.adminLayout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Headewrapperr (Page header) -->
        <section class="content-header">
            <h1>
                Video Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Manager Video</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Video</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- notification -->
                            @if (session('noti'))
                                <div class="alert alert-success">
                                    {{ session('noti') }}
                                </div>
                            @endif

                            <table id="list_video" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Lesson</th>
                                    <th>Class</th>
                                    <th>Path</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Modify</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                        <td>{{$video->id}}</td>
                                        <td>{{$video->user->name}}</td>
                                        <td>{{$video->lesson->title}}</td>
                                        <td>{{$video->lesson->classes->name}}</td>
                                        <td>{{$video->path}}</td>
                                        <td>{{$video->created_at}}</td>
                                        <td>{{$video->updated_at}}</td>
                                        <td class="text-center"><a href="{{ url('adminpage/video/modify/'.$video->id) }}"><button class="btn btn-warning"><span class="fa fa-edit"></span></button></a></td>
                                        <td class="text-center"><a href="{{ url('adminpage/video/delete/'.$video->id) }}"><button class="btn btn-warning"><span class="fa fa-trash "></span></button></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Lesson</th>
                                    <th>Class</th>
                                    <th>Path</th>
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
            $("#list_video").DataTable();
        });
    </script>
@endsection