<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;

use Mail;

class UserController extends Controller
{
    //
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
}