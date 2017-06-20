<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Entity\order;
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
        $data = order::orderby('id')->paginate(5);
        $sum = order::count('id');
        $status = [0 => '未支付', 1 => '已支付', 2 => '未发货', 3 => '已发货', 4 => '已收货', 5 => '退款中', 6 => '交易已完成'];
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
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = order::find($id);
        $odetail = DB::table('orderdetail')->where('order_id', $id)->first();
        $status = [0 => '未支付', 1 => '已支付', 2 => '未发货', 3 => '已发货', 4 => '已收货', 5 => '退款中', 6 => '交易已完成'];
        return view('admin/order/showOrder', compact('data', 'odetail', 'status'));
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
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
