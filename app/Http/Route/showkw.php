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
    Route::get('product/versions/getColorList', 'ProductVersionsController@getColorList');
    Route::get('product/versions/create/{id}','productVersionsController@create');
    Route::get('product/versions/{id}/edit','productVersionsController@edit');
    Route::get('product/versions/{id}','productVersionsController@index');
    Route::post('product/versions/','productVersionsController@store');
    Route::put('product/versions/{id}','productVersionsController@update');
    Route::delete('product/versions/{id}','productVersionsController@destroy');
    Route::resource('product/color', 'ProductColorController',['parameters' => [
        'color' => 'color_id'
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

Route::group(['namespace'=>'Home',], function(){
    Route::get('product/info/{p_id}','HomeController@productInfo');
    Route::post('/product/ajaxGetSpec/{p_id}', 'HomeController@ajaxGetSpecToInfo');
    Route::get('/','HomeController@index');
});