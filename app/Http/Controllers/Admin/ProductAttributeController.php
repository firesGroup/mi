<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Entity\ProductAttribute;
use App\Entity\ProductModel;
use App\Http\Requests\Admin\ProductAttributeRequest;
use App\Http\Controllers\Controller;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //如果是搜索
        if( $request->has('search') ){
            //获取搜索模型id
            $modelId = $request->input('modelId',null);
            //获取搜索关键关字
            $word = $request->input('word',null);
            //如果搜索模型id和关键字都存在
            if( $modelId && $word ){
                $attrList = ProductAttribute::where('model_id',$modelId)
                    ->where('attr_name','like',"%{$word}%")
                    ->paginate(10);

            }elseif( $modelId && !$word ){
                //如果模型id存在,没有关键字
                $attrList = ProductAttribute::where('model_id',$modelId)->paginate(10);
            }else{
                //否则就是搜索关键字
                $attrList = ProductAttribute::where('attr_name','like',"%{$word}%")->paginate(10);
            }
        }else{
            //获取全部数据并分页
            $attrList = ProductAttribute::paginate(10);
        }

        //获取所有模型
        $modelList = ProductModel::all();
        return view('admin.product.attr.index',compact('attrList','modelList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获得所有模型列表
        $modelList = ProductModel::all();
        return view('admin.product.attr.create', compact('modelList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAttributeRequest $request)
    {
        $data = $request->only(['attr_name','model_id','attr_input_type']);
        //可选值方式为手工录入
        if($data['attr_input_type'] == 0){
            //写入
            $res = ProductAttribute::create($data)->id;
        }elseif($data['attr_input_type'] == 1){
            //获取可选值
            $values = $request->attr_values;
            //清除字串两边的逗号
            $data['attr_values'] = trim($values,',');
            //创建写入
            $res = ProductAttribute::create($data)->id;
        }
        return $res?0:1;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $attr_id
     * @return \Illuminate\Http\Response
     */
    public function show($attr_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $attr_id
     * @return \Illuminate\Http\Response
     */
    public function edit($attr_id)
    {
        //查询当前属性信息
        $info = ProductAttribute::find($attr_id);
        //获取所有模型
        $modelList = ProductModel::all();
        return view('admin.product.attr.edit',compact('info','modelList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $attr_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $attr_id)
    {
        $data = $request->only(['attr_name','model_id','attr_input_type']);
        //可选值方式为手工录入
        if($data['attr_input_type'] == 0){
            //更改数据库,并且将可选值列表清空
            $data['attr_values'] = null;
            $res = ProductAttribute::where('id',$attr_id)->update($data);
        }elseif($data['attr_input_type'] == 1){
            //可选值方式为可选值列表时  获取可选值
            $values = $request->attr_values;
            //清除字串两边的逗号
            $data['attr_values'] = trim($values,',');
            //更改数据库
            $res = ProductAttribute::where('id',$attr_id)->update($data);
        }
        return $res?0:1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $attr_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($attr_id)
    {
        //
    }
}
