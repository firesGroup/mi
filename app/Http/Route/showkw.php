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

    Route::get('product/brand/getLogo/{brand_id}', 'ProductBrandController@getLogo');
    Route::post('product/brand/changeLogo/{brand_id}', 'ProductBrandController@changeLogo');
    Route::post('product/brand/createLogo', 'ProductBrandController@createLogo');
    Route::resource('product/brand', 'ProductBrandController',['parameters' => [
        'brand' => 'brand_id'
    ]],['except'=>['show']]);
    Route::resource('product/model', 'ProductModelController',['parameters' => [
        'model' => 'model_id'
    ]],['except'=>['show']]);
    Route::resource('product/spec', 'ProductSpecController',['parameters' => [
        'spec' => 'spec_id'
    ]],['except'=>['show']]);
    Route::resource('product/attr', 'ProductAttributeController',['parameters' => [
        'attr' => 'attr_id'
    ]],['except'=>['show']]);
    Route::resource('product', 'ProductController',['parameters' => [
        'product' => 'id'
    ]],['except'=>['show']]);
});

Route::get( '/upload/{path}/{id}/{url}', 'PublicC\UploadController@getUpload' );
Route::post( '/upload', 'PublicC\UploadController@postUpload' );