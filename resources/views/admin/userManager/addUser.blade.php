<?php
/**
 * File Name: addUser.blade.php
 * Description:
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/21
 * Time: 9:10
 */
?>
@extends('layouts.iframe')

@section('title','管理员添加')

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
                <span>添加管理员</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>添加后请务必牢记个人信息</li>
                        <li>请不要随意添加</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            {{--{{dd($data)}}--}}
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">个人信息</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="{{url('admin/user')}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="add_time" value="{{date('Y-m-d H:i:s', time())}}">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">管理员名</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="username" required lay-verify="required"
                                                   placeholder="请输入名称" autocomplete="off"
                                                   class="layui-input" value="{{old('username')}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">设置密码</label>
                                        <div class="layui-input-inline" style="margin-left: 40px">
                                            <input type="password" id="pwd" name="password" required
                                                   lay-verify="required"
                                                   placeholder="请输入密码" autocomplete="off" class="layui-input"
                                                   value="{{old('password')}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-mid layui-word-aux">只能输入6-20个字母、数字、下划线</div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">重复密码</label>
                                        <div class="layui-input-inline" style="margin-left: 40px">
                                            <input type="password" id="regPwd" required lay-verify="regPwd"
                                                   placeholder="请输入相同密码" autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">所属于的权限组</label>
                                        <div class="layui-input-block">
                                            <select name="group_id" lay-verify="required">
                                                <option value=""></option>
                                                @foreach($data as $v)
                                                    {{--{{dump($v)}}--}}
                                                    <option value="{{$v->id}}">{{$v->group_name}}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">账户状态</label>
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
            var form = layui.form();
            form.verify({

                regPwd: function (value) {

                    var password = /^(\w){6,20}$/;

                    //获取密码
                    var pwd = $("#pwd").val();
//                    alert(pwd);
                    if (!password.exec(pwd)) {

                        return ('密码不符合规则');
                    }


                    if (!new RegExp(pwd).test(value)) {
                        return '两次输入的密码不一致';
                    }
                }


            });

            $('input[name=username]').blur(function () {
//                console.log(1);

                //获取到用户输入的用户名
                var username = $(this).val();
//                console.log(username);

                var that = $(this);
//                console.log(that);

                var url = "{{url('admin/ajax')}}";

                //获取到之前保存的用户名
                var origin = that.data('u');

                if (origin != username) {

                    $.ajax({
                        url: url,

                        type: 'get',

                        data: {'_token': '{{csrf_token()}}', 'username': username},

                        success: function (data) {

                            //先把用户名存放起来
                            that.data('u', username);
//                            console.log(data);
                            if (data == 1) {
                                that.css({'border': '1px solid #ff5722'});
                                layer.msg('用户名已存在');
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
