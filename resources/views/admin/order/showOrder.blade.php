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
@extends('layouts.iframe')

@section('title','订单详情')

@section('css')
    @parent
@endsection

@section('content')
    <div class="layui-main" style="background-color: white;border-color: #1ca794;font-size: 20px;">

        <fieldset class="layui-elem-field">

            <legend>基本信息</legend>

            {{--<table class="layui-table" lay-skin="row">--}}
            <div style="text-align: center;width: 500px;height: 170px;float: left;">
                <ul style="text-align: left;">
                    <li>订单ID: {{$data->id}}</li>
                    <br>
                    <li>用户ID: {{$data->mid}}</li>
                    <br>
                </ul>
                <div style="float: left;">
                    <ul style="text-align:right;float: right;font-size: 20px;">
                        <li>订单编号: {{$data->order_sn}}</li>
                        <br>
                    </ul>
                </div>
            </div>


            <div style="text-align: center;width: 500px;height:170px; float: left;">
                <ul style="text-align: left;">
                    <li>订单总金额: {{$data->total}}</li>
                    <br>
                    <li>订单创建时间: {{$data->add_time}}</li>
                    <br>
                </ul>
                <div style="float: left;">

                    <ul style="text-align:right;float: right;">
                        <li>订单状态: {{$status[$data->order_status]}} <i class="layui-icon" style="font-size: 30px;">&#xe642;</i></li>

                        <select name="select" id="" style="display: none">
                            <option value="0">未支付</option>
                            <option value="1">已支付</option>
                            <option value="2">未发货</option>
                            <option value="3">未收货</option>
                            <option value="4">已收货</option>
                            <option value="5">退款中</option>
                            <option value="6">交易完成</option>
                        </select>
                    </ul>
                    {{----}}
                    {{--                    <a href="{{ url('admin/order/'.$data->order_status)}}">--}}
                </div>
            </div>


        </fieldset>

        <fieldset class="layui-elem-field">

            <legend>收货信息</legend>

            <div style="text-align: center;width: 500px;height: 180px;float: left;">
                <ul style="text-align: left; font-size: 20px;">
                    <li>收货人: {{$data->user}}</li>
                    <br>
                    <li>收货人手机号: {{$data->phone}}</li>
                    <br>
                    <li>详细地址: {{$data->address}}</li>
                </ul>
            </div>

            <div style="text-align: center;width: 500px;height: 150px;float: left;">
                <ul style="text-align: left;">
                    <li>配送方式: {{$data->delivery}}</li>
                    <br>
                    <li>物流订单号: {{$data->delivery_orderid}}</li>
                    <br>
                </ul>
            </div>


        </fieldset>

        <fieldset class="layui-elem-field">

            <legend>商品信息</legend>

            <table class="layui-table" lay-skin="line" layui-bg-red>

                <tr>
                    <td>商品ID</td>
                    <td>商品名称</td>
                    <td>商品单价</td>
                    <td>商品数量</td>
                </tr>

                <tr>
                    <td>{{$odetail->pid}}</td>
                    <td>{{$odetail->p_name}}</td>
                    <td>{{$odetail->p_price}}</td>
                    <td>{{$odetail->p_num}}</td>
                </tr>

            </table>

        </fieldset>

    </div>
@endsection

@section('js')
    @parent

    <script>
        //        layui.use
        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            var index;

            $('i.layui-icon').on('click', function(){
                $('select.select').css(display)
//                alert(1);
            });

        });

    </script>
@endsection
