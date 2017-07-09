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
                        <a href="" target="_blank" >了解更多&gt;</a>
                    </small>
                </h1>
                <div class="more clearfix">
                    <ul class="filter-list J_orderType">
                        <li class="first active li" >
                            <a id="J_validTab" href="#type1">全部有效订单</a>
                        </li>
                        <li class="li">
                            <a href="#type=2" id="J_unpaidTab">待支付 ({{$num}})</a>
                        </li>

                        <li class="li">
                            <a  href="#type=3" id="J_sendTab">待收货</a>
                        </li>
                        <li class="li">
                            <a href="#type=4" id="J_offTab" >已关闭</a>
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

                    {{--全部订单--}}
                    <ul class="order-list all" style="display: block;">

                        @foreach($data as $v)
                            @if($v->order_status == 7)
                                <p class="empty">当前没有有效订单。</p>
                                @break
                            @else

                            @if($v->order_status !=  5 )
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
                                    订单号： <a href="{{url('orderdetail/'.$v->id)}}" >{{$v->order_sn}}</a>
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
                                            @if($v->order_status == 3)
                                                <a class="btn btn-small btn-primary Receiving"
                                                   href="javascript: void(0);" target="_blank">确认收货</a>
                                                <span style="display: none;" id="ordersn">{{$v->order_sn}}</span>
                                            @endif

                                            @if($v->order_status == 0)
                                                <a class="btn btn-small btn-primary" href="" target="_blank">立即支付</a>
                                            @endif

                                                <a class="btn btn-small btn-line-gray" href="{{url('orderdetail').'/'
                                                .+$v->id}}">订单详情</a>

                                            @if($v->order_status == 4 || $v->order_status == 6)
                                                <a class="btn btn-small btn-line-gray" href="" target="_blank">申请售后</a>
                                            @endif

                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </li>
                                @endif
                                @endforeach

                    </ul>

                    {{--待支付订单--}}
                    <ul class="order-list pay" style="display: none;">
                        @foreach($data as $v)

                            @if($num != 0 && $v->order_status == 0)

                            @if($v->order_status !=  5 && $v->order_status !=  7)
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
                                                    @if($v->order_status == 3)
                                                        <a class="btn btn-small btn-primary Receiving"
                                                           href="javascript: void(0);" target="_blank">确认收货</a>
                                                        <span style="display: none;"id="ordersn">{{$v->order_sn}}</span>
                                                    @endif

                                                    @if($v->order_status == 0)
                                                        <a class="btn btn-small btn-primary"
                                                           href="" target="_blank">立即支付</a>
                                                    @endif

                                                    <a class="btn btn-small btn-line-gray"
                                                       href="{{url('orderdetail').'/'.+$v->id}}">订单详情</a>

                                                    @if($v->order_status == 4 || $v->order_status == 6)
                                                        <a class="btn btn-small btn-line-gray"
                                                           href="#" >申请售后</a>
                                                    @endif

                                                </td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </li>
                                    @elseif($num == 0 && $v->order_status != 0)
                                        <p class="empty">当前没有待支付订单。</p>
                                        @break

                                    @endif
                                @endforeach
                    </ul>

                    {{--待收货订单--}}
                    {{--<ul class="order-list Receiving" style="display: none;">--}}
                        {{--@foreach($data as $v)--}}
                            {{--@if($Receiving != 0 && $v->order_status == 3)--}}

                            {{--@if($v->order_status !=  5 && $v->order_status !=  7)--}}
                                {{--<li class="uc-order-item uc-order-item-pay">--}}{{-- 颜色 finish灰色--}}
                            {{--@else--}}
                                {{--<li class="uc-order-item uc-order-item-finish">--}}
                                    {{--@endif--}}
                                    {{--<div class="order-detail">--}}
                                        {{--<div class="order-summary">--}}
                                            {{--<div class="order-status">{{$status[$v->order_status]}}</div>--}}
                                            {{--@if($v->order_status == 1 || $v->order_status == 2)--}}
                                                {{--<p class="order-desc J_deliverDesc">  我们将尽快为您发货 </p>--}}
                                            {{--@endif--}}
                                        {{--</div>--}}
                                        {{--<table class="order-detail-table">--}}
                                            {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th class="col-main">--}}
                                                    {{--<p class="caption-info">{{$v->add_time}}<span class="sep">|</span>--}}
                                                        {{--{{$v->buy_user}}<span class="sep">|</span>--}}
                                                        {{--订单号： <a href="{{url('orderdetail/'.$v->id)}}">{{$v->order_sn}}</a>--}}
                                                        {{--<span class="sep">|</span>在线支付</p>--}}
                                                {{--</th>--}}

                                                {{--<th class="col-sub">--}}
                                                    {{--<p class="caption-price">订单金额：<span class="num">{{$v->total}}</span>元</p>--}}
                                                {{--</th>--}}
                                            {{--</tr>--}}
                                            {{--</thead>--}}
                                            {{--<tbody>--}}
                                            {{--<tr>--}}
                                                {{--<td class="order-items">--}}
                                                    {{--<ul class="goods-list">--}}
                                                        {{--@foreach($orderdetail as $d)--}}
                                                            {{--@if($v->id == $d->order_id)--}}
                                                                {{--<li>--}}
                                                                    {{--<div class="figure figure-thumb">--}}
                                                                        {{--<a href="//item.mi.com/1163700032.html" target="_blank">--}}
                                                                            {{--<img src="//i1.mifile.cn/a1/pms_1490088796.67026066!80x80.jpg"--}}
                                                                                 {{--width="80" height="80"--}}
                                                                                 {{--alt="小米手机5s Plus 全网通版 4GB内存 灰色 64GB">--}}
                                                                        {{--</a>--}}
                                                                    {{--</div>--}}
                                                                    {{--<p class="name">--}}
                                                                        {{--跳转链接--}}
                                                                        {{--<a target="_blank" href="//item.mi.com/1163700032--}}
                                                        {{--.html">--}}
                                                                            {{--{{$d->p_name}}--}}
                                                                        {{--</a>--}}
                                                                    {{--</p>--}}
                                                                    {{--<p class="price">{{$d->p_price}}元 × {{$d->buy_num}}</p>--}}
                                                                {{--</li>--}}
                                                            {{--@endif--}}
                                                        {{--@endforeach--}}

                                                    {{--</ul>--}}
                                                {{--</td>--}}
                                                {{--<td class="order-actions">--}}
                                                    {{--@if($v->order_status == 3)--}}
                                                        {{--<a class="btn btn-small btn-primary Receiving"--}}
                                                           {{--href="javascript: void(0);" >确认收货</a>--}}
                                                        {{--<span style="display: none;" id="ordersn">{{$v->order_sn}}</span>--}}

                                                    {{--@endif--}}

                                                    {{--<a class="btn btn-small btn-line-gray"--}}
                                                       {{--href="{{url('orderdetail').'/'.+$v->id}}">订单详情</a>--}}

                                                    {{--@if($v->order_status == 4 || $v->order_status == 6)--}}
                                                        {{--<a class="btn btn-small btn-line-gray"--}}
                                                           {{--href="javascript: void(0);">申请售后</a>--}}
                                                    {{--@endif--}}

                                                {{--</td>--}}

                                            {{--</tr>--}}
                                            {{--</tbody>--}}
                                        {{--</table>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                    {{--@elseif($v->order_status !=3 && $Receiving == 0)--}}
                                        {{--<p class="empty">当前没有待收货订单。</p>--}}
                                        {{--@break--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                    {{--</ul>--}}

                    <ul class="order-list Receiving" style="display: none;">

                        @foreach($data as $v)
                            @if($Receiving != 0 && $v->order_status == 3)

                                @if($v->order_status !=  5 )
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
                                                            订单号： <a href="{{url('orderdetail/'.$v->id)}}" >{{$v->order_sn}}</a>
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
                                                        @if($v->order_status == 3)
                                                            <a class="btn btn-small btn-primary Receiving"
                                                               href="javascript: void(0);" target="_blank">确认收货</a>
                                                            <span style="display: none;" id="ordersn">{{$v->order_sn}}</span>
                                                        @endif

                                                        @if($v->order_status == 0)
                                                            <a class="btn btn-small btn-primary" href="" target="_blank">立即支付</a>
                                                        @endif

                                                        <a class="btn btn-small btn-line-gray" href="{{url('orderdetail').'/'
                                                .+$v->id}}">订单详情</a>

                                                        @if($v->order_status == 4 || $v->order_status == 6)
                                                            <a class="btn btn-small btn-line-gray" href="" target="_blank">申请售后</a>
                                                        @endif

                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </li>

                                    @elseif($v->order_status !=3 && $Receiving == 0)
                                    <p class="empty">当前没有待收货订单。</p>
                                    @break
                                    @endif
                                @endforeach

                    </ul>

                    {{--已关闭订单--}}
                    <ul class="order-list close" style="display: none;">
                        @foreach($data as $v)
                            @if($close != 0 && $v->order_status == 7)
                            @if($v->order_status !=  5 && $v->order_status !=  7)
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
                                                        订单号： <a href="{{url('orderdetail/'.$v->id)}}">{{$v->order_sn}}</a>
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

                                                    <a class="btn btn-small btn-line-gray" href="{{url('orderdetail').'/'
                                                .+$v->id}}">订单详情</a>

                                                </td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </li>
                                    @elseif($close == 0 && $v->order_status != 7)
                                        <p class="empty">当前没有已关闭订单。</p>
                                        @break
                                    @endif
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

    <div class="modal fade modal-hide comment-modal in" id="J_commentModal" aria-hidden="true" style="display: none;">
        <a class="close" data-dismiss="modal" href="javascript: void(0);">
            <i class="iconfont"></i>
        </a>
        <div class="modal-body">
            <div class="txt"><h2 class="tit">确认收货吗?</h2></div>
            <a href="javascript: void(0);" class="btn btn-primary affirm" id="confirm">确定</a>
        </div>
    </div>

    <div class="modal-backdrop fade in" style="width: 100%; height: 5695px;display: none;"></div>
@endsection

@section('js')
    @parent
<script>
    layui.use(['jquery', 'layer'], function () {
        var $ = layui.jquery,
            layer = layui.layer;
        var index;

        $('#J_unpaidTab,#J_sendTab,#J_validTab,#J_offTab').on('click',function () {

            //当点击a标签,其他a标签移除样式
            $(this).parent().siblings('li').removeClass('active');

            //点击的a标签添加样式
            $(this).parent().addClass('active');

        });

        $('#J_unpaidTab').on('click',function () {

            $('.pay').css('display','block');
            $('.all').css('display','none');
            $('.Receiving').css('display','none');
            $('.close').css('display','none');
        });

        $('#J_validTab').on('click',function () {

            $('.pay').css('display','none');
            $('.all').css('display','block');
            $('.Receiving').css('display','none');
            $('.close').css('display','none');
        });

        $('#J_sendTab').on('click',function () {

            $('.pay').css('display','none');
            $('.all').css('display','none');
            $('.Receiving').css('display','block');
            $('.close').css('display','none');
        });

        $('#J_offTab').on('click',function () {

            $('.pay').css('display','none');
            $('.all').css('display','none');
            $('.Receiving').css('display','none');
            $('.close').css('display','block');
        });

        $('.Receiving').on('click', function () {
            $('.modal-backdrop').css('display','block');
            $('#J_commentModal').css('display','block');
//            当前获取点击的订单编号
            ordersnid = $(this).next().text();
        });

        $('.close').on('click',function () {
            $('.modal-backdrop').css('display','none');
            $('#J_commentModal').css('display','none');
        });


        $('#confirm').on('click',function () {

            var url = '{{url('Receiving')}}';
            $.ajax({
                url:url,
                type:'get',
                data:{'_token': "{{csrf_token()}}",'oid':ordersnid},
                success:function(data){

                    if(data == 1){
                       location.reload();
                        $('.modal-backdrop').css('display','none');
                        $('#J_commentModal').css('display','none');
                    } else {
                        var h2 = "收货失败,请重亲提交";

                        $('.tit').html(h2);
                    }

                }

            });

        });

    });
</script>

    @endsection