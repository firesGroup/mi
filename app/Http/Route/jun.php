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

//Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
//
//    Route::get('/', 'AdminController@index');
//
//    Route::resource('order', 'OrderController');
//    Route::get('orderStatus', 'OrderController@updateStatus');
//
//    Route::resource('comment','CommentController');
//    Route::get('commentStatus', 'CommentController@updateStatus');
//    Route::post('commentShow', 'CommentController@insert');
//
//    Route::resource('friend','FriendController');
//    Route::get('friendStatus','FriendController@updateStatus');
//
////    Route::get('index','AdminController@index');
//
//});

Route::group(['namespace' => 'Home'], function () {

    //评论
    Route::resource('comment','CommentController');
    Route::get('comment','CommentController@show');
    Route::get('store','CommentController@store');
    Route::get('commentshop','CommentController@commentshop');
    Route::get('shopcomment/{id}','CommentController@commentIndex');
    Route::post('commit_upload', 'OrderController@postUpload');

    //订单
    Route::resource('order','OrderController');
    Route::get('order/{id}','OrderController@show');
    Route::get('orderdetail/{id?}','OrderController@detail');
    Route::post('orderdetail/chooseAddress', 'AddressController@provices');
    Route::post('orderdetail/cities', 'AddressController@cities');
    Route::put('orderdetail/orderaddress','OrderController@addressUpdate');
    Route::get('Receiving','OrderController@orderStatus');
    Route::get('orderstatus','OrderController@status');

    //去付款页面
    Route::get('orderpay/{id}','OrderController@pay');
    //支付页面ajax请求路由
    Route::get('pay','OrderController@ppay');

});


