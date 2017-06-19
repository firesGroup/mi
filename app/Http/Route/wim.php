<?php
/**
 * File Name: wim.php
 * Description:wim 路由文件
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/19
 * Time: 13:52
 */


Route::group( ['namespace' => 'Admin', 'prefix' => 'admin' ], function () {

    Route::get('/', 'AdminController@index');

    Route::resource('user', 'UserController');
} );