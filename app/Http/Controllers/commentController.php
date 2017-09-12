<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\Comments;

use App\Lessons;

use App\User;

class commentController extends Controller
{
    //
    public function getList()
    {
        $comments = Comments::all();
        return view('admin.comments.list', ['comments' => $comments]);
    }
    public function getModify($id)
    {
        $comment = Comments::find($id);
        $lessons = Lessons::all();
        return view('admin.comments.modify', ['comment' => $comment, 'lessons' => $lessons]);
    }
    public function postModify($id,Request $request)
    {
        $comment = Comments::find($id);
        $comment->lesson_id = $request->lesson_id;
        $comment->content = $request->content;

        $comment->save();
        return redirect('adminpage/comment/modify/'.$id)->with('noti','Sửa thông tin thành công');
    }
    public function getDelete($id)
    {
        $comment = Comments::find($id);
        $comment->delete();

        return redirect('adminpage/comment/list')->with('noti', 'Xóa comment thành công');
    }

    public function postComment(Request $request, $lesson_id, $name_without_sign)
    {
        $comment = new Comments;
        if ($request->content != "")
        {
            $comment->content = $request->content;
            $comment->user_id = Auth::user()->id;
            $comment->lesson_id = $lesson_id;
            $comment->is_checked = 0;

            $comment->save();
            return redirect('lesson/'.$lesson_id.'/'.$name_without_sign);
        }
    }
}
