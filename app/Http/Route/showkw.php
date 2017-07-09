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

Route::get('/uploads/{pathName}/{imgSrc}', 'PublicC\ImageController@oneDirImage');
Route::get('/uploads/{pathName}/{date}/{imgSrc}', 'PublicC\ImageController@twoDirImage');

Route::group(['namespace'=>'Admin','prefix'=>'admin'], function(){
    Route::get('/', 'AdminController@index');
    Route::get('/cancle', 'AdminController@cancle');

    //轮播图路由
    Route::resource('slideShow', 'SlideShowController');

    Route::get('showStatus', 'SlideShowController@showStatus');

    Route::get('slideImage', 'SlideShowController@slideImage');


    //分类路由
    Route::post('category_edit', 'CateGoryController@category_edit');
    Route::post('add_category', 'CateGoryController@add_category');
    Route::get('create_category/{id}', 'CateGoryController@create_category');
    Route::resource('category', 'CateGoryController');

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
    Route::get('product/versions/create/{id}','ProductVersionsController@create');
    Route::get('product/versions/{id}/edit','ProductVersionsController@edit');
    Route::get('product/versions/{id}','ProductVersionsController@index');
    Route::post('product/versions/','ProductVersionsController@store');
    Route::put('product/versions/{id}','ProductVersionsController@update');
    Route::delete('product/versions/{id}','ProductVersionsController@destroy');
    Route::resource('product/color', 'ProductColorController',['parameters' => [
        'color' => 'color_id'
    ]],['except'=>['show']]);
    Route::resource('product/attr', 'ProductAttributeController',['parameters' => [
        'attr' => 'attr_id'
    ]],['except'=>['show']]);
    Route::get('product/getAjaxCategoryChild/{category_id}', 'ProductController@getAjaxCategoryChild');
    Route::resource('product', 'ProductController',['parameters' => [
        'product' => 'id'
    ]],['except'=>['show']]);
});
Route::get( '/upload/{path}/{id}/{url}', 'PublicC\UploadController@getUpload' );
Route::post( '/upload', 'PublicC\UploadController@postUpload' );

Route::group(['namespace'=>'Home',], function(){
    Route::get('/search/{word}','SearchController@index' );
    Route::get('/search','SearchController@index' );
    Route::get('/product/buy/{p_id}','HomeController@productBuy');
    Route::get('/product/info/{p_id}','HomeController@productIndex');
    Route::get('/product/ajaxGetVersion/{ver_id}', 'HomeController@ajaxGetVersion');
    Route::get('/product/ajaxGetVersionColor/{ver_id}', 'HomeController@ajaxGetVersionColor');
    Route::get('/product/getVersionStatus/{p_id}', 'HomeController@getVersionStatus');
    Route::get('/','HomeController@index');
});

Route::get('/makedoc/{title}/', function ($title){
    $xs = new XS('product');
    $doc = new XSDocument;
    $doc->setFields([
        'id' => 1,
        'p_name' => $title,
    ]); // 用数组进行批量赋值
    $xs->index->add($doc);
});