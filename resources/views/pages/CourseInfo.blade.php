@extends('layouts.index')
<link rel="stylesheet" type="text/css" href="{{asset('public/css/classInfo.css')}}">
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="main_detail">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">
                            <h1>{{ $class->name }}</h1>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12 base-info">
                                <div class="row">
                                    <div class="col-xs-4">
                                       <i class="fa fa-user"></i>
                                        <span>{{$class->user->name}}</span>
                                    </div>
                                    <div class="col-xs-4">
                                        <i class="fa fa-dashboard"></i>
                                        <span>{{$class->view}} lượt xem</span>
                                    </div>
                                    <div class="col-xs-4">
                                        <i class="fa fa-dashboard"></i>
                                        <span>{{$class->student_number}} học viên</span>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="description">
                                <h4 style="text-decoration: underline">Giới thiệu khóa học:</h4>
                                <span>+{{$class->description}}</span><br>
                                <span>+ Khóa học bao gồm {{count($lessons)}} bài học nhỏ</span>
                            </div>
                            <div class="goal">
                                <h4 style="text-decoration: underline">Mục tiêu khóa học</h4>
                                <span>{{$class->goal}}</span>
                                <hr>
                            </div>
                            <div class="registerClass text-center">
                                <a href="{{url('registerClass'.'/'.Auth::user()->id.'/'.$class->id)}}" class="btn btn-primary">Đăng kí tham gia</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tài liệu liên quan -->
            <div class="col-md-4">
                <div class="right_detail">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">
                            <h2>Các bài học trong khóa</h2>
                        </div>
                        <div class="panel-body">
                            @if(count($lessons))
                                @foreach($lessons as $lesson)
                                    <p>{{$lesson->title}}</p>
                                @endforeach
                            @else
                                Khóa học này hiện chưa có bài học nào cả
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection