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

Route::get('/admin/login', 'Admin\AdminController@login');
Route::post('/admin/login', 'Admin\AdminController@doLogin');
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'admin'], function(){
    Route::get('/','AdminController@index');
    Route::get('index','AdminController@index');
    Route::get('cancle', 'AdminController@cancle')->name('admin.cancle');
    Route::get('logout', 'AdminController@logout')->name('admin.logout');

    Route::get('system/web','SystemController@getWeb')->name('admin.system.getweb');
    Route::post('system/web','SystemController@setWeb')->name('admin.system.setweb');
    Route::get('system/seo','SystemController@getSeo')->name('admin.system.getseo');
    Route::post('system/seo','SystemController@setSeo')->name('admin.system.setseo');

    //管理员

    Route::resource('user', 'UserController');

    Route::get('ajax', 'UserController@ajax')->name('admin.user.ajax');

    Route::post('ajaxPassword', 'UserController@ajaxPassword')->name('admin.user.ajaxpassword');

    Route::get('ajaxName', 'UserController@ajaxName')->name('admin.user.ajaxname');


    //权限管理组路由
    Route::resource('group', 'GroupController');

    Route::get('groupAjax', 'GroupController@groupAjax')->name('admin.group.groupajax');


    //权限路由
    Route::resource('role', 'RoleController');

    Route::get('ajaxRoleName', 'RoleController@ajaxRoleName')->name('admin.role.ajaxrolename');

    Route::get('ajaxRole', 'RoleController@ajaxRole')->name('admin.role.ajaxrole');

    //轮播图路由
    Route::resource('slideShow', 'SlideShowController');

    Route::get('showStatus', 'SlideShowController@showStatus')->name('admin.slide.showstatus');

    Route::get('slideImage', 'SlideShowController@slideImage')->name('admin.slide.slideimage');


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

    Route::get('menu/getMenu', 'AdminMenuController@getMenu')->name('admin.menu.getenu');
    Route::get('menu/getAjaxChild/{menu_id}', 'AdminMenuController@getChild')->name('admin.menu.getajaxchild');
    Route::resource('menu', 'AdminMenuController',['parameters' => [
        'menu' => 'menu_id'
    ]]);
    Route::resource('menuGroup', 'AdminMenuGroupController',['parameters' => [
        'menuGroup' => 'menu_group_id'
    ]]);
    Route::get('menu/index/welcome','AdminMenuController@getWelcome');
    Route::get('product/versions/getColorList', 'ProductVersionsController@getColorList')->name('admin.product.version.list');
    Route::get('product/versions/create/{id}','ProductVersionsController@create')->name('admin.product.version.create');
    Route::get('product/versions/{id}/edit','ProductVersionsController@edit')->name('admin.product.version.edit');
    Route::get('product/versions/{id}','ProductVersionsController@index')->name('admin.product.version.index');
    Route::post('product/versions/','ProductVersionsController@store')->name('admin.product.version.store');
    Route::put('product/versions/{id}','ProductVersionsController@update')->name('admin.product.version.update');
    Route::delete('product/versions/{id}','ProductVersionsController@destroy')->name('admin.product.version.delete');
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
Route::get('/uploads/{pathName}/{imgSrc}', 'PublicC\ImageController@oneDirImage');
Route::get('/uploads/{pathName}/{date}/{imgSrc}', 'PublicC\ImageController@twoDirImage');
Route::group(['namespace'=>'Home',], function(){
    Route::get('/search/{word}','SearchController@index' );
    Route::get('/search','SearchController@index' );
    Route::get('/product/buy/{p_id}','HomeController@productBuy');
    Route::get('/product/info/{p_id}','HomeController@productIndex');
    Route::get('/product/ajaxGetVersion/{ver_id}', 'HomeController@ajaxGetVersion');
    Route::get('/product/ajaxGetVersionColor/{ver_id}', 'HomeController@ajaxGetVersionColor');
    Route::get('/product/getVersionStatus/{p_id}', 'HomeController@getVersionStatus');
    Route::get('/','HomeController@index');


    Route::get('cart', 'CartController@index');

    Route::resource('address', 'AddressController');

    Route::get('chooseAddress', 'AddressController@Provices');

    Route::get('cities', 'AddressController@Cities');

    Route::get('addAddress', 'AddressController@AddAddress');

    Route::post('addCart', 'AddCartController@addCart');

    Route::get('addCartSuccess', 'AddCartController@addCartSuccess');

    Route::post('searchCart', 'AddCartController@searchCart');
});

