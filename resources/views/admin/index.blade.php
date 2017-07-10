<?php
/**
 * File Name: index.blade.php
 * Description: 后台首页模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/19
 * Time: 23:36
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
        <!-- load css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/plugin/layui/css/layui.css') }}" media="all">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/global.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/font.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/backstage.css') }}">
    </head>
    <body>
        <!-- 内容正文-->
        <div class="layui-layout layui-layout-admin" id="layui_layout">
            <!-- 顶部区域 -->
            <div class="layui-header header-menu">
                <div class="logo posb" id="log"><img src="{{ asset('/images/admin/logo.png')  }}" width="200px" height="65px"></div>
                <div class="layui-main posb">
                    <!-- 左侧导航收缩开关 -->
                    <div class="side-menu-switch posb" id="toggle"><span class="switch"  ara-hidden="true"></span></div>
                    <!-- 顶级菜单 -->
                    <div class="larry-top-menu posb">
                        <ul class="layui-nav clearfix" id="menu">
                        </ul>
                    </div>
                    <!-- 右侧常用菜单导航 -->
                    <div class="larry-right-menu posb">
                        <ul class="layui-nav clearfix">
                            <li class="layui-nav-item">
                                <a class="onFullScreen" id="FullScreen"><i class="larry-icon larry-quanping"></i>全屏</a>
                            </li>
                            <li class="layui-nav-item">
                                <a id="clearCached"><i class="larry-icon larry-qingchuhuancun"></i>清除缓存</a>
                            </li>
                            <li class="layui-nav-item">
                                <a id="larryTheme"><i class="larry-icon larry-theme1"></i>设置主题</a>
                            </li>
                            <li class="layui-nav-item kjfs">
                                <a class="kuaijiefangshi"><i class="larry-icon larry-kuaijie"></i><cite>快捷方式</cite></a>
                                <dl class="layui-nav-child">
                                    <dd>
                                        <a href="/" target="_blank">网站前台</a>
                                    </dd>
                                </dl>
                            </li>
                            <li class="layui-nav-item exit">
                                <a  id="logout"><i class="larry-icon larry-exit"></i><cite>退出</cite></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 左侧导航 -->
            <div class="layui-side larrycms-left" id="larry-side">
                <div class="layui-side-scroll" >
                    <!-- 管理员信息      -->
                    <div class="user-info">
                        <div class="photo">
                            <img src="{{ asset('/images/admin/user.jpg') }}" alt="">
                        </div>
                        <p>{{ session('adminInfo')['username'] }}您好！欢迎登录</p>
                    </div>
                    <!-- 系统菜单 -->
                    <div class="sys-menu-box" >
                        <ul class="layui-nav layui-nav-tree" id="larrySideNav" lay-filter="side" >
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 右侧主题内容 -->
            <div class="layui-body" id="larry-body">
                <div class="layui-tab" id="larry-tab" lay-filter="larryTab">
                    <div class="larry-title-box">
                        <div class="go-left key-press pressKey" onclick="javascript:history.go(-1);" id="titleLeft" title="后退">
                            <i class="larry-icon larry-weibiaoti6-copy"></i> </div>
                        <ul class="layui-tab-title" lay-allowClose="true" id="layui-tab-title" lay-filter="subadd">
                            <li class="layui-this" id="admin-home"  lay-id="0" fresh=1>
                                <i class="larry-icon larry-houtaishouye"></i><em>后台首页</em>
                            </li>
                        </ul>
                        <div class="title-right" id="titleRbox">
                            <div class="go-right key-press pressKey" onclick="javascript:history.go(1);" id="titleRight" title="前进"><i class="larry-icon larry-right"></i></div>
                            <div class="refresh key-press" id="refresh_iframe"><i class="larry-icon larry-shuaxin2"></i><cite>刷新</cite></div>
                            <div class="often key-press" lay-filter='larryOperate' id="buttonRCtrl">
                                <ul class="layui-nav posr">
                                    <li class="layui-nav-item posb">
                                        <a class="top"><i class="larry-icon larry-caozuo"></i><cite>常用操作</cite></a>
                                        <dl class="layui-nav-child">
                                            <dd>
                                                <a data-eName="closeCurrent"><i class="larry-icon larry-guanbidangqianye"></i>关闭当前选项卡</a>
                                            </dd>
                                            <dd>
                                                <a data-eName="closeOther"><i class="larry-icon larry-guanbiqita"></i>关闭其他选项卡</a>
                                            </dd>
                                            <dd>
                                                <a data-eName="closeAll"><i class="larry-icon larry-guanbiquanbufenzu"></i>关闭全部选项卡</a>
                                            </dd>
                                            <dd>
                                                <a data-eName="refreshAdmin"><i class="larry-icon larry-kuangjia_daohang_shuaxin"></i>刷新后台</a>
                                            </dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">
                            <iframe class="larry-iframe" data-id='0' name="ifr_0" id='ifr0' src="{{ url('/admin/welcome') }}"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <div class="layui-footer layui-larry-foot psob" id="larry-footer">
                <div class="layui-main">
                    <p>2016-2017 © Write by FiresGroup  基于前端框架Layui 1.09</p>
                </div>
            </div>
            <!-- footer end -->
            <!-- layui-layout-admin end -->
        </div>
        <!-- 主题配置 -->
        <div class="larryThemeContent" id="LarryThemeSet" style="display:none;">
            <div class="larry-theme-form">
                <h3>系统主题预设</h3>
                <form action="" class="layui-form larry-theme-con">
                    <div class="layui-form-item select-theme">
                        <label class="layui-form-label">主题选择</label>
                        <div class="layui-input-block">
                            <select lay-filter="larryTheme"  lay-verify="" id="themeName">
                                <option value="larry">LarryCMS默认主题</option>
                                <option value="A">LarryCMS深蓝主题</option>
                                <option value="B">LarryCMS墨绿主题</option>
                                <option value="larry_">更多主题以后添加</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item fullscreen">
                        <label class="layui-form-label">是否全屏</label>
                        <div class="layui-input-block">
                            <input type="checkbox" lay-filter="fullscreen" lay-skin="switch"  value="1">
                        </div>
                    </div>
                    <div class="layui-form-item submit-form">
                        <button class="layui-btn larry-button" lay-submit="" lay-filter="submitlocal">立即设置主题</button>
                        <button type="reset" class="layui-btn layui-btn-primary">重置当前设置</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- layui-body常用菜单定义 -->
        <div class="rightMenu" id="rightMenu" style="display: none;">
            <ul>
                <li data-target="refreshCur">
                    <i class="larry-icon "></i>刷新当前页面
                </li>
                <li data-target="refreshKj">
                    <i class="larry-icon "></i>刷新后台
                </li>
                <li data-target="closeCurrent">
                    <i class="larry-icon "></i>关闭当前选项卡
                </li>
                <li data-target="closeOther">
                    <i class="larry-icon "></i>关闭其他选项卡
                </li>
                <li data-target="closeAll">
                    <i class="larry-icon "></i>全部关闭选项卡
                </li>
            </ul>
        </div>
        <!-- 屏幕锁屏 -->
        <div class="lock-screen" style="display: none;">
            <div class="lock-wrapper" id="lock-screen">
                <div id="time"></div>
                <div class="lock-box">
                    <img src="/images/admin/user.jpg" alt="">
                    <h1>{{ session('adminInfo')['username'] }}</h1>
                    <form action="" class="layui-form lock-form">
                        <div class="layui-form-item">
                            <input type="password" name="lock_password" lay-verify="pass" placeholder="锁屏状态，请输入密码解锁"
                                   autocomplete="off" class="layui-input" autofocus="">
                        </div>
                        <div class="layui-form-item">
                            <button class="layui-btn larry-btn" id="unlock">立即解锁</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- 加载 JS -->
        <script type="text/javascript" src="{{ asset('/plugin/layui/layui.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/admin/larry.js') }}"></script>
        <script>
            layui.use(['jquery','layer','navtab','elements'],function() {
                var $ = layui.jquery,
                    layer = layui.layer,
                    element = layui.elements(),
                    navtab = layui.navtab({
                        elem: '#larry-tab'
                    });

                //临时菜单
                $('div.sys-menu-box li.layui-nav-item').each(function(){
                    $(this).on('click', function(){
                        var th = $(this);
                        var href,title,icon,str,data;

                            href = th.children('a').attr('data-url');

                        if(href == undefined ){
                                th.addClass('layui-nav-itemed');
                        }else{
                                title = th.children('a').children('cite').html();
                                icon = th.children('a').children('i').attr('data-icon');
                                str  = '{"title":"'+title+'","icon":"'+icon+'","href":"'+href+'"}';
                                data =  eval('(' + str + ')');
                        }
                        navtab.tabAdd(data);
                    });
                });

            });
        </script>
    </body>
</html>
