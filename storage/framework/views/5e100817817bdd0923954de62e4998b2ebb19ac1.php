<?php
/**
 * File Name: show_order.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/20
 * Time: 10:05
 */

?>
11111
<?php /**/ ?>
<?php /*<?php $__env->startSection('css'); ?>*/ ?>
<?php /*@parent*/ ?>
<?php /*<?php $__env->stopSection(); ?>*/ ?>
<?php /*<?php $__env->startSection('content'); ?>*/ ?>
    <?php /*<table class="layui-table" lay-skin="line">*/ ?>

        <?php /*<h2>基本信息</h2>*/ ?>

        <?php /*<tr>*/ ?>
            <?php /*<td>订单ID: <?php echo e($data->id); ?></td>*/ ?>
            <?php /*<td>订单编号: <?php echo e($data->order_sn); ?></td>*/ ?>
            <?php /*<td>用户ID: <?php echo e($data->mid); ?></td>*/ ?>
            <?php /*<td>收货人: <?php echo e($data->user); ?></td>*/ ?>
            <?php /*<td>收货人手机号: <?php echo e($data->phone); ?></td>*/ ?>
            <?php /*<td>详细地址: <?php echo e($data->address); ?></td>*/ ?>
            <?php /*<td>配送方式: <?php echo e($data->delivery); ?></td>*/ ?>
            <?php /*<td>物流订单号: <?php echo e($data->delivery_orderid); ?></td>*/ ?>
            <?php /*<td>订单总金额: <?php echo e($data->total); ?></td>*/ ?>
            <?php /*<td>下单时间: <?php echo e($data->add_time); ?></td>*/ ?>
            <?php /*<td>订单状态: <?php echo e($data->order_status); ?></td>*/ ?>
            <?php /*<td>订单创建时间: <?php echo e($data->created_at); ?></td>*/ ?>
            <?php /*<td>订单修改时间: <?php echo e($data->updated_at); ?></td>*/ ?>
        <?php /*</tr>*/ ?>
    <?php /*</table>*/ ?>
<?php /*<?php echo e($orderdetail->p_name); ?>*/ ?>
<?php /*<?php $__env->stopSection(); ?>*/ ?>


<?php echo $__env->make('layouts.iframe, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>