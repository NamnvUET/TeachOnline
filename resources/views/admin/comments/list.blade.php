@extends('admin.adminLayout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Headewrapperr (Page header) -->
        <section class="content-header">
            <h1>
                Comment Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Manager Comment</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Comment</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- notification -->
                            @if (session('noti'))
                                <div class="alert alert-success">
                                    {{ session('noti') }}
                                </div>
                            @endif

                            <table id="list_comment" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Lesson</th>
                                    <th>Class</th>
                                    <th>Content</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    {{--<th>Modify</th>--}}
                                    {{--<th>Delete</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                        <td>{{$comment->user->name}}</td>
                                        <td>{{$comment->lesson->title}}</td>
                                        <td>{{$comment->lesson->classes->name}}</td>
                                        <td>{{$comment->content}}</td>
                                        <td>{{$comment->created_at}}</td>
                                        <td>{{$comment->updated_at}}</td>
                                        {{--<td class="text-center"><a href="{{ url('adminpage/comment/modify/'.$comment->id) }}"><button class="btn btn-warning"><span class="fa fa-edit"></span></button></a></td>--}}
                                        {{--<td class="text-center"><a href="{{ url('adminpage/comment/delete/'.$comment->id) }}"><button class="btn btn-warning"><span class="fa fa-trash "></span></button></a></td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Lesson</th>
                                    <th>Class</th>
                                    <th>Content</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    {{--<th>Modify</th>--}}
                                    {{--<th>Delete</th>--}}
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
            $("#list_comment").DataTable();
        });
    </script>
@endsection