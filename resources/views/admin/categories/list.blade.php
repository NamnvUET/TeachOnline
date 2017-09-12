@extends('admin.adminLayout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Category Page
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Manager Category</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">List Category</h3>
                            <a href="{{url('adminpage/category/add')}}" style="float: right">Thêm mới</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- notification -->
                            @if (session('noti'))
                                <div class="alert alert-success">
                                    {{ session('noti') }}
                                </div>
                            @endif

                            <table id="category_list" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Name Without Sign</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Modify</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->name_without_sign}}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td>{{$category->updated_at}}</td>
                                        <td class="text-center"><a href="{{ url('adminpage/category/modify/'.$category->id) }}"><button class="btn btn-warning"><span class="fa fa-edit"></span></button></a></td>
                                        <td class="text-center"><a href="{{ url('adminpage/category/delete/'.$category->id) }}"><button class="btn btn-warning"><span class="fa fa-trash "></span></button></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Name Without Sign</th>
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
            $("#category_list").DataTable({
            });
        });
    </script>
@endsection