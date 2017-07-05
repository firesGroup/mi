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
                <?php echo $__env->make('home.member.member_modoul', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="span16">
                    <div class="protal-content-update hide">
                        <p class="msg">我们做了一个小升级：你的用户名可以直接修改啦，去换个酷炫的名字吧。<a href="https://account.xiaomi.com/pass/auth/profile/home" target="_blank" data-stat-id="a7bae9e996d7d321" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a7bae9e996d7d321', 'https://account.xiaomi.com/pass/auth/profile/home', 'pcpid', '']);"> 立即前往&gt;</a></p>
                    </div>
                    <div class="uc-box uc-main-box">
                        <div class="uc-content-box portal-content-box">
                            <div class="box-bd">
                                <div class="portal-main clearfix">
                                    <div class="user-card">
                                        <h2 class="username"><?php echo e($arr->nick_name); ?></h2>
                                        <p class="tip">晚上好</p>
                                        <a class="link" href="javascript:;" data-stat-id="4b099f76f8f470d2" id="update">修改个人密码 &gt;</a>
                                        <img class="avatar" src="<?php echo e($array->avator); ?>" width="150" height="150" alt="……">
                                    </div>
                                    <div class="user-actions">
                                        <ul class="action-list">
                                            <li>账户安全：<span class="level level-2">普通</span></li>

                                            <?php if(empty($arr->email)): ?>
                                        <li>绑定手机：<span class="tel"><?php echo e($arr->phone); ?></span></li>
                                            <li>绑定邮箱：<span class="tel"><?php echo e($arr->email); ?></span>
                                                <button class="btn btn-small btn-primary layui-btn"   data-method="notice" id="email">绑定</button></li>

                                            <?php elseif(empty($arr->phone)): ?>

                                        <li>绑定邮箱：<span class="tel"><?php echo e($arr->email); ?></span></li>
                                        <li>绑定手机：<span class="tel"></span>
                                        <button class="btn btn-small btn-primary layui-btn"   data-method="notice" id="phone">绑定</button></li>

                                            <?php endif; ?>

                                            <?php if(!empty($arr->phone) && !empty($arr->email)): ?>
                                        <li>绑定手机：<span class="tel"><?php echo e($arr->phone); ?></span></li>
                                        <li>绑定邮箱：<span class="tel"><?php echo e($arr->email); ?></span></li>
                                                <?php endif; ?>

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
    <script  src="<?php echo e(asset('/js/home/member/member.js')); ?>"></script>
    <script>
        layui.use(['layer','jquery'], function () {
                var $ = layui.jquery,
                    layer = layui.layer;

                $('#email').click( function () {
                    layer.open({
                        type: 1
                        ,
                        title: false //不显示标题栏
                        ,
                        closeBtn: false
                        ,
                        area: '[800px, 900px];'
                        ,
                        closeBtn:1
                        ,
                        shade: 0.8
                        ,
                        id: 'LAY_layuipro' //设定一个id，防止重复弹出
                        ,
                        moveType: 1 //拖拽模式，0或者1
                        ,
                        content:
                        '<h1 align="center">邮箱绑定</h1>' +
                        '<div class="layui-form">'+
                        '<div style="width:600px;height:200px;" class="layui-form">' +
                        ' <div class="layui-form-item" align="center">'+
                        '<input type="text" name="email" lay-verify="required|email" autocomplete="off" placeholder="请输入邮箱" class="layui-input" style="width:300px" id="mail">'+
                        '</div>'+
                        '<div style="text-align:center">'+
                        '<input type="text" name="" placeholder="请输入验证码" autocomplete="off" class="layui-input" style="width:185px;display:inline-block" id="code">' +
                        '<button class="layui-btn" style="margin-left:5px" id="img_code">发送验证码</button>' +
                        '</div>'+
                        '<div align="center" style="margin-top:10px">'+
                        '<button lay-submit class="layui-btn layui-btn-big layui-btn-normal" style="width:300px" align="center" id="binding">立即绑定</button>' +
                        '</div>'+
                        '</div>'+
                        '</div>'
                        ,
                        success: function (layero, index) {
                            $(layero).children().addClass('layui-form');
                            $('#img_code').click(function () {

                                var email = $('#mail').val();
//
                                if (email == '') {
                                    layer.msg('邮箱不能为空', {time: 2000, icon: 5});
                                    return false;
                                }

                            var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/ ;
                                if(!reg.test(email)){
                                    layer.msg('邮箱格式不正确', {time:2000, icon: 5});
                                    return false;
                                }
                                var $btn = $(this);
                                $.ajax({
                                    url: "<?php echo e(url('/mailBox')); ?>",
                                    type: 'post',
                                    data: {'_token': "<?php echo e(csrf_token()); ?>", 'email': email},
                                    success: function (data) {
//                                    alert(data);
                                        if (data == 1) {
                                            layer.msg('邮件已发送, 请登录邮箱查看');
                                            var n = 60;
                                            $btn.attr('disabled', 'true');
                                            $btn.addClass('layui-btn-disabled').removeClass('bg-color');
                                            var timeid = setInterval(function () {
                                                $btn.html('重新发送(' + n + ')');
                                                if (n == 0) {
                                                    clearInterval(timeid);
                                                    $btn.html('发送邮件验证码');
                                                    $btn.removeAttr('disabled').removeClass('layui-btn-disabled').addClass('bg-color');
                                                }
                                                n--;
                                            }, 1000);
                                        } else {
                                            layer.msg('邮箱发送失败, 请等会在尝试', {time:2000, icon:5});
                                        }
                                    }
                                })
                          })

                            $('#binding').click( function () {
                                var email = $('#mail').val();
                                var img_code = $('#code').val();

                                if (email == '' || img_code == '') {
                                    layer.msg('必填项不能为空', {time: 2000, icon: 5});
                                    return false;
                                }

                                var reg =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                if(!reg.test(email)){
                                    layer.msg('邮箱格式不正确', {time:2000, icon: 5});
                                    return false;
                                }
                                $.ajax({
                                    url:"<?php echo e(url('mail_code')); ?>",
                                    type:'post',
                                data:{'_token':"<?php echo e(csrf_token()); ?>", 'email':email, 'code':img_code},
                                success: function (data) {
                                            if(data == 1){
                                                layer.closeAll();
                                                top.location.reload()
                                            }
                                    },
                                    error:function (error) {
                                        var msgObj=JSON.parse(error.responseText);
                                        var msg = '';
                                        for(var name in msgObj){//遍历对象属性名
                                            msg += msgObj[name] + "<br>";
                                        }
                                        layer.msg(msg, {icon:2,time:3000});
                                    },
                                })
                            })
                        }
                    });


            });

                $('#phone').click( function() {
                    layer.open({
                        type: 1
                        ,
                        title: false //不显示标题栏
                        ,
                        closeBtn: false
                        ,
                        area: '[800px, 900px];'
                        ,
                        closeBtn:1
                        ,
                        shade: 0.8
                        ,
                        id: 'LAY_layuipro' //设定一个id，防止重复弹出
                        ,
                        moveType: 1 //拖拽模式，0或者1
                        ,
                        content:
                        '<h1 align="center">手机绑定</h1>' +
                        '<div class="layui-form">'+
                        '<div style="width:600px;height:200px;" class="layui-form">' +
                        ' <div class="layui-form-item" align="center">'+
                        '<input type="text" name="email" lay-verify="" autocomplete="off" placeholder="请输入手机号码" class="layui-input" style="width:300px" id="phone">'+
                        '</div>'+
                        '<div style="text-align:center">'+
                        '<input type="text" name="" placeholder="请输入验证码" autocomplete="off" class="layui-input" style="width:185px;display:inline-block" id="code">' +
                        '<button class="layui-btn" style="margin-left:5px" id="phone_code">发送验证码</button>' +
                        '</div>'+
                        '<div align="center" style="margin-top:10px">'+
                        '<button lay-submit class="layui-btn layui-btn-big layui-btn-normal" style="width:300px" align="center" id="binding">立即绑定</button>' +
                        '</div>'+
                        '</div>'+
                        '</div>'
                        ,
                        success: function (layero, index) {

                            $('#phone_code').click(function () {

                                var phone = $('input#phone').val();
//
                                if (phone == '') {
                                    layer.msg('手机号不能为空', {time: 2000, icon: 5});
                                    return false;
                                }

                                var reg = /^1[3|4|5|8][0-9]\d{4,8}$/;
                                if(!reg.test(phone)){
                                    layer.msg('手机格式不正确', {time:2000, icon: 5});
                                    return false;
                                }
                                var $btn = $(this);
                                $.ajax({
                                    url: "<?php echo e(url('/sms')); ?>",
                                    type: 'post',
                                    data: {'_token': "<?php echo e(csrf_token()); ?>", 'phone': phone},
                                    success: function (data) {
                                    var $data = JSON.parse(data);
                                        if ($data['ResultData'] == '0') {
                                            layer.msg('邮件已发送, 请查看手机');
                                            var n = 60;
                                            $btn.attr('disabled', 'true');
                                            $btn.addClass('layui-btn-disabled').removeClass('bg-color');
                                            var timeid = setInterval(function () {
                                                $btn.html('重新发送(' + n + ')');
                                                if (n == 0) {
                                                    clearInterval(timeid);
                                                    $btn.html('发送验证码');
                                                    $btn.removeAttr('disabled').removeClass('layui-btn-disabled').addClass('bg-color');
                                                }
                                                n--;
                                            }, 1000);
                                        } else {
                                            layer.msg('发送验证码失败, 请等会在尝试', {time:2000, icon:5});
                                        }
                                    }
                                })
                            });

                            $('#binding').click( function () {
                                var phone = $('input#phone').val();
//                                console.log(phone);
                                var phone_code = $('#code').val();

                                if (phone == '' || phone_code == '') {
                                    layer.msg('必填项不能为空', {time: 2000, icon: 5});
                                    return false;
                                }

                                var reg =  /^1[3|4|5|8][0-9]\d{4,8}$/;
                                if(!reg.test(phone)){
                                    layer.msg('手机格式不正确', {time:2000, icon: 5});
                                    return false;
                                }
                                $.ajax({
                                    url:"<?php echo e(url('phone_code')); ?>",
                                    type:'post',
                                    data:{'_token':"<?php echo e(csrf_token()); ?>", 'phone':phone, 'code':phone_code},
                                    success: function (data) {
                                        if(data == 1){
                                            layer.closeAll();
                                            top.location.reload()
                                        }
                                    },
                                    error:function (error) {
                                        var msgObj=JSON.parse(error.responseText);
                                        var msg = '';
                                        for(var name in msgObj){//遍历对象属性名
                                            msg += msgObj[name] + "<br>";
                                        }
                                        layer.msg(msg, {icon:2,time:3000});
                                    }
                                })
                            })
                        }
                    });

                });


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>