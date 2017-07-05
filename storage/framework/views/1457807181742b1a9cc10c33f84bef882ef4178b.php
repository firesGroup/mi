<?php
/**
 * File Name: index.blade.php
 * Description: 会员中心
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/29
 * Time: 20:43
 */
?>


<?php $__env->startSection('title', '会员中心'); ?>
    <?php $__env->startSection('css'); ?>;
        @parent
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/home/member_center.css')); ?>">
 <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.public.header_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('home.public.header_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="breadcrumbs">
        <div class="container">
            <a href="//www.mi.com/index.html" data-stat-id="b0bcd814768c68cc" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b0bcd814768c68cc', '//www.mi.com/index.html', 'pcpid', '']);">首页</a><span class="sep">&gt;</span><span>个人中心</span>    </div>
    </div>

    <div class="page-main user-main">
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="uc-box uc-sub-box">
                        <div class="uc-nav-box">
                            <div class="box-hd">
                                <h3 class="title">订单中心</h3>
                            </div>
                            <div class="box-bd">
                                <ul class="uc-nav-list">
                                    <li><a href="//static.mi.com/order/" data-stat-id="8f3d1bffd166dc22" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-8f3d1bffd166dc22', '//static.mi.com/order/', 'pcpid', '']);">我的订单</a></li>
                                    <li><a href="//service.order.mi.com/insurance/payServiceList?_r=76289.1499093562" data-stat-id="27e28cea14a6a442" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-27e28cea14a6a442', '//service.order.mi.com/insurance/payServiceList', 'pcpid', '']);">意外保</a></li>
                                    <li><a href="//static.mi.com/order/#type=11" data-stat-id="1a3f726cf268373b" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-1a3f726cf268373b', '//static.mi.com/order/#type=11', 'pcpid', '']);">团购订单</a></li>
                                    <li><a href="https://order.mi.com/user/comment?filter=1&amp;r=76289.1499093562" data-count="comment" data-count-style="bracket" data-stat-id="5f9f5c27483df260" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-5f9f5c27483df260', 'https://order.mi.com/user/comment', 'pcpid', '']);">评价晒单</a></li>
                                    <li><a href="//recharge.10046.mi.com/list" data-stat-id="dfa55526dc42769c" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-dfa55526dc42769c', '//recharge.10046.mi.com/list', 'pcpid', '']);">话费充值订单</a></li>
                                    <li><a href="//huanxin.mi.com/order/list?r=76289.1499093562" data-stat-id="b9e200a355e96de4" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b9e200a355e96de4', '//huanxin.mi.com/order/list', 'pcpid', '']);">以旧换新订单</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uc-nav-box">
                            <div class="box-hd">
                                <h3 class="title">个人中心</h3>
                            </div>
                            <div class="box-bd">
                                <ul class="uc-nav-list">
                                    <li class="active"><a href="https://order.mi.com/portal?r=76289.1499093562" data-stat-id="e171266eb8fa4af6" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-e171266eb8fa4af6', 'https://order.mi.com/portal', 'pcpid', '']);">我的个人中心</a></li>
                                    <li><a href="https://order.mi.com/message/list?r=76289.1499093562" data-stat-id="47f234bf0d4d7bbb" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-47f234bf0d4d7bbb', 'https://order.mi.com/message/list', 'pcpid', '']);">消息通知<i class="J_miMessageTotal"></i></a></li>
                                    <li><a href="https://order.mi.com/invite/list?r=76289.1499093562" data-stat-id="fb2d566e0bfd1335" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-fb2d566e0bfd1335', 'https://order.mi.com/invite/list', 'pcpid', '']);">购买资格<i class="J_miInviteTotal"></i></a></li>
                                    <li><a href="https://order.mi.com/cashAccount?r=76289.1499093562" data-stat-id="c4cd67b3b40a9d9a" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-c4cd67b3b40a9d9a', 'https://order.mi.com/cashAccount', 'pcpid', '']);">现金账户</a></li>
                                    <li><a href="https://order.mi.com/ecard/bind?r=76289.1499093562" data-stat-id="68c5fcc53f12f0f9" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-68c5fcc53f12f0f9', 'https://order.mi.com/ecard/bind', 'pcpid', '']);">小米礼品卡</a></li>
                                    <li><a href="https://order.mi.com/huanxin/list?r=76289.1499093562" data-stat-id="2e7e0d30e8b96465" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-2e7e0d30e8b96465', 'https://order.mi.com/huanxin/list', 'pcpid', '']);">现金券</a></li>
                                    <li><a href="https://order.mi.com/user/favorite?r=76289.1499093562" data-stat-id="15abb12569146c4d" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-15abb12569146c4d', 'https://order.mi.com/user/favorite', 'pcpid', '']);">喜欢的商品</a></li>
                                    <li><a href="https://order.mi.com/user/coupon?r=76289.1499093562" data-stat-id="0699849a20bfe76e" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-0699849a20bfe76e', 'https://order.mi.com/user/coupon', 'pcpid', '']);">优惠券</a></li>
                                    <li><a href="https://order.mi.com/user/address?r=76289.1499093562" data-stat-id="becec4bcb77b9d67" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-becec4bcb77b9d67', 'https://order.mi.com/user/address', 'pcpid', '']);">收货地址</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uc-nav-box">
                            <div class="box-hd">
                                <h3 class="title">售后服务</h3>
                            </div>
                            <div class="box-bd">
                                <ul class="uc-nav-list">
                                    <li><a href="//service.order.mi.com/record/list?_r=76289.1499093562" data-stat-id="8a49455bc55c699d" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-8a49455bc55c699d', '//service.order.mi.com/record/list', 'pcpid', '']);">服务记录</a></li>
                                    <li><a href="//service.order.mi.com/apply/front?_r=76289.1499093562" data-stat-id="eb07187db0d9c11d" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-eb07187db0d9c11d', '//service.order.mi.com/apply/front', 'pcpid', '']);">申请服务</a></li>
                                    <li><a href="//service.order.mi.com/user/compensate?_r=76289.1499093562" data-stat-id="b6260cb96c1b1bc1" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b6260cb96c1b1bc1', '//service.order.mi.com/user/compensate', 'pcpid', '']);">领取快递报销</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="uc-nav-box">
                            <div class="box-hd">
                                <h3 class="title">账户管理</h3>
                            </div>
                            <div class="box-bd">
                                <ul class="uc-nav-list">
                                    <li><a href="https://account.xiaomi.com/" target="_blank" data-stat-id="35eef2fd7467d6ca" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-35eef2fd7467d6ca', 'https://account.xiaomi.com/', 'pcpid', '']);">个人信息</a></li>
                                    <li><a href="https://account.xiaomi.com/pass/auth/security/home#service=setPassword" target="_blank" data-stat-id="ae5ee0188510f1e6" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-ae5ee0188510f1e6', 'https://account.xiaomi.com/pass/auth/security/home#service=setPassword', 'pcpid', '']);">修改密码</a></li>
                                    <li><a href="http://uvip.xiaomi.cn" target="_blank" data-stat-id="c130c3dbf41fd4d8" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-c130c3dbf41fd4d8', 'http://uvip.xiaomi.cn', 'pcpid', '']);">社区VIP认证</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="span16">
                    <div class="protal-content-update hide">
                        <div class="protal-username">
                            Hi, ……        </div>
                        <p class="msg">我们做了一个小升级：你的用户名可以直接修改啦，去换个酷炫的名字吧。<a href="https://account.xiaomi.com/pass/auth/profile/home" target="_blank" data-stat-id="a7bae9e996d7d321" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a7bae9e996d7d321', 'https://account.xiaomi.com/pass/auth/profile/home', 'pcpid', '']);"> 立即前往&gt;</a></p>
                    </div>
                    <div class="uc-box uc-main-box">
                        <div class="uc-content-box portal-content-box">
                            <div class="box-bd">
                                <div class="portal-main clearfix">
                                    <div class="user-card">
                                        <h2 class="username">……</h2>
                                        <p class="tip">晚上好</p>
                                        <a class="link" href="https://account.xiaomi.com/pass/userInfo" target="_blank" data-stat-id="4b099f76f8f470d2" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-4b099f76f8f470d2', 'https://account.xiaomi.com/pass/userInfo', 'pcpid', '']);">修改个人信息 &gt;</a>
                                        <img class="avatar" src="https://account.xiaomi.com/static/img/passport/photo.jpg" width="150" height="150" alt="……">
                                    </div>
                                    <div class="user-actions">
                                        <ul class="action-list">
                                            <li>账户安全：<span class="level level-2">普通</span></li>
                                            <li>绑定手机：<span class="tel">136********02</span></li>

                                            <li>绑定邮箱：<span class="tel"></span><a class="btn btn-small btn-primary" href="https://account.xiaomi.com/pass/userInfo" target="_blank" data-stat-id="f51e486b2c529448" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-f51e486b2c529448', 'https://account.xiaomi.com/pass/userInfo', 'pcpid', '']);">绑定</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="portal-sub">
                                    <ul class="info-list clearfix">
                                        <li>
                                            <h3>待支付的订单：<span class="num">0</span></h3>
                                            <a href="//static.mi.com/order/?type=7" data-stat-id="dd6496f77a167a5d" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-dd6496f77a167a5d', '//static.mi.com/order/', 'pcpid', '']);">查看待支付订单<i class="iconfont"></i></a>
                                            <img src="//s01.mifile.cn/i/user/portal-icon-1.png" alt="">
                                        </li>
                                        <li>
                                            <h3>待收货的订单：<span class="num">0</span></h3>
                                            <a href="//static.mi.com/order/?type=8" data-stat-id="92fa860987c1c734" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-92fa860987c1c734', '//static.mi.com/order/', 'pcpid', '']);">查看待收货订单<i class="iconfont"></i></a>
                                            <img src="//s01.mifile.cn/i/user/portal-icon-2.png" alt="">
                                        </li>
                                        <li>
                                            <h3>待评价商品数：<span class="num">0</span></h3>
                                            <a href="https://order.mi.com/user/comment?filter=1&amp;r=76289.1499093562" data-stat-id="a79855fd870c7127" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a79855fd870c7127', 'https://order.mi.com/user/comment', 'pcpid', '']);">查看待评价商品<i class="iconfont"></i></a>
                                            <img src="//s01.mifile.cn/i/user/portal-icon-3.png" alt="">
                                        </li>
                                        <li>
                                            <h3>喜欢的商品：<span class="num">0</span></h3>
                                            <a href="https://order.mi.com/user/favorite?r=76289.1499093562" data-stat-id="2e12d1c281c603d3" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-2e12d1c281c603d3', 'https://order.mi.com/user/favorite', 'pcpid', '']);">查看喜欢的商品<i class="iconfont"></i></a>
                                            <img src="//s01.mifile.cn/i/user/portal-icon-4.png" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        </div>
        </div>
    </div>
    <?php echo $__env->make('home.public.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @parent
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>