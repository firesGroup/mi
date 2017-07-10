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
    Route::post('ponseral_change', 'MemberController@ponseral_change');
    Route::post('member_check_name/{id}', 'MemberController@member_check_name');
    Route::post('member_ajax_phone/{id}', 'MemberController@member_check_phone');
    Route::post('member_ajax_email/{id}', 'MemberController@member_check_email');
    Route::post('avator', 'MemberController@changeavator');
    Route::post('mail_code', 'MemberController@mail_code');
    Route::resource('member', 'MemberController' );
} );

Route::post( '/upload', 'PublicC\UploadController@postUpload' );

Route::group( ['namespace'=>'Home'], function(){


});

Route::get('kit/captcha/{tmp}', 'Home\CodeController@captcha');
Route::get('kit/capt/{tmp}', 'Home\CodeController@captcha');







