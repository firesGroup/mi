<?php
/**
 * File Name: edit.blade.php
 * Description:
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/7/9 0009
 * Time: 上午 1:15
 */
?>

@extends('layouts.iframe')
@section('title', '修改')
    @section('css')
        @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>广告管理-添加广告</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请务必正确填写广告信息</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="layui-tab" lay-filter="tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">添加广告</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" method="post" action="{{url('admin/advert_location/'.$data->id)}}">
                                    {{csrf_field()}}


                                <input type="hidden" name="_method" value="PUT">
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">广告描述</label>
                                                <div class="layui-input-block">
                                            <textarea type="text" name="desc" lay-verify="required"
                                                      placeholder="请输入广告描述" autocomplete="off"
                                                      class="layui-input">{{$data->desc}}</textarea>
                                                </div>
                                            </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit="" lay-filter="go"
                                                    id="submit">立即提交
                                            </button>
                                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="layui-tab-item">
                            <div class="p-images-list-box clearfix" id="p-images-list">
                            </div>
                        </div>
                        <div class="layui-tab-item">内容3</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

@section('js')
    @parent
@endsection
