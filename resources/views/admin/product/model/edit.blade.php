<?php
/**
 * File Name: edit.blade.php
 * Description: 模型修改页面模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 15:52
 */
?>
<?php
/**
 * File Name: create.blade.php
 * Description: 商品模型添加页面模版
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 11:21
 */
?>
@extends('layouts.iframe')

@section('title','商品模型管理-修改模型')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品模型管理-修改模型</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>商品模型是用来规定某一类商品共有规格和属性的集合，其中规格会影响商品价格同一个商品不同的规格价格会不同，<br>而属性仅仅是商品的属性特质展示</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="form-body">
                    <form class="layui-form" action="{{ url('admin/product/model/'.$model->id) }}" method="post" id="model">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="layui-form-item">
                            <label class="layui-form-label">模型名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="model_name" lay-verify="required" placeholder="请输入模型名称" autocomplete="off" class="layui-input" value="{{ $model->model_name }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" type="submit" lay-submit="" lay-filter="editModel">修改</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                <a class="layui-btn layui-btn-primary" href="{{ url('/admin/product/model') }}">返回</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    @parent
    <script>
        layui.use( ['jquery','layer','form'], function(){
            var $ = layui.jquery,
                layer = layui.layer,
                form = layui.form();

            //序列化表单值 用于判断是否被修改过
            var loadFormData = $('form#model').serialize();
            form.on('submit(editModel)',function(data){
                var submitFormData = $('form#model').serialize();
                if( submitFormData == loadFormData ){
                    layer.msg('您什么都没修改呀!', {'icon':3, 'time':2000,anim: Math.ceil(Math.random() * 6)});
                }else {
                    var index = layer.msg('正在修改中!请稍后...', {
                        icon: 16
                    });
                    $.ajax({
                        url: '{{ url('admin/product/model/'.$model->id) }}',
                        type: 'PUT',
                        data: data.field,
                        dataType: 'json',
                        success: function (res) {
                            layer.close(index);
                            if (res == 0) {
                                layer.msg('修改成功', {
                                    icon: 6, time: 1000, end: function () {
                                        location.href = "{{ url('/admin/product/model') }}";
                                    }
                                });
                            } else {
                                layer.msg('修改失败', {
                                    icon: 2, time: 2000, end: function () {
                                        location.href = "{{ url('/admin/product/model') }}";
                                    }
                                });
                            }
                        },
                        error:function (XMLHttpRequest) {
                           var msgObj = XMLHttpRequest.responseJSON;
                           var msg = '';
                            for(var name in msgObj){//遍历对象属性名
                                msg += msgObj[name] + "<br>";
                            }
                            layer.msg(msg,{icon:2,time:3000});
                        },
                    });
                }
                return false;
            });

        } );
    </script>
@endsection

