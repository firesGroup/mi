<?php
/**
 * File Name: create.blade.php
 * Description:创建广告位置
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/7/9 0009
 * Time: 上午 12:15
 */
?>

<?php
/**
 * File Name: add.blade.php
 * Description:添加广告
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/27 0027
 * Time: 下午 10:02
 */
?>

@extends('layouts.iframe')
@section('title', '添加广告')
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
                                <form class="layui-form" method="post" action="{{url('admin/advert_location')}}">
                                    {{csrf_field()}}
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">广告位置描述</label>
                                            <div class="layui-input-block">
                                            <textarea type="text" name="desc" lay-verify="required"
                                                      placeholder="请输入广告描述" autocomplete="off"
                                                      class="layui-input">{{old('desc')}}</textarea>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @parent

@endsection

