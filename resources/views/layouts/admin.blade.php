<?php
/**
 * File Name: admin.blade.php
 * Description: 后台布局模板文件
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/15
 * Time: 15:45
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - 小米商城系统 - FiresGroup</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="Shortcut Icon" href="/favicon.ico" />
    @section('css')<!-- load css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugin/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/global.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/backstage.css') }}">
    @show
</head>
<body>
    @yield('content')
    @section('js')<!-- 加载js文件-->
        <script type="text/javascript" src="{{ asset('/plugin/layui/layui.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/admin/larry.js') }}"></script>
    @show
</body>
</html>

