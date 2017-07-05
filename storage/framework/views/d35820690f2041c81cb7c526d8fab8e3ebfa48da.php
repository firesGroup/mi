<?php
/**
 * File Name: comment.blade.php
 * Description:收藏商品
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/29
 * Time: 16:07
 */
?>


<?php $__env->startSection('title', '个人信息'); ?>
<?php $__env->startSection('css'); ?>
    @parent
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/home/member_center.css')); ?>">
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.public.header_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('home.public.header_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="breadcrumbs">
        <div class="container">
            <a href="//www.mi.com/index.html" data-stat-id="b0bcd814768c68cc" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b0bcd814768c68cc', '//www.mi.com/index.html', 'pcpid', '']);">首页</a><span class="sep">&gt;</span><span>我的收藏夹</span>    </div>
    </div>
    <div class="page-main user-main">
        <div class="container">
            <div class="row">
    <?php echo $__env->make('home.member.member_modoul', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="span16">
                    <div class="uc-box uc-main-box">
                        <div class="uc-content-box">
                            <div class="box-hd">
                                <h1 class="title">喜欢的商品</h1>
                                <div class="more clearfix hide">
                                    <ul class="filter-list J_addrType">
                                        <li class="first active"><a href="https://order.mi.com/user/favorite?r=33599.1499271851" data-stat-id="23ba2e43c89c0180" onclick="_msq.push(['trackEvent', 'feb1a1bd3287842e-23ba2e43c89c0180', 'https://order.mi.com/user/favorite', 'pcpid', '']);">喜欢的商品</a></li>
                                        <li><a href="https://order.mi.com/user/favorite?is_sale=0&amp;r=33599.1499271851" data-stat-id="2cd4af44ff3ad6c5" onclick="_msq.push(['trackEvent', 'feb1a1bd3287842e-2cd4af44ff3ad6c5', 'https://order.mi.com/user/favorite', 'pcpid', '']);">已下架的商品</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-bd">
                                <div class="xm-goods-list-wrap">
                                    <ul class="xm-goods-list clearfix">
                                        <li class="xm-goods-item">
                                            <div class="figure figure-img"><a href="" target="_blank" data-stat-id="fc9873efedb44702"><img src="//i1.mifile.cn/a1/pms_1480575206.66418698!200x200.jpg"></a></div>
                                            <h3 class="title"><a href="" target="_blank" data-stat-id="f2ac222821cd93f4" onclick="">Amazfit手环 月霜</a></h3>
                                            <p class="price">
                                                299元                                                                                    </p>
                                            <p class="rank">
                                            </p>
                                            <div class="actions">
                                                <a id="1154600018_favorite" class="btn btn-small btn-line-gray J_delFav" href="" onclick="">删除</a>
                                                <a class="btn btn-small btn-primary" target="_blank" href="" data-stat-id="7ebd40e42b39e0b4" onclick="">查看详情</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="xm-pagenavi"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    @parent
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>