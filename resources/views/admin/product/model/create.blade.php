<?php
/**
 * File Name: create.blade.php
 * Description: 商品模型添加页面模版
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 11:21
 */
?>
@extends('layouts.iframe')

@section('title','商品模型管理首页')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品模型管理-添加模型</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>商品模型是用来规定某一类商品共有规格和属性的集合，其中规格会影响商品价格同一个商品不同的规格价格会不同，<br>而属性仅仅是商品的属性特质展示</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="form-body">
                    <form class="layui-form" method="post" id="model">
                        {{ csrf_field() }}
                        <div class="layui-form-item">
                            <label class="layui-form-label">模型名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="name" lay-verify="required" placeholder="请输入模型名称" autocomplete="off" class="layui-input" value="">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="addModel">立即提交</button>
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

            form.on('submit(addModel)',function(data){
                var index = layer.msg('正在加载!请稍后...', {
                    icon: 16
                });
                $.ajax({
                    url:'{{ url('admin/product_model') }}',
                    type: 'POST',
                    data: data.field,
                    success:function(res){
                        layer.close(index);
                        if( res == 0 ){
                            layer.msg('添加成功', {icon:6, time:1000, end:function(){
                                location.href= '{{ url('/admin/product_model') }}';
                            }});
                        }else{
                            layer.msg('添加失败', {icon:2, time:2000, end:function(){
                                location.href= '{{ url('/admin/product_model/create') }}';
                            }});
                        }
                    }
                });
                return false;
            });

        } );
    </script>
@endsection
