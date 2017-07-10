<?php
/**
 * File Name: topNav.blade.php
 * Description: 全站顶部导航模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 23:14
 */
?>
<?php /*<?php echo e(dd(session('goods'))); ?>*/ ?>
<!-- 公共顶部 start -->
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
            <a rel="nofollow" href="./">小米商城</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">MIUI</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">米聊</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">游戏</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">多看阅读</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">云服务</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">金融</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">小米商城移动版</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">问题反馈</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="#J_modal-globalSites" data-toggle="modal">Select Region</a>
        </div>
        <?php if(session('goods')): ?>
            <div class="topbar-cart topbar-cart-filled topbar-cart-active" id="J_miniCartTrigger">
                <?php else: ?>
                    <div class="topbar-cart topbar-cart-filled" id="J_miniCartTrigger">
                        <?php endif; ?>
                        <a rel="nofollow" class="cart-mini" id="J_miniCartBtn" href="<?php echo e(url('cart')); ?>">
                            <i class="iconfont">&#xe60c;</i>购物车
                            <span class="cart-mini-num J_cartNum">(<?php echo e((count(session('goods')))); ?>)</span>
                        </a>
                        <div class="cart-menu" id="J_miniCartMenu">
                            <div class="loading">
                                <div class="loader">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(session('user_deta')): ?>
                        <div class="topbar-info" id="J_userInfo">
          <span class="user"><a rel="nofollow" class="user-name" href="<?php echo e(url('personal')); ?>" target="_blank"><span
                          class="name"><?php echo e(session('user_deta')['nick_name']); ?></span><i class="iconfont"></i></a>
              <ul class="user-menu" style="display: none;">
                  <li><a rel="nofollow" href="" target="_blank" data-stat-id="e0b9e1d1fa8052a2">个人中心</a></li>
                  <li><a rel="nofollow" href="<?php echo e(url('shopcomment/'.session('user_deta')['id'])); ?>" target="_blank"
                         data-stat-id="6d05445058873c2c">评价晒单</a></li>
                  <li><a rel="nofollow" href="" target="_blank" data-stat-id="32e2967e9a749d3d">我的喜欢</a></li>
                  <li><a rel="nofollow" href="<?php echo e(url('login/exit')); ?>" data-stat-id="770a31519c713b11">退出登录</a></li></ul></span>

                            <span class="sep">|</span><a rel="nofollow" class="link link-order"
                                                         href="<?php echo e(url('order/'.session('user_deta')['id'])); ?>"
                                                         target="_blank" data-stat-id="a9e9205e73f0742c">我的订单</a></div>
                    <?php else: ?>
                        <div class="topbar-info" id="J_userInfo">
                            <a rel="nofollow" class="link" href="<?php echo e(url('login')); ?>" data-needlogin="true"
                               data-stat-id="bf3aa4c80c0ac789">登录</a><span class="sep">|</span><a rel="nofollow"
                                                                                                  class="link"
                                                                                                  href="<?php echo e(url('reg')); ?>"
                                                                                                  data-stat-id="749b1369201c13fb"
                                                                                                  onclick="">注册</a>
                        </div>
                    <?php endif; ?>



            </div>
            </div>
    </div>
</div>
    <!-- 公共顶部 end -->

    <?php $__env->startSection('js'); ?>
        @parent

        <script>

            layui.use(['jquery', 'layer'], function () {
                var $ = layui.jquery,
                    layer = layui.layer;
                var index;

                $('a#J_miniCartBtn').on('mouseover', function () {

                    $.ajax({
                        url: "<?php echo e(url('searchCart')); ?>",
                        type: 'post',
                        data: {'_token': '<?php echo e(csrf_token()); ?>'},
                        success: function (data) {
//                        alert(1);
                            if (data) {

                                $('div#J_miniCartMenu').children().remove();

                                var str = "<ul class='cart-list'>";

                                var totalPrice = 0;
                                var num = 0;
                                for (var i = 0; i < data.length; i++) {

                                    str += "<li><div class='cart-item clearfix first'>";

                                    str += "<a class='thumb' href=''><img src='" + data[i]['img'] + "!60_60'></a>";

                                    str += "<a class='name' href=''>" + data[i]['pName'] + "</a>";

                                    str += "<span class='price'>" + data[i]['price'] + 'X' + data[i]['num'] + "</span><a class='btn-del J_delItem' href='javascript:;' data-isbigtap='false'><i class='iconfont'>╳</i>";

                                    str += "</a></div></li>";
                                    str += "<hr>";
                                    totalPrice += parseInt(data[i]['price']) * data[i]['num'];
                                    num += data[i]['num'];
                                }

                                str += "</ul><div class='cart-total clearfix'>";

                                str += "<span class='total'>共 <em>" + num + "</em>件商品<span class='price'><em>" + totalPrice + "</em>元</span></span>";

                                str += "<a class='btn btn-primary btn-cart' href='<?php echo e(url('cart')); ?>'>去购物车结算</a></div>";

                                $('a#J_miniCartBtn').children('span').text('('+num+')');

                                $('div#J_miniCartMenu').append(str);

                                $('#J_miniCartMenu').find('ul.cart-list li').each(function (i) {
                                    var t = $(this);
                                    t.on('click', 'div a.J_delItem', function () {
//                                    console.log(i);

                                        $.ajax({
                                            url: "/delSession",
                                            type: 'post',
                                            data: {'_token': '<?php echo e(csrf_token()); ?>', 'i': i},
                                            success:function (data) {
//                                                console.log(data.length);
                                                if(data) {
                                                    $('div#J_miniCartMenu').children().remove();

                                                    var str = "<ul class='cart-list'>";

                                                    var totalPrice = 0;
                                                    var num = 0;
                                                    for (var i = 0; i < data.length; i++) {

                                                        str += "<li><div class='cart-item clearfix first'>";

                                                        str += "<a class='thumb' href=''><img src='" + data[i]['img'] + "!60_60'></a>";

                                                        str += "<a class='name' href=''>" + data[i]['pName'] + "</a>";

                                                        str += "<span class='price'>" + data[i]['price'] + 'X' + data[i]['num'] + "</span><a class='btn-del J_delItem' href='javascript:;' data-isbigtap='false'><i class='iconfont'>╳</i>";

                                                        str += "</a></div></li>";

                                                        str += "<hr>";

                                                        totalPrice += parseInt(data[i]['price']) * data[i]['num'];
                                                        num += data[i]['num'];
                                                    }

                                                    str += "</ul><div class='cart-total clearfix'>";

                                                    str += "<span class='total'>共 <em>" + num + "</em>件商品<span class='price'><em>" + totalPrice + "</em>元</span></span>";

                                                    str += "<a class='btn btn-primary btn-cart' href='<?php echo e(url('cart')); ?>'>去购物车结算</a></div>";

                                                    $('a#J_miniCartBtn').children('span').text('('+num+')');

                                                    $('div#J_miniCartMenu').append(str);
                                                }
                                            },

                                            dataType: 'json'
                                        });

                                    });

                                });


                            }

                        },
                        dataType: 'json'
                    });


                });


            });
        </script>

<?php $__env->stopSection(); ?>


