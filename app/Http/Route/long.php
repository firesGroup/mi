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
    Route::resource( 'member', 'MemberController' );
    Route::post('avator', 'MemberController@changeavator');
    Route::post('change', 'MemberController@change');
    Route::post('member_check_name/{id}', 'MemberController@member_check_name');

    //等级路由
    Route::resource('level', 'LevelController');
    Route::post('ajax', 'LevelController@ajax');
} );





