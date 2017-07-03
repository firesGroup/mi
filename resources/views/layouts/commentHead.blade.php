<?php
/**
 * File Name: commentHead.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/29
 * Time: 19:06
 */
?>
        @extends('layouts.home')
@section('comment')
        @show

{{--黑色头--}}
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
            <a href="//www.mi.com/index.html">小米商城</a><span class="sep">|</span><a href="http://www.miui.com/"
                                                                                   target="_blank">MIUI</a><span
                    class="sep">|</span><a href="http://www.miliao.com/" target="_blank">米聊</a><span
                    class="sep">|</span><a href="http://game.xiaomi.com/" target="_blank">游戏</a><span
                    class="sep">|</span><a href="http://www.duokan.com/" target="_blank">多看阅读</a><span
                    class="sep">|</span><a href="https://i.mi.com/" target="_blank">云服务</a><span class="sep">|</span><a
                    href="https://jr.mi.com?from=micom" target="_blank">金融</a><span class="sep">|</span><a
                    href="//www.mi.com/appdownload/" target="_blank">小米商城移动版</a><span class="sep">|</span><a
                    href="//static.mi.com/feedback/" target="_blank">问题反馈</a><span class="sep">|</span><a
                    href="#J_modal-globalSites" data-toggle="modal">Select Region</a>
        </div>
        <div class="topbar-cart" id="J_miniCartTrigger">
            <a class="cart-mini" id="J_miniCartBtn" href="//static.mi.com/cart/"><i
                        class="iconfont">&#xe60c;</i>购物车<span class="cart-mini-num J_cartNum"></span></a>
            <div class="cart-menu" id="J_miniCartMenu">
                <div class="loading">
                    <div class="loader"></div>
                </div>
            </div>
        </div>
        <div class="topbar-info" id="J_userInfo">
            <a class="link" href="//order.mi.com/site/login" data-needlogin="true">登录</a><span class="sep">|</span><a
                    class="link" href="https://account.xiaomi.com/pass/register">注册</a></div>
    </div>
</div>

{{--商品分类--}}
<div class="site-header">
    <div class="container">
        <div class="header-logo">
            <a class="logo ir" href="//www.mi.com/index.html" title="小米官网">小米官网</a>
        </div>
        <div class="header-nav">
            <ul class="nav-list J_navMainList clearfix">
                <li id="J_navCategory" class="nav-category">
                    <a class="link-category" href="//list.mi.com"><span class="text">全部商品分类</span></a>
                </li>
                <li class="nav-item">
                    <a class="link" href="javascript: void(0);"><span class="text">小米手机</span><span
                                class="arrow"></span></a>
                    <div class="item-children">
                        <div class="container">
                            <ul class="children-list clearfix">
                                <li class="first">
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mi6/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/xm6_320.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/xm6_320.png 2x" alt="小米6"
                                                    width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mi6/">小米6</a></div>
                                    <p class="price">2499元起</p>
                                    <div class="flags">
                                        <div class="flag">新品</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/max2/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/max2_toubu.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/max2_toubu.png 2x"
                                                    alt="小米Max 2" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/max2/">小米Max 2</a></div>
                                    <p class="price">1699元起</p>
                                    <div class="flags">
                                        <div class="flag">新品</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/minote2/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/xiaomiNOTE2-320-220!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/xiaomiNOTE2-320-220!320x220.jpg 2x"
                                                    alt="小米Note 2" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/minote2/">小米Note 2</a></div>
                                    <p class="price">2799元起</p>
                                    <div class="flags">
                                        <div class="flag">现货</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mix/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/MIX-320-220!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/MIX-320-220!320x220.jpg 2x"
                                                    alt="小米MIX" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mix/">小米MIX</a></div>
                                    <p class="price">3499元起</p>
                                    <div class="flags">
                                        <div class="flag">现货</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mi5splus/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/5spluse320_220!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/5spluse320_220!320x220.jpg 2x"
                                                    alt="小米5s Plus" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mi5splus/">小米5s Plus</a></div>
                                    <p class="price">2299元起</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mi5c/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/mi5c_320x220.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/mi5c_320x220.png 2x"
                                                    alt="小米手机5c" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mi5c/">小米手机5c</a></div>
                                    <p class="price">1499元</p></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="link" href="javascript: void(0);"><span class="text">红米</span><span class="arrow"></span></a>
                    <div class="item-children">
                        <div class="container">
                            <ul class="children-list clearfix">
                                <li class="first">
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/redminote4x/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/hmn4xtb!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/hmn4xtb!320x220.jpg 2x"
                                                    alt="红米Note 4X" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/redminote4x/">红米Note 4X</a></div>
                                    <p class="price">799元起</p>
                                    <div class="flags">
                                        <div class="flag">热卖</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/redmi4x/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/hm4x!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/hm4x!320x220.jpg 2x"
                                                    alt="红米4X" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/redmi4x/">红米4X</a></div>
                                    <p class="price">699元起</p>
                                    <div class="flags">
                                        <div class="flag">热卖</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/redmi4a/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/hm4a320.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/hm4a320.png 2x"
                                                    alt="红米4A" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/redmi4a/">红米4A</a></div>
                                    <p class="price">599元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/redmi4"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/320-2202!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/320-2202!320x220.jpg 2x"
                                                    alt="红米4" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/redmi4">红米4</a></div>
                                    <p class="price">799元起</p></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="link" href="javascript: void(0);"><span class="text">平板 · 笔记本</span><span
                                class="arrow"></span></a>
                    <div class="item-children">
                        <div class="container">
                            <ul class="children-list clearfix">
                                <li class="first">
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mipad3/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/mipad3_320.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/mipad3_320.png 2x"
                                                    alt="小米平板3 64GB" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mipad3/">小米平板3 64GB</a></div>
                                    <p class="price">1499元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mibookair-12/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/video/bijiben32012.5!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/video/bijiben32012.5!320x220.jpg 2x"
                                                    alt="小米笔记本Air 12.5" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mibookair-12/">小米笔记本Air 12.5"</a></div>
                                    <p class="price">3599元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mibookair/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/bijiben320!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/bijiben320!320x220.jpg 2x"
                                                    alt="小米笔记本Air 13.3" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mibookair/">小米笔记本Air 13.3"</a></div>
                                    <p class="price">4799元</p>
                                    <div class="flags">
                                        <div class="flag">新品</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="link" href="javascript: void(0);"><span class="text">电视</span><span class="arrow"></span></a>
                    <div class="item-children">
                        <div class="container">
                            <ul class="children-list clearfix">
                                <li class="first">
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mitv4/49/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/xmds_49.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/xmds_49.png 2x"
                                                    alt="小米电视4 49英寸" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mitv4/49/">小米电视4 49英寸</a></div>
                                    <p class="price">3499元</p>
                                    <div class="flags">
                                        <div class="flag">新品</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mitv4/55/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/xmds_55.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/xmds_55.png 2x"
                                                    alt="小米电视4 55英寸" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mitv4/55/">小米电视4 55英寸</a></div>
                                    <p class="price">3999元</p>
                                    <div class="flags">
                                        <div class="flag">新品</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mitv4/65/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/xmds_65.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/xmds_65.png 2x"
                                                    alt="小米电视4 65英寸" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mitv4/65/">小米电视4 65英寸</a></div>
                                    <p class="price">9999元</p>
                                    <div class="flags">
                                        <div class="flag">新品</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mitv4A/43/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/320_43.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/320_43.png 2x"
                                                    alt="小米电视4A 43英寸" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mitv4A/43/">小米电视4A 43英寸</a></div>
                                    <p class="price">2099元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mitv4A/49/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/320_49.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/320_49.png 2x"
                                                    alt="小米电视4A 49英寸" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mitv4A/49/">小米电视4A 49英寸</a></div>
                                    <p class="price">2599元起</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/buytv/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/70dianshi.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/70dianshi.png 2x"
                                                    alt="查看全部<br/>小米电视" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/buytv/">查看全部<br/>小米电视</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="link" href="javascript: void(0);"><span class="text">盒子 · 影音</span><span
                                class="arrow"></span></a>
                    <div class="item-children">
                        <div class="container">
                            <ul class="children-list clearfix">
                                <li class="first">
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mibox3s/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/mihezi.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/mihezi.png 2x"
                                                    alt="小米盒子3s" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mibox3s/">小米盒子3s</a></div>
                                    <p class="price">299元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mibox3c/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/mihezi.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/mihezi.png 2x"
                                                    alt="小米盒子3c" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mibox3c/">小米盒子3c</a></div>
                                    <p class="price">199元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/hezi3s/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/15/goods/nav/hezi3s!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/15/goods/nav/hezi3s!320x220.jpg 2x"
                                                    alt="小米盒子3 增强版" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/hezi3s/">小米盒子3 增强版</a></div>
                                    <p class="price">399元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/misurround/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/320x220.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/320x220.png 2x"
                                                    alt="小米家庭影院" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/misurround/">小米家庭影院</a></div>
                                    <p class="price">1999元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//item.mi.com/1160800074.html"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/putonban!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/putonban!320x220.jpg 2x"
                                                    alt="小米家庭音响 标准版" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//item.mi.com/1160800074.html">小米家庭音响 标准版</a></div>
                                    <p class="price">699元</p></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="link" href="javascript: void(0);"><span class="text">路由器</span><span class="arrow"></span></a>
                    <div class="item-children">
                        <div class="container">
                            <ul class="children-list clearfix">
                                <li class="first">
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/miwifihd/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/HD-Pro.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/HD-Pro.png 2x"
                                                    alt="小米路由器 HD/Pro" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/miwifihd/">小米路由器 HD/Pro</a></div>
                                    <p class="price">499元起</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/miwifi3g/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/3G.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/3G.png 2x" alt="小米路由器 3G"
                                                    width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/miwifi3g/">小米路由器 3G</a></div>
                                    <p class="price">249元</p>
                                    <div class="flags">
                                        <div class="flag">新品</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/miwifi3/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/xmlyq3.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/xmlyq3.png 2x"
                                                    alt="小米路由器 3" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/miwifi3/">小米路由器 3</a></div>
                                    <p class="price">149元</p>
                                    <div class="flags">
                                        <div class="flag">包邮</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/miwifi3c/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/3C.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/3C.png 2x" alt="小米路由器 3C"
                                                    width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/miwifi3c/">小米路由器 3C</a></div>
                                    <p class="price">99元</p>
                                    <div class="flags">
                                        <div class="flag">包邮</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/plc/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/dlm01.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/dlm01.png 2x"
                                                    alt="小米WiFi电力猫" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/plc/">小米WiFi电力猫</a></div>
                                    <p class="price">249元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//item.mi.com/1164700010.html"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/fdq2!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/fdq2!320x220.jpg 2x"
                                                    alt="小米WiFi放大器 2" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//item.mi.com/1164700010.html">小米WiFi放大器 2</a></div>
                                    <p class="price">49元</p></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="link" href="javascript:void(0);"><span class="text">智能硬件</span><span class="arrow"></span></a>
                    <div class="item-children">
                        <div class="container">
                            <ul class="children-list clearfix">
                                <li class="first">
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/scale2/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/tzc320!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/tzc320!320x220.jpg 2x"
                                                    alt="小米体脂秤" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/scale2/">小米体脂秤</a></div>
                                    <p class="price">199元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/shouhuan2/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/sh2-320-220.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/sh2-320-220.png 2x"
                                                    alt="小米手环2" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/shouhuan2/">小米手环2</a></div>
                                    <p class="price">149元</p>
                                    <div class="flags">
                                        <div class="flag">包邮</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/water3/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/jsqcs-320-220.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/jsqcs-320-220.png 2x"
                                                    alt="小米净水器" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/water3/">小米净水器</a></div>
                                    <p class="price">1499元起</p>
                                    <div class="flags">
                                        <div class="flag">新品</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/mivr2c/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/xmvrplay2.png"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/xmvrplay2.png 2x"
                                                    alt="小米VR眼镜 PLAY2" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/mivr2c/">小米VR眼镜 PLAY2</a></div>
                                    <p class="price">99元</p>
                                    <div class="flags">
                                        <div class="flag">新品</div>
                                    </div>
                                </li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/dianfanbao2/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/g/2015/cn-index/dfb!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/g/2015/cn-index/dfb!320x220.jpg 2x"
                                                    alt="米家IH电饭煲" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/dianfanbao2/">米家IH电饭煲</a></div>
                                    <p class="price">399元</p></li>
                                <li>
                                    <div class="figure figure-thumb">
                                        <a href="//www.mi.com/smart/"><img
                                                    src="//c1.mifile.cn/f/i/2014/cn/placeholder-220!110x110.png"
                                                    data-src="//c1.mifile.cn/f/i/16/goods/nav/air2!160x110.jpg"
                                                    srcset="//c1.mifile.cn/f/i/16/goods/nav/air2!320x220.jpg 2x"
                                                    alt="查看全部<br/>智能硬件" width="160" height="110"/></a>
                                    </div>
                                    <div class="title"><a href="//www.mi.com/smart/">查看全部<br/>智能硬件</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="link" href="//www.mi.com/service/" target="_blank"><span class="text">服务</span></a>
                </li>
                <li class="nav-item">
                    <a class="link" href="http://www.xiaomi.cn" target="_blank"><span class="text">社区</span></a>
                </li>
            </ul>
        </div>
        <div class="header-search">
            <form id="J_searchForm" class="search-form clearfix" action="//search.mi.com/search" method="get">
                <label for="search" class="hide">站内搜索</label>
                <input class="search-text" type="search" id="search" name="keyword" autocomplete="off"
                       data-search-config="{'defaultWords':[{'Key':'小米6','Rst':7},{'Key':'红米Note&nbsp;4X','Rst':8},{'Key':'小米MIX','Rst':1},{'Key':'小米Max2','Rst':3},{'Key':'小米手机5c','Rst':3},{'Key':'手环','Rst':6},{'Key':'耳机','Rst':19},{'Key':'充电宝','Rst':19},{'Key':'运动鞋','Rst':2},{'Key':'路由器','Rst':17},{'Key':'小米盒子','Rst':8}]}"/>
                <input type="submit" class="search-btn iconfont" value="&#xe616;"/>
                <div class="search-hot-words">
                    <a href="https://search.mi.com/search_%E5%B0%8F%E7%B1%B3%E5%B9%B3%E8%A1%A1%E8%BD%A6">九号平衡车</a><a
                            href="https://item.mi.com/product/10000031.html">红米4X</a></div>
            </form>
        </div>
    </div>
</div>


@yield('content')




@section('js')
@parent

    @endsection


