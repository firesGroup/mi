<?php
/**
 * File Name: editGroup.blade.php
 * Description: 权限组修改页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/23
 * Time: 15:22
 */
?>

@extends('layouts.iframe')

@section('title','权限组修改页')

@section('css')
    @parent
@endsection

@section('content')
    {{--{{dd($arr)}}--}}
    {{--{{dd($str)}}--}}
    @if (session('success'))
        <div style="font-size: 20px; color: red;text-align: center">
            {{ session('success') }}
        </div>
    @endif
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>权限组-修改信息</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请根据需求修改权限</li>
                        <li>确定每个权限组的功能内容</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            {{--{{dd($data)}}--}}
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">权限组信息</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">权限组名</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="group_name" required lay-verify="required"
                                                   placeholder="" autocomplete="off"
                                                   class="layui-input" value="{{$data->group_name}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">要添加的权限内容</label>
                                        <div class="layui-input-block">
                                            @foreach($role as $row)
                                                {{--{{dump($row->id)}}--}}
                                                <input type="checkbox" name="role_list" title="{{$row->role_name}}" value="{{$row->id}}" lay-filter="check">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">权限描述</label>
                                        <div class="layui-input-block">
                                            <textarea name="group_desc" placeholder="{{$data->group_desc}}"
                                                      class="layui-textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">状态</label>
                                        <div class="layui-input-block" pane>
                                            <input type="radio" name="status" value="0"
                                                   {{$data->status==0?'checked':''}} title="启用" lay-skin="primary">
                                            <input type="radio" name="status" lay-skin="primary" value="1"
                                                   {{$data->status==1?'checked':''}}  title="锁定">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
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
        {{dump($role_list)}}
    </section>
@endsection

@section('js')
    @parent
    <script>

        layui.use(['form', 'jquery', 'layer'], function () {
            var $ = layui.jquery;
            var layer = layui.layer;
            var form = layui.form();

            var id = $('input[name=role_list]').val();
//            alert(id);
            $.inArray()
            if () {

            }

        });

    </script>

@endsection