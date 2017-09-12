<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Lessons;
use App\Videos;

class videoController extends Controller
{
    //
    public function getList()
    {
        $videos = Videos::all();
        return view('admin.videos.list',['videos' => $videos]);
    }

}
