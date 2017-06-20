<?php
/**
 * File Name: show_order.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/20
 * Time: 10:05
 */

?>

@extends('admin.master.master')

@section('content')
    {{--{{dd($data)}}--}}
    <table class="table table-condensed">

        <tr>
            <td>基本信息</td>
        </tr>
        <tr>
            <td>订单ID: {{$data->id}}</td>
            <td>订单编号: {{$data->order_sn}}</td>
            <td>{{$data->mid}}</td>
            <td>{{$data->user}}</td>
            <td>{{$data->phone}}</td>
            <td>{{$data->address}}</td>
            <td>配送方式: {{$data->delivery}}</td>
            <td>物流订单号: {{$data->delivery_orderid}}</td>
            <td>总金额: {{$data->total}}</td>
            <td>下单时间: {{$data->add_time}}</td>
            <td>{{$data->order_status}}</td>
            <td>{{$data->created_at}}</td>
            <td>{{$data->updated_at}}</td>
        </tr>

    </table>



@endsection
