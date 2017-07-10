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
        <div class="layui-colla-content layui-show">
            <table class="layui-table">
                <tbody>
                <tr>
                    <td>系统名称:</td>
                    <td>lvMiCMS</td>
                    <td>版本信息:</td>
                    <td>V01_UTF8_1.09 ( iframe版 )</td>
                    <td>服务器操作系统：</td>
                    <td><?php echo PHP_OS;?></td>
                    <td>服务器域名/IP：</td>
                    <td><?php echo $_SERVER['HTTP_HOST'];?></td>
                </tr>
                <tr>
                    <td>服务器环境：</td>
                    <td><?php echo substr($_SERVER['SERVER_SOFTWARE'],0,14);?></td>
                    <td>PHP 版本：</td>
                    <td><?php echo PHP_VERSION;?></td>
                    <td>Mysql 版本：</td>
                    <td>5.7.11</td>
                    <td>GD 版本</td>
                    <td><?php
                        $gd = gd_info();
                        echo $gd['GD Version'];
                        ?></td>
                </tr>
                <tr>
                    <td>文件上传限制：</td>
                    <td><?php echo ini_get("upload_max_filesize");?></td>
                    <td>最大占用内存：</td>
                    <td><?php echo ini_get("memory_limit");?></td>
                    <td>安全模式：</td>
                    <td>NO</td>
                    <td>Zlib支持：</td>
                    <td>YES</td>
                </tr>
                <tr>
                    <td>Curl支持：</td>
                    <td>YES</td>
                    <td>最大执行时间：</td>
                    <td><?php echo ini_get("max_execution_time");?>s</td>
                    <td>开发者:</td>
                    <td style="color: #FF5722;">FiresGroup</td>
                    <td>网站域名:</td>
                    <td><a href="www.lvcus.cn" target="_blank" style="color: #FF5722;">www.lvcus.cn</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script type="text/javascript" src="{{ asset('/plugin/layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/admin/larry.js') }}"></script>
<<<<<<< HEAD
<script type="text/javascript" src="{{ asset('/js/public/base.js') }}"></script>



=======
>>>>>>> 5f8ec4abfbe161096924a09aa2a35992968d08b9
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
<<<<<<< HEAD


=======
>>>>>>> 5f8ec4abfbe161096924a09aa2a35992968d08b9
</script>
</html>