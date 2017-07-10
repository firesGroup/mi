<?php
/**
 * File Name: edit.blade.php
 * Description: 分组修改页面模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/7/6
 * Time: 15:52
 */
?>
@extends('layouts.iframe')

@section('title','菜单分组管理-修改分组')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>菜单分组管理-修改分组</span>
            </header>
            <div class="larry-personal-body clearfix">
                <div class="form-body">
                    <form class="layui-form" id="group">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="layui-form-item">
                            <label class="layui-form-label">分组名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="menu_group_name" lay-verify="required" placeholder="请输入分组名称" autocomplete="off" class="layui-input" value="{{ $info->menu_group_name }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" type="submit" lay-submit="" lay-filter="editGroup">修改</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                <a class="layui-btn layui-btn-primary" href="{{ url('/admin/menugroup') }}">返回</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    @parent
    <script>
        layui.use( ['jquery','layer','form'], function(){
            var $ = layui.jquery,
                layer = layui.layer,
                form = layui.form();

            //序列化表单值 用于判断是否被修改过
            var loadFormData = $('form#group').serialize();
            form.on('submit(editGroup)',function(data){
                var submitFormData = $('form#group').serialize();
                if( submitFormData == loadFormData ){
                    layer.msg('您什么都没修改呀!', {'icon':3, 'time':2000,anim: Math.ceil(Math.random() * 6)});
                }else {
                    var index = layer.msg('正在修改中!请稍后...', {
                        icon: 16
                    });
                    $.ajax({
                        url: '{{ url('admin/menugroup/'.$info->id) }}',
                        type: 'PUT',
                        data: data.field,
                        dataType: 'json',
                        success: function (res) {
                            layer.close(index);
                            if (res == 0) {
                                layer.msg('修改成功', {
                                    icon: 6, time: 1000, end: function () {
                                        location.href = "{{ url('/admin/menugroup') }}";
                                    }
                                });
                            } else {
                                layer.msg('修改失败', {
                                    icon: 2, time: 2000, end: function () {
                                        location.href = "{{ url('/admin/menugroup') }}";
                                    }
                                });
                            }
                        },
                        error:function (XMLHttpRequest) {
                            var msgObj = XMLHttpRequest.responseJSON;
                            var msg = '';
                            for(var name in msgObj){//遍历对象属性名
                                msg += msgObj[name] + "<br>";
                            }
                            layer.msg(msg,{icon:2,time:3000});
                        },
                    });
                }
                return false;
            });

        } );
    </script>
@endsection

