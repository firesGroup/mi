<?php
/**
 * File Name: payorder.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/7/8
 * Time: 0:36
 */
?>

        <!DOCTYPE HTML>
<html lang="zh-CN" xml:lang="zh-CN">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8"/>
    <title>选择在线支付方式</title>
    <meta name="viewport" content="width=1226"/>

    <link rel="stylesheet" href="{{ asset('/css/home/orderpay.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/home/base.css') }}">


    <script type="text/javascript">
        /*<![CDATA[*/
        var _STAT_HASHNAME = "http://my.mi.com/buy/confirm";
        /*]]>*/
    </script>
</head>
<body>



<div class="site-header site-mini-header" >
    <div class="container " style=" height: 100px;">
        <div class="header-logo">
            <a class="logo " href="//www.mi.com/index.html" title="小米官网"></a>
        </div>
        <div class="header-title" id="J_miniHeaderTitle"></div>
        <span class="topbar-info" id="J_userInfo">
                <span class="user">
                        <a rel="nofollow" class="user-name" href="{{url('user_detail')}}" target="_blank">
                            <span class="name" id="user">{{session('user_deta')['nick_name']}}</span>
                            <i class="iconfont"></i>
                        </a>
                        <ul id="hidden" class="user-menu" style="display: none;">
                            <li>
                            <a rel="nofollow" href="{{url('user_detail')}}" target="_blank" data-stat-id="e0b9e1d1fa8052a2" onclick="_msq.push(['trackEvent', '79fe2eae924d2a2e-e0b9e1d1fa8052a2', '//my.mi.com/portal', 'pcpid', '']);">个人中心
                            </a>
                            </li>
                            <li>
                            <a rel="nofollow" href="//order.mi.com/user/comment" target="_blank" data-stat-id="6d05445058873c2c" onclick="">评价晒单</a>
                            </li>
                            <li>
                            <a rel="nofollow" href="//order.mi.com/user/favorite" target="_blank" data-stat-id="32e2967e9a749d3d" onclick="">我的喜欢
                            </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="{{url('login/exit')}}" data-stat-id="770a31519c713b11" onclick="">退出登录</a>
                            </li>
                        </ul>
                    </span>
            <span class="sep">|</span>
            <a rel="nofollow" class="link" href="{{url('order/'.session('user_deta')['id'])}}" data-needlogin="true">我的订单</a>
        </span>
    </div>
</div>
<!-- .site-mini-header END -->
<script type="text/javascript">
    var _confirmConfig = {
        order_id: '1170708623000028',
        safe_tel: '',
        goods_amount: '399.00',
    };
</script>

<div class="page-main">
    <div class="container confirm-box">
        <form target="_blank" action="#" id="J_payForm" method="post">
            <div class="section section-order">
                <div class="order-info clearfix">
                    <div class="fl">
                        <h2 class="title">订单提交成功！去付款咯～</h2>
                        <p class="order-time" id="J_deliverDesc">我们将尽快为您发货</p>
                        <p class="post-info" id="J_postInfo">
                            收货信息：{{$order[0]->buy_user}} {{substr($order[0]->buy_phone,0,3).'*****'.substr($order[0]->buy_phone,8,3)}}&nbsp;&nbsp; &nbsp;&nbsp;
                            {{$order[0]->address}} </p>
                    </div>
                    <div class="fr">
                        <p class="total">
                            应付总额：<span class="money"><em>{{$order[0]->total}}</em>元</span>
                        </p>
                        <a href="javascript:void(0);" class="show-detail" id="J_showDetail">订单详情<i class="iconfont">&#xe61c;</i></a>
                    </div>
                </div>
                <i class="iconfont icon-right">&#x221a;</i>
                <div class="order-detail">
                    <ul>
                        <li class="clearfix">
                            <div class="label">订单号：</div>
                            <div class="content">
                                <span class="order-num">{{$order[0]->order_sn}}</span>
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="label">收货信息：</div>
                            <div class="content">
                                {{$order[0]->buy_user}} {{substr($order[0]->buy_phone,0,3).'*****'.substr($order[0]->buy_phone,8,3)}}&nbsp;&nbsp;
                                {{$order[0]->address}}
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="label">商品名称：</div>
                            @foreach($detail as $v)
                                <div class="content" style="float: left;">{{$v->p_name}}</div>
                            @endforeach
                        </li>
                        <li class="clearfix">
                            <div class="label">配送时间：</div>
                            <div class="content">
                                不限送货时间
                            </div>
                        </li>
                        <li class="clearfix">
                            <div class="label">发票信息：</div>
                            <div class="content">
                                纸质发票 个人
                            </div>
                        </li>
                    </ul>

                    <div>
                        <a class="btn btn-small btn-primary affirmhuo"
                            href="javascript: void(0);">付款</a>
                    </div>
                </div>
            </div>


            <div class="section section-payment">
                <div class="cash-title" id="J_cashTitle">
                    选择以下支付方式付款
                </div>



                <div class="payment-box ">
                    <div class="payment-header clearfix">
                        <h3 class="title">支付平台</h3>
                        <span class="desc"></span>
                    </div>
                    <div class="payment-body">
                        <ul class="clearfix payment-list J_paymentList J_linksign-customize">
                            <li id="J_weixin"><img src="//c1.mifile.cn/f/i/15/pay/wechat0715.jpg" alt="微信支付"
                                                   style="margin-left: 0;"/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="alipay" value="alipay"/>
                                <img src="//c1.mifile.cn/f/i/15/pay/event-alipay20160718.jpg" alt="支付宝"
                                     style="margin-left: 0;"/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="unionpay" value="unionpay"/>
                                <img src="//s01.mifile.cn/i/banklogo/unionpay.png?ver2015" alt="银联"
                                     style="margin-left: 0;"/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="cft" value="cft"/> <img
                                        src="//s01.mifile.cn/i/banklogo/cft.png" alt="财付通" style="margin-left: 0;"/>
                            </li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="micash" value="micash"/>
                                <img src="//c1.mifile.cn/f/i/15/pay/event-mipay20170427.jpg" alt="小米钱包"
                                     style="margin-left: 0;"/></li>
                        </ul>
                        <div class="event-desc">
                            <p>微信支付：关注小米手机微信公众号，支付成功后可领取3-10元电影票红包。</p>
                            <p>支 付 宝：支付宝扫码支付，赢1999元红包</p>
                            <p>小米钱包：绑定新卡支付，享最高立减99元</p>                            <a href="//www.mi.com/c/payrule/"
                                                                                      class="more" target="_blank">了解更多&gt;</a>
                        </div>
                    </div>
                </div>

                <div class="payment-box ">
                    <div class="payment-header clearfix">
                        <h3 class="title">银行借记卡及信用卡</h3>
                    </div>
                    <div class="payment-body">
                        <ul class="clearfix payment-list payment-list-much J_paymentList J_linksign-customize">
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CMB" value="CMB"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_zsyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="ICBCB2C" value="ICBCB2C"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_gsyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CCB" value="CCB"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_jsyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="COMM" value="COMM"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_jtyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="ABC" value="ABC"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_nyyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="BOCB2C" value="BOCB2C"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_zgyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="PSBC-DEBIT"
                                                      value="PSBC-DEBIT"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_youzheng.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="GDB" value="GDB"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_gfyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="SPDB" value="SPDB"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_pufa.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CEBBANK" value="CEBBANK"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_gdyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CIB" value="CIB"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_xyyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CMBC" value="CMBC"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_msyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CITIC" value="CITIC"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_zxyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="SHBANK" value="SHBANK"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_shyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="BJRCB" value="BJRCB"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_bjnsyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="NBBANK" value="NBBANK"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_nbyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="HZCBB2C" value="HZCBB2C"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_hzyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="SHRCB" value="SHRCB"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_shnsyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="FDB" value="FDB"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_fcyh.png?ver2015" alt=""/></li>
                            <li class="J_showMore">
                                <span class="text hide">查看更多</span>
                                <span class="text ">收起更多</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="payment-box payment-box-last ">
                    <div class="payment-header clearfix">
                        <h3 class="title">快捷支付</h3>
                        <span class="desc">（支持以下各银行信用卡以及部分银行借记卡）</span>
                    </div>
                    <div class="payment-body">
                        <ul class="clearfix payment-list  J_paymentList J_linksign-customize">
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CMB-KQ" value="CMB-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_zsyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="COMM-KQ" value="COMM-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_jtyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CCB-KQ" value="CCB-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_jsyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="ICBCB2C-KQ"
                                                      value="ICBCB2C-KQ"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_gsyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CITIC-KQ" value="CITIC-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_zxyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CEBBANK-KQ"
                                                      value="CEBBANK-KQ"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_gdyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="BOCB2C-KQ"
                                                      value="BOCB2C-KQ"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_zgyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="SRCB-KQ" value="SRCB-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_shncsyyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="JSB-KQ" value="JSB-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_jiangsshuyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="CIB-KQ" value="CIB-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_xyyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="ABC-KQ" value="ABC-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_nyyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="SPABANK-KQ"
                                                      value="SPABANK-KQ"/> <img
                                        src="//s01.mifile.cn/i/banklogo/payOnline_payh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="HXB-KQ" value="HXB-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_hyyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="GDB-KQ" value="GDB-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_gfyh.png?ver2015" alt=""/></li>
                            <li class="J_bank"><input type="radio" name="payOnlineBank" id="BOB-KQ" value="BOB-KQ"/>
                                <img src="//s01.mifile.cn/i/banklogo/payOnline_bjyh.png?ver2015" alt=""/></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="section section-installment" id="J_paymentFenqi">
                <div class="payment-box">
                    <div class="payment-header clearfix">
                        <h3 class="title">分期付款</h3>
                        <span class="desc"></span>
                    </div>
                    <div class="payment-body">
                        <ul class="clearfix payment-list J_paymentList J_linksign-customize J_tabSwitch">
                            <li class="J_bank fenqi" data-isinstalment="true"><input autocomplete="off" type="radio"
                                                                                     name="payOnlineBank"
                                                                                     id="mifinanceinstal"
                                                                                     value="mifinanceinstal"/> <img
                                        src="//c1.mifile.cn/f/i/15/pay/mifinanceinstal.png" alt="分期-小米金融	"/></li>
                        </ul>
                        <div class="tab-container clearfix isinstalment-box">
                            <div class="tab-content  clearfix">
                                <div class="isinstalment-item  clearfix" style="height:150px;">
                                    <div class="item-header">
                                        <h3>135.95元 × 3期</h3>
                                        <p>
                                            手续费 2.95元/期，费率2.22%
                                        </p>
                                    </div>
                                    <br/>
                                    <div class="item-footer">
                                        <input type="radio" name="installments" id="installments_cmbinstal_3" value="3">
                                        <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">选择该分期方式</a>
                                    </div>
                                </div>
                                <div class="isinstalment-item  clearfix" style="height:150px;">
                                    <div class="item-header">
                                        <h3>69.09元 × 6期</h3>
                                        <p>
                                            手续费 2.59元/期，费率3.9%
                                        </p>
                                    </div>
                                    <br/>
                                    <div class="item-footer">
                                        <input type="radio" name="installments" id="installments_cmbinstal_6" value="6">
                                        <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">选择该分期方式</a>
                                    </div>
                                </div>
                                <div class="isinstalment-item  clearfix" style="height:150px;">
                                    <div class="item-header">
                                        <h3>35.64元 × 12期</h3>
                                        <p>
                                            手续费 2.39元/期，费率7.2%
                                        </p>
                                    </div>
                                    <br/>
                                    <div class="item-footer">
                                        <input type="radio" name="installments" id="installments_cmbinstal_12"
                                               value="12">
                                        <a href="javascript:void(0);" class="btn J_installmentConfirmBtn">选择该分期方式</a>
                                    </div>
                                </div>

                                <div class="isinstalment-desc">
                                    分期付款说明：<br/>
                                    每期还款金额是根据你的订单估算得出的金额，实际支付数额请以小米分期账单为准，小米分期有权决定是否接受您的分期付款申请。
                                </div>
                            </div>
                        </div>
                        <div class="isinstalment-desc" id="J_isinstalmentPublicDesc">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>



<!--现金账户 提示框-->
<div class="modal  modal-hide modal-balance-pay" id="J_balancePay">
    <div class="modal-header">
        <h3>现金账户安全验证</h3>
        <span class="close" data-dismiss="modal"><i class="iconfont">&#xe602;</i></span>
    </div>
    <div class="modal-body">
        <p>
            为了确保您的购物安全<br>
            已向您当前的联系电话 <span class="num" id="J_cashPayPhone"></span> 发送验证码
        </p>
        <div class="form-section">
            <label class="input-label" for="verifycode">请输入验证码</label>
            <input class="input-text" type="text" id="verifycode" name="verifycode">
            <span class="btn btn-block hide" id="J_sendAgain"></span>
        </div>
        <div class="tip" id="J_checkCodeTip"></div>
    </div>
    <div class="modal-footer">
        <a class="btn btn-gray" data-dismiss="modal" href="javascript:void(0);">取消</a>
        <a class="btn btn-primary" id="J_checkCodeBtn" href="javascript:void(0);">确认</a>
    </div>
</div>

<!-- 支付提示框 -->
<div class="modal fade modal-hide modal-pay-tip" id="J_payTip" aria-hidden="false">
    <div class="modal-header">
        <h3>正在支付...</h3>
        <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont">&#xe602;</i></a>
    </div>
    <div class="modal-body clearfix">
        <div class="success">
            <h4>支付成功了</h4>
            <p><a href="https://order.mi.com/user/orderView/1170708623000028">立即查看订单详情 &gt;</a></p>
        </div>
        <div class="fail">
            <h4>如果支付失败</h4>
            <p><a href="http://bbs.xiaomi.cn/thread/index/tid/11544653" target="_blank">查看支付常见问题 &gt;</a></p>
        </div>
    </div>
</div>

<div class="modal modal-hide fade modal-alert" id="J_modalAlert">
    <div class="modal-bd">
        <div class="text">
            <h3 id="J_alertMsg"></h3>
        </div>
        <div class="actions">
            <button class="btn btn-primary" data-dismiss="modal">确定</button>
        </div>
        <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont">&#xe602;</i></a>
    </div>
</div>

<div class="modal modal-hide fade modal-alipay" id="J_modalAlipay">
    <div class="modal-bd">
        <div class="loading">
            <div class="loader"></div>
        </div>
        <iframe name="alipayQrcodeIframe" scrolling="no" frameborder="0" width="100%" height="100%"></iframe>
    </div>
    <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont">&#xe602;</i></a>
</div>

<div class="modal modal-hide fade modal-weixin-pay" id="J_modalWeixinPay">
    <div class="modal-hd">
        <span class="title">微信支付</span>
        <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont">&#xe602;</i></a>
    </div>
    <div class="modal-bd" id="J_showWeixinPayExample">
        <div class="code" id="J_weixinPayCode">
            <div class="loading">
                <div class="loader"></div>
            </div>
        </div>
        <div class="msg">
            请使用 <span>微信</span> 扫一扫<br>二维码完成支付
        </div>
    </div>
    <div class="example" id="J_weixinPayExample"></div>
</div>

<div class="deliver-beta hide" id="J_deliverBeta">
    <p>预计送达时间功能处于测试阶段，若您在下单时已选择“周末送货”或“工作日送货”，则会顺延至您要求的时间，如果发现预计送达时间不准确，期待您的反馈，我们会及时改进。</p>
    <a href="//static.mi.com/feedback/" target="_blank">问题反馈 &gt;</a>

    <i class="arrow arrow-a"></i>
    <i class="arrow arrow-b"></i>
</div>
<div class="site-footer">
    <div class="container">
        <div class="footer-service">
            <ul class="list-service clearfix">
                <li><a rel="nofollow" href="//www.mi.com/static/fast/" target="_blank"><i class="iconfont">&#xe634;</i>预约维修服务</a>
                </li>
                <li><a rel="nofollow" href="//www.mi.com/service/exchange#back" target="_blank"><i class="iconfont">&#xe635;</i>7天无理由退货</a>
                </li>
                <li><a rel="nofollow" href="//www.mi.com/service/exchange#free" target="_blank"><i class="iconfont">&#xe636;</i>15天免费换货</a>
                </li>
                <li><a rel="nofollow" href="//www.mi.com/service/exchange#mail" target="_blank"><i class="iconfont">&#xe638;</i>满150元包邮</a>
                </li>
                <li><a rel="nofollow" href="//www.mi.com/static/maintainlocation/" target="_blank"><i class="iconfont">&#xe637;</i>520余家售后网点</a>
                </li>
            </ul>
        </div>
        <div class="footer-links clearfix">

            <dl class="col-links col-links-first">
                <dt>帮助中心</dt>

                <dd><a rel="nofollow" href="//www.mi.com/service/account/register/" target="_blank">账户管理</a></dd>

                <dd><a rel="nofollow" href="//www.mi.com/service/buy/buytime/" target="_blank">购物指南</a></dd>

                <dd><a rel="nofollow" href="//www.mi.com/service/order/sendprogress/" target="_blank">订单操作</a></dd>

            </dl>

            <dl class="col-links ">
                <dt>服务支持</dt>

                <dd><a rel="nofollow" href="//www.mi.com/service/exchange" target="_blank">售后政策</a></dd>

                <dd><a rel="nofollow" href="http://fuwu.mi.com/" target="_blank">自助服务</a></dd>

                <dd><a rel="nofollow" href="http://xiazai.mi.com/" target="_blank">相关下载</a></dd>

            </dl>

            <dl class="col-links ">
                <dt>线下门店</dt>

                <dd><a rel="nofollow" href="//www.mi.com/c/xiaomizhijia/" target="_blank">小米之家</a></dd>

                <dd><a rel="nofollow" href="//www.mi.com/static/maintainlocation/" target="_blank">服务网点</a></dd>

                <dd><a rel="nofollow" href="//www.mi.com/static/familyLocation/" target="_blank">零售网点</a></dd>

            </dl>

            <dl class="col-links ">
                <dt>关于小米</dt>

                <dd><a rel="nofollow" href="//www.mi.com/about/" target="_blank">了解小米</a></dd>

                <dd><a rel="nofollow" href="http://hr.xiaomi.com/" target="_blank">加入小米</a></dd>

                <dd><a rel="nofollow" href="//www.mi.com/about/contact/" target="_blank">联系我们</a></dd>

            </dl>

            <dl class="col-links ">
                <dt>关注我们</dt>

                <dd><a rel="nofollow" href="http://weibo.com/xiaomishangcheng" target="_blank">新浪微博</a></dd>

                <dd><a rel="nofollow"
                       href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat"
                       target="_blank">小米部落</a></dd>

                <dd><a rel="nofollow" href="#J_modalWeixin" data-toggle="modal">官方微信</a></dd>

            </dl>

            <dl class="col-links ">
                <dt>特色服务</dt>

                <dd><a rel="nofollow" href="//order.mi.com/queue/f2code" target="_blank">F 码通道</a></dd>

                <dd><a rel="nofollow" href="//www.mi.com/giftcode/" target="_blank">礼物码</a></dd>

                <dd><a rel="nofollow" href="//order.mi.com/misc/checkitem" target="_blank">防伪查询</a></dd>

            </dl>

            <div class="col-contact">
                <p class="phone">小米客服</p>
                <p>
                    7x24小时全天陪伴<br>为您解决问题
                </p>
                <a rel="nofollow" class="btn btn-line-primary btn-small" href="//www.mi.com/service/contact/"
                   target="_blank"><i class="iconfont">&#xe600;</i> 立即开始咨询</a></div>
        </div>
    </div>
</div>
<div class="site-info">
    <div class="container">
        <span class="logo ir">小米官网</span>
        <div class="info-text">
            <p>小米旗下网站：<a href="//www.mi.com/index.html" target="_blank">小米商城</a><span class="sep">|</span><a
                        href="http://www.miui.com/" target="_blank">MIUI</a><span class="sep">|</span><a
                        href="http://www.miliao.com/" target="_blank">米聊</a><span class="sep">|</span><a
                        href="http://www.duokan.com/" target="_blank">多看书城</a><span class="sep">|</span><a
                        href="http://www.miwifi.com/" target="_blank">小米路由器</a><span class="sep">|</span><a
                        href="http://call.mi.com/" target="_blank">视频电话</a><span class="sep">|</span><a
                        href="http://xiaomi.tmall.com/" target="_blank">小米天猫店</a><span class="sep">|</span><a
                        href="http://shop115048570.taobao.com" target="_blank">小米淘宝直营店</a><span class="sep">|</span><a
                        href="http://union.mi.com/" target="_blank">小米网盟</a><span class="sep">|</span><a
                        href="//www.mi.com/mimobile/" target="_blank">小米移动</a><span class="sep">|</span><a
                        href="http://www.miui.com/res/doc/privacy/cn.html" target="_blank">隐私政策</a><span
                        class="sep">|</span><a href="#J_modal-globalSites" data-toggle="modal" target="_blank">Select
                    Region</a></p>
            <p>&copy;<a href="//www.mi.com/" target="_blank" title="mi.com">mi.com</a> 京ICP证110507号 <a
                        href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">京ICP备10046444号</a> <a
                        rel="nofollow"
                        href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134"
                        target="_blank">京公网安备11010802020134号 </a><a rel="nofollow"
                                                                    href="//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg"
                                                                    target="_blank"
                                                                    rel="nofollow">京网文[2014]0059-0009号</a>

                <br> 违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</p>
        </div>
        <div class="info-links">
            <a href="//privacy.truste.com/privacy-seal/validation?rid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&lang=zh-cn"
               target="_blank"><img src="//c1.mifile.cn/f/i/17/site/truste.png" alt="TRUSTe Privacy Certification"/></a>
            <a href="//search.szfw.org/cert/l/CX20120926001783002010" target="_blank"><img
                        src="//s01.mifile.cn/i/v-logo-2.png" alt="诚信网站"/></a>
            <a href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&ct=df&pa=461082" target="_blank"><img
                        src="//s01.mifile.cn/i/v-logo-1.png" alt="可信网站"/></a>
            <a href="http://www.315online.com.cn/member/315140007.html" target="_blank"><img
                        src="//s01.mifile.cn/i/v-logo-3.png" alt="网上交易保障中心"/></a>

        </div>
    </div>
    <div class="slogan ir">探索黑科技，小米为发烧而生</div>
</div>

<div id="J_modalWeixin" class="modal fade modal-hide modal-weixin" data-width="480" data-height="520">
    <div class="modal-hd">
        <a class="close" data-dismiss="modal"><i class="iconfont">&#xe602;</i></a>
        <span class="title">小米手机官方微信二维码</span>
    </div>
    <div class="modal-bd">
        <img alt="" src="//c1.mifile.cn/f/i/17/site/site-weixin.png" width="680" height="340"/>
    </div>
</div>
<!-- .modal-weixin END -->
<div class="modal modal-hide modal-bigtap-queue" id="J_bigtapQueue">
    <div class="modal-body">
        <span class="close" data-dismiss="modal" aria-hidden="true">退出排队</span>
        <div class="con">
            <div class="title">正在排队，请稍候喔！</div>
            <div class="queue-tip-box">
                <p class="queue-tip">当前人数较多，请您耐心等待，排队期间请不要关闭页面。</p>
                <p class="queue-tip">时常来官网看看，最新产品和活动信息都会在这里发布。</p>
                <p class="queue-tip">下载小米商城 App 玩玩吧！产品开售信息抢先知道。</p>
                <p class="queue-tip">发现了让你眼前一亮的小米产品，别忘了分享给朋友！</p>
                <p class="queue-tip">产品开售前会有预售信息，关注官网首页就不会错过。</p>
            </div>
        </div>

        <div class="queue-posters">
            <div class="poster poster-3"></div>
            <div class="poster poster-2"></div>
            <div class="poster poster-1"></div>
            <div class="poster poster-4"></div>
            <div class="poster poster-5"></div>
        </div>
    </div>
</div>
<!-- .xm-dm-queue END -->
<div id="J_bigtapError" class="modal modal-hide modal-bigtap-error">
    <span class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont">&#xe602;</i></span>
    <div class="modal-body">
        <h3>抱歉，网络拥堵无法连接服务器</h3>
        <p class="error-tip">由于访问人数太多导致服务器压力山大，请您稍后再重试。</p>
        <p>
            <a class="btn btn-primary" id="J_bigtapRetry">重试</a>
        </p>
    </div>
</div>


<div id="J_bigtapModeBox" class="modal fade modal-hide modal-bigtap-mode">
    <span class="close" data-dismiss="modal"><i class="iconfont">&#xe602;</i></span>
    <div class="modal-body">
        <h3 class="title">为防黄牛，请您输入下面的验证码</h3>
        <p class="desc">在防黄牛的路上，我们一直在努力，也知道做的还不够。<br>
            所以，这次劳烦您多输一次验证码，我们一起防黄牛。</p>
        <div class="mode-loading" id="J_bigtapModeLoading">
            <img src="//c1.mifile.cn/f/i/2014/cn/loading.gif" alt="" width="32" height="32">
            <a id="J_bigtapModeReload" class="reload  hide" href="javascript:void(0);">网络错误，点击重新获取验证码！</a>
        </div>
        <div class="mode-action hide" id="J_bigtapModeAction">
            <div class="mode-con" id="J_bigtapModeContent"></div>
            <input type="text" name="bigtapmode" class="input-text" id="J_bigtapModeInput" placeholder="请输入正确的验证码">
            <p class="tip" id="J_bigtapModeTip"></p>
            <a class="btn  btn-gray" id="J_bigtapModeSubmit">确认</a>
        </div>
    </div>
</div>

<div id="J_bigtapSoldout" class="modal fade modal-hide modal-bigtap-soldout modal-bigtap-soldout-norec">
    <span class="close" data-dismiss="modal"><i class="iconfont">&#xe602;</i></span>
    <div class="modal-body ">
        <div class="content clearfix">
            <span class="mitu"></span>
            <p class="title">很遗憾，你本次未能买到<br>人真是太多了</p>
            <p class="subtitle">别灰心，可以关注小米商城app、微博，或者微信，<br>我们会及时告知你下一轮的开售时间。</p>
        </div>

        <div class="bigtap-recomment-goods">
            <div class="hd"><span>这些产品也不错，而且有现货哦！</span></div>
            <ul class="clearfix" id="J_bigtapRecommentList"></ul>
        </div>
    </div>
</div>
<!-- .xm-dm-error END -->
<div id="J_modal-globalSites" class="modal fade modal-hide modal-globalSites" data-width="640">
    <div class="modal-hd">
        <a class="close" data-dismiss="modal"><i class="iconfont">&#xe602;</i></a>
        <span class="title">Select Region</span>
    </div>
    <div class="modal-bd">
        <h3>Welcome to Mi.com</h3>
        <p class="modal-globalSites-tips">Please select your country or region</p>
        <p class="modal-globalSites-links clearfix">
            <a href="//www.mi.com/index.html">Mainland China</a>
            <a href="http://www.mi.com/hk/">Hong Kong</a>
            <a href="http://www.mi.com/tw/">Taiwan</a>
            <a href="http://www.mi.com/sg/">Singapore</a>
            <a href="http://www.mi.com/my/">Malaysia</a>
            <a href="http://www.mi.com/ph/">Philippines</a>
            <a href="http://www.mi.com/in/">India</a>
            <a href="http://www.mi.com/id/">Indonesia</a>
            <a href="http://www.mi.com/en/">Global Home</a>
            <a href="http://www.mi.com/mena/">MENA</a>
            <a href="http://www.mi.com/pl/">Poland</a>
            <a href="http://www.mi.com/ua/">Ukraine</a>
            <a href="http://www.mi.com/ru/">Russia</a>
            <a href="http://www.mi.com/vn/">Vietnam</a>
            <a href="http://www.mi.com/mx/">Mexico</a>
            <a href="http://www.mi.com/kr/">Korea</a>
        </p>
    </div>
</div>
<!-- .modal-globalSites END -->
<div class="modal fade modal-hide comment-modal in" id="J_commentModal" aria-hidden="true" style="display: none;text-align: center;"><a
            class="close" data-dismiss="modal" href="javascript: void(0);">
        <i class="iconfont"></i></a>
    <div class="modal-body">
        <div class="txt"><h2 class="tit">支付成功</h2></div>
        <br>
        <br>
        <a href="{{url('order/'.$order[0]->member_id)}}" class="btn btn-primary" id="goorder">去我的订单</a>

    </div>


    <br>
</div>


<div class="modal-backdrop fade in" style="width: 100%; height: 5695px;display: none;"></div>




<script src="//s01.mifile.cn/js/base.min.js?v2017a25"></script>
<script>
    (function () {
        MI.namespace('GLOBAL_CONFIG');
        MI.GLOBAL_CONFIG = {
            orderSite: 'https://order.mi.com',
            wwwSite: '//www.mi.com',
            cartSite: '//cart.mi.com',
            itemSite: '//item.mi.com',
            assetsSite: '//s01.mifile.cn',
            listSite: '//list.mi.com',
            searchSite: '//search.mi.com',
            mySite: '//my.mi.com',
            damiaoSite: 'https://tp.hd.mi.com/',
            damiaoGoodsId: [],
            logoutUrl: 'https://order.mi.com/site/logout',
            staticSite: '//static.mi.com',
            quickLoginUrl: 'https://account.xiaomi.com/pass/static/login.html'
        };
        MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + '/user/order';
        MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
        MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
        MI.miniCart.init();
        //MI.updateMiniCart();
    })();
</script>

<script type="text/javascript" src="//s01.mifile.cn/js/payConfirm.min.js?v=2016081101"></script>

<script>
    var _msq = _msq || [];
    _msq.push(['setDomainId', 100]);
    _msq.push(['trackPageView']);
    (function () {
        var ms = document.createElement('script');
        ms.type = 'text/javascript';
        ms.async = true;
        ms.src = '//c1.mifile.cn/f/i/15/stat/js/xmst.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ms, s);
    })();

    $('#J_userInfo').on('mouseenter', '#user', function(){

        $('#hidden').slideDown();
        $('span.user').addClass('user-active');

    });

    $('#J_userInfo').mouseleave( function () {
        // alert(123);
        $('#hidden').css({"display":"none"});
        $('span.user').removeClass('user-active');

    });

    $('.affirmhuo').on('click', function () {

        var oid = $('.order-num').text();

        var url = '{{url('pay')}}';
        $.ajax({
            url:url,
            type:'get',
            data:{'_token':'{{csrf_token()}}','oid':oid},
            success:function (data) {

                if(data){

                    $('.modal-backdrop').css('display','block');
                    $('#J_commentModal').css('display','block');

                }else{
                    alert('未知原因失败,请重新提交');
                }
            }

        });
    });

</script>
</body>
</html>