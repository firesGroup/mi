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
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                    <tr>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $data as $v )
                        <tr>
                            <td>
                                <button class="layui-btn layui-btn-primary layui-btn-small" id="cate">
                                    <i class="layui-icon">&#xe654;</i>
                                </button>
                            </td>
                            <td>{{$v->id}}</td>
                            <td>{{$v->category_name}}</td>
                            <td>{{$v->parent_id}}</td>
                            <td>{{$v->parent_path}}</td>
                            <td>{{$v->sort}}</td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="{{ url('admin/category').'/'.$v->id }}" class="layui-btn"
                                       data-alt="查看">
                                        <i class="layui-icon">&#xe60b;</i>
                                    </a>
                                    <a href="{{ url('admin/category').'/'.$v->id."/edit" }}" class="layui-btn"
                                       data-alt="修改">
                                        <i class="layui-icon">&#xe642;</i>
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
        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            $('#cate').click( function () {
                console.log(123);
               $.ajax({
                   url:'category_cate',
                   type:'post',
                   data:{'_token':"{{csrf_token()}}"},
                   success: function (data)
                   {alert(data);

                   }

               });
            });
        });
    </script>
@endsection


