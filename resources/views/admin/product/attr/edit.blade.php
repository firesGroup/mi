<?php
/**
 * File Name: edit.blade.php
 * Description: 商品属性修改页模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/25
 * Time: 0:01
 */
?>
@extends('layouts.iframe')

@section('title','商品属性管理-修改')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品属性管理-修改属性</span>
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
                                <input type="text" name="attr_name" lay-verify="required" placeholder="请输入属性名称" autocomplete="off" class="layui-input" value="{{$info->attr_name}}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">所属模型</label>
                            <div class="layui-input-block">
                                <select name="model_id" lay-verify="required">
                                    <option value="">请选择模型</option>
                                    @foreach( $modelList as $m )
                                        @if( $m->id == $info->model_id )
                                            <option value="{{ $m->id }}" selected>{{ $m->model_name }}</option>
                                        @else
                                            <option value="{{ $m->id }}">{{ $m->model_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">属性值录入方式</label>
                            <div class="layui-input-block">
                                @if( $info->attr_input_type == 0 )
                                    <input type="radio" name="attr_input_type" value="0" checked title="手工录入">
                                    <input type="radio" name="attr_input_type" value="1" title="从列表选择(在下方输入框填写可选值)">
                                @elseif( $info->attr_input_type == 1 )
                                    <input type="radio" name="attr_input_type" value="0" title="手工录入">
                                    <input type="radio" name="attr_input_type" value="1" checked title="从列表选择(在下方输入框填写可选值)">
                                    <span class="textarea-tips">注:切换选择为手工录入将清空可选值列表</span>
                                @endif
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">可选值列表</label>
                            <div class="layui-input-block">
                                <textarea name="attr_values" placeholder="选择手工录入时无需填写此项" class="layui-textarea">{{ $info->attr_values  }}</textarea>
                                <span class="textarea-tips">注:多个可选值请用","逗号分隔</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="editAttr">修改</button>
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

            //序列化表单值 用于判断是否被修改过
            var loadFormData = $('form#attr').serialize();
            //表单提交监听
            form.on('submit(editAttr)', function(data){
                var submitFormData = $('form#attr').serialize();
                if( submitFormData == loadFormData ){
                    layer.msg('您什么都没修改呀!', {'icon':3, 'time':2000,anim: Math.ceil(Math.random() * 6)});
                }else{
                    var index = layer.msg('正在修改信息!请稍后...', {
                        icon: 16
                    });
                    $.ajax({
                        url:'{{ url('/admin/product/attr').'/'.$info->id }}',
                        type: 'put',
                        data: data.field,
                        success: function(res){
                            if( res == 0 ){
                                layer.msg('修改成功!', {'icon':6, 'time':1000,end:function(){
                                    layer.close(index);
                                    location.href ='{{ url('/admin/product/attr')}}';
                                }});
                            }else if( res == 1 ){
                                layer.msg('修改失败!', {'icon':2, 'time':3000, end:function(){
                                    layer.close(index);
                                }});
                            }
                        }
                    });
                }
                return false;
            });
        } );
    </script>
@endsection
