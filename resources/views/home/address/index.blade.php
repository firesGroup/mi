<?php
/**
 * File Name: index.blade.php
 * Description: 收货地址页面
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/29
 * Time: 20:43
 */
?>

@extends('layouts.home')

@section('title', '我的收货地址-小米商城')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/checkout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/address.css') }}">
@endsection
@section('content')

    <div class="site-header site-mini-header">
        <div class="container">
            <div class="header-logo">
                <a class="logo " href="{{url('/')}}" title="小米官网"></a>
            </div>
            <div class="header-title" id="J_miniHeaderTitle"><h2>确认订单</h2></div>
            <div class="topbar-info" id="J_userInfo">
            <span class="user">
                <a rel="nofollow" class="user-name" href="" target="_blank">
                    <span class="name">1178705369</span>
                    <i class="iconfont"></i>
                </a>
                <ul class="user-menu" style="display: none;">
                    <li><a rel="nofollow" href="" target="_blank">个人中心</a></li>
                    <li><a rel="nofollow" href="" target="_blank">评价晒单</a></li>
                    <li><a rel="nofollow" href="" target="_blank">我的喜欢</a></li>
                    <li><a rel="nofollow" href="" target="_blank">小米账户</a></li>
                    <li><a rel="nofollow" href="">退出登录</a></li>
                </ul>
            </span>
                <span class="sep">|</span>
                <a rel="nofollow" class="link link-order" href="" target="_blank">我的订单</a>
            </div>
        </div>
    </div>

    <div class="page-main">
        <div class="container">
            <div class="checkout-box">
                <div class="section section-address">
                    <div class="section-header clearfix">
                        <h3 class="title">收货地址</h3>
                        <div class="more">
                        </div>
                    </div>
                    <div class="section-body clearfix" id="J_addressList">
                        <!-- addresslist begin -->
                        <div class="address-item J_addressItem ">
                            <dl>
                                <dt>
                                    <span class="tag"></span>
                                    <em class="uname">潘珺</em>
                                </dt>
                                <dd class="utel">
                                    135****5920
                                </dd>
                                <dd class="uaddress">
                                    广东 珠海市 香洲区 前山街道<br>
                                    夏湾河畔豪庭346号德晋商贸
                                </dd>
                            </dl>
                            <div class="actions">
                                <a href="javascript:void(0);" class="modify J_addressModify">修改</a>
                            </div>
                        </div>
                        <!-- addresslist end -->
                        <div class="address-item address-item-new" id="J_newAddress">
                            <i class="iconfont"></i>
                            添加新地址
                        </div>
                    </div>
                </div>

                <div class="section section-options section-payment clearfix">
                    <div class="section-header">
                        <h3 class="title">支付方式</h3>
                    </div>
                    <div class="section-body clearfix">
                        <ul class="J_optionList options ">
                            <li data-type="pay" class="J_option selected" data-value="1">
                                在线支付 <span>
                            （支持微信支付、支付宝、银联、财付通、小米钱包等）                            </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="section section-options section-shipment clearfix">
                    <div class="section-header">
                        <h3 class="title">配送方式</h3>
                    </div>
                    <div class="section-body clearfix">
                        <ul class="clearfix J_optionList options ">
                            <li data-type="shipment" class="J_option selected" data-amount="0" data-value="1">
                                快递配送（免运费）
                            </li>
                        </ul>

                        <div class="service-self-tip" id="J_serviceSelfTip" style="display: none;"></div>
                    </div>
                </div>

                <div class="section section-options section-time clearfix">
                    <div class="section-header">
                        <h3 class="title">配送时间</h3>
                    </div>
                    <div class="section-body clearfix">
                        <ul class="J_optionList options options-list clearfix">
                            <!-- besttime start -->
                            <li data-type="time" class="J_option selected" data-value="1">
                                不限送货时间：<span>周一至周日</span></li>
                            <li data-type="time" class="J_option " data-value="2">
                                工作日送货：<span>周一至周五</span></li>
                            <li data-type="time" class="J_option " data-value="3">
                                双休日、假日送货：<span>周六至周日</span></li>
                            <!-- besttime end -->
                        </ul>
                    </div>
                </div>

                <div class="section section-options section-invoice clearfix">
                    <div class="section-header">
                        <h3 class="title">发票</h3>
                    </div>
                    <div class="section-body clearfix">
                        <ul class="J_optionList options options-list  clearfix">
                            <li data-type="invoice" data-invoice-type="not_invoice" class="hide J_option">
                                不开发票
                            </li>
                            <li data-type="invoice" data-invoice-type="electron" class="J_option" data-value="4">
                                电子发票（非纸质）
                            </li>
                            <li data-type="invoice" data-invoice-type="personal" class="J_option selected"
                                data-value="1">
                                普通发票（纸质）
                            </li>
                        </ul>

                        <ul class="J_optionList options options-list clearfix">
                            <li data-type="invoice-mode" data-invoice-mode="personal" class="J_option selected">
                                个人
                            </li>
                            <li data-type="invoice-mode" data-invoice-mode="company" class="J_option">
                                单位
                            </li>
                        </ul>

                        <div class="paper-invoice-company" id="J_invoiceInfoBox">
                            <div class="form-section form-section-active form-section-valid" id="J_invoiceTitle">
                                <label class="input-label" for="invoice_title">请输入发票抬头</label>
                                <input class="input-text" id="invoice_title" name="invoice_title" value="个人"
                                       type="text">
                            </div>
                            <div class="form-section hide form-section-valid" id="J_invoiceCompanyCode">
                                <label class="input-label" for="invoice_company_code">请填写购买方纳税人识别号或社会信用代码</label>
                                <input class="input-text" id="invoice_company_code" name="invoice_company_code" value=""
                                       type="text">
                                <a href="#J_modalInvoiceFaq">
                                    <i class="icon-qa">?</i>
                                </a>
                            </div>

                            <div class="invoice-company-code-tip hide" id="J_invoiceCompanyCodeTip">
                                <span class="input-text">小米商城纸质发票暂不支持填写税号</span>
                                <a href="#J_modalInvoiceFaq">
                                    <i class="icon-qa">?</i>
                                </a>
                            </div>

                            <p>发票内容：购买商品明细</p>
                        </div>

                        <div class="more">
                            <dl>
                                <dt>发票须知：</dt>
                                <dd>1. 电子发票可在订单完成后，在订单详情中下载和查看。</dd>
                                <dd>2. 发票金额为实际支付金额，不包含优惠券、礼品卡等。</dd>
                                <dd>
                                    <a href="javascript:;">查看更多发票常见问题&gt;</a>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="section section-goods">
                    <div class="section-header clearfix">
                        <h3 class="title">商品及优惠券</h3>
                        <div class="more">
                            <a href="{{url('home/cart')}}">返回购物车
                                <i class="iconfont"></i></a>
                        </div>
                    </div>
                    <div class="section-body">
                        <ul class="goods-list" id="J_goodsList">
                            <li class="clearfix">
                                <div class="col col-img">
                                    <img src="//i1.mifile.cn/a1/pms_1490088796.67026066!30x30.jpg" width="30"
                                         height="30">
                                </div>
                                <div class="col col-name">
                                    <a href="//item.mi.com/1163700032.html">
                                        小米手机5s Plus 全网通版 4GB内存 灰色 64GB
                                    </a>
                                </div>
                                <div class="col col-price">
                                    2299元 x 1
                                </div>
                                <div class="col col-status">
                                    有货
                                </div>
                                <div class="col col-total">
                                    2299元
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="section section-count clearfix">
                    <div class="count-actions">
                        <!-- 优惠券 -->
                        <div class="coupon-trigger" id="J_useCoupon"><i class="iconfont icon-plus"></i>使用优惠券</div>
                        <div class="coupon-result hide" id="J_couponResult">
                            <i class="iconfont icon-selected"></i>
                            正在使用：<span class="coupon-title" id="J_couponTitle"></span>
                            <a href="javascript:void(0)" id="J_changeConpon">［修改］</a>
                        </div>
                        <div class="coupon-box hide" id="J_couponBox">
                            <ul class="clearfix tab-switch J_tabSwitch">
                                <li>选择优惠券</li>
                                <li>输入优惠券码</li>
                            </ul>
                            <div class="tab-container">
                                <div class="tab-content list-content">
                                    <p class="coupon-empty">您暂时没有可用的优惠券</p>
                                </div>
                                <div class="tab-content code-content hide">
                                    <div class="form-section">
                                        <label class="input-label" for="coupon_code">请输入优惠券码</label>
                                        <input class="input-text" id="coupon_code" name="coupon_code" type="text">
                                    </div>
                                    <div class="coupon-confirm">
                                        <a href="javascript:void(0);" class="btn btn-primary"
                                           id="J_useCouponCode">立即使用</a>
                                        <a href="javascript:void(0);" class="btn btn-gray J_couponCancel">不使用优惠券</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 购物卡 -->
                        <div class="ecard-trigger" id="J_useEcard" data-type="normal"><i
                                    class="iconfont icon-plus"></i>使用小米礼品卡
                        </div>
                        <div class="ecard-result hide" id="J_ecardResult">
                            <i class="iconfont icon-selected"></i> 已使用礼品卡 <span id="J_ecardVal"></span>
                            <a href="javascript:void(0);" id="J_ecardModify">［修改］</a>
                        </div>
                        <!-- 现金券 -->
                        <div class="ecard-trigger hide" id="J_useRecycle" data-type="recycle"><i
                                    class="iconfont icon-plus"></i>使用现金券
                        </div>
                        <div class="ecard-result hide" id="J_recycleResult">
                            <i class="iconfont icon-selected"></i> 已使用现金券 <span id="J_recycleVal"></span>
                            <a href="javascript:void(0);" id="J_recycleModify">［修改］</a>
                        </div>

                        <div class="ecard-box hide" id="J_ecardBox">
                            <ul class="clearfix tab-switch J_tabSwitch">
                                <li>已绑定的礼品卡</li>
                                <li>输入礼品卡以绑定</li>
                            </ul>
                            <div class="tab-container">
                                <!-- 选卡 -->
                                <div class="tab-content ecard-list">
                                    <div class="empty hide" id="J_ecardEmpty">
                                        <p>没有发现可用的礼品卡！</p>
                                        <a href="javascript:void(0);" class="btn btn-gray J_ecardCancel">取消</a>
                                    </div>
                                    <div class="hide">
                                        <div id="J_ecardList">
                                        </div>
                                        <div class="ecard-info" id="J_ecardInfo"></div>
                                        <div class="btns">
                                            <a href="javascript:void(0);" class="btn btn-primary" id="J_useSelEcard">确认以上选择</a>
                                            <a href="javascript:void(0);" class="btn btn-gray J_ecardCancel">取消
                                                不使用礼品卡</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- 绑卡 -->
                                <div class="tab-content ecard-input hide">
                                    <div class="form-section">
                                        <span class="input-title">密码：</span>
                                        <!-- <label class="input-label" for="ecard_password">请输入礼品卡密码</label> -->
                                        <input class="input-text input-card" id="ecard_password" name="ecard_password"
                                               placeholder="请输入礼品卡密码" type="text">
                                    </div>
                                    <div class="form-section clearfix">
                                        <span class="input-title">验证码：</span>
                                        <!-- <label class="input-label" for="ecard_captcha">请输入验证码</label> -->
                                        <input class="input-text input-captcha" id="ecard_captcha" placeholder="请输入验证码"
                                               name="ecard_captcha"
                                               data-authurl="//captcha.hd.mi.com/captcha/auth?answer={answer}&amp;service=order.mi.com&amp;_ov=0"
                                               type="text">
                                        <div class="captcha-img">
                                            <img alt="验证码" title="点击更换验证码" id="J_ecardCaptchaImg">
                                        </div>
                                    </div>
                                    <div class="form-section form-btns">
                                        <button class="btn btn-primary" id="J_bindEcard">绑定礼品卡</button>
                                        <button class="btn btn-gray J_ecardCancel">取消</button>
                                    </div>
                                </div>
                            </div>

                            <div class="recycle-box hide" id="J_recycleBox">
                                <div class="ecard-list recycle-list">
                                    <div id="J_recycleList">
                                        <div class="table-wrapper">
                                            <ul class="clearfix">
                                                <li class="col-1">选择</li>
                                                <li class="col-2">券号</li>
                                                <li class="col-3">本次使用（元）</li>
                                                <li class="col-4">余额（元）</li>
                                            </ul>
                                            <div>
                                                <table>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ecard-info" id="J_recycleInfo"></div>
                                    <div class="btns">
                                        <a href="javascript:void(0);" class="btn btn-primary" id="J_useSelRecycle">确认以上选择</a>
                                        <a href="javascript:void(0);" class="btn btn-gray J_recycleCancel">取消不使用现金券</a>
                                    </div>
                                </div>
                            </div>

                            <div class="sms-box hide" id="J_ecardSmsBox">
                                <div class="title">已向您绑定的手机<span id="J_ecardMobile">（135****6910）</span>发送验证码 <i
                                            class="icon-qa" id="J_ecardQa">?</i></div>
                                <div class="form-section clearfix">
                                    <label class="input-label" for="ecard_sms">请输入验证码</label>
                                    <input class="input-text input-ecard" id="ecard_sms" name="ecard_sms" type="text">
                                    <span id="J_smsCountdown" class="countdown hide"><i></i>秒后重新发送</span>
                                    <a href="javascript:void(0);" class="repeat hide" id="J_repeatSms">重新发送</a>
                                </div>
                                <div class="form-section form-btns">
                                    <button class="btn btn-primary" id="J_checkEcardSms">确定</button>
                                    <button class="btn btn-gray" id="J_cancelEcardSms">取消</button>
                                </div>
                                <div class="qa-detail hide" id="J_ecardQaDetail">
                                    为保证您的资金安全，消费时需通过绑定手机的认证。若您绑定的手机号已变更，可前往小米账号中心修改绑定的手机号，如果原来的手机号已无法使用，可通过申诉的方式更换手机号。<a
                                            href="https://account.xiaomi.com/pass/auth/security/home" target="_blank"
                                    >前往小米账号中心&gt;</a>
                                </div>
                            </div>

                            <div class="loading hide">
                                <div class="loader"></div>
                            </div>
                        </div>

                        <!-- 加价购 -->
                        <div class="raise-buy-box">
                            <ul id="J_raiseBuyList">

                                <!--S 保障计划 产品选择弹框 -->
                                <!--E 保障计划 产品选择弹框 -->
                            </ul>
                        </div>
                    </div>

                    <div class="money-box" id="J_moneyBox">
                        <ul>
                            <li class="clearfix">
                                <label>商品件数：</label>
                                <span class="val">1件</span>
                            </li>
                            <li class="clearfix">
                                <label>金额合计：</label>
                                <span class="val">2299元</span>
                            </li>
                            <li class="clearfix">
                                <label>活动优惠：</label>
                                <span class="val">-200元</span>
                            </li>
                            <li class="clearfix">
                                <label>优惠券抵扣：</label>
                                <span class="val"><i id="J_couponVal">-0</i>元</span>
                            </li>
                            <li class="clearfix">
                                <label>运费：</label>
                                <span class="val"><i data-id="J_postageVal">0</i>元</span>
                            </li>
                            <li class="clearfix total-price">
                                <label>应付总额：</label>
                                <span class="val"><em data-id="J_totalPrice">2099</em>元</span>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="section-bar clearfix">
                    <div class="fl">
                        <div class="seleced-address hide" id="J_confirmAddress">
                        </div>
                        <div class="big-pro-tip hide J_confirmBigProTip"></div>
                    </div>
                    <div class="fr">
                        <a href="javascript:void(0);" class="btn btn-primary" id="J_checkoutToPay">去结算</a>
                    </div>
                </div>

                <div class="modal modal-hide fade modal-edit-address in" id="J_modalEditAddress" style="display: none;"
                     aria-hidden="true">
                    <div class="modal-header">
                        <span class="title">添加收货地址</span>
                        <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont" id="closeAddAddress"></i></a>
                    </div>
                    <div class="modal-body">
                        <div class="form-box clearfix">
                            <div class="form-section form-name">
                                <label class="input-label" for="user_name">姓名</label>
                                <input class="input-text J_addressInput" id="J_addressNameInput" name="user_name"
                                       placeholder="收货人姓名" type="text">
                            </div>
                            <div class="form-section form-phone">
                                <label class="input-label" for="user_phone">手机号</label>
                                <input class="input-text J_addressInput" id="J_addressPhoneInput" name="user_phone"
                                       placeholder="11位手机号" type="text">
                            </div>
                            <div class="form-section form-four-address form-section-active">
                                <input id="J_selectAddressTrigger" class="input-text J_addressInput four_address" name="four_address" readonly="readonly" value="选择省 / 市 / 区 / 街道" placeholder="选择省 / 市 / 区 / 街道" type="text">
                                <i class="iconfont" id="chooseAddress"></i>
                            </div>
                            <div class="form-section form-address-detail">
                                <label class="input-label" for="user_adress">详细地址</label>
                                <textarea class="input-text J_addressInput" type="text" id="J_addressDetailInput"
                                          name="user_adress" placeholder="详细地址，路名或街道名称，门牌号"></textarea>
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
                                            <li class="option J_option" data-value="2" data-txt="北京">北京</li>
                                            <li class="option J_option" data-value="3" data-txt="天津">天津</li>
                                            <li class="option J_option" data-value="4" data-txt="河北">河北</li>
                                            <li class="option J_option" data-value="5" data-txt="山西">山西</li>
                                            <li class="option J_option" data-value="6" data-txt="内蒙古">内蒙古</li>
                                            <li class="option J_option" data-value="7" data-txt="辽宁">辽宁</li>
                                            <li class="option J_option" data-value="8" data-txt="吉林">吉林</li>
                                            <li class="option J_option" data-value="9" data-txt="黑龙江">黑龙江</li>
                                            <li class="option J_option" data-value="10" data-txt="上海">上海</li>
                                            <li class="option J_option" data-value="11" data-txt="江苏">江苏</li>
                                            <li class="option J_option" data-value="12" data-txt="浙江">浙江</li>
                                            <li class="option J_option" data-value="13" data-txt="安徽">安徽</li>
                                            <li class="option J_option" data-value="14" data-txt="福建">福建</li>
                                            <li class="option J_option" data-value="15" data-txt="江西">江西</li>
                                            <li class="option J_option" data-value="16" data-txt="山东">山东</li>
                                            <li class="option J_option" data-value="17" data-txt="河南">河南</li>
                                            <li class="option J_option" data-value="18" data-txt="湖北">湖北</li>
                                            <li class="option J_option" data-value="19" data-txt="湖南">湖南</li>
                                            <li class="option J_option" data-value="20" data-txt="广东">广东</li>
                                            <li class="option J_option" data-value="21" data-txt="广西">广西</li>
                                            <li class="option J_option" data-value="22" data-txt="海南">海南</li>
                                            <li class="option J_option" data-value="23" data-txt="重庆">重庆</li>
                                            <li class="option J_option" data-value="24" data-txt="四川">四川</li>
                                            <li class="option J_option" data-value="25" data-txt="贵州">贵州</li>
                                            <li class="option J_option" data-value="26" data-txt="云南">云南</li>
                                            <li class="option J_option" data-value="27" data-txt="西藏">西藏</li>
                                            <li class="option J_option" data-value="28" data-txt="陕西">陕西</li>
                                            <li class="option J_option" data-value="29" data-txt="甘肃">甘肃</li>
                                            <li class="option J_option" data-value="30" data-txt="青海">青海</li>
                                            <li class="option J_option" data-value="31" data-txt="宁夏">宁夏</li>
                                            <li class="option J_option" data-value="32" data-txt="新疆">新疆</li>
                                        </ul>
                                        <ul class="options-list J_optionsWrapper clearfix hide"></ul>
                                        <ul class="options-list J_optionsWrapper clearfix hide"></ul>
                                        <ul class="options-list J_optionsWrapper clearfix hide"></ul>
                                    </div>
                                </div>
                                <div class="switch-type">
                                    <a href="javascript:void(0);" class="J_switchTypeTrigger" data-type="search"
                                       data-stat-id="beb429d92950ef7b"
                                       onclick="_msq.push(['trackEvent', '17a1f380b9d4cd2e-beb429d92950ef7b', 'javascript:void(0);', 'pcpid', '']);">
                                        搜索地址快速定位&gt;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:void(0);" class="btn btn-primary" id="J_editAddressSave">保存</a>
                        <a href="#J_modalEditAddress" class="btn btn-gray" data-toggle="modal">取消</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home/public/footer')
@endsection

@section('js')
    @parent
    <script>

        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            var index;

            $('div.J_addressItem').on('click', function () {
//                console.log($(this));
                $(this).addClass('selected');
            });

            $('ul li.J_option').on('click', function () {
//                console.log($(this));
                $(this).addClass('selected').siblings().removeClass('selected');
//                console.log($(this).attr('data-invoice-mode'));//获取属性为data-invoice-mode里面的值
                if ($(this).attr('data-invoice-mode') === 'company') {
//                    console.log(1);
                    $('div #J_invoiceCompanyCode').removeClass('hide');
                } else {
                    $('div #J_invoiceCompanyCode').addClass('hide');
                }

            });

            $('i.icon-qa ').on('click', function () {
                test();
            });

            $('.more dd a').on('click', function () {
                test();
            });

            $('#J_newAddress').on('click', function () {
//                console.log($(this));
//                console.log($('#J_modalEditAddress'));
                $('div #J_modalEditAddress').css({"display": "block"}).attr('aria-hidden', 'false');
            });

            $('#closeAddAddress').on('click', function() {
                $('div #J_modalEditAddress').css({"display": "none"}).attr('aria-hidden', 'true');
            });

            $('div.form-section').on('click', function () {
                $(this).addClass('form-section-valid form-section-focus form-section-active');
//                console.log($(this).children('.four_address').length);
                if($(this).children('.four_address').length){
                    $('#J_selectAddressWrapper').removeClass('hide');
                }

            });

            $('div.form-section').on('focusout', function () {

//                console.log($(this).children('.input-text').val());
                var value = $(this).children('.input-text').val();
                if (value) {
                    $(this).removeClass('form-section-focus');
                } else {
                    $(this).removeClass('form-section-valid form-section-focus form-section-active');
                }

            });

            $('span.select-address-close').on('click', function () {
                $('#J_selectAddressWrapper').addClass('hide');
            });

            $('div.switch-type').on('click', function () {
//                alert(1);

                $('div.four-address-wrapper').removeClass('hide');
                $('div.search-address-wrapper').addClass('hide');
            });

        });

        var test = function () {
            layer.open({
                type: 1
                ,
                title: '发票常见问题'
                ,
                closeBtn: false
                ,
                area: ['600px', '600px']
                ,
                shade: 0.8
                ,
                id: 'LAY_layuipro' //设定一个id，防止重复弹出
                ,
                btn: ['知道啦']
                ,
                moveType: 1 //拖拽模式，0或者1
                ,
                content: '<div style="padding: 50px; line-height: 22px; background-color: white; color: #2F4056; font-weight: 300;"><h4>1.为什么当我选择开具单位抬头发票时，需要填写纳税⼈识别号？纳税⼈识别号哪⾥获取？</h4><p>根据国家税务总局公告2017年第16号第⼀条规定：⾃2017年7⽉1⽇起，购买⽅为企业的，索取增值税普通发票时，应向销售⽅提供纳税⼈识别号或统⼀社会信⽤代码；销售⽅为其开具增值税普通发票时，应在“购买⽅纳税⼈识别号”栏填写购买⽅的纳税⼈识别号或统⼀社会信⽤代码。不符合规定的发票，不得作为税收凭证。纳税⼈识别号有两种⽅式获取：①联系公司财务咨询开票信息；②登录全国组织代码管理中⼼查询。<span style="color:#FF600C">（*⼩米商城⽬前使⽤的纸质发票类型属于通⽤机打发票，不在公告规定范畴内，发票规格本⾝⽆法添加税号，⽆需添加税号即可报销使⽤，所以暂不⽀持纸质发票填写单位企业税号。）</span> </p> <h4>2.非个人用户抬头的电子发票是否需要填写单位名称和纳税人识别号？</h4> <p>需要填写。国家税务总局要求，不符合规定的发票，不得作为税收凭证。</p> <h4>3.填写税号付款后是否可修改？</h4> <p>暂不支持修改，请认真确认后付款。</p> <h4>4.发票的类型有哪些？</h4> <p>⽬前可以开具电⼦增值税普通发票(简称“电⼦发票”)、纸质增值税普通发票(简称“纸质发票”)、以及增值税专⽤发票(简称“专⽤发票”)。</p> <h4>5.发票⾦额包含优惠券、礼品卡吗？</h4> <p>发票⾦额为实际⽀付⾦额，不包含优惠券、礼品卡等。</p> <h4>6.什么是电⼦发票？</h4> <p>电⼦发票是指在购销商品、提供或者接受服务以及从事其他经营活动中，开具、收取的以电⼦⽅式存储的收付款凭证。⼩米⽹开具的电⼦发票均为真实有效的合法发票，与传统纸质发票具有同等法律效⼒，可作为⽤户维权、保修的有效凭据。</p> <h4>7.电⼦发票什么时候开具？</h4> <p>订单在⽤户确认收货，订单完成后开具电⼦发票。</p> <h4>8.电⼦发票在订单完成后，可在哪⾥查看？</h4> <p>发票⾦额为实际⽀付⾦额，不包含优惠券、礼品卡等。</p> <h4>9.电⼦发票如何验证？</h4> <p>电⼦发票下载成功后，客户可凭借电⼦发票上所标⽰的发票代码、发票号码、防伪码在国税局授权的发票服务平台或北京市国家税局⽹站进⾏查询验证。</p> <h4>10.选择开具电⼦发票的顾客申请部分退货，发票如何处理？</h4> <p>开具电⼦发票的订单申请部分退货，原电⼦发票会通过系统⾃动冲红（原电⼦发票显⽰⽆效），并对未发⽣退货的商品重新⾃动开具电⼦发票。如整单退货，则我司将原电⼦发票做冲红处理（原电⼦发票显⽰⽆效）。</p> <h4>11.遇到质量问题，电⼦发票是否能作为维权的依据？</h4> <p>根据北京市国家税务局、北京市地⽅税务局、北京市商务委员会、北京市⼯商⾏政管理局《关于电⼦发票应⽤试点若⼲事项的公告》（2013年第8号）、《关于扩⼤电⼦发票应⽤试点范围若⼲事项的公告》（2013年第18号⽂），电⼦发票与纸质发票具有相同法律效⼒，可作为售后、维权凭据。</p></div>'
                ,
                success: function (layero) {

                }
            });
        }

    </script>
@endsection
