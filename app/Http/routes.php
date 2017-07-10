
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//肖开文-路由文件
 include('Route/showkw.php');
//
////王明-路由文件
 include('Route/wim.php');
//
////龙彪-路由文件
 include('Route/long.php');
//
///潘郡-路由文件
 include('Route/jun.php');

//这个不要动
Route::get('/admin/welcome', function(){
    return view('welcome');
})->name('admin.welcome');
