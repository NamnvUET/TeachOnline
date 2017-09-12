<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_Of_Class extends Model
{
    //
    protected $table = "student_of_class";

    public function student()
    {
        return $this->hasMany('App\User', 'id', 'user_id');
    }
    public function classes()
    {
        return $this->hasMany('App\Classes', 'id', 'class_id');
    }
}
