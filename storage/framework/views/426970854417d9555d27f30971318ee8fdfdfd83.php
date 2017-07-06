<?php
/**
 * File Name: editUser.blade.php
 * Description:管理员编辑页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/19
 * Time: 23:48
 */
?>



<?php $__env->startSection('title','管理员修改页'); ?>

<?php $__env->startSection('css'); ?>
    @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php /*<?php echo e(dd($arr)); ?>*/ ?>
    <?php /*<?php echo e(dd($str)); ?>*/ ?>
    <?php if(session('success')): ?>
        <div style="font-size: 20px; color: red;text-align: center">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>管理员-修改信息</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>修改后请务必牢记个人信息</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <?php /*<?php echo e(dd($data)); ?>*/ ?>
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">个人信息</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="<?php echo e(url('admin/user/'.$data->id)); ?>" method="post">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">管理员名</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="username" required lay-verify="required"
                                                   placeholder="<?php echo e($data->username); ?>" autocomplete="off"
                                                   class="layui-input" value="<?php echo e($data->username); ?>">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">旧密码</label>
                                        <div class="layui-input-block">
                                            <input type="password" name="oldPassword" lay-verify="required"
                                                   autocomplete="off" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">新密码</label>
                                        <div class="layui-input-block">
                                            <input type="password" name="newPassword" lay-verify="required"
                                                   autocomplete="off" class="layui-input" value="">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">所属于的权限组</label>
                                        <div class="layui-input-block">
                                            <select name="group_id" lay-verify="required">
                                                <?php /*<option value="<?php echo e($str->id); ?>"><?php echo e($str->group_name); ?></option>*/ ?>
                                                <?php foreach($arr as $v): ?>
                                                    <?php /*<?php echo e(dump($v)); ?>*/ ?>
                                                    <option value="<?php echo e($v->id); ?>"><?php echo e($v->group_name); ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">状态</label>
                                        <div class="layui-input-block" pane>
                                            <input type="radio" name="status" value="0"
                                                   <?php echo e($data->status==0?'checked':''); ?> title="启用"
                                                   lay-skin="primary">
                                            <input type="radio" name="status" lay-skin="primary" value="1"
                                                   <?php echo e($data->status==1?'checked':''); ?> title="锁定">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交
                                            </button>
                                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @parent

    <script>

        layui.use(['form', 'jquery', 'layer'], function () {
            var $ = layui.jquery;
            var layer = layui.layer;

            $('input[name=oldPassword]').blur(function () {
//                console.log(1);
                var password = $(this).val();

//                console.log(password);
                var that = $(this);

                //获取到之前保存的密码
                var origin = that.data('p');

                var url = "<?php echo e(url('admin/ajaxPassword')); ?>";

                var id = "<?php echo e($data->id); ?>";

                if (origin != password) {

                    $.ajax({
                        url: url,

                        type: 'post',

                        data: {'_token': '<?php echo e(csrf_token()); ?>', 'password': password, 'id': id},

                        success: function (data) {

                            //先把密码存放起来
                            that.data('p', password);
//                            console.log(data);
                            if (data == 1) {
                                that.css({'border': '1px solid #ff5722'});
                                layer.msg('密码与原密码不匹配');
                            } else {
                                that.css({'border': '1px solid #f2f2f2'});
                            }

                        },

                        dataType: 'json'
                    });

                }

            });


            $('input[name=username]').blur(function () {


                //获取到用户输入的用户名
                var username = $(this).val();

                var name = "<?php echo e($data->username); ?>";

//                console.log(username);
                if (username !== name) {

//                    console.log(1);

                    var that = $(this);
                    //console.log(that);

                    var url = "<?php echo e(url('admin/ajaxPassword')); ?>";

                    //获取到之前保存的用户名
                    var origin = that.data('u');

                    if (origin != username) {

                        $.ajax({
                            url: url,

                            type: 'post',

                            data: {'_token': '<?php echo e(csrf_token()); ?>', 'username': username},

                            success: function (data) {

                                //先把用户名存放起来
                                that.data('u', username);
//                                console.log(data);
                                if (data == 1) {
                                    that.css({'border': '1px solid #ff5722'});
                                    layer.msg('用户名已存在');
                                } else {
                                    that.css({'border': '1px solid #f2f2f2'});
                                }

                            },

                            dataType: 'json'
                        });

                    }
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>