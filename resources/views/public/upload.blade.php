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
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugin/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/show.css') }}" media="all">
</head>
<body>
    <script type="text/javascript" src="{{ asset('/js/public/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugin/uploadify/uploadify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugin/layui/layui.js') }}"></script>
    <script>
        layui.use(['layer','form','upload'], function(){
            var form = layui.form(),
                layer = layui.layer;


        });
    </script>
</body>
</html>
