<?php
/**
 * File Name: order.blade.php
 * Description: 商品订单页
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/19
 * Time: 21:00
 */
?>
@extends('admin.index')

@section('order')

    <h4>订单列表 (共计{{$sum}}条)</h4>
    <table class="layui-table">
        <tr>
            <th>id</th>
            <th>订单编号</th>
            <th>用户</th>
            <th>收货人</th>
            <th>收货手机</th>
            <th>收货地址</th>
            <th>订单总价</th>
            <th>下单时间</th>
            <th>订单状态</th>
            <th>创建时间</th>
            <th>修改时间</th>
            <th>操作</th>
        </tr>
        {{--{{dd($data)}}--}}
        @foreach($data as $orders)
            {{--{{dd($orders)}}--}}

            <tr>
                <td>{{$orders->id}}</td>
                <td>{{$orders->order_sn}}</td>
                <td>{{$orders->mid}}</td>
                <td>{{$orders->user}}</td>
                <td>{{$orders->phone}}</td>
                <td>{{$orders->address}}</td>
                <td>{{$orders->total}}</td>
                <td>{{$orders->add_time}}</td>
                <td>{{$orders->order_status}}</td>
                <td>{{$orders->created_at}}</td>
                <td>{{$orders->updated_at}}</td>
                <td><a href='{{url('admin/order/'.$orders->id)}}'>查看</a></td>
            </tr>

        @endforeach
    </table>
    <div class="pagination center-block" style="text-align:center">
        {{$data->links()}}
    </div>
@endsection