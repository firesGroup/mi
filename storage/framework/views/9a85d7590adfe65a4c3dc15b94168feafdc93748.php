<?php
/**
 * File Name: show.blade.php
 * Description:管理员详情展示页
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/20
 * Time: 16:32
 */
?>
<?php /*<?php echo e(dd(111)); ?>*/ ?>


<?php $__env->startSection('title','管理员详情页'); ?>

<?php $__env->startSection('css'); ?>
    @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php /*<?php echo e(dump($array)); ?>*/ ?>
    <div>
        <div style="text-align:center;margin-left: 300px">

            <table class="layui-table " lay-skin="row" style="width:80%;" lay-even>
                <tr>
                    <th colspan="4" style="font: 25px/1.5 楷体">管理员个人信息</th>
                </tr>
                <tr>
                    <td style="width:25%">管理员id号</td>
                    <td style="width:25%">
                        <div style="color:#01AAED"><?php echo e($data->id); ?></div>
                    </td>

                    <td style="width:25%">所属组组名</td>
                    <td style="width:25%">
                        <div style="color:#01AAED"><?php echo e($str->group_name); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>管理员名</td>
                    <td>
                        <div style="color:#01AAED"><?php echo e($data->username); ?></div>
                    </td>

                    <td>密码</td>
                    <td>
                        <div style="color:#01AAED"><?php echo e($data->password); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>状态</td>
                    <td>
                        <div style="color:#01AAED"><?php echo e($status[$data->status]); ?></div>
                    </td>

                    <td>最后登录ip地址</td>
                    <td>
                        <div style="color:#01AAED"><?php echo e($data->last_ip); ?></div>
                    </td>
                </tr>
                <tr>
                    <td>创建时间</td>
                    <td>
                        <div style="color:#01AAED"><?php echo e($data->add_time); ?></div>
                    </td>

                    <td>最后登录时间</td>
                    <td>
                        <div style="color:#01AAED"><?php echo e($data->last_time); ?></div>
                    </td>
                </tr>
            </table>

            <table class="layui-table " lay-skin="row" style="width:80%;" lay-even>
                <tr>
                    <th colspan="4" style="font: 25px/1.5 楷体">管理员所属组信息</th>
                </tr>
                <tr>
                    <td style="width:25%">管理员所属组id号</td>
                    <td style="width:25%">
                        <div style="color:#01AAED"><?php echo e($str->id); ?></div>
                    </td>

                    <td style="width:25%">管理员所属组组名</td>
                    <td style="width:25%">
                        <div style="color:#01AAED"><?php echo e($str->group_name); ?></div>
                    </td>
                </tr>
                <tr>
                    <td style="width:25%">所拥有权限名称</td>
                    <td style="width:25%">
                        <div style="color:#01AAED">
                            <?php echo e($st=''); ?>

                            <?php foreach($array as $v): ?>
                                <?php $st .= $v->role_name . ','; ?>
                            <?php endforeach; ?>
                            <?php echo e(rtrim($st, ',')); ?>

                        </div>
                    </td>

                    <td style="width:25%">管理员所属组状态</td>
                    <td style="width:25%">
                        <div style="color:#01AAED"><?php echo e($status[$str->status]); ?></div>
                    </td>
                </tr>
                <tr>
                    <td style="width:25%">管理员所属组描述</td>
                    <td colspan="3" style="color:#01AAED"><?php echo e($str->group_desc); ?></td>
                </tr>
            </table>

            <table class="layui-table " lay-skin="row" style="width:80%;" lay-even>
                <tr>
                    <th colspan="4" style="font: 25px/1.5 楷体">管理员权限详细信息</th>
                </tr>
                <?php echo e($st = ''); ?>


                <tr>
                    <td style="width:25%">所拥有权限id号</td>
                    <td style="width:25%">所拥有权限名称</td>
                    <td style="width:25%">所拥有权限方法</td>
                    <td style="width:25%">所拥有权限状态</td>
                </tr>
                <?php foreach($array as $v): ?>
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
                    <td style="width:25%" colspan="4">所拥有权限描述</td>
                </tr>

                <?php foreach($array as $v): ?>
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