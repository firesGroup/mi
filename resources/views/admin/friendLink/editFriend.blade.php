<?php
/**
 * File Name: editFriend.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/27
 * Time: 19:07
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
            <header class="larry-personal-tit">
                <span>链接修改</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请根据需求修改</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            {{--            {{dd($data)}}--}}
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">修改</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="{{url('admin/friend/'.$data->id)}}" method="get">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">链接名称</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="link_name" required lay-verify="required"
                                                   placeholder="" autocomplete="off"
                                                   class="layui-input" value="{{$data->link_name}}">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <label class="layui-form-label">链接url</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="link_url" required lay-verify="required"
                                                   placeholder="" autocomplete="off"
                                                   class="layui-input" value="{{$data->link_url}}">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">

                                        <label class="layui-form-label">排序</label>

                                        <div class="layui-input-block">
                                            <input type="text" name="order" required lay-verify="required"
                                                   placeholder="" autocomplete="off"
                                                   class="layui-input" value="{{$data->order}}">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <label class="layui-form-label">链接logo</label>
                                        <div class="layui-input-block">
                                            <input type="file" name="link_logo"  class="layui-upload-file">

                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')
    @parent
    <script>
        layui.use(['form','upload','jquery'],function() {
            var $ = layui.jquery;
            var form = layui.form();

            function extra_data(input, data) {
                var item = [];
                $.each(data, function (k, v) {
                    item.push('<input type="hidden" name="' + k + '" value="' + v + '">');
                })
                $(input).after(item.join(''));
            }

            layui.upload({
                url: '{{url('admin/avator')}}',//上传接口
                before: function (input) {
                    {{--var data = {"id": "{{$data->id}}"};--}}
                    extra_data(input, data);
                }
                , title: '上传头像'
                , success: function (res) {
                    //上传成功后的回调
//                $("#upload").attr("src", res.src);
                    var cropBox = $("#cropbox");
                    cropBox.attr('src', res.src);
                    $('#photo').val(res.src);
//                    $('#upload-avatar').html('更换新头像');
                    $('#exampleModal').modal('show');
                    cropBox.Jcrop({
                        aspectRatio: 1,
                        onSelect: updateCoords,
                        setSelect: [120, 120, 10, 10]
                    });
                    $('.jcrop-holder img').attr('src', response.avatar);
                    function updateCoords(c) {
                        $('#x').val(c.x);
                        $('#y').val(c.y);
                        $('#w').val(c.w);
                        $('#h').val(c.h);
                    }

                    function checkCoords() {
                        if (parseInt($('#w').val())) return true;
                        alert('请选择图片.');
                        return false;
                    }
                }


            });
        });

        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
//            $('#button').on('click',function () {
//
//                alert(1);
//            });


        });
    </script>
@endsection