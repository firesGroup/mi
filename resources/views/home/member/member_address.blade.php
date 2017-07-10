<?php
/**
 * File Name: member_address.blade.php
 * Description:个人中心收货地址
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/7/6 0006
 * Time: 上午 11:01
 */
?>

@extends('layouts.home')
@section('title', '个人收货地址')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/member_center.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/checkout.css') }}">
    @endsection
@section('content')
    @include('home.public.header_top')
    @include('home.public.header_nav')

    <div class="breadcrumbs">
        <div class="container">
            <a href="//www.mi.com/index.html" data-stat-id="b0bcd814768c68cc" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-b0bcd814768c68cc', '//www.mi.com/index.html', 'pcpid', '']);">首页</a><span class="sep">&gt;</span><span>收货地址</span>    </div>
    </div>

    <div class="page-main user-main">
        <div class="container">
            <div class="row">
    @include('home.member.member_modoul')
                <div class="span16">

                    <div class="section section-address">
                        <div class="section-header clearfix">
                            <h3 class="title">收货地址</h3>
                            <div class="more">
                            </div>
                        </div>
                        <div class="section-body clearfix" id="J_addressList">
                            <!-- addresslist begin -->
                            @foreach($member_address as $UserAdd)
                                <div class="address-item J_addressItem ">
                                    <dl>
                                        <dt>
                                            <span class="tag"></span>
                                            <em class="uname">{{$UserAdd->buy_user}}</em>
                                        </dt>
                                        <dd class="utel">
                                            {{$UserAdd->buy_phone}}
                                        </dd>
                                        <dd class="uaddress">
                                            {{$UserAdd->address}}
                                        </dd>
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

    <div class="modal modal-hide fade modal-edit-address in" id="J_modalEditAddress" style="display: none;"
         aria-hidden="true">
        <div class="modal-header">
            <span class="title">添加收货地址</span>
            <a class="close" data-dismiss="modal" href="javascript: void(0);">
                <i class="iconfont" id="closeAddAddress"></i>
            </a>
        </div>
        <div class=" layui-form modal-body  layui-form">
            <div class="form-box clearfix layui-form">
                <div class="form-section form-name layui-form">
                    <label class="input-label" for="user_name">姓名</label>
                    <input class="input-text J_addressInput" id="J_addressNameInput" name="user_name"
                           placeholder="收货人姓名" type="text" lay-verify="required">
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
    @endsection
@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/js/home/member/member_address.js') }}"></script>
    <script>
        layui.use(['layer', 'form'], function () {
            var layer = layui.layer;
            var form =  layui.form();
        });
    </script>
    @endsection
