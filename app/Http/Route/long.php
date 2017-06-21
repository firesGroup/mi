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
    Route::resource('level', 'LevelController');
    Route::post('ajax', 'LevelController@ajax');
} );





