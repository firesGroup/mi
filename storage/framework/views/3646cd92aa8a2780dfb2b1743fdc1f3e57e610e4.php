<?php
/**
 * File Name: edit.blade.php
 * Description:分类修改页面
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/26 0026
 * Time: 下午 1:55
 */
?>



<?php $__env->startSection('title', '修改分类'); ?>
<?php $__env->startSection('css'); ?>
    @parent
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>分类管理-修改分类</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <?php if(count($errors) > 0): ?>
                            <?php foreach($errors->all() as $error): ?>
                                <li style="color:#FF5722;font-size:20px;text-align:center"><?php echo e($error); ?></li>
                            <?php endforeach; ?>
                        <?php elseif(session('error')): ?>
                                 <li style="color:#ff5722;font-size:20px;text-align:center">
                                    <?php echo e(session('error')); ?>

                                </li>
                        <?php else: ?>
                            <li>请务必正确填写分类信息</li>
                        <?php endif; ?>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="layui-tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">分类信息</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show" style="padding-top:20px">
                            <div class="form-body">
                                <form class="layui-form" action="<?php echo e(url('admin/category/'.$data->id)); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="id" value="<?php echo e($data->id); ?>">
                                    <input type="hidden" name="cate_id" value="">
                                    <div class="layui-form-item" id="item">
                                        <label class="layui-form-label">上级分类</label>
                                        <div class="layui-input-block">
                                            <select name="parent_id" lay-verify="" id="select" style="width:200px">
                                                <option value="">请选择一个上级分类</option>
                                                <option value="0" <?php echo e($data->parent_id ==0?" selected":""); ?>>顶级分类</option>
                                                <?php foreach($res as $category): ?>
                                                    <option value="<?php echo e($category->id); ?> " <?php echo e($data->parent_id ==$category->id?"selected":""); ?>><?php echo e($category->category_name); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">等级名称</label>
                                        <div class="layui-input-block">
                                            <input type="text" id="category_name" name="category_name"
                                                   lay-verify="required"
                                                   autocomplete="off" class="layui-input"
                                                   value="<?php echo e($data->category_name); ?>">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button id="submit" class="layui-btn" lay-submit="" lay-filter="go">立即提交
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
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @parent

    <script>
        layui.use(['jquery', 'layer', 'form'], function () {
            var $ = layui.jquery,
                form = layui.form(),
                layer = layui.layer;

            form.on('select', function (data) {
                var that = $(this);
                that.parent().parent().parent().parent().nextAll('#item').remove();
                $.ajax({
                    url: "<?php echo e(url('admin/category_edit')); ?>"
                    , type: 'post'
                    , data: {"_token": "<?php echo e(csrf_token()); ?>", "c_id": data.value, "id": '<?php echo e($data->id); ?>'}
                    , success: function (data) {
                        if (data == 1) {
                            return false;
                        } else if(data == 2){
                            layer.msg('顶级分类不能修改');
                            return false;
                        }
                        $str = Math.ceil(Math.random()*10)+ 'parent_id';
                        var str = "<div class='layui-form-item' id='item'><label class='layui-form-label'>上级分类</label><div class='layui-input-block'><select name='cate_id' id='select'  lay-verify='required'><option value=''>请选择一个上级分类</option>";
                        console.log(data);
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].id == "<?php echo e($data->id); ?>") {

                                return false;
                            }
                            str += "<option value='" + data[i].id + ",'>" + data[i].category_name + "</option>";
                        }
                        str += "</select></div></div>";
                        that.parent().parent().parent().parent().after(str);
                        form.render();

                    },
                    typeOf: 'json'
                })

            });
        })
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>