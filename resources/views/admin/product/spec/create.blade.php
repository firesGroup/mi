<?php
/**
 * File Name: create.blade.php
 * Description: 商品规格添加页面模版
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 23:34
 */
?>
@extends('layouts.iframe')

@section('title','商品规格管理-添加')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品规格管理-添加规格</span>
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
                    <form class="layui-form" method="post" id="model">
                        {{ csrf_field() }}
                        <div class="layui-form-item">
                            <label class="layui-form-label">规格名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="spec_name" lay-verify="required" placeholder="请输入规格名称" autocomplete="off" class="layui-input" value="">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">所属</label>
                            <div class="layui-input-block">
                                <select name="model_id" lay-verify="required">
                                    <option value="">请选择模型</option>
                                    @foreach( $modelList as $m )
                                            <option value="{{ $m->id }}">{{ $m->model_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">规格项</label>
                            <div class="layui-input-block">
                                <textarea name="spec_item" placeholder="请输入规格项" class="layui-textarea"></textarea>
                                <span class="textarea-tips">注:多个规格项请用","逗号分隔</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="addspec">立即提交</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
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

            form.on('submit(addspec)',function(data){
                var index = layer.msg('正在加载!请稍后...', {
                    icon: 16
                });
                $.ajax({
                    url:'{{ url('admin/product/spec') }}',
                    type: 'POST',
                    data: data.field,
                    success:function(res){
                        layer.close(index);
                        if( res == 0 ){
                            layer.msg('添加成功', {icon:6, time:1000, end:function(){
                                location.href= '{{ url('/admin/product/spec') }}';
                            }});
                        }else if( res == 2){
                            layer.msg('添加失败!请输入规格项!', {icon:2, time:2000, end:function(){
                                location.href= '{{ url('/admin/product/spec/create') }}';
                            }});
                        }else if(res == 3){
                            layer.msg('数据写入失败!', {icon:2, time:2000, end:function(){
                                location.href= '{{ url('/admin/product/spec/create') }}';
                            }});
                        }else{
                            layer.msg('添加失败', {icon:2, time:2000, end:function(){
                                location.href= '{{ url('/admin/product/spec/create') }}';
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
