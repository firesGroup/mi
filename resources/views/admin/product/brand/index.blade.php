<?php
/**
 * File Name: index.blade.php
 * Description: 商品品牌管理首页模版
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/25
 * Time: 14:26
 */
?>
@extends('layouts.iframe')

@section('title','商品品牌管理首页')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品品牌管理-首页</span>
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
                <div class="btn-group">
                    <button class="layui-btn layui-btn-small" id="addbrand">
                        <i class="layui-icon">&#xe608;</i> 添加品牌
                    </button>
                    <button class="layui-btn layui-btn-small" id="refresh">
                        <i class="layui-icon">&#x1002;</i> 刷新本页
                    </button>
                </div>
                <div class="order">
                    <select name="category">
                        <option value="0">所有分类</option>
                    </select>
                    <input class="layui-input-inline" placeholder="搜索关键词" name="search" value="">
                    <span class="layui-btn">
                        <i class="layui-icon">&#xe615;</i>搜索
                    </span>
                </div>
                <table class="layui-table larry-table-info">
                    <colgroup>
                        <col width="100">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>品牌名称</th>
                        <th>Logo</th>
                        <th>品牌分类</th>
                        <th>是否推荐</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $brandList as $brand )
                        <tr>
                            <td>{{ $brand->brand_name }}</td>
                            <td><img src="{{ $brand->brand_logo }}"></td>

                            <td>{{$brand->category_id}}</td>
                            @if( $brand->is_hot == 0 )
                                <td>推荐</td>
                            @elseif( $brand->is_hot == 1 )
                                <td>不推荐</td>
                            @endif
                            <td>{{ $brand->sort }}</td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="{{ url('admin/product/brand').'/'.$brand->id."/edit" }}"
                                       class="layui-btn  layui-btn-small" data-alt="修改品牌信息">
                                        <i class="larry-icon larry-xiugai"></i>编辑
                                    </a>
                                    <a id="delete" data-id="{{ $brand->id }}" class="layui-btn  layui-btn-small" data-alt="删除">
                                        <i class="larry-icon larry-huishouzhan1"></i>删除
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="larry-table-page">
                    {{ $brandList->render() }}
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
            $('button#addbrand').on('click', function(){
                layer.msg('正在加载!请稍后...', {
                    icon: 16
                });
                location.href='{{ url('/admin/product/brand/create') }}';
            });
            $('button#refresh').on('click', function(){
                layer.msg('正在加载!请稍后...', {
                    icon: 16
                });
                location.href=location.href;
            });
            //删除品牌按钮
            $('a#delete').on('click', function(){
                var th = $(this),
                    t = th.parent().parent().parent('tr');
                layer.confirm('确定要删除该品牌吗?', {
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
                        url:  "{{ url('/admin/product/brand') }}/" + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '{{ csrf_token() }}' }
                        ,success:function (data) {
                            if( data != '' ){
                                layer.close(l);
                                if( data == 0 ){
                                    layer.msg('删除成功', {icon: 1,time:2000},function(){
                                        location.href=location.href;
                                    });
                                }else if ( data == 1 ){
                                    layer.alert('删除失败!', {icon: 2, title:'提醒'});
                                }else if( data == 2 ){
                                    layer.alert('删除失败!品牌下存在规格和属性!', {icon: 2, title:'提醒' });
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

