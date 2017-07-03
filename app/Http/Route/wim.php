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


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    //管理员路由
    Route::get('/', 'AdminController@index');

    Route::resource('user', 'UserController');

    Route::get('ajax', 'UserController@ajax');

    Route::post('ajaxPassword', 'UserController@ajaxPassword');

    Route::post('login', 'UserController@login');


    //权限管理组路由
    Route::resource('group', 'GroupController');

    Route::get('groupAjax', 'GroupController@groupAjax');


    //权限路由
    Route::resource('role', 'RoleController');

    Route::get('ajaxRoleName', 'RoleController@ajaxRoleName');

    Route::get('ajaxRole', 'RoleController@ajaxRole');


    //轮播图路由
    Route::resource('slideShow', 'SlideShowController');

    Route::get('showStatus', 'SlideShowController@showStatus');

    Route::get('slideImage', 'SlideShowController@slideImage');

});

Route::post('/upload', 'PublicC\UploadController@postUpload');


Route::group(['namespace' => 'Home', 'prefix' => 'home'], function () {

    Route::get('cart', 'CartController@index');

    Route::resource('address', 'AddressController');

    Route::get('chooseAddress', 'AddressController@Provices');

    Route::get('cities', 'AddressController@Cities');

    Route::get('addAddress', 'AddressController@AddAddress');

});