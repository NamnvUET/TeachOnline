<!-- Site wrapper -->
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('home')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Teach Online</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->avatar == NULL)
                                <img src="{{asset('node_modules/admin-lte/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{Auth::user()->name}}</span>
                            @else
                                <img src="{{asset('public/avatar').'/'.Auth::user()->avatar}}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{Auth::user()->name}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if(Auth::user()->avatar == NULL)
                                    <img src="{{asset('node_modules/admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                @else
                                    <img src="{{asset('public/avatar').'/'.Auth::user()->avatar}}" class="img-circle" alt="User Image">
                                @endif

                                <p>
                                    {{Auth::user()->name}}
                                    <small>Member since {{Auth::user()->created_at}}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                {{--<div class="pull-left">--}}
                                    {{--<a href="#" class="btn btn-default btn-flat">Profile</a>--}}
                                {{--</div>--}}
                                <div class="pull-right">
                                    <a href="{{url('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- =============================================== -->
</div>

