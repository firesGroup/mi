<?php
/**
 * File Name: sildeShow.blade.php
 * Description: 首页轮播图片段
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/28
 * Time: 14:31
 */
?>
        <!-- 轮播图 start -->
        <div class="home-hero-slider">
            <div id="J_homeSlider" class="xm-slider" data-stat-title="焦点图轮播">
                @foreach( $slide as $k=>$v )
                    @if( $k == 0 )
                        <div class="slide loaded exposure">
                            <a href="{{ $v->url }}" target="_blank">
                                <img src="{{ $v->images }}"/>
                            </a>
                        </div>
                        @else
                        <div class="slide exposure">
                            <a href="{{ $v->url }}" target="_blank">
                                <img src="/images/public/default.gif" data-url="{{ $v->images }}"/>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="home-hero-sub row">
            <div class="span4">
                <ul class="home-channel-list clearfix">
                    <li class="exposure top left">
                        <a href="" target="_blank">
                            <i class="iconfont">&#xe908;</i>选购手机
                        </a>
                    </li>
                    <li class="exposure top">
                        <a href="" target="_blank">
                            <i class="iconfont">&#xe905;</i>企业团购
                        </a>
                    </li>
                    <li class="exposure top">
                        <a href="//1.hd.mi.com" target="_blank">
                            <i class="iconfont">&#xe903;</i>一元活动</a>
                    </li>
                    <li class="exposure left">
                        <a href="//www.mi.com/mimobile/" target="_blank">
                            <i class="iconfont">&#xe906;</i>小米移动
                        </a>
                    </li>
                    <li class="exposure ">
                        <a href="" target="_blank">
                            <i class="iconfont">&#xe904;</i>以旧换新
                        </a>
                    </li>
                    <li class="exposure ">
                        <a href="" target="_blank">
                            <i class="iconfont">&#xe907;</i>话费充值
                        </a>
                    </li>
                </ul>
            </div>
            <div class="span16" id="J_homePromo" data-stat-title="焦点图下方小图">
                <ul class="home-promo-list clearfix">
                    <li class="first">
                        <a class="item exposure" href="//item.mi.com/buyphone/redmi4x" data-stat-aid="AA16788" data-stat-pid="2_16_1_77" data-log_code="31pchomethree_line001002#rid=7a6d72b55045b9228f8e8caca88e9b7f&t=normal&page=home&act=cat" target="_blank"><img alt="红米4X立即购买" src="//i3.mifile.cn/a4/xmad_14977951260311_AlzsH.jpg" srcset="//i3.mifile.cn/a4/xmad_14977951300401_iFTLP.jpg 2x" /></a>
                    </li>
                    <li>
                        <a class="item exposure" href="//item.mi.com/product/10000024.html" data-stat-aid="AA16789" data-stat-pid="2_16_2_78" data-log_code="31pchomethree_line002002#rid=2a6790f4ddbcf5f5cf31dc628a0cb127&t=normal&page=home&act=cat" target="_blank"><img alt="小米5s立减200" src="//i3.mifile.cn/a4/xmad_14951127886098_DAXZS.jpg" srcset="//i3.mifile.cn/a4/xmad_1495112794706_BjTAF.jpg 2x" /></a>
                    </li>
                    <li>
                        <a class="item exposure" href="//www.mi.com/air2/" data-stat-aid="AA16785" data-stat-pid="2_16_3_79" data-log_code="31pchomethree_line003002#rid=76aa822ab98563789e1bfbf94e1e750a&t=normal&page=home&act=cat" target="_blank"><img alt="小米空气净化器2活动" src="//i3.mifile.cn/a4/xmad_14939110165476_JDxzV.jpg" srcset="//i3.mifile.cn/a4/xmad_14939110360453_GmsZo.jpg 2x" /></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- 轮播图 end -->
