<?php
/**
 * File Name: add.blade.php
 * Description:添加广告
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/27 0027
 * Time: 下午 10:02
 */
?>

@extends('layouts.iframe')
@section('title', '添加广告')
@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>广告管理-添加广告</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请务必正确填写广告信息</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="layui-tab" lay-filter="tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">添加广告</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" method="post" action="{{url('admin/advert')}}">
                                    {{csrf_field()}}
                                    <div class="layui-form-item">
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">广告链接</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="advert_url" lay-verify="required"
                                                       placeholder="请输入广告链接" autocomplete="off" class="layui-input"
                                                       value="{{old('consumption')}}">
                                            </div>
                                        </div>

                                        <div class="layui-form-item">
                                            <label class="layui-form-label">广告位置</label>
                                            <div class="layui-input-block">
                                                <select name="ad_location" lay-verify="required">
                                                    <option value="">请选择广告位置</option>
                                                    @foreach($data as $v)
                                                        <option value="{{$v->id}}">{{$v->desc}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">广告描述</label>
                                            <div class="layui-input-block">
                                            <textarea type="text" name="ad_desc" lay-verify="required"
                                                      placeholder="请输入广告描述" autocomplete="off"
                                                      class="layui-input">{{old('avert_desc')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="layui-form-item" style="margin-left:15px">
                                            <label class="layui-form-label">上传广告图片</label>
                                            <input id="upload-input" type="text" class="layui-input layui-input-inline" name="advert_image" value="" style="width:520px;height:38px;margin:0px" placeholder="输入图片地址或点击上传">
                                            <input type="file" name="file" id="createUpload" class="layui-upload-file" accept="image/*"  lay-ext="jpg|png|gif|bmp" lay-title="点击或拖拽文传上传">
                                        </div>

                                        </div>
                                        <div class="layui-form-item">
                                            <div class="layui-input-block">
                                                <button class="layui-btn" lay-submit="" lay-filter="go"
                                                        id="submit">立即提交
                                                </button>
                                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <div class="p-images-list-box clearfix" id="p-images-list">
                            </div>
                        </div>
                        <div class="layui-tab-item">内容3</div>
                    </div>
                </div>
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


            //执行上传
            layui.upload({
                elem: '#createUpload', //文件input上传域 id
                method: 'post', //文件上传传输方式
                url: '{{ url('/upload') }}', //后台处理程序地址
                before: function (input) {
                    //上传前回调
                    $('input#createUpload').parent().append('<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="path" value="ad">');

                }
                , success: function (res) {
                    if (res.status == 0) {
                        layer.close(l);
                        layer.msg('上传成功',{
                            icon: 6,
                            time: 1000 //2秒关闭（如果不配置，默认是3秒）
                        });
                        $('input[name=advert_image]').val(res.src);
                    }else if( res == 1 ){
                        layer.close(l);
                        layer.msg('上传失败', {'time': 2000});
                    }
                }
            });



        } );
    </script>

@endsection
