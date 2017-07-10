<?php
/**
 * File Name: index.blade.php
 * Description:  权限展示页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/26
 * Time: 9:16
 */
?>

{{--{{dd(1)}}--}}


@extends('layouts.iframe')

@section('title','权限首页')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>权限-列表</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请不要随意更改权限信息</li>
                        <li>按要求对权限增, 删, 改</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="btn-group">


                    <a href="{{url('admin/role/create')}}" style="color:white">

                        <button class="layui-btn layui-btn-small">
                            <i class="layui-icon">&#xe608;</i>
                            添加权限
                        </button>
                    </a>

                    <button class="layui-btn layui-btn-small" id="refresh">
                        <i class="layui-icon">&#x1002;</i> 刷新本页
                    </button>
                </div>
                <br><br>

                <table class="layui-table larry-table-info">
                    <colgroup>
                        <col width="100">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>权限名</th>
                        <th>权限路由别名</th>
                        <th>权限描述</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--{{dd($data)}}--}}
                    @foreach( $data as $role )
                        {{--{{dump($user)}}--}}
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td style="color:#1E9FFF">{{ $role->role_name }}</td>
                            <td>{{ $role->role }}</td>
                            <td>{{ $role->role_desc }}</td>
                            <td>{{ $status[$role->status] }}</td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="{{ url('admin/role').'/'.$role->id }}" class="layui-btn  layui-btn-small"
                                       data-alt="查看">
                                        <i class="layui-icon">&#xe60b;</i>
                                    </a>
                                    <a href="{{ url('admin/role').'/'.$role->id."/edit" }}"
                                       class="layui-btn  layui-btn-small" data-alt="修改">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a id="delete" data-id="{{ $role->id }}" class="layui-btn  layui-btn-small" data-alt="删除">
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
            $('button#refresh').on('click', function () {
                location.href = location.href;
            });

            //点击删除按钮
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
                        url:  '{{ url('/admin/role') }}/'+ id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '{{ csrf_token() }}' }
                        ,success:function (data) {
                            layer.close(l);
                            if( data == 0 ){
                                layer.alert('删除成功', {icon: 1});
                                t.remove();
                            }else if ( data == 1 ) {
                                layer.alert('删除失败!', {icon: 2});
                            }else{
                                layer.alert('服务器错误!', {icon: 2});
                            }
                        }
                    });

                }, function(Index){
                    layer.close(Index);
                });
            });
        });

    </script>
@endsection
