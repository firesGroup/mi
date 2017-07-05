<?php
/**
 * File Name: index.blade.php
 * Description: 购物车页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/29
 * Time: 15:44
 */
?>

@extends('layouts.home')

@section('title', '我的购物车-小米商城')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/cart.css') }}">
@endsection
@section('content')
    {{--{{dd(session('user_detail'))}}--}}
    <div class="site-header site-mini-header">
        <div class="container">
            <div class="header-logo">
                <a class="logo ir" href="//www.wim.cn" title="小米官网">小米官网</a>
            </div>
            <div class="header-title" id="J_miniHeaderTitle">
                <h2>我的购物车</h2>
                <p style="position:relative;left:200px;top:-30px">温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</p>
            </div>

            <div class="topbar-info" id="J_userInfo">
                @if (!session('user_detail'))
                    <a class="link" href="{{url('login')}}" data-needlogin="true">登录</a><span class="sep">|</span><a
                            class="link" href="{{url('reg')}}">注册</a>
                @else
                    <span class="user">
                        <a rel="nofollow" class="user-name" href="javascript:;" target="_blank">
                            <span class="name">{{session('user_detail')}}</span>
                            <i class="iconfont"></i>
                        </a>
                        <ul class="user-menu" style="display: none;">
                            <li>
                                <a rel="nofollow" href="//my.mi.com/portal" target="_blank">个人中心</a>
                            </li>
                            <li>
                                <a rel="nofollow" href="//order.mi.com/user/comment" target="_blank">评价晒单</a>
                            </li>
                            <li>
                                <a rel="nofollow" href="//order.mi.com/user/favorite" target="_blank">我的喜欢</a>
                            </li>
                            <li>
                                <a rel="nofollow" href="//account.xiaomi.com/" target="_blank">小米账户</a>
                            </li>
                            <li>
                                <a rel="nofollow" href="//order.mi.com/site/logout">退出登录</a>
                            </li>
                        </ul>
                    </span>
                    <span class="sep">|</span>
                    <a rel="nofollow" class="link link-order" href="//static.mi.com/order/" target="_blank">我的订单</a>
                @endif
            </div>

        </div>
    </div>
    <div class="page-main">

        <div class="container">
            <div class="cart-empty cart-empty-nologin" id="J_cartEmpty">
                <h2>您的购物车还是空的！</h2>
                @if (!session('user_detail'))
                    <p class="login-desc">登录后将显示您之前加入的商品</p>
                    <a href="{{url('login')}}" class="btn btn-primary btn-login">立即登录</a>
                @endif
                <a href="//list.mi.com/0" class="btn btn-primary btn-shoping J_goShoping">马上去购物</a>
            </div>


            <div class="cart-goods-list">
                <div class="list-head clearfix">
                    <div class="col col-check"><i class="iconfont icon-checkbox" id="J_selectAll">√</i>全选</div>
                    <div class="col col-img">&nbsp;</div>
                    <div class="col col-name">商品名称</div>
                    <div class="col col-price">单价</div>
                    <div class="col col-num">数量</div>
                    <div class="col col-total">小计</div>
                    <div class="col col-action">操作</div>
                </div>
                <div class="list-body" id="J_cartListBody">
                    <div class="item-box">
                        <div class="item-table J_cartGoods"
                             data-info="{ commodity_id:'1161200011', gettype:'buy', itemid:'2161200011_0_buy', num:'1'} ">
                            <div class="item-row clearfix">
                                <div class="col col-check">
                                    <i class="iconfont icon-checkbox icon-checkbox J_itemCheckbox"
                                       data-itemid="2161200011_0_buy" data-status="0">√</i>
                                </div>
                                <div class="col col-img">
                                    <a href="//item.mi.com/1161200011.html" target="_blank">
                                        <img alt="" src="//i1.mifile.cn/a1/pms_1467184989.74561304!80x80.jpg" width="80"
                                             height="80">
                                    </a>
                                </div>
                                <div class="col col-name">
                                    <div class="tags"></div>
                                    <h3 class="name">
                                        <a href="//item.mi.com/1161200011.html" target="_blank"> 小米圈铁耳机银色
                                        </a>
                                    </h3>
                                </div>
                                <div class="col col-price"> 99元</div>
                                <div class="col col-num">
                                    <div class="change-goods-num clearfix J_changeGoodsNum">
                                        <a href="javascript:;" class="J_minus">
                                            <i class="iconfont"></i>
                                        </a>
                                        <input tyep="text" name="2161200011_0_buy" value="1" data-num="1" data-buylimit="50" autocomplete="off" class="goods-num J_goodsNum">
                                        <a href="javascript:;" class="J_plus">
                                            <i class="iconfont"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-total"> 99元 <p class="pre-info"></p></div>
                                <div class="col col-action">
                                    <a id="2161200011_0_buy" data-msg="确定删除吗？" href="javascript:;" title="删除"
                                       class="del J_delGoods"><i class="iconfont"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 加价购 -->
            <div class="raise-buy-box" id="J_raiseBuyBox"></div>

            <div class="cart-bar clearfix" id="J_cartBar">
                <div class="section-left">
                    <a href="//list.mi.com/0" class="back-shopping J_goShoping">继续购物</a>
                    <span class="cart-total">共
                        <i id="J_cartTotalNum">1</i>
                        件商品，已选择
                        <i id="J_selTotalNum">0</i>
                        件
                    </span>
                    <span class="cart-coudan hide" id="J_coudanTip">
                        ，还需 <i id="J_postFreeBalance">150</i> 元即可免邮费  <a href="javascript:;" id="J_showCoudan">立即凑单</a>
                    </span>
                </div>
                <span class="activity-money hide">
                    活动优惠：减 <i id="J_cartActivityMoney">0</i> 元
                </span>
                <span class="total-price">
                    合计（不含运费）：<em id="J_cartTotalPrice">0.00</em>元
                </span>
                <a href="javascript:;" class="btn btn-a btn btn-disabled" id="J_goCheckout">去结算</a>

                <div class="no-select-tip" id="J_noSelectTip">
                    请勾选需要结算的商品
                    <i class="arrow arrow-a"></i>
                    <i class="arrow arrow-b"></i>
                </div>
            </div>


        </div>

    </div>



    @include('home/public/footer')
@endsection
@section('js')
    @parent
    <script>

        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            var index;

            $('a.user-name').on('mouseenter', function () {
//                alert($(this));
                $(this).parent().addClass('user-active').children('ul').css({'display': 'block'});

            });

            $('span.user').on('mouseleave', function () {
//                alert($(this));
                $(this).removeClass('user-active').children('ul').css({'display': 'none'});

            });

            $('#J_selectAll').on('click', function () {
                if ($(this).hasClass('icon-checkbox-selected')) {
                    $(this).removeClass('icon-checkbox-selected');
                    $('i.J_itemCheckbox').removeClass('icon-checkbox-selected').attr('data-status', 0);
                    $('#J_goCheckout').removeClass('btn-primary').addClass('btn-disabled');
                    $('#J_noSelectTip').removeClass('hide');
                } else {
                    $(this).addClass('icon-checkbox-selected');
                    $('i.J_itemCheckbox').addClass('icon-checkbox-selected').attr('data-status', 1);
                    $('#J_goCheckout').removeClass('btn-disabled').addClass('btn-primary');
                    $('#J_noSelectTip').addClass('hide');
                }
            });

            $('a.J_minus').on('click', function () {
//                console.log($(this).next().val());
                var num = $(this).next().val();
                if (num > 1) {
                    num = num - 1;
//                    console.log($('input.J_goodsNum'));
                    $('input.J_goodsNum').attr('value', num);
                } else {
                    num = 1;
                }
            });

            $('a.J_plus').on('click', function () {

                var num = $(this).prev().val();
//                console.log(num);
                var maxNum = parseInt($(this).prev().attr('data-buylimit'));
//                console.log(maxNum);
                if (num < maxNum) {
                    num = parseInt(num) + 1;
//                    console.log(sum);
//                    console.log($('input.J_goodsNum'));
                    $('input.J_goodsNum').attr('value', num);
                } else {
                    num = 50;
                }
            });

            $('i.J_itemCheckbox').on('click', function () {
                if($(this).hasClass('icon-checkbox-selected')){
                    $(this).removeClass('icon-checkbox-selected');
                    $('#J_goCheckout').removeClass('btn-primary').addClass('btn-disabled');
                    $('#J_noSelectTip').removeClass('hide');
                } else {
                    $(this).addClass('icon-checkbox-selected');
                    $('#J_goCheckout').removeClass('btn-disabled').addClass('btn-primary');
                    $('#J_noSelectTip').addClass('hide');
                }
            })

        });
    </script>
@endsection