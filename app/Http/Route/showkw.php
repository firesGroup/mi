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
    Route::get('product/images/{img_id}', 'ProductController@getImages');
    Route::post('product/images/{img_id}', 'ProductController@postImages');
    Route::delete('product/images/{img_id}', 'ProductController@deleteImages');
    Route::get('product/indexImage/{img_id}', 'ProductController@getIndexImage');
    Route::post('product/indexImage/{img_id}', 'ProductController@postIndexImage');
    Route::get('brand/get/idandname','ProductBrandController@getIdAndName');
    Route::resource('menu', 'MenuController',['parameters' => [
        'menu' => 'menu_id'
    ]]);
    Route::get('menu/index/welcome','MenuController@getWelcome');
    Route::resource('product/model', 'ProductModelController',['parameters' => [
        'model' => 'model_id'
    ]]);
    Route::resource('product/brand', 'ProductBrandController',['parameters' => [
        'brand' => 'brand_id'
    ]]);
    Route::resource('product/spec', 'ProductSpecController',['parameters' => [
        'spec' => 'spec_id'
    ]]);
    Route::resource('product', 'ProductController',['parameters' => [
        'product' => 'id'
    ]]);
});

Route::get( '/upload/{path}/{id}/{url}', 'PublicC\UploadController@getUpload' );
Route::post( '/upload', 'PublicC\UploadController@postUpload' );