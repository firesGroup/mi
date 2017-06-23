<?php
/**
 * File Name: index.blade.php
 * Description:等级首页
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/21 0021
 * Time: 上午 10:21
 */
?>
@extends('layouts.iframe')
@section('title', '商城首页')
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
                        <li>会员等级管理， 不同会员等级可设置不同折扣</li>

                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="btn-group">
                    <button class="layui-btn layui-btn-small">
                        <a style="color:white" href="{{url('admin/level/create')}}"><i class="layui-icon">&#xe608;</i> 添加等级</a>
                    </button>
                    <button class="layui-btn layui-btn-small" id="refresh">
                        <i class="layui-icon">&#x1002;</i> 刷新本页
                    </button>
                </div>
                <table class="layui-table larry-table-info">
                    <colgroup>
                        <col width="100">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>会员名字</th>
                        <th>消费金额</th>
                        <th>折扣率</th>
                        <th>等级描述</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $data as $level )
                        <tr>
                            <td>{{ $level->id }}</td>
                            <td>{{ $level->level_name }}</td>
                            <td>{{ $level->consumption}}</td>
                            <td>{{ $level->discount}}</td>
                            <td>{{ $level-> level_deta}}</td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="{{ url('admin/level').'/'.$level->id."/edit" }}" class="layui-btn" data-alt="查看编辑">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a id="delete" data-id="{{ $level->id }}" class="layui-btn" data-alt="删除">
                                        <i class="layui-icon">&#xe640;</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
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
    <script>
        layui.use(['jquery','layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            var index;
            $('a.layui-btn').on('mouseover', function(){
                var alt = $(this).attr('data-alt');
                index = layer.tips(alt, $(this),{tips: [1, '#0FA6D8']});
            });
            $('a.layui-btn').on('mouseout',function(){
                layer.close(index);
            });
            $('a#delete').on('click', function(){
                var th = $(this),
                    t = th.parent().parent().parent('tr');
                layer.confirm('确定要删除吗?', {
                    btn: ['确定','取消'] //按钮
                    ,btnAlign: 'c'
                    ,shade: 0.8
                    ,id: 'MI_delTips' //设定一个id，防止重复弹出
                    ,moveType: 1 //拖拽模式，0或者1
                    ,resize: false
                }, function(){
                    var id =  th.data('id');
                    var l = layer.msg('正在加载请稍后...', {
                        icon: 6
                    });
                    $.ajax({
                        url:  '{{ url('/admin/level') }}' + '/' + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '{{ csrf_token() }}' }
                        ,success:function (data) {
//                            alert(data);
//                            layer.close(l);
                            if( data == 1 ){
                                layer.alert('删除成功', {icon: 1});
                                t.remove();
                            }else if ( data == 0 ){
                                layer.alert('数据不存在!', {icon: 2});
                            }else{
                                layer.alert('id错误!', {icon: 2});
                            }
                        }
                    });

                }, function(Index){
                    layer.close(Index);
                });
            });
            $('button#refresh').on('click', function(){
                location.href=location.href;
            });
        });

    </script>
@endsection
