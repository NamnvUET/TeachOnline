<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table = "categories";

    public function class_category()
    {
        return $this->belongsTo('App\Class_Category', 'id', 'category_id');
    }
}
