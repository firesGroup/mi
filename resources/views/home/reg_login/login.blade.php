<?php
/**
 * File Name: login.blade.php
 * Description:登陆界面
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/7/3 0003
 * Time: 上午 11:22
 */
?>
@extends('layouts.home')
@section('title', '登录')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugin/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/mi_reg/login.css') }}">
@endsection

@section('content')


    <div class="wrap">
        <div class="ct">
            <div class="login-logo">
                <a href="{{  url('/') }}"><img src="{{ asset( '/images/home/login-logo.png' ) }}"></a>
            </div>
            <div class="login-bg">

            </div>
            <div class="ct">
                <div class="login-box">
                    <div class="cter ">
                        <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                            <ul class="layui-tab-title" id="login-tab">
                                <li class="layui-this">账号登陆</li>
                                <li >扫码登陆</li>
                            </ul>
                            <div class="layui-tab-content">
                                <div class="layui-tab-item layui-show layui-form">
                                    <form class="layui-form-item" method="post" action="{{url('login
                                    ')}}" >
                                        {{ csrf_field() }}
                                        <span style="color:red;">{{session('error')?session('error'):''}}</span>
                                        <input type="text" name="nick_name" id="username"   lay-verify="username|required" placeholder="请输入手机号码  /  邮箱地址" value="{{old('nick_name')}}" autofocus >

                                        <span style="color:red;">{{session('password')?session('password'):''}}</span>
                                        <input type="password" name="password" id="password"
                                               lay-verify="password|required" placeholder="请输入登录密码" value="">

                                        <input type="submit" class="layui-btn submit" lay-submit lay-filter="*" id="sub" value="立即提交">

                                    </form>
                                    <div class="alink">
                                        <a href="{{ url('/reg')  }}">注册小米账号</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="">忘记密码?</a>
                                    </div>
                                </div>
                                <div class="layui-tab-item">
                                    <div class="QRcode">
                                        <span class="saoma">
                                            <img src="{{ asset( '/images/home/wxsaoma.png' ) }}"  width="220px" height="220px" >
                                            <p>使用微信 <b>扫一扫</b> 即可登录</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="other">
                            <fieldset class="othtit">
                                <legend align="center" class="txt">其他方式登录</legend>
                            </fieldset>
                            <div class="icon">
                                <a href=""><i class="qq"></i></a>
                                <a href=""><i class="wb"></i></a>
                                <a href=""><i class="zfb"></i></a>
                                <a href=""><i class="wx"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foot">
        简体 | 繁体 | English | 常见问题<br>&copy;2017 版权所有-京ICP备10046444-<img src="{{ asset( '/images/home/ghs.png' ) }}" />京公网安备11010802020134号-京ICP证110507号
    </div>

@endsection

@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/plugin/layui/lay/dest/layui.all.js') }}"></script>
    <script>


        layui.use(['form, layer, jquery'], function () {
            var $ = layui.jquery,
                form = layui.form(),
                layer = layui.layer;


            form.verify({
                username: function (value) {
                    if (value == '') {
                        return '请输入手机号码或邮箱地址！';
                        $('#username').addClass('input-error');
                    }
                },
                password: [
                    /^[a-zA-Z]+/
                    , '请输入至少6位并以字母开头的密码'
                ]
            });
        });


    </script>
@endsection


