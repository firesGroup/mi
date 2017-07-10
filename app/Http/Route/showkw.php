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

    //系统设置
    Route::post('system/web','SystemController@setWeb')->name('admin.system.setweb');
    Route::post('system/seo','SystemController@setSeo')->name('admin.system.setseo');

    //订单
    Route::resource('order', 'OrderController',['except'=>['index']]);
    Route::get('orderStatus', 'OrderController@updateStatus');

    //评价
    Route::resource('comment','CommentController',['except'=>['index']]);
    Route::get('commentStatus', 'CommentController@updateStatus');
    Route::post('commentShow', 'CommentController@insert');

    //友情链接
    Route::resource('friend','FriendController',['except'=>['index']]);
    Route::get('friendStatus','FriendController@updateStatus');

    //====== 管理员 ========
    Route::post('ajaxPassword', 'UserController@ajaxPassword')->name('admin.user.ajaxpassword');
    Route::resource('user', 'UserController',['except'=>['index']]);
    Route::get('ajax', 'UserController@ajax')->name('admin.user.ajax');
    Route::get('ajaxName', 'UserController@ajaxName')->name('admin.user.ajaxname');

    //分类路由
    Route::post('category_edit', 'CateGoryController@category_edit');
    Route::post('add_category', 'CateGoryController@add_category');
    Route::get('create_category/{id}', 'CateGoryController@create_category');
    Route::resource('category', 'CateGoryController',['except'=>['index']]);

    //广告
    Route::get('showStatus', 'AdvertController@showStatus');
    Route::resource('advert', 'AdvertController',['except'=>['index']]);
    //广告位置
    Route::resource('advert_location', 'AdvertLocationController',['except'=>['index']]);

    //会员管理
    Route::post('change', 'MemberController@change');
    Route::post('ponseral_change', 'MemberController@ponseral_change');
    Route::post('member_check_name/{id}', 'MemberController@member_check_name');
    Route::post('member_ajax_phone/{id}', 'MemberController@member_check_phone');
    Route::post('member_ajax_email/{id}', 'MemberController@member_check_email');
    Route::post('avator', 'MemberController@changeavator');
    Route::post('mail_code', 'MemberController@mail_code');
    Route::resource('member', 'MemberController',['except'=>['index']]);


    //轮播图路由
    Route::resource('slideshow' ,'SlideShowController',['except'=>['index']]);

    Route::get('showStatus', 'SlideShowController@showStatus')->name('admin.slide.showstatus');

    Route::get('slideImage', 'SlideShowController@slideImage')->name('admin.slide.slideimage');


    //====== 商品 =========

    //商品图片
    Route::get('product/images/{img_id}', 'ProductController@getImages');
    Route::post('product/images/{img_id}', 'ProductController@postImages');
    Route::delete('product/images/{img_id}', 'ProductController@deleteImages');
    Route::get('product/indexImage/{img_id}', 'ProductController@getIndexImage');
    Route::post('product/indexImage/{img_id}', 'ProductController@postIndexImage');
    Route::get('brand/get/idandname','ProductBrandController@getIdAndName');


    //商品颜色
    Route::resource('product/color', 'ProductColorController',['parameters' => [
        'color' => 'color_id'
    ]],['except'=>['show']]);
    Route::resource('product/attr', 'ProductAttributeController',['parameters' => [
        'attr' => 'attr_id'
    ]],['except'=>['show']]);
    Route::get('product/getAjaxCategoryChild/{category_id}', 'ProductController@getAjaxCategoryChild');
    //商品
    Route::resource('product','ProductController',['parameters' => [
        'product' => 'id'
    ]],['except'=>['show','index']]);

    //权限管理组路由
    Route::resource('group', 'GroupController',['except'=>['index']]);

    Route::get('groupAjax', 'GroupController@groupAjax')->name('admin.group.groupajax');

    //权限路由
    Route::resource('role', 'RoleController',['except'=>['index']]);

    Route::get('ajaxRoleName', 'RoleController@ajaxRoleName')->name('admin.role.ajaxrolename');

    Route::get('ajaxRole', 'RoleController@ajaxRole')->name('admin.role.ajaxrole');

    //菜单组
    Route::resource('menugroup', 'AdminMenuGroupController',['parameters' => [
        'menuGroup' => 'menu_group_id'
    ]],['except'=>['index']]);
    //菜单管理
    Route::get('menu/getMenu', 'AdminMenuController@getMenu')->name('admin.menu.getenu');
    Route::get('menu/getAjaxChild/{menu_id}', 'AdminMenuController@getChild')->name('admin.menu.getajaxchild');
    Route::get('menu/index/welcome','AdminMenuController@getWelcome');

    Route::resource('menu', 'AdminMenuController',['parameters' => [
        'menu' => 'menu_id'
    ]],['except'=>['index']]);
    //商品版本
    Route::get('product/versions/getColorList', 'ProductVersionsController@getColorList')->name('admin.product.version.list');
    Route::get('product/versions/create/{id}','ProductVersionsController@create')->name('admin.product.version.create');
    Route::get('product/versions/{id}/edit','ProductVersionsController@edit')->name('admin.product.version.edit');
    Route::get('product/versions/{id}','ProductVersionsController@index')->name('admin.product.version.index');
    Route::post('product/versions/','ProductVersionsController@store')->name('admin.product.version.store');
    Route::put('product/versions/{id}','ProductVersionsController@update')->name('admin.product.version.update');
    Route::delete('product/versions/{id}','ProductVersionsController@destroy')->name('admin.product.version.delete');
});
//后台权限管理路由组
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>['admin','adminRole']], function(){
    //网站信息
    Route::get('system/web','SystemController@getWeb')->name('admin.system.getweb');
    //网站SEO
    Route::get('system/seo','SystemController@getSeo')->name('admin.system.getseo');
    //菜单
    Route::get('menu', 'AdminMenuController@index')->name('admin.menu.index');
    //菜单组
    Route::get('menugroup', 'AdminMenuGroupController@index')->name('admin.menugroup.index');
    //商品
    Route::get('product', 'ProductController@index')->name('admin.product.index');
    //商品颜色
    Route::get('product/color', 'ProductController@index')->name('admin.product.color.index');
    //分类
    Route::get('category', 'CateGoryController@index')->name('admin.category.index');
    //订单
    Route::get('order', 'OrderController@index')->name('admin.order.index');
    //评价
    Route::get('comment', 'CommentController@index')->name('admin.comment.index');
    //权限
    Route::get('role', 'RoleController@index')->name('admin.role.index');
    //权限组
    Route::get('group', 'GroupController@index')->name('admin.group.index');
    //管理员
    Route::get('user', 'UserController@index')->name('admin.user.index');
    //会员管理
    Route::get('member', 'MemberController@index')->name('admin.member.index');
    //轮播图
    Route::get('slideshow', 'SlideShowController@index')->name('admin.slideshow.index');
    //友情链接
    Route::get('friend', 'FriendController@index')->name('admin.friend.index');
    //广告位置
    Route::get('advertlocation', 'AdvertLocationController@index')->name('admin.advertlocation.index');
    //广告
    Route::get('advert','AdvertController@index')->name('admin.advert.index');
});

//上传
Route::get( '/upload/{path}/{id}/{url}', 'PublicC\UploadController@getUpload' );
Route::post( '/upload', 'PublicC\UploadController@postUpload' );

//图片动态缩放
Route::get('/uploads/{pathName}/{imgSrc}', 'PublicC\ImageController@oneDirImage');
Route::get('/uploads/{pathName}/{date}/{imgSrc}', 'PublicC\ImageController@twoDirImage');


//前台
Route::group(['namespace'=>'Home',], function(){
    Route::get('/search/{word}','SearchController@index' );
    Route::get('/search','SearchController@index' );
    Route::get('/product/buy/{p_id}','HomeController@productBuy');
    Route::get('/product/info/{p_id}','HomeController@productIndex');
    Route::get('/product/getVersion/{p_id}','HomeController@getVersion');
    Route::get('/product/ajaxGetVersion/{ver_id}', 'HomeController@ajaxGetVersion');
    Route::get('/product/ajaxGetVersionColor/{ver_id}', 'HomeController@ajaxGetVersionColor');
    Route::get('/product/getVersionStatus/{p_id}', 'HomeController@getVersionStatus');
    Route::get('/','HomeController@index');

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

    Route::get('reg', function () {
        return view('home/reg_login/reg');

    });
    Route::post('sms', 'SmsController@sms');
    Route::post('mailBox', 'SmsController@smsCode');
    Route::get('login', function () {
        return view('home/reg_login/login');
    });
    Route::post('login', 'LoginController@login');
    Route::get('login/exit', 'LoginController@loginout');

    Route::get('user_detail', 'UserDetailController@user_detail')->middleware('ponseral');
    Route::post('mail_code', 'UserDetailController@mailcode');
    Route::post('phone_code', 'UserDetailController@phonecode');
    Route::post('member_update', 'UserDetailController@update_pass');
    Route::post('personal_update', 'UserDetailController@personal_update');
    Route::get('personal', 'UserDetailController@personal')->middleware('ponseral');;
    Route::post('collect', 'CollectController@add_collect')->middleware('ponseral');
    Route::get('ponseral_collect', 'CollectController@ponseral_collect')->middleware('ponseral');
    Route::post('collect_delete', 'CollectController@collect_delete');
    Route::get('member_address', 'UserDetailController@member_address')->middleware('ponseral');
});

Route::get('kit/captcha/{tmp}', 'Home\CodeController@captcha');
Route::get('kit/capt/{tmp}', 'Home\CodeController@captcha');
