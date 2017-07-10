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
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <li style="color:#FF5722">{{ $error }}</li>
                            @endforeach
                        @else

                        @endif
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
                                <form class="layui-form" action="{{url('admin/member/'.$data->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">会员呢称</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="nick_name" lay-verify="required" autocomplete="off"
                                                   class="layui-input" value="{{$data->nick_name}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">会员邮箱</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="email" lay-verify=""
                                                   autocomplete="off" class="layui-input" value="{{$data->email}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">会员电话</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="phone" class="layui-input" value="{{$data->phone}}"
                                                   lay-verify="">
                                        </div>
                                    </div>
                                    <div class="layui-form-item" pane>
                                        <label class="layui-form-label">会员状态</label>
                                        <div class="layui-input-block">
                                            <input type="radio" name="status" value=0
                                                   {{($data->status == '0')?'checked':''}} title="普通">
                                            <input type="radio" name="status" value=1
                                                   {{($data->status == '1')?'checked':''}} title="锁定">
                                        </div>
                                    </div>
                                    <div class="layui-form-item" pane>
                                        <label class="layui-form-label">会员性别</label>
                                        <div class="layui-input-block">
                                            <input type="radio" name="sex" value=0
                                                   {{($user_detail->sex == '0')?'checked':''}} title="保密">
                                            <input type="radio" name="sex" value=1
                                                   {{($user_detail->sex == '1')?'checked':''}}  title="男">
                                            <input type="radio" name="sex" value=2
                                                   {{($user_detail->sex == '2')?'checked':''}}  title="女">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">会员生日</label>
                                        <div class="layui-input-block">
                                            <input class="layui-input" name="birthday" placeholder="自定义日期格式" id="date"
                                                   onclick="layui.laydate({elem: this, festival: true, istime: false} )"
                                                   value="{{$user_detail->birthday}}" lay-verify="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="last_ip" value="{{$data->last_ip}}">
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button id="submit" class="layui-btn" lay-submit="" lay-filter="go">立即提交
                                            </button>
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

        layui.use(['form', 'jquery', 'layer', 'laydate'], function () {
            var $ = layui.jquery,
                form = layui.form(),
                layer = layui.layer;
            var laydate = layui.laydate;

//            laydate({elem:'#date', event:'click', format: 'YYYY-MM-DD'});
            $("input[name=nick_name]").blur(function () {
                var m_name = $(this).val();
                var that = $(this);
                var origin = that.data('u');
                if (origin != m_name) {
                    $.ajax({
                        url: "{{url('admin/member_check_name/'.$data->id)}}",
                        type: "post",
                        data: {"_token": "{{csrf_token()}}", "m_name": m_name},
                        success: function (data) {
                            if (data == 1) {
                                that.data('u', m_name);
                                that.css({'border': '1px solid #FF5722'});
                                layer.msg('会员名已存在', {time: 1000});
//
                            } else {
                                that.css({'border': '1px solid #f2f2f2'});
                                layer.msg('会员名可用');
                            }
                        }
                    })
                }

            });

            $("input[name=phone]").blur(function () {
                if($(this).val() == ''){
                    return false;
                }
                var m_phone = $(this).val();
                var that = $(this);
                var origin = that.data('u');
                if (origin != m_phone) {
                    $.ajax({
                        url: "{{url('admin/member_ajax_phone/'.$data->id)}}",
                        type: "post",
                        data: {"_token": "{{csrf_token()}}", "m_phone": m_phone},
                        success: function (data) {
                            if (data == 1) {
                                that.data('u', m_phone);
                                that.css({'border': '1px solid #FF5722'});
                                layer.msg('电话已存在', {time: 1000});
                                return false;
                            } else {
                                that.css({'border': '1px solid #f2f2f2'});
                                layer.msg('号码可用');
                            }
                        }
                    })
                }

            });

            $("input[name=email]").blur(function () {
                var m_email = $(this).val();
                var that = $(this);
                var origin = that.data('u');
                if (origin != m_email) {
                    $.ajax({
                        url: "{{url('admin/member_ajax_email/'.$data->id)}}",
                        type: "post",
                        data: {"_token": "{{csrf_token()}}", "m_email": m_email},
                        success: function (data) {
                            if (data == 1) {
                                that.data('u', m_email);
                                that.css({'border': '1px solid #FF5722'});
                                layer.msg('邮箱已存在', {time: 1000});
                                return false;
                            } else {
                                that.css({'border': '1px solid #f2f2f2'});
                                layer.msg('邮箱可用');
                            }
                        }
                    })
                }

            });
        });
    </script>
@endsection