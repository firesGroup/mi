<?php
/**
 * File Name: login.blade.php
 * Description:后台登录页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/7/3
 * Time: 15:43
 */
?>
@extends('layouts.iframe')
@section('title', '登陆')
@section('css')
    <link rel="stylesheet" href="{{ asset('/css/admin/login.css') }}">
@show
@section('content')
    <div class="wrapper">
        <div class="container">
            <h1>商城后台管理系统</h1>
            <form method="post" id="frm_login" class="layui-form layui-form-pane " action="{{url('admin/login')}}">
                {{ csrf_field()  }}
                <div style="color:red">{{session('error')?session('error'):''}}</div>
                <input class="txt-input txtpd" name="name" id="name" lay-verify="required"  type="text" value="{{ old('name')  }}" />
                <div style="color:red">{{session('wrong')?session('wrong'):''}}</div>
                <input id="Password" name="password" class="txt-input txtpd"  value="" lay-verify="required" type="password" />
                <button  id="regSubmit" lay-submit="" lay-filter="login" type="submit">登陆</button>
            </form>
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <script type="text/javascript" src="{{ asset('/plugin/layui/lay/dest/layui.all.js') }}"></script>
    <script>
        //Demo

        layui.use(['form','layer','jquery'], function(){
            var form = layui.form();
            var $ = layui.jquery;
            layer = layui.layer;

            $.ajax({



            });

        });
    </script>
@endsection