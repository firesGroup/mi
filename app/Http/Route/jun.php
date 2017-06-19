<?php
/**
 * File Name: jun.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/19
 * Time: 14:07
 */

//Route::get('/admin','Admin\AdminController@index');
//Route::get('/order','Admin\OrderController@orders');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('/', 'AdminController@index');

    Route::resource('order', 'OrderController');
});