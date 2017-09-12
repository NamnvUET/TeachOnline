<?php

namespace App\Http\Controllers;

use App\Documents;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Categories;

use App\Class_Category;

use App\Classes;

use App\Videos;

use App\Lessons;

use App\User;

use App\Comments;

use App\Student_Of_Class;

use Illuminate\Pagination\Paginator;

class PageController extends Controller
{
    function __construct() {
        $categories = Categories::all();
        view()->share('categories', $categories);
    }
    //Lấy trang chủ của Website
    public function home()
    {
        $classes = Classes::limit(8)->orderBy('updated_at')->get();
        return view('pages.home')->with('classes', $classes);
    }

    //Lấy danh sách các khóa học thuộc một danh mục nào đó
    public function category($id)
    {
        $category = Categories::select('name')->find($id);
        $class_category = Class_Category::select('class_id')->where('category_id', '=', $id);
        $classes = Classes::whereIn('id', $class_category)->paginate(8);
//        $classes_id = Classes::select('id')->whereIn('id', $class_category)->get();
//        $students = Student_Of_Class::whereIn('class_id', $classes_id)->get();
        return view('pages.allCourse')->with(['classes' => $classes, 'category' => $category]);
    }

    // Lấy danh sách toàn bộ khóa học trong hệ thống
    public function allCourse()
    {
        $classes = Classes::paginate(8);
        return view('pages.allCourse')->with('classes', $classes);
    }
    //Search
    public function postSearch(Request $request)
    {
        $keyword = $request->keyword;
        $key_no_sign = changeTitle($keyword);
        $categories = Categories::where('name_without_sign' ,'like' , "%$key_no_sign%")
            ->orWhere('description' , 'like', "%$keyword%")->paginate(4);
        $classes = Classes::where('name_without_sign', 'like', "%$key_no_sign%")
                    ->orWhere('description', 'like', "%$keyword%")
                    ->orWhere('goal', 'like', "%$keyword%")->paginate(4);
        $lessons = Lessons::where('title_without_sign', 'like', "%$key_no_sign%")->paginate(4);
        return view('pages.home')->with(['classes' => $classes, 'categories' => $categories, 'lessons' => $lessons,'keyword' => $keyword]);
    }

    // Xem thông tin cơ bản của khóa học
    public function classinfo($id)
    {
        $class = Classes::find($id);
        $class->view += 1;
        $number_student = count(Student_Of_Class::where('class_id', '=', $id)->get());
        $lessons = Lessons::where('class_id', $id)->orderBy('created_at')->get();
        $class->save();
        return view('pages.CourseInfo', ['class' => $class, 'number' => $number_student, 'lessons' => $lessons]);
    }

    // Xử lý thao tác đăng kí tham gia khóa học của người dùng
    public function registerClass($user_id, $class_id)
    {
        $class = Classes::find($class_id);
        $student_of_class = new Student_Of_Class;
        $student_of_class->user_id = $user_id;
        $student_of_class->class_id = $class_id;
        $class->student_number += 1;
        $student_of_class->save();
        $class->save();
        return redirect('learn/class/'.$class_id.'/'.$class->name_without_sign);
    }

    // Lấy danh sách các lesson trong 1 khóa học đã được đăng kí
    public function getClass($class_id)
    {
        if(Auth::User()->hasClass($class_id))
        {
            $class = Classes::find($class_id);
            $lessons = Lessons::where('class_id' ,'=', $class_id)->get();
            $class->view +=1;
            $class->save();
            return view('pages.learningCourse')->with(['class' => $class, 'lessons' => $lessons]);
        }
        else{
            $class = Classes::find($class_id);
            return redirect('class/'.$class_id.'/'.$class->name_without_sign);
        }
    }

    //Vào học một bài học cụ thể
    public function getLesson($lesson_id)
    {
        $lesson = Lessons::find($lesson_id);
        $class = $lesson->classes;
        if(Auth::User()->hasClass($class->id))
        {
            $sameClassLesson = Lessons::where('class_id', '=', $class->id)->get();
            if($lesson->want_check_comment == 1)
            {
                $comments = Comments::where(['lesson_id' => $lesson_id, 'is_checked' => 1])->orderBy('created_at')->get();
            }
            else{
                $comments = Comments::where('lesson_id', '=', $lesson->id)->orderBy('created_at')->get();
            }
            return view('pages.learningLesson')->with(['lesson' => $lesson, 'class' => $class, 'sameClassLesson' => $sameClassLesson, 'comments' => $comments]);
        }
        else
        {
            return redirect('class/'.$class->id.'/'.$class->name_without_sign);
        }
    }

    // Xem danh sách các khóa học liên quan đến người dùng
    public function getmyCourse()
    {
        $myClassID = Student_Of_Class::select('class_id')->where('user_id', '=', Auth::user()->id)->get();
        $myClasses = Classes::whereIn('id', $myClassID)->paginate(6);
        return view('pages.myCourse')->with(['myclasses' => $myClasses]);
    }

    public function getOwnerCourse()
    {
        $myOwnerClasses = Classes::where('user_id', '=', Auth::user()->id)->paginate(6);
        return view('pages.ownerCourse')->with(['myOwnerClasses' => $myOwnerClasses]);
    }

    public function getModifyClass($class_id)
    {
        if(Auth::user()->isOwner($class_id))
        {
            $class = Classes::find($class_id);
            return view('pages.ModifyAndUpload.modifyClass')->with(['class' => $class]);
        }
        else{
            return redirect('home');
        }
    }

    public function getListLesson($class_id)
    {
        if(Auth::user()->isOwner($class_id))
        {
            $class = Classes::find($class_id);
            $lessons = Lessons::where('class_id' , '=', $class_id)->get();

            return view('pages.ModifyAndUpload.listLesson')->with(['class' => $class, 'lessons' => $lessons]);
        }
        else{
            return redirect('home');
        }
    }

    public function postModifyClass($class_id, Request $request)
    {
        if(Auth::user()->isOwner($class_id))
        {
            $class = Classes::find($class_id);
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
            return redirect('manageClass/'.$class_id. '/'.$class->name_without_sign)->with('noti', 'Sửa thông tin lớp học thành công');
        }
        else{
            return redirect('home');
        }
    }

    public function getAddLesson($class_id)
    {
        if(Auth::user()->isOwner($class_id))
        {
            $class = Classes::find($class_id);
            return view('pages.ModifyAndUpload.addLesson')->with('class', $class);
        }
        else{
            return redirect('home');
        }
    }

    public function postAddLesson($class_id, Request $request)
    {
        $class = Classes::find($class_id);
        $lesson = new Lessons;
        $lesson->class_id = $class_id;
        $lesson->user_id  = Auth::user()->id;
        $lesson->title = $request->title;
        $lesson->title_without_sign = changeTitle($request->title);

        if($request->hasFile('document'))
        {
            $file = $request->file('document');
            $name = $file->getClientOriginalName();
            $extension = strtolower($file->getClientOriginalExtension());
            $path = "[teach-online]".str_random(10).'-'.$name;
//            unlink("public/image/".$class->path);
            $file->move('public/document',$path);
            $lesson->path = $path;
        }

        $lesson->save();
        return redirect('manageClass/'.$class_id. '/'.$class->name_without_sign. '/addLesson')->with('noti', 'Thêm bài học thành công');
    }

    public function getModifyLesson($class_id, $class_name, $lesson_id)
    {
        if(Auth::user()->isOwner($class_id))
        {
            $class = Classes::find($class_id);
            $lesson = Lessons::find($lesson_id);

            return view('pages.ModifyAndUpload.modifyLesson')->with(['class'=> $class, 'lesson' => $lesson]);
        }
        else{
            return redirect('home');
        }
    }

    public function postModifyLesson($class_id, $class_name, $lesson_id, Request $request)
    {
        $class = Classes::find($class_id);
        $lesson = Lessons::find($lesson_id);

        $lesson->title = $request->title;
        $lesson->title_without_sign = changeTitle($request->title);

        $lesson->want_check_comment = $request->want_check_comment;

        if($request->hasFile('document'))
        {
            $file = $request->file('document');
            $name = $file->getClientOriginalName();
            $extension = strtolower($file->getClientOriginalExtension());
            $path = "[teach-online]".str_random(10).'-'.$name;
//            unlink("public/image/".$class->path);
            $file->move('public/document',$path);
            $lesson->path = $path;
        }
        $lesson->save();
        return redirect('manageClass/'.$class->id.'/'.$class->name_without_sign.'/modifyLesson/'.$lesson->id)->with('noti', 'Sửa bài học thành công');

    }

    public function postDeleteLesson($class_id, $class_name, $lesson_id)
    {
        $class = Classes::find($class_id);
        $lesson = Lessons::find($lesson_id);
        $lesson->delete();
        return redirect('manageClass/'.$class_id.'/'.$class->name_without_sign.'/listLesson')->with('noti', 'Xóa bài học thành công');
    }

    public function getAllComment($class_id,$class_name,$lesson_id)
    {
        $lesson = Lessons::find($lesson_id);
        $class = $lesson->classes;
        $comments = Comments::where('lesson_id', '=', $lesson->id)->orderBy('created_at')->get();
        return view('pages.ModifyAndUpload.listComment')->with(['lesson' => $lesson, 'class' => $class, 'comments' => $comments]);
    }

    public function  getDuyetComment($class_id, $class_name, $lesson_id)
    {
        $lesson = Lessons::find($lesson_id);
        $class = $lesson->classes;
        $comment = Comments::where(['lesson_id' => $lesson_id, 'is_checked' => 0])->orderBy('created_at')->get();
        return view('pages.ModifyAndUpload.listComment')->with(['lesson' => $lesson, 'class' => $class, 'comments' => $comment, 'duyet' => 1]);
    }

    public function getDeleteComment($class_id, $class_name, $lesson_id, $comment_id)
    {
        $comment = Comments::find($comment_id);
        $comment->delete();
        return redirect('manageClass/'.$class_id.'/'.$class_name.'/'.$lesson_id.'/allcomment')->with('noti', 'Xóa thành công');
    }

    public function getChophep($class_id, $class_name, $lesson_id, $comment_id)
    {
        $comment = Comments::find($comment_id);
        $comment->is_checked = 1;
        $comment->save();
        return redirect('manageClass/'.$class_id.'/'.$class_name.'/'.$lesson_id.'/duyetcomment')->with('noti', 'Cho phép comment hiển thị thành công');
    }
    // Chỉnh sửa thông tin cá nhân của người dùng
    public function getEditMyProfile()
    {
        return view('user.editMyProfile');
    }
}
