<?php
/**
 * File Name: index.blade.php
 * Description: 首页模板文件
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 23:23
 */
?>
@extends('layouts.home')

@section('title'){{ $C['seo']['index_title'] or $C['web']['web_title'] }}@endsection
@section('keywords'){{ $C['seo']['index_keys'] or $C['web']['web_keys'] }}@endsection
@section('description'){{ $C['seo']['index_desc'] or $C['web']['web_desc']}}@endsection


@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/index.css') }}">
@endsection

@section('content')
    @include('home.public.header_top')
    @include('home.public.header_nav')
    <div class="home-hero-container container">
        <div class="home-hero">
            @include('home.index.sildeShow')
            @include('home.public.hotRecommend')
            @include('home.index.superStar')
        </div>
    </div>
    <!-- 主要内容 start -->
    <div class="page-main home-main">
        <div class="container">
            {{--<!-- 家电 start-->--}}
            @include('home.index.homeElec')
            {{--<!-- 家电 end -->--}}
            {{--<!-- 智能 start -->--}}
            @include('home.index.smart')
            {{--<!-- 智能 end -->--}}
            {{--<!-- 搭配 start -->--}}
{{--            @include('home.index.match')--}}
            {{--<!-- 搭配 end -->--}}
            {{--<!-- 配件 start -->--}}
{{--            @include('home.index.accessories')--}}
            {{--<!-- 配件 start -->--}}
            {{--<!-- 周边 start -->--}}
{{--            @include('home.index.around')--}}
            {{--<!-- 周边 end -->--}}
            {{--<!-- 首页为您推荐 end -->--}}
{{--            @include('home.index.recommend')--}}
            {{--<!-- 首页为您推荐 end -->--}}
            {{--<!-- 热评 start -->--}}
            @include('home.index.commen')
            {{--<!-- 热评 end -->--}}
            {{--<!-- 内容 start -->--}}
{{--            @include('home.index.content')--}}
            {{--<!-- 内容 end -->--}}
            {{--<!-- 视频 start -->--}}
            @include('home.index.video')
            {{--<!-- 视频 end -->--}}
        </div>
    </div>
    <!-- 主要内容 end -->
    @include('home.public.footer')
@endsection

@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/js/home/index.js') }}?ver=<?php echo time();  ?>"></script>
    <script>
        $(function() {
            $(".cacheload").scrollLoading();
        });
    </script>
@endsection

