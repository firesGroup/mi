<?php
/**
 * File Name: index.blade.php
 * Description:分类展示页
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/25 0025
 * Time: 下午 5:07
 */
?>

@extends("layouts.iframe")

@section('title', '分类首页')
@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>分类管理-修改等级</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>

                        <li>分类信息</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>

            </div>

            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">分类信息</li>
                    </ul>
                </div>
            </div>
            <div class="btn-group clearfix">
                <button class="layui-btn layui-btn-small" id="add_category">
                    <i class="layui-icon" style="color:white">&#xe608;</i> <a style="color:white"
                                                                              href="{{url('admin/category/create')}}">添加一级分类</a>
                </button>
                <span class="layui-btn layui-btn-small" id="refresh">
                    <i class="layui-icon">&#x1002;</i> 刷新本页
                </span>
            </div>
            <div style="float:right">
                <input class="layui-input clearfix" placeholder="搜索关键词" name="search"
                       value="{{ isset($word)?$word:'' }}"
                       style="width:400px;display:inline-block">
                <span class="layui-btn" id="search">
                    <i class="layui-icon">&#xe615;</i>搜索分类
                </span>
            </div>
            <div>
                <table class="layui-table" style="margin-top: 20px;">

                    <colgroup>
                        <col width="150">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th></th>
                        <th>分类Id</th>
                        <th>分类名称</th>
                        <th>父类id</th>
                        <th>父类路径</th>
                        <th>推荐</th>
                        <th>操作</th>
                    </tr>
                    <tr>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $data as $v )
                        <?php
                        $m = substr_count($v->parent_path, ',') - 1;
                        $nbsp = str_repeat("&nbsp;", $m * 10);
                        ?>
                        <tr>
                            <td>
                                <button class="layui-btn layui-btn-primary layui-btn-small" id="cate">
                                    <i class="layui-icon">&#xe654;</i>
                                </button>
                            </td>
                            <td>{{$v->id}}</td>
                            <td>
                                <div align=left>{{$nbsp}}|--{{$v->category_name}}</div>
                            </td>
                            <td>{{$v->parent_id}}</td>
                            <td>{{$v->parent_path}}</td>
                            <td>{{($v->status)==0?"推荐":"不推荐"}}</td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="{{ url('admin/category').'/'.$v->id."/edit" }}" class="layui-btn"
                                       data-alt="修改">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a href="{{ url('admin/create_category'.'/'.$v->id)}}" class="layui-btn"
                                       data-alt="添加子分类">
                                        <i class="layui-icon">&#xe608;</i>
                                    </a>
                                    <a id="delete" data-id="{{ $v->id }}" class="layui-btn" data-alt="删除">
                                        <i class="layui-icon">&#xe640;</i>
                                    </a>

                                </div>
                            </td>
                            @endforeach
                        </tr>
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
        layui.use(['jquery', 'layer', 'global'], function () {
            var $ = layui.jquery,
                global = layui.global,
                layer = layui.layer;

            $('a.layui-btn').on('mouseover', function () {
                var alt = $(this).attr('data-alt');
                index = layer.tips(alt, $(this), {tips: [1, '#0FA6D8']});
            });
            $('a.layui-btn').on('mouseout', function () {
                layer.close(index);
            });

            $('table').on('click', 'a#delete', function () {
                var t = $(this);
                layer.confirm('是否删除', {
                    btn: ['确定', '取消'] //按钮
                    , btnAlign: 'c'
                    , shade: 0.8
                    , id: 'MI_delTips' //设定一个id，防止重复弹出
                    , moveType: 1 //拖拽模式，0或者1
                    , resize: false
                    , title: '提示'
                    , anim: Math.ceil(Math.random() * 6)
                }, function () {
                    var l = layer.msg('正在删除!请稍后...', {
                        icon: 16
                    });
                    var id = t.data('id');
                    $.ajax({
                        url: "{{url('/admin/category')}}/" + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': "{{csrf_token()}}"}
                        , success: function (data) {
                            if (data != '') {
                                layer.close(l);
                                if (data == 0) {
                                    layer.alert('删除成功', {
                                        icon: 1, time: 2000, yes: function () {
                                            location.href = location.href;
                                        }
                                    });
                                } else if (data == 1) {
                                    layer.alert('删除失败!', {icon: 2});
                                } else if (data == 2) {
                                    layer.alert('删除错误!该分类下有子分类!不能删除', {icon: 2});
                                } else if (data == 3) {
                                    layer.alert('删除错误!该分类下商品!不能删除', {icon: 2});
                                }
                            } else {
                                layer.alert('服务器错误!', {icon: 2});
                            }
                        }
                    });
                }, function (Index) {
                    layer.close(Index);
                });
            });

            $('span#search').on('click', function () {

                location.href = '{{ url('/admin/category?search=oneSelect') }}' + '&word=' + $('input[name=search]').val();
            });

            $('#refresh').click(function () {
                window.location.reload()
            });

        });


    </script>
@endsection


