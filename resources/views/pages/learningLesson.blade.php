@extends('layouts.index')

@section('content')

    <!-- Content Class -->
    <section class="lesson-content container-fluid" style="margin-top: 100px">
        {{--<div class="col-xs-12">--}}
        <div class="row">
            <div class="col-xs-8">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h2 class="panel-title" style="font-size: 20px;font-weight: bold">{{$lesson->title}}</h2>
                    </div>
                    <div class="panel-body">
                        <embed src="public/document/{{ $lesson->path }}" width="100%" height="600px" alt="pdf" pluginspage="http://www.adobe.com/products/acrobat/readstep2.html">
                    </div>
                    {{--<div class="panel-footer">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-xs-4">--}}
                                {{--<a href="#"><i class="fa fa-arrow-left fa-2x"></i></a>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-4">--}}
                                {{--<a href="#"><i class="fa fa-arrow-left fa-2x"></i></a>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-4">--}}
                                {{--<a href="#"><i class="fa fa-arrow-left fa-2x"></i></a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col-xs-4">
                <div class="row">
                    <ul class="nav nav-tabs text-center" role="tablist">
                        <li role="presentation" class="tab_li active" style="width: 30%"><a href="#nav_tab1"
                                                                                            aria-controls="home"
                                                                                            role="tab"
                                                                                            data-toggle="tab">Danh sách
                                </a></li>
                        <li role="presentation" class="tab_li" style="width: 70%"><a href="#nav_tab2"
                                                                                     aria-controls="profile" role="tab"
                                                                                     data-toggle="tab">Bình luận</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="nav_tab1">
                            <div class="container-fluild" style="">
                                @if(count($sameClassLesson) > 0)
                                    @foreach($sameClassLesson as $samelesson)
                                        <div class="unitCourse col-xs-12"
                                             style="border-bottom: 1px solid #dedede;padding-top: 10px; background-color: #f3f3f3">
                                            <div class="row">
                                                <div class="col-xs-10 unit" style="font-size: 18px;height: 40px">
                                                    <i class="fa fa-play-circle"></i>
                                                    {{$samelesson->title}}
                                                </div>
                                                <div class="col-xs-2 join">
                                                    <a href="{{url('/lesson/'.$samelesson->id.'/'.$samelesson->title_without_sign)}}">Xem bài</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{$sameClassLesson->render()}}
                                @else
                                    <p class="text-center" style="padding-top: 20px">Hiện tại khóa học này chưa có bài
                                        học nào cả</p>
                                @endif
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="nav_tab2">
                            <div class="container-fluild"
                                 style="padding: 0px 15px 0px 15px;background-color: #f3f3f3;font-size: 18px;line-height: 1.5">
                                <div class="row">
                                    @foreach($comments as $comment)
                                        <div class="unitComment col-xs-12"
                                             style="border-bottom: 1px solid #dedede;padding-top: 10px">
                                            <div class="row">
                                                <div class="col-xs-2 unit" style="">
                                                    <img src="{{asset('public/avatar/'.$comment->user->avatar)}}"
                                                         class="img-circle" width="60px" height="60px" alt="">
                                                </div>
                                                <div class="col-xs-10 join">
                                                    <h4 class="media-heading"><a href="#">{{ $comment->user->name }}
                                                            @if ($comment->user->is_admin == 1)
                                                                {{ "(Admin)" }}
                                                            @endif
                                                        </a>
                                                        <br>
                                                        <small>{{ $comment->created_at }}</small>
                                                    </h4>
                                                    {{ $comment->content }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="user_comment col-xs-12" style="margin-top: 10px">
                                        @if (Auth::check() && Auth::user()->active == 1)
                                            <div class="comment">
                                                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span>
                                                </h4>
                                                <form role="form"
                                                      action="{{ url('comment/'.$lesson->id.'/'.$lesson->title_without_sign) }}"
                                                      method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="3"
                                                                  name="content"></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        {{--</div>--}}
    </section>
    <!-- END Content Class -->
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