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
                                <form class="layui-form" action="{{url('admin/level/'.$data->id)}}" method="post" >
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">等级名称</label>
                                        <div class="layui-input-block">
                                            <input type="text" id="level_name" name="level_name" lay-verify="required" autocomplete="off" class="layui-input" value="{{$data->level_name}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">折扣率</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="discount" class="layui-input" value="{{trim($data->discount, '%')}}" lay-verify="required|discount">
                                        </div>
                                    </div>
                                    <div class="layui-form-item" pane>
                                        <label class="layui-form-label">等级描述</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="level_desc" class="layui-input" value="{{$data->level_desc}}" lay-verify="required">
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
        layui.use(['jquery', 'form', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer,
                form = layui.form(),
                layedit = layui.layedit,
                laydate = layui.laydate;
            $('#level_name').focusout(function () {
                var l_name = $(this).val();
                var that = $(this);
                var origin = that.data('u');
                if (origin != l_name) {
                    $.ajax({
                        url: '{{url('admin/level_edit/'.$data->id)}}',
                        type: 'post',
                        data: {'_token': '{{ csrf_token() }}', 'level_name': l_name},
                        dataType: "json",
                        success: function (data) {
                            that.data('u', l_name);
                            if (data == '1') {
                                that.css({'border': '1px solid #FF5722'});
                                layer.msg("等级名不可用", {time: 1000});
                            } else {
                                that.css({'border': '1px solid #f2f2f2'});
                                layer.msg('等级名可用');
                            }
                        },
                    });
                }
            });
            form.verify({
                discount:[/^\d{1,2}$/, '数字不能超过两个']
            })
            form.verify({
                consumption:[/[1-9]\d*.\d*|0.\d*[1-9]\d*/, '数字不能超过八个']
            })


        });

    </script>
@endsection