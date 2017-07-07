<?php
/**
 * File Name: create.blade.php
 * Description: 添加商品页面模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 9:32
 */
?>
@extends('layouts.iframe')

@section('title','添加商品信息')

@section('css')
    @parent
    <meta name="_token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品管理-添加商品</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请务必正确填写商品信息</li>
                        <li>商品颜色是商品所有版本总共的颜色</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <form class="layui-form" method="post" id="addProduct">
                    <div class="form-body">
                        {{ csrf_field() }}
                        <!-- 商品名称 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">商品名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="p_name" lay-verify="required" placeholder="请输入商品名称" autocomplete="off" class="layui-input" value="{{ old('p_name') }}">
                            </div>
                        </div>
                        <!-- 商品简介 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">商品简介</label>
                            <div class="layui-input-block">
                                <textarea type="text" name="summary" placeholder="请输入商品简介" autocomplete="off" class="layui-input">{{ old('summary') }}</textarea>
                            </div>
                        </div>
                        <!-- 活动提醒 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">活动提醒</label>
                            <div class="layui-input-block">
                                <textarea type="text" name="remind_title"  placeholder="请输入位于商品简介前活动提醒" autocomplete="off" class="layui-input">{{ old('remind_title') }}</textarea>
                            </div>
                        </div>
                        <!-- 商品分类 -->
                        <div class="layui-form-item" id="category">
                            <label class="layui-form-label">商品分类</label>
                            <div class="layui-input-block">
                                <div class="layui-input-inline">
                                    <select name="category[1]" id="select1" data-id='1' lay-filter="select1">
                                        <option value="">请选择商品分类</option>
                                        @forelse( $categoryList as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->category_name }}</option>
                                            @empty
                                                一个分类都没有呢!
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- 商品价格 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">商品价格</label>
                            <div class="layui-input-block">
                                <input type="text" name="price" lay-verify="required" placeholder="请输入商品默认价格" autocomplete="off" class="layui-input" value="{{ old('price') }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                            </div>
                        </div>
                        <!-- 商品货号 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">商品货号</label>
                            <div class="layui-input-block">
                                <input type="text" name="p_num"  placeholder="留空将自动生成 可不填" autocomplete="off" class="layui-input" value="{{ old('p_name') }}">
                            </div>
                        </div>
                        <!-- 商品库存 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">商品总库存</label>
                            <div class="layui-input-block">
                                <input type="text" name="store" lay-verify="required" placeholder="请输入商品总库存量" autocomplete="off" class="layui-input" value="{{ old('store') }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                            </div>
                        </div>
                        <!-- 是否包邮 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">是否包邮</label>
                            <div class="layui-input-block">
                                <input type="radio" name="is_free_shipping" value="0" title="包邮">
                                <input type="radio" name="is_free_shipping" value="1" checked title="不包邮">
                            </div>
                        </div>
                        <!-- 是否推荐 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">是否推荐</label>
                            <div class="layui-input-block">
                                    <input type="radio" name="recommend" value="0" title="推荐">
                                    <input type="radio" name="recommend" value="1" checked title="不推荐">
                            </div>
                        </div>
                        <!-- 推荐标签 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">推荐标签</label>
                            <div class="layui-input-block">
                                <input type="text" name="flag"  placeholder="请输入推荐标签" autocomplete="off" class="layui-input" value="{{ old('flag') }}">
                            </div>
                        </div>
                        <!-- 商品关键字 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">商品关键字</label>
                            <div class="layui-input-block">
                                <input type="text" name="tags" lay-verify="required" placeholder="请输入商品关键字" autocomplete="off" class="layui-input" value="{{ old('tags')  }}">
                            </div>
                        </div>
                        <!-- 商品状态 -->
                        <div class="layui-form-item">
                                <label class="layui-form-label">商品状态</label>
                                <div class="layui-input-block">
                                    <select name="status">
                                        @for( $i=0;$i<5;$i++ )
                                            <option value="{{$i}}">{{ $zhStatus[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        <!-- 商品封面 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">商品封面</label>
                            <div class="layui-input-block">
                                <input id="upload-input" type="text" class="layui-input" name="p_index_image" value=""  placeholder="输入图片地址或点击上传">
                                <div id="brand_logo">
                                    <input type="file" name="file" id="indexImagesUpload" class="layui-upload-file" accept="image/*"  lay-ext="jpg|png|gif|bmp" lay-title="点击或拖拽文传上传">
                                </div>
                            </div>
                        </div>
                        <!-- 商品详情 -->
                        <div class="layui-form-item">
                            <label class="layui-form-label">商品详情页排版</label>
                            <div class="layui-input-block">
                                <!-- 加载uefitor编辑器的容器 -->
                                <script id="ueditor" name="description" type="text/plain"></script>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <center>
                                <button class="layui-btn" lay-submit="" lay-filter="createProduct">立即添加</button>
                                <a class="layui-btn" id="back">返回列表</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    {{--<div class="p-images-list-box clearfix" id="upload-div-1">--}}
    {{--<div class="images-list"><ul></ul></div>--}}
    {{--<div id="p-images-upload" style="">--}}
    {{--<input type="file" name="file" id="imagesUpload" accept="image/*"  lay-ext="jpg|png|gif|bmp" lay-title=" ">--}}
    {{--</div>--}}
    {{--<div id="p-images-hidden"></div>--}}
    {{--</div>--}}
@endsection

@section('js')
    @parent
    <!--上传文件插件-->
    <script type="text/javascript" src="{{ asset('/js/public/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/public/uploadFile.js') }}"></script>
    <!--富文本编辑器插件-->
    <script type="text/javascript" src="{!!asset('/plugin/ueditor/ueditor.config.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('/plugin/ueditor/ueditor.all.min.js')!!}"></script>
    {{-- 载入语言文件,根据laravel的语言设置自动载入 --}}
    <script type="text/javascript" src="{!!asset($UeditorLangFile)!!}"></script>
    <script type="text/javascript">
        //富文本编辑器
        var ue = UE.getEditor('ueditor');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
            ue.sync('addProduct');//设置编辑器内容同步到from的id
        });
    </script>
    <script>
        layui.use(['jquery','layer','form', 'upload','element','global'], function () {
            var form = layui.form()
                , $ = layui.jquery
                , layedit = layui.layedit
                , global= layui.global
                , element = layui.element()
                , layer = layui.layer;
            var token = $('meta[name=_token]').attr('content');
            var rootUrl = '{{ url('/') }}';

            //页面加载时一些处理
            $('div#edui1').css('width', 'auto').css('z-index', '2');
            $('div#edui1_iframeholder').css('width', 'auto');

            global.aAdd('a#back','{{ url('/admin/product') }}');


            //表单提交监听
            form.on('submit(createProduct)', function(data){
                    $.ajax({
                        url: '{{ url('/admin/product') }}',
                        type: 'post',
                        data: data.field,
                        success: function(res){
                            if( res.status == 0 ){
                                layer.confirm('添加商品成功<br>现在去添加商品版本?',{
                                    icon: 6,
                                    title:'提示',
                                    yes:function(){
                                        location.href="{{ url('/admin/product/versions/create') }}/"+res.id;
                                    },
                                    end:function(){
                                        location.href="{{ url('/admin/product/') }}";
                                    }
                                });
                            }else if( res.status == 1 ){
                                layer.msg('添加商品失败',{
                                    icon: 6,
                                    time: 1000 //1秒关闭（如果不配置，默认是3秒）
                                });
                            }else{
                                layer.msg('添加商品失败!未知错误',{
                                    icon: 6,
                                    time: 1000 //1秒关闭（如果不配置，默认是3秒）
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
                return false;
            });

            //监听上传商品封面图片
            layui.upload({
                elem: '#indexImagesUpload', //文件input上传域 id
                method: 'post', //文件上传传输方式
                url: '{{ url('/upload') }}', //后台处理程序地址
                before: function (input) {
                    //上传前回调
                    //定义存储路径与token
                    $('input#indexImagesUpload').parent().append('<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="path" value="temp">');
                    l = layer.msg('正在上传 请稍后...', {icon: 6});
                }
                , success: function (res) {
                    if (res.status == 0) {
                        layer.close(l);
                        layer.msg('上传成功',{
                            icon: 6,
                            time: 1000 //1秒关闭（如果不配置，默认是3秒）
                        });
                        $('input[name=p_index_image]').val(res.src);
                    }else if( res == 1 ){
                        layer.close(l);
                        layer.msg('上传失败', {'time': 2000});
                    }
                }
            });

            //监听上传商品相册图片
            layui.upload({
                elem: '#imagesUpload', //文件input上传域 id
                method: 'post', //文件上传传输方式
                url: '{{ url('/upload') }}', //后台处理程序地址
                before: function (input) {
                    //上传前回调
                    //定义存储路径与token
                    $('input#imagesUpload').parent().append('<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="path" value="temp">');
                    l = layer.msg('正在上传 请稍后...', {icon: 6});
                }
                , success: function (res) {
                    if (res.status == 0) {
                        layer.close(l);
                        layer.msg('上传成功',{
                            icon: 6,
                            time: 1000 //1秒关闭（如果不配置，默认是3秒）
                        });
                        $('div.images-list ul').append('<li><img src="'+ res.src +'"><span class="del layui-btn">删除</span></li>');
                        $('div#p-images-hidden').append('<input type="hidden" name="p_images[]" value="'+res.src+'">');
                        checkImagesNum();
                    }else if( res == 1 ){
                        layer.close(l);
                        layer.msg('上传失败', {'time': 2000});
                    }
                }
            });

            //删除相册图片
            $('div#upload-div-1').on( 'click', 'span.del', function(){
                var index = layer.load(),
                    t = $(this).parent('li');
                    img = $( this ).siblings('img'),
                    path = img.attr('src');
                $.ajax({
                    url: "{{ url('/admin/product') }}/images/0",
                    type: 'DELETE',
                    data: {'id': 0, 'path': path , '_token': token },
                    success: function(res){
                        layer.close(index);
                        if( res == 0 ){
                            layer.msg('删除成功!',{ icon:6,time:1000 });
                            t.remove();
                            $('div#p-images-hidden input').each( function(){
                                if( $(this).val() == path ){
                                    $(this).remove();
                                }
                            } );
                            checkImagesNum();
                        }else if( res == 1 ){
                            layer.msg('磁盘文件删除失败!',{ icon:2,time:1000 });
                        }else{
                            layer.msg('未知错误!删除失败!',{ icon:2,time:1000 });
                        }
                    }
                });
            });

            //检查商品相册图片数量
            function checkImagesNum(){
                var num = $('div.images-list ul li').length;
                if( num >= 5 ){
                    $('div#p-images-upload').css('display','none');
                }else{
                    $('div#p-images-upload').show();
                }
            }

                setInterval(function(){
                    addSelect();
                },1000);

                function addSelect()
                {
                    var num = $('div#category div.layui-input-inline').size();
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
                            url: "{{url('admin/product/getAjaxCategoryChild')}}/"+data.value
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
                                        "name='category["+ newDid +"]' id='select"+newDid+"'  lay-filter='select"+newDid+"' lay-verify='required'><option value=''>请选择分类</option>";
                                    for (var i = 0; i < data.length; i++) {
                                            str += "<option value='" + data[i].id +"'>" + data[i].category_name + "</option>";
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

            //用户选择模型  根据选择不同模型id,返回不同的表格
            form.on('select(modelSelect)', function(data){
                var modelId = data.value;
                if( modelId ){
                    $("div#spec_table").html('');
                }
                //返回规格项
                $.ajax({
                    url: '{{ url('/admin/product/ajaxGetSpecList') }}/' + modelId,
                    type: 'get',
                    success: function(data){
                        $('#spec_table_1 tbody').html('');
                        $('#spec_table_1 tbody').append(data);
                        form.render();
                    }
                });
                //返回属性项
                $.ajax({
                    url: '{{ url('/admin/product/ajaxGetAttrInput') }}/' + modelId,
                    type: 'get',
                    success: function(data){
                        if( data == '' ){
                            var str = '<tr><td colspan="2" style="font-size:14px;">该模型还没有属性项!&nbsp;<a href="{{ url('/admin/product/attr/create') }}" class="layui-btn layui-btn-small" >立即添加</a></td></tr>';
                            $('table#attr_table tbody').html(str);
                        }else{
                            $('table#attr_table tbody').html('');
                            $('table#attr_table tbody').append(data);
                        }
                        form.render();//刷新渲染
                    }
                });
            });
        });
    </script>
@endsection
