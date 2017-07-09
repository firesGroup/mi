<?php
/**
 * File Name: addCart.blade.php
 * Description: 加入购物车界面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/7/6
 * Time: 14:00
 */
?>

@extends('layouts.home')

@section('title', '加入购物车-小米商城')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/product_info.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/buy-success.css') }}">
@endsection
@section('content')

    @include('home.public.header_top')
    @include('home.public.header_nav')
    <!-- 主要内容 start -->

{{--{{dd($pName)}}--}}
    <div class="container">

        <div class="buy-succ-box clearfix">
            <div class="goods-content" id="J_goodsBox">
                <div class="goods-img"><img src="//c1.mifile.cn/f/i/17/static/success.png" width="64" height="64"></div>
                <div class="goods-info"><h3>已成功加入购物车！</h3> <span class="name">{{$pName}}  </span></div>
            </div>

            <div class="actions J_actBox">
                <p class="hide J_notic">有商品未成功加入购物车，可以在购物车中查看</p>
                <a href="javascript:void(0);" class="btn btn-line-gray J_goBack">返回上一级</a>
                <a href="{{url('cart')}}" class="btn btn-primary">去购物车结算</a>
            </div>
        </div>

    </div>


    @include('home/public/footer')
@endsection
@section('js')
    @parent

@endsection
