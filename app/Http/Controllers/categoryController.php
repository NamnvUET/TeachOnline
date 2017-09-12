<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Categories;

class categoryController extends Controller
{
    //
    //
    public function getList()
    {
        $categories = Categories::all();
        return view('admin.categories.list', ['categories' => $categories]);
    }

    public function getModify($id)
    {
        $category = Categories::find($id);
        return view('admin.categories.modify', ['category' => $category]);
    }
//
    public function getAdd()
    {
        return view('admin.categories.add');
    }
    public function postAdd(Request $request)
    {
        $category = new Categories;
        $category->name =  $request->name;
        $category->name_without_sign = changeTitle($request->name);
        $category->description = $request->description;
        $category->save();
        return redirect('adminpage/category/add')->with('noti', 'Thêm danh mục thành công');
    }
    public function postModify($id, Request $request)
    {
        $category = Categories::find($id);
        $category->name = $request->name;
        $category->name_without_sign = changeTitle($request->name);
        $category->description = $request->description;

        $category->save();
        return redirect('adminpage/category/modify/'.$id)->with('noti', 'Sửa thông tin danh mục thành công');
    }
//
    public function getDelete($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return redirect('adminpage/category/list')->with('noti', 'Xóa danh mục thành công');
    }
}
