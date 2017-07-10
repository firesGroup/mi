<?php
/**
 * File Name: member_modoul.blade.php
 * Description:会员中心侧边栏
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/7/3 0003
 * Time: 下午 11:58
 */
?>
<div class="span4">
    <div class="uc-box uc-sub-box">
        <div class="uc-nav-box">
            <div class="box-hd">
                <h3 class="title">订单中心</h3>
            </div>
            <div class="box-bd">
                <ul class="uc-nav-list" id="one">
            <li><a href="/order/{{ session('user_deta')['id'] }}" data-stat-id="8f3d1bffd166dc22">我的订单</a></li>
                    <li><a href="" data-stat-id="27e28cea14a6a442">意外保</a></li>
                    <li><a href="" data-stat-id="1a3f726cf268373b" onclick="">团购订单</a></li>
                    <li><a href="{{ url('/shopcomment/'.session('user_deta')['id']) }}" data-count="comment" data-count-style="bracket" data-stat-id="5f9f5c27483df260">评价晒单</a></li>
                    <li><a href="" data-stat-id="dfa55526dc42769c">话费充值订单</a></li>
                    <li><a href="" data-stat-id="b9e200a355e96de4">以旧换新订单</a></li>
                </ul>
            </div>
        </div>
        <div class="uc-nav-box">
            <div class="box-hd">
                <h3 class="title">个人中心</h3>
            </div>
            <div class="box-bd">
                <ul class="uc-nav-list">
                    <li><a href="{{url('user_detail')}}" data-stat-id="e171266eb8fa4af6">我的个人中心</a></li>
                    <li><a href="" data-stat-id="47f234bf0d4d7bbb">消息通知<i class="J_miMessageTotal"></i></a></li>
                    <li><a href="" data-stat-id="fb2d566e0bfd1335">购买资格<i class="J_miInviteTotal"></i></a></li>
                    <li><a href="" data-stat-id="c4cd67b3b40a9d9a" >现金账户</a></li>
                    <li><a href="" data-stat-id="68c5fcc53f12f0f9" >小米礼品卡</a></li>
                    <li><a href="https://order.mi.com/huanxin/list?r=13726.1499097479" data-stat-id="2e7e0d30e8b96465" onclick="_msq.push(['trackEvent', '73ce9fb1e71baa17-2e7e0d30e8b96465', 'https://order.mi.com/huanxin/list', 'pcpid', '']);">现金券</a></li>
                    <li><a href="{{url('ponseral_collect')}}">喜欢的商品</a></li>
                    <li><a href="">优惠券</a></li>
                    <li class=""><a href="{{url('member_address')}}" onclick="">收货地址</a></li>
                </ul>
            </div>
        </div>
        <div class="uc-nav-box">
            <div class="box-hd">
                <h3 class="title">售后服务</h3>
            </div>
            <div class="box-bd">
                <ul class="uc-nav-list">
                    <li><a href="javascript:;">申请服务</a></li>
                    <li><a href="" data-stat-id="b6260cb96c1b1bc1" >领取快递报销</a></li>
                </ul>
            </div>
        </div>
        <div class="uc-nav-box">
            <div class="box-hd">
                <h3 class="title" >账户管理</h3>
            </div>
            <div class="box-bd">
                <ul class="uc-nav-list">
                    <li><a href="{{url('personal')}}" onclick="change()" data-stat-id="35eef2fd7467d6ca">个人信息</a></li>
                    <li><a href="">社区VIP认证</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/member/member.js')}}"></script>

