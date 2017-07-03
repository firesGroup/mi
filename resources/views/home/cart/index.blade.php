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
            {{--<p style="position:relative;left:200px;top:-30px">温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</p>--}}
        </div>
        <div class="topbar-info" id="J_userInfo">
            <a class="link" href="" data-needlogin="true">登录</a><span class="sep">|</span><a
                    class="link" href="">注册</a></div>
    </div>
</div>
<div class="page-main">

    <div class="container">
        <div class="cart-empty cart-empty-nologin" id="J_cartEmpty">
            <h2>您的购物车还是空的！</h2>
            <p class="login-desc">登录后将显示您之前加入的商品</p>
            <a href="//order.mi.com/site/login?redirectUrl=https://static.mi.com/cart/" class="btn btn-primary btn-login">立即登录</a>
            <a href="//list.mi.com/0" class="btn btn-primary btn-shoping J_goShoping">马上去购物</a>
        </div>

    </div>

</div>



@include('home/public/footer')
@endsection

