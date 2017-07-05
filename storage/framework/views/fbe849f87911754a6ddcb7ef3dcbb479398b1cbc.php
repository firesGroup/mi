<?php
/**
 * File Name: index.blade.php
 * Description: 首页模板文件
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 23:23
 */
?>


<?php $__env->startSection('title', '首页'); ?>
<?php $__env->startSection('keywords',''); ?>
<?php $__env->startSection('description',''); ?>

<?php $__env->startSection('css'); ?>
    @parent
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/home/index.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.public.header_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('home.public.header_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="home-hero-container container">
        <div class="home-hero">
            <?php echo $__env->make('home.index.sildeShow', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('home.public.hotRecommend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('home.index.superStar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <!-- 主要内容 start -->
    <div class="page-main home-main">
        <div class="container">
            <!-- 家电 start-->
            <?php echo $__env->make('home.index.homeElec', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- 家电 end -->
            <!-- 智能 start -->
            <?php echo $__env->make('home.index.smart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- 智能 end -->
            <!-- 搭配 start -->
            <?php echo $__env->make('home.index.match', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- 搭配 end -->
            <!-- 配件 start -->
            <?php echo $__env->make('home.index.accessories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- 配件 start -->
            <!-- 周边 start -->
            <?php echo $__env->make('home.index.around', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- 周边 end -->
            <!-- 首页为您推荐 end -->
            <?php echo $__env->make('home.index.recommend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- 首页为您推荐 end -->
            <!-- 热评 start -->
            <?php echo $__env->make('home.index.commen', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- 热评 end -->
            <!-- 内容 start -->
            <?php echo $__env->make('home.index.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- 内容 end -->
            <!-- 视频 start -->
            <?php echo $__env->make('home.index.video', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- 视频 end -->
        </div>
    </div>
    <!-- 主要内容 end -->
    <?php echo $__env->make('home.public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @parent
    <script type="text/javascript" src="<?php echo e(asset('/js/home/index.js')); ?>?ver=<?php echo time();  ?>"></script>
    <script>
        $(function() {
            $(".cacheload").scrollLoading();
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>