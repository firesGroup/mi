<?php
/**
 * File Name: index.blade.php
 * Description: 收货地址页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/29
 * Time: 20:43
 */
?>

@extends('layouts.home')

@section('title', '我的收货地址-小米商城')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/address.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/cart.css') }}">
@endsection
@section('content')

<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
            <a class="logo " href="{{url('/')}}" title="小米官网"></a>
        </div>
        <div class="header-title" id="J_miniHeaderTitle"><h2>确认订单</h2></div>
        <div class="topbar-info" id="J_userInfo">
            <span class="user">
                <a rel="nofollow" class="user-name" href="" target="_blank">
                    <span class="name">1178705369</span>
                    <i class="iconfont"></i>
                </a>
                <ul class="user-menu" style="display: none;">
                    <li><a rel="nofollow" href="" target="_blank">个人中心</a></li>
                    <li><a rel="nofollow" href="" target="_blank">评价晒单</a></li>
                    <li><a rel="nofollow" href="" target="_blank">我的喜欢</a></li>
                    <li><a rel="nofollow" href="" target="_blank">小米账户</a></li>
                    <li><a rel="nofollow" href="">退出登录</a></li>
                </ul>
            </span>
            <span class="sep">|</span>
            <a rel="nofollow" class="link link-order" href="" target="_blank">我的订单</a>
        </div>
    </div>
</div>

<div class="page-main">
    <div class="container">
        <div class="checkout-box">
            <div class="section section-address">
                <div class="section-header">
                    <h3 class="title">收货地址</h3>
                    <div class="more"></div>
                </div>
                <div class="section-body">
                    <div class="address-item selected">
                        1111
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('home/public/footer')
@endsection

