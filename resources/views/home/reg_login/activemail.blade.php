<?php
/**
 * File Name: activemail.blade.php
 * Description:邮箱激活页面
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/30 0030
 * Time: 下午 5:13
 */
?>
        <!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
尊敬的 {{ $name }} 用户，
<br>
<a href="{{ url('mailBox/'.$uid.'/'.$code)}}">
        点击激活邮箱
</a>
</body>
</html>