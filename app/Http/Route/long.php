<?php
/**
 * File Name: long.php
 * Description:俺的路由文件
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/19 0019
 * Time: 下午 1:50
 */

Route::group( ['namespace'=>'Admin', 'prefix'=>'admin'], function(){
    Route::get('/', 'AdminController@index');
    Route::post('change', 'MemberController@change');
    Route::post('member_check_name/{id}', 'MemberController@member_check_name');
    Route::post('member_ajax_phone/{id}', 'MemberController@member_check_phone');
    Route::post('member_ajax_email/{id}', 'MemberController@member_check_email');
    Route::post('avator', 'MemberController@changeavator');
    Route::post('mail_code', 'MemberController@mail_code');
    Route::resource('member', 'MemberController' );
    //等级路由

    Route::post('create_ajax', 'LevelController@ajax');
    Route::post('level_edit/{id}', 'LevelController@edit_ajax');
    Route::resource('level', 'LevelController');

    //分类路由
    Route::post('category_edit', 'CateGoryController@category_edit');
    Route::post('add_category', 'CateGoryController@add_category');
    Route::get('create_category/{id}', 'CateGoryController@create_category');
    Route::resource('category', 'CateGoryController');

    Route::get('showStatus', 'AdvertController@showStatus');
    Route::resource('advert', 'AdvertController');


} );

Route::post( '/upload', 'PublicC\UploadController@postUpload' );

Route::group( ['namespace'=>'Home'], function(){

   Route::get('reg', function () {
       return view('home/reg_login/reg');

   });
   Route::post('sms', 'SmsController@sms');
   Route::post('mailBox', 'SmsController@smsCode');
   Route::get('login', function () {
      return view('home/reg_login/login');
   });
   Route::post('login', 'LoginController@login');
});

Route::get('kit/captcha/{tmp}', 'Home\CodeController@captcha');
Route::get('kit/capt/{tmp}', 'Home\CodeController@captcha');







