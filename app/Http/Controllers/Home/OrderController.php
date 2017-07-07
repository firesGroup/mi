<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Entity\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\BaseController;
use DB;

class OrderController extends BaseController
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

        //查询未支付订单总数
        $num = DB::table('order')->where('member_id',$id)->where('order_status',0)->count();

        //查询已关闭订单总数
        $close = DB::table('order')->where('member_id',$id)->where('order_status',7)->count();

        //查询待收货订单总数
        $Receiving = DB::table('order')->where('member_id',$id)->where('order_status',3)->count();

        //查询全部有效订单
        $validorder = DB::table('order')->where('member_id',$id)->where('order_status','!=',7)->count();

        //获取订单ID
        $orderid = DB::table('order')->where('member_id',$id)->lists('id');

        //根据订单ID 查询订单详情表信息
        $orderdetail =DB::table('order_detail')->whereIn('order_id',$orderid)->get();

        $status = [
            '0'=>'等待支付','1'=>'已支付','2'=>'正在配货', '3'=>'已出库',
            '4'=>'已收货','5'=>'退款中','6'=>'交易成功','7'=>'已取消'
        ];

        return view ('home.order.order',compact('data','orderdetail','status','orderid','num','close','Receiving','validorder'));

    }


    public function detail($id)
    {
        //根据订单详情ID查订单详情表
        $odetail = DB::table('order_detail')->where('order_id',$id)->get();

        //查询订单信息
        $orderid = DB::table('order')->where('id',$id)->get();

        $status = [
            '0'=>'等待支付','1'=>'已支付','2'=>'正在配货','3'=>'已出库',
            '4'=>'已收货','5'=>'退款中','6'=>'交易成功','7'=>'已取消'
        ];

        $data = DB::table('district')->where('id', '<=', 36)->get();

        return view('home.order.orderDetail',compact('odetail','orderid','status','data'));
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
//        dd(111);
    }

    public function addressUpdate(Request $request)
    {
        $oid = $request->oid;
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;

        $data = DB::table('order')->where('id',$oid)
            ->update(['buy_user'=>$name,'buy_phone'=>$phone,'address'=>$address]);

        return $data;
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



    public function orderStatus(Request $request)
    {
        //获取订单编号
        $oid = $request->oid;

        //修改订单为已收货
        $data = DB::table('order')->where('order_sn',$oid)->update(['order_status'=>4]);

        if($data){
            return $data;
        } else {
            return false;
        }
    }

    public function status(Request $request)
    {
        //订单ID
        $oid = $request->oid;

        $data = DB::table('order')->where('id',$oid)->update(['order_status'=>7]);

        if($data){
            return $data;
        }else{
            return false;
        }
    }

    public function pay(Request $request,$id)
    {

        //根据订单编号ID查订单表
        $order = DB::table('order')->where('order_sn',$id)->get();

        //查出订单ID
        $detailid = DB::table('order')->where('order_sn',$id)->value('id');

        //根据订单ID查出订单详情信息
        $detail = DB::table('order_detail')->where('order_id',$detailid)->get();

        return view('home/order/payorder',compact('order','detail'));
    }
}
