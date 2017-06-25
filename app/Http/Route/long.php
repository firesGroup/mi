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
    Route::post('avator', 'MemberController@changeavator');
    Route::post('change', 'MemberController@change');
    Route::post('member_check_name/{id}', 'MemberController@member_check_name');
    Route::post('member_ajax_phone/{id}', 'MemberController@member_check_phone');
    Route::post('member_ajax_email/{id}', 'MemberController@member_check_email');
    Route::resource('member', 'MemberController' );
    //等级路由

    Route::post('create_ajax', 'LevelController@ajax');
    Route::post('level_edit/{id}', 'LevelController@edit_ajax');
    Route::resource('level', 'LevelController');

    //分类路由
    Route::post('category_cate', 'CateGoryController@cate');
    Route::resource('category', 'CateGoryController');
} );






