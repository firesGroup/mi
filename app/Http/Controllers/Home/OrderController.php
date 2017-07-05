<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Entity\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //根据用户ID 查出订单信息
        $data = Order::where('member_id',$id)->get();

        //获取订单ID
        $orderid = DB::table('order')->where('member_id',$id)->lists('id');

        //根据订单ID 查询订单详情表信息
        $orderdetail =DB::table('order_detail')->whereIn('order_id',$orderid)->get();

        //查询出商品ID
        $pid = DB::table('order_detail')->where('order_id',$orderid)->value('p_id');

        //获取价格
        $price = DB::table('product')->where('id',$pid)->value('price');

        $status = ['0'=>'等待支付','1'=>'已支付','2'=>'未发货','3'=>'已发货','4'=>'已收货','5'=>'退款中','6'=>'交易成功','7'=>'已关闭'];

        return view ('home.order.order',compact('data','orderdetail','status','price','orderid'));

    }


    public function detail($id)
    {
        //根据订单详情ID查订单详情表
        $odetail = DB::table('order_detail')->where('order_id',$id)->get();

//        $oid = DB::table('order_detail')->where('member_id',$id)->value('')
//        $orderid =
        //查询订单信息
        $orderid = DB::table('order')->where('id',$id)->get();

        $status = ['0'=>'等待支付','1'=>'已支付','2'=>'未发货','3'=>'已发货','4'=>'已收货','5'=>'退款中','6'=>'交易成功','7'=>'已关闭'];

        return view('home.order.orderDetail',compact('odetail','orderid','status'));
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
