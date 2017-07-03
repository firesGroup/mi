<?php
/**
 * File Name: add_category_child.blade.php
 * Description:添加子分类
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/27 0027
 * Time: 下午 2:46
 */
?>

@extends('layouts.iframe')
@section('title', '添加一级分类')
@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>分类管理-修改分类</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <li style="color:#FF5722">{{ $error }}</li>
                            @endforeach
                        @else
                            <li>请务必正确填写分类信息</li>
                        @endif
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">分类信息</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <form class="layui-form" action="{{url('admin/add_category')}}" method="post">
                                {{csrf_field()}}
                                <div class="layui-form-item">
                                    <label class="layui-form-label">父类分类名称</label>
                                    <input type="hidden" value="{{$data->id}}" name="parent_id">
                                    <input type="hidden" value="{{$data->parent_path}}" name="parent_path">
                                    <div class="layui-input-block">
                                        <input disabled readonly type="text" id="category_name" name="category_name"
                                               lay-verify="required"
                                               autocomplete="off" class="layui-input"
                                               value="{{$data->category_name}}">
                                    </div>

                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">分类名称</label>
                                    <div class="layui-input-block">
                                        <input type="text" id="category_name" name="category_name"
                                               lay-verify="required"
                                               autocomplete="off" class="layui-input"
                                               value="{{old('category_name')}}">
                                    </div>

                                </div>

                                <div class="layui-form-item" style="text-align:center;">
                                    <div class="layui-input-block">
                                        <button id="submit" class="layui-btn" lay-submit="" lay-filter="go">立即提交
                                        </button>
                                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                    </div>
                                </div>
                            </form>
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

    </script>
@endsection
