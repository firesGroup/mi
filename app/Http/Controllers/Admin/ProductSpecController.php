<?php

namespace App\Http\Controllers\Admin;

use App\Entity\ProductSpec;
use App\Entity\ProductModel;
use App\Entity\ProductSpecItem;
use App\Http\Requests\Admin\ProductSpecRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class ProductSpecController extends Controller
{
    /**
     * 规格列表页
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
                $specList = ProductSpec::where('model_id',$modelId)
                    ->where('spec_name','like',"%{$word}%")
                    ->paginate(10);

            }elseif( $modelId && !$word ){
                //如果模型id存在,没有关键字
                $specList = ProductSpec::where('model_id',$modelId)->paginate(10);
            }else{
                //否则就是搜索关键字
                $specList = ProductSpec::where('spec_name','like',"%{$word}%")->paginate(10);
            }
        }else{
            //获取全部数据并分页
            $specList = ProductSpec::paginate(10);
        }

        //循环 获取每个规格的所有规格项,再组合 输出到模板
        foreach( $specList as $key=>$spec ){
            $arr = ProductSpecItem::where('spec_id',$spec->id)->select('spec_item')->get();
                foreach( $arr as $v ){
                    $itemArr[] = $v->spec_item;
                }
                //把规格项拼接为字符串
            $specList[$key]['spec_item'] = implode('，', $itemArr);
            $itemArr = null;
        }
        //获取所有模型
        $modelList = ProductModel::all();
        return view('admin.product.spec.index',compact('specList','modelList'));
    }

    /**
     * 显示添加规格页模版.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //获得所有模型列表
        $modelList = ProductModel::all();
        return view('admin.product.spec.create', compact('modelList'));
    }

    /**
     * 处理添加规格
     *
     * @param  ProductSpecRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductSpecRequest $request)
    {
        //规格表需要写入的数据
        $specData = $request->only(['spec_name','model_id']);
        //规格项表需要写入的数据
        $specItemData = $request->spec_item;
        //清除规格项字串两边的逗号
        $str = trim($specItemData,',');
        if( $str != '' ){
            //查找逗号出现的次数
            $num = substr_count( $str, ',' );
            if( $num > 0 ){
                //逗号出现次数大于0,就组合为数组
                $arr = explode(',',$str);
                //使用事务处理写入操作
                $res = DB::transaction(function() use($specData, $arr){
                    $id = ProductSpec::create($specData)->id;
                    foreach( $arr as $value ){
                        $insertArr[] =['spec_id'=>$id, 'spec_item'=>$value];
                    }
                    ProductSpecItem::insert($insertArr);
                    return true;
                });
            }else {
                //否则就表示只有一个规格项
                //使用事务
                $res = DB::transaction(function() use($specData, $str){
                    $id = ProductSpec::create($specData)->id;
                    ProductSpecItem::insert(['spec_id' => $id, 'spec_item' => $str]);
                    return true;
                });
            }
            return $res?0:1;
        }else{
            return 2;//清除两边逗号后,没有如何字符!代表没有输入数据
        }



    }
    /**
     * Show the form for editing the specified resource.
     * 修改模版页
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($spec_id)
    {
        $info = ProductSpec::find($spec_id);
        $modelList = ProductModel::all();
        $arr = $info->item;
        foreach( $arr as $v ){
            $itemArr[] = $v->spec_item;
        }
        //把规格项拼接为字符串
        $info['spec_item'] = implode(',', $itemArr);
        return view('admin.product.spec.edit',compact('info','modelList'));
    }

    /**
     * Update the specified resource in storage.
     * 修改处理页
     *
     *
     * @param  ProductSpecRequest  $request
     * @param  int  $spec_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $spec_id)
    {
        //规格表需要写入的数据
        $specData = $request->only(['spec_name','model_id']);
        //规格项表需要写入的数据
        $specItemData = $request->spec_item;
        //清除规格项字串两边的逗号
        $str = trim($specItemData,',');
        if( $str != '' ){
            //查找逗号出现的次数
            $num = substr_count( $str, ',' );
            if( $num > 0 ){
                //逗号出现次数大于0,就组合为数组
                $arr = explode(',',$str);
                //使用事务处理写入操作
                $res = DB::transaction(function() use($spec_id,$specData, $arr){
                    ProductSpec::where('id',$spec_id)->update($specData);
                    //先删除当前规格所有规格项
                    ProductSpecItem::where('spec_id', $spec_id)->delete();
                    //再写入
                    foreach( $arr as $value ){
                        ProductSpecItem::create(['spec_id' => $spec_id, 'spec_item' => $value]);
                    }
                    return true;
                });
            }else {
                //否则就表示只有一个规格项
                //使用事务
                $res = DB::transaction(function () use ($spec_id, $specData, $str) {
                    ProductSpec::where('id',$spec_id)->update($specData);
                    //先删除当前规格所有规格项
                    ProductSpecItem::where( 'spec_id',$spec_id )->delete();
                    //再写入
                    ProductSpecItem::create(['spec_id' => $spec_id, 'spec_item' => $str]);
                    return true;
                });
            }
            return $res?0:1;
        }else{
            return 2;//清除两边逗号后,没有如何字符!代表没有输入数据
        }


    }

    /**
     * 删除规格
     *
     * @param  int  $spec_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($spec_id)
    {
        //删除规格 那么也要同时删除规格项
        //获取当前规格的所有规格项的id
        $items = ProductSpec::find($spec_id)->item;
        foreach( $items as $item ){
            $ids[] = $item->id;
        };
        //使用事务处理
        $res = DB::transaction( function() use($spec_id, $ids){
            //删除规格
            ProductSpec::destroy($spec_id);
            //删除规格项
            ProductSpecItem::destroy($ids);

            return true;
        });

        return $res?0:1;
    }


}
