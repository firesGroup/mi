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
@extends('layouts.iframe')

@section('title','商品评价')

@section('css')
    @parent
@endsection

@section('content')

    <section class="larry-grid">
        <header class="larry-personal-tit">
            <span style="font-size: 20PX;">商品评价管理-评价列表</span>
        </header>
        <div class="row" id="infoSwitch">
            <blockquote class="layui-elem-quote col-md-12 head-con">
                <div class="title">
                    <i class="larry-icon larry-caozuo"></i>
                    <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                </div>
                <ul>
                    <li>商品评价管理</li>
                    <li>点击<i class="layui-icon">&#xe63a;</i> 回复评论</li>
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
                    <th>评价表ID</th>
                    <th>评论优差</th>
                    <th>评价内容</th>
                    <th>商品</th>
                    <th>显示</th>
                    <th>评论时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
{{--{{dd($data )}}--}}
                @foreach($data as $k=>$v)
                    @if($v->member_id != 2)

                        <tr>
                        <td class="cid">{{$v->id}}</td>
                        <td>
                            @if($v->star == 5)
                                <span class="layui-icon"
                                      style="color:#FF5722;">&#xe600;&#xe600;&#xe600;&#xe600;&#xe600;</span>
                            @elseif($v->star == 4)
                                <span class="layui-icon" style="color:#FF5722;">&#xe600;&#xe600;&#xe600;&#xe600;</span>
                            @elseif($v->star == 3)
                                <span class="layui-icon" style="color:#FF5722;">&#xe600;&#xe600;&#xe600;</span>
                            @elseif($v->star == 2)
                                <span class="layui-icon" style="color:#FF5722;">&#xe600;&#xe600;</span>
                            @elseif($v->star == 1)
                                <span class="layui-icon" style="color:#FF5722;">&#xe600;</span>
                            @endif
                        </td>
                        <td width="20%">

                            <div style="display: -webkit-box;-webkit-box-orient: vertical;-webkit-line-clamp: 2;overflow: hidden;">{{$v->content}}</div>

                        </td>
                        <td>{{$v->p_id}}</td>

                        <td class="td">
                            @if($v->is_hide == 0)
                                <span id="span" class="layui-icon"
                                      style="color:#c2c2c2; font-size: 18px;">&#x1007;否</span>
                                <span class='hide' style='display: none;width: 100px;'>0</span>

                            @elseif($v->is_hide ==1)
                                <span id='span' class='layui-icon' style="color:#5FB878;">&#xe618;是</span>
                                <span class='hide' style='display: none;width: 100px;'>1</span>

                            @endif
                        </td>

                        <td>{{$v->created_at}}</td>
                        <td>
                            <div class="layui-btn-group">
                                {{csrf_token()}}
                                <a href="{{ url('admin/comment').'/'.$v->member_id }}" class="layui-btn  layui-btn-small"
                                   data-alt="回复">
                                    <i class="layui-icon">&#xe63a;</i>
                                </a>

                                <a id="delete" data-id="{{ $v->id }}" class="layui-btn  layui-btn-small" data-alt="删除">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>

                            </div>
                        </td>
                    </tr>
                    @endif

                @endforeach
                </tbody>


            </table>
        </div>
        <div class="larry-table-page" style="text-align: center;">
            {{ $data->render() }}
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
            //获取a标签当鼠标在上面时 显示信息
            $('a.layui-btn').on('mouseover', function () {

                //定义获取显示内容
                var alt = $(this).attr('data-alt');

                //定义弹起样式
                index = layer.tips(alt, $(this), {tips: [1, '#0FA6D8']});
            });

            //当鼠标移开 弹出的样式消失
            $('a.layui-btn').on('mouseout', function () {
                layer.close(index);
            });

            //点击删除,删除整个tr 同时AJAX请求控制器提交数据库删除
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
                        url: '{{ url('/admin/comment') }}' + '/' + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '{{ csrf_token() }}'}
                        , success: function (data) {
//                            alert(data);
                            layer.close(l);
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

            $('button#refresh').on('click', function () {
                location.href = location.href;
            });

//            $('td.td').

            $('td.td').on('click', function () {

                //获取点击的数值用于数据库修改改变值
                var id = $(this).children('.hide').text();
//
                //获取评价表id用于数据库查询条件
                var cid = $(this).parent().children('.cid').text();

                var spanf = "<span class='layui-icon' style='color:#c2c2c2; font-size: 18px;'>&#x1007;否</span>                                          <span class='hide' style='display: none;'>0</span>";

                var spany = "<span class='layui-icon' style='color:#5FB878;'>&#xe618;是</span>                                                           <span class='hide' style='display: none;'>1</span>";


                if (id == 0) {

                    $(this).html(spany);
                    //用于修改数据库值
                    nid = 1;

                } else if (id == 1) {

                    $(this).html(spanf);
                    nid = 0;
                }


                var url = '{{ url('admin/commentStatus') }}';

                $.ajax({
                    url: url,
                    type: 'get',
                    data: {'cid': cid, 'id': nid,'token':'{{csrf_token()}}'},//拼接发送要修改的显示的数值ID和评价表ID

                });
            });

        });


    </script>
@endsection



