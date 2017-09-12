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
                            <h3 class="box-title">Add Class</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- notification -->
                            @if (session('noti'))
                                <div class="alert alert-success">
                                    {{ session('noti') }}
                                </div>
                            @endif

                            @if (session('alert'))
                                <div class="alert alert-danger">
                                    {{ session('alert') }}
                                </div>
                            @endif

                            <form action="{{ url('adminpage/class/add') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                                {{csrf_field()}}
                                <div class="box-body" id="form-body">
                                    <div class="form-group">
                                        {{--<label for="user_id">User ID</label>--}}
                                        {{--<input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter Name">--}}
                                        <select class="form-control" name="user_id" required>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name Class">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text" class="form-control" id="description" name="description" placeholder="Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="goal">Goal</label>
                                        <textarea type="text" class="form-control" id="goal" name="goal" placeholder="goal" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" name="image" accept=".JPG, .PNG" required>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>
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

@endsection