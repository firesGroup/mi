<?php
/**
 * File Name: edit.blade.php
 * Description:修改会员信息
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/19 0019
 * Time: 下午 11:54
 */
?>
@extends('layouts.iframe')

@section('title', '修改会员信息')
@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>会员管理-修改信息</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请务必正确填写会员信息</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">会员信息</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="{{url('admin/member/'.$data->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">会员呢称</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="nick_name" lay-verify="required" autocomplete="off" class="layui-input" value="{{$data->nick_name}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">会员邮箱</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="price" lay-verify="required"  autocomplete="off" class="layui-input" value="{{$data->email}}">
                                        </div>
                                    </div>
                                    {{--<div class="layui-form-item">--}}
                                        {{--<label class="layui-form-label">会员密码</label>--}}
                                        {{--<div class="layui-input-block">--}}
                                            {{--<input type="text" name="market_price" lay-verify="required" autocomplete="off" class="layui-input" value="{{$data->password}}">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">会员电话</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="phone" class="layui-input" value="{{$data->phone}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item" pane>
                                        <label class="layui-form-label">会员状态</label>
                                        <div class="layui-input-block">
                                            <input type="radio" name="status" value=0 {{($data->status == '0')?'checked':''}} title="普通">
                                            <input type="radio" name="status" value=1 {{($data->status == '1')?'checked':''}} title="锁定">
                                        </div>
                                    </div>
                                    <div class="layui-form-item" pane>
                                        <label class="layui-form-label">会员性别</label>
                                        <div class="layui-input-block">
                                            <input type="radio" name="sex" value=0 {{($user_detail->sex == '0')?'checked':''}} title="保密">
                                            <input type="radio" name="sex" value=1 {{($user_detail->sex == '1')?'checked':''}}  title="男">
                                            <input type="radio" name="sex" value=2 {{($user_detail->sex == '2')?'checked':''}}  title="女">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">会员生日</label>
                                        <div class="layui-input-block">
                                            <input type="date" name="birthday" class="layui-input" value="{{$user_detail->birthday}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">会员头像</label>
                                        <div class="layui-input-block">
                                            <input type="file" name="avator" class="layui-upload-file" lay-title="上传会员头像">
                                        </div>
                                        <div class="layui-input-block">
                                            <img src="{{$user_detail->avator}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        {{--<div class="layui-tab-item">--}}
                            {{--<div class="form-body">--}}
                                {{--<form class="layui-form">--}}
                                    {{--<div class="layui-form-item">--}}
                                        {{--<div class="layui-input-block">--}}
                                            {{--<input type="file" name="p_index_image" class="layui-upload-file">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="layui-tab-item">内容3</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @parent
    <script>
        layui.use(['jquery','layer','form', 'upload','layedit', 'element'], function () {
            var form = layui.form()
                ,$ = layui.jquery
                ,layedit = layui.layedit
                ,element = layui.element()
            layer = layui.layer;

            //上传封面图片
            layui.upload({
                url: '' //上传接口
                ,success: function(res){ //上传成功后的回调
                    console.log(res)
                }
            });

            //构建一个默认的编辑器
            var index = layedit.build('editor');
        });

    </script>
@endsection