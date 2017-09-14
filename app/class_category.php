<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_Category extends Model
{
    //
    protected $table = "class_category";

    public function category()
    {
        return $this->hasOne('App\Categories', 'id', 'category_id');
    }

    public function classes()
    {
        return $this->hasOne('App\Classes', 'id', 'class_id');
    }
}
