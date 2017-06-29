<?php
/**
 * File Name: edit.blade.php
 * Description: 轮播图修改
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/27
 * Time: 16:23
 */
?>

@extends('layouts.iframe')

@section('title','轮播图修改页')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>轮播图-修改信息</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请根据需求修改轮播图</li>
                        <li>修改轮播图状态请到轮播图首页修改</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
                        {{--{{dd($data)}}--}}
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">轮播图信息</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="{{url('admin/slideShow/'.$data->id)}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">轮播图图片路径</label>
                                        <div class="layui-input-block">
                                            <input id="upload-input" type="text" class="layui-input layui-input-inline" name="images" value="{{$data->images}}" style="width:520px;height:38px;margin:0px" placeholder="输入图片地址或点击上传">
                                            <input type="file" name="file" id="createUpload" class="layui-upload-file" accept="image/*"  lay-ext="jpg|png|gif|bmp" lay-title="点击或拖拽文传上传">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">轮播图网址</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="url" required lay-verify="required"
                                                   placeholder="" autocomplete="off"
                                                   class="layui-input" value="{{$data->url}}">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
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
        {{--{{dump($role_list)}}--}}
        {{--@if(in_array(3, $role_list))--}}
        {{--{{dump(1)}}--}}
        {{--@else--}}
        {{--{{dump(2)}}--}}
        {{--@endif--}}

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
                    $('input#createUpload').parent().append('<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="path" value="slideShow">');
                    l = layer.msg('正在上传 请稍后...', {icon: 6});
                }
                , success: function (res) {
                    if (res.status == 0) {
                        layer.close(l);
                        layer.msg('上传成功',{
                            icon: 6,
                            time: 1000 //2秒关闭（如果不配置，默认是3秒）
                        });
                        $('input[name=images]').val(res.src);
                    }else if( res == 1 ){
                        layer.close(l);
                        layer.msg('上传失败', {'time': 2000});
                    }
                }
            });



        } );

    </script>

@endsection
