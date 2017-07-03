<?php
/**
 * File Name: index.blade.php
 * Description: 会员中心
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/29
 * Time: 20:43
 */
?>

@extends('layouts.home')
@section('title', '会员中心')
    @section('css');
        @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/member_center.css') }}">
 @endsection
@section('content')
    @include('home.public.header_top')
    @include('home.public.header_nav')
    <div class="breadcrumbs">
        <div class="container">
            <a href="//www.mi.com/index.html" data-stat-id="b0bcd814768c68cc" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b0bcd814768c68cc', '//www.mi.com/index.html', 'pcpid', '']);">首页</a><span class="sep">&gt;</span><span>个人中心</span>    </div>
    </div>

    <div class="page-main user-main">
        <div class="container">
            <div class="row">
                @include('home.member.member_modoul')
                <div class="span16">
                    <div class="protal-content-update hide">
                        <div class="protal-username">
                            Hi, ……        </div>
                        <p class="msg">我们做了一个小升级：你的用户名可以直接修改啦，去换个酷炫的名字吧。<a href="https://account.xiaomi.com/pass/auth/profile/home" target="_blank" data-stat-id="a7bae9e996d7d321" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a7bae9e996d7d321', 'https://account.xiaomi.com/pass/auth/profile/home', 'pcpid', '']);"> 立即前往&gt;</a></p>
                    </div>
                    <div class="uc-box uc-main-box">
                        <div class="uc-content-box portal-content-box">
                            <div class="box-bd">
                                <div class="portal-main clearfix">
                                    <div class="user-card">
                                        <h2 class="username">{{$arr->nick_name}}</h2>
                                        <p class="tip">晚上好</p>
                                        <a class="link" href="https://account.xiaomi.com/pass/userInfo" target="_blank" data-stat-id="4b099f76f8f470d2" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-4b099f76f8f470d2', 'https://account.xiaomi.com/pass/userInfo', 'pcpid', '']);">修改个人信息 &gt;</a>
                                        <img class="avatar" src="https://account.xiaomi.com/static/img/passport/photo.jpg" width="150" height="150" alt="……">
                                    </div>
                                    <div class="user-actions">
                                        <ul class="action-list">
                                            <li>账户安全：<span class="level level-2">普通</span></li>
                                            @if(empty($arr->email))
                                        <li>绑定手机：<span class="tel">{{$arr->phone}}</span></li>
                                            <li>绑定邮箱：<span class="tel">{{$arr->email}}</span>
                                                <button class="btn btn-small btn-primary layui-btn"   data-method="notice" id="email">绑定</button></li>

                                            @elseif(empty($arr->phone))

                                        <li>绑定邮箱：<span class="tel">{{$arr->email}}</span></li>
                                                <li>绑定手机：<span class="tel">{{$arr->email}}</span><a class="btn btn-small btn-primary" href="https://account.xiaomi.com/pass/userInfo" target="_blank" data-stat-id="f51e486b2c529448" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-f51e486b2c529448', 'https://account.xiaomi.com/pass/userInfo', 'pcpid', '']);">绑定</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="portal-sub">
                                    <ul class="info-list clearfix">
                                        <li>
                                            <h3>待支付的订单：<span class="num">0</span></h3>
                                            <a href="//static.mi.com/order/?type=7" data-stat-id="dd6496f77a167a5d" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-dd6496f77a167a5d', '//static.mi.com/order/', 'pcpid', '']);">查看待支付订单<i class="iconfont"></i></a>
                                            <img src="//s01.mifile.cn/i/user/portal-icon-1.png" alt="">
                                        </li>
                                        <li>
                                            <h3>待收货的订单：<span class="num">0</span></h3>
                                            <a href="//static.mi.com/order/?type=8" data-stat-id="92fa860987c1c734" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-92fa860987c1c734', '//static.mi.com/order/', 'pcpid', '']);">查看待收货订单<i class="iconfont"></i></a>
                                            <img src="//s01.mifile.cn/i/user/portal-icon-2.png" alt="">
                                        </li>
                                        <li>
                                            <h3>待评价商品数：<span class="num">0</span></h3>
                                            <a href="https://order.mi.com/user/comment?filter=1&amp;r=76289.1499093562" data-stat-id="a79855fd870c7127" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a79855fd870c7127', 'https://order.mi.com/user/comment', 'pcpid', '']);">查看待评价商品<i class="iconfont"></i></a>
                                            <img src="//s01.mifile.cn/i/user/portal-icon-3.png" alt="">
                                        </li>
                                        <li>
                                            <h3>喜欢的商品：<span class="num">0</span></h3>
                                            <a href="https://order.mi.com/user/favorite?r=76289.1499093562" data-stat-id="2e12d1c281c603d3" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-2e12d1c281c603d3', 'https://order.mi.com/user/favorite', 'pcpid', '']);">查看喜欢的商品<i class="iconfont"></i></a>
                                            <img src="//s01.mifile.cn/i/user/portal-icon-4.png" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        </div>
        </div>
    </div>
    @include('home.public.footer')
@endsection

@section('js')
    @parent

    <script>
        layui.use(['layer','jquery'], function () {
                var $ = layui.jquery,
                    layer = layui.layer;

                $('#email').click( function () {
                    layer.open({
                        type: 1
                        ,
                        title: false //不显示标题栏
                        ,
                        closeBtn: false
                        ,
                        area: '[700px, 500px];'
                        ,
                        shade: 0.8
                        ,
                        id: 'LAY_layuipro' //设定一个id，防止重复弹出
                        ,
                        btn: ['火速围观', '残忍拒绝']
                        ,
                        moveType: 1 //拖拽模式，0或者1
                        ,
                        content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">你知道吗？亲！<br>layer ≠ layui<br><br>layer只是作为Layui的一个弹层模块，由于其用户基数较大，所以常常会有人以为layui是layerui<br><br>layer虽然已被 Layui 收编为内置的弹层模块，但仍然会作为一个独立组件全力维护、升级。<br><br>我们此后的征途是星辰大海 ^_^</div>'
                        ,
                        success: function (layero) {
                            var btn = layero.find('.layui-layer-btn');
                            btn.css('text-align', 'center');
                            btn.find('.layui-layer-btn0').attr({
                                href: 'http://www.layui.com/'
                                , target: '_blank'
                            });
                        }
                    });


        });

                //示范一个公告层


        })
    </script>
@endsection
