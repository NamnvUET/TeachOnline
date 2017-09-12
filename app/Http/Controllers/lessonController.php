<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Lessons;
use App\Classes;

class lessonController extends Controller
{
    //
    public function getList()
    {
        $lessons = Lessons::all();
        return view('admin.lessons.list', ['lessons' => $lessons]);
    }
    public function getAdd()
    {
        $class = Classes::all();
        return view('admin.lessons.add', ['classes' => $class]);
    }

    public function postAdd(Request $request)
    {
        $lesson = new Lessons();
        $lesson->class_id = $request->class_id;
        $class = Classes::find($request->class_id);
        if(count($class) == 0){
            return redirect('adminpage/lesson/add')->with('noti', 'Lớp học không tồn tại');
        }
        $lesson->user_id = $class->user_id;
        $lesson->title = $request->title;
        $lesson->title_without_sign = changeTitle($request->title);
        $lesson->want_check_comment = $request->want_check_comment;
        if($request->hasFile('document'))
        {
            $file = $request->file('document');
            $name = $file->getClientOriginalName();
            $extension = strtolower($file->getClientOriginalExtension());
            $path = "[teach-online]".str_random(10).'-'.$name;
            $file->move('public/document',$path);
            $lesson->path = $path;
        }
        $lesson->save();
        return redirect('adminpage/lesson/add')->with('noti', 'Thêm thành công');
    }

    public function getModify($id)
    {
        $lesson = Lessons::find($id);
        $classes = Classes::all();
        return view('admin.lessons.modify', ['lesson' => $lesson, 'classes' => $classes]);
    }
    public function postModify($id, Request $request)
    {
        $lesson = Lessons::find($id);
        $lesson->title = $request->title;
        $lesson->class_id = $request->class_id;
        $lesson->want_check_comment = $request->want_check_comment;

        $lesson->save();
        return redirect('adminpage/lesson/modify/'.$id)->with('noti','Sửa thông tin thành công');
    }
    public function getDelete($id)
    {
        $lesson = Lessons::find($id);
        $lesson->delete();
        return redirect('adminpage/lesson/list')->with('noti', 'Xóa bài học thành công');
    }
}
