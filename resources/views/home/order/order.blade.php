<?php
/**
 * File Name: order.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/7/2
 * Time: 18:19
 */
?>
@extends('layouts.home')

@section('title','')

@section('css')
    @parent

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/comment.css') }}">

@endsection

@section('content')

    <link rel="stylesheet" href="{{ asset('/css/home/order.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/home/orderbase.css') }}">

    <div class="uc-box uc-main-box">
        <div class="uc-content-box order-list-box">
            <div class="box-hd">
                <h1 class="title">我的订单
                    <small>请谨防钓鱼链接或诈骗电话，
                        <a href="//www.mi.com/service/buy/antifraud/" target="_blank" data-stat-id="78d07fef654ba47a" onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-78d07fef654ba47a', '//www.mi.com/service/buy/antifraud/', 'pcpid', '']);">了解更多&gt;</a>
                    </small>
                </h1>
                <div class="more clearfix">
                    <ul class="filter-list J_orderType">
                        <li class="first active">
                            <a href="//static.mi.com/order/#type=0" data-type="0" data-stat-id="89d882413195fd4c" onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-89d882413195fd4c', '//static.mi.com/order/#type=0', 'pcpid', '']);">全部有效订单</a>
                        </li>
                        <li>
                            <a id="J_unpaidTab" href="//static.mi.com/order/#type=7" data-type="7"data-stat-id="8edf501aa1eca097" onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-8edf501aa1eca097', '//static.mi.com/order/#type=7', 'pcpid', '']);">待支付（1）
                            </a>
                        </li>

                        <li>
                            <a id="J_sendTab" href="//static.mi.com/order/#type=8" data-type="8" data-stat-id="8308bdcf62c72b1b" onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-8308bdcf62c72b1b', '//static.mi.com/order/#type=8', 'pcpid', '']);">待收货
                            </a>
                        </li>
                        <li>
                            <a href="//static.mi.com/order/#type=5" data-type="5" data-stat-id="d99182d42018ae52"
                               onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-d99182d42018ae52', '//static.mi.com/order/#type=5', 'pcpid', '']);">已关闭</a>
                        </li>
                    </ul>
                    <form id="J_orderSearchForm" class="search-form clearfix" action="#" method="get">
                        <label for="search" class="hide">站内搜索</label>
                        <input class="search-text" type="search" id="J_orderSearchKeywords" name="keywords"
                               autocomplete="off" placeholder="输入商品名称、商品编号、订单号">
                        <input type="submit" class="search-btn iconfont" value="">
                    </form>
                </div>
            </div>

            <div class="box-bd">
                <div id="J_orderList">
                    <ul class="order-list">
                        @foreach($data as $v)
                            @if($v->order_status == 0 )
                        <li class="uc-order-item uc-order-item-pay">{{-- 颜色 finish灰色--}}
                            @else
                                <li class="uc-order-item uc-order-item-finish">
                                @endif
                            <div class="order-detail">
                                <div class="order-summary">
                                    <div class="order-status">{{$status[$v->order_status]}}</div>
                                    @if($v->order_status == 1 || $v->order_status == 2)
                                    <p class="order-desc J_deliverDesc">  我们将尽快为您发货 </p>
                                        @endif
                                </div>
                                <table class="order-detail-table">
                                    <thead>
                                    <tr>
                                        <th class="col-main">
                                            <p class="caption-info">{{$v->add_time}}<span class="sep">|</span>
                                                {{$v->buy_user}}<span class="sep">|</span>
                                    订单号： <a href="//order.mi.com/user/orderView/1170702438900346">{{$v->order_sn}}</a>
                                                <span class="sep">|</span>在线支付</p>
                                        </th>

                                        <th class="col-sub">
                                            <p class="caption-price">订单金额：<span class="num">{{$v->total}}</span>元</p>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="order-items">
                                            <ul class="goods-list">
                                                @foreach($orderdetail as $d)
                                                    @if($v->id == $d->order_id)
                                                <li>
                                                    <div class="figure figure-thumb">
                                                        <a href="//item.mi.com/1163700032.html" target="_blank">
                                                            <img src="//i1.mifile.cn/a1/pms_1490088796.67026066!80x80.jpg"
                                                                 width="80" height="80"
                                                                 alt="小米手机5s Plus 全网通版 4GB内存 灰色 64GB">
                                                        </a>
                                                    </div>
                                                    <p class="name">
                                                        {{--跳转链接--}}
                                                        <a target="_blank" href="//item.mi.com/1163700032
                                                        .html">
                                                            {{$d->p_name}}
                                                        </a>
                                                    </p>
                                                    <p class="price">{{$d->p_price}}元 × {{$d->buy_num}}</p>
                                                </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                        </td>
                                        <td class="order-actions">
                                            @if($v->order_status == 0)
                                            <a class="btn btn-small btn-primary" href="//order.mi.com/buy/confirm
                                            .php?id=1170702438900346" target="_blank">
                                                立即支付
                                                </a>
                                            @endif
                                            <a class="btn btn-small btn-line-gray" href="{{url('orderdetail').'/'.+$v->id}}">
                                                订单详情
                                            </a>
                                                @if($v->order_status != 0)
                                            <a class="btn btn-small btn-line-gray"
                                               href="//service.order.mi.com/apply/order/id/1161107696915384"
                                               target="_blank">
                                                申请售后
                                            </a>
                                                    @endif
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                                @endforeach
                    </ul>
                </div>
                <div id="J_orderListPages">
                    <div class="xm-pagenavi">
                        <span class="numbers first"><span class="iconfont"></span></span>
                        <span class="numbers current">1</span> <span class="numbers last">
                            <span class="iconfont"></span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection