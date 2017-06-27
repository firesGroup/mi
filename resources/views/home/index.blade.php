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

@section('title', '首页')
@section('keywords','')
@section('description','')

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/base.css') }}">
@endsection

@section('content')
    @include('home.public.topNav')
    @include('home.public.footer')
@endsection

@section('js')
    @parent
    <script>
        layui.use(['jquery','elements','layer'], function(){
            var $ = layui.jquery,

        });
    </script>
@endsection

