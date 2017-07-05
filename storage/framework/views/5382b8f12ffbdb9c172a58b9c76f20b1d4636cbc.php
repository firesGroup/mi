<?php
/**
 * File Name: index.blade.php
 * Description:分类展示页
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/25 0025
 * Time: 下午 5:07
 */
?>



<?php $__env->startSection('title', '分类首页'); ?>
<?php $__env->startSection('css'); ?>
    @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>分类管理-修改等级</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>

                        <li>分类信息</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>

            </div>

            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">分类信息</li>
                    </ul>
                </div>
            </div>
            <div class="btn-group clearfix">
        <span class="layui-btn layui-btn-small">
            <i class="layui-icon">&#xe615;</i>搜索分类
        </span>
                <button class="layui-btn layui-btn-small" id="add_category">
                    <i class="layui-icon" style="color:white">&#xe608;</i> <a style="color:white"
                                                                              href="<?php echo e(url('admin/category/create')); ?>">添加一级分类</a>
                </button>
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
                        <th></th>
                        <th>分类Id</th>
                        <th>分类名称</th>
                        <th>父类id</th>
                        <th>父类路径</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                    <tr>

                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $data as $v ): ?>
                        <?php
                        $m = substr_count($v->parent_path, ',') - 1;
                        $nbsp = str_repeat("&nbsp;", $m * 10);
                        ?>
                        <tr>
                            <td>
                                <button class="layui-btn layui-btn-primary layui-btn-small" id="cate">
                                    <i class="layui-icon">&#xe654;</i>
                                </button>
                            </td>
                            <td><?php echo e($v->id); ?></td>
                            <td>
                                <div align=left><?php echo e($nbsp); ?>|--<?php echo e($v->category_name); ?></div>
                            </td>
                            <td><?php echo e($v->parent_id); ?></td>
                            <td><?php echo e($v->parent_path); ?></td>
                            <td><?php echo e($v->sort); ?></td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="<?php echo e(url('admin/category').'/'.$v->id."/edit"); ?>" class="layui-btn"
                                       data-alt="修改">
                                        <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a href="<?php echo e(url('admin/create_category'.'/'.$v->id)); ?>" class="layui-btn"
                                       data-alt="添加子分类">
                                        <i class="layui-icon">&#xe608;</i>
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
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @parent

    <script>
        layui.use(['jquery', 'layer', 'global'], function () {
            var $ = layui.jquery,
                global = layui.global,
                layer = layui.layer;

            $('a.layui-btn').on('mouseover', function () {
                var alt = $(this).attr('data-alt');
                index = layer.tips(alt, $(this), {tips: [1, '#0FA6D8']});
            });
            $('a.layui-btn').on('mouseout', function () {
                layer.close(index);
            });

            $('table').on('click', 'a#delete', function () {
                var t = $(this);
                layer.confirm('是否删除', {
                    btn: ['确定', '取消'] //按钮
                    , btnAlign: 'c'
                    , shade: 0.8
                    , id: 'MI_delTips' //设定一个id，防止重复弹出
                    , moveType: 1 //拖拽模式，0或者1
                    , resize: false
                    , title: '提示'
                    , anim: Math.ceil(Math.random() * 6)
                }, function () {
                    var l = layer.msg('正在删除!请稍后...', {
                        icon: 16
                    });
                    var id = t.data('id');
                    $.ajax({
                        url: "<?php echo e(url('/admin/category')); ?>/" + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': "<?php echo e(csrf_token()); ?>"}
                        , success: function (data) {
                            if (data != '') {
                                layer.close(l);
                                if (data == 0) {
                                    layer.alert('删除成功', {
                                        icon: 1, time: 2000, yes: function () {
                                            location.href = location.href;
                                        }
                                    });
                                } else if (data == 1) {
                                    layer.alert('删除失败!', {icon: 2});
                                } else if (data == 2) {
                                    layer.alert('删除错误!该分类下有子分类!不能删除', {icon: 2});
                                }
                            } else {
                                layer.alert('服务器错误!', {icon: 2});
                            }
                        }
                    });
                }, function (Index) {
                    layer.close(Index);
                });
            });


        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make("layouts.iframe", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>