<?php
/**
 * File Name: addShow.blade.php
 * Description: 轮播图添加页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/27
 * Time: 17:18
 */
?>


@extends('layouts.iframe')

@section('title','轮播图添加')

@section('css')
    @parent
@endsection

@section('content')

    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>添加轮播图</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请正确填写轮播图图片路径,网址</li>
                        <li>请不要随意添加</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            {{--{{dd($data)}}--}}
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">轮播图</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="{{url('admin/slideShow')}}" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">轮播图图片路径</label>
                                        <div class="layui-input-block">
                                            <input type="file" name="image" class="layui-upload-file">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">轮播图网址</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="url" required lay-verify="required"
                                                   placeholder="请输入名称" autocomplete="off"
                                                   class="layui-input" value="{{old('url')}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">状态</label>
                                        <div class="layui-input-block">
                                            <input type="radio" name="status" value="0" title="启用" checked>
                                            <input type="radio" name="status" value="1" title="禁用">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
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
        </div>
    </section>
    <script>
        //Demo
        layui.use('form', function () {
            var form = layui.form();

            //监听提交
            form.on('submit(formDemo)', function (data) {
                layer.msg(JSON.stringify(data.field));
                return false;
            });

        });


    </script>
@endsection

@section('js')
    @parent
    <script>
        layui.use(['jquery', 'upload', 'form'], function () {
            var $ = layui.jquery,
            form = layui.form();

            layui.upload({
                url: "{{url('admin/slideImage')}}"
                ,success: function(res){
                    console.log(res); //上传成功返回值，必须为json格式
                }

            });

        });


    </script>
@endsection
