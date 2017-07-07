<?php

namespace App\Http\Controllers\Admin;

use App\Entity\ProductColor;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colorList = ProductColor::paginate(10);
        return view('admin.product.color.index',compact('colorList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['color_name'] = $request->color_name;
        $img= $request->color_img;
        //如果是远程图片就获取
        $image = getUrlImages($img,'product');
        $data['color_img'] = $image;
        $res = ProductColor::create($data);
        return $res?0:1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = ProductColor::find($id);
        return view('admin.product.color.edit',compact('info'));
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
        $data['color_name'] = $request->color_name;
        $img= $request->color_img;
        //如果是远程图片就获取
        $image = getUrlImages($img,'product');
        $data['color_img'] = $image;
        $res = ProductColor::find($id)->update($data);
        return $res?0:1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = ProductColor::destroy($id);
        return $res?0:1;
    }
}
