<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductBrandRequest;
use App\Entity\ProductBrand;
use DB;
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
        $list = ProductBrand::all();
        return view( 'admin.product.brand.index',compact('list') );
    }

    /**
     * 获取所有商品品牌的id,name
     *
     * @return \Illuminate\Http\Response
     */
    public function getIdAndName()
    {
        $list = DB::table('productbrand')->select('id','brand_name')->get();
        return $list;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
