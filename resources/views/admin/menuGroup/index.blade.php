<?php
/**
 * File Name: index.blade.php
 * Description: 商品模型列表页模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 10:52
 */
?>
@extends('layouts.iframe')

@section('title','菜单分组管理首页')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>菜单分组管理-首页</span>
            </header>
            <div class="larry-personal-body clearfix">
                <div class="btn-group">
                    <button class="layui-btn layui-btn-small" id="addgroup">
                        <i class="layui-icon">&#xe608;</i> 添加分组
                    </button>
                    <button class="layui-btn layui-btn-small" id="refresh">
                        <i class="layui-icon">&#x1002;</i> 刷新本页
                    </button>
                </div>
                <table class="layui-table larry-table-info">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>分组名称</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $groupList as $group )
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>{{ $group->menu_group_name }}</td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="{{ url('admin/menugroup').'/'.$group->id."/edit" }}"
                                       class="layui-btn  layui-btn-small" data-alt="修改">
                                        <i class="larry-icon larry-xiugai"></i>编辑
                                    </a>
                                    <a id="delete" data-id="{{ $group->id }}" class="layui-btn  layui-btn-small" data-alt="删除">
                                        <i class="larry-icon larry-huishouzhan1"></i>删除
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="height:70px;font-size:15px">
                                <i class="layui-icon" style="font-size: 30px; group: #FF5722;">&#xe60c;</i> 什么都没找到
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="larry-table-page">
                    {{ $groupList->render() }}
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
            //添加按钮点击
            $('button#addgroup').on('click', function(){
                layer.msg('正在加载!请稍后...', {
                    icon: 16
                });
                location.href='{{ url('/admin/menuGroup/create') }}';
            });
            $('button#refresh').on('click', function(){
                layer.msg('正在加载!请稍后...', {
                    icon: 16
                });
                location.href=location.href;
            });
            //删除模型按钮
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
                    ,title: '友情提醒'
                }, function(){
                    var id =  th.data('id');
                    var l = layer.msg('正在删除!请稍后...', {
                        icon: 16
                    });
                    $.ajax({
                        url:  "{{ url('/admin/menuGroup') }}/" + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '{{ csrf_token() }}' }
                        ,success:function (data) {
                            if( data != '' ){
                                layer.close(l);
                                if( data == 0 ){
                                    layer.msg('删除成功', {icon: 1,time:2000,end:function(){
                                        location.href=location.href;
                                    }});
                                }else if ( data == 1 ){
                                    layer.alert('删除失败!', {icon: 2, title:'提醒'});
                                }else if( data == 2 ){
                                    layer.alert('删除失败!该分组下有菜单!请先移除菜单!', {icon: 1,time:2000,yes:function(){
                                        location.href=location.href;
                                    }});
                                }else{
                                    layer.alert('服务器错误!', {icon: 2});
                                }
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
