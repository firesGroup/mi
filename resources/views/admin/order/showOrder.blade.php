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
    <section class="larry-grid">
        <header class="larry-personal-tit">
            <span style="font-size: 20;">商品评价管理-评价列表</span>
        </header>
        <div class="row" id="infoSwitch">
            <blockquote class="layui-elem-quote col-md-12 head-con">
                <div class="title">
                    <i class="larry-icon larry-caozuo"></i>
                    <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                </div>
                <ul>
                    <li>商品评价管理</li>
                    <li>点击<i class="layui-icon">&#xe639;</i> 修改订单状态</li>
                </ul>
                <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
            </blockquote>
        </div>

        <div class=""
             style="background-color:#f2f2f2;border: 1px solid #1ca794;font-size: 20px;height: 900px;">

            <legend>基本信息<i class="layui-icon" style="font-size: 30px; color: #FF5722;">&#xe60c;</i>  </legend>

            <div style="text-align: center;width: 500px;height: 170px;float: left;margin-left: 40px;">
                <ul style="text-align: left;">
                    <li>订单ID: <span id="did">{{$data->id}}</span></li>
                    <br>
                    <li>用户ID: {{$data->member_id}}</li>
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
                        <li id="li"> 订单状态: <span id="p">{{$status[$data->order_status]}}</span>
                            @if(!($status[$data->order_status]== '已完成') && !($status[$data->order_status] == '已取消') && !($status[$data->order_status] == '已作废'))

                                <i class="layui-icon" style="font-size: 30px;">&#xe639;</i>
                            @endif
                            <span id="newid" style="display: none;">{{$data->order_status}}</span>
                        </li>

                    </ul>

                </div>
            </div>

            <hr>


            <div>

                <legend>收货信息<i class="layui-icon" style="font-size: 30px; color: #01AAED;">&#xe609;</i></legend>
            <div style="text-align: center;width: 500px;height: 180px;float: left;margin-left: 40px;">
                <ul style="text-align: left; font-size: 20px;">
                    <li>收货人: {{$data->buy_user}}</li>
                    <br>
                    <li>收货人手机号: {{$data->buy_phone}}</li>
                    <br>
                    <li>详细地址: {{$data->address}}</li>
                </ul>
            </div>
                <div style="text-align: center;width: 500px;height: 150px;float: left;">
                    <ul style="text-align: left;">
                        {{--<li>配送方式: {{$data->delivery}}</li>--}}
                        {{--<br>--}}
                        {{--<li>物流订单号: {{$data->delivery_orderid}}</li>--}}
                        <br>
                    </ul>
                </div>
            </div>

            <hr>
            <legend>商品信息<i class="layui-icon" style="font-size: 30px; color: #F7B824;">&#xe62e;</i></legend>
            <table class="layui-table" lay-skin="line" style="width:1100px;height:100px;background-color: #c2c2c2;">
                <tr>
                    <th>商品ID</th>
                    <th>商品名称</th>
                    <th>商品单价</th>
                    <th>商品数量</th>
                    <th>总价</th>
                </tr>
                {{--{{dd($orderdetail)}}--}}

            @foreach($orderdetail as $v)
                    <tr>
                    <td>{{$v->p_id}}</td>
                    <td>{{$v->p_name}}</td>
                    <td>{{$v->p_price}}</td>
                    <td>{{$v->buy_num}}</td>
                    <td>{{$data->total}}</td>
                    </tr>
                @endforeach

            </table>
        </div>
    </section>

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
                    '<option value="6" id="o">已完成</option>' +
                    '<option value="7" id="o">已作废</option>' +
                    '<option value="8" id="o">已取消</option>' +
                    '</select>';

                var str = '订单状态:' + sel;

                //当点击#li标签显示下拉框
                $(this).parent('li').html(str);


                $('li').on('change', 'select#status', function () {

                    //当点击获取要改变的状态数值
                    var sid = $('option:checked').val();

//                    alert(sid);
                    //获取用户id用做数据库查询条件
                    var id = $('li #did').text();

                    //获取点击option的文本内容用于下方拼接 写入标签
                    var text = $('option:checked').text();

                    //定义路由
                    var url = '{{ url('/admin/orderStatus') }}';

                    $.ajax({
                        url: url,
                        type: 'get',
                        data: {'statusId': sid, 'id': id},//拼接发送要修改的状态数值和用户ID

                        success: function (datas) {

                            //拼接li标签 写入#li标签中
                            $('li#li').html('订单状态: ' + text + '<i class="layui-icon" style="font-size: 30px;">&#xe639;</i>');

                        }
                    });
                });
            });
        });


    </script>
@endsection
