<?php
/**
 * File Name: edit.blade.php
 * Description:分类修改页面
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/26 0026
 * Time: 下午 1:55
 */
?>

@extends('layouts.iframe')

@section('title', '修改分类')
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
                                <li style="color:#FF5722;font-size:20px;text-align:center">{{ $error }}</li>
                            @endforeach
                        @elseif(session('error'))
                                 <li style="color:#ff5722;font-size:20px;text-align:center">
                                    {{ session('error') }}
                                </li>
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
                            <div class="form-body">
                                <form class="layui-form" action="{{url('admin/category/'.$data->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <input type="hidden" name="cate_id" value="">
                                    <div class="layui-form-item" id="item">
                                        <label class="layui-form-label">上级分类</label>
                                        <div class="layui-input-inline">
                                            <select name="parent_id" lay-verify="" id="select1" data-id='1' lay-filter="select1" style="width:200px">
                                                <option value="">请选择分类</option>
                                                <option value="0" {{$data->parent_id ==0?" selected":""}}>顶级分类</option>
                                                @foreach($res as $category)
                                                    <option value="{{$category->id}} " {{$data->parent_id ==$category->id?"selected":""}} {{ $id == $category->id?" disabled":"" }}>{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">分类名称</label>
                                        <div class="layui-input-block">
                                            <input type="text" id="category_name" name="category_name"
                                                   lay-verify="required"
                                                   autocomplete="off" class="layui-input"
                                                   value="{{$data->category_name}}">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
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
        </div>
    </section>
@endsection

@section('js')
    @parent

    <script>
        layui.use(['jquery', 'layer', 'form'], function () {
            var $ = layui.jquery,
                form = layui.form(),
                layer = layui.layer;

            setInterval(function(){
                addSelect();
            },1000);

            function addSelect()
            {
                var num = $('div.layui-input-inline').length;
                for( var i=1;i <= num; i++ ){
                    formOn(i);
                }
            }

            function formOn(n)
            {
                form.on('select(select' + n + ')', function (data) {
                    if( n == 1 ){
                        $('select#select1').parent().siblings('div').remove();
                        $('select#select1').data('id',1)
                    }
                    $.ajax({
                        url: "{{url('admin/category_edit')}}"
                        , type: 'post'
                        , data: {"_token": "{{csrf_token()}}", "c_id": data.value, "id": '{{$data->id}}'}
                        , success: function (data) {
                            if (data == 1) {
                                return false;
                            } else if(data == 2){
                                //说明选择的是顶级分类
                                //那么如果存在之前选择的子分类,就应该删掉元素
                                    $('select#select1').parent().next('div').remove();

                                return false;
                            }else if( data == null ){
                                return false;
                            }else{
                                var did = $('select#select1').data('id');
                                var newDid = did+1;
                                var str = "<div class='layui-input-inline'><select name='cate_id' id='select"+newDid+"'  lay-filter='select"+newDid+"' lay-verify='required'><option value=''>请选择分类</option>";
                                for (var i = 0; i < data.length; i++) {
                                    if (data[i].id == {{$data->id}}) {
                                        return false;
                                    }
                                    str += "<option value='" + data[i].id +"'>" + data[i].category_name + "</option>";
                                }
                                str += "</select></div>";
                                $('select#select'+n).parent().next('div').remove();
                                $('select#select'+n).parent().parent().append(str);
                                $('select#select1').data('id',n);
                                form.render();
                            }
                        },
                        typeOf: 'json'
                    })

                });
            }

        });
    </script>
@endsection

