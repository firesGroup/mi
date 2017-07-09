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

@section('title','系统设置')

@section('css')
    @parent
@endsection
@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>系统设置-SEO设置</span>
            </header>
            <div class="larry-personal-body clearfix">
                <form class="layui-form" id="addProduct">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <!-- 首页 seo -->
                        <fieldset class="layui-elem-field">
                            <legend>前台首页</legend>
                            <br>
                            <div class="row" id="infoSwitch">
                                <blockquote class="layui-elem-quote col-md-12 head-con">
                                    <div class="title">
                                        <i class="larry-icon larry-caozuo"></i>
                                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                                    </div>
                                    <ul>
                                        <li>可替代变量列表: </li>
                                        <li>{web_domain}-->网站网址 {web_name}-->站点名称 {web_title}-->网站标题 {web_key}-->网站关键字 {web_desc}-->网站描述</li>
                                    </ul>
                                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                                </blockquote>
                            </div>
                            <div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">标题</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="index_title" style="width:80%" placeholder="请输入标题" autocomplete="off" class="layui-input" value="{{ $seo['index_title'] or '' }}">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">关键字</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="index_keys" style="width:80%"  placeholder="请输入关键字" autocomplete="off" class="layui-input" value="{{ $seo['index_keys']  or ''  }}">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">描述</label>
                                    <div class="layui-input-block">
                                        <textarea type="text" name="index_desc" style="width:80%"  placeholder="请输入描述" autocomplete="off" class="layui-input">{{ $seo['index_desc']  or '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!-- 搜索页 seo -->
                        <fieldset class="layui-elem-field">
                            <legend>搜索页</legend>
                            <br>
                            <div class="row" id="infoSwitch">
                                <blockquote class="layui-elem-quote col-md-12 head-con">
                                    <div class="title">
                                        <i class="larry-icon larry-caozuo"></i>
                                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                                    </div>
                                    <ul>
                                        <li>可替代变量列表: </li>
                                        <li>[静态]{web_domain}-->网站网址 {web_name}-->站点名称 {web_title}-->网站标题 {web_key}-->网站关键字  {web_desc}-->网站描述</li>
                                        <li>[动态]{s_word}-->搜索关键词  {s_cate}-->搜索分类名称</li>
                                    </ul>
                                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                                </blockquote>
                            </div>
                            <div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">标题</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="search_title" style="width:80%" placeholder="请输入标题" autocomplete="off" class="layui-input" value="{{ $seo['search_title'] or '' }}">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">关键字</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="search_keys" style="width:80%"  placeholder="请输入关键字" autocomplete="off" class="layui-input" value="{{ $seo['search_keys']  or ''  }}">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">描述</label>
                                    <div class="layui-input-block">
                                        <textarea type="text" name="search_desc" style="width:80%"  placeholder="请输入描述" autocomplete="off" class="layui-input">{{ $seo['search_desc']  or '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!-- 商品页 seo -->
                        <fieldset class="layui-elem-field">
                            <legend>商品页</legend>
                            <br>
                            <div class="row" id="infoSwitch">
                                <blockquote class="layui-elem-quote col-md-12 head-con">
                                    <div class="title">
                                        <i class="larry-icon larry-caozuo"></i>
                                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                                    </div>
                                    <ul>
                                        <li>可替代变量列表: </li>
                                        <li>[静态]{web_domain}-->网站网址 {web_name}-->站点名称 {web_title}-->网站标题 {web_key}-->网站关键字 {web_desc}-->网站描述</li>
                                        <li>[动态]{p_name}-->商品名称 {p_summary}-->商品简介 {p_tags}-->商品关键字</li>
                                    </ul>
                                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                                </blockquote>
                            </div>
                            <div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">标题</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="product_title" style="width:80%" placeholder="请输入标题" autocomplete="off" class="layui-input" value="{{ $seo['product_title'] or '' }}">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">关键字</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="product_keys" style="width:80%"  placeholder="请输入关键字" autocomplete="off" class="layui-input" value="{{ $seo['product_keys']  or ''  }}">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">描述</label>
                                    <div class="layui-input-block">
                                        <textarea type="text" name="product_desc" style="width:80%"  placeholder="请输入描述" autocomplete="off" class="layui-input">{{ $seo['product_desc']  or '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="layui-form-item">
                            <center>
                                <button class="layui-btn" lay-submit="" lay-filter="edit">保存</button>
                                <a class="layui-btn" id="back">返回</a>
                            </center>
                        </div>
                    </div>
                </form>
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

            form.on('submit(edit)',function(data){
                var index = layer.msg('正在添加!请稍后...', {
                    icon: 16
                });
                $.ajax({
                    url:'{{ url('admin/system/seo') }}',
                    type: 'POST',
                    data: data.field,
                    success:function(res){
                        layer.close(index);
                        if( res == 0 ){
                            layer.msg('添加成功', {icon:6, time:1000, end:function(){
                                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                                parent.layer.close(index);
                                location.href= '{{ url('/admin/system/seo') }}';
//                                layer.alert(res,{title:1});
                            }});
                        }else{
                            layer.msg('添加失败', {icon:2, time:2000, end:function(){
                                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                                parent.layer.close(index);
//                                layer.alert(res,{title:1});
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

            layui.upload({
                elem: '#imgUpload', //文件input上传域 id
                method: 'post', //文件上传传输方式
                url: '{{ url('/upload') }}', //后台处理程序地址
                before: function (input) {
                    //上传前回调
                    //定义存储路径与token
                    $('input#imgUpload').parent().append('<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="path" value="system">');
                    l = layer.msg('正在上传 请稍后...', {icon: 6});
                }
                , success: function (res) {
                    if (res.status == 0) {
                        layer.close(l);
                        layer.msg('上传成功',{
                            icon: 6,
                            time: 1000 //1秒关闭（如果不配置，默认是3秒）
                        });
                        $('input[name="web_logo"]').val(res.src);
                    }else if( res == 1 ){
                        layer.close(l);
                        layer.msg('上传失败', {'time': 2000});
                    }
                }
            });
        } );
    </script>
@endsection
