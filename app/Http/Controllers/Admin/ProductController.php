<?php

/**
 * File Name: ProductController.php
 * Description: 商品管理控制器
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/19
 * Time: 11:34
 */


namespace App\Http\Controllers\Admin;

use App\Entity\Product;
use App\Entity\ProductImages;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Controllers\Controller;
use Storage;
use DB;

class ProductController extends Controller
{
    /**
     * 商品列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = Product::all();
        $productList = Product::paginate(5);

//        dd($productList);
        return view('admin.product.index',compact('productList', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRequest $request,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductRequest $request,$id)
    {
        $info = Product::find($id);
        $detail = $info->detail;
        return view('admin.product.edit',compact('info', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRequest $request,$id)
    {
        return DB::table('product')->delete($id);
    }


    public function getIndexImage(ProductRequest $request, $id)
    {
        $path = DB::table('productDetail')->where('pid',$id)->value('p_index_image');
        return $path;
    }

    public function postIndexImage(ProductRequest $request)
    {
        //判断是否post提交
        if( $request->isMethod('post') ) {
            $id = $request->input('id');
            $src = $request->input('src');
            $id = DB::table('productDetail')->where('pid', $id)->update(['p_index_image' => $src]);
            if( $id ){
                return 0;
            }
        }
    }


    /**
     * 获取商品相册图片
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getImages(ProductRequest $request,$id)
    {
        $list = ProductImages::where('pid',$id)->get();
        return $list;
    }

    /**
     * 存储商品相册图片到数据库
     *
     * @return \Illuminate\Http\Response
     */

    public function postImages(ProductRequest $request)
    {
        //判断是否post提交
        if( $request->isMethod('post') ){
            $id = $request->input('id');
            $src = $request->input('src');

//            dd($id.$src);
            //获取当前商品已上传的数量
            $count = ProductImages::where('pid',$id)->count();
            if( $count < 6 ){
                $id = DB::table('productImages')->insertGetId(['pid'=>$id, 'path' => $src]);
                if( $id ){
                    return '{"id":'.$id.', "status":0}';
                }
            }else{
                return 1;
            }

        }
    }

    /**
     * 删除商品相册中图片
     *
     * 需表单传递参数:  id   int       被删除图片的id
     *               path string     被删除图片的以/uploads开头的路径
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteImages(ProductRequest $request)
    {
        //接收表单传递的id与path
        $id = $request->input('id');
        $path = $request->input('path');
        //分割路径
        $path = substr( $path, 8 );
        //从磁盘删除图片
        $bool1 = Storage::disk('uploads')->delete($path);
        //从数据库删除对应id的图片数据
        $bool2 = DB::table('productImages')->delete($id);
        if( $bool1 && $bool2 ){
            return 0;
        }elseif ( !$bool1 ) {
            return 1;
        }else{
            return 2;
        }

    }
}
