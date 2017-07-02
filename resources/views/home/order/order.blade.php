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
    <div class="span16">
        <div class="box-hd">
            <h1 class="title">我的订单
                <small>请谨防钓鱼链接或诈骗电话，<a
                            onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-78d07fef654ba47a', '//www.mi.com/service/buy/antifraud/', 'pcpid', '']);"
                            href="//www.mi.com/service/buy/antifraud/" target="_blank" data-stat-id="78d07fef654ba47a">了解更多&gt;</a>
                </small>
            </h1>
            <div class="more clearfix">
                <ul class="filter-list J_orderType">
                    <li class="first active"><a
                                onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-89d882413195fd4c', '//static.mi.com/order/#type=0', 'pcpid', '']);"
                                href="//static.mi.com/order/#type=0" data-type="0"
                                data-stat-id="89d882413195fd4c">全部有效订单</a></li>
                    <li><a id="J_unpaidTab"
                           onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-8edf501aa1eca097', '//static.mi.com/order/#type=7', 'pcpid', '']);"
                           href="//static.mi.com/order/#type=7" data-type="7" data-stat-id="8edf501aa1eca097">待支付</a>
                    </li>
                    <li><a id="J_sendTab"
                           onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-8308bdcf62c72b1b', '//static.mi.com/order/#type=8', 'pcpid', '']);"
                           href="//static.mi.com/order/#type=8" data-type="8" data-stat-id="8308bdcf62c72b1b">待收货</a>
                    </li>
                    <li>
                        <a onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-d99182d42018ae52', '//static.mi.com/order/#type=5', 'pcpid', '']);"
                           href="//static.mi.com/order/#type=5" data-type="5" data-stat-id="d99182d42018ae52">已关闭</a>
                    </li>
                </ul>
                <form class="search-form clearfix" id="J_orderSearchForm" action="#" method="get">
                    <label class="hide" for="search">站内搜索</label>
                    <input name="keywords" class="search-text" id="J_orderSearchKeywords" type="search"
                           placeholder="输入商品名称、商品编号、订单号" autocomplete="off">
                    <input class="search-btn iconfont" type="submit" value="">
                </form>
            </div>
        </div>
    </div>

@endsection