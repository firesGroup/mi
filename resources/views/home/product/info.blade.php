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
                        <div class="ui-wrapper" style="max-width: 100%;">
                            <div class="ui-viewport" style="width: 100%; overflow: hidden; position: relative; height: 560px;">
                                <div id="J_sliderView" class="sliderWrap" style="width: auto; position: relative;">
                                    <img data-url="//i8.mifile.cn/a1/pms_1495692033.10494295!560x560.jpg" class="slider done" src="/images/public/default.gif" style="float: none; list-style: none; position: absolute; width: 560px; z-index: 0; display: none;">
                                    <img data-url="//i8.mifile.cn/a1/pms_1495692036.1252953!560x560.jpg" class="slider done" src="/images/public/default.gif" style="float: none; list-style: none; position: absolute; width: 560px; z-index: 50; display: block;">
                                </div>
                            </div>
                            <div class="ui-controls ui-has-pager ui-has-controls-direction">
                                <div class="ui-pager ui-default-pager">
                                    <div class="ui-pager-item">
                                        <a href="" data-slide-index="0" class="ui-pager-link">1</a>
                                    </div>
                                    <div class="ui-pager-item">
                                        <a href="" data-slide-index="1" class="ui-pager-link active">2</a>
                                    </div>
                                </div>
                                <div class="ui-controls-direction">
                                    <a class="ui-prev" href="">上一张</a>
                                    <a class="ui-next" href="">下一张</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pro-info span10">
                    <h1 class="pro-title J_proName">{{ $info->p_name }}</h1>
                    <!-- 提示 -->
                    <p class="sale-desc" id="J_desc"><font color="#ff4a00">【{{ $info->detail->remind_title }}】</font>{{$info->detail->summary}}</p>
                    <!-- 选择第一级别 -->
                    <span class="pro-price J_proPrice">{{ $info->price }}元 <br><br>市场价:<del>{{ $info->market_price }}</del>元</span>
                    {{--<div class="loading J_load">--}}
                        {{--<div class="loader"></div>--}}
                    {{--</div>--}}
                    {{--@forelse()--}}
                        {{--@empty--}}
                        {{--<no></no>--}}
                    {{--@endforelse--}}
                    <div class="J_main">
                        <div class="list-wrap" id="J_list">
                            <div class="pro-choose pro-choose-col2 J_step" data-index="0">
                                <div class="step-title">  选择版本   </div>
                                <ul class="step-list step-one clearfix">
                                    <li class="btn btn-biglarge" data-name="全网通版 4GB+128GB" data-price="1999元  " data-index="0" data-value="全网通版 4GB+128GB"> <a href="javascript:void(0);">
                                            <span class="name">全网通版 4GB+128GB </span>
                                            <span class="price"> 1999元 </span>
                                        </a>
                                    </li>
                                    <li class="btn btn-biglarge active" data-name="全网通版 4GB+64GB" data-price="1699元  " data-index="1" data-value="全网通版 4GB+64GB"> <a href="javascript:void(0);">
                                            <span class="name">全网通版 4GB+64GB </span>
                                            <span class="price"> 1699元 </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-choose pro-choose-col2 J_step" data-index="1">
                                <div class="step-title">  选择颜色   </div>
                                <ul class="step-list clearfix">
                                    <li class="btn btn-biglarge active" data-id="2171800014" data-cid="1171800018" data-name="小米Max 2 4GB+64GB 金色" data-price="1699元" data-value="金色" data-index="0"> <a href="javascript:void(0);">
                                            <img src="https://i8.mifile.cn/b2c-mimall-media/1c84f395fb5da4bfbb1c01f860440a77.png" data-src="//i8.mifile.cn/b2c-mimall-media/1c84f395fb5da4bfbb1c01f860440a77.png" alt="金色" class="done">   金色 </a>
                                    </li>
                                </ul>
                            </div>
                        <!-- 已选择的产品 -->
                        <div class="pro-list" id="J_proList">
                            <ul>
                                <li>小米Max 2 4GB+64GB 金色   <span>1699元</span>  </li>
                                <li class="totlePrice">  总计  ：1699元</li>
                            </ul>
                        </div>
                        <ul class="btn-wrap clearfix" id="J_buyBtnBox">
                            <li>
                                <a href="javascript:void(0);" class="btn btn-primary btn-biglarge J_proBuyBtn" data-type="common">加入购物车</a>
                            </li>
                        </ul>
                        <div class="pro-policy" id="J_policy">
                            <i class="iconfont support"></i>
                            <i class="iconfont nosupport hide"></i>
                            <span class="J_tips ">支持7天无理由退货</span>
                        </div>
                    </div>
                    <div class="error hide J_error">
                        <h3>有点小问题，请点击按钮刷新重试</h3>
                        <a href="javascript:void(0)" class="btn btn-primary J_reload" data-stat-id="4cd574c9694dd9c9" onclick="_msq.push(['trackEvent', '87eadeffe976b568-4cd574c9694dd9c9', 'javascript:void(0)', 'pcpid', '']);">刷新</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- 商品信息 end -->
    <!-- 主要内容 end -->
    @include('home.public.footer')
@endsection
@section('js')
    @parent
    <script>
        $(function() {
            $(".cacheload").scrollLoading();
            //自执行滚动 到 商品信息导航条
            $("html,body").animate({scrollTop:$("#J_proHeader").offset().top},1000);

            //自执行请求数据
            $.ajax({
                url:'/product/ajaxGetSpec/{{ $p_id }}',
                type: 'post',
                data:{_token:'{{ csrf_token()  }}'},
                success:function(data){
                }
            });
        });
        //商品信息导航条 跟随
        $(window).scroll(function(){
            var srollTop = $(document).scrollTop();
            if( srollTop >= 200 ){
                $('div#J_fixNarBar').addClass('nav_fix');
            }else{
                $('div#J_fixNarBar').removeClass('nav_fix');
            }
        })


    </script>
@endsection
