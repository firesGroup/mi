<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entity\Order;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * Ps:  订单显示页(数据表名[order])
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //查询订单表(order)所有订单,每页五条
        if($request->has('search')){
            dd(123);
            $modelId = $request->input('word',null);

            $data = CateGory::where('category_name','like',"%{$modelId}%")->paginate(10);
//            dd($data);
        }else{
            $data = order::orderby('id')->paginate(5);

            //统计订单总数
        }

        $sum = order::count('id');

        //定义订单状态
        $status = [0 => '未支付', 1 => '已支付', 2 => '未发货', 3 => '已发货', 4 => '已收货', 5 => '退款中', 6 => '已完成',7=>'已作废',8=>'已取消'];

        //返回视图,传参
        return view('admin/order/order', compact('data', 'sum', 'status'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Ps:  订单详情(使用到表名[order,orderdetail])
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //查询order表$id的数据
        $data = order::find($id);

        //查询订单详情表数据
        $orderdetail = DB::table('order_detail')->where('order_id', $id)->get();

        //定义订单状态
        $status = [0 => '未支付', 1 => '已支付', 2 => '未发货', 3 => '已发货', 4 => '已收货', 5 => '退款中', 6 => '已完成',7=>'已作废'];

        //返回视图,传参
        return view('admin/order/showOrder', compact('data', 'orderdetail', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * Ps:  修改订单状态ID
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {

        //获取要修改的状态数值
        $sid = $request->input('statusId');

        //获取用户ID
        $id = $request->input('id');

        //查询数据库修改状态
        $status = DB::table('order')
            ->where('id', $id)
            ->update(['order_status' => $sid]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DB::table('order')->delete($id);
    }
}
