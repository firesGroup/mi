<?php

namespace App\Http\Controllers\Admin;

use App\Entity\ProductSpec;
use App\Entity\ProductModel;
use App\Entity\ProductSpecItem;
use App\Http\Requests\Admin\ProductSpecRequest;
use App\Http\Controllers\Controller;

class ProductSpecController extends Controller
{
    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取所有规格
        $list = ProductSpec::all();
        //分页
        $list = ProductSpec::paginate(10);
        return view('admin.product.spec.index',compact('list'));
    }

    /**
     * 显示添加规格页模版.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获得所有模型列表
        $modelList = ProductModel::all();
        return view('admin.product.spec.create', compact('modelList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductSpecRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductSpecRequest $request)
    {
        $spec_name = $request->spec_name;
        $model_id = $request->model_id;
        //写入数据库 获得规格id
        $id = ProductSpec::create(['spec_name'=>$spec_name, 'model_id'=>$model_id])->id;
        if( $id ){
            //清除规格项字串两边的逗号
            $str = trim($request->spec_item,',');

            if( $str != '' ){
                //查找逗号出现的次数
                $num = substr_count( $str, ',' );
                if( $num > 0 ){
                    //逗号出现次数大于0,就组合为数组
                    $arr = explode(',',$str);
                    //写入状态变量;
                    $status = true;
                    //循环写入
                    foreach( $arr as $value ){
                        $res = ProductSpecItem::create(['spec_id'=>$id, 'spec_item'=>$value])->id;
                        if(!$res){
                            $status = false;
                        }
                    }
                    if( $status ){
                        return 0; //成功
                    }else{
                        return 1; //失败
                    }
                }else{
                    //否则就表示只有一个规格项
                    //直接写入规格项表 获得id
                    $res = ProductSpecItem::create(['spec_id'=>$id, 'spec_item'=>$str])->id;
                    if($res){
                        return 0;//成功
                    }else{
                        return 1;//失败
                    }
                }
            }else{
                return 2;//没有输入规格项
            }

        }else{
            return 3;//数据写入失败
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $spec_id
     * @return \Illuminate\Http\Response
     */
    public function show($spec_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($spec_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductSpecRequest  $request
     * @param  int  $spec_id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductSpecRequest $request, $spec_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $spec_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($spec_id)
    {
        //
    }
}
