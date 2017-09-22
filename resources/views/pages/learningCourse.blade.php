@extends('layouts.index')

@section('content')

<!-- Content Class -->
<section class="class-content" style="margin-top: 71px">
    <div class="headerCourseStatus" style="background-color: darkslategray;font-family: 'Roboto',sans-Serif;">
        <div class="container">
            <div class="row">
                <div class="col-md-5 imageHeaderCourseStatus" style="padding-top: 3%;padding-bottom: 3%">
                    <div class="row">
                        <img src="{{asset('public/image/'.$class->image)}}" alt="img1" width="480px" height="270px" style="width: 100%">
                    </div>
                </div>
                <div class="col-md-7 rightHeaderCourseStatus" style="padding: 3%">
                    <div class="titleCourseStatus" style="color: #fff; font-size: 25px">
                        {{$class->name}}
                    </div>
                    <div class="author" style="color: #fff;">
                        Nguoi tao: {{$class->user->name}}
                    </div>
                    <div class="student" style="color: #fff">
                        Số học viên: {{$class->student_number}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="courseBody col-md-12" style="margin-top: 10px; margin-bottom: 10px">
        <div class="row">
            <div class="container tab-menu">
                <div class="row">
                    <ul class="nav nav-tabs text-center" role="tablist">
                        <li role="presentation" class="tab_li active" style="width: 50%"><a href="#nav_tab1" aria-controls="home" role="tab" data-toggle="tab">Giới thiệu</a></li>
                        <li role="presentation" class="tab_li" style="width: 50%"><a href="#nav_tab2" aria-controls="profile" role="tab" data-toggle="tab">Danh sách bài học</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="nav_tab1">
                            <div class="container-fluild">
                                <h3>Gioi thieu ve khoa hoc</h3>
                                <div class="GTKH">
                                    {{$class->description}}
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="nav_tab2">
                            <div class="container-fluild" style="padding: 0px 15px 0px 15px;background-color: #f3f3f3;font-size: 18px;line-height: 1.5">
                                <div class="row">
                                    @if(count($lessons) > 0)
                                        @foreach($lessons as $lesson)
                                            <div class="unitCourse col-xs-12" style="border-bottom: 1px solid #dedede;padding-top: 10px">
                                                <div class="row">
                                                    <div class="col-xs-10 unit" style="font-size: 22px;height: 40px">
                                                        <i class="fa fa-play-circle"></i>
                                                        {{$lesson->title}}
                                                    </div>
                                                    <div class="col-xs-2 join">
                                                        <a href="{{url('/lesson/'.$lesson->id.'/'.$lesson->title_without_sign)}}">Xem bài học</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-center" style="padding-top: 20px">Hiện tại khóa học này chưa có bài học nào cả</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection