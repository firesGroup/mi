<?php
/**
 * File Name: index.blade.php
 * Description: 轮播图信息展示
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/27
 * Time: 11:25
 */
?>

@extends('layouts.iframe')

@section('title','轮播图首页')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>轮播图-列表</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请将需要的加入到轮播图</li>
                        <li>主要填写正确的路径</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="btn-group">


                    <a href="{{url('admin/slideShow/create')}}" style="color:white">

                        <button class="layui-btn layui-btn-small">
                            <i class="layui-icon">&#xe608;</i>
                            新增轮播图
                        </button>
                    </a>

                    <button class="layui-btn layui-btn-small" id="refresh">
                        <i class="layui-icon">&#x1002;</i> 刷新本页
                    </button>
                </div>
                <br><br>

                <table class="layui-table larry-table-info">
                    <colgroup>
                        <col width="100">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>轮播图图片路径</th>
                        <th>轮播图url</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--{{dd($data)}}--}}
                    @foreach( $data as $show )
                        {{--{{dump($show->status)}}--}}
                        <tr>
                            <td id="id">{{ $show->id }}</td>
                            <td style="color:#1E9FFF; width:28%"><img src="{{ $show->images }}" width="400"></td>
                            <td style="width:28%">{{ $show->url }}</td>
                            <td style="width:15%">
                                <form class="layui-form"><input class="checkbox" type="checkbox" name="status" lay-skin="switch" lay-text="启用|禁用" {{$show->status === 0?'checked':''}}></form></td>
                            <td style="width:23%">
                                <div class="layui-btn-group">
                                    <a href="{{ url('admin/slideShow').'/'.$show->id."/edit" }}"
                                       class="layui-btn  layui-btn-small" data-alt="修改">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a id="delete" data-id="{{ $show->id }}" class="layui-btn  layui-btn-small"
                                       data-alt="删除">
                                        <i class="layui-icon">&#xe640;</i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="larry-table-page" style="text-align: center">
                    {{ $data->render() }}
                    共计({{$sum}})条
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/js/admin/base.js') }}"></script>
    <script>
        layui.use(['jquery', 'layer', 'form'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            var form = layui.form();
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
                        url: '{{ url('/admin/slideShow') }}' + '/' + id
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

            form.on('switch', function(data){
//                console.log(data.elem.checked);
               var status = data.elem.checked;

               if(status == true) {
                   status = 0;
               } else {
                   status = 1;
               }

               var id = $(this).parent().parent().parent().children('#id').text();
//               console.log(status);
                $.ajax({
                    url:"{{url('admin/showStatus')}}"
                    ,type:'get'
                    ,data:{'_token': '{{csrf_token()}}', 'Status':status, 'id': id}
                    ,success:function(data){
                    if (data == 0) {
                        layer.msg('启用成功', {icon: 6});
                    } else {
                            layer.msg('禁用成功', {icon: 6});
                    }
                },
                    dataType: 'json'
                });


            });
        });

    </script>
@endsection
