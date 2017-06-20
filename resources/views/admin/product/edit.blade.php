<?php
/**
 * File Name: edit.blade.php
 * Description:
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/20
 * Time: 0:18
 */
?>
<?php
/**
 * File Name: index.blade.php
 * Description: 商品列表页模版
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/19
 * Time: 16:09
 */
?>
@extends('layouts.iframe')

@section('title','修改商品信息')

@section('css')
    @parent
    <meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <section class="larry-grid">
    <div class="larry-personal">
        <header class="larry-personal-tit">
            <span>商品管理-修改信息</span>
        </header>
        <div class="row" id="infoSwitch">
            <blockquote class="layui-elem-quote col-md-12 head-con">
                <div class="title">
                    <i class="larry-icon larry-caozuo"></i>
                    <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                </div>
                <ul>
                    <li>请务必正确填写商品信息</li>
                </ul>
                <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
            </blockquote>
        </div>
        <div class="larry-personal-body clearfix">
            <div class="layui-tab"  lay-filter="tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">商品信息</li>
                    <li  id="p-images">商品相册</li>
                    <li>商品模型</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show" style="padding-top:20px">
                        <div class="form-body">
                            <form class="layui-form"method="post">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品名称</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="p_name" lay-verify="required" placeholder="请输入商品名称" autocomplete="off" class="layui-input" value="{{ $info->p_name }}">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品简介</label>
                                    <div class="layui-input-block">
                                        <textarea type="text" name="summary" lay-verify="required" placeholder="请输入商品简介" autocomplete="off" class="layui-input"></textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品分类</label>
                                    <div class="layui-input-block">
                                        <div class="layui-input-inline">
                                            <select name="category1">
                                                <option value="">请选择分类</option>
                                                <option value="你的工号">江西省</option>
                                                <option value="你最喜欢的老师">福建省</option>
                                            </select>
                                        </div>
                                        <div class="layui-input-inline">
                                            <select name="category1">
                                                <option value="">请选择分类</option>
                                                <option value="杭州">杭州</option>
                                                <option value="宁波" disabled="">宁波</option>
                                                <option value="温州">温州</option>
                                                <option value="温州">台州</option>
                                                <option value="温州">绍兴</option>
                                            </select>
                                        </div>
                                        <div class="layui-input-inline">
                                            <select name="category1">
                                                <option value="">请选择分类</option>
                                                <option value="西湖区">西湖区</option>
                                                <option value="余杭区">余杭区</option>
                                                <option value="拱墅区">临安市</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品品牌</label>
                                    <div class="layui-input-block">
                                        <select name="bid" lay-filter="brand">
                                            <option value=""></option>
                                            <option value="0">写作</option>
                                            <option value="1" selected="">阅读</option>
                                            <option value="2">游戏</option>
                                            <option value="3">音乐</option>
                                            <option value="4">旅行</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品价格</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="price" lay-verify="required" placeholder="请输入商品价格" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">市场价格</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="market_price" lay-verify="required" placeholder="请输入市场价格" autocomplete="off" class="layui-input">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品封面</label>
                                    <div class="layui-input-block">
                                        <div class="layui-box layui-upload-button">
                                            <span class="layui-upload-icon"><i class="layui-icon"></i>上传商品封面图片</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品详情</label>
                                    <div class="layui-input-block">
                                        <textarea class="layui-textarea" id="editor" style="display: none" name="description">把编辑器的初始内容放在这textarea即可</textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button class="layui-btn" lay-submit="" lay-filter="productInfo">立即提交</button>
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
    <!--上传文件插件-->
    <script type="text/javascript" src="{{ asset('/js/public/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/public/uploadFile.js') }}"></script>
    <script>
    layui.use(['jquery','layer','form', 'upload','layedit','element'], function () {
        var form = layui.form()
            ,$ = layui.jquery
            ,layedit = layui.layedit
            ,element = layui.element()
            ,layer = layui.layer;
        var token = $('meta[name=_token]').attr('content');


        //构建一个默认的编辑器
        var index = layedit.build('editor');
        var id = '{{ $info->id }}';
        var rootUrl = '{{ url('/') }}';

        element.on('tab(tab)',function(){
            if ($(this).attr('id') == 'p-images') {
                $.ajax({
                    url: '{{ url('/admin/product').'/'.$info->id.'/images'  }}',
                    method: 'get',
                    success: function (res) {
                        var str = '<div class="images-list"><ul>';
                        for (var i = 0; i < res.length; i++) {
                            str += '<li>';
                            str += '<img  src="' + rootUrl + res[i].path + '">'
                            str += '</li>';
                        }
                        str += '<ul></div><div class="uploadFile" id="uploadFile"><i class="layui-icon"></i> </div>';

                        $('div#p-images-list').html(str);
                    }
                });
            }
        } );


        /*
         * 文件上传
         * auth  showkw
         *
         * param  url   文件上传处理地址
         * param  token  防csrf令牌
         * param  dir    文件上传保存目录名(相对于/public/uploads/下的目录)
         * param rtUri   上传成功后后台需要后续处理的操作 uri
         * param rtParams   需要传递的参数 json格式传入
         * param  rtMethod   后续处理请求方式 GET/POST/PUT/DELETE
         */
       uploadFile( '{{ url('/upload')  }}', token, 'test',
           '{{ url('admin/product').'/'.$info->id.'/images'  }}',{ 'id': id }, 'POST'  );


        });
</script>
@endsection