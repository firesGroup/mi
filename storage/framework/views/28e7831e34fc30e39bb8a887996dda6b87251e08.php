<?php
/**
 * File Name: index.blade.php
 * Description: 商品列表页模版
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/19
 * Time: 16:09
 */
?>


<?php $__env->startSection('title','商品管理首页'); ?>

<?php $__env->startSection('css'); ?>
    @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品管理-列表</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                        <div class="title">
                            <i class="larry-icon larry-caozuo"></i>
                            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                        </div>
                        <ul>
                            <li>商品管理注意发布商品后清理缓存.</li>
                            <li>商品缩列图也有缓存.</li>
                        </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="btn-group">
                    <button class="layui-btn layui-btn-small" id="addProduct">
                        <i class="layui-icon">&#xe608;</i> 添加商品
                    </button>
                </div>
                <div class="order">
                        <select name="category">
                            <option value="">选择分类</option>
                            <option value="0">所有分类</option>
                        </select>
                        <select name="brand">
                            <option value="">选择品牌</option>
                            <option value="0">所有品牌</option>
                            <?php foreach( $brandList as $brand ): ?>
                                    <option value="<?php echo e($brand->id); ?>" checked><?php echo e($brand->brand_name); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <select name="sort_price">
                            <option value="">选择价格排序</option>
                            <option value="1">默认排序</option>
                            <option value="2">按价格由高到低</option>
                            <option value="3">按价格由低到高</option>
                        </select>
                        <input class="layui-input-inline" placeholder="搜索关键词" name="search" value="">
                        <span class="layui-btn">
                            <i class="layui-icon">&#xe615;</i>搜索
                        </span>
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
                        <th>商品名称</th>
                        <th>所属分类</th>
                        <th>品牌名称</th>
                        <th>商城价</th>
                        <th>市场价</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; foreach( $productList as $product ): $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($product->id); ?></td>
                            <td><?php echo e($product->p_name); ?></td>
                            <td><?php echo e($product->category_id); ?></td>
                            <td><?php echo e($product->brand->brand_name); ?></td>
                            <td><?php echo e($product->price); ?>元</td>
                            <td><?php echo e($product->market_price); ?>元</td>
                            <td>
                                <?php if( $product->status == 0 ): ?>
                                    在售
                                <?php elseif( $product->status == 1 ): ?>
                                    下架
                                <?php elseif( $product->status == 2 ): ?>
                                    预购
                                <?php elseif( $product->status == 3 ): ?>
                                    缺货
                                <?php elseif( $product->status == 4 ): ?>
                                    新品上市
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="<?php echo e(url('admin/product').'/'.$product->id); ?>"
                                       class="layui-btn  layui-btn-small" alt="前台查看">
                                        <i class="larry-icon larry-chaxun"></i>
                                    </a>
                                    <a href="<?php echo e(url('admin/product').'/'.$product->id."/edit"); ?>"
                                       class="layui-btn  layui-btn-small"  alt="修改商品">
                                        <i class="larry-icon larry-xiugai1"></i>
                                    </a>
                                    <a id="delete" data-id="<?php echo e($product->id); ?>" class="layui-btn  layui-btn-small" alt="删除商品" >
                                        <i class="larry-icon larry-huishouzhan"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" style="height:70px;font-size:15px">
                                <i class="layui-icon" style="font-size: 30px; color: #FF5722;">&#xe60c;</i> 什么都没找到
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="larry-table-page">
                    <?php echo e($productList->render()); ?>

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
                url = '<?php echo e(url('/admin/product')); ?>' + '/';

            global.aAdd('button#addProduct','<?php echo e(url('/admin/product/create')); ?>');

            global.aDelete('a#delete','友情提醒','确定要删除吗','<?php echo e(csrf_token()); ?>',url);
            var tipIndex;

            $('div.layui-btn-group').on('mouseover', 'a.layui-btn', function(e){
                var alt = $(this).attr('alt'), t = this;
                tipIndex = layer.tips(alt, t, {
                    tips: [1, '#0FA6D8'] //还可配置颜色
                });
                layui.stope(e);
            }).on('mouseout','a.layui-btn',function(e){
                layer.close(tipIndex);
                layui.stope(e);
            } );

            $('select[name=brand]').on('change', function(){
                location.href='<?php echo e(url('/admin/product?search=oneSelect')); ?>'+'&brand_id='+ $(this).val();
            });
            $('select[name=sort_price]').on('change', function(){
                location.href='<?php echo e(url('/admin/product?search=oneSelect')); ?>'+'&sort_price='+ $(this).val();
            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>