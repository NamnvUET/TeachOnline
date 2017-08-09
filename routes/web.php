<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function (){
    return view('pages.home');
});

//--------------------- Admin Page -----------------------------------------------//

//Route::group(['prefix' => 'adminpage', 'middleware' => 'admin'], function (){
//    return view('admin.')
//});

//--------------------- User -----------------------------------------------------//
Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');
Route::get('signup', 'UserController@getSignUp');
Route::post('signup', 'UserController@postSignUp');
Route::get('logout', 'UserController@getLogOut');
Route::get('active/{code?}', 'UserController@activeCode');