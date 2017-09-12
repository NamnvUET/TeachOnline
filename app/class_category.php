<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_Category extends Model
{
    //
    protected $table = "class_category";

    public function category()
    {
        return $this->hasMany('App\Categories', 'id', 'category_id');
    }

    public function classes()
    {
        return $this->hasMany('App\Classes', 'id', 'class_id');
    }
}
