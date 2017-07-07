<?php
/**
 * File Name: orderDetail.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/7/5
 * Time: 21:23
 */

?>



<?php $__env->startSection('title',''); ?>

<?php $__env->startSection('css'); ?>
    @parent

    <link rel="stylesheet" href="<?php echo e(asset('/css/home/order.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/home/orderbase.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="uc-box uc-main-box">
        <div class="uc-content-box order-view-box">
            <div class="box-hd">
                <h1 class="title">订单详情
                    <small>
                        请谨防钓鱼链接或诈骗电话，
                        <a href="http://bbs.xiaomi.cn/thread/index/tid/11508301" target="_blank">
                            了解更多&gt;
                        </a>
                    </small>
                </h1>
                <div class="more clearfix">
                    <h2 class="subtitle">订单号：<?php echo e($orderid[0]->order_sn); ?> <span class="tag tag-subsidy"></span>
                    </h2>
                    <div class="actions">
                        <a title="申请售后" href="http://service.order.mi.com/apply/order/id/1161107696915384"
                           class="btn btn-small btn-line-gray">申请售后</a>
                    </div>
                </div>
            </div>
            <div class="box-bd">
                <div class="uc-order-item uc-order-item-finish">
                    <div class="order-detail">
                        <div class="order-summary">


                            <div class="order-status">
                                <?php if($orderid[0]->order_status == 5 || $orderid[0]->order_status == 7 || $orderid[0]->order_status == 6 ): ?>
                                    <span style="color: #b0b0b0;"><?php echo e($status[$orderid[0]->order_status]); ?></span>
                                <?php else: ?>
                                    <span style="color: #ff6700;"><?php echo e($status[$orderid[0]->order_status]); ?></span>

                                <?php endif; ?>
                                <span id="statusid" style="display: none;"><?php echo e($orderid[0]->order_status); ?></span>
                                <span id="oid" style="display: none;"><?php echo e($orderid[0]->id); ?></span>
                            </div>

                            <div class="order-progress">
                                <ul class="progress-list clearfix">
                                    <li class="step li1">
                                        <div class="progress"><span class="text">下单</span></div>
                                        <div class="info">2016年11月07日 20:11</div>
                                    </li>
                                    <li class="step li2">
                                        <div class="progress"><span class="text">付款</span></div>
                                        <div class="info">2016年11月07日 20:12</div>
                                    </li>
                                    <li class="step li3">
                                        <div class="progress"><span class="text">配货</span></div>
                                        <div class="info">2016年11月07日 20:12</div>
                                    </li>
                                    <li class="step  li4">
                                        <div class="progress"><span class="text">出库</span></div>
                                        <div class="info">2016年11月07日 23:36</div>
                                    </li>
                                    <li class="step  li5">
                                        <div class="progress"><span class="text">交易成功</span></div>
                                        <div class="info">2016年11月08日 10:42</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-delivery order-delivery-detail" style="display:block;border:none;">
                                <p class="delivery-num">
                                    物流公司：<a href="http://www.rufengda.com" target="_blank">如风达(深圳)
                                        <i class="iconfont"></i></a>运单号：116110769691538401
                                </p>
                            </div>
                        </div>

                        <table class="order-items-table">
                            <tbody>
                            <?php foreach($odetail as $d): ?>
                                <tr>
                                    <td class="col col-thumb">
                                        <div class="figure figure-thumb">
                                            <a target="_blank" href="//item.mi.com/1160800072.html">
                                                <img src="//i1.mifile.cn/a1/T1AaJQBbZT1RXrhCrK!80x80.jpg" width="80"
                                                     height="80"
                                                     alt="">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="col col-name">
                                        <p class="name">
                                            <a target="_blank" href="//item.mi.com/1160800072.html">
                                                <?php echo e($d->p_name); ?>

                                            </a>

                                        </p>
                                    </td>
                                    <td class="col col-price">
                                        <p class="price"><?php echo e($d->p_price); ?>元 × <?php echo e($d->buy_num); ?></p>
                                    </td>
                                    <td class="col col-actions">
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>


                    <div id="editAddr" class="order-detail-info">

                        <h3>收货信息</h3>
                        <table class="info-table">
                            <tbody>
                            <tr>
                                <th>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</th>
                                <td id="buy_user"><?php echo e($orderid[0]->buy_user); ?></td>
                            </tr>
                            <tr>
                                <th>联系电话：</th>
                                <td id="buy_phone"><?php echo e(substr($orderid[0]->buy_phone,0,3).'*****'.substr($orderid[0]->buy_phone,8,3)); ?></td>
                            </tr>
                            <tr>
                                <th>收货地址：</th>
                                <td id="buy_address"><?php echo e($orderid[0]->address); ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="actions">
                            <?php if($orderid[0]->order_status == 0): ?>
                                <a class="btn btn-small btn-line-gray J_editAddr updateaddress" id="J_newAddress"
                                   href="#editAddr">修改</a>
                            <?php endif; ?>
                        </div>

                    </div>

                    <div id="editTime" class="order-detail-info">
                        <h3>支付方式及送货时间</h3>
                        <table class="info-table">
                            <tbody>
                            <tr>
                                <th>支付方式：</th>
                                <td>在线支付</td>
                            </tr>
                            <tr>
                                <th>送货时间：</th>
                                <td>不限送货时间</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                    <div class="order-detail-info">
                        <h3>发票信息</h3>
                        <table class="info-table">
                            <tbody>
                            <tr>
                                <th>发票类型：</th>
                                <td>纸质发票</td>
                            </tr>
                            <tr>
                                <th>发票内容：</th>
                                <td>购买商品明细</td>
                            </tr>
                            <tr>
                                <th>发票抬头：</th>
                                <td>个人</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="actions">

                        </div>
                    </div>
                    <div class="order-detail-total">
                        <table class="total-table">
                            <tbody>
                            <tr>
                                <th>商品总价：</th>
                                <td><span class="num"><?php echo e($orderid[0]->total); ?></span>元</td>
                            </tr>
                            <tr>
                                <th>运费：</th>
                                <td><span class="num">0</span>元</td>
                            </tr>
                            <tr>
                                <th class="total">实付金额：</th>
                                <td class="total"><span class="num"><?php echo e($orderid[0]->total); ?></span>元</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal modal-hide fade modal-edit-address in" id="J_modalEditAddress" style="display: none;"
         aria-hidden="true">
        <div class="modal-header">
            <span class="title">修改收货地址</span>
            <a class="close" data-dismiss="modal" href="javascript: void(0);">
                <i class="iconfont" id="closeAddAddress"></i>
            </a>
        </div>
        <div class="modal-body">
            <div class="form-box clearfix">
                <div class="form-section form-name">
                    <label class="input-label" for="user_name">姓名</label>
                    <input class="input-text J_addressInput" id="J_addressNameInput" name="user_name"
                           placeholder="收货人姓名" type="text" value="<?php echo e($orderid[0]->buy_user); ?>">
                </div>
                <div class="form-section form-phone">
                    <label class="input-label" for="user_phone">手机号</label>
                    <input class="input-text J_addressInput" id="J_addressPhoneInput" name="user_phone"
                           placeholder="11位手机号" type="text" value="<?php echo e($orderid[0]->buy_phone); ?>">
                </div>
                <div class="form-section form-four-address form-section-active">
                    <input id="J_selectAddressTrigger" class="input-text J_addressInput four_address"
                           name="four_address" readonly="readonly" value="<?php echo e($orderid[0]->address); ?>"
                           placeholder="选择省 / 市 / 区 / 街道" type="text" >
                    <i class="iconfont" id="chooseAddress"></i>
                </div>
                <div class="form-section form-address-detail">
                    <label class="input-label" for="user_adress">详细地址</label>
                    <textarea class="input-text J_addressInput" type="text" id="J_addressDetailInput"
                              name="user_address" placeholder="详细地址，路名或街道名称，门牌号"></textarea>
                </div>
                <div class="form-section form-zipcode">
                    <label class="input-label" for="user_zipcode">邮政编码</label>
                    <input class="input-text J_addressInput" id="J_addressZipcodeInput" name="user_zipcode"
                           type="text">
                </div>
                <div class="form-section form-tag">
                    <label class="input-label" for="user_tag">地址标签</label>
                    <input class="input-text J_addressInput" id="J_addressTagInput" name="user_tag"
                           placeholder="如&quot;家&quot;、&quot;公司&quot;。限5个字内" type="text">
                </div>

                <div class="form-section form-tip-msg clearfix" id="J_formTipMsg"></div>
            </div>

            <div class="select-address-wrapper hide" id="J_selectAddressWrapper">
                <span class="select-address-close">x</span>
                <div class="search-address-wrapper J_selectAddressItem" data-type="search"
                     id="J_searchAddressWrapper">
                    <div class="search-section">
                        <i class="icon icon-search iconfont"></i>
                        <input class="search-input" id="J_searchAddressInput" placeholder="输入街道、乡镇、小区或商圈名称"
                               autocomplete="off" type="text">
                        <span class="icon icon-del iconfont hide" id="J_searchAddressInputClear">×</span>
                    </div>

                    <div class="search-example">例如：北京 华润五彩城</div>

                    <div class="loading hide">
                        <div class="loader"></div>
                    </div>

                    <!-- 附近商圈 -->
                    <div class="nearby-address hide" id="J_nearbyAddress">
                        <div class="title">附近商圈</div>
                        <ul class="list clearfix"></ul>
                    </div>

                    <!-- 搜索列表 -->
                    <div class="search-address hide" id="J_searchAdress">
                        <ul class="list clearfix"></ul>
                    </div>

                    <div class="no-result hide" id="J_noSearchResult">
                        没有找到这个地方，<a href="javascript:void(0);" class="J_switchTypeTrigger"
                                    data-type="select">手动选择&gt;</a>
                    </div>
                    <div class="switch-type J_switchType">
                        <a href="javascript:;" class="J_switchTypeTrigger">手动选择地址&gt;</a>
                    </div>
                </div>
                <div class="four-address-wrapper hide J_selectAddressItem" data-type="select">
                    <div id="J_fourAddressWrapper">
                        <div class="select-box clearfix" id="J_selectWrapper">
                            <div class="select-first select-item J_select" data-init-txt="选择省份/自治区">
                                选择省份/自治区
                            </div>
                            <div class="select-item J_select hide" data-init-txt="选择城市/地区"></div>
                            <div class="select-item J_select hide" data-init-txt="选择区县"></div>
                            <div class="select-last select-item J_select hide" data-init-txt="选择配送区域"></div>
                        </div>
                        <div class="options-box">
                            <ul class="options-list J_optionsWrapper clearfix">
                                <?php foreach($data as $v): ?>
                                    <li class="option J_option" value="<?php echo e($v->id); ?>"><?php echo e($v->name); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="options-list J_optionsWrapper clearfix hide"></ul>
                            <ul class="options-list J_optionsWrapper clearfix hide"></ul>
                            <ul class="options-list J_optionsWrapper clearfix hide"></ul>
                        </div>
                    </div>
                    <div class="switch-type">
                        <a href="javascript:void(0);" class="J_switchTypeTrigger" data-type="search">
                            搜索地址快速定位&gt;</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="javascript:;" class="btn btn-primary" id="J_editAddressSave">保存</a>
            <a href="javascript:;" class="btn btn-gray" data-toggle="modal">取消</a>
        </div>
    </div>

    <div class="modal-backdrop  in" style="width: 100%; height: 1823px;display: none;"></div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    @parent

    <script type="text/javascript" src="<?php echo e(asset('js/home/order/order_address.js')); ?>"></script>

    <script>
        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            var index;

            var sid = $('#statusid').text();

            var li1 = $('.li1');
            var li2 = $('.li2');
            var li3 = $('.li3');
            var li4 = $('.li4');
            var li5 = $('.li5');


            switch (parseInt(sid)) {
                case 0:
                    li1.addClass('step-first step-active');
                    break;
                case 1:
                    li1.addClass('step-first step-active');
                    li2.addClass('step-first step-active');
                    break;
                case 2:
                    li1.addClass('step-first step-active');
                    li2.addClass('step-first step-active');
                    li3.addClass('step-first step-active');
                    break;
                case 3:
                    li1.addClass('step-first step-active');
                    li2.addClass('step-first step-active');
                    li3.addClass('step-first step-active');
                    li4.addClass('step-first step-active');
                    break;
                case 4:
                    li1.addClass('step-first step-done');
                    li2.addClass('step-done');
                    li3.addClass('step-done');
                    li4.addClass('step-done');
                    li5.addClass('step-done step-active step-last');
                    break;
                case 6:
                    li1.addClass('step-first step-done');
                    li2.addClass('step-done');
                    li3.addClass('step-done');
                    li4.addClass('step-done');
                    li5.addClass('step-done step-active step-last');
                    break;

            }

            $('.updateaddress').on('click', function () {
                $('.modal-backdrop').css('display', 'block');
                $('#J_modalEditAddress').css("display", "block");

            });

            $('#closeAddAddress,.btn-gray').on('click', function () {
                $('#J_modalEditAddress').css("display", "none");
                $('.modal-backdrop').css('display', 'none');
            });

            $('.style,.style1,.style3,.style4').on('click', function () {
                $(this).addClass('form-section-focus');
            }).on('focusout', function () {
                $(this).removeClass('form-section-focus');
            });


            $('#J_editAddressSave').on('click',function () {

                var input = $('#J_selectAddressTrigger').val();
                var text = $('#J_addressDetailInput').val();

                //获取地址信息
                var address = input+text;

                //获取收货人
                var name = $('#J_addressNameInput').val();

                //获取收货人电话
                var phone = $('#J_addressPhoneInput').val();

                //隐藏中间五位手机号
                var  p = phone.substr(0,3)+'*****'+phone.substr(8,3);

                var oid = $('#oid').text();

                var td1 = $('#buy_user');
                var td2 = $('#buy_phone');
                var td3 = $('#buy_address');

                $.ajax({
                    url:'<?php echo e(url('orderdetail/orderaddress')); ?>',
                    type:'put',
                    data:{'address':address,'name':name,'phone':phone,'_token': '<?php echo e(csrf_token()); ?>','oid':oid},
                    success: function (data) {
                        if(data == 1){
                            $('#J_modalEditAddress').css("display", "none");
                            $('.modal-backdrop').css('display', 'none');

                            td1.html(name);
                            td2.html(p);
                            td3.html(address);
                        } else {

                        }
                    }
                });
            });




        });


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>