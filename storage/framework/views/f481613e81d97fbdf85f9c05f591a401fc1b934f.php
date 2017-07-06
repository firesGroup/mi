<?php
/**
 * File Name: edit.blade.php
 * Description: 轮播图修改
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/27
 * Time: 16:23
 */
?>



<?php $__env->startSection('title','轮播图修改页'); ?>

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
                <span>轮播图-修改信息</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请根据需求修改轮播图</li>
                        <li>修改轮播图状态请到轮播图首页修改</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
                        <?php /*<?php echo e(dd($data)); ?>*/ ?>
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">轮播图信息</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="<?php echo e(url('admin/slideShow/'.$data->id)); ?>" method="post">
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">轮播图图片路径</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="images" required lay-verify="required"
                                                   placeholder="" autocomplete="off"
                                                   class="layui-input" value="<?php echo e($data->images); ?>">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">轮播图网址</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="url" required lay-verify="required"
                                                   placeholder="" autocomplete="off"
                                                   class="layui-input" value="<?php echo e($data->url); ?>">
                                        </div>
                                    </div>

                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
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
        <?php /*<?php echo e(dump($role_list)); ?>*/ ?>
        <?php /*<?php if(in_array(3, $role_list)): ?>*/ ?>
        <?php /*<?php echo e(dump(1)); ?>*/ ?>
        <?php /*<?php else: ?>*/ ?>
        <?php /*<?php echo e(dump(2)); ?>*/ ?>
        <?php /*<?php endif; ?>*/ ?>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @parent
    <script>


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>