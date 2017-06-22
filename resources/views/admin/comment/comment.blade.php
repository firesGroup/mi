<?php
/**
 * File Name: comment.blade.php
 * Description:评价列表
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/22
 * Time: 9:19
 */
?>
{{--@extends('layouts.iframe')--}}

{{--@section('title','会员管理首页')--}}

{{--@section('css')--}}
    {{--@parent--}}
{{--@endsection--}}

{{--@section('content')--}}

{{--{{dump($data)}}--}}
<section class="larry-grid">
<header class="larry-personal-tit">
    <span style="font-size: 20;">商品评价管理-评价列表</span>
</header>
<div class="row" id="infoSwitch">
    <blockquote class="layui-elem-quote col-md-12 head-con">
        <div class="title">
            <i class="larry-icon larry-caozuo"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
        </div>
        <ul>
            <li>商品评价管理</li>
            <li>点击<i class="layui-icon">&#xe63a;</i> 查看内容详情</li>
        </ul>
        <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
    </blockquote>
</div>
<div class="larry-personal-body clearfix">
    <div class="btn-group">

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
            <th>用户ID</th>
            <th>评价内容</th>
            <th>商品</th>
            <th>显示</th>
            <th>评论优差</th>
            <th>评论时间</th>
            <th>ip地址</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>

        @foreach($data as $v)
        <tr>
            <td>{{$v->mid}}</td>
            <td width="20%">
            <div style="display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;overflow: hidden;">{{$v->content}}</div></td>
            <td>{{$v->pid}}</td>

            <td>
                @if($v->is_hide == 0)
                    <span class="layui-icon" style="color:#c2c2c2; font-size: 18px;">&#x1007;否</span>
                    @else
                    <span class="layui-icon" style="color:#5FB878;">&#xe618;是</span>
                @endif
            </td>
            <td>{{$v->star}}</td>
            <td>{{$v->created_at}}</td>
            <td>{{$v->ip}}</td>
            <td>
                <div class="layui-btn-group">

                    <a href="{{ url('admin/product').'/'.$v->id }}" class="layui-btn  layui-btn-small" data-alt="查看">
                        <i class="layui-icon" >&#xe63a;</i>
                    </a>

                    <a id="delete" data-id="{{ $v->id }}" class="layui-btn  layui-btn-small" data-alt="删除">
                        <i class="layui-icon">&#xe640;</i>
                    </a>

                </div>
            </td>
        </tr>
        @endforeach
        </tbody>


</table>
</div>
</section>



