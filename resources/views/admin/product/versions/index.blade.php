<?php
/**
 * File Name: index.blade.php
 * Description: 版本列表首页模版
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 23:09
 */
?>
@extends('layouts.iframe')

@section('title','商品版本管理首页')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品版本管理-首页</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>商品版本是购买商品时给用户选择的, 涉及到价格变动库存等, 例如:衣服的 颜色 尺寸 等</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="btn-group">
                    <button class="layui-btn layui-btn-small" id="addver">
                        <i class="layui-icon">&#xe608;</i> 添加版本
                    </button>
                    <button class="layui-btn layui-btn-small" id="refresh">
                        <i class="layui-icon">&#x1002;</i> 刷新本页
                    </button>
                </div>
                <div class="order">
                    <input type="hidden" name="search" value="true">
                    <input class="layui-input-inline" placeholder="搜索版本名称" name="word" value="{{ isset($word)?$word:"" }}">
                    <span class="layui-btn" id="search">
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
                        <th>版本编号</th>
                        <th>版本名称</th>
                        <th>版本规格</th>
                        <th>版本价格</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse( $verList as $ver )
                        <tr>
                            <td>{{ $ver->id }}</td>
                            <td>{{ $ver->ver_name }}</td>
                            <td>{{ $ver->ver_spec}}</td>
                            <td>{{ $ver->price }} 元</td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="{{ url('admin/product/versions').'/'.$ver->id."/edit" }}"
                                       class="layui-btn  layui-btn-small" data-alt="修改">
                                        <i class="larry-icon larry-xiugai"></i>编辑
                                    </a>
                                    <a id="delete" data-id="{{ $ver->id }}" class="layui-btn  layui-btn-small" data-alt="删除">
                                        <i class="larry-icon larry-huishouzhan1"></i>删除
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="height:70px;font-size:15px">
                                    <i class="layui-icon" style="font-size: 30px; color: #FF5722;">&#xe60c;</i> 什么都没找到
                                </td>
                            </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="larry-table-page">
                    @if( isset($word) )
                        {{ $verList->appends(['word'=>$word])->links() }}
                    @else
                        {{ $verList->links() }}
                    @endif
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
            //添加按钮点击
            global.aAdd('button#addver','{{ url('/admin/product/versions/create') }}/{{ $id }}');


            //删除模型按钮
            var url = "{{ url('/admin/product/versions') }}/";
            global.aDelete(
                '#delete',
                '警告',
                '确定要删除这个版本项吗?删除这个版本项会同时删除版本下所有版本项',
                '{{ csrf_token() }}',
                url
            );

            //版本搜索
            $('span#search').on('click', function(){
                location.href='{{ url('/admin/product/versions/'.$id) }}'+'?word='+ $('input[name=word]').val();
            });

        });
    </script>
@endsection

