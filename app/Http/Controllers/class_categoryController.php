<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Class_Category;

class class_categoryController extends Controller
{
    //
    public function getList()
    {
        $class_category = Class_Category::all();
        return view('admin.class_category.list', ['class_category' => $class_category]);
    }
    public function getAdd()
    {
        return view('admin.class_category.add');
    }

    public function postAdd(Request $request)
    {
        $temp = Class_Category::where(['category_id' => $request->category_id, 'class_id' => $request->class_id])->get();
        if(count($temp) > 0)
        {
            return redirect('adminpage/class_category/add')->with('noti', 'Đã tồn tại bản ghi này');
        }
        else{
            $class_category = new Class_Category;
            $class_category->category_id = $request->category_id;
            $class_category->class_id = $request->class_id;

            $class_category->save();
            return redirect('adminpage/class_category/add')->with('noti', 'Thêm thành công');
        }
    }
    public function getModìy()
    {

    }
}
