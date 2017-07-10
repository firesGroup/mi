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
                    <span class="name">{{$UserArr}}</span>
                    <i class="iconfont"></i>
                </a>
                <ul class="user-menu" style="display: none;">
                    <li><a rel="nofollow" href="{{url('user_detail')}}" target="_blank">个人中心</a></li>
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
                        @foreach($userAdd as $UserAdd)
                        <div class="address-item J_addressItem ">
                            <dl>
                                <dt><span class="tag"></span><em class="uname">{{$UserAdd->buy_user}}</em></dt>
                                <dd class="utel">{{$UserAdd->buy_phone}}</dd>
                                <dd class="uaddress">{{$UserAdd->address}}</dd>
                            </dl>
                            <div class="actions">
                                <a href="javascript:;" class="modify J_addressModify">修改</a>
                            </div>
                        </div>
                        @endforeach
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
                            <a href="{{url('cart')}}">返回购物车
                                <i class="iconfont"></i></a>
                        </div>
                    </div>
                    <div class="section-body">
                        @foreach(session('goBlance') as $v)
                        <ul class="goods-list" id="J_goodsList">
                            <li class="clearfix">
                                <div class="col col-img">
                                    <img src="{{$v['img']}}" width="30"
                                         height="30">
                                </div>
                                <div class="col col-name">
                                    <a href="//item.mi.com/1163700032.html">
                                        {{$v['pName']}}
                                    </a>
                                </div>
                                <div class="col col-price">
                                    {{$v['price'].'X'.$v['num']}}件
                                </div>
                                <div class="col col-status">
                                    有货
                                </div>
                                <div class="col col-total">
                                    {{intval($v['price'])*$v['num']}} 元
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>

                <div class="section section-count clearfix">

                    <div class="money-box" id="J_moneyBox">
                        <ul>
                            <li class="clearfix">
                                <label>商品件数：</label>
                                <span class="val">{{session('Num')}}件</span>
                            </li>
                            <li class="clearfix">
                                <label>金额合计：</label>
                                <span class="val">{{session('total')}}元</span>
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
                                <span class="val"><em data-id="J_totalPrice">{{session('total')-200}}</em>元</span>
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
                        <a href="javascript:;" class="btn btn-primary" id="J_checkoutToPay">请选择地址</a>
                    </div>
                </div>

                <div class="modal modal-hide fade modal-edit-address in" id="J_modalEditAddress" style="display: none;"
                     aria-hidden="true">
                    <div class="modal-header">
                        <span class="title">添加收货地址</span>
                        <a class="close" data-dismiss="modal" href="javascript: void(0);">
                            <i class="iconfont" id="closeAddAddress"></i>
                        </a>
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
                                <input id="J_selectAddressTrigger" class="input-text J_addressInput four_address"
                                       name="four_address" readonly="readonly" value="选择省 / 市 / 区 / 街道"
                                       placeholder="选择省 / 市 / 区 / 街道" type="text">
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
                                            @foreach($data as $v)
                                                <li class="option J_option" value="{{$v->id}}">{{$v->name}}</li>
                                            @endforeach
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
            </div>
        </div>
    </div>

    @include('home/public/footer')
@endsection

@section('js')
    @parent
    <script type="text/javascript" src="{{asset('js/home/address/address.js')}}"></script>
    <script>

        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            var index;
            $('div.fr').on('click', '#J_ToPay', function () {
                var name = uname;
                var phone = uphone;
                var address = uaddress;

                $.ajax({
                    url: "/toPay",
                    type: 'get',
                    data: {'name': name, 'phone': phone, 'address': address},
                    success: function (data) {
//                        console.log(data);
                        if (data !== 2) {
                            window.location.href = "/orderpay/" + data;
                        } else {

                        }
                    },
                    dataType: 'json'
                });
            });


        });

    </script>
@endsection
