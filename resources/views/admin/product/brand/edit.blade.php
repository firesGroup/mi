<?php
/**
 * File Name: edit.blade.php
 * Description: 商品品牌信息修改页模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/25
 * Time: 14:56
 */
?>
@extends('layouts.iframe')

@section('title','商品品牌管理-修改品牌')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品品牌管理-修改品牌</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>同一个品牌可以添加多次.</li>
                        <li>比如卖笔记本下面一个苹果品牌,卖手机下面也有苹果牌,卖箱包下面也有苹果牌.</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="form-body">
                    <form class="layui-form" action="{{ url('admin/product/brand/'.$brand->id) }}" method="post" id="brand">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="layui-form-item">
                            <label class="layui-form-label">品牌名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="brand_name" lay-verify="required" placeholder="请输入品牌名称" autocomplete="off" class="layui-input" value="{{ $brand->brand_name }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">品牌网址</label>
                            <div class="layui-input-block">
                                <input type="text" name="brand_url" lay-verify="required" placeholder="请输入以 http 或 https 开头的网址" autocomplete="off" class="layui-input" value="{{ $brand->brand_url }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">商品分类(暂时)</label>
                            <div class="layui-input-block">
                                <div class="layui-input-inline">
                                    <select >
                                        <option value="">请选择商品分类</option>
                                        <option value="你的工号">江西省</option>
                                        <option value="你最喜欢的老师">福建省</option>
                                    </select>
                                </div>
                                <div class="layui-input-inline">
                                    <select >
                                        <option value="">请选择商品分类</option>
                                        <option value="杭州">杭州</option>
                                        <option value="宁波" disabled="">宁波</option>
                                        <option value="温州">温州</option>
                                        <option value="温州">台州</option>
                                        <option value="温州">绍兴</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">品牌logo</label>
                            <div class="layui-input-block">
                                <input id="upload-input" type="text" class="layui-input layui-input-inline" name="brand_logo" value="{{ $brand->brand_logo }}" style="width:520px;height:38px;margin:0px" placeholder="输入图片地址或点击上传">
                                <span class="layui-btn" id="uploadImage"><i class="layui-icon"></i>上传商品封面图片</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">品牌描述</label>
                            <div class="layui-input-block">
                                <textarea type="text" name="brand_desc" lay-verify="required" placeholder="请输入品牌描述" autocomplete="off" class="layui-input">{{ $brand->brand_desc }}</textarea>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" type="submit" lay-submit="" lay-filter="editBrand">修改</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                <a class="layui-btn layui-btn-primary" href="{{ url('/admin/product/brand') }}">返回</a>
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
    <!--上传文件插件-->
    <script type="text/javascript" src="{{ asset('/js/public/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/public/uploadFile.js') }}"></script>
    <script>
        layui.use( ['jquery','layer','form'], function(){
            var $ = layui.jquery,
                layer = layui.layer,
                form = layui.form();

            //序列化表单值 用于判断是否被修改过
            var loadFormData = $('form#brand').serialize();
            form.on('submit(editBrand)',function(data){
                var submitFormData = $('form#brand').serialize();
                if( submitFormData == loadFormData ){
                    layer.msg('您什么都没修改呀!', {'icon':3, 'time':2000,anim: Math.ceil(Math.random() * 6)});
                }else {
                    var index = layer.msg('正在修改中!请稍后...', {
                        icon: 16
                    });
                    $.ajax({
                        url: '{{ url('admin/product/brand/'.$brand->id) }}',
                        type: 'PUT',
                        data: data.field,
                        dataType: 'json',
                        success: function (res) {
                            layer.close(index);
                            if (res == 0) {
                                layer.msg('修改成功', {
                                    icon: 6, time: 1000, end: function () {
                                        location.href = "{{ url('/admin/product/brand') }}";
                                    }
                                });
                            } else {
                                layer.msg('修改失败', {
                                    icon: 2, time: 2000, end: function () {
                                        location.href = "{{ url('/admin/product/brand') }}";
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


            var id = '{{ $brand->id }}';
            //上传
            $( '#uploadImage' ).on('click', function(){
                openUpload(id,'{{ $brand->brand_name }}', 'brand',"@admin@product@brand@changeLogo@"+ id, function(){
                    $.ajax({
                        url: "{{ url('/admin/product/brand/getLogo/'.$brand->id) }}",
                        type:"get",
                        success:function(data){
                            $('input#upload-input').val(data);
                        }
                    });
                });
            });
        } );
    </script>
@endsection


