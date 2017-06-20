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
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品管理首页 - 小米商城系统 - FiresGroup</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!-- load css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugin/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/global.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/personal.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/show.css') }}">
</head>
<body>
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
            <div class="layui-tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">商品信息</li>
                    <li>商品相册</li>
                    <li>商品模型</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show" style="padding-top:20px">
                        <div class="form-body">
                            <form class="layui-form" action="" method="post">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品名称</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="p_name" lay-verify="required" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
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
                                        <input type="file" name="p_index_image" class="layui-upload-file" lay-title="上传商品封面图片">
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
                                        <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div class="form-body">
                            <form class="layui-form">
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <input type="file" name="p_index_image" class="layui-upload-file">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="layui-tab-item">内容3</div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 加载js文件-->
<script type="text/javascript" src="{{ asset('/plugin/layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/larry.js') }}"></script>
<script>
    layui.use(['jquery','layer','form', 'upload','layedit', 'element'], function () {
        var form = layui.form()
            ,$ = layui.jquery
            ,layedit = layui.layedit
            ,element = layui.element()
            layer = layui.layer;

        //上传封面图片
        layui.upload({
            url: '' //上传接口
            ,success: function(res){ //上传成功后的回调
                console.log(res)
            }
        });

        //构建一个默认的编辑器
        var index = layedit.build('editor');
    });

</script>
</body>
</html>
