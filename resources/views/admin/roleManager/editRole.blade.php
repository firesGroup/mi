<?php
/**
 * File Name: edit.blade.php
 * Description: 权限修改页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/26
 * Time: 10:34
 */
?>


@extends('layouts.iframe')

@section('title','权限修改页')

@section('css')
    @parent
@endsection

@section('content')
    {{--{{dd($arr)}}--}}
    {{--{{dd($str)}}--}}
    @if (session('success'))
        <div style="font-size: 20px; color: red;text-align: center">
            {{ session('success') }}
        </div>
    @endif
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>权限-修改信息</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请根据需要修改权限</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            {{--{{dd($data)}}--}}
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">权限信息</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="{{ url('admin/role/'.$data->id) }}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">权限名</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="role_name" required lay-verify="required"
                                                   placeholder="{{$data->role_name}}" autocomplete="off"
                                                   class="layui-input" value="{{$data->role_name}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">权限方法</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="role" required lay-verify="required"
                                                   placeholder="{{$data->role}}" autocomplete="off"
                                                   class="layui-input" value="{{$data->role}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">权限描述</label>
                                        <div class="layui-input-block">
                                            <textarea name="role_desc" class="layui-textarea" value="">{{$data->role_desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">状态</label>
                                        <div class="layui-input-block" pane>
                                            <input type="radio" name="status" value="0"
                                                   {{$data->status==0?'checked':''}} title="启用"
                                                   lay-skin="primary">
                                            <input type="radio" name="status" lay-skin="primary" value="1"
                                                   {{$data->status==1?'checked':''}} title="锁定">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交
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
        </div>
    </section>
@endsection

@section('js')
    @parent
    <script>

        layui.use(['form', 'jquery', 'layer'], function () {
            var $ = layui.jquery;
            var layer = layui.layer;

            $('input[name=role_name]').blur(function () {


                //获取到用户输入的权限名
                var roleName = $(this).val();

                var name = "{{$data->role_name}}";

//                console.log(username);
                if (roleName !== name) {

//                    console.log(1);

                    var that = $(this);
                    //console.log(that);

                    var url = "{{url('admin/ajaxRoleName')}}";

                    //获取到之前保存的权限名
                    var origin = that.data('r');

                    if (origin != roleName) {

                        $.ajax({
                            url: url,

                            type: 'get',

                            data: {'_token': '{{csrf_token()}}', 'roleName': roleName},

                            success: function (data) {

                                //先把权限名存放起来
                                that.data('r', roleName);
//                                console.log(data);
                                if (data == 1) {
                                    that.css({'border': '1px solid #ff5722'});
                                    layer.msg('权限名已存在');
                                } else {
                                    that.css({'border': '1px solid #f2f2f2'});
                                }

                            },

                            dataType: 'json'
                        });

                    }
                }
            });

            $('input[name=role]').blur(function () {
//                alert(1);

                //获取到用户输入的权限方法名
                var role = $(this).val();

                var name = "{{$data->role}}";

//                console.log(name);
                if (role !== name) {

//                    console.log(1);

                    var that = $(this);
                    //console.log(that);

                    var url = "{{url('admin/ajaxRole')}}";

                    //获取到之前保存的权限方法名
                    var origin = that.data('role');

                    if (origin != role) {

                        $.ajax({
                            url: url,

                            type: 'get',

                            data: {'_token': '{{csrf_token()}}', 'role': role},

                            success: function (data) {

                                //先把权限方法名存放起来
                                that.data('role', role);
//                                console.log(data);
                                if (data == 1) {
                                    that.css({'border': '1px solid #ff5722'});
                                    layer.msg('权限方法已存在');
                                } else {
                                    that.css({'border': '1px solid #f2f2f2'});
                                }

                            },

                            dataType: 'json'
                        });

                    }
                }
            });

        });

    </script>

@endsection