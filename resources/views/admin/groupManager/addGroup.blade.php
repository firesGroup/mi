<?php
/**
 * File Name: addGroup.blade.php
 * Description:  新增权限组
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/25
 * Time: 14:58
 */
?>

@extends('layouts.iframe')

@section('title','添加权限组')

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
                <span>添加权限组</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请给组添加合适的权限</li>
                        <li>请不要随意添加</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            {{--{{dd($data)}}--}}
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">权限组</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="{{url('admin/group')}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="add_time" value="{{date('Y-m-d H:i:s', time())}}">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">权限组名</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="group_name" required lay-verify="required"
                                                   placeholder="请输入名称" autocomplete="off"
                                                   class="layui-input" value="">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">要添加的权限</label>
                                        <div class="layui-input-block">

                                            @foreach($data as $v)

                                                <input type="checkbox" name="role_list[]" title="{{$v->role_name}}"
                                                       value="{{$v->id}}">

                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">权限组描述</label>
                                        <div class="layui-input-block">
                                            <textarea name="group_desc" placeholder="请输入内容"
                                                      class="layui-textarea"></textarea>
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

            $('input[name=group_name]').blur(function () {
//                console.log(1);

                //获取到用户输入的组名
                var groupName = $(this).val();
//                console.log(username);

                var that = $(this);
//                console.log(that);

                var url = "{{url('admin/groupAjax')}}";

                //获取到之前保存的组名
                var origin = that.data('g');

                if (origin != groupName) {

                    $.ajax({
                        url: url,

                        type: 'get',

                        data: {'_token': '{{csrf_token()}}', 'groupName': groupName},

                        success: function (data) {

                            //先把组名存放起来
                            that.data('g', groupName);
                            console.log(data);
                            if (data == 1) {
                                that.css({'border': '1px solid #ff5722'});
                                layer.msg('组名已存在');
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

