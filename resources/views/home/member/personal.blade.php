<?php
/**
 * File Name: personal.blade.php
 * Description:个人信息
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/7/5 0005
 * Time: 上午 12:08
 */
?>

@extends('layouts.home')
@section('title', '个人信息')
    @section('css')
        @parent
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/member_center.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/personal.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/personal_01.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/personal_02.css') }}">
@endsection

@section('content')
    @include('home.public.header_top')
    @include('home.public.header_nav')
    <div class="breadcrumbs">
        <div class="container">
            <a href="//www.mi.com/index.html" data-stat-id="b0bcd814768c68cc" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b0bcd814768c68cc', '//www.mi.com/index.html', 'pcpid', '']);">首页</a><span class="sep">&gt;</span><span>个人信息</span>    </div>
    </div>

    <div class="page-main user-main">
        <div class="container">
            <div class="row">
    @include('home.member.member_modoul')
                <div style="width:600px;float:right;">
                    <div class="uinfo c_b">
                        <div class="">
                            <div class="main_l">
                                <div class="naInfoImgBox t_c">
                                    <div class="na-img-area marauto">
                                        <!--na-img-bg-area不能插入任何子元素-->
                                        <div class="na-img-bg-area"></div>
                                        <em class="na-edit"></em>
                                    </div>
                                    <div class="naImgLink">
                                        <a class="color4a9" href="" title="设置头像">设置头像</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main_r">
                                <div class="framedatabox">
                                    <div class="fdata">
                                        <a class="color4a9 fr" href="" title="编辑" id="editInfo"><i class="iconpencil"></i>编辑</a>
                                        <h3>基础资料</h3>
                                    </div>
                                    <div class="fdata lblnickname">
                                        <p><span>姓名：</span><span class="value">

					&amp;hellip;&amp;hellip;

			  </span></p>
                                    </div>
                                    <div class="fdata lblbirthday">
                                        <p><span>生日：</span><span class="value" _empty="">



			  </span></p>
                                    </div>
                                    <div class="fdata lblgender">
                                        <p><span>性别：</span><span class="value">

					男

			  </span></p>
                                    </div>
                                    <div class="btn_editinfo"><a id="editInfoWap" class="btnadpt bg_normal" href="">编辑基础资料</a></div>
                                </div>
                                <div class="framedatabox">
                                    <div class="fdata">
                                        <h3>高级设置</h3>
                                    </div>
                                    <div class="fdata click-row">
                                        <a class="color4a9 fr" target="_blank" href="https://www.mipay.com" title="管理">管理</a>
                                        <p>
                                            <span>银行卡</span>
                                            <span class="arrow_r"></span>
                                        </p>
                                    </div>
                                    <div class="fdata click-row">
                                        <a class="color4a9 fr" target="_blank" href="javascript:;" title="管理" id="switchRegion">修改</a>
                                        <p>
                                            <span>帐号地区：  </span>
                                            <span class="box_center"><em id="region" _code="CN">中国</em><i class="arrow_r"></i></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="logout_wap">
                            <a class="btnadpt bg_white" href="/pass/logout?userId=1275088740&amp;callback=https://account.xiaomi.com">退出</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection

@section('js')
    @parent
@endsection
