<?php
/**
 * File Name: index.blade.php
 * Description: 商品属性管理列表首页
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/24
 * Time: 22:30
 */
?>


<?php $__env->startSection('title','商品属性管理首页'); ?>

<?php $__env->startSection('css'); ?>
    @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品属性管理-首页</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>商品属性是给用户看的,不牵涉价钱等, 例如, 生产日期,生产地保质期等...</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="btn-group">
                    <button class="layui-btn layui-btn-small" id="addattr">
                        <i class="layui-icon">&#xe608;</i> 添加属性
                    </button>
                    <button class="layui-btn layui-btn-small" id="refresh">
                        <i class="layui-icon">&#x1002;</i> 刷新本页
                    </button>
                </div>
                <div class="order">
                    <form>
                        <input type="hidden" name="search" value="true">
                        <select name="modelId" class="layui-input-inline">
                            <option value="">所有属性</option>
                            <?php foreach( $modelList as $model ): ?>
                                <option value="<?php echo e($model->id); ?>"><?php echo e($model->model_name); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input class="layui-input-inline" placeholder="搜索属性名称" name="word" value="">
                        <button class="layui-btn" id="search">
                            <i class="layui-icon">&#xe615;</i>搜索
                        </button>
                    </form>
                </div>
                <table class="layui-table larry-table-info">
                    <colgroup>
                        <col width="100">
                        <col width="200">
                        <col>
                    </colgroup>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>属性名称</th>
                        <th>所属模型</th>
                        <th>属性值录入方式</th>
                        <th>可选值</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $attrList as $attr ): ?>
                        <tr>
                            <td><?php echo e($attr->id); ?></td>
                            <td><?php echo e($attr->attr_name); ?></td>
                            <td><?php echo e($attr->model->model_name); ?></td>
                            <?php if( $attr->attr_input_type == 0 ): ?>
                                <td>手工录入</td>
                            <?php elseif( $attr->attr_input_type == 1 ): ?>
                                <td>从列表选择</td>
                            <?php endif; ?>
                            <td><?php echo e($attr->attr_values); ?></td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="<?php echo e(url('admin/product/attr').'/'.$attr->id."/edit"); ?>"
                                       class="layui-btn  layui-btn-small" data-alt="修改">
                                        <i class="larry-icon larry-xiugai"></i>编辑
                                    </a>
                                    <a id="delete" data-id="<?php echo e($attr->id); ?>" class="layui-btn  layui-btn-small" data-alt="删除">
                                        <i class="larry-icon larry-huishouzhan1"></i>删除
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="larry-table-page">
                    <?php echo e($attrList->render()); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    @parent
    <script>
        layui.use(['jquery','layer','global'], function () {
            var $ = layui.jquery,
                global = layui.global,
                layer = layui.layer;
            //添加按钮点击
            global.aAdd('button#addattr','<?php echo e(url('/admin/product/attr/create')); ?>');
            //删除模型按钮
            var url = "<?php echo e(url('/admin/product/attr')); ?>/";
            global.aDelete(
                'a#delete',
                '警告',
                '确定要删除这个规格项吗?删除这个规格项会同时删除规格下所有规格项',
                '<?php echo e(csrf_token()); ?>',
                url
            );

        });
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>