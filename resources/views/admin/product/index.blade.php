<?php
/**
 * File Name: index.blade.php
 * Description: 商品列表页模版
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/19
 * Time: 16:09
 */
?>
@extends('layouts.iframe')

@section('title','商品管理首页')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品管理-列表</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                        <div class="title">
                            <i class="larry-icon larry-caozuo"></i>
                            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                        </div>
                        <ul>
                            <li>商品管理注意发布商品后清理缓存.</li>
                            <li>商品缩列图也有缓存.</li>
                        </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                    <div class="btn-group">
                        <button class="layui-btn layui-btn-small">
                            <i class="layui-icon">&#xe608;</i> 添加商品
                        </button>
                        <button class="layui-btn layui-btn-small" id="refresh">
                            <i class="layui-icon">&#x1002;</i> 刷新本页
                        </button>
                    </div>
                    <div class="order">
                        <select name="category">
                            <option value="0">所有分类</option>
                        </select>
                        <select name="brand">
                            <option value="0">所有品牌</option>
                        </select>
                        <select name="sort_price">
                            <option value="0">默认排序</option>
                            <option value="1">按价格由高到低</option>
                            <option value="2">按价格由低到高</option>
                        </select>
                        <input class="layui-input-inline" placeholder="搜索关键词" name="search" value="">
                        <span class="layui-btn" >
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
                        <th>ID</th>
                        <th>商品名称</th>
                        <th>所属分类</th>
                        <th>品牌</th>
                        <th>市场价</th>
                        <th>商城价</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $productList as $product )
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->p_name }}</td>
                        <td>{{ $product->cid }}</td>
                        <td>{{ $product->bid }}</td>
                        <td>{{ $product->market_price }}元</td>
                        <td>{{ $product->price }}元</td>
                        <td>
                            @if( $product->status == 0 )
                                在售
                            @elseif( $product->status == 1 )
                                下架
                            @elseif( $product->status == 2 )
                                预购
                            @elseif( $product->status == 3 )
                                缺货
                            @elseif( $product->status == 4 )
                                新品上市
                            @endif
                        </td>
                        <td>
                            <div class="layui-btn-group">
                                <a href="{{ url('admin/product').'/'.$product->id }}" class="layui-btn  layui-btn-small" data-alt="查看">
                                    <i class="layui-icon" >&#xe60b;</i>
                                </a>
                                <a href="{{ url('admin/product').'/'.$product->id."/edit" }}" class="layui-btn  layui-btn-small" data-alt="修改">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a id="delete" data-id="{{ $product->id }}" class="layui-btn  layui-btn-small" data-alt="删除">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="larry-table-page">
                    {{ $productList->render() }}
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
                        url:  '{{ url('/admin/product') }}' + '/' + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '{{ csrf_token() }}' }
                        ,success:function (data) {
                            alert(data);
                            layer.close(l);
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
