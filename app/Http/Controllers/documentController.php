<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Documents;

class documentController extends Controller
{
    //
    public function getList()
    {
        $documents = Documents::all();
        return view('admin.documents.list', ['documents' => $documents]);
    }

    public function getAdd()
    {
        return view('admin.documents.add');
    }
    public function postAdd(Request $request)
    {
        $document = new Documents;
        $document->lesson_id = $request->lesson_id;
        $document->user_id = $request->user_id;

        if($request->hasFile('document'))
        {
            $file = $request->file('document');
            $name = $file->getClientOriginalName();
            $extension = strtolower($file->getClientOriginalExtension());
            $path = "[teach-online]".str_random(10).'-'.$name;
            $file->move('public/document',$path);
            $document->path = $path;
        }
        $document->save();
        return redirect('adminpage/document/add')->with('noti', 'Thêm thành công');
    }
//
//    public function getModify($id)
//    {
//        $document = Documents::find($id);
//        return view('admin.documents.modify', ['document' => $document]);
//    }
////
//    public function postModify($id, Request $request)
//    {
//        $document = Classes::find($id);
//        $document->name = $request->name;
//        $document->description = $request->description;
//
//        $document->save();
//        return redirect('adminpage/documents/modify/'.$id)->with('noti', 'Sửa thông tin lớp học thành công');
//    }
//
//    public function getDelete($id)
//    {
//        $document = Classes::find($id);
//        $class->delete();
//        return redirect('adminpage/class/list')->with('noti', 'Xóa tài liệu thành công');
//    }
}

