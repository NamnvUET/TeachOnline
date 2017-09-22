@extends('layouts.index')

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
                                <p>Trang Web học trực tuyến qua tài liệu</p>
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
                                <p>Được phát triển thử nghiệm trên FrameWork Laravel</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container search-banner">
                <div class="row">
                    <div class="col-xs-12">
                        <form action="{{url('search')}}" method="post">
                            <div class="col-lg-12">
                                <div class="input-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="text" class="form-control keyword" name="keyword" placeholder="Nhập từ khóa cần tìm...." required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary keyword" style="width:50px;" type="submit"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
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
    <!-- FEATURE-->
    <section class="page--feature">
        <div class="container">
            <div class="row">
                <div class="col-xs-4">
                    <img src="{{asset('public/image/icon_unlimite.jpg')}}" alt="icon1">
                    <h3>Học mãi</h3>
                    <p>Bạn có thể xem lại video mỗi khi bạn cần</p>
                </div>
                <div class="col-xs-4">
                    <img src="{{asset('public/image/icon_teacher.jpg')}}" alt="icon2">
                    <h3>Thảo luận cùng người dạy</h3>
                    <p>Bạn có thể đặt câu hỏi với người dạy</p>
                </div>
                <div class="col-xs-4">
                    <img src="{{asset('public/image/icon_anywhere.jpg')}}" alt="icon3">
                    <h3>Học ở mọi nơi</h3>
                    <p>Bạn có thể theo dõi bài giảng ở mọi nơi</p>
                </div>
                <div class="col-xs-12 text-center">
                    <a href="{{url('allCourse')}}">Xem tất cả khóa học</a>
                </div>
            </div>
        </div>
    </section>
    <!-- END FEATURE-->
    {{--<!-- New COURSE -->--}}
    <section class="new-course">
        <div class="new-course-title text-center">
            @if(!isset($keyword))
                <h3>Các khóa học mới cập nhật</h3>
            @else
                <h3>Tìm kiếm với từ khóa "{{$keyword}}"</h3>
            @endif
        </div>
        <div class="list-new-course container">
            <div class="row">
                @if(!isset($keyword))
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
                @else
                    <h4><b>Danh mục khóa học</b></h4>
                        @if(count($categories) == 0)
                            <span>Không có kết quả nào phù hợp</span>
                        @else
                            <div class="col-md-12 text-left">
                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{url('category/'.$category->id.'/'.$category->name_without_sign)}}" data-toggle="tooltip" title = "{{$category->description}}" style="text-decoration: none">
                                            <span>{{$category->name}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    <hr style="border: 2px solid #cccccc">

                    <h4><b>Khóa học</b></h4>
                        @if(count($classes) > 0)
                                <div class="col-md-12" id="search-result-course">
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
                                </div>
                                {{--<div class="col-xs-12">--}}
                                    {{--{{ $classes->render() }}--}}
                                {{--</div>--}}
                        @else
                            <span>Không có kết quả phù hợp</span>
                        @endif
                    <hr style="border: 2px solid #cccccc">

                    <h4><b>Bài học</b></h4>
                    <div class="col-md-12 text-left">
                        @if(count($lessons) > 0)
                            <table id="search-result-lesson" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="30%">Tên</th>
                                        <th width="20%">Khóa học</th>
                                        <th>Trạng thái</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lessons as $lesson)
                                        <tr>
                                            <td>{{$lesson->title}}</td>
                                            <td>{{$lesson->classes->name}}</td>
                                            <td>
                                                @if(Auth::check() && Auth::User()->hasClass($lesson->classes->id))
                                                    Đã tham gia
                                                @else
                                                    Chưa tham gia
                                                @endif
                                            </td>
                                            <td>
                                                @if(Auth::check() && Auth::User()->hasClass($lesson->classes->id))
                                                    <a href="{{url('/lesson/'.$lesson->id.'/'.$lesson->title_without_sign)}}">Xem bài học</a>
                                                @else
                                                    <a href="{{url('class/'.$lesson->classes->id.'/'.$lesson->classes->name_without_sign)}}">Đăng kí để xem</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-left" style="padding-top: 20px">Không có kết quả phù hợp</p>
                        @endif
                    </div>
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
                    <span>Copyright 8/2017 Nam Nguyễn Văn</span>
                </div>
                <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6 social">
                    <a class="fa fa-facebook" aria-hidden="true" href="https://www.facebook.com/NamNguyenVank59"></a>
                    <a class="fa fa-twitter" aria-hidden="true"></a>
                    <a class="fa fa-google-plus" aria-hidden="true"></a>
                    <a class="fa fa-linkedin" aria-hidden="true"></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('node_modules/admin-lte/dist/js/demo.js')}}"></script>
    <script>
        $(function () {
            $("#search-result-lesson").DataTable({bFilter: false, bInfo: false, bLengthChange: false});
        });
        $('#search-result-course').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
        });
    </script>
@endsection