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

@section('title','管理员修改页')

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
                <span>管理员-修改信息</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>修改后请务必牢记个人信息</li>
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
                                <form class="layui-form" action="{{ url('admin/user/'.$data->id) }}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">管理员名</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="username"
                                                   placeholder="{{$data->username}}" autocomplete="off"
                                                   class="layui-input" value="{{$data->username}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">旧密码</label>
                                        <div class="layui-input-block">
                                            <input type="password" name="oldPassword"
                                                   autocomplete="off" class="layui-input" placeholder="留空表示不修改">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">新密码</label>
                                        <div class="layui-input-block">
                                            <input type="password" name="newPassword"
                                                   autocomplete="off" class="layui-input" value="" placeholder="留空表示不修改">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">所属于的权限组</label>
                                        <div class="layui-input-block">
                                            <select name="group_id">
                                                {{--<option value="{{$str->id}}">{{$str->group_name}}</option>--}}
                                                @foreach($arr as $v)
                                                    {{--{{dump($v)}}--}}
                                                    <option value="{{$v->id}}">{{$v->group_name}}</option>

                                                @endforeach
                                            </select>
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

            $('input[name=oldPassword]').blur(function () {
//                console.log(1);
                var password = $(this).val();

//                console.log(password);
                var that = $(this);

                //获取到之前保存的密码
                var origin = that.data('p');

                var url = "{{url('admin/ajaxPassword')}}";

                var id = "{{$data->id}}";

                if (origin != password) {

                    $.ajax({
                        url: url,

                        type: 'post',

                        data: {'_token': '{{csrf_token()}}', 'password': password, 'id': id},

                        success: function (data) {

                            //先把密码存放起来
                            that.data('p', password);
//                            console.log(data);
                            if (data == 1) {
                                that.css({'border': '1px solid #ff5722'});
                                layer.msg('密码与原密码不匹配');
                            } else {
                                that.css({'border': '1px solid #f2f2f2'});
                            }

                        },

                        dataType: 'json'
                    });

                }

            });


            $('input[name=username]').blur(function () {


                //获取到用户输入的用户名
                var username = $(this).val();

                var name = "{{$data->username}}";

//                console.log(username);
                if (username !== name) {

//                    console.log(1);

                    var that = $(this);
                    //console.log(that);

                    var url = "{{url('admin/ajaxPassword')}}";

                    //获取到之前保存的用户名
                    var origin = that.data('u');

                    if (origin != username) {

                        $.ajax({
                            url: url,

                            type: 'post',

                            data: {'_token': '{{csrf_token()}}', 'username': username},

                            success: function (data) {

                                //先把用户名存放起来
                                that.data('u', username);
//                                console.log(data);
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
                }
            });

        });
    </script>
@endsection


