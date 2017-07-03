<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\Admin\ProductBrandRequest;
use App\Entity\ProductBrand;
use DB;
use Storage;
use App\Http\Controllers\Controller;

class ProductBrandController extends Controller
{
    /**
     * 获取所有商品品牌--列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandList = ProductBrand::orderBy('sort','desc')->paginate(10);

        return view( 'admin.product.brand.index',compact('brandList') );
    }

    /**
     * 获取所有商品品牌的id,name
     *
     * @return \Illuminate\Http\Response
     */
    public function getIdAndName()
    {
        $list = DB::table('product_brand')->select('id','brand_name')->get();
        return $list;
    }

    /*
     *  获取logo地址
     *
     */
    public function getLogo($brand_id)
    {
       return  ProductBrand::find($brand_id)->brand_logo;
    }

    /**
     * 修改品牌logo 上传处理
     *
     * @return \Illuminate\Http\Response
     */
    public function changeLogo(Request $request)
    {
        $src = $request->src;
        $brand_id  = $request->id;
        //先获取原logo地址
        $path = ProductBrand::find($brand_id)->brand_logo;
        //分割路径
        $path = substr( $path, 8 );
        //从磁盘删除原来的图片
        $bool1 = Storage::disk('uploads')->delete($path);
        if( $bool1 ){
            $res = ProductBrand::where('id',$brand_id)->update(['brand_logo'=>$src]);
            return $res?0:1;
        }else{
            return 2;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.brand.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductBrandRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductBrandRequest $request)
    {
        $data = $request->except(['file','path','_token']);
        $res = ProductBrand::insert($data);
        return $res?0:1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $brand_id
     * @return \Illuminate\Http\Response
     */
    public function show($brand_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $brand_id
     * @return \Illuminate\Http\Response
     */
    public function edit($brand_id)
    {
        $brand = ProductBrand::find($brand_id);
        return view('admin.product.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $brand_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brand_id)
    {
        $data = $request->all();
        $res = ProductBrand::find($brand_id)->update($data);
        return $res?0:1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $brand_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand_id)
    {
        $res = ProductBrand::destroy($brand_id);
        return $res?0:1;
    }
}
