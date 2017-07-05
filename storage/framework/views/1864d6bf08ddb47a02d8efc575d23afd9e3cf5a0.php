<?php
/**
 * File Name: login.blade.php
 * Description:后台登录页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/7/3
 * Time: 15:43
 */
?>

<?php $__env->startSection('title', '登陆'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/css/admin/login.css')); ?>">
<?php echo $__env->yieldSection(); ?>
<?php $__env->startSection('content'); ?>

        <div class="wrapper">
            <div class="container">
                <h1>商城后台管理系统</h1>
                <form method="post" id="frm_login" class="layui-form layui-form-pane " action="<?php echo e(url('admin/login')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div style="color:red"><?php echo e(session('error')?session('error'):''); ?></div>
                    <div id="action" style="color:red;display:none">用户名不存在</div>
                    <input class="txt-input txtpd" name="name" id="name" lay-verify="required" type="text"
                           value="<?php echo e(old('name')); ?>"/>
                    <div style="color:red"><?php echo e(session('wrong')?session('wrong'):''); ?></div>
                    <input id="Password" name="password" class="txt-input txtpd" value="" lay-verify="required"
                           type="password"/>
                    <button id="regSubmit" lay-submit="" lay-filter="login" type="submit">登陆</button>
                </form>
            </div>

            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>

    <script type="text/javascript" src="<?php echo e(asset('/plugin/layui/lay/dest/layui.all.js')); ?>"></script>
    <script>
        //Demo

        layui.use(['form', 'layer', 'jquery'], function () {
            var form = layui.form();
            var $ = layui.jquery;
            layer = layui.layer;

            $('#name').on('focusout', function () {
//                console.log($(this));
                var name = $(this).val();
//                console.log(name);

                var that = $(this);

                //获取到之前保存的用户名
                var origin = that.data('u');

                var url = "<?php echo e(url('admin/ajaxName')); ?>";

                if (origin != username) {

                    $.ajax({
                        url: url,

                        type: 'get',

                        data: {'_token': '<?php echo e(csrf_token()); ?>', 'username': name},

                        success: function (data) {

                            //先把用户名存放起来
                            that.data('u', username);
//                            console.log(data);
                            if (data === 2) {
//                                console.log($('div#action'));
                                $('div#action').css({'display': 'block'});

                            } else {
                                that.css({'border': '1px solid #f2f2f2'});
                            }

                        },

                        dataType: 'json'
                    });
//                }

            });


        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>