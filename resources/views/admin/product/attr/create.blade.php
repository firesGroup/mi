<?php
/**
 * File Name: create.blade.php
 * Description: 商品属性添加模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/24
 * Time: 22:48
 */
?>
@extends('layouts.iframe')

@section('title','商品属性管理-添加')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品属性管理-添加属性</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>商品属性是给用户看的,不牵涉价钱等, 例如, 生产日期,生产地保质期等...</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="form-body">
                    <form class="layui-form" method="post" id="attr">
                        {{ csrf_field() }}
                        <div class="layui-form-item">
                            <label class="layui-form-label">属性名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="attr_name" lay-verify="required" placeholder="请输入属性名称" autocomplete="off" class="layui-input" value="">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">所属模型</label>
                            <div class="layui-input-block">
                                <select name="model_id" lay-verify="required">
                                    <option value="">请选择模型</option>
                                    @foreach( $modelList as $m )
                                        <option value="{{ $m->id }}">{{ $m->model_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">属性值录入方式</label>
                            <div class="layui-input-block">
                                    <input type="radio" name="attr_input_type" value="0" checked title="手工录入">
                                    <input type="radio" name="attr_input_type" value="1" title="从列表选择(在下方输入框填写可选值)">
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">可选值列表</label>
                            <div class="layui-input-block">
                                <textarea name="attr_values" placeholder="选择手工录入时无需填写此项" class="layui-textarea"></textarea>
                                <span class="textarea-tips">注:多个可选值请用","逗号分隔</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="addattr">添加</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                <a class="layui-btn layui-btn-primary" href="{{ url('/admin/product/attr') }}">返回</a>
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
            form.on('submit(addattr)',function(data){
                var index = layer.msg('正在加载!请稍后...', {
                    icon: 16
                });
                $.ajax({
                    url:'{{ url('admin/product/attr') }}',
                    type: 'POST',
                    data: data.field,
                    success:function(res){
                        layer.close(index);
                        if( res == 0 ){
                            layer.msg('添加成功', {icon:6, time:1000, end:function(){
                                location.href= '{{ url('/admin/product/attr') }}';
                            }});
                        }else if( res == 1){
                            layer.msg('添加失败!', {icon:2, time:2000, end:function(){
                            }});
                        }else if(res == 2){
                            layer.msg('请输入属性项!', {icon:2, time:2000, end:function(){
                            }});
                        }else{
                            layer.msg('添加失败', {icon:2, time:2000, end:function(){
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

        } );
    </script>
@endsection

