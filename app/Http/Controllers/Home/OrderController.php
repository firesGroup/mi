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
        $orderid = Order::where('member_id',$id)->value('id');

        //根据订单ID 查询订单详情表信息
        $orderdetail =DB::table('order_detail')->where('order_id',$orderid)->get();

        //查询出商品ID
        $pid = DB::table('order_detail')->where('order_id',$orderid)->value('p_id');

//        dd($orderdetail);
        return view ('home.order.order',compact('data','orderdetail'));

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
