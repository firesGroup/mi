<?php
/**
 * File Name: index.blade.php
 * Description: 商品模型列表页模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/23
 * Time: 10:52
 */
?>


<?php $__env->startSection('title','商品模型管理首页'); ?>

<?php $__env->startSection('css'); ?>
    @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品模型管理-首页</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>商品模型是用来规定某一类商品共有规格和属性的集合，其中规格会影响商品价格同一个商品不同的规格价格会不同，<br>而属性仅仅是商品的属性特质展示</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="btn-group">
                    <button class="layui-btn layui-btn-small" id="addmodel">
                        <i class="layui-icon">&#xe608;</i> 添加模型
                    </button>
                    <button class="layui-btn layui-btn-small" id="refresh">
                        <i class="layui-icon">&#x1002;</i> 刷新本页
                    </button>
                </div>
                <div class="order">
                    <select name="category">
                        <option value="0">所有分类</option>
                    </select>
                    <select name="brand">
                        <option value="0">所有品牌</option>
                    </select>
                    <select name="sort_price">
                        <option value="0">默认排序</option>
                        <option value="1">按价格由高到低</option>
                        <option value="2">按价格由低到高</option>
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
                        <th>模型名称</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $modelList as $model ): ?>
                        <tr>
                            <td><?php echo e($model->id); ?></td>
                            <td><?php echo e($model->model_name); ?></td>
                            <td>
                                <div class="layui-btn-group">
                                    <a href="<?php echo e(url('admin/product/attr').'?search=true&modelId='.$model->id); ?>"
                                       class="layui-btn  layui-btn-small" data-alt="查看属性">
                                        <i class="larry-icon larry-chaxun1"></i>属性列表
                                    </a>
                                    <a href="<?php echo e(url('admin/product/spec').'?search=true&modelId='.$model->id); ?>"
                                       class="layui-btn  layui-btn-small" data-alt="查看规格">
                                        <i class="larry-icon larry-chaxun1"></i>规格列表
                                    </a>
                                    <a href="<?php echo e(url('admin/product/model').'/'.$model->id."/edit"); ?>"
                                       class="layui-btn  layui-btn-small" data-alt="修改">
                                        <i class="larry-icon larry-xiugai"></i>编辑
                                    </a>
                                    <a id="delete" data-id="<?php echo e($model->id); ?>" class="layui-btn  layui-btn-small" data-alt="删除">
                                        <i class="larry-icon larry-huishouzhan1"></i>删除
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="larry-table-page">
                    <?php echo e($modelList->render()); ?>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    @parent
    <script>
        layui.use(['jquery','layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            //添加按钮点击
            $('button#addmodel').on('click', function(){
                layer.msg('正在加载!请稍后...', {
                    icon: 16
                });
                location.href='<?php echo e(url('/admin/product/model/create')); ?>';
            });
            $('button#refresh').on('click', function(){
                layer.msg('正在加载!请稍后...', {
                    icon: 16
                });
                location.href=location.href;
            });
            //删除模型按钮
            $('a#delete').on('click', function(){
                var th = $(this),
                    t = th.parent().parent().parent('tr');
                    layer.confirm('确定要删除吗?', {
                    btn: ['确定','取消'] //按钮
                    ,btnAlign: 'c'
                    ,shade: 0.8
                    ,id: 'MI_delTips' //设定一个id，防止重复弹出
                    ,moveType: 1 //拖拽模式，0或者1
                    ,resize: false
                    ,title: '友情提醒'
                }, function(){
                    var id =  th.data('id');
                    var l = layer.msg('正在删除!请稍后...', {
                        icon: 16
                    });
                    $.ajax({
                        url:  "<?php echo e(url('/admin/product/model')); ?>/" + id
                        , type: "POST"
                        , data: {'_method': 'DELETE', '_token': '<?php echo e(csrf_token()); ?>' }
                        ,success:function (data) {
                            if( data != '' ){
                                layer.close(l);
                                if( data == 0 ){
                                    layer.alert('删除成功', {icon: 1,time:2000,yes:function(){
                                        location.href=location.href;
                                    }});
                                }else if ( data == 1 ){
                                    layer.alert('删除失败!', {icon: 2, title:'提醒'});
                                }else if( data == 2 ){
                                    layer.alert('删除失败!模型下存在规格和属性!', {icon: 2, title:'提醒' });
                                }
                            }else{
                                layer.alert('服务器错误!', {icon: 2});
                            }
                        }
                    });

                }, function(Index){
                    layer.close(Index);
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>