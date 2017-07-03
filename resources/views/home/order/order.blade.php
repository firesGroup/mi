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
@extends('layouts.iframe')

@section('css')
    @parent
@endsection

@section('content')

    <link rel="stylesheet" href="{{ asset('/css/home/order.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('/css/home/base.css') }}">--}}
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
                        <li class="uc-order-item uc-order-item-pay">
                            <div class="order-detail">
                                <div class="order-summary">
                                    <div class="order-status">等待付款</div>
                                </div>
                                <table class="order-detail-table">
                                    <thead>
                                    <tr>
                                        <th class="col-main">
                                            <p class="caption-info">2017年07月02日 20:08<span class="sep">|</span>
                                                潘珺<span class="sep">|</span>
                                    订单号： <a href="//order.mi.com/user/orderView/1170702438900346">1170702438900346</a>
                                                <span class="sep">|</span>在线支付</p>
                                        </th>

                                        <th class="col-sub">
                                            <p class="caption-price">订单金额：<span class="num">3798.00</span>元</p>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="order-items">
                                            <ul class="goods-list">
                                                <li>
                                                    <div class="figure figure-thumb">
                                                        <a href="//item.mi.com/1163700032.html" target="_blank">
                                                            <img src="//i1.mifile.cn/a1/pms_1490088796.67026066!80x80.jpg"
                                                                 width="80" height="80"
                                                                 alt="小米手机5s Plus 全网通版 4GB内存 灰色 64GB">
                                                        </a>
                                                    </div>
                                                    <p class="name">
                                                        <a target="_blank" href="//item.mi.com/1163700032.html">小米手机5s Plus
                                                            全网通版 4GB内存 灰色 64GB</a>
                                                    </p>
                                                    <p class="price">2299元 × 1</p>
                                                </li>

                                                <li>
                                                    <div class="figure figure-thumb">
                                                        <a href="//item.mi.com/1171800018.html" target="_blank">
                                                        <img src="//i1.mifile.cn/a1/pms_1495692033.10494295!80x80.jpg"width="80" height="80"
                                                                 alt="小米Max 2 全网通版 4GB内存 金色 64GB">
                                                        </a>
                                                    </div>

                                                    <p class="name">
                                                        <a target="_blank" href="//item.mi.com/1171800018.html">小米Max 2 全网通版
                                                            4GB内存 金色 64GB</a>
                                                    </p>
                                                    <p class="price">1699元 × 1</p></li>
                                            </ul>
                                        </td>
                                        <td class="order-actions">
                                            <a class="btn btn-small btn-primary" href="//order.mi.com/buy/confirm.php?id=1170702438900346" target="_blank">立即支付</a>
                                            <a class="btn btn-small btn-line-gray" href="//order.mi.com/user/orderView/1170702438900346">订单详情</a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                        <li class="uc-order-item uc-order-item-finish">
                            <div class="order-detail">
                                <div class="order-summary">
                                    <div class="order-status">已收货</div>
                                </div>
                                <table class="order-detail-table">
                                    <thead>
                                    <tr>
                                        <th class="col-main"><p class="caption-info">2016年11月07日 20:11<span class="sep">|</span>潘珺<span
                                                        class="sep">|</span>订单号：<a
                                                        href="//order.mi.com/user/orderView/1161107696915384">1161107696915384</a><span
                                                        class="sep">|</span>微信支付（Native）</p></th>
                                        <th class="col-sub"><p class="caption-price">订单金额：<span
                                                        class="num">498.00</span>元</p></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="order-items">
                                            <ul class="goods-list">
                                                <li>
                                                    <div class="figure figure-thumb"><a
                                                                href="//item.mi.com/1160800072.html" target="_blank">
                                                            <img src="//i1.mifile.cn/a1/T1AaJQBbZT1RXrhCrK!80x80.jpg"
                                                                 width="80" height="80" alt="小米盒子3 增强版 白色"> </a></div>
                                                    <p class="name"><a href="//item.mi.com/1160800072.html"
                                                                       target="_blank">小米盒子3 增强版 白色</a></p>
                                                    <p class="price">399元 × 1</p></li>
                                                <li>
                                                    <div class="figure figure-thumb"><a
                                                                href="//item.mi.com/1161200010.html" target="_blank">
                                                            <img src="//i1.mifile.cn/a1/T1ycK_BjYv1RXrhCrK!80x80.jpg"
                                                                 width="80" height="80" alt="小米圈铁耳机 金色"> </a></div>
                                                    <p class="name"><a href="//item.mi.com/1161200010.html"
                                                                       target="_blank">小米圈铁耳机 金色</a></p>
                                                    <p class="price">99元 × 1</p></li>
                                            </ul>
                                        </td>
                                        <td class="order-actions"><a class="btn btn-small btn-line-gray"
                                                                     href="//order.mi.com/user/orderView/1161107696915384">订单详情</a>
                                            <a class="btn btn-small btn-line-gray"
                                               href="//service.order.mi.com/apply/order/id/1161107696915384"
                                               target="_blank">申请售后</a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="J_orderListPages">
                    <div class="xm-pagenavi"><span class="numbers first"><span class="iconfont"></span></span> <span
                                class="numbers current">1</span> <span class="numbers last"><span
                                    class="iconfont"></span></span></div>
                </div>
            </div>
        </div>
    </div>

@endsection