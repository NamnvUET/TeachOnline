<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    //
    protected $table = "lessons";

    public function classes()
    {
        return $this->belongsTo('App\Classes', 'class_id', 'id');
    }
    public function comment()
    {
        return $this->hasMany('App\Comments', 'lesson_id', 'id');
    }
    public function video()
    {
        return $this->hasMany('App\Videos', 'lesson_id','id');
    }

    public function document()
    {
        return $this->hasOne('App\Documents', 'lesson_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
