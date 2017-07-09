<?php
/**
 * File Name: order.blade.php
 * Description: 商品订单页模板
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/19
 * Time: 21:00
 */
?>

@extends('layouts.iframe')

@section('title','商品订单')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>商品订单管理</li>
                        <li>点击操作可查看订单详情</li>
                    </ul>
                </blockquote>
            </div>

            <header class="larry-personal-tit">

                <span style="font-size: 25px;">订单列表</span><span>(共计{{$sum}}条)</span>
                <button class="layui-btn layui-btn-radius layui-btn-primary" id="refresh">
                    <i class="layui-icon">&#x1002;</i> 刷新本页
                </button>

                {{--<div class="order">--}}
                    {{--<input class="layui-input-inline" placeholder="搜索关键词" name="search" value="{{ isset($word)?$word:''}}">--}}
                    {{--<span class="layui-btn" id="serach" onclick="search();" >--}}
                        {{--<i class="layui-icon">&#xe615;</i>搜索--}}
                    {{--</span>--}}
                {{--</div>--}}

            </header>

            <table class="layui-table larry-table-info">
                <tr>
                    <th>id</th>
                    <th>订单编号</th>
                    <th>用户</th>
                    <th>收货人</th>
                    <th>收货手机号</th>
                    <th>订单总价</th>
                    <th>下单时间</th>
                    <th>订单状态</th>
                    <th>创建时间</th>
                    <th>修改时间</th>
                    <th>操作</th>
                </tr>
                @foreach($data as $v)
                    <tr>
                        <td>{{$v->id}}</td>
                        <td>{{$v->order_sn}}</td>
                        <td>{{$v->member_id}}</td>
                        <td>{{$v->buy_user}}</td>
                        <td>{{$v->buy_phone}}</td>
                        <td>{{$v->total}}</td>
                        <td>{{$v->add_time}}</td>
                        <td>{{$status[$v->order_status]}}</td>
                        <td>{{$v->created_at}}</td>
                        <td>{{$v->updated_at}}</td>
                        <td>
                            <div class="layui-btn-group">
                                <a href="{{ url('admin/order/'.$v->id) }}" class="layui-btn  layui-btn-small"
                                   data-alt="查看">
                                    <i class="layui-icon">&#xe60b;</i>
                                </a>
                                @if ($v->order_status == 7 || $v->order_status == 8)
                                    <a id="delete" data-id="{{$v->id}}" class="layui-btn  layui-btn-small"
                                       data-alt="删除">
                                        <i class="layui-icon">&#xe640;</i>
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="larry-table-page">
                {{ $data->render() }}
            </div>
        </div>
    </section>

@endsection

@section('js')
    @parent
    <script>
        layui.use(['jquery', 'layer', 'elements'], function () {
            var $ = layui.jquery,
                layer = layui.layer,
                elements = layui.elements;
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
                        url: '{{ url('/admin/order') }}' + '/' + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '{{ csrf_token() }}'}
                        , success: function (data) {
//                            alert(data);
//                            layer.close(l);
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
            $('#refresh').click(function () {
                window.location.reload()
            });
        })

    </script>
@endsection




























