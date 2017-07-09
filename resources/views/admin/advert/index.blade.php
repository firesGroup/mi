<?php
/**
 * File Name: index.blade.php
 * Description:广告首页
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/27 0027
 * Time: 下午 8:55
 */
?>

@extends('layouts.iframe')
@section('title', '广告首页')
@section('css')
    @parent
@endsection

@section('content')

    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>等级管理-列表</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>广告管理</li>
                        <li>状态默认开启</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">

                <a style="color:white" href="{{url('admin/advert/create')}}">
                    <button class="layui-btn layui-btn-small"><i class="layui-icon">&#xe608;</i>
                        添加广告
                    </button>
                </a>

                <button class="layui-btn layui-btn-small" id="refresh">
                    <i class="layui-icon">&#x1002;</i> 刷新本页
                </button>
                <div>
                    <table class="layui-table" style="margin-top: 20px;">

                        <colgroup>
                            <col width="150">
                            <col width="200">
                            <col>
                        </colgroup>
                        <thead>
                        <tr>
                            <th>广告Id</th>
                            <th>广告图片</th>
                            <th>广告url</th>
                            <th>广告位置</th>
                            <th>广告状态</th>
                            <th>广告描述</th>
                            <th>操作</th>
                        </tr>
                        <tr>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $data as $v )
                            <tr>
                                <td id="id">{{$v->id}}</td>
                                <td><img src="{{$v->advert_image}}" width="100"></td>
                                <td>{{$v->advert_url}}</td>
                                <td>{{$array[$v->ad_location]}}</td>
                                <td>
                                    <form class="layui-form" action="" text-align="center">
                                        <input type="checkbox" name="open" lay-skin="switch"
                                               lay-filter="switchTest" lay-text="开启|禁用"
                                               {{$v->status===0?'checked':''}}>
                                    </form>
                                </td>
                                <td>{{$v->ad_desc}}</td>
                                <td>
                                    <div class="layui-btn-group">
                                        <a href="{{ url('admin/advert').'/'.$v->id."/edit" }}" class="layui-btn"
                                           data-alt="修改">
                                            <i class="layui-icon">&#xe642;</i>
                                        </a>
                                        <a id="delete" data-id="{{ $v->id }}" class="layui-btn" data-alt="删除">
                                            <i class="layui-icon">&#xe640;</i>
                                        </a>

                                    </div>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class="larry-table-page" style="text-align:center">
                        {{ $data->render() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    @parent
    <script>
        layui.use(['jquery', 'layer', 'form', 'global'], function () {
            var $ = layui.jquery,
                form = layui.form(),
                global = layui.global,
                layer = layui.layer;

            var index;
            $('a.layui-btn').on('mouseover', function () {
                var alt = $(this).attr('data-alt');
                index = layer.tips(alt, $(this), {tips: [1, '#0FA6D8']});
            });
            $('a.layui-btn').on('mouseout', function () {
                layer.close(index);
            });
            form.on('switch', function (data) {
//                console.log(data.elem.checked);
                var status = data.elem.checked;

                if (status == true) {
                    status = 0;
                } else {
                    status = 1;
                }

                var id = $(this).parent().parent().parent().children('#id').text();
                console.log(status);
                $.ajax({
                    url: "{{url('admin/showStatus')}}"
                    , type: 'get'
                    , data: {'_token': '{{csrf_token()}}', 'Status': status, 'id': id}
                    , success: function (data) {
                        if (data == 0) {
                            layer.msg('启用成功', {icon: 6});
                        } else {
                            layer.msg('禁用成功', {icon: 6});
                        }
                    },
                    dataType: 'json'
                });
            });


        global.aDelete('#delete', '删除', '确认删除', '{{csrf_token()}}', '{{url("admin/advert").'/'}}')

        });
    </script>
@endsection
