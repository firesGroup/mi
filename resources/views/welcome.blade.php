@extends('layouts.iframe')

@section('title','商品评价')


@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/admin.css') }}">
@endsection

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>

    <div class="title" id="infoSwitch" style="">
        <blockquote class="layui-elem-quote col-md-4 head-con" style="border-radius:0px 10px 10px 0px ;
    }">
            <div class="title">
                <span>尊敬的 {{ session('adminInfo')['username'] }},您好!  &nbsp;現在時間是: </span><span id="showtime" value=""></span>
            </div>
            <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
        </blockquote>
    </div>

    <br>

    <div class="" style="width:auto;height: 105px;margin-left: 10px;">

        <div class="div">
            <div class="price" style="background-color: #01AAED;">
                <br>
                <i class="layui-icon i" style="color: white;">&#xe62c;</i>
            </div>
            <div class="content" style="">
                <h1 class="h1">10</h1>
                <p class="p">文章内容</p>
            </div>
        </div>

        <div class="div">
            <div class="price" style="background-color:#FF5722;">
                <br>
                <i class="layui-icon i">&#xe629;</i>
            </div>
            <div class="content">
                <h1 class="h1">10</h1>
                <p class="p">文章内容</p>
            </div>
        </div>

        <div class="div">
            <div class="price" style="background-color: #009688;">
                <br>
                <i class="layui-icon i" style="font-size: 40px;">&#xe62a;</i>
            </div>
            <div class="content">
                <h1 class="h1">10</h1>
                <p class="p">文章内容</p>
            </div>
        </div>

        <div class="div">
            <div class="price" style="background-color: #5FB878;">
                <br>
                <i class="layui-icon i">&#xe606;</i>

            </div>
            <div class="content">
                <h1 class="h1">10</h1>
                <p class="p">文章内容</p>
            </div>
        </div>

        <div class="div">
            <div class="price" style="background-color: #F7B824;">
                <br>
                <i class="layui-icon i">&#xe609;</i>

            </div>

            <div class="content">
                <h1 class="h1">10</h1>
                <p class="p">文章内容</p>
            </div>
        </div>

        <div class="div">
            <div class="price" style="background-color: #2F4056;">
                <br>
                <i class="layui-icon" style="font-size: 40px;">&#xe64c;</i>

            </div>
            <div class="content">
                <h1 class="h1">10</h1>
                <p class="p">文章内容</p>
            </div>
        </div>


    </div>

    <div>

        <div class="layui-collapse left">
            <div class="layui-colla-item">
                <h2 class="layui-colla-title h2">系统概览</h2>
                <div class="layui-colla-content layui-show">
                    <table class="layui-table">
                        <tbody>
                        <tr>
                            <td>系统名称:</td>
                            <td>LarryCMS</td>
                        </tr>
                        <tr>
                            <td>版本信息:</td>
                            <td>V01_UTF8_1.09 ( iframe版 )</td>
                        </tr>
                        <tr>
                            <td>开发者:</td>
                            <td style="color: #FF5722;">FiresGroup</td>
                        </tr>
                        <tr>
                            <td>网站域名:</td>
                            <td><a href="www.mi.cm" target="_blank" style="color: #FF5722;">www.mi.cm</a></td>
                        </tr>
                        <tr>
                            <td>当前登录用户:</td>
                            <td>admin</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="layui-collapse right">
            <div class="layui-colla-item">
                <h2 class="layui-colla-title" style="background-color: white;">公告</h2>
                <div class="layui-colla-content layui-show" style="background-color: white;">
                    &nbsp;在<b style="color: #FF5722;font-size: 18px;">FiresGroup</b>的20天不断努力下,终于完成这个伟大又有情怀的艺术品!&nbsp;&nbsp;在组长
                    <b style="color: #FF5722;font-size: 20px;">showkw</b>的带领下,一路神挡杀神,佛挡弑佛! 遥指问天还有谁!
                </div>
            </div>
        </div>

        <div style="clear: both;margin-top: 15px;" class="layui-collapse left">
            <div class="layui-collapse">
                <div class="layui-colla-item">
                    <h2 class="layui-colla-title h2">LarryCMS 更新日志</h2>
                    <div class="layui-colla-content layui-show">
                        <ul>
                            <li style="font-size: 15px;"><b>V01_UTF8_1.09 ( iframe版 ) 2017-05-30</b></li>
                            <li>#tab选项卡针对layui 1.09_rls 不能切换关闭的问题修复</li>
                            <li>#增加json生成三级菜单tab选项卡切换</li>
                            <li>#tab选项卡内页增加添加按钮，增加页面在选项卡面板上打开</li>
                            <li>#tab选项卡增加常用操作控制功能（如关闭系列、刷新）/li>
                            <li>#tab选项卡溢出左右滑动和自动定位当前选项卡</li>
                            <li>#主题设置功能，可选主题（目前提供默认、深蓝、墨绿主题 后期提供自定义配色主题设置）</li>
                            <li>#全屏切换配合主题设置，模拟F11全屏</li>
                            <li>#tab选项卡内按钮在选项卡面板打开定位</li>
                            <li>注：也许当前你看的LarryCMS模板只有一个基础的空架子并没有多少实用功能，如果你喜欢它，别灰心在后续更新中···它会变强大的</li>
                        </ul>

                        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
                            <legend>未完待续</legend>
                        </fieldset>

                        <fieldset class="layui-elem-field">
                            <legend>下个版本更新</legend>
                            <div class="layui-field-box">
                                如：datatable、json数据表格分页、基于flex的grid布局、通用菜单按钮级权限模块等模块功能这些会在后续更新中相继推出（当然有一些后台最常用的功能在layui官方2.0中可能会出现，同时十分期待2.0，有时候不需要重复造轮子，在后期更新中选择性更新，目前只是一个cms后台通用模版，有瑕疵和改进的地方希望大家帮忙多提建议！待LarryCMS整体完成后分享基于ThinkPHP+layim聊天功能的cms系统）
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

        <div class="layui-collapse right">
            <div class="layui-colla-item">
                <h2 class="layui-colla-title" style="background-color: white;">数据统计</h2>
                <div class="layui-colla-content layui-show" style="background-color: white;">

                    {{--饼状图--}}
                    <table id='myTable5'>
                        <caption>会员地区分布</caption>
                        <thead>
                        <tr>
                            <th></th>
                            <th>河北</th>
                            <th>河南</th>
                            <th>湖北</th>
                            <th>湖南</th>
                            <th>山东</th>
                            <th>山西</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>1200</th>
                            <td>540</td>
                            <td>300</td>
                            <td>150</td>
                            <td>180</td>
                            <td>120</td>
                            <td>180</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>

        </div>

    </div>
</body>
<script type="text/javascript" src="{{ asset('/plugin/layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/larry.js') }}"></script>
<script>

    function showTime() {
        var show_day = new Array('星期一', '星期二', '星期三', '星期四', '星期五', '星期六', '星期日');
        var obj = new Date();
        var day = obj.getDay();

        var year = obj.getFullYear();
        var month = obj.getMonth() + 1;
        var date = obj.getDate();
        var hour = obj.getHours();
        var minutes = obj.getMinutes();
        var second = obj.getSeconds();
        month < 10 ? month = '0' + month : month;
        hour < 10 ? hour = '0' + hour : hour;
        minutes < 10 ? minutes = '0' + minutes : minutes;
        second < 10 ? second = '0' + second : second;
        var ntime = year + '年' + month + '月' + date + '日' + ' ' + show_day[day - 1] + ' ' + hour + ':' + minutes + ':' + second;
        document.getElementById('showtime').innerHTML = ntime;
        setTimeout("showTime();", 1000);
    }

    showTime();
</script>
</html>