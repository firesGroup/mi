<?php
/**
 * File Name: index.blade.php
 * Description: 权限组首页
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/22
 * Time: 15:56
 */
?>
{{--{{dd($data)}}--}}
@extends('layouts.iframe')

@section('title','权限组首页')

@section('css')
    @parent
@endsection

@section('content')

    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>管理员-列表</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请不要随意更改权限组信息</li>
                        <li>按需求给组添加权限</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="btn-group">


                    <a href="{{url('admin/group/create')}}" style="color:white">

                        <button class="layui-btn layui-btn-small">
                            <i class="layui-icon">&#xe608;</i>
                            添加权限组
                        </button>
                    </a>

                    <button class="layui-btn layui-btn-small" id="refresh">
                        <i class="layui-icon">&#x1002;</i> 刷新本页
                    </button>
                </div>
                <br><br>

                <table class="layui-table larry-table-info">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>所属组名称</th>
                        <th>所属组状态</th>
                        <th>所属组权限名</th>
                        <th>所属组描述</th>
                        <th style="width:270px">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--{{dd($data)}}--}}
                    @foreach( $data as $group )
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td style="color:#1E9FFF">{{ $group->group_name }}</td>
                            <td>{{ $status[$group->status] }}</td>
                            <td>

                                {{--{{ explode(',', $group->role_list) }}--}}

                                <?php

                                    $rolename = "";

                                    $id = explode(',', $group->role_list);
//                                    dump($id);
                                    foreach ($id as $v){
//                                        dump($v);
                                        $rolename .= $arr[$v] . ',';

                                    }
                                    echo rtrim($rolename, ',');
                                ?>

                            </td>
                            <td>{{ $group->group_desc }}</td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="{{ url('admin/group').'/'.$group->id }}" class="layui-btn  layui-btn-small"
                                       data-alt="查看">
                                        <i class="layui-icon">&#xe60b;</i>
                                    </a>
                                    <a href="{{ url('admin/group').'/'.$group->id."/edit" }}"
                                       class="layui-btn  layui-btn-small" data-alt="修改">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a id="delete" data-id="{{ $group->id }}" class="layui-btn  layui-btn-small"
                                       data-alt="删除">
                                        <i class="layui-icon">&#xe640;</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="larry-table-page" style="text-align: center">
                    {{ $data->render() }}
                    共计({{$sum}})条
                </div>
            </div>

        </div>
    </section>

@endsection

@section('js')
    @parent
    <script>
        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            var index;
            $('a.layui-btn').on('mouseover', function () {
                var alt = $(this).attr('data-alt');
                index = layer.tips(alt, $(this), {tips: [1, '#0FA6D8']});
            });
            $('a.layui-btn').on('mouseout', function () {
                layer.close(index);
            });
            $('a#delete').on('click', function () {
                var th = $(this),
                    t = th.parent().parent().parent('tr');
                layer.confirm('确定要删除吗?', {
                    btn: ['确定', '取消'] //按钮
                    , btnAlign: 'c'
                    , shade: 0.8
                    , id: 'MI_delTips' //设定一个id，防止重复弹出
                    , moveType: 1 //拖拽模式，0或者1
                    , resize: false
                }, function () {
                    var id = th.data('id');
                    var l = layer.msg('正在加载请稍后...', {
                        icon: 6
                    });
                    $.ajax({
                        url: '{{ url('/admin/group') }}' + '/' + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '{{ csrf_token() }}'}
                        , success: function (data) {
//                            alert(data);
                            layer.close(l);
                            if (data == 1) {
                                layer.alert('删除成功', {icon: 1});
                                t.remove();
                            } else if (data == 0) {
                                layer.alert('数据不存在!', {icon: 2});
                            } else {
                                layer.alert('id错误!', {icon: 2});
                            }
                        }
                    });

                }, function (Index) {
                    layer.close(Index);
                });
            });
            $('button#refresh').on('click', function () {
                location.href = location.href;
            });
        });

    </script>
@endsection