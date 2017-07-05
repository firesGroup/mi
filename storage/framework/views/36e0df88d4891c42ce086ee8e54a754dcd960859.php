<?php
/**
 * File Name: info.blade.php
 * Description: 商品详情页模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 22:26
 */
?>


<?php $__env->startSection('title', '首页'); ?>
<?php $__env->startSection('keywords',''); ?>
<?php $__env->startSection('description',''); ?>

<?php $__env->startSection('css'); ?>
    @parent
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/home/product_info.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.public.header_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('home.public.header_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- 主要内容 start -->
    <!-- 商品导航条 start -->
    <?php echo $__env->make('home.product.product_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- 商品导航条 end -->
    <!-- 商品信息 start -->
    <div class="xm-buyBox" id="J_buyBox">
        <div class="box clearfix">
            <div class="login-notic J_notic">
                <div class="container">
                    为方便您购买，请提前登录
                    <a href="" class="J_proLogin">立即登录</a>
                    <a href="javascript:void(0);" class="iconfont J_proLoginClose"  ></a>
                </div>
            </div>
            <div class="pro-choose-main container clearfix">
                <div class="pro-view span10">
                    <div class="J_imgload imgload hide">
                    </div>
                    <div id="J_img" class="img-con" style="left: 19.5px; margin-top: 0px;">
                        <div id="J_sliderView" class="sliderWrap" style="width: auto; position: relative;">
                            <?php foreach( $imgArr as $k=>$img ): ?>
                                <?php if($k == 0): ?>
                                    <img data-url="<?php echo e($img); ?>!560_560" class="loaded slider done" src="/images/public/placeholder-220.png">
                                <?php else: ?>
                                    <img data-url="<?php echo e($img); ?>!560_560" class="slider done" src="/images/public/placeholder-220.png">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="pro-info span10">
                    <h1 class="pro-title J_proName"><?php echo e($info->p_name); ?></h1>
                    <!-- 提示 -->
                    <p class="sale-desc" id="J_desc"><font color="#ff4a00"><?php echo e(isset($info->detail->remind_title) ? $info->detail->remind_title : ''); ?></font><?php echo e(isset($info->detail->summary) ? $info->detail->summary : ''); ?></p>
                    <!-- 选择第一级别 -->
                    <span class="pro-price J_proPrice"><?php echo e($info->price); ?>元</span>
                    <div class="J_main">
                        <div class="list-wrap" id="J_list">
                            <?php if( isset( $versions ) ): ?>
                                <div class="pro-choose pro-choose-col2 J_step" data-index="0" id="version">
                                <div class="step-title">
                                    选择版本
                                    <span><?php echo e(isset($versions[0]['ver_desc']) ? $versions[0]['ver_desc'] : ''); ?></span>
                                </div>
                                <ul class="step-list step-one clearfix">
                                    <?php foreach( $versions as $k=>$ver ): ?>
                                        <?php if( $k == 0 ): ?>
                                            <li class="btn btn-biglarge active" data-name="<?php echo e($ver['ver_name']); ?> <?php echo e($ver['ver_spec']); ?>" data-price="<?php echo e($ver['price']); ?>" data-index="<?php echo e($k); ?>" data-ver_id="<?php echo e($ver['id']); ?>" data-desc="<?php echo e($ver['ver_desc']); ?>"> <a href="javascript:void(0);">
                                                    <span class="name"><?php echo e($ver['ver_name']); ?> <?php echo e($ver['ver_spec']); ?> </span>
                                                    <span class="price"> <?php echo e($ver['price']); ?>元 </span>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li class="btn btn-biglarge" data-name="<?php echo e($ver['ver_name']); ?> <?php echo e($ver['ver_spec']); ?>" data-price="<?php echo e($ver['price']); ?>" data-index="<?php echo e($k); ?>" data-ver_id="<?php echo e($ver['id']); ?>" data-desc="<?php echo e($ver['ver_desc']); ?>"> <a href="javascript:void(0);">
                                                    <span class="name"><?php echo e($ver['ver_name']); ?> <?php echo e($ver['ver_spec']); ?> </span>
                                                    <span class="price"> <?php echo e($ver['price']); ?>元 </span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if( isset($colorArr) ): ?>
                                <div class="pro-choose pro-choose-col2 J_step" data-index="1" id="color">
                                <div class="step-title">  选择颜色   </div>
                                <ul class="step-list clearfix">
                                    <?php foreach( $colorArr as $k=>$color ): ?>
                                        <?php if( $k == 0 ): ?>
                                            <li class="btn btn-biglarge active" data-ver_id="<?php echo e($color['ver_id']); ?>" data-color_id="<?php echo e($color['color_id']); ?>" data-value="<?php echo e($color['color_name']); ?>" data-index="<?php echo e($k); ?>"><a href="javascript:void(0);"><img class="cacheload" src="<?php echo e($color['color_img']); ?>" data-src="<?php echo e($color['color_img']); ?>" alt="<?php echo e($color['color_name']); ?>"><?php echo e($color['color_name']); ?></a>
                                            </li>
                                        <?php else: ?>
                                            <li class="btn btn-biglarge" data-ver_id="<?php echo e($color['ver_id']); ?>" data-color_id="<?php echo e($color['color_id']); ?>" data-value="<?php echo e($color['color_name']); ?>" data-index="<?php echo e($k); ?>"><a href="javascript:void(0);"><img class="cacheload" src="<?php echo e($color['color_img']); ?>" data-src="<?php echo e($color['color_img']); ?>" alt="<?php echo e($color['color_name']); ?>"><?php echo e($color['color_name']); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        <!-- 已选择的产品 -->
                        <div class="pro-list" id="J_proList">
                            <ul>
                                <li class="totleName"><?php echo e($info->p_name); ?> <?php echo e(isset($versions)? $versions[0]['ver_name']:''); ?> <?php echo e(isset($versions)?$versions[0]['ver_spec']:''); ?> <?php echo e(isset($colorArr)?$colorArr[0]['color_name']:''); ?>   <span><?php echo e(isset($versions)? $versions[0]['price']:$info->price); ?>元</span>  </li>
                                <li class="totlePrice">  总计  ：<?php echo e(isset($versions)?$versions[0]['price']:$info->price); ?>元</li>
                            </ul>
                        </div>
                        <ul class="btn-wrap clearfix" id="J_buyBtnBox">
                            <li>
                            </li>
                        </ul>
                        <div class="pro-policy" id="J_policy">
                            <i class="iconfont support"></i>
                            <i class="iconfont nosupport hide"></i>
                            <span class="J_tips " style="margin-right:15px">支持7天无理由退货</span>
                            <?php if( $info->is_free_shipping == 0 ): ?>
                                <i class="iconfont support"></i>
                            <?php else: ?>
                                <i class="iconfont nosupport hide"></i>
                            <?php endif; ?>
                            <span class="J_tips ">包邮</span>
                        </div>
                    </div>
                    <div class="error hide J_error">
                        <h3>有点小问题，请点击按钮刷新重试</h3>
                        <a href="javascript:void(0)" class="btn btn-primary J_reload" data-stat-id="4cd574c9694dd9c9" >刷新</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- 商品信息 end -->
    <div class="pro-infomation" id="J_proInfo">
        <?php if( $info->category_id == 1 ): ?>
        <div class="section  is-visible preload">
            <img data-url="/uploads/product/buy_info/baozhuangqingdan.jpg!1266_604" class="slider done" src="/images/public/default.gif">
        </div>
        <?php endif; ?>
    <!-- 售后政策 start -->
        <div class="section  is-visible preload">
            <img data-url="/uploads/product/buy_info/shouhouzhengce.jpg!1266_604" class="slider done" src="/images/public/default.gif">
        </div>
    <!-- 售后正常 end -->
    </div>
    <!-- 主要内容 end -->
    <?php echo $__env->make('home.public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    @parent
    <script type="text/javascript" src="<?php echo e(asset('/js/home/product_buy.js')); ?>?ver=<?php echo time();  ?>"></script>
    <script>
        (function(){
            $.ajax({
                url:'/product/getVersionStatus/<?php echo e($info->id); ?>',
                type:'get',
                success:function(data){
                    if( data == 0 ){
                        $('#J_buyBtnBox li').html('<a href="javascript:void(0);" class="btn btn-primary btn-biglarge J_proBuyBtn" data-type="0">加入购物车</a>');
                    }else if( data == 1 ){
                        $('#J_buyBtnBox li').html('<a class="btn btn-gray btn-line-gray btn-biglarge btn- J_setRemind" href="javascript:void(0);" data-type="1">已下架</a>');
                    }else if( data == 2 ){
                        $('#J_buyBtnBox li').html('<a class="btn btn-line-primary btn-biglarge btn- J_setRemind" href="javascript:void(0);" data-type="2">新品预售</a>');
                    }else if( data == 3 ){
                        $('#J_buyBtnBox li').html('<a class="btn btn-red btn-biglarge J_setRemind" href="javascript:void(0);" data-type="3" disabled>缺货中</a>');
                    }else if( data == 4 ){
                        $('#J_buyBtnBox li').html('<a class="btn btn-line-primary btn-biglarge btn- J_setRemind" href="javascript:void(0);" data-type="4">新品上市</a>');
                    }
                }
            })
        })();
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>