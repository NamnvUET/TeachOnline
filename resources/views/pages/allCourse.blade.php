@extends('layouts.index')
<link rel="stylesheet" type="text/css" href="{{asset('public/css/allCourse.css')}}">
@section('content')
    <!-- BANNER -->
    <section id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active one" style="background-image: url('{{asset('public/image/banner.jpg')}}')">
                <div class="banner-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1>Teach Online</h1>
                                <p>Trang Web học trực tuyến qua video</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item two" style="background-image: url('{{asset('public/image/banner.jpg')}}')">
                <div class="banner-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <h1>Teach Online</h1>
                                <p>Được phát triển thử nghiệm bởi sinh viên</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container search-banner">
                <div class="row">
                    <div class="col-xs-12">
                        <form action="#" method="post">
                            {{--<div class="col-lg-6">--}}
                            <div class="input-group">
                                <input type="text" class="form-control keyword" name="k" placeholder="Nhập từ khóa cần tìm....">
                                <span class="input-group-btn">
                                        <button class="btn btn-primary keyword" style="width:50px;" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                            </div>
                            {{--</div>--}}
                        </form>

                        <a  href="#simple_and_pure_design" class="fa fa-angle-down fa-3x" aria-hidden="true"></a>
                    </div>
                </div>
            </div>
            <a id="simple_and_pure_design"></a>
        </div>

        <!-- Left Right Controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>
    <!-- END BANNER -->
    <!-- New COURSE -->
    <section class="new-course">
        @if(!isset($category))
            <div class="all-course-title text-center">
                <h3>Toàn bộ các khóa học hiện có</h3>
            </div>
        @else
            <div class="new-course-title text-center">
                <h3>Các khóa học trong danh mục {{$category->name}}</h3>
            </div>
        @endif
        <div class="list-new-course container">
            <div class="row">
                @if(count($classes))
                    @foreach($classes as $class)
                        <div class="col-md-3 new-course-content">
                            <div class="course-content">
                                <div class="link-course">
                                    <div class="course-thumb">
                                        <img src="{{asset('public/image/'.$class->image)}}" alt="image1">
                                        <div class="overlay flex-container text-center">
                                            @if(Auth::check() && Auth::user()->hasClass($class->id))
                                                <a href="{{url('learn/class/'.$class->id.'/'.$class->name_without_sign)}}" class="infoCourse-button" aria-hidden="true">Học tiếp</a>
                                            @else
                                                <a href="{{url('class/'.$class->id.'/'.$class->name_without_sign)}}" class="infoCourse-button" aria-hidden="true">Chi tiết</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="courseInfo">
                                    <h4>{{$class->name}}</h4>
                                    <div class="author">
                                        <span>Người đăng: {{$class->user->name}}</span>
                                        <hr>
                                    </div>
                                    <div class="otherInfo">
                                        <span style="text-align: left"> {{$class->view}} views</span>
                                        <span style="text-align: right">{{$class->student_number}} students</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <div class="row text-center">
                            <div class="col-xs-12">
                                {{ $classes->render() }}
                            </div>
                        </div>
                @else
                    <span>Danh mục này hiện chưa có lớp học nào</span>
                @endif
            </div>
        </div>
    </section>
    <!-- END NEW COURSE -->
    <!-- STAY WITH US-->
    <section class="form--box" id="stay_with_us" style="background-image: url('{{asset('public/image/stay_image.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form--title">
                        <h3>Stay with us</h3>
                        <p>We ensure quailty & support</p>
                    </div>

                    <form action="#" id="form-id">
                        <div class="form-group name">
                            <input type="text" name="fullname" placeholder="Full Name" class="form-control" id="fullname">
                            <span type="hidden" id="fullname_errors"></span>
                        </div>
                        <div class="form-group email">
                            <input type="text" name="email" placeholder="Email Address" class="form-control" id="email">
                            <span type="hidden" id="email_errors"></span>
                        </div>
                        <div class="form-group messsage">
                            <textarea name="message" cols="30" rows="10" placeholder="Message" class="form-control" id="message"></textarea>
                            <span type="hidden" id="message_errors"></span>
                        </div>
                        <div class="form--submit">
                            <div class="row">
                                <div class="col-md-6" id="remember_me">
                                    <input type="checkbox" name="check" id="form--checbox">
                                    <label for="form--checbox">Subscribe Newsletter</label>
                                </div>
                                <div class="col-md-6" id="submit_btn">
                                    <button type="submit" name="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END STAY WITH US-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6 copyright">
                    <span>Copyright 2014 STRICT</span>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6 social">
                    <a class="fa fa-facebook" aria-hidden="true"></a>
                    <a class="fa fa-twitter" aria-hidden="true"></a>
                    <a class="fa fa-google-plus" aria-hidden="true"></a>
                    <a class="fa fa-linkedin" aria-hidden="true"></a>
                </div>
            </div>
        </div>
    </footer>
@endsection