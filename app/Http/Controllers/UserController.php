<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use App\Categories;
use Mail;

class UserController extends Controller
{
    function __construct() {
        $categories = Categories::all();
        view()->share('categories', $categories);
    }
    //---------------- User Management -----------------------------//
    public function getList()
    {
        $users = User::all();
        return view('admin.users.list', ['users' => $users]);
    }

    public function getAdd()
    {
        return view('admin.users.add');
    }
    public function postAdd(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone_number = $request->phone_number;
        $user->job = $request->job;
        $user->code = 'gg';
        $user->active = 0;
        $user->is_admin = 0;

        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $extension = strtolower($file->getClientOriginalExtension());
            $path = "[teach-online]".str_random(10).'-'.$name;
            $file->move('public/avatar',$path);
            $user->avatar = $path;
        }
        $user->save();
        return redirect('adminpage/user/add')->with('noti', 'Thêm thành công');
    }

    public function getChangeRole($id)
    {
        $user = User::find($id);
        return view('admin.users.changeRole', ['user' => $user]);
    }

    public function postChangeRole($id, Request $request)
    {
        $user = User::find($id);
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect('adminpage/user/changerole/'.$id)->with('noti', 'Đổi quyền thành công');
    }

    //------------- Login, Logout, Send Active Code -----------------------//
    public function getLogin()
    {
        return view('user.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ], [
                'username.required' => 'Bạn chưa nhập tên đăng nhập',
                'password.required' => 'Bạn chưa nhập mật khẩu'
            ]
        );

        $name = $request->username;
        $password = $request->password;

        if (Auth::attempt(['name'=>$name, 'password'=>$password]))
        {
            if (Auth::user()->active == 1)
                return redirect('home');
            else
                return redirect('login')->with('noti', 'Tài khoản chưa được kích hoạt. Vui lòng truy cập email của bạn để kích hoạt!');
        }
        else
        {
            return redirect('login')->with('noti', 'Đăng nhập không thành công');
        }
    }

    public function getSignUp()
    {
        return view('user.signup');
    }

    public function  postSignUp(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:6|max:20|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20',
            'confirmpass' => 'required|same:password',
            'phone_number' => 'required',
            'job' => 'required',
        ], [
                'username.required' => 'Chưa nhập tên đăng nhập',
                'username.min' => 'Tên đăng nhập phải ít nhất có 6 ký tự',
                'username.max' => 'Tên đăng nhập tối đa 20 ký tự',
                'username.unique' => 'Tên đăng nhập đã tồn tại',
                'email.required' => 'Chưa nhập email',
                'email.unique' => 'Email đã tồn tại',
                'email.email' => 'Email không đúng',
                'password.required' => 'Chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải ít nhất có 6 ký tự',
                'password.max' => 'Mật khẩu tối đa có 20 ký tự',
                'confirmpass.required' => 'Chưa nhập lại mật khẩu',
                'confirmpass.same' => 'Mật khẩu không khớp',
                'phone_number.required' => 'Chưa nhập số điện thoại',
                'job.required' => 'Chưa nhập nghề nghiệp'
            ]
        );

        do {
            $code = str_random(30);
            $user_code = User::where('code', $code)->first();
        } while(!empty($user_code));

        $user = new User;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone_number = $request->phone_number;
        $user->job = $request->job;
        $user->code = $code;
        $user->active = 0;
        $user->is_admin = 0;

        Mail::send('user.mail', ['user'=>$user], function ($message) use ($user) {
            $message->from('nguyenvannamk59@gmail.com', 'Teach Online');
            $message->to($user->email, $user->username);
            $message->subject('Active code');
        });

        $user->save();
        return redirect('signup')->with('noti-success', 'Đăng ký tài khoản thành công. Vui lòng truy cập email của bạn để xác nhận kích hoạt tài khoản');
    }

    public function activeCode($code)
    {
        $user = User::where('code', $code)->first();
        if ($user->active == 1)
        {
            echo "Tài khoản này đã được kích hoạt trước đó.";
        }
        else
        {
            $user->active = 1;
            $user->save();
            return redirect('login')->with('noti-success', 'Kích hoạt tài khoản thành công!');
        }
    }

    public function getLogOut(){
        Auth::logout();
        return redirect('home');
    }
}
