<?php
/**
 * File Name: upload.blade.php
 * Description: 文件上传页面模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/20
 * Time: 19:21
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理- 小米商城系统 - FiresGroup</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugin/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/show.css') }}" media="all">
</head>
<body>
    <div class="upload-alert-box">
        <input type="file" name="file" class="layui-upload-file"  lay-ext="jpg|png|gif|bmp" id="up" lay-title="点击此处或拖拽图片上传">
    </div>
    <script type="text/javascript" src="{{ asset('/plugin/layui/layui.js') }}"></script>
    <script>
        layui.use(['jquery','layer','form', 'upload','layedit','element'], function () {
            var form = layui.form()
                , $ = layui.jquery
                , layer = layui.layer;

            var token = $('meta[name=_token]').attr('content');

            var id = '{{ $id }}';

            //执行上传
            layui.upload({
                elem: '#up', //文件input上传域 id
                method: 'post', //文件上传传输方式
                url: '{{ url('/upload') }}', //后台处理程序地址
                before: function (input) {
                    //上传前回调
                    $('input#up').parent().append('<input type="hidden" name="_token" value="' + token + '"><input type="hidden" name="path" value="{{ $path }}">');
                    l = layer.msg('正在上传 请稍后...', {icon: 6});
                }
                , success: function (res) {
                    if (res.status == 0) {
                        layer.close(l);
                        layer.msg('上传成功', {'time': 2000});
                        $.ajax({
                            url: '{{ url($url) }}',
                            type: 'post',
                            data: {'src': res.src, 'id': id, '_token': token}
                        });
                        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                        parent.layer.close(index);
                    }
                }
            });
        });
    </script>
</body>
</html>
