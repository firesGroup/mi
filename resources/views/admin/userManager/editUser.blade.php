<?php
/**
 * File Name: editUser.blade.php
 * Description:管理员编辑页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/19
 * Time: 23:48
 */
?>

@extends('layouts.iframe')

@section('title','管理员管理首页')

@section('css')
    @parent
@endsection

@section('content')

    {{--{{dd($data)}}--}}
    <form class="layui-form" action="">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="_method" value="PUT">
        <div class="layui-form-item">
            <label class="layui-form-label">管理员名</label>
            <div class="layui-input-block">
                <input type="text" name="title" required lay-verify="required" placeholder="{{$data->username}}" autocomplete="off"
                       class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">修改密码</label>
            <div class="layui-input-inline">
                <input type="password" name="password" required lay-verify="required" placeholder="{{$data->password}}"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block" pane>
                <input type="radio" name="status" value="0" {{$data->status==0?'checked':''}} title="启用">
                <input type="radio" name="status" value="1" {{$data->status==1?'checked':''}} title="锁定">
            </div>
        </div>
        <input class="layui-btn layui-btn-radius layui-btn-normal" type="submit" value="修改">
        <input class="layui-btn layui-btn-radius layui-btn-warm" type="reset" value="重置">
    </form>
@endsection

@section('js')
    @parent
@endsection