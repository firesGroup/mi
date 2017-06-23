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

@extends('layouts.iframe')

@section('title','商品订单')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>商品订单管理</li>
                        <li>点击操作可查看订单详情</li>
                    </ul>
                </blockquote>
            </div>
            <header class="larry-personal-tit">


                <span style="font-size: 25px;">商品订单</span><span>(共计{{$sum}}条)</span>
                <button class="layui-btn layui-btn-radius layui-btn-primary" id="refresh">
                    <i class="layui-icon">&#x1002;</i> 刷新本页
                </button>
            </header>

            <table class="layui-table larry-table-info">
                <tr>
                    <th>id</th>
                    <th>订单编号</th>
                    <th>用户</th>
                    <th>收货人</th>
                    <th>收货手机号</th>
                    {{--<th>收货地址</th>--}}
                    <th>订单总价</th>
                    <th>下单时间</th>
                    <th>订单状态</th>
                    <th>创建时间</th>
                    <th>修改时间</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->order_sn}}</td>
                        <td>{{$v->member_id}}</td>
                        <td>{{$v->buy_user}}</td>
                        <td>{{$v->buy_phone}}</td>
                        {{--<td>{{$v->address}}</td>--}}
                        <td>{{$v->total}}</td>
                        <td>{{$v->add_time}}</td>
                        <td>{{$status[$v->order_status]}}</td>
                        <td>{{$v->created_at}}</td>
                        <td>{{$v->updated_at}}</td>
                        {{--<td><a href='{{url('admin/order/order'.$orders->id)}}'>查看</a></td>--}}
                        <td>
                            <div class="layui-btn-group">
                                <a href="{{ url('admin/order/'.$v->id) }}" class="layui-btn  layui-btn-small"
                                   data-alt="查看">
                                    <i class="layui-icon">&#xe60b;</i>
                                </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="larry-table-page">
                {{ $data->render() }}
            </div>
    </section>

@endsection






























