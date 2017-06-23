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
use App\Http\Controllers\Admin\ProductBrandController as Brand;
use Illuminate\Support\HtmlString;
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
        $productList = Product::paginate(10);
        return view('admin.product.index',compact('productList'));
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
     * 修改商品信息页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Product::find($id);
        $detail = $info->detail;
        $description = new HtmlString($detail->description);
        $zhStatus = ['在售','下架','预购','缺货','新品上市'];
        $brand = (new Brand())->getIdAndName();
        return view('admin.product.edit',compact('info', 'detail','brand', 'description','zhStatus'));
    }

    /**
     * 处理商品信息修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = [
            'category_id'          => '3',
            'brand_id'          => $request->input('brand_id'),
            'price'        => $request->input('price'),
            'market_price' => $request->input('market_price'),
            'p_name'       => $request->input('p_name'),
            'status'       => $request->input('status'),
            'recommend'    => $request->input('recommend'),
        ];
        $detail = [
            'p_index_image' => $request->input('p_index_image'),
            'summary'       => $request->input('summary'),
            'description'   => $request->input('description'),
            'remind_title'  => $request->input('remind_title'),
            'store'         => $request->input('store'),
            'unit'         => $request->input('unit')
        ];
        $bool1 = DB::table('product')->where('id',$id)->update($product);
        $bool2 = DB::table('product_detail')->where('p_id',$id)->update($detail);
        if( $bool1 == 0 && $bool2 == 1 ){
            return 0;
        }elseif( $bool1 == 1 && $bool2 == 0  ){
            return 0;
        }elseif( $bool1 == 1 && $bool2 == 1 ){
            return 0;
        }else{
            return 1;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //查询该商品的所有图片信息
        $product = Product::find($id);
        $detail = $product->detail;
        $images = $product->images();

        if( $detail ){
            //获取封面图片地址
            $p_index_image = $detail->p_index_image;
            //若存在则删除
            if( $p_index_image ){
                //在磁盘删除封面图片
                Storage::delete($p_index_image);
            }
            //删除商品详情表中的当前商品数据
            $detail->delete();
        }

        //获取商品相册所有图片
        //存在图片则删除
        if( $images ){
            foreach( $images as $img ){
                //从磁盘删除封面图片
                Storage::delete($img->path);
            }
            //从数据库删除
            $images->delete();
        }

        //删除商品详情
        if($product->delete()){
            return 0;
        }else{
            return 1;
        }
    }

    /*
     * 获取指定商品的封面图片
     *
     */
    public function getIndexImage($img_id)
    {
        $path = DB::table('product_detail')->where('p_id',$img_id)->value('p_index_image');
        return $path;
    }

    /*
     *
     * 修改商品封面图片
     *
     *
     */
    public function postIndexImage(ProductRequest $request)
    {
        //判断是否post提交
        if( $request->isMethod('post') ) {
            $id = $request->input('id');
            $src = $request->input('src');
            //先获取数据库中原来的图片地址
            $path = Product::find($id)->p_index_image;
            //分割路径
            $path = substr( $path, 8 );
            //从磁盘删除原来的图片
            $bool1 = Storage::disk('uploads')->delete($path);
            if( $bool1 ){
                $id = DB::table('product_detail')->where('p_id', $id)->update(['p_index_image' => $src]);
                if( $id != -1 ){
                    //成功
                    return 0;
                }else{
                    //失败
                    return 1;
                }
            }else{
                //图片删除失败
                return 2;
            }
        }
    }


    /**
     * 获取商品相册图片
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getImages($img_id)
    {
        $list = ProductImages::where('p_id',$img_id)->get();
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
            $count = ProductImages::where('p_id',$id)->count();
            if( $count < 6 ){
                $id = DB::table('product_images')->insertGetId(['p_id'=>$id, 'path' => $src]);
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
        $bool2 = DB::table('product_images')->delete($id);
        if( $bool1 && $bool2 ){
            return 0;
        }elseif ( !$bool1 ) {
            return 1;
        }else{
            return 2;
        }

    }
}
