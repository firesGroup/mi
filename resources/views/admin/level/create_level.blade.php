<?php
/**
 * File Name: create_level.blade.php
 * Description:添加等级
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/21 0021
 * Time: 上午 10:53
 */
?>

@extends('layouts.iframe')
@section('title', '等级添加')
@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>等级管理-添加等级</span>
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
                <div class="layui-tab" lay-filter="tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">添加等级</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" method="post" action="{{url('admin/level')}}">
                                    {{csrf_field()}}
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">等级名称</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="level_name" lay-verify="required"
                                                   placeholder="请输入等级名称" autocomplete="off" class="layui-input"
                                                   id="level_name" value="{{old('level_name')}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">折扣率</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="discount" lay-verify="required|discount|number" placeholder="请输入折扣率" id="discount"
                                                   autocomplete="off" class="layui-input" value="{{old('discount')}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">等级描述</label>
                                        <div class="layui-input-block">
                                            <textarea type="text" name="level_desc" lay-verify="required"
                                                      placeholder="请输入等级描述" autocomplete="off"
                                                      class="layui-input">{{old('level_desc')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit="" lay-filter="go"
                                                    id="submit">立即提交
                                            </button>
                                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <div class="p-images-list-box clearfix" id="p-images-list">
                            </div>
                        </div>
                        <div class="layui-tab-item">内容3</div>
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
                        url: '{{url('admin/create_ajax')}}',
                        type: 'post',
                        data: {'_token': '{{ csrf_token() }}', 'level_name': l_name},
                        success: function (data) {
                            that.data('u', l_name);
                            console.log(data);
                            if (data == 1) {
                                that.css({'border': '1px solid #FF5722'});
                                layer.msg('等级名已存在', {time:1000});
                            } else {
                                that.css({'border': '1px solid #f2f2f2'});
                                layer.msg('等级名可用');
                            }

                        },
                    });
                }

            })
            form.verify({
                discount:[/^\d{1,2}$/, '数字不能超过两个']
            })
            form.verify({
                consumption:[/^\d{1,8}$/, '数字不能超过八个']
            })


        });
    </script>
@endsection
