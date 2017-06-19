<?php
/**
 * File Name: showkw.php
 * Description: 肖开文 路由文件
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/19
 * Time: 11:34
 */

Route::group(['namespace'=>'Admin','prefix'=>'admin'], function(){
    Route::get('/', 'AdminController@index');
    Route::resource('product', 'ProductController');
});