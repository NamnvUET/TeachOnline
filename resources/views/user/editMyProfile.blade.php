@extends('layouts.index)
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add User</h3>
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

                        <form action="{{ url('adminpage/user/add') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                            {{csrf_field()}}
                            <div class="box-body" id="form-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone_number" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="job">Job</label>
                                    <input type="text" class="form-control" id="job" name="job" placeholder="job">
                                </div>
                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" class="form-control" name="avatar" accept=".JPG, .PNG" required>
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
@endsection