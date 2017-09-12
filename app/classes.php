<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    //
    protected $table = "classes";

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function lesson()
    {
        return $this->hasMany('App\Lessons','class_id', 'id');
    }

    public function class_category()
    {
        return $this->belongsTo('App\Class_Category', 'class_id', 'class_id');
    }
    public function student_of_class()
    {
        return $this->belongsTo('App\Student_Of_Category');
    }
}
