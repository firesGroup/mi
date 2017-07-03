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
    Route::resource('product', 'ProductController',['parameters' => [
        'product' => 'id'
    ]],['except'=>['show']]);
});
Route::get( '/upload/{path}/{id}/{url}', 'PublicC\UploadController@getUpload' );
Route::post( '/upload', 'PublicC\UploadController@postUpload' );

Route::group(['namespace'=>'Home',], function(){
    Route::get('/product/info/{p_id}','HomeController@productInfo');
    Route::get('/product/ajaxGetVersion/{ver_id}', 'HomeController@ajaxGetVersion');
    Route::get('/product/ajaxGetVersionColor/{ver_id}', 'HomeController@ajaxGetVersionColor');
    Route::get('/','HomeController@index');
});

Route::get('/search/{key}', function ($key){
    $xs = new XS(config_path('search-demo.ini'));
    $search = $xs->search; // 获取 搜索对象
    $query = $key;
    $search->setQuery($query)
        ->setSort('chrono', true) //按照chrono 正序排列
        ->setLimit(20,0) // 设置搜索语句, 分页, 偏移量
    ;

    $docs = $search->search(); // 执行搜索，将搜索结果文档保存在 $docs 数组中
    $count = $search->count(); // 获取搜索结果的匹配总数估算值
    foreach ($docs as $doc){
        $subject = $search->highlight($doc->subject); // 高亮处理 subject 字段
        $message = $search->highlight($doc->message); // 高亮处理 message 字段
        echo $doc->rank() . '. ' . $subject . " [" . $doc->percent() . "%] - ";
        echo date("Y-m-d", $doc->chrono) . "<br>" . $message . "<br>";
        echo '<br>========<br>';
    }
    echo  '总数:'. $count;
});

Route::get('/makedoc/{title}/{message}', function ($title, $message){
    $xs = new XS('product');
    $doc = new XSDocument;
    $doc->setFields([
        'pid' => 1,
        'subject' => $title,
        'message' => $message,
        'chrono' => time(),
    ]); // 用数组进行批量赋值
    $xs->index->add($doc);
});