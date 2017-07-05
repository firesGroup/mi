<?php
/**
 * File Name: home.blade.php
 * Description: 前台公共布局模板文件
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 22:28
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $__env->yieldContent('title'); ?> - 小米商城 - FiresGroup</title>
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>"/>
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>" />
    <meta http-equiv="Content-Language" content="zh-cn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta http-equiv="pragram" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=1226" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="renderer" content="webkit">
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- loading css -->
    <?php $__env->startSection('css'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/plugin/layui/css/layui.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/home/base.css')); ?>">
    <?php echo $__env->yieldSection(); ?>
</head>
<body>
    <!--正文 start-->
    <?php echo $__env->yieldContent('content'); ?>
    <!--正文 end-->
    <!-- loading JavaScript-->
    <?php $__env->startSection('js'); ?>
        <script type="text/javascript" src="<?php echo e(asset('/js/public/jquery-1.12.4.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('/plugin/layui/layui.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('/js/home/base.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('/plugin/load.js')); ?>"></script>
    <?php echo $__env->yieldSection(); ?>
</body>
</html>
