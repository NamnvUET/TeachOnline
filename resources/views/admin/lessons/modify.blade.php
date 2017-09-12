@extends('admin.adminLayout.index')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
                            <h3 class="box-title">Modify Lesson</h3>
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

                            <form action="{{ url('adminpage/lesson/modify/'.$lesson->id) }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                                {{csrf_field()}}
                                <div class="box-body" id="form-body">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="tile" name="title" value="{{$lesson->title}}" placeholder="Enter title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Class</label>
                                        <select class="form-control" name="class_id">
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}"
                                                @if ($class->id == $lesson->classes->id)
                                                    {{ "selected" }}
                                                        @endif
                                                >{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="want_check_comment">Duyệt Comment</label>
                                        <select class="form-control" name="want_check_comment" required>
                                            <option value="0"
                                                @if($lesson->want_check_comment == 0)
                                                    {{"selected"}}
                                                @endif
                                            >Không</option>
                                            <option value="1"
                                            @if($lesson->want_check_comment == 1)
                                                {{"selected"}}
                                                    @endif
                                            >Có</option>
                                        </select>
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