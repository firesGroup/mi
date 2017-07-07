<?php
/**
 * File Name: personal.blade.php
 * Description:个人信息
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/7/5 0005
 * Time: 上午 12:08
 */
?>


<?php $__env->startSection('title', '个人信息'); ?>
    <?php $__env->startSection('css'); ?>
        @parent
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/home/member_center.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/home/personal.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/home/personal_01.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/home/personal_02.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/admin/jquery.Jcrop.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="http://www.mi.cn/plugin/layui/css/layui.css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('home.public.header_top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('home.public.header_nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="breadcrumbs">
        <div class="container">
            <a href="//www.mi.com/index.html" data-stat-id="b0bcd814768c68cc" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b0bcd814768c68cc', '//www.mi.com/index.html', 'pcpid', '']);">首页</a><span class="sep">&gt;</span><span>个人信息</span>    </div>
    </div>

    <div class="page-main user-main">
        <div class="container">
            <div class="row">
    <?php echo $__env->make('home.member.member_modoul', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="n-frame" style="width:600px;height:500px;float:left;margin-left: 250px;margin-top: 200px">
                    <div class="uinfo c_b">

                            <div class="main_r">
                                <div class="framedatabox">
                                    <div style="text-align :center;">
                                        <img style="border-radius: 50%" src="<?php echo e($data->avator); ?>">
                                    </div>
                                    <div style="text-align :center;">
                                        <input type="file" name="avator" class="layui-upload-file" id="sumbit">
                                    </div>
                                    <div class="fdata">

                                        <a class="color4a9 fr" href="javascript:;" title="编辑" id="editInfo"><i class="iconpencil"></i>编辑</a>
                                        <h3>基础资料</h3>
                                    </div>
                                    <div class="fdata lblnickname">
                                        <p>
                                            <span>姓名:</span>
                                            <span class="value" id="nick_name"><?php echo e($member->nick_name); ?></span>
                                        </p>
                                    </div>
                                    <div class="fdata lblbirthday">
                                        <p><span>生日：</span><span class="value" id="birthday">

                        <?php echo e($data->birthday); ?>


			  </span></p>
                                    </div>
                                    <div class="fdata lblgender">
                                        <p><span>性别：</span><span class="value" data-id="<?php echo e($data->sex); ?>" id="sex">

					<?php echo e($arr[$data->sex]); ?>


			  </span></p>
                                    </div>
                                    <div class="fdata lblgender">
                                        <p><span>等级：</span><span class="value">

					                    <?php echo e($level->level_name); ?>


			  </span></p>
                                    </div>
                                    <div class="btn_editinfo"><a id="editInfoWap" class="btnadpt bg_normal" href="">编辑基础资料</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <?php echo Form::open( [ 'url' => ['/admin/ponseral_change'], 'method' => 'POST', 'onsubmit'=>'return checkCoords();','files' => true ] ); ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">裁剪头像</h4>
                </div>

                        <div class="crop-image-wrapper">
                            <img src="/images/default-avatar.png"
                                 class="ui centered image" id="cropbox" >
                            <input type="hidden" name="id" value="<?php echo e(session('user_deta')['id']); ?>">
                            <input type="hidden" id="photo" name="photo" />
                            <input type="hidden" id="x" name="x" />
                            <input type="hidden" id="y" name="y" />
                            <input type="hidden" id="w" name="w" />
                            <input type="hidden" id="h" name="h" />
                        </div>
                    </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">裁剪头像</button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @parent
    <script type="text/javascript" src="<?php echo e(asset('/js/public/jquery.Jcrop.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/plugin/bootstrap/js/bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('/js/home/collect/collect.js')); ?>"></script>
    <script  src="<?php echo e(asset('/js/home/member/member.js')); ?>"></script>

    <script>
        layui.use(['form','upload','jquery'],function(){
            var $ = layui.jquery;
            var form = layui.form();
            function extra_data(input,data){
                var item=[];
                $.each(data,function(k,v){
                    item.push('<input type="hidden" name="'+k+'" value="'+v+'">');
                });
                $(input).after(item.join(''));
            }

            layui.upload({
                url: '<?php echo e(url('admin/avator')); ?>' ,//上传接口
                unwrap: false,
            before: function(input){
                    var data = {"id":"<?php echo e($data->id); ?>"};
                    extra_data(input, data);
                }
                ,title : '上传头像'
                ,success: function(res){
                    //上传成功后的回调
                    $("#upload").attr("src", res.src);
                    var cropBox = $("#cropbox");
                    cropBox.attr('src', res.src);
                    $('#photo').val(res.src);
                    $('#upload-avatar').html('更换新头像');
                    $('#exampleModal').modal('show');
                    cropBox.Jcrop({
                        aspectRatio: 1,
                        onSelect: updateCoords,
                        setSelect: [120,120,10,10]
                    });
                    $('.jcrop-holder img').attr('src',response.avatar);
                    function updateCoords(c)
                    {
                        $('#x').val(c.x);
                        $('#y').val(c.y);
                        $('#w').val(c.w);
                        $('#h').val(c.h);
                    }
                    function checkCoords()
                    {
                        if (parseInt($('#w').val())) return true;
                        alert('请选择图片.');
                        return false;
                    }
                }

            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>