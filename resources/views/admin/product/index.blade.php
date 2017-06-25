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
                            <td>{{ $product->category_id }}</td>
                            <td>{{ $product->brand->brand_name }}</td>
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
                                    <a href="{{ url('admin/product').'/'.$product->id }}"
                                       class="layui-btn  layui-btn-small" alt="前台查看">
                                        <i class="larry-icon larry-chaxun"></i>
                                    </a>
                                    <a href="{{ url('admin/product').'/'.$product->id."/edit" }}"
                                       class="layui-btn  layui-btn-small"  alt="修改商品">
                                        <i class="larry-icon larry-xiugai1"></i>
                                    </a>
                                    <a id="delete" data-id="{{ $product->id }}" class="layui-btn  layui-btn-small" alt="删除商品" >
                                        <i class="larry-icon larry-huishouzhan"></i>
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
        layui.use(['jquery','layer','global'], function () {
            var $ = layui.jquery,
                global = layui.global,
                layer = layui.layer;
            var id = $('a#delete').data('id'),
                url = '{{ url('/admin/product') }}' + '/' + id;
            $('div.layui-btn-group').on('mouseover', 'a.layui-btn', function(){
                var alt = $(this).attr('alt'), t = this;
                layer.tips(alt, t, {
                    tips: [1, '#0FA6D8'] //还可配置颜色
                });
            }).on('mouseout','a.layui-btn',function(){
                layer.closeAll();
            } );
            global.aDelete('a#delete','友情提醒','确定要删除吗','{{ csrf_token() }}',url);
        });

    </script>
@endsection
