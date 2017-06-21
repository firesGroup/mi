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
    <div class="layui-main" style="background-color: white;border: 1px solid #1ca794;font-size: 20px;height: 900px;">

        <legend>基本信息</legend>

        <div style="text-align: center;width: 500px;height: 170px;float: left;margin-left: 40px;">
            <ul style="text-align: left;">
                <li>订单ID: <span id="did">{{$data->id}}</span></li>
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


        <div style="text-align: center;width: 500px;height:180px; float: left;margin-left: 40px;">
            <ul style="text-align: left;">
                <li>订单总金额: {{$data->total}}</li>
                <br>
                <li>订单创建时间: {{$data->add_time}}</li>
                <br>
            </ul>
            <div style="float: left;" id="div">

                <ul style="text-align:right;float: right;" id="ul">

                    <li id="li"> 订单状态: {{$status[$data->order_status]}}
                        <i class="layui-icon" style="font-size: 30px;">&#xe642;</i>
                    </li>

                </ul>

            </div>
        </div>

        <hr>


        <div>

            <legend>收货信息</legend>

            <div style="text-align: center;width: 500px;height: 180px;float: left;margin-left: 40px;">
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
        </div>

        <hr>
        <legend>商品信息</legend>

        <table class="layui-table" lay-skin="line" style="width:1100px;height:150px;">

            <tr>
                <td>商品ID</td>
                <td>商品名称</td>
                <td>商品单价</td>
                <td>商品数量</td>
                <td>总价</td>
            </tr>
            @foreach($odetail as $v)
                <tr>
                    {{--{{dd($v)}}--}}
                    <td>{{$v->pid}}</td>
                    <td>{{$v->p_name}}</td>
                    <td>{{$v->p_price}}</td>
                    <td>{{$v->p_num}}</td>
                    <td>{{$data->total}}</td>
                </tr>
            @endforeach

        </table>
    </div>

@endsection

@section('js')
    @parent

    <script>

        layui.use(['jquery', 'layer'], function () {

            var $ = layui.jquery,
                layer = layui.layer;

            $('li#li').on('click', 'i', function () {

                var sel =
                    '<select class="select" id="status" style="font-size: 20px;height: 35px;">' +
                    '<option value="">更改状态</option>' +
                    '<option value="0" id="o">未支付</option>' +
                    '<option value="1" id="o">已支付</option> ' +
                    '<option value="2" id="o">未发货</option>' +
                    '<option value="3" id="o">未收货</option> ' +
                    '<option value="4" id="o">已收货</option>' +
                    '<option value="5" id="o">退款中</option> ' +
                    '<option value="6" id="o">交易完成</option>' +
                    '</select>';

                var str = '订单状态:' + sel;

                //当点击#li标签显示下拉框
                $(this).parent('li').html(str);

            });

            $('li').on('change', 'select#status', function () {

                //获取改变的默认值
                var sid = $('option:checked').val();

//                if(sid == 6){
//
//                    alert('订单已完成,无法修改');
//                    return false;
//
//                }else {
                //获取原来状态的ID
                var id = $('li #did').text();

                //定义路由
                var url = '{{ url('/admin/orderStatus') }}';

                $.ajax({
                    url: url,
                    type: 'get',
                    data: {'statusId': sid, 'id': id},//拼接发送要修改的状态ID和原来的状态ID

                    success: function (datas) {

                        //获取点击option的文本内容
                        var text = $('option:checked').html();

                        //拼接li标签 写入#li标签中
                        $('li#li').html('订单状态: ' + text + '<i class="layui-icon" style="font-size: 30px;"></i>');

                    }
                });
                }


            });

        });


    </script>
@endsection
