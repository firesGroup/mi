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

@section('title', '首页')
@section('keywords','')
@section('description','')

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/product_info.css') }}">
@endsection
@section('content')
    @include('home.public.header_top')
    @include('home.public.header_nav')
    <!-- 主要内容 start -->
    <!-- 商品导航条 start -->
    <div id="J_proHeader">
        <div class="xm-product-box">
            <div class="nav-bar" id="J_headNav">
                <div class="container J_navSwitch">
                    <h2 class="J_proName">{{ $info->p_name }}</h2>
                        <div class="con">
                            <div class="right">
                                <a href="">概述</a>
                                <span class="separator">|</span>
                                <a href="">图集</a>
                                <span class="separator">|</span>
                                <a href="">参数</a>
                                <span class="separator">|</span>
                                <a href="" target="_blank">F码通道</a>
                                <span class="separator">|</span>
                                <a href="">用户评价</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="xm-product-box nav-bar-hidden" id="J_fixNarBar">
            <div class="nav-bar"> <div class="container J_navSwitch">
                    <h2 class="J_proName">{{ $info->p_name }}</h2>
                    <div class="con">
                        <div class="right">
                            <a href="">概述</a>
                            <span class="separator">|</span>
                            <a href="">图集</a>
                            <span class="separator">|</span>
                            <a href="">参数</a>
                            <span class="separator">|</span>
                            <a href="" target="_blank">F码通道</a>
                            <span class="separator">|</span>
                            <a href="">用户评价</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 商品导航条 end -->
    <!-- 商品信息 start -->
    <div class="xm-buyBox" id="J_buyBox">
        <div class="box clearfix">
            <div class="login-notic J_notic">
                <div class="container">
                    为方便您购买，请提前登录
                    <a href="" class="J_proLogin">立即登录</a>
                    <a href="javascript:void(0);" class="iconfont J_proLoginClose" data-stat-id="7a48aee2e5b885b0" ></a>
                </div>
            </div>
            <div class="pro-choose-main container clearfix">
                <div class="pro-view span10">
                    <div class="J_imgload imgload hide">
                    </div>
                    <div id="J_img" class="img-con" style="left: 19.5px; margin-top: 0px;">
                        <div id="J_sliderView" class="sliderWrap" style="width: auto; position: relative;">
                            @foreach( $imgArr as $k=>$img )
                                @if($k == 0)
                                    <img data-url="{{ $img }}" class="loaded slider done" src="/images/public/placeholder-220.png">
                                @else
                                    <img data-url="{{ $img }}" class="slider done" src="/images/public/placeholder-220.png">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="pro-info span10">
                    <h1 class="pro-title J_proName">{{ $info->p_name }}</h1>
                    <!-- 提示 -->
                    <p class="sale-desc" id="J_desc"><font color="#ff4a00">【{{ $info->detail->remind_title }}】</font>{{$info->detail->summary}}</p>
                    <!-- 选择第一级别 -->
                    <span class="pro-price J_proPrice">{{ $info->price }}元</span>
                    {{--<div class="loading J_load">--}}
                        {{--<div class="loader"></div>--}}
                    {{--</div>--}}
                    {{--@forelse()--}}
                        {{--@empty--}}
                        {{--<no></no>--}}
                    {{--@endforelse--}}
                    <div class="J_main">
                        <div class="list-wrap" id="J_list">
                            <div class="pro-choose pro-choose-col2 J_step" data-index="0" id="version">
                                <div class="step-title">
                                    选择版本
                                    <span>{{ $info->versions[0]['ver_desc'] }}</span>
                                </div>
                                <ul class="step-list step-one clearfix">
                                    @foreach( $versions as $k=>$ver )
                                        @if( $k == 0 )
                                            <li class="btn btn-biglarge active" data-name="{{ $ver['ver_name'] }} {{$ver['ver_spec']}}" data-price="{{ $ver['price'] }}" data-index="{{ $k }}" data-ver_id="{{ $ver['id'] }}" data-desc="{{ $ver['ver_desc'] }}"> <a href="javascript:void(0);">
                                                    <span class="name">{{ $ver['ver_name'] }} {{$ver['ver_spec']}} </span>
                                                    <span class="price"> {{ $ver['price'] }}元 </span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="btn btn-biglarge" data-name="{{ $ver['ver_name'] }} {{$ver['ver_spec']}}" data-price="{{ $ver['price'] }}" data-index="{{ $k }}" data-ver_id="{{ $ver['id'] }}" data-desc="{{ $ver['ver_desc'] }}"> <a href="javascript:void(0);">
                                                    <span class="name">{{ $ver['ver_name'] }} {{$ver['ver_spec']}} </span>
                                                    <span class="price"> {{ $ver['price'] }}元 </span>
                                                </a>
                                            </li>
                                        @endif
                                        @endforeach
                                </ul>
                            </div>
                            @if( isset($colorArr) )
                            <div class="pro-choose pro-choose-col2 J_step" data-index="1" id="color">
                                <div class="step-title">  选择颜色   </div>
                                <ul class="step-list clearfix">
                                    @foreach( $colorArr as $k=>$color )
                                        @if( $k == 0 )
                                            <li class="btn btn-biglarge active" data-ver_id="{{ $color['ver_id'] }}" data-color_id="{{$color['color_id']}}" data-value="{{ $color['color_name'] }}" data-index="{{ $k }}"><a href="javascript:void(0);"><img class="cacheload" src="{{ $color['color_img'] }}" data-src="{{ $color['color_img'] }}" alt="{{ $color['color_name'] }}">{{ $color['color_name'] }}</a>
                                            </li>
                                        @else
                                            <li class="btn btn-biglarge" data-ver_id="{{ $color['ver_id'] }}" data-color_id="{{$color['color_id']}}" data-value="{{ $color['color_name'] }}" data-index="{{ $k }}"><a href="javascript:void(0);"><img class="cacheload" src="{{ $color['color_img'] }}" data-src="{{ $color['color_img'] }}" alt="{{ $color['color_name'] }}">{{ $color['color_name'] }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        <!-- 已选择的产品 -->
                        <div class="pro-list" id="J_proList">
                            <ul>
                                <li class="totleName">{{ $info->p_name }} {{ $versions[0]['ver_name'] }} {{ $versions[0]['ver_spec'] }} {{ $colorArr[0]['color_name'] }}   <span>{{ $versions[0]['price'] }}元</span>  </li>
                                <li class="totlePrice">  总计  ：{{ $versions[0]['price'] }}元</li>
                            </ul>
                        </div>
                        <ul class="btn-wrap clearfix" id="J_buyBtnBox">
                            <li>
                                @if( $versions[0]['status'] == 0  )
                                    <a href="javascript:void(0);" class="btn btn-primary btn-biglarge J_proBuyBtn" data-type="0">加入购物车</a>
                                @elseif( $versions[0]['status'] == 1  )
                                    <a class="btn btn-gray  btn-biglarge btn-line-gray J_setRemind" href="javascript:void(0);" data-type="1" disabled>已下架</a>
                                @elseif( $versions[0]['status'] == 2  )
                                    <a class="btn btn-line-primary btn-biglarge btn- J_setRemind" href="javascript:void(0);" data-type="2">新品预售</a>
                                @elseif( $versions[0]['status'] == 3  )
                                    <a class="btn btn-red btn-biglarge btn-line-red J_setRemind" href="javascript:void(0);" data-type="3" disabled>缺货中</a>
                                @elseif( $versions[0]['status'] == 4  )
                                    <a class="btn btn-line-primary btn-biglarge btn- J_setRemind" href="javascript:void(0);" data-type="4">新品上市</a>
                                @endif
                            </li>
                        </ul>
                        <div class="pro-policy" id="J_policy">
                            <i class="iconfont support"></i>
                            <i class="iconfont nosupport hide"></i>
                            <span class="J_tips " style="margin-right:15px">支持7天无理由退货</span>
                            @if( $info->detail->is_free_shipping == 0 )
                                <i class="iconfont support"></i>
                            @else
                                <i class="iconfont nosupport hide"></i>
                            @endif
                            <span class="J_tips ">包邮</span>
                        </div>
                    </div>
                    <div class="error hide J_error">
                        <h3>有点小问题，请点击按钮刷新重试</h3>
                        <a href="javascript:void(0)" class="btn btn-primary J_reload" data-stat-id="4cd574c9694dd9c9" >刷新</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- 商品信息 end -->
    <!-- 商品详情 start -->
    <div class="pro-infomation" id="J_proInfo">
        <div class="section  is-visible preload">
            <img data-url="//cdn.cnbj0.fds.api.mi-img.com/b2c-mimall-media/beb93b2f8a369c4acc1f084e3a347108.jpg" class="slider done" src="/images/public/default.gif">
        </div>
        <div class="section  is-visible preload">
            <img data-url="//cdn.cnbj0.fds.api.mi-img.com/b2c-mimall-media/dc1b76ea7388c7cb4dc47840125f7ec1.jpg" class="slider done" src="/images/public/default.gif">
        </div>
    </div>
    <!--商品详情 end-->
    <!-- 主要内容 end -->
    @include('home.public.footer')
@endsection
@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/js/home/product_info.js') }}?ver=<?php echo time();  ?>"></script>

@endsection
