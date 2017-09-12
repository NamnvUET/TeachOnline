@extends('admin.adminLayout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Document Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Manager Document</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Class</h3>
                            <a href="{{url('adminpage/document/add')}}" style="float: right">Thêm mới</a>
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
                                    <th>Lesson</th>
                                    <th>Class</th>
                                    <th>Path</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    {{--<th>Modify</th>--}}
                                    {{--<th>Delete</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($documents as $document)
                                    <tr>
                                        <td>{{$document->id}}</td>
                                        <td>{{$document->user->name}}</td>
                                        <td>{{$document->lesson->title}}</td>
                                        <td>{{$document->lesson->classes->name}}</td>
                                        <td>{{$document->path}}</td>
                                        <td>{{$document->created_at}}</td>
                                        <td>{{$document->updated_at}}</td>
                                        {{--<td class="text-center"><a href="{{ url('adminpage/document/modify/'.$document->id) }}"><button class="btn btn-warning"><span class="fa fa-edit"></span></button></a></td>--}}
                                        {{--<td class="text-center"><a href="{{ url('adminpage/document/delete/'.$document->id) }}"><button class="btn btn-warning"><span class="fa fa-trash "></span></button></a></td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Lesson</th>
                                    <th>Path</th>
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
            $("#class_list").DataTable({
            });
        });
    </script>
@endsection