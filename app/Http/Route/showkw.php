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
    Route::get('product/{id}/images', 'ProductController@getImages');
    Route::post('product/{id}/images', 'ProductController@postImages');
    Route::delete('product/{id}/images', 'ProductController@deleteImages');
    Route::get('product/{id}/indexImage', 'ProductController@getIndexImage');
    Route::post('product/{id}/indexImage', 'ProductController@postIndexImage');
    Route::resource('product_model', 'ProductModelController');
    Route::resource('brand', 'ProductBrandController');
    Route::get('brand/get/idandname','ProductBrandController@getIdAndName');
    Route::resource('menu', 'MenuController');
    Route::get('menu/index/welcome','MenuController@getWelcome');
});

Route::get( '/upload/{path}/{id}/{url}', 'PublicC\UploadController@getUpload' );
Route::post( '/upload', 'PublicC\UploadController@postUpload' );