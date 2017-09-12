@extends('admin.adminLayout.index')
@section('content')
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
                            <h3 class="box-title">List Lesson</h3>
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
                                    <th>Class</th>
                                    <th>Title</th>
                                    <th>Want Check Comment</th>
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
                                        <td>{{$lesson->classes->name}}</td>
                                        <td>{{$lesson->title}}</td>
                                        <td>
                                            @if($lesson->want_check_comment == 1)
                                                Duyệt comment
                                            @else
                                                Không duyệt trước
                                            @endif
                                        </td>
                                        <td>{{$lesson->created_at}}</td>
                                        <td>{{$lesson->updated_at}}</td>
                                        <td class="text-center"><a href="{{ url('adminpage/lesson/modify/'.$lesson->id) }}"><button class="btn btn-warning"><span class="fa fa-edit"></span></button></a></td>
                                        <td class="text-center"><a href="{{ url('adminpage/lesson/delete/'.$lesson->id) }}"><button class="btn btn-warning"><span class="fa fa-trash "></span></button></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Class</th>
                                    <th>Title</th>
                                    <th>Want Check Comment</th>
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
@endsection