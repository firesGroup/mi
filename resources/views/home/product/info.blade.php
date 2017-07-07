<?php
/**
 * File Name: info.blade.php
 * Description: 商品详情页模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 22:26
 */
?>
@extends('layouts.home')

@section('title'){{ $info->p_name }} - {{ $detail->summary }}@endsection
@section('keywords'){{ $info->p_name }},{{ $info->tags }}@endsection
@section('description'){{ $info->p_name }} - {{ $detail->summary }}@endsection

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/product_info.css') }}">
@endsection
@section('content')
    @include('home.public.header_top')
    @include('home.public.header_nav')
    <!-- 主要内容 start -->
    <!-- 商品导航条 start -->
    @include('home.product.product_nav')
    <!-- 商品导航条 end -->
    <!-- 商品详情 start -->
    {{ $desc }}
    <!-- 商品详情 end-->
    <!-- 主要内容 end -->
    @include('home.public.footer')
@endsection
@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/js/home/product_info.js') }}?ver=<?php echo time();  ?>"></script>
    <script>
    </script>

@endsection
