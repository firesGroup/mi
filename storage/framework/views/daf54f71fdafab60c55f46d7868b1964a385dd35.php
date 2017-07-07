<?php
/**
 * File Name: member.blade.php
 * Description:会员列表
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/19 0019
 * Time: 下午 7:38
 */
?>


<?php $__env->startSection('title','会员管理首页'); ?>

<?php $__env->startSection('css'); ?>
    @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <header class="larry-personal-tit clearfix">
        <span>会员管理-列表</span>
    </header>
    <div class="btn-group clearfix">
        <span class="layui-btn layui-btn-small">
            <i class="layui-icon">&#xe615;</i>搜索会员
        </span>
        <button class="layui-btn layui-btn-small" id="refresh">
            <i class="layui-icon">&#x1002;</i> 刷新本页
        </button>
        <input class="layui-input clearfix" placeholder="搜索关键词" name="search" value=""
               style="width:400px;margin-top:10px;">
    </div>
    <div>
        <table class="layui-table" style="margin-top: 20px;">

            <colgroup>
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>会员Id</th>
                <th>加入时间</th>
                <th>会员昵称</th>
                <th>会员邮箱</th>
                <th>会员电话</th>
                <th>会员状态</th>
                <th>最后登陆IP</th>
                <th>操作</th>
            </tr>
            <tr>

            </tr>
            </thead>
            <tbody>
            <?php foreach( $data as $v ): ?>
                <tr>
                    <td><?php echo e($v->id); ?></td>
                    <td><?php echo e($v->created_at); ?></td>
                    <td><?php echo e($v->nick_name); ?></td>
                    <td><?php echo e($v->email); ?></td>
                    <td><?php echo e($v->phone); ?></td>
                    <td><?php echo e($state[$v->status]); ?></td>
                    <td><?php echo e($v->last_ip); ?></td>

                    <td>
                        <div class="layui-btn-group">
                            <a href="<?php echo e(url('admin/member').'/'.$v->id); ?>" class="layui-btn"
                               data-alt="查看">
                                <i class="layui-icon">&#xe60b;</i>
                            </a>
                            <a href="<?php echo e(url('admin/member').'/'.$v->id."/edit"); ?>" class="layui-btn"
                               data-alt="修改">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a id="delete" data-id="<?php echo e($v->id); ?>" class="layui-btn" data-alt="删除">
                                <i class="layui-icon">&#xe640;</i>
                            </a>

                        </div>
                    </td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
        <div class="larry-table-page" style="text-align:center">
            <?php echo e($data->render()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @parent

    <?php if(session('success') == 1): ?>
        <script>
            layui.use('layer', function () {
                var layer = layui.layer;
                layer.msg('删除成功');
            });
            <?php endif; ?>
        </script>
        <script>
            layui.use(['jquery', 'layer'], function () {
                var $ = layui.jquery,
                    layer = layui.layer;
                var index;
                $('a.layui-btn').on('mouseover', function () {
                    var alt = $(this).attr('data-alt');
                    index = layer.tips(alt, $(this), {tips: [1, '#0FA6D8']});
                });
                $('a.layui-btn').on('mouseout', function () {
                    layer.close(index);
                });
                $('a#delete').on('click', function () {
                    var th = $(this),
                        t = th.parent().parent().parent('tr');
                    layer.confirm('确定要删除吗?', {
                        btn: ['确定', '取消'] //按钮
                        , btnAlign: 'c'
                        , shade: 0.8
                        , id: 'MI_delTips' //设定一个id，防止重复弹出
                        , moveType: 1 //拖拽模式，0或者1
                        , resize: false
                    }, function () {
                        var id = th.data('id');
                        var l = layer.msg('正在加载请稍后...', {
                            icon: 6
                        });
                        $.ajax({
                            url: '<?php echo e(url('/admin/member')); ?>' + '/' + id
                            , type: "POST"
                            , data: {'_method': 'DELETE', '_token': '<?php echo e(csrf_token()); ?>'}
                            , success: function (data) {
//                                alert(data);
                                layer.close(l);
                                if (data == 1) {
                                    layer.msg('删除成功', {icon: 1});
                                    t.remove();
                                } else if (data == 0) {
                                    layer.msg('数据不存在!', {icon: 2});
                                } else {
                                    layer.msg('id错误!', {icon: 2});
                                }
                            }
                        });

                    }, function (Index) {
                        layer.close(Index);
                    });
                });
                $('button#refresh').on('click', function () {
                    location.href = location.href;
                });
            })
        </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>