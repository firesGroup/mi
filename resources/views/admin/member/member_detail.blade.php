<?php
/**
 * File Name: member_detail.blade.php
 * Description:会员详细信息
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/20 0020
 * Time: 下午 9:45
 */
?>

@extends('layouts.iframe')
@section('title', '会员详情页')
@section('css')
    @parent
@endsection

@section('content')
    <header class="larry-personal-tit">
        <span>会员管理-会员信息</span>
    </header>

    <div style="width:60%;"class="clearfix">
        <div style="width:300px;margin-left:left">
            <img src="{{$user_detail->avator}}" width="200">
            <h4 align="center">会员头像</h4>
        </div>
        <table class="layui-table clearfix" style="margin:auto">
            <thead>
            <tr>
                <th colspan="3" style="font: 25px/1.5 楷体">会员基本信息</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>会员编号:</td>
                <td>{{$data->id}}</td>
            </tr>
            <tr>
                <td>会员昵称:</td>
                <td>{{$data->nick_name}}</td>
            </tr>
            <tr>
                <td>会员邮箱:</td>
                <td>{{$data->email}}</td>
            </tr>
            <tr>
                <td>会员密码:</td>
                <td>{{$data->password}}</td>
            </tr>
            <tr>
                <td>会员电话:</td>
                <td>{{$data->phone}}</td>
            </tr>
            <tr>
                <td>性别:</td>
                <td>{{$arr[$user_detail->sex]}}</td>
            </tr>
            <tr>
                <td>状态:</td>
                <td>{{$state[$data->status]}}</td>
            </tr>
            <tr>
                <td>最后登陆IP:</td>
                <td>{{$data->last_ip}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    @parent
@endsection
