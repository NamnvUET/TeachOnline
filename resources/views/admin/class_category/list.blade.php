@extends('admin.adminLayout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Class Category Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Manager Class Category</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Class</h3>
                            <a href="{{url('adminpage/class_category/add')}}" style="float: right">Thêm mới</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- notification -->
                            @if (session('noti'))
                                <div class="alert alert-success">
                                    {{ session('noti') }}
                                </div>
                            @endif

                            <table id="class_category_list" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Class</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Modify</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($class_category as $class_category_item)
                                    <tr>
                                        <td>{{$class_category_item->category_id}}</td>
                                        <td>{{$class_category_item->class_id}}</td>
                                        <td>{{$class_category_item->created_at}}</td>
                                        <td>{{$class_category_item->updated_at}}</td>
                                        <td class="text-center"><a href="{{ url('adminpage/class_category/modify/'.$class_category_item->class_id) }}"><button class="btn btn-warning"><span class="fa fa-edit"></span></button></a></td>
                                        <td class="text-center"><a href="{{ url('adminpage/class_category/delete/'.$class_category_item->class_id) }}"><button class="btn btn-warning"><span class="fa fa-trash "></span></button></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Category</th>
                                    <th>Class</th>
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
            $("#class_category_list").DataTable({
            });
        });
    </script>
@endsection