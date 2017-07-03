<?php
/**
 * File Name: comment.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/29
 * Time: 16:07
 */
?>

@extends('layouts.commentHead')

@section('title','')

@section('css')
    @parent
@endsection

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/comment.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/global.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/common.css') }}">


    <div class="head">
        <div class="container">

            <h2 class="name">小米MIX</h2>

            <div class="right">
                <a href="">概述</a>
                &nbsp;
                <span class="span">|</span>&nbsp;
                <a href="">艺术与设计</a>&nbsp;
                <span class="span">|</span>&nbsp;
                <a href="">参数</a>&nbsp;
                <span class="span">|</span>&nbsp;
                <a href="">F码通道</a>&nbsp;
                <span class="span">|</span>&nbsp;
                <a href="">用户评价</a> &nbsp;
                &nbsp;
                <a href="" class="btn pay">立即购买</a>
            </div>
        </div>
    </div>

    <br>
    <div class="comt">
        <div class="comment-nav">

            <div class="commenthead">

                <h2 class="da">大家认为</h2>

                <div class="nav-box">
                    <a href="" class="a a1">全部</a>
                    <a href="" class="a">值得拥有</a>
                    <a href="" class="a">外观漂亮</a>
                    <a href="" class="a">手感很棒</a>
                    <a href="" class="a">快递给力</a>
                    <a href="" class="a">速度很快</a>
                </div>
            </div>

            <div class="content">
                <h2 class="remen">热门评价</h2>
                <a href="" class="show">只显示带图评价</a>

                <div class="pinlun">

                </div>
            </div>

        </div>
    </div>

@endsection


