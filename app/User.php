<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Student_Of_Class;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'job',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function classes()
    {
        return $this->hasMany('App\Classes', 'user_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany('App\Comments', 'user_id', 'id');
    }
    public function student_of_class()
    {
        return $this->belongsTo('App\Student_Of_Class', 'id','user_id');
    }

    public function lesson()
    {
        return $this->hasMany('App\Lessons', 'user_id', 'id');
    }

    public function hasClass($class_id)
    {
        $user_id = Auth::user()->id;
        $temp = Student_Of_Class::where(['class_id' => $class_id, 'user_id' => $user_id])->get();
        if(count($temp) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isOwner($class_id)
    {
        $user_id = Auth::user()->id;
        $temp = Classes::where(['id' => $class_id, 'user_id' => $user_id])->get();
        if(count($temp) > 0)
        {
            return true;
        }
        else{
            return false;
        }
    }
}
