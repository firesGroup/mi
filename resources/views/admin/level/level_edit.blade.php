<?php
/**
 * File Name: level_edit.blade.php
 * Description:修改会员等级
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/23 0023
 * Time: 下午 4:13
 */
?>
@extends('layouts.iframe')

@section('title', '修改等级')
@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>等级管理-修改等级</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请务必正确填写等级信息</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">等级信息</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="{{url('admin/member/'.$data->id)}}" method="post" >
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">等级名称</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="nick_name" lay-verify="required" autocomplete="off" class="layui-input" value="{{$data->level_name}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">消费金额</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="email" lay-verify="required"  autocomplete="off" class="layui-input" value="{{$data->consumption}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">折扣率</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="phone" class="layui-input" value="{{$data->discount}}" lay-verify="required">
                                        </div>
                                    </div>
                                    <div class="layui-form-item" pane>
                                        <label class="layui-form-label">等级描述</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="phone" class="layui-input" value="{{$data->level_deta}}" lay-verify="required">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button id="submit" class="layui-btn" lay-submit=""  lay-filter="go">立即提交</button>
                                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
@section('js')
    @parent

    <script>
        layui.use(['form', 'jquery', 'layer'], function () {
            var $ = layui.jquery,
                form = layui.form(),
                layer = layui.layer;

            $("input[name=nick_name]").blur( function () {
                var m_name =  $(this).val();
                var that = $(this);
                var origin = that.data('u');
                if (origin != m_name) {
                    $.ajax({
                        url:"{{url('admin/level_edit/'.$data->id)}}",
                        type:"post",
                        data:{"_token":"{{csrf_token()}}","m_name":m_name},
                        success:function (data) {
                            if (data == 1) {
                                that.data('u', m_name);
                                that.css({'border': '1px solid #FF5722'});
                                layer.msg('会员名已存在', {time: 1000});
                            } else {
                                that.css({'border': '1px solid #f2f2f2'});
                                layer.msg('会员名可用');
                            }
                        }
                    })
                }

        })
    </script>
@endsection