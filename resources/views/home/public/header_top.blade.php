<?php
/**
 * File Name: topNav.blade.php
 * Description: 全站顶部导航模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 23:14
 */
?>

<!-- 公共顶部 start -->
    <div class="site-topbar">
        <div class="container">
            <div class="topbar-nav">
                <a rel="nofollow" href="">小米商城</a>
                <span class="sep">|</span>
                <a rel="nofollow" href="" target="_blank">MIUI</a>
                <span class="sep">|</span>
                <a rel="nofollow" href="" target="_blank">米聊</a>
                <span class="sep">|</span>
                <a rel="nofollow" href="" target="_blank">游戏</a>
                <span class="sep">|</span>
                <a rel="nofollow" href="" target="_blank">多看阅读</a>
                <span class="sep">|</span>
                <a rel="nofollow" href="" target="_blank">云服务</a>
                <span class="sep">|</span>
                <a rel="nofollow" href="" target="_blank">金融</a>
                <span class="sep">|</span>
                <a rel="nofollow" href="" target="_blank">小米商城移动版</a>
                <span class="sep">|</span>
                <a rel="nofollow" href="" target="_blank">问题反馈</a>
                <span class="sep">|</span>
                <a rel="nofollow" href="#J_modal-globalSites" data-toggle="modal">Select Region</a>
            </div>
            <div class="topbar-cart" id="J_miniCartTrigger" >
                <a rel="nofollow" class="cart-mini" id="J_miniCartBtn" href="" data-event="mouseover">
                    <i class="iconfont">&#xe60c;</i>购物车
                    <span class="cart-mini-num J_cartNum"></span>
                </a>
                <div class="cart-menu" id="J_miniCartMenu">
                    <div class="loading">
                        <div class="loader">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="topbar-info" id="J_userInfo">
                <a  rel="nofollow" class="link" href="" data-needlogin="true">登录</a>
                <span class="sep">|</span>
                <a  rel="nofollow" class="link" href="" >注册</a>
            </div>
        </div>
    </div>
<!-- 公共顶部 end -->
