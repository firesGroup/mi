<?php
/**
 * File Name: product_nav.blade.php
 * Description: 商品详情页模板-导航条片段
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/29
 * Time: 22:26
 */
?>
<div id="J_proHeader">
    <div class="xm-product-box">
        <div class="nav-bar" id="J_headNav">
            <div class="container J_navSwitch">
                <h2 class="J_proName">{{ $info->p_name }}</h2>
                <div class="con">
                    <div class="right">
                        <a href="{{ url('/product/info/'.$info->id) }}">概述</a>
                        <span class="separator">|</span>
                        <a href="/comment/{{ $info->id }}">用户评价</a>
                        @if( isset($is_btn) && $is_btn == true )
                        <span class="J_pro_nav_bar">
                            <a href="{{ url('/product/buy/'.$info->id) }}"  id="J_nav_buy_btn"  class="btn btn-small btn-primary">立即购买</a>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="xm-product-box nav-bar-hidden" id="J_fixNarBar">
        <div class="nav-bar"> <div class="container J_navSwitch">
                <h2 class="J_proName">{{ $info->p_name }}</h2>
                <div class="con">
                    <div class="right">
                        <a href="{{ url('/product/info/'.$info->id) }}">概述</a>
                        <span class="separator">|</span>
                        <a href="/comment/{{ $info->id }}">用户评价</a>
                        @if( isset($is_btn) && $is_btn == true )
                            <span class="J_pro_nav_bar">
                            <a href="{{ url('/product/buy/'.$info->id) }}"  id="J_nav_buy_btn"  class="btn btn-small btn-primary">立即购买</a>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
