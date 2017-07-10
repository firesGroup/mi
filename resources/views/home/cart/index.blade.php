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
                @if (!session('user_deta'))
                    <a class="link" href="{{url('login')}}" data-needlogin="true">登录</a><span class="sep">|</span><a
                            class="link" href="{{url('reg')}}">注册</a>
                @else
                    <span class="user">
                        <a rel="nofollow" class="user-name" href="javascript:;" target="_blank">
                            <span class="name">{{session('user_deta')['nick_name']}}</span>
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
        @if (empty(session('goods')))
            <div class="cart-empty cart-empty-nologin" id="J_cartEmpty">
                <h2>您的购物车还是空的！</h2>
                @if (!session('user_deta'))
                    <p class="login-desc">登录后将显示您之前加入的商品</p>
                    <a href="{{url('login')}}" class="btn btn-primary btn-login">立即登录</a>
                @endif
                <a href="{{url('/')}}" class="btn btn-primary btn-shoping J_goShoping">马上去购物</a>
            </div>
        @elseif(session('goods'))
            <div class="cart-goods-list">
                <div class="list-head clearfix">
                    <div class="col col-img">&nbsp;</div>
                    <div class="col col-name">商品名称</div>
                    <div class="col col-price">单价</div>
                    <div class="col col-num">数量</div>
                    <div class="col col-total" id="xiaoji">小计</div>
                    <div class="col col-action">操作</div>
                </div>
                <div class="list-body" id="J_cartListBody">

                    @foreach(session('goods') as $k=>$v)
                        {{--{{dd(intval($v['price']))}}--}}
                    <div class="item-box" id="{{$k.'item-box'}}">
                        <div class="item-table J_cartGoods"
                             data-info="{ commodity_id:'1161200011', gettype:'buy', itemid:'2161200011_0_buy', num:'1'} ">
                            <div class="item-row clearfix">
                                <div class="col col-check">
                                    <i class="iconfont icon-checkbox icon-checkbox J_itemCheckbox"
                                       data-itemid="2161200011_0_buy" data-status="0">√</i>
                                </div>
                                <div class="col col-img">
                                    <a href="javascript:;" target="_blank">
                                        <img alt="" src="{{$v['img']}}!80_80" width="80" height="80">
                                    </a>
                                </div>
                                <div class="col col-name">
                                    <div class="tags"></div>
                                    <h3 class="name">
                                        <a href="//item.mi.com/1161200011.html" target="_blank"> {{$v['pName']}}
                                        </a>
                                    </h3>
                                </div>
                                <div class="col col-price"> {{$v['price']}}</div>
                                <div class="col col-num">
                                    <div class="change-goods-num clearfix J_changeGoodsNum">
                                        <a href="javascript:;" class="J_minus">
                                            <i class="iconfont"></i>
                                        </a>
                                        <input tyep="text" name="2161200011_0_buy" value="{{$v['num']}}" data-num="1"
                                               data-buylimit="50" autocomplete="off" class="goods-num J_goodsNum">
                                        <a href="javascript:;" class="J_plus">
                                            <i class="iconfont"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-total">  {{intval($v['price'])*$v['num']}} 元 <p class="pre-info"></p></div>
                                <div class="col col-action">
                                    <a id="2161200011_0_buy" data-msg="确定删除吗？" href="javascript:;" title="删除"
                                       class="del J_delGoods"><i class="iconfont"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>

            <div class="cart-bar clearfix" id="J_cartBar">
                <div class="section-left">
                    <a href="//list.mi.com/0" class="back-shopping J_goShoping">继续购物</a>
                </div>
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
        @endif

    </div>

    <div class="modal fade modal-hide  modal-alert" id="J_modalAlert" style="display: none;" aria-hidden="true">
        <div class="modal-bd">
            <div class="text">
                <h3 id="J_alertMsg">确定删除吗？</h3>
            </div>
            <div class="actions">
                <button class="btn btn-gray" data-dismiss="modal" id="J_alertCancel">取消</button>
                <button class="btn btn-primary" data-dismiss="modal" id="J_alertOk">确定</button>
            </div>
            <a class="close" data-dismiss="modal" href="javascript: void(0);">
                <i class="iconfont"></i>
            </a>
        </div>
    </div>

    @include('home/public/footer')
@endsection
@section('js')
    @parent
    <script type="text/javascript" src="{{asset('js/home/cart/cart.js')}}"></script>
    <script>

        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            var index;

//            $('#J_alertOk').on('click', function () {
//                alert(1);
//                $.ajax({
//
//                });
//
//            });


        });
    </script>
@endsection