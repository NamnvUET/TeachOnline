<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('node_modules/admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="{{url('adminpage/user/list')}}" data="user">
                    <i class="fa fa-dashboard"></i> <span>Manager User</span>
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
                    {{--<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
                {{--</ul>--}}
            </li>
            <li class="treeview">
                <a href="{{url('adminpage/class/list')}}" data="class">
                    <i class="fa fa-dashboard"></i> <span>Manager Class</span>
                    {{--<span class="pull-right-container">--}}
              {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                    {{--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
                    {{--<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
                {{--</ul>--}}
            </li>
            <li class="treeview">
                <a href="{{url('adminpage/lesson/list')}}" data="lesson">
                    <i class="fa fa-dashboard"></i> <span>Manager Lesson</span>
                    {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
                {{--<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
                {{--</ul>--}}
            </li>
            <li class="treeview">
                <a href="{{url('adminpage/comment/list')}}" data="comment">
                    <i class="fa fa-comment"></i> <span>Manager Comment</span>
                    {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
                {{--<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
                {{--</ul>--}}
            </li>
            {{--<li class="treeview">--}}
                {{--<a href="{{url('adminpage/video/list')}}" data="video">--}}
                    {{--<i class="fa fa-file-video-o"></i> <span>Manager Video</span>--}}
                    {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                {{--</a>--}}
                {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
                {{--<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li class="treeview">
                <a href="{{url('adminpage/category/list')}}" data="category">
                    <i class="fa fa-dashboard"></i> <span>Manager Category</span>
                    {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
                {{--<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
                {{--</ul>--}}
            </li>
            <li class="treeview">
                <a href="{{url('adminpage/class_category/list')}}" data="class_category">
                    <i class="fa fa-dashboard"></i> <span>Manager Category of Class</span>
                    {{--<span class="pull-right-container">--}}
                    {{--<i class="fa fa-angle-left pull-right"></i>--}}
                    {{--</span>--}}
                </a>
                {{--<ul class="treeview-menu">--}}
                {{--<li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>--}}
                {{--<li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>--}}
                {{--</ul>--}}
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->