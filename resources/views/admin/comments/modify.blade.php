@extends('admin.adminLayout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                            <h3 class="box-title">Modify Commnet</h3>
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

                            <form action="{{ url('adminpage/comment/modify/'.$comment->id) }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                                {{csrf_field()}}
                                <div class="box-body" id="form-body">
                                    <div class="form-group">
                                        <label for="user">User</label>
                                        <input type="text" class="form-control" id="user" name="user" value="{{$comment->user->name}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="Lesson">Lesson - Class (of that lesson)</label>
                                        <select class="form-control" name="lesson_id">
                                            @foreach($lessons as $lesson)
                                                <option value="{{ $lesson->id }}"
                                                @if ($lesson->id == $comment->lesson->id)
                                                    {{ "selected" }}
                                                        @endif
                                                >{{ $lesson->title }} - {{$lesson->classes->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea col="30" row="10" class="form-control" id="content" placeholder="Enter Content" name="content" required>{{$comment->content}}</textarea>
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