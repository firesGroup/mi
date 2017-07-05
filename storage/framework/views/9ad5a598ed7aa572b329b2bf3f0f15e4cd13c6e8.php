<?php
/**
 * File Name: show.blade.php
 * Description: 权限详情
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/26
 * Time: 9:39
 */
?>

<?php /*<?php echo e(dd($data)); ?>*/ ?>


<?php $__env->startSection('title','权限展示'); ?>

<?php $__env->startSection('css'); ?>
    @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div>
        <div style="text-align:center;margin-left: 300px">

            <table class="layui-table " lay-skin="row" style="width:80%;" lay-even>
                <tr>
                    <th colspan="4" style="font: 25px/1.5 楷体">权限详细信息</th>
                </tr>

                <tr>
                    <td style="width:25%">权限id号</td>
                    <td style="width:25%">权限名称</td>
                    <td style="width:25%">权限方法</td>
                    <td style="width:25%">权限状态</td>
                </tr>
                <?php foreach($data as $v): ?>
                    <tr>
                        <td>
                            <div style="color:#01AAED">
                                <?php echo e($v->id); ?>

                            </div>
                        </td>
                        <td>
                            <div style="color:#01AAED">
                                <?php echo e($v->role_name); ?>

                            </div>
                        </td>
                        <td>
                            <div style="color:#01AAED">
                                <?php echo e($v->role); ?>

                            </div>
                        </td>
                        <td>
                            <div style="color:#01AAED">
                                <?php echo e($status[$v->status]); ?>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td style="width:25%" colspan="4">权限描述</td>
                </tr>

                <?php foreach($data as $v): ?>
                    <tr>
                        <td colspan="4">
                            <div style="color:#01AAED">
                                <?php echo e($v->role_name.'  :  '.$v->role_desc); ?>

                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>