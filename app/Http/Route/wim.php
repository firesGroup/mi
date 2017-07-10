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
Route::group(['namespace' => 'Home'], function () {

    Route::get('cart', 'CartController@index');

    Route::resource('address', 'AddressController');

    Route::get('chooseAddress', 'AddressController@provices');

    Route::get('cities', 'AddressController@cities');

    Route::get('addAddress', 'AddressController@addAddress');

    Route::post('addCart', 'AddCartController@addCart');

    Route::get('addCartSuccess/{p_id}/{ver_id?}', 'AddCartController@addCartSuccess');

    Route::post('searchCart', 'AddCartController@searchCart');

    Route::post('delSession', 'AddCartController@delSession');

    Route::get('delGoods/{id}', 'AddCartController@delGoods');

    Route::post('goBalance', 'AddCartController@goBalance');

    Route::get('toPay', 'AddCartController@toPay');

});