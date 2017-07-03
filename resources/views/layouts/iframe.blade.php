<?php
/**
 * File Name: iframe.blade.php
 * Description:
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/20 0020
 * Time: 上午 10:41
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title') - 小米商城系统 - FiresGroup</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!-- load css -->
    @section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugin/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/global.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/font.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/common.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/personal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/show.css') }}">
        @show
</head>
<body>
@if( count($errors) >0  )
    <div id="errors_msg" style="display:none">
    @foreach ($errors->all() as $key => $error)
            <li>{{ $error }}</li>
    @endforeach
    </div>
@endif
@section('content')
    @show
@section('js')
    <!-- 加载js文件-->
    <script type="text/javascript" src="{{ asset('/plugin/layui/layui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/admin/larry.js') }}"></script>
@show
</body>
</html>
