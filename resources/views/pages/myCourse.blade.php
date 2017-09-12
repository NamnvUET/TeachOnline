@extends('layouts.index')
<style>
    .new-course-content{
        min-height: 300px;
        text-align: center;
        cursor: pointer;
        background-color: #fff;
    }
    .course-content{
        border: 1px solid #cccccc;
    }
    .course-thumb{
        position: relative;
    }
    .overlay{
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0;
        margin: 0px;
        justify-content: center;
        align-items: center;
        transition: all;
        transition-duration: 0.5s;
        display: flex;
        background-color: #008CBA;
    }
    .overlay:hover{
        opacity: 0.8;
    }
    .infoCourse-button{
        color: white;
        font-size: 18px;
        padding-top: 5px;
        text-decoration: none;
        height: 40px;
        width: 120px;
        border: 3px solid white;
    }
    .infoCourse-button:hover{
        background-color: transparent;
        border: 3px solid black;
        color: black;
        transition: 0.5s;background-color: transparent;
        border: 3px solid black;
        color: black;
        transition: 0.5s;
    }
    .courseInfo hr{
            margin-top: 10px;
            margin-bottom: 10px;
    }
    .otherInfo{
        margin-bottom: 10px;
    }
    ul.nav-menu > li{
        list-style: none;
        padding: 5px 10px 5px 10px;
        color: white;
        font-size: 18px;
    }
    ul.nav-menu > li:hover{
        background-color: #5589b6;
        color: white;
    }
    ul.nav-menu > li.active > a{
        background-color: #5589b6;
        color: white;
    }
</style>
@section('content')
    <section class="myCourse" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <img src="public/avatar/{{ Auth::user()->avatar }}" alt="userAvatar" style="width:250px;height:250px;box-shadow: 5px 5px #ccc;">
                    <div class="myName" style="clear: both;
                                                    margin-top: 20px;
                                                    background: #31708f;
                                                    width: 100%;
                                                    text-align: left;
                                                    padding: 10px !important;
                                                    font-size: 13pt;
                                                    font-weight: bold;
                                                    color: #fff !important;">
                        {{Auth::user()->name}}
                    </div>
                    <ul class="nav nav-pills nav-stacked nav-menu">
                        <li><a href="{{ url('editMyProfile') }}" id="title-nav"><span class="fa fa-pencil" style="margin-right: 10px"></span> Chỉnh sửa thông tin</a></li>
                        <li class="active"><a href="{{ url('myCourse') }}" id="title-nav"><span class="fa fa-book" style="margin-right: 10px"></span> Khóa học của tôi</a></li>
                        <li><a href="{{ url('ownerCourse') }}" id="title-nav"><span class="fa fa-list" style="margin-right: 10px"></span> Khóa học đã tạo</a></li>
                    </ul>
                </div>
                <div class="col-xs-8">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">
                            <h3>Khóa học của tôi</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="titleInfo" style="padding-left: 15px;margin-bottom: 15px">
                                    <h3><i>Bạn đã tham gia tất cả {{count($myclasses)}} khóa học</i></h3>
                                </div>
                                @foreach($myclasses as $myclass)
                                    {{--<a href="{{url('learn/class/'.$myclass->id. '/'.$myclass->name_without_sign)}}">{{$myclass->name}}</a>--}}
                                    <div class="col-md-4 new-course-content">
                                        <div class="course-content">
                                            <div class="link-course">
                                                <div class="course-thumb">
                                                    <img src="{{asset('public/image/image1.jpg')}}" alt="image1" style="width: 100%;height: 150px">
                                                    <div class="overlay flex-container text-center">
                                                        @if(Auth::check() && Auth::user()->hasClass($myclass->id))
                                                            <a href="{{url('learn/class/'.$myclass->id.'/'.$myclass->name_without_sign)}}" class="infoCourse-button" aria-hidden="true" style="text-decoration: none">Học tiếp</a>
                                                        @else
                                                            <a href="{{url('class/'.$myclass->id.'/'.$myclass->name_without_sign)}}" class="infoCourse-button" aria-hidden="true">Chi tiết</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="courseInfo">
                                                <h4>{{$myclass->name}}</h4>
                                                <div class="author">
                                                    <span>Người đăng: {{$myclass->user->name}}</span>
                                                    <hr>
                                                </div>
                                                <div class="otherInfo">
                                                    <span style="text-align: left"> {{$myclass->view}} views</span>
                                                    <span style="text-align: right">{{$myclass->student_number}} students</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-xs-12">
                                {{ $myclasses->render() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection