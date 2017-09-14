<style src=></style>
<header>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('home') }}">Teach Online</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li><a href="{{url('aboutme')}}">Giới thiệu</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <strong>Danh mục khóa học</strong>
                        </a>
                        <ul class="dropdown-menu" style="min-width: 600px">
                            <span class="selected"></span>
                            <li>
                                <div class="container-fluid list-category">
                                    <div class="row">
                                        @foreach($categories as $category)
                                        <div class="col-sm-4">
                                            <a href="{{url('category/'.$category->id.'/'.$category->name_without_sign)}}" style="text-decoration: none">
                                                <i class="fa fa-database"></i>
                                                <span>{{$category->name}}</span>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <form action="{{url('search')}}" method="post" class="navbar-form" id="header-search">
                            <div class="input-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa cần tìm....">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary keyword" style="width:50px;" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right account">
                    @if (!(Auth::check() && Auth::user()->active == 1))
                        <li><a href="{{ url('signup') }}">Đăng ký</a></li>
                        <li><a href="{{ url('login') }}">Đăng nhập</a></li>
                    @else
                        <li><a href="{{url('myCourse')}}">Khóa học của tôi</a></li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->avatar)
                                    <img src="{{asset('public/avatar/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
                                @else
                                    <img src="{{asset('node_modules/admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                @endif

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('myCourse')}}">Khóa học của tôi</a></li>
                                <li><a href="{{url('editMyProfile')}}">Chỉnh sửa thông tin</a></li>
                                <li role="separator" class="divider"></li>
                                @if((Auth::check() && Auth::user()->is_admin == 1))
                                    <li><a href="{{url('adminpage/user/list')}}">Trang BackEnd Quản lí</a></li>
                                @endif
                                <li role="separator" class="divider"></li>
                                <li><a href="{{url('logout')}}">Đăng xuất</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
{{--</body>--}}
