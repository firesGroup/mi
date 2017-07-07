<?php
/**
 * File Name: iframe.blade.php
 * Description:
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/20 0020
 * Time: 上午 10:41
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $__env->yieldContent('title'); ?> - 小米商城系统 - FiresGroup</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!-- load css -->
    <?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/plugin/layui/css/layui.css')); ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/admin/global.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/admin/font.css')); ?>">
    <?php /*<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/admin/common.css')); ?>">*/ ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/admin/personal.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/admin/main.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/admin/show.css')); ?>">
        <?php echo $__env->yieldSection(); ?>
</head>
<body>
<?php if( count($errors) >0  ): ?>
    <div id="errors_msg" style="display:none">
    <?php foreach($errors->all() as $key => $error): ?>
            <li><?php echo e($error); ?></li>
    <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->yieldSection(); ?>
<?php $__env->startSection('js'); ?>
    <!-- 加载js文件-->
    <script type="text/javascript" src="<?php echo e(asset('/plugin/layui/layui.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/js/admin/larry.js')); ?>"></script>
<?php echo $__env->yieldSection(); ?>
</body>
</html>
