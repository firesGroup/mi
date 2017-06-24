<?php
/**
 * File Name: edit.blade.php
 * Description: 规格详情修改页
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/24
 * Time: 19:02
 */
?>
@extends('layouts.iframe')

@section('title','商品规格管理-修改')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品规格管理-修改规格</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>商品规格是购买商品时给用户选择的, 涉及到价格变动库存等, 例如:衣服的 颜色 尺寸 等</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="form-body">
                    <form class="layui-form" method="post" id="spec">
                        {{ csrf_field() }}
                        <div class="layui-form-item">
                            <label class="layui-form-label">规格名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="spec_name" lay-verify="required" placeholder="请输入规格名称" autocomplete="off" class="layui-input" value="{{$info->spec_name}}">
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
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">规格项</label>
                            <div class="layui-input-block">
                                <textarea name="spec_item" placeholder="请输入规格项" class="layui-textarea" lay-verify="required">{{ $info->spec_item }}</textarea>
                                <span class="textarea-tips">注:多个规格项请用","逗号分隔</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="editSpec">修改</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                <a class="layui-btn layui-btn-primary" href="{{ url('/admin/product/spec') }}">返回</a>
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
            var loadFormData = $('form#spec').serialize();
            //表单提交监听
            form.on('submit(editSpec)', function(data){
                var submitFormData = $('form#spec').serialize();
                if( submitFormData == loadFormData ){
                    layer.msg('您什么都没修改呀!', {'icon':3, 'time':2000,anim: Math.ceil(Math.random() * 6)});
                }else{
                    var index = layer.msg('正在修改信息!请稍后...', {
                        icon: 16
                    });
                    $.ajax({
                        url:'{{ url('/admin/product/spec').'/'.$info->id }}',
                        type: 'put',
                        data: data.field,
                        success: function(res){
                            if( res == 0 ){
                                layer.msg('修改成功!', {'icon':6, 'time':1000,end:function(){
                                    layer.close(index);
                                    location.href ='{{ url('/admin/product/spec')}}';
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

