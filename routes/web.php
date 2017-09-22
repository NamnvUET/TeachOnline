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
//-------------------- Test Google Drive Api --------------------------------------//
Route::get('/myprofile',function (){
    return view('pages.myprofile');
});
//
Route::get('home', 'PageController@home');

Route::get('category/{id?}/{name?}', 'PageController@category');

Route::get('class/{id?}/{name?}', 'PageController@classinfo');

Route::get('allCourse', 'PageController@allCourse');

Route::post('search', 'PageController@postSearch');

Route::get('registerClass/{user_id?}/{class_id?}', 'PageController@registerClass');

Route::get('learn/class/{class_id?}/{name?}', 'PageController@getClass');

Route::get('lesson/{lesson_id?}/{name?}', 'PageController@getLesson');

Route::post('comment/{lesson_id?}/{name?}', 'commentController@postComment');

//Khóa học của tôi

Route::get('myCourse', 'PageController@getMyCourse');

//Khóa học đã tạo
Route::get('ownerCourse', 'PageController@getOwnerCourse');

// Chọn một khóa học đã tạo và vào trang Chỉnh sửa khóa học đã tạo
Route::get('manageClass/{class_id?}/{name?}', 'PageController@getModifyClass');

Route::post('manageClass/{class_id?}/{name?}', 'PageController@postModifyClass');

//Lấy danh sách bài học trong một khóa học đã tạo
Route::get('manageClass/{class_id?}/{name?}/listLesson', 'PageController@getListLesson');

//Thêm mới một bài học vào một khóa học đã tạo

Route::get('manageClass/{class_id?}/{name?}/addLesson', 'PageController@getAddLesson');

Route::post('manageClass/{class_id?}/{name?}/addLesson', 'PageController@postAddLesson');

Route::get('manageClass/{class_id?}/{name?}/modifyLesson/{lesson_id?}', 'PageController@getModifyLesson');

Route::post('manageClass/{class_id?}/{name?}/modifyLesson/{lesson_id?}', 'PageController@postModifyLesson');

Route::post('manageClass/{class_id?}/{name?}/deleteLesson/{lesson_id?}', 'PageController@postDeleteLesson');

Route::get('manageClass/{class_id?}/{name?}/{lesson_id?}/allcomment', 'PageController@getAllComment');

Route::get('manageClass/{class_id?}/{name?}/{lesson_id?}/duyetcomment', 'PageController@getDuyetComment');

Route::get('manageClass/{class_id?}/{name?}/{lesson_id?}/{comment_id?}/chophep', 'PageController@getChophep');

Route::get('manageClass/{class_id?}/{name?}/{lesson_id?}/deleleComment/{comment_id?}', 'PageController@getDeleteComment');

Route::get('editMyProfile', 'PageController@getEditMyProfile');



//--------------------- Admin Page -----------------------------------------------//

Route::group(['prefix' => 'adminpage', 'middleware' => 'admin'], function (){
    //----------- User ------------------//
    Route::group(['prefix' => 'user'],function (){
       Route::get('list', 'UserController@getList');
       Route::get('add', 'UserController@getAdd');
       Route::post('add', 'UserController@postAdd');
       Route::get('changerole/{id}', 'UserController@getChangeRole');
       Route::post('changerole/{id}', 'UserController@postChangeRole');
    });
    //-----------Classes-----------------//
    Route::group(['prefix' => 'class'],function (){
        Route::get('list', 'classController@getList');
        Route::get('add', 'classController@getAdd');
        Route::post('add', 'classController@postAdd');
        Route::get('modify/{id}', 'classController@getModify');
        Route::post('modify/{id}', 'classController@postModify');
        Route::get('delete/{id}', 'classController@getDelete');
    });

    //--------- Lesson ------------------//
    Route::group(['prefix' => 'lesson'], function(){
       Route::get('list', 'lessonController@getList');
       Route::get('add', 'lessonController@getAdd');
       Route::post('add', 'lessonController@postAdd');
       Route::get('modify/{id}', 'lessonController@getModify');
       Route::post('modify/{id}', 'lessonController@postModify');
       Route::get('delete/{id}', 'lessonController@getDelete');
    });
    //--------- Category ----------------//
    Route::group(['prefix' => 'category'], function(){
       Route::get('list', 'categoryController@getList');
       Route::get('add', 'categoryController@getAdd');
       Route::post('add', 'categoryController@postAdd');
       Route::get('modify/{id}', 'categoryController@getModify');
       Route::post('modify/{id}', 'categoryController@postModify');
       Route::get('delete/{id}', 'categoryController@getDelete');

    });
    //------------- Class Category --------------//
    Route::group(['prefix' => 'class_category'],function (){
        Route::get('list', 'class_categoryController@getList');
        Route::get('add', 'class_categoryController@getAdd');
        Route::post('add', 'class_categoryController@postAdd');
        Route::get('modify/{class_category_id}', 'class_categoryController@getModify');
        Route::post('modify/{class_category_id}', 'class_categoryController@postModify');
        Route::get('delete/{class_category_id}', 'class_categoryController@getDelete');
    });
    //--------- Comment -----------------//
    Route::group(['prefix' => 'comment'], function(){
        Route::get('list', 'commentController@getList');
        Route::get('modify/{id}', 'commentController@getModify');
        Route::post('modify/{id}', 'commentController@postModify');
        Route::get('delete/{id}', 'commentController@getDelete');
    });
});

//--------------------- User -----------------------------------------------------//
Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');
Route::get('signup', 'UserController@getSignUp');
Route::post('signup', 'UserController@postSignUp');
Route::get('logout', 'UserController@getLogOut');
Route::get('active/{code?}', 'UserController@activeCode');