@extends('layouts.iframe')
@section('title', '广告位置')
    @section('css')
        @parent
    @endsection
@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>广告位置管理</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>广告位置信息</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>

            </div>

            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">广告位置信息</li>
                    </ul>
                </div>
            </div>
            <div class="btn-group clearfix">
                <button class="layui-btn layui-btn-small" id="refresh">
                    <i class="layui-icon">&#x1002;</i> 刷新本页
                </button>
                <button class="layui-btn layui-btn-small" id="refresh">
                    <a href="{{url('admin/advert_location/create')}}" style="color:white;"><i class="layui-icon" >&#xe654;</i> 添加位置</a>
                </button>

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
                        <th>广告Id</th>
                        <th>广告位置</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                        <th>操作</th>
                    </tr>
                    <tr>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $data as $v )
                        <tr id="tr">
                            <td>{{$v->id}}</td>
                            <td>{{$v->desc}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>{{$v->updated_at}}</td>
                            <td>
                                <a href="{{ url('admin/advert_location').'/'.$v->id."/edit" }}" class="layui-btn"
                                   data-alt="修改">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a id="delete" data-id="{{ $v->id }}" class="layui-btn" data-alt="删除">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>

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
        layui.use( ['layer','jquery'], function() {
            var $ = layui.jquery,
                layer = layui.layer;
            $('a#delete').on('click', function () {
                var th = $(this),
                    t = th.parent().parent('#tr');
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
                        url: '{{ url('/admin/advert_location') }}' + '/' + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '{{ csrf_token() }}'}
                        , success: function (data) {
//                                alert(data);
                            layer.close(l);
                            if (data == 1) {
                                layer.msg('删除成功', {icon: 1});
                                t.remove();
                            } else if (data == 0) {
                                layer.msg('数据不存在!', {icon: 2});
                            } else {
                                layer.msg('id错误!', {icon: 2});
                            }
                        }
                    });

                }, function (Index) {
                    layer.close(Index);
                });
            });
        });

    </script>
    @endsection