<?php
/**
 * File Name: addRole.blade.php
 * Description: 添加权限页
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/26
 * Time: 15:43
 */
?>

@extends('layouts.iframe')

@section('title','添加权限')

@section('css')
    @parent
@endsection

@section('content')

    @if (session('success'))
        <div style="font-size: 20px; color: red;text-align: center">
            {{ session('success') }}
        </div>
    @endif

    {{--{{dd($data)}}--}}
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>添加权限</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请不要添加相同的权限</li>
                        <li>请按需求添加权限</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            {{--{{dd($data)}}--}}
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">权限</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="{{url('admin/role')}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">权限名</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="role_name" required lay-verify="required"
                                                   placeholder="请输入名称" autocomplete="off"
                                                   class="layui-input" value="{{old('role_name')}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">权限路由</label>
                                        <div class="layui-input-block">

                                            <input type="text" name="role" required lay-verify="required"
                                                   placeholder="请输入权限操作地址" autocomplete="off" class="layui-input" value="{{old('role')}}">

                                        </div>
                                    </div>
                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">权限描述</label>
                                        <div class="layui-input-block">
                                            <textarea name="role_desc" placeholder="请输入内容"
                                                      class="layui-textarea" value="{{old('role_desc')}}"></textarea>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">组状态</label>
                                        <div class="layui-input-block">
                                            <input type="radio" name="status" value="0" title="正常" checked>
                                            <input type="radio" name="status" value="1" title="锁定">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
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
    <script>
        //Demo
        layui.use('form', function () {
            var form = layui.form();

            //监听提交
            form.on('submit(formDemo)', function (data) {
                layer.msg(JSON.stringify(data.field));
                return false;
            });
        });


    </script>
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

            });

            $('input[name=role]').blur(function () {
//                alert(1);

                //获取到用户输入的权限方法名
                var role = $(this).val();

//                console.log(name);

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

            });

        });

    </script>


@endsection

