<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Classes;
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
        $classes = Classes::all();
        $categories = Categories::all();
        return view('admin.class_category.add', ['classes' => $classes, 'categories' => $categories]);
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
    public function getModify($class_category_id)
    {
        $class_category = Class_Category::find($class_category_id);
        $categories = Categories::all();
        return view('admin.class_category.modify', ['class_category' => $class_category, 'categories' => $categories]);
    }
    public function postModify($class_category_id, Request $request)
    {
        $class_category = Class_Category::find($class_category_id);
        $class_category->category_id = $request->category_id;

        $class_category->save();
        return redirect('adminpage/class_category/modify/'.$class_category_id)->with('noti', 'Sửa thành công');
    }
}
