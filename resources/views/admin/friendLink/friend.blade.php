<?php
/**
 * File Name: friend.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/27
 * Time: 16:29
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
                        <li>友情链接管理</li>

                    </ul>
                </blockquote>
            </div>

            <header class="larry-personal-tit">

                <span style="font-size: 25px;">友情链接</span>

                {{--<button class="layui-btn layui-btn-radius layui-btn-primary" id="refresh">--}}

                    {{--<i class="layui-icon">&#x1002;</i> 刷新本页--}}
                {{--</button>--}}

                <button class="layui-btn layui-btn-radius layui-btn-primary" id="refresh">

                    <a href="{{url('admin/friend/create')}}"><i class="layui-icon">&#xe654;</i>添加</a>
                </button>

                <div class="order">

                    </select>
                    <input class="layui-input-inline" placeholder="搜索关键词" name="search" value="">
                    <span class="layui-btn">
                                    <i class="layui-icon">&#xe615;</i>搜索
                                </span>
                </div>

            </header>

            <table class="layui-table larry-table-info">
                <tr>
                    <th>id</th>
                    <th>链接名称</th>
                    <th>链接地址</th>
                    <th>Logo链接</th>
                    <th>排序</th>
                    <th>显示</th>
                    <th>操作</th>
                </tr>

                @foreach($data as $v)
                    <tr>
                        <td class="cid">{{$v->id}}</td>
                        <td>{{$v->link_name}}</td>
                        <td>{{$v->link_url}}</td>
                        <td>{{$v->link_logo}}</td>
                        <td>{{$v->order}}</td>
                        <td class="td">
                            <form action="" class="layui-form">
                                <input type="checkbox" name="hide" lay-skin="switch" lay-text="开启|关闭" {{$v->hide===0?'checked':''}}>
                            </form>
                            </td>
                        <td>
                            <div class="layui-btn-group">


                                <a href="{{ url('admin/friend').'/'.$v->id.'/edit' }}"
                                       class="layui-btn  layui-btn-small"
                                       data-alt="修改">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>

                                <a id="delete" data-id="{{ $v->id }}" class="layui-btn  layui-btn-small" data-alt="删除">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>


        </div>
    </section>
    <div class="larry-table-page" style="text-align: center;">
        {{ $data->render() }}
    </div>
@endsection

@section('js')
    @parent
    <script>
        layui.use(['jquery', 'layer','form'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            form = layui.form();
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
                        url: '{{ url('/admin/friend') }}' + '/' + id
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

            $('button#refresh').on('click', function () {
                location.href = location.href;
            });

            form.on('switch', function(data){
//                console.log(data.elem.checked);
            var id = $(this).parent().parent().parent().children('.cid').text();
//            console.log(id);
                var status = data.elem.checked;

                if(status == true){
                    status = 0;
                } else {
                    status = 1;
                }

                $.ajax({
                    url:"{{url('admin/friendStatus')}}",
                    type:'get',
                    data:{'_token':'{{csrf_token()}}','status':status,'id':id},
                    success:function (data) {

                            if(data == 0) {

                                layer.msg('启用成功',{icon:6});
                            } else {

                                layer.msg('禁用成功',{icon:6});

                            }
                    },
                    dataType:'json'
                });
            });

        });

    </script>
@endsection
