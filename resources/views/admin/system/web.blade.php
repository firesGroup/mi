<?php
/**
 * File Name: create.blade.php
 * Description: 添加商品页面模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 9:32
 */
?>
@extends('layouts.iframe')

@section('title','系统设置')

@section('css')
    @parent
@endsection
@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>系统设置-基本信息设置</span>
            </header>
            <div class="larry-personal-body clearfix">
                <form class="layui-form" id="addProduct">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="layui-form-item">
                            <label class="layui-form-label">网站网址</label>
                            <div class="layui-input-block">
                                <input type="text" name="web_domain"  placeholder="请输入网站网址" autocomplete="off" class="layui-input" value="{{ $web['web_domain'] or '' }}">
                            </div>
                        </div>
                    <!-- 站点名称 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">网站标题</label>
                            <div class="layui-input-block">
                                <input type="text" name="web_title" placeholder="请输入网站名称" autocomplete="off" class="layui-input" value="{{ $web['web_title'] or '' }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">站点名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="web_name" placeholder="请输入网站名称" autocomplete="off" class="layui-input" value="{{ $web['web_name'] or '' }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">网站关键字</label>
                            <div class="layui-input-block">
                                <input type="text" name="web_keys" placeholder="请输入网站名称" autocomplete="off" class="layui-input" value="{{ $web['web_keys'] or '' }}">
                            </div>
                        </div>
                        <!-- 商城简介 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">网站描述</label>
                            <div class="layui-input-block">
                                <textarea type="text" name="web_desc" placeholder="请输入网站描述" autocomplete="off" class="layui-input">{{ $web['web_desc'] or '' }}</textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">网站备案号</label>
                            <div class="layui-input-block">
                                <input type="text" name="web_beian"  placeholder="请输入网站名称" autocomplete="off" class="layui-input" value="{{ $web['web_beian'] or '' }}">
                            </div>
                        </div>
                        <!-- 活动提醒 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">网站logo</label>
                            <div class="layui-input-block">
                                <input id="upload-input" type="text" class="layui-input" name="web_logo" value="{{ $web['web_logo']  or '' }}" placeholder="输入图片地址或点击上传">
                                <div id="brand_logo">
                                    <input type="file" name="file" id="imgUpload" class="layui-upload-file" accept="image/*"  lay-ext="jpg|png|gif|bmp" lay-title="点击或拖拽文传上传">
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <center>
                                <button class="layui-btn" lay-submit="" lay-filter="edit">保存</button>
                                <a class="layui-btn" id="back">返回列表</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @parent
    <script>
        layui.use( ['jquery','layer','form','upload'], function(){
            var $ = layui.jquery,
                layer = layui.layer,
                form = layui.form();

            form.on('submit(edit)',function(data){
                var index = layer.msg('正在添加!请稍后...', {
                    icon: 16
                });
                $.ajax({
                    url:'{{ url('admin/system/web') }}',
                    type: 'POST',
                    data: data.field,
                    success:function(res){
                        layer.close(index);
                        if( res == 0 ){
                            layer.msg('添加成功', {icon:6, time:1000, end:function(){
                                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                                parent.layer.close(index);
                                location.href= '{{ url('/admin/system/web') }}';
//                                layer.alert(res,{title:1});
                            }});
                        }else{
                            layer.msg('添加失败', {icon:2, time:2000, end:function(){
                                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                                parent.layer.close(index);
//                                layer.alert(res,{title:1});
                            }});
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
                return false;
            });

            layui.upload({
                elem: '#imgUpload', //文件input上传域 id
                method: 'post', //文件上传传输方式
                url: '{{ url('/upload') }}', //后台处理程序地址
                before: function (input) {
                    //上传前回调
                    //定义存储路径与token
                    $('input#imgUpload').parent().append('<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="path" value="system">');
                    l = layer.msg('正在上传 请稍后...', {icon: 6});
                }
                , success: function (res) {
                    if (res.status == 0) {
                        layer.close(l);
                        layer.msg('上传成功',{
                            icon: 6,
                            time: 1000 //1秒关闭（如果不配置，默认是3秒）
                        });
                        $('input[name="web_logo"]').val(res.src);
                    }else if( res == 1 ){
                        layer.close(l);
                        layer.msg('上传失败', {'time': 2000});
                    }
                }
            });
        } );
    </script>
@endsection
