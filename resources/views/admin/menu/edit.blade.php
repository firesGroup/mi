<?php
/**
 * File Name: edit.blade.php
 * Description: 分组修改页面模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/7/6
 * Time: 15:52
 */
?>
@extends('layouts.iframe')

@section('title','菜单管理-修改分组')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>菜单管理-修改分组</span>
            </header>
            <div class="larry-personal-body clearfix">
                <div class="form-body">
                    <form class="layui-form" id="m">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="layui-form-item">
                            <label class="layui-form-label">菜单名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="menu_title" lay-verify="required" placeholder="请输入菜单名称" autocomplete="off" class="layui-input" value="{{ $info->menu_title }}">
                            </div>
                        </div>
                        <div class="layui-form-item" id="menu_parent">
                            <label class="layui-form-label">父级菜单</label>
                            <div class="layui-input-block">
                                <div class="layui-input-inline">
                                    <select name='parent_id[1]' id='select1' lay-verify="required"   lay-filter='select1'>
                                        <option value="">请选择父级菜单</option>
                                        <option value="0" {{ $info->parent_id == 0?'selected':'' }}>顶极菜单</option>
                                        @foreach( $menus[0] as $par )
                                            <option value="{{ $par['id'] }}"{{ $par['id'] == $ids[1]?'selected':"" }}>{{ $par['menu_title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if( $num > 1 )
                                    @for( $i = 1 ; $i<$num ; $i++ )
                                        <div class="layui-input-inline">
                                            <select name='parent_id[{{ $i+1 }}]' id='select{{ $i+1 }}'  lay-filter='select{{ $i+1 }}'>
                                                <option value="">请选择父级菜单</option>
                                                <option value="0">无链接菜单</option>
                                                @foreach( $menus[$i] as $par )
                                                    <option value="{{ $par['id'] }}"{{ $par['id'] == $ids[$i+1]?'selected':"" }}>{{ $par['menu_title'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endfor
                                @endif
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">对应权限</label>
                            <div class="layui-input-block"  style="width:80%">
                                <select name='menu_role_id'>
                                    <option value="">请选择对应权限</option>
                                    <option value="0">无权限路由</option>
                                    @foreach( $roles as $role )
                                        <option value="{{ $role['id'] }}"{{ $role['id'] == $info->menu_role_id ?'selected':'' }}>{{ $role['role_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item" id="">
                            <label class="layui-form-label">菜单分组</label>
                            <div class="layui-input-block"style="width:80%">
                                <select name='menu_group_id' lay-verify="required">
                                    <option value="">请选择菜单分组</option>
                                    @foreach( $group as $g )
                                        <option value="{{ $g->id }}" {{ $g->id == $info->menu_group_id ? 'selected':'' }}>{{ $g->menu_group_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">菜单图标</label>
                            <div class="layui-input-block" style="width:80%">
                                <input type="text" name="menu_icon" placeholder="请输入图标文字代码" autocomplete="off" class="layui-input" value="{{ $info->menu_icon or "" }}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">菜单状态</label>
                            <div class="layui-input-block" style="width:80%">
                                <input type="radio" name="status" value="0" {{ $info->status == 0?"checked":''  }}  title="显示">
                                <input type="radio" name="status" value="1" {{ $info->status == 1?"checked":''  }} title="不显示">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" type="submit" lay-submit="" lay-filter="editGroup">修改</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                <a class="layui-btn layui-btn-primary" href="{{ url('/admin/menu') }}">返回</a>
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
            var loadFormData = $('form#m').serialize();
            form.on('submit(editGroup)',function(data){
                var submitFormData = $('form#m').serialize();
                if( submitFormData == loadFormData ){
                    layer.msg('您什么都没修改呀!', {'icon':3, 'time':2000,anim: Math.ceil(Math.random() * 6)});
                }else {
                    var index = layer.msg('正在修改中!请稍后...', {
                        icon: 16
                    });
                    $.ajax({
                        url: '{{ url('admin/menu/'.$info->id) }}',
                        type: 'PUT',
                        data: data.field,
                        dataType: 'json',
                        success: function (res) {
                            layer.close(index);
                            if (res == 0) {
                                layer.msg('修改成功', {
                                    icon: 6, time: 1000, end: function () {
                                        location.href = "{{ url('/admin/menu') }}";
                                    }
                                });
                            } else {
                                layer.msg('修改失败', {
                                    icon: 2, time: 2000, end: function () {
                                        location.href = "{{ url('/admin/menu') }}";
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

            //监听
            setInterval(function(){
                addSelect();
            },1000);

            function addSelect()
            {
                var num = $('div#menu_parent div.layui-input-inline').size();
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
                    console.log(22);
                    $.ajax({
                        url: "{{url('admin/menu/getAjaxChild')}}/"+data.value
                        , type: 'get'
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
                                var str = "<div class='layui-input-inline'><select " +
                                    "name='parent_id["+ newDid +"]' id='select"+newDid+"'  lay-filter='select"+newDid+"'><option value=''>请选择分类</option><option value='0'>无链接菜单</option>";
                                for (var i = 0; i < data.length; i++) {
                                    str += "<option value='" + data[i].id +"'>" + data[i].menu_title + "</option>";
                                }
                                str += "</select></div>";
                                $('select#select'+n).parent().next('div').remove();
                                $('select#select'+n).parent().parent().append(str);
                                $('select#select1').data('id',n+1);
                                form.render();
                            }
                        },
                        typeOf: 'json'
                    })
                });
            }
        } );
    </script>
@endsection

