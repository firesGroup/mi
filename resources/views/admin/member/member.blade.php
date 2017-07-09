<?php
/**
 * File Name: member.blade.php
 * Description:会员列表
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/19 0019
 * Time: 下午 7:38
 */
?>
@extends('layouts.iframe')

@section('title','会员管理首页')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>会员管理-会员首页</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>会员信息</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>

            </div>

            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">会员信息</li>
                    </ul>
                </div>
            </div>
            <div class="btn-group clearfix">
                <button class="layui-btn layui-btn-small" id="refresh">
                    <i class="layui-icon">&#x1002;</i> 刷新本页
                </button>

            </div>
            <div>
                <table class="layui-table" style="margin-top: 20px;">

                    <colgroup>
                        <col width="150">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>会员Id</th>
                        <th>加入时间</th>
                        <th>会员昵称</th>
                        <th>会员邮箱</th>
                        <th>会员电话</th>
                        <th>会员状态</th>
                        <th>最后登陆IP</th>
                        <th>操作</th>
                    </tr>
                    <tr>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $data as $v )
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>{{$v->nick_name}}</td>
                            <td>{{$v->email}}</td>
                            <td>{{$v->phone}}</td>
                            <td>{{$state[$v->status]}}</td>
                            <td>{{$v->last_ip}}</td>

                            <td>
                                <div class="layui-btn-group">
                                    <a href="{{ url('admin/member').'/'.$v->id }}" class="layui-btn"
                                       data-alt="查看">
                                        <i class="layui-icon">&#xe60b;</i>
                                    </a>
                                    <a href="{{ url('admin/member').'/'.$v->id."/edit" }}" class="layui-btn"
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
    </section>
@endsection

@section('js')
    @parent

    @if(session('success') == 1)
        <script>
            layui.use('layer', function () {
                var layer = layui.layer;
                layer.msg('删除成功');
            });
            @endif
        </script>
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
                            url: '{{ url('/admin/member') }}' + '/' + id
                            , type: "POST"
                            , data: {'_method': 'DELETE', '_token': '{{ csrf_token() }}'}
                            , success: function (data) {
//                                alert(data);
                                layer.close(l);
                                if (data == 1) {
                                    layer.msg('删除成功', {icon: 1});
                                    t.remove();
                                } else if (data == 0) {
                                    layer.msg('数据不存在!', {icon: 2});
                                } else {
                                    layer.msg('id错误!', {icon: 2});
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
            })
        </script>

@endsection
