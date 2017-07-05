<?php
/**
 * File Name: update.blade.php
 * Description:会员修改密码
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/7/4 0004
 * Time: 下午 4:18
 */
?>


    <?php /*<link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/home/mi_reg/layout.css')); ?>">*/ ?>



<?php /*<div class="zhuti">*/ ?>
    <div class="tou">
        <img class="logo" src="<?php echo e(url('images/home/logo.png')); ?>">
    </div>

    <div class="biao">
        <h6 class="zi">修改<?php echo e(session('user_deta')['nick_name']); ?>密码</h6>
    </div>


    <div class="shu layui-form">
        <div class="xiao layui-form">
            <form class="layui-form" action="<?php echo e(url('admin/member')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="text" name="oldpass" required lay-verify="required|phone|number" placeholder="请输入旧密码"
                       autocomplete="off" class="layui-input qing" value="<?php echo e(old('phone')); ?>">
                <span class="code"><?php echo e($errors->first('phone')); ?></span>
                <input type="password" id="pass" name="newpass" required lay-verify="required|pass" placeholder="请输入新密码"
                       autocomplete="off" class="layui-input qing" value="<?php echo e(old('password')); ?>">
                <input type="password" name="newpass_confirmation" required lay-verify="required" placeholder="请再次输入新密码"
                       autocomplete="off" class="layui-input qing" value="<?php echo e(old('password_confirmation')); ?>">
                <div class="code"><?php echo e(session('sms')?session('error'):''); ?></div>
                <input type="submit" value="立即修改" class="liji">
            </form>


        </div>
    </div>

    <div class="footer">
        <div class="weizi">
            <a href="" class="ziyi">简体</a> |
            <a href="" class="fan">繁体</a> |
            <a href="" class="yinyu">English</a> |
            <a href="" class="chang">常见问题</a>
        </div>
        <div class="gong">
            小米公司版权所有-京ICP备案1004644-<span class="gong-1"><img
                        src="./img/ghs.png">京公网安备11010802020134号-京ICP证110507号</span>
        </div>
    </div>
</div>





