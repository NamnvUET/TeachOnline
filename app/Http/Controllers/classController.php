<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Classes;

use App\User;

class classController extends Controller
{
    //
    public function getList()
    {
        $classes = Classes::all();
        return view('admin.classes.list', ['classes' => $classes]);
    }

    public function getAdd()
    {
        $users = User::all();
        return view('admin.classes.add', ['users' => $users]);
    }
    public function postAdd(Request $request)
    {
        $class = new Classes;
        $class->user_id = $request->user_id;
        $class->name = $request->name;
        $class->name_without_sign = changeTitle($request->name);
        $class->description = $request->description;
        $class->goal = $request->goal;
        $class->view = 0;
        $class->student_number = 0;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = strtolower($file->getClientOriginalExtension());
            $path = "[teach-online]".str_random(10).'-'.$name;
            $file->move('public/image',$path);
            $class->image = $path;
        }
        $class->save();
        return redirect('adminpage/class/add')->with('noti', 'Thêm thành công');
    }

    public function getModify($id)
    {
        $class = Classes::find($id);
        return view('admin.classes.modify', ['class' => $class]);
    }

    public function postModify($id, Request $request)
    {
        $class = Classes::find($id);
        $class->name = $request->name;
        $class->description = $request->description;
        $class->goal = $request->goal;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $extension = strtolower($file->getClientOriginalExtension());
            $path = "[teach-online]".str_random(10).'-'.$name;
//            unlink("public/image/".$class->path);
            $file->move('public/image',$path);
            $class->image = $path;
        }
        $class->save();
        return redirect('adminpage/class/modify/'.$id)->with('noti', 'Sửa thông tin lớp học thành công');
    }

    public function getDelete($id)
    {
        $class = Classes::find($id);
        $class->delete();
        return redirect('adminpage/class/list')->with('noti', 'Xóa tài liệu thành công');
    }
}
