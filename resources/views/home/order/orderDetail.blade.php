<?php
/**
 * File Name: orderDetail.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/7/5
 * Time: 21:23
 */

?>

@extends('layouts.home')

@section('title','')

@section('css')
    @parent

    <link rel="stylesheet" href="{{ asset('/css/home/order.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/home/orderbase.css') }}">

@endsection

@section('content')


<div class="uc-box uc-main-box">
    <div class="uc-content-box order-view-box">
        <div class="box-hd">
            <h1 class="title">订单详情
                <small>
                    请谨防钓鱼链接或诈骗电话，
                    <a href="http://bbs.xiaomi.cn/thread/index/tid/11508301" target="_blank">
                        了解更多&gt;
                    </a>
                </small>
            </h1>
            <div class="more clearfix">
                <h2 class="subtitle">订单号：{{$orderid[0]->order_sn}} <span class="tag tag-subsidy"></span>
                </h2>
                <div class="actions">
                    <a title="申请售后" href="http://service.order.mi.com/apply/order/id/1161107696915384"
                       class="btn btn-small btn-line-gray">申请售后</a>
                </div>
            </div>
        </div>
        <div class="box-bd">
            <div class="uc-order-item uc-order-item-finish">
                <div class="order-detail">
                    <div class="order-summary">


                        <div class="order-status">
                                @if($orderid[0]->order_status != 5 || $orderid[0]->order_status != 7 || $orderid[0]->order_status != 6)
                            <span style="color: #ff6700;">{{$status[$orderid[0]->order_status]}}</span>
                                @else
                                    {{$status[$orderid[0]->order_status]}}
                                    @endif
                            <span  id="statusid" style="display: none;">{{$orderid[0]->order_status}}</span>
                        </div>

                        <div class="order-progress">
                            <ul class="progress-list clearfix">
                                <li class="step li1">
                                    <div class="progress"><span class="text">下单</span></div>
                                    <div class="info">2016年11月07日 20:11</div>
                                </li>
                                <li class="step li2">
                                    <div class="progress"><span class="text">付款</span></div>
                                    <div class="info">2016年11月07日 20:12</div>
                                </li>
                                <li class="step li3">
                                    <div class="progress"><span class="text">配货</span></div>
                                    <div class="info">2016年11月07日 20:12</div>
                                </li>
                                <li class="step  li4">
                                    <div class="progress"><span class="text">出库</span></div>
                                    <div class="info">2016年11月07日 23:36</div>
                                </li>
                                <li class="step  li5">
                                    <div class="progress"><span class="text">交易成功</span></div>
                                    <div class="info">2016年11月08日 10:42</div>
                                </li>
                            </ul>
                        </div>
                        <div class="order-delivery order-delivery-detail" style="display:block;border:none;">
                            <p class="delivery-num">
                                物流公司：<a href="http://www.rufengda.com" target="_blank">如风达(深圳)
                                    <i class="iconfont"></i></a>运单号：116110769691538401
                            </p>
                        </div>
                    </div>
                    <!-- 首次查看密码 -->
                    <div class="order-liwu J_giftcard_active hide">
                        <div class="box">
                            <h3>激活并获取 小米礼物码 密码</h3>
                            <p>点击获取密码后，我们将向账户绑定的手机 发送一条验证码<br>由于密码的特殊性，获取后不再支持7天无理由退货</p>
                            <a href="javascript:void(0);" class="btn btn-primary J_getGiftcode"
                               data-stat-id="a23d55b9e18fc08a"
                               onclick="_msq.push(['trackEvent', 'ba8c3443aa8bda14-a23d55b9e18fc08a', 'javascript:void0', 'pcpid', '']);">获取密码</a>
                        </div>
                    </div>
                    <!-- 账号未绑定手机号 -->
                    <div class="order-liwu J_giftcard_bind hide">
                        <div class="box">
                            <h3>您的账号尚未绑定手机号</h3>
                            <p>为了密码的安全性，获取密码以及每次查看密码都需要通过小米账号绑定的手机号进行验证<br>您的账号尚未绑定手机号，需要绑定手机号后继续操作</p>
                            <a href="//account.xiaomi.com/" target="_blank" class="btn btn-primary "
                               data-stat-id="045af825eddc79cb"
                               onclick="_msq.push(['trackEvent', 'ba8c3443aa8bda14-045af825eddc79cb', '//account.xiaomi.com/', 'pcpid', '']);">前往
                                账号中心</a>
                        </div>
                    </div>
                    <!-- Token已过期，再次查看密码 -->
                    <div class="order-liwu J_giftcard_view hide">
                        <div class="box">
                            <h3>查看 小米礼物码 密码</h3>
                            <p>点击查看密码后，我们将向账户绑定的手机 发送一条验证码</p>
                            <a href="javascript:void(0);" class="btn btn-primary J_getGiftViewcode"
                               data-stat-id="b95059948ec21a01"
                               onclick="_msq.push(['trackEvent', 'ba8c3443aa8bda14-b95059948ec21a01', 'javascript:void0', 'pcpid', '']);">查看密码</a>
                        </div>
                    </div>
                    <!-- 礼物码领取后 -->
                    <div class="order-liwu-list J_liwulist hide">
                        <h3>小米礼物码 密码</h3>
                        <table>

                        </table>
                        <p>* 访问 <a href="//www.mi.com/giftcode/" target="_blank" data-stat-id="6636cdbc657762ae"
                                   onclick="_msq.push(['trackEvent', 'ba8c3443aa8bda14-6636cdbc657762ae', '//www.mi.com/giftcode/', 'pcpid', '']);">http://www.mi.com/giftcode/</a>
                            根据提示使用礼物码，或在小米商城App中以此点击「服务」-「使用礼物码」</p>
                    </div>
                    <table class="order-items-table">
                        <tbody>
                        @foreach($odetail as $d)
                        <tr>
                            <td class="col col-thumb">
                                <div class="figure figure-thumb">
                                    <a target="_blank" href="//item.mi.com/1160800072.html"
                                       data-stat-id="14494d13ceea409b"
                                       onclick="_msq.push(['trackEvent', 'ba8c3443aa8bda14-14494d13ceea409b', '//item.mi.com/1160800072.html', 'pcpid', '']);">
                                        <img src="//i1.mifile.cn/a1/T1AaJQBbZT1RXrhCrK!80x80.jpg" width="80" height="80"
                                             alt="">
                                    </a>
                                </div>
                            </td>
                            <td class="col col-name">
                                <p class="name">
                                    <a target="_blank" href="//item.mi.com/1160800072.html"
                                       data-stat-id="cd966104ed488f46"
                                       onclick="_msq.push(['trackEvent', 'ba8c3443aa8bda14-cd966104ed488f46', '//item.mi.com/1160800072.html', 'pcpid', '']);"> {{$d->p_name}}</a>

                                </p>
                            </td>
                            <td class="col col-price">
                                <p class="price">{{$d->p_price}}元 × {{$d->buy_num}}</p>
                            </td>
                            <td class="col col-actions">
                            </td>
                        </tr>
@endforeach

                        </tbody>
                    </table>
                </div>


                <div id="editAddr" class="order-detail-info">

                    <h3>收货信息</h3>
                    <table class="info-table">
                        <tbody>
                        <tr>
                            <th>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</th>
                            <td>{{$orderid[0]->buy_user}}</td>
                        </tr>
                        <tr>
                            <th>联系电话：</th>
                            <td>{{substr($orderid[0]->buy_phone,0,3).'*****'.substr($orderid[0]->buy_phone,8,3)}}</td>
                        </tr>
                        <tr>
                            <th>收货地址：</th>
                            <td>{{$orderid[0]->address}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="actions">
                            <a class="btn btn-small btn-line-gray J_editAddr" href="#editAddr">修改</a>

                    </div>

                </div>

                <div id="editTime" class="order-detail-info">
                    <h3>支付方式及送货时间</h3>
                    <table class="info-table">
                        <tbody>
                        <tr>
                            <th>支付方式：</th>
                            <td>在线支付</td>
                        </tr>
                        <tr>
                            <th>送货时间：</th>
                            <td>不限送货时间</td>
                        </tr>

                        </tbody>
                    </table>
                    <div class="actions">
                        <a class="btn btn-small btn-line-gray J_editAddr" href="#editAddr">修改</a>
                    </div>
                </div>
                <div class="order-detail-info">
                    <h3>发票信息</h3>
                    <table class="info-table">
                        <tbody>
                        <tr>
                            <th>发票类型：</th>
                            <td>纸质发票</td>
                        </tr>
                        <tr>
                            <th>发票内容：</th>
                            <td>购买商品明细</td>
                        </tr>
                        <tr>
                            <th>发票抬头：</th>
                            <td>个人</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="actions">

                    </div>
                </div>
                <div class="order-detail-total">
                    <table class="total-table">
                        <tbody>
                        <tr>
                            <th>商品总价：</th>
                            <td><span class="num">{{$orderid[0]->total}}</span>元</td>
                        </tr>
                        <tr>
                            <th>运费：</th>
                            <td><span class="num">0</span>元</td>
                        </tr>
                        <tr>
                            <th class="total">实付金额：</th>
                            <td class="total"><span class="num">{{$orderid[0]->total}}</span>元</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    @parent
<script>
    layui.use(['jquery', 'layer'], function () {
        var $ = layui.jquery,
            layer = layui.layer;
        var index;

        var sid = $('#statusid').text();

        var li1 = $('.li1');
        var li2 = $('.li2');
        var li3 = $('.li3');
        var li4 = $('.li4');
        var li5 = $('.li5');

//li1.addClass('step-done');
        switch (parseInt(sid)) {
            case 0:
                li1.addClass('step-done');
                break;
            case 1:
                li1.addClass('step-done');
                li2.addClass('step-done');
                break;
            case 2:
                li1.addClass('step-done');
                li2.addClass('step-done');
                li3.addClass('step-done');
                break;
            case 3:
                li1.addClass('step-done');
                li2.addClass('step-done');
                li3.addClass('step-done');
                li4.addClass('step-done');
                break;
//            case 4:
//                li5.addClass('step-done');
//                break;
            case 6:
                li1.addClass('step-first step-done');
                li2.addClass('step-done');
                li3.addClass('step-done');
                li4.addClass('step-done');
                li5.addClass('step-done step-active step-last');
                break;

        }

//        step-first step-active step-last

    });


</script>
    @endsection