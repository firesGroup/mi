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

@section('title'){{ $info->p_name }} - {{ $C['seo']['product_title'] or $C['web']['web_title'] }}@endsection
@section('keywords'){{ $info->p_name }},{{ $info->tags }},{{ $C['seo']['product_keys'] or $C['web']['web_keys'] }}@endsection
@section('description'){{ $info->p_name }}{{ isset($detail->summary)?' - '.$detail->summary:'' }}.{{ $C['seo']['product_desc'] or $C['web']['web_desc']}}@endsection

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
    <!-- 商品信息 start -->
    {{--{{dd(session('user_deta'))}}--}}
    <div class="xm-buyBox" id="J_buyBox">
        <div class="box clearfix">
            @if(session('uesr_deta') !== null)
            <div class="login-notic J_notic">
                <div class="container">
                    为方便您购买，请提前登录
                    <a href="" class="J_proLogin">立即登录</a>
                    <a href="javascript:void(0);" class="iconfont J_proLoginClose"></a>
                </div>
            </div>
            @endif
            <div class="pro-choose-main container clearfix">
                <div class="pro-view span10">
                    <div class="J_imgload imgload hide">
                    </div>
                    <div id="J_img" class="img-con" style="left: 19.5px; margin-top: 0px;">
                        <div id="J_sliderView" class="sliderWrap" style="width: auto; position: relative;">
                            @foreach( $imgArr as $k=>$img )
                                @if($k == 0)
                                    <img data-url="{{ $img }}!560_560" class="loaded slider done"
                                         src="/images/public/placeholder-220.png">
                                @else
                                    <img data-url="{{ $img }}!560_560" class="slider done"
                                         src="/images/public/placeholder-220.png">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="pro-info span10">
                    <h1 class="pro-title J_proName">{{ $info->p_name }}</h1>
                    <!-- 提示 -->
                    <p class="sale-desc" id="J_desc"><font
                                color="#ff4a00">{{ $info->detail->remind_title or ''}}</font>{{$info->detail->summary or '' }}
                    </p>
                    <!-- 选择第一级别 -->
                    <span class="pro-price J_proPrice">{{ $info->price }}元</span>
                    <div class="J_main">
                        <div class="list-wrap" id="J_list">
                            @if( isset( $versions ) )
                                <div class="pro-choose pro-choose-col2 J_step" data-index="0" id="version">
                                    <div class="step-title">
                                        选择版本
                                        <span>{{  $versions[0]['ver_desc'] or '' }}</span>
                                    </div>
                                    <ul class="step-list step-one clearfix">
                                        @foreach( $versions as $k=>$ver )
                                            @if( $k == 0 )
                                                <li class="btn btn-biglarge active"
                                                    data-name="{{ $ver['ver_name'] }} {{$ver['ver_spec']}}"
                                                    data-price="{{ $ver['price'] }}" data-index="{{ $k }}"
                                                    data-ver_id="{{ $ver['id'] }}" data-desc="{{ $ver['ver_desc'] }}">
                                                    <a href="javascript:void(0);">
                                                        <span class="name">{{ $ver['ver_name'] }} {{$ver['ver_spec']}} </span>
                                                        <span class="price"> {{ $ver['price'] }}元 </span>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="btn btn-biglarge"
                                                    data-name="{{ $ver['ver_name'] }} {{$ver['ver_spec']}}"
                                                    data-price="{{ $ver['price'] }}" data-index="{{ $k }}"
                                                    data-ver_id="{{ $ver['id'] }}" data-desc="{{ $ver['ver_desc'] }}">
                                                    <a href="javascript:void(0);">
                                                        <span class="name">{{ $ver['ver_name'] }} {{$ver['ver_spec']}} </span>
                                                        <span class="price"> {{ $ver['price'] }}元 </span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if( isset($colorArr) )
                                <div class="pro-choose pro-choose-col2 J_step" data-index="1" id="color">
                                    <div class="step-title"> 选择颜色</div>
                                    <ul class="step-list clearfix">
                                        @foreach( $colorArr as $k=>$color )
                                            @if( $k == 0 )
                                                <li class="btn btn-biglarge active" data-ver_id="{{ $color['ver_id'] }}"
                                                    data-color_id="{{$color['color_id']}}" data-value="{{ $color['color_name'] }}" data-index="{{ $k }}">
                                                    <a href="javascript:void(0);">
                                                        <img class="cacheload" src="{{ $color['color_img'] }}" data-src="{{ $color['color_img'] }}" alt="{{ $color['color_name'] }}">{{ $color['color_name'] }}
                                                    </a>
                                                </li>
                                            @else
                                                <li class="btn btn-biglarge" data-ver_id="{{ $color['ver_id'] }}" data-color_id="{{$color['color_id']}}" data-value="{{ $color['color_name'] }}" data-index="{{ $k }}">
                                                    <a href="javascript:void(0);">
                                                        <img class="cacheload" src="{{ $color['color_img'] }}" data-src="{{ $color['color_img'] }}" alt="{{ $color['color_name'] }}">{{ $color['color_name'] }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                        <!-- 已选择的产品 -->
                            <div class="pro-list" id="J_proList">
                                <ul id="ul">
                                    <li class="totleName">{{ $info->p_name }} {{ isset($versions)? $versions[0]['ver_name']:'' }} {{  isset($versions)?$versions[0]['ver_spec']:'' }} {{  isset($colorArr)?$colorArr[0]['color_name']:'' }}    <span id="span">{{ isset($versions)? $versions[0]['price']:$info->price }}元</span></li>
                                    <li class="totlePrice"> 总计  ：{{ isset($versions)?$versions[0]['price']:$info->price }}元</li>
                                </ul>
                            </div>
                            <ul class="btn-wrap clearfix" id="J_buyBtnBox">
                                <li>
                                </li>
                            </ul>
                            <div class="pro-policy" id="J_policy">
                                <i class="iconfont support"></i>
                                <i class="iconfont nosupport hide">?</i>
                                <span class="J_tips " style="margin-right:15px">支持7天无理由退货</span>
                                @if( $info->is_free_shipping == 0 )
                                    <i class="iconfont support"></i>
                                @else
                                    <i class="iconfont nosupport hide">?</i>
                                @endif
                                <span class="J_tips ">包邮</span>
                            </div>
                        </div>
                        <div class="error hide J_error">
                            <h3>有点小问题，请点击按钮刷新重试</h3>
                            <a href="javascript:void(0)" class="btn btn-primary J_reload"
                               data-stat-id="4cd574c9694dd9c9">刷新</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 商品信息 end -->
    <div class="pro-infomation" id="J_proInfo">
        @if( $info->category_id == 1 )
            <div class="section  is-visible preload">
                <img data-url="/uploads/product/buy_info/baozhuangqingdan.jpg!1266_604" class="slider done"
                     src="/images/public/default.gif">
            </div>
    @endif
    <!-- 售后政策 start -->
        <div class="section  is-visible preload">
            <img data-url="/uploads/product/buy_info/shouhouzhengce.jpg!1266_604" class="slider done"
                 src="/images/public/default.gif">
        </div>
        <!-- 售后正常 end -->
    </div>
    <!-- 主要内容 end -->
    @include('home.public.footer')
@endsection
@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/js/home/product_buy.js') }}?ver=<?php echo time();  ?>"></script>
    <script>

        (function () {
            $.ajax({
                url: '/product/getVersionStatus/{{ $info->id }}',
                type: 'get',
                success: function (data) {
                    if (data == 0) {
                        $('#J_buyBtnBox li').html('<a href="javascript:;" class="btn btn-primary btn-biglarge J_proBuyBtn" data-type="0">加入购物车</a>');
                    } else if (data == 1) {
                        $('#J_buyBtnBox li').html('<a class="btn btn-gray btn-line-gray btn-biglarge btn- J_setRemind" href="javascript:void(0);" data-type="1">已下架</a>');
                    } else if (data == 2) {
                        $('#J_buyBtnBox li').html('<a class="btn btn-line-primary btn-biglarge btn- J_setRemind" href="javascript:void(0);" data-type="2">新品预售</a>');
                    } else if (data == 3) {
                        $('#J_buyBtnBox li').html('<a class="btn btn-red btn-biglarge J_setRemind" href="javascript:void(0);" data-type="3" disabled>缺货中</a>');
                    } else if (data == 4) {
                        $('#J_buyBtnBox li').html('<a class="btn btn-line-primary btn-biglarge btn- J_setRemind" href="javascript:void(0);" data-type="4">新品上市</a>');
                    }

                }
            })
        })();

        $('#J_buyBtnBox li').on('click', '.btn-primary', function () {

            var obj = $('#ul').children('li.totleName').clone();
//            console.log(obj);

            obj.find(':nth-child(1)').remove();

//            console.log(obj.html());

            var pName = obj.html();

            var Price = $('#ul').children('li.totleName').children().html();
//            console.log(Price);

            var ver_id = $('div#version ul').children('.active').attr('data-ver_id');

            var verid = ver_id ? ver_id : 0;

//            console.log(verid);
            var p_id = "{{ $info->id }}";
//            alert(id);
            $.ajax({
                url: "{{url('addCart')}}",
                type: 'post',
                data: {'_token': '{{csrf_token()}}', 'pName': pName, 'Price': Price, 'p_id': p_id, 'ver_id': verid},
                success: function (data) {
//                    console.log(data);
                    if (data) {
                        window.location.href = "/addCartSuccess/" + p_id + '/' + verid;
                    }

                },
                dataType: 'json'
            });

        });

    </script>

@endsection
