<?php
/**
 * File Name: create.blade.php
 * Description: 商品版本添加页面模版
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 23:34
 */
?>
@extends('layouts.iframe')

@section('title','商品版本管理-添加')

@section('css')
    @parent
    <style>
        #imgs ul li{
            float:left;
            margin:10px;
        }
    </style>
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品版本管理-添加版本</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>商品版本是购买商品时给用户选择的, 涉及到价格变动库存等, 例如:衣服的 颜色 尺寸 等</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="form-body">
                    <form class="layui-form" method="post" id="ver">
                        {{ csrf_field() }}
                        <input type="hidden" name="p_id" value="{{ $p_id }}">
                        <div class="layui-form-item">
                            <label class="layui-form-label">版本名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="ver_name" lay-verify="required" placeholder="请输入版本名称" autocomplete="off" class="layui-input" value="{{old('ver_name')}}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">版本规格</label>
                            <div class="layui-input-block">
                                <input type="text" name="ver_spec"  placeholder="请输入版本规格" autocomplete="off" class="layui-input" value="{{old('ver_spec')}}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">版本简介</label>
                            <div class="layui-input-block">
                                <input type="text" name="ver_desc" placeholder="请输入版本简介" autocomplete="off" class="layui-input" value="{{old('ver_desc')}}">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">版本价格</label>
                            <div class="layui-input-block">
                                <input type="text" name="price" lay-verify="required" placeholder="请输入版本价格" autocomplete="off" class="layui-input" value="{{ old('price') }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">版本库存</label>
                            <div class="layui-input-block">
                                <input type="text" name="store" lay-verify="required" placeholder="请输入版本库存" autocomplete="off" class="layui-input" value="{{ old('store') }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">版本颜色</label>
                            <div class="layui-input-block" id="color">
                                @forelse( $colorList as $k=>$v )
                                    <input type="checkbox" name="color[{{ $v->id }}]" title="{{ $v->color_name }}">
                                @empty
                                    暂时没有颜色!请添加商品颜色
                                @endforelse
                                    <a id="colorAdd" class="layui-btn layui-btn-small" style="margin:5px 0">添加颜色</a>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">搭配商品</label>
                            <div class="layui-input-block">
                                <input type="text" name="contact_p_id" placeholder="请输入要搭配的商品货号" autocomplete="off" class="layui-input" value="{{ old('price') }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">版本状态</label>
                            <div class="layui-input-block">
                                <select name="status">
                                    <option value="">请选择状态</option>
                                        @for( $i=0;$i<5;$i++ )
                                            <option value="{{$i}}">{{ $status[$i]}}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">版本图片</label>
                            <div class="layui-input-block" id="verimgs" data-id="0" data-url-id="0">
                                <div id="brand_logo"><input type="file" name="file" id="imgUpload" class="layui-upload-file" accept="image/*"  lay-ext="jpg|png|gif|bmp" lay-title="点击上传图片"><a class="layui-btn layui-btn-primary" id="addUrl" title="添加远程图片地址">[+]</a></div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block images-list" id="imgs">
                                <ul></ul>
                            </div>
                        </div>
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="addver">添加</button>
                                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                <a  class="layui-btn layui-btn-primary" href="{{ url('/admin/product/') }}">返回</a>
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
        layui.use( ['jquery','layer','form','upload'], function(){
            var $ = layui.jquery,
                layer = layui.layer,
                form = layui.form();

            form.on('submit(addver)',function(data){
                var index = layer.msg('正在添加!请稍后...', {
                    icon: 16
                });
                $.ajax({
                    url:'{{ url('admin/product/versions') }}',
                    type: 'POST',
                    data: data.field,
                    success:function(res){
                        layer.close(index);
                        if( res.status == 0 ){
                            layer.msg('添加成功', {icon:6, time:1000, end:function(){
                                location.href= '{{ url('/admin/product/versions/'.$p_id ) }}';
                            }});
                        }else if( res.status == 1){
                            layer.msg('添加失败!', {icon:2, time:2000, end:function(){
                            }});
                        }else if(res.status == 2){
                            layer.msg('请输入版本项!', {icon:2, time:2000, end:function(){
                            }});
                        }else{
                            layer.msg('添加失败', {icon:2, time:2000, end:function(){
                            }});
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


                return false;
            });

            //上传版本图片
            layui.upload({
                elem: '#imgUpload',
                method: 'post',
                url: '{{ url('/upload') }}',
                before: function (input) {
                    var dataId = $('#verimgs').data('id');
                    var str='<input class="id'+ dataId +'" type="hidden" name="ver_img['+ dataId +']" value="">';
                    $('#brand_logo').before(str);
                    $('#imgUpload').parent().append('<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="path" value="versions">');
                    l = layer.msg('正在上传 请稍后...', {icon: 6});
                }
                , success: function (res) {
                    if (res.status == 0) {
                        layer.close(l);
                        layer.msg('上传成功',{
                            icon: 6,
                            time: 1000
                        });
                        var dataId = $('#verimgs').data('id');
                        $('#brand_logo').prev().val(res.src);
                        if( dataId == 0 ){
                            $('#imgs ul').html('');
                        }
                        $('#imgs ul').append('<li data-id="id'+ dataId +'" data-iid="'+dataId+'"><img width="200" height="100" src='+ res.src +'><span class="del layui-btn">删除</span></li>');
                        $('#verimgs').data('id', dataId+1);
                        var urlId = $('#verimgs').data('urlId');
                        dataId = $('#verimgs').data('id')
                        if( (dataId + urlId) == 5 ){
                            $('#brand_logo').hide();
                            layer.msg('最多上传5张图片!',{icon:2,time:1000});
                        }
                    }else if( res == 1 ){
                        layer.close(l);
                        layer.msg('上传失败', {'time': 2000});
                    }
                }
            });
            //图片删除
            $('#imgs').on('click','span.del',function(){
                var classid = $(this).parent().data('id');
                var id = $(this).parent().data('iid');
                var th = $(this);
                var src = $('#verimgs').find('input.'+classid).attr('value');
                var index= layer.load();
                var dataId;
                $.ajax({
                    url: "{{ url('/admin/product') }}/images/0",
                    type: 'DELETE',
                    data: {'id': 0, 'path': src , '_token': '{{ csrf_token() }}' },
                    success: function(res){
                        layer.close(index);
                        if( res == 0 ){
                            layer.msg('删除成功!',{ icon:6,time:1000 });
                            $('#verimgs').find('input.'+classid).remove();
                            th.parent().remove();
                            dataId = $('#verimgs').data('id');
                            $('#verimgs').data('id', (dataId-1));
                            dataId = $('#verimgs').data('id');
                            var urlId = $('#verimgs').data('urlId');
                            if( ( dataId + urlId ) < 5 ){
                                $('#brand_logo').show();
                            }else if( ( dataId + urlId ) <= 0 ){
                                $('#imgs ul').html('');
                                $('#imgs ul').append('您还没有上传图片');
                            }
                        }else if( res == 1 ){
                            layer.msg('磁盘文件删除失败!',{ icon:2,time:1000 });
                        }else if( res == 2 ){
                            layer.msg('数据删除失败!',{ icon:2,time:1000 });
                        }else{
                            layer.msg('未知错误!删除失败!',{ icon:2,time:1000 });
                        }
                    }
                });
            });


            //选中时
            $('#color').on('click', 'div.layui-unselect', function(){
                if( $(this).hasClass('layui-form-checked') ){
                    $(this).prev('input[type=checkbox]').attr('checked','true');
                }else{
                    $(this).prev('input[type=checkbox]').removeAttr('checked');
                }
            } );
            //添加颜色
            $('#color').on('click','a#colorAdd',function(){
                var colorArr = [];
                //获取已选中的颜色
                $("#color input[type=checkbox]:checked").each(function(){
                    var id = $(this).data('id');
                    colorArr.push(id);
                });
                layer.open({
                    type: 2,
                    title: '添加颜色',
                    shadeClose: true,
                    shade: false,
                    maxmin: true, //开启最大化最小化按钮
                    area: ['803px', '325px'],
                    content: '{{ url('/admin/product/color/create') }}',
                    end:function(){
                        $.ajax({
                            url:'{{ url('/admin/product/versions/getColorList') }}',
                            type:'get',
                            data:{colorArr:colorArr},
                            success:function(data){
                                $('#color').html('');
                                $('#color').append(data);
                                form.render();//刷新渲染
                            }
                        });
                    }
                });
            });

            $('a#addUrl').on('click', function(){
                var t = $(this);
                var dataId = $('#verimgs').data('id');
                var urlId = $('#verimgs').data('urlId');
                    t.parent().parent().append('<div style="position: relative;width: 100%;margin: 10px 0;"><input class="layui-input" type="text" name="ver_img_url['+ urlId +']" lay-verify="required" placeholder="远程图片地址" autocomplete="off">' +
                        '<a class="layui-btn close"  style="position:absolute;top:0;right:0">删除</a></div>');
                    form.render();//刷新渲染
                    $('#verimgs').data('urlId', urlId+1);
                urlId = $('#verimgs').data('urlId')
                if( (dataId+urlId) == 5 ){
                    $('#brand_logo').hide();
                    layer.msg('最多上传5张图片!',{icon:2,time:1000});
                }

            });
            $('#verimgs').on('click','div a.close', function(){
                var urlId = $('#verimgs').data('urlId');
                var dataId = $('#verimgs').data('id');
                $('#verimgs').data('urlId',urlId-1);
                $(this).parent().remove();
                //再次获取
                urlId = $('#verimgs').data('urlId');
                if( (dataId+urlId) < 5 ){
                    $('#brand_logo').show();
                }

            });
        });

    </script>
@endsection
