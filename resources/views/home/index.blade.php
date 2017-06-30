<?php
/**
 * File Name: index.blade.php
 * Description: 首页模板文件
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 23:23
 */
?>
@extends('layouts.home')

@section('title', '首页')
@section('keywords','')
@section('description','')

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/index.css') }}">
@endsection

@section('content')
    @include('home.public.header_top')
    @include('home.public.header_nav')
    <div class="home-hero-container container">
        <div class="home-hero">
            @include('home.index.sildeShow')
            @include('home.public.hotRecommend')
            @include('home.index.superStar')
        </div>
    </div>
    <!-- 主要内容 start -->
    <div class="page-main home-main">
        <div class="container">
            <div id="homeelec"
                 class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
                <div class="box-hd">
                    <h2 class="title">家电</h2>
                    <!-- <h2 class="title">冲破大风雪，我们坐在雪橇上  (๑•̀ㅂ•́)و✧ </h2> -->
                    <div class="more J_brickNav">
                        <ul class="tab-list J_brickTabSwitch" data-tab- target="homeelec-content">
                            <li class="tab-active">热门</li>
                            <li class="">电视影音</li>
                            <li class="">电脑</li>
                            <li class="">家居</li>
                        </ul>
                    </div>
                </div>
                <div class="box-bd J_brickBd">
                    <div class="row">
                        <div class="span4 span-first">
                            <ul class="brick-promo-list clearfix">
                                <li class="brick-item brick-item-l">
                                    <a href="" class="exposure" target="_blank" onclick=""><img
                                                src="//i3.mifile.cn/a4/xmad_14985509176175_GZPwv.jpg" width="160"
                                                height="160" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="span16">
                            <div id="homeelec-content" class="tab-container">
                                <ul class="brick-list tab-content clearfix tab-content-active J_recommendActive"
                                    style="">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490077058.71391368!220x220.png"
                                                        width="150" height="150" alt="小米电视4A 43英寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米电视4A 43英寸</a></h3>
                                        <p class="desc">2GB+8GB大存储，内置海量大片</p>
                                        <p class="price"><span class="num">2099</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">为什么我这么稀罕小米</span> <span class="author"> 来自于 天枰壮壮 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1495074010.05677255!220x220.jpg"
                                                        width="150" height="150" alt="小米电视4 55英寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米电视4 55英寸</a></h3>
                                        <p class="desc">4.9mm超薄机身，无边框设计</p>
                                        <p class="price"><span class="num">3999</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-new">新品</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">外形很喜欢 效果也很好  就是买了1个月就遇到品牌日...</span> <span
                                                        class="author"> 来自于 于洋 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1469583247.6157588!220x220.jpg"
                                                        width="150" height="150" alt="小米笔记本Air 13.3英寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米笔记本Air 13.3英寸</a></h3>
                                        <p class="desc">独立显卡，全金属机身，超长续航</p>
                                        <p class="price"><span class="num">4799</span>元
                                            <del><span class="num">4999</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9.6折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">完美！求首诗:我深爱你！</span> <span class="author"> 来自于 李健 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490604824.19051012!220x220.jpg"
                                                        width="150" height="150" alt="小米笔记本Air 12.5英寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米笔记本Air 12.5英寸</a></h3>
                                        <p class="desc">集成显卡，全金属机身，超长续航</p>
                                        <p class="price"><span class="num">3599</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">谢谢，我20元抽中的</span> <span class="author"> 来自于 郑云杨 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1hMK_BjEv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米净水器（厨下式）"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米净水器（厨下式）</a></h3>
                                        <p class="desc">6月28日-29日，限量送PP棉滤芯</p>
                                        <p class="price"><span class="num">1999</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-gift">有赠品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1OVC_ByY_1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="米家压力IH电饭煲"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家压力IH电饭煲</a></h3>
                                        <p class="desc">6月28日-29日，限量送59元插线板</p>
                                        <p class="price"><span class="num">999</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-gift">有赠品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490756071.3088664!220x220.png"
                                                        width="150" height="150" alt="Yeelight LED 吸顶灯"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">Yeelight LED 吸顶灯</a>
                                        </h3>
                                        <p class="desc">5分钟快装，月光夜灯，IP60 级防尘</p>
                                        <p class="price"><span class="num">359</span>元
                                            <del><span class="num">379</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9.5折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">不照灯了，这个是白天情况下室内开灯后的效果，很满意就...</span> <span
                                                        class="author"> 来自于 761154986 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1472609961.95298675!220x220.jpg"
                                                        width="80" height="80" alt="米家扫地机器人"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank"
                                                             onclick="">米家扫地机器人</a></h3>
                                        <p class="price"><span class="num">1699</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>热门</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1474944620.67265595!220x220.jpg"
                                                        width="150" height="150" alt="小米电视3s 55英寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米电视3s 55英寸</a></h3>
                                        <p class="desc">原装LG 4K IPS硬屏，超薄金属机身</p>
                                        <p class="price"><span class="num">3599</span>元
                                            <del><span class="num">3999</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">电视很薄，酷炫，很有质感，66666，以后就是米粉了...</span> <span
                                                        class="author"> 来自于 咽泪装欢 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490077569.08131612!220x220.png"
                                                        width="150" height="150" alt="电视4A 65英寸标准版"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">电视4A 65英寸标准版</a></h3>
                                        <p class="desc">4K超清屏，2GB+8/32GB 大存储</p>
                                        <p class="price"><span class="num">5199</span>元
                                            <del><span class="num">5699</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9.2折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">超大的，就是厚了一点。运费安装费有点贵。</span> <span class="author"> 来自于 假の太逼真 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490778061.59475600!220x220.png"
                                                        width="150" height="150" alt="电视4A 49英寸 人工智能语音版"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">电视4A 49英寸 人工智能语音版</a>
                                        </h3>
                                        <p class="desc">2GB+32GB，蓝牙触控语音遥控器</p>
                                        <p class="price"><span class="num">2499</span>元
                                            <del><span class="num">2899</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">大，超出我想象。希望我买到小米Max2,从此珍藏起红...</span> <span
                                                        class="author"> 来自于 BOZEFAN 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490778355.67093197!220x220.png"
                                                        width="150" height="150" alt="电视4A 55英寸 人工智能语音版"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">电视4A 55英寸 人工智能语音版</a>
                                        </h3>
                                        <p class="desc">2GB+32GB，蓝牙触控语音遥控器</p>
                                        <p class="price"><span class="num">3399</span>元
                                            <del><span class="num">3599</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9.5折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">算是个米粉了吧，我的手环2有点问题寄回去了，不知道你...</span> <span
                                                        class="author"> 来自于 一米阳光 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490778418.99894062!220x220.png"
                                                        width="150" height="150" alt="电视4A 65英寸 人工智能语音版"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">电视4A 65英寸 人工智能语音版</a>
                                        </h3>
                                        <p class="desc">4K超清大屏，支持HDR10</p>
                                        <p class="price"><span class="num">5699</span>元
                                            <del><span class="num">6199</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9.2折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">电视挺不错的，只是刚买没几天，就降价一千，很难受</span> <span
                                                        class="author"> 来自于 968278666 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490077525.53218827!220x220.png"
                                                        width="150" height="150" alt="电视4A 55英寸标准版"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">电视4A 55英寸标准版</a></h3>
                                        <p class="desc">4K超高清屏，支持HDR10</p>
                                        <p class="price"><span class="num">2999</span>元
                                            <del><span class="num">3199</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9.4折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">第一次买电视.感觉还可以.只是挂架没有配有不懂在哪买</span> <span
                                                        class="author"> 来自于 宏轩橱柜 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1479190789.95594557!220x220.jpg"
                                                        width="150" height="150" alt="小米盒子3s"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米盒子3s</a></h3>
                                        <p class="desc">4K超高清机顶盒，64 位处理器</p>
                                        <p class="price"><span class="num">299</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">不错，不知道我这算米粉不？静静等着客服妹子偷偷的回答...</span> <span
                                                        class="author"> 来自于 153835481 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/T146YgBKhv1RXrhCrK.jpg" width="80"
                                                        height="80" alt="小米盒子3 增强版"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">小米盒子3
                                                增强版</a></h3>
                                        <p class="price"><span class="num">399</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>电视影音</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1487928964.47473084!220x220.jpg"
                                                        width="150" height="150" alt="小米笔记本Air13.3英寸尊享版"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米笔记本Air13.3英寸尊享版</a>
                                        </h3>
                                        <p class="desc">带独立显卡的轻薄笔记本</p>
                                        <p class="price"><span class="num">5999</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">终于等到你～     坚持就是胜利，希望下次晒单就是...</span> <span
                                                        class="author"> 来自于    爱拼才会赢 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1494917570.73059940!220x220.jpg"
                                                        width="150" height="150" alt="小米笔记本Air 12.5英寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米笔记本Air 12.5英寸</a></h3>
                                        <p class="desc">集成显卡，酷睿 i5处理器</p>
                                        <p class="price"><span class="num">4799</span>元
                                            <del><span class="num">4999</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-new">新品</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">不错不错</span> <span
                                                        class="author"> 来自于 木子 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490604807.82792204!220x220.jpg"
                                                        width="150" height="150" alt="小米笔记本Air 12.5英寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米笔记本Air 12.5英寸</a></h3>
                                        <p class="desc">更轻更薄，像杂志一样随身携带</p>
                                        <p class="price"><span class="num">3899</span>元
                                            <del><span class="num">3999</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9.8折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">质量超棒，瞬间变米粉。</span> <span class="author"> 来自于 米的老爹 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1478763592.13343555!220x220.jpg"
                                                        width="150" height="150" alt="小米笔记本内胆包12.5英寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米笔记本内胆包12.5英寸</a></h3>
                                        <p class="desc">至简纤薄 轻松随行无压力</p>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">这个质感特别好，用来保护电脑棒棒的。</span> <span class="author"> 来自于 杨程 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490595812.95661863!220x220.png"
                                                        width="150" height="150" alt="小米无线鼠标"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米无线鼠标</a></h3>
                                        <p class="desc">耐脏亲肤涂层，人体工学设计</p>
                                        <p class="price"><span class="num">64</span>元
                                            <del><span class="num">69</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9.3折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">非常灵敏，里面还安转了彩虹电池。设计很小巧。usb放...</span> <span
                                                        class="author"> 来自于 XIAMO 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1478248566.62624407!220x220.jpg"
                                                        width="150" height="150" alt="小米便携鼠标"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米便携鼠标</a></h3>
                                        <p class="desc">轻薄便携，铝合金外壳 +ABS 材质</p>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">帅帅的鼠标，帅帅的笔记本，美美的老婆，帅帅的我</span> <span
                                                        class="author"> 来自于 yellow 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490702347.3628109!220x220.png"
                                                        width="150" height="150" alt="悦米机械键盘"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">悦米机械键盘</a></h3>
                                        <p class="desc">铝合金机身，TTC红轴，87 键</p>
                                        <p class="price"><span class="num">299</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">很有手感，尤其是敲键盘的感觉，太喜欢了。</span> <span class="author"> 来自于 斗佛 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1469523170.25518983!220x220.jpg"
                                                        width="80" height="80" alt="USB-C至HDMI多功能转接器"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">USB-C至HDMI多功能转接器</a>
                                        </h3>
                                        <p class="price"><span class="num">149</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>电脑</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1478678718.61531371!220x220.jpg"
                                                        width="150" height="150" alt="米家IH电饭煲 3L"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家IH电饭煲 3L</a></h3>
                                        <p class="desc">IH 电磁环绕加热，3000+ 煮米方案</p>
                                        <p class="price"><span class="num">399</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">外形中规中矩，但绝对不磕碜，细节处理很到位，白的的很...</span> <span
                                                        class="author"> 来自于 宋欢 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1498564154.53184175!220x220.jpg"
                                                        width="150" height="150" alt="米家声波电动牙刷"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家声波电动牙刷</a></h3>
                                        <p class="desc">磁悬浮声波马达，定制多种刷牙模式</p>
                                        <p class="price"><span class="num">199</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-new">新品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1hMK_BjEv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米净水器（厨下式）"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米净水器（厨下式）</a></h3>
                                        <p class="desc">6月28日-29日，限量送PP棉滤芯</p>
                                        <p class="price"><span class="num">1999</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-gift">有赠品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1477916442.08799062!220x220.jpg"
                                                        width="150" height="150" alt="米家空气净化器Pro"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家空气净化器Pro</a></h3>
                                        <p class="desc">6月28日-29日，限量送59元插线板</p>
                                        <p class="price"><span class="num">1499</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-gift">有赠品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1465366178.11466342!220x220.jpg"
                                                        width="150" height="150" alt="米家恒温电水壶"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家恒温电水壶</a></h3>
                                        <p class="desc">水温智能控制，304 不锈钢内胆</p>
                                        <p class="price"><span class="num">199</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">小米水壶为烧水而生！看了客服妹子的评论我也爱上了她，...</span> <span
                                                        class="author"> 来自于 聊米 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1496647119.81414190!220x220.jpg"
                                                        width="150" height="150" alt="飞利浦智睿球泡灯"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">飞利浦智睿球泡灯</a></h3>
                                        <p class="desc">自由调节亮度，Wi-Fi随时操控</p>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-new">新品</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">不错，很实用，晚上看监控也一清二楚！感谢小米科技！</span> <span
                                                        class="author"> 来自于 攀少 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1495520422.36514041!220x220.jpg"
                                                        width="150" height="150" alt="米家 LED 智能台灯"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家 LED 智能台灯</a></h3>
                                        <p class="desc">无可视频闪，四种场景优化调光</p>
                                        <p class="price"><span class="num">169</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">灯超级漂亮 手机居然可以操控真是太棒了。现在家里基本...</span> <span
                                                        class="author"> 来自于 上官祁傲 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1490756071.3088664!220x220.png"
                                                        width="80" height="80" alt="Yeelight LED 吸顶灯"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">Yeelight
                                                LED 吸顶灯</a></h3>
                                        <p class="price"><span class="num">359</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>家居</small>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="smart"
                 class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
                <div class="box-hd">
                    <h2 class="title">智能</h2>
                    <!-- <h2 class="title">冲破大风雪，我们坐在雪橇上  (๑•̀ㅂ•́)و✧ </h2> -->
                    <div class="more J_brickNav">
                        <ul class="tab-list J_brickTabSwitch" data-tab- target="smart-content">
                            <li class="tab-active">热门</li>
                            <li class="">出行</li>
                            <li class="">健康</li>
                            <li class="">酷玩</li>
                            <li class="">路由器</li>
                        </ul>
                    </div>
                </div>
                <div class="box-bd J_brickBd">
                    <div class="row">
                        <div class="span4 span-first">
                            <ul class="brick-promo-list clearfix">
                                <li class="brick-item brick-item-m"><a href="" class="exposure" target="_blank"
                                                                       onclick=""><img
                                                src="//i3.mifile.cn/a4/xmad_14985531398739_lozpr.jpg" width="160"
                                                height="160" alt=""></a></li>
                                <li class="brick-item brick-item-m"><a href="" class="exposure" target="_blank"
                                                                       onclick=""><img
                                                src="//i3.mifile.cn/a4/xmad_14985534167387_SHfvP.jpg" width="160"
                                                height="160" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="span16">
                            <div id="smart-content" class="tab-container">
                                <ul class="brick-list tab-content clearfix tab-content-active J_recommendActive"
                                    style="">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1487831386.1667404!220x220.jpg"
                                                        width="150" height="150" alt="小米体脂秤"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米体脂秤</a></h3>
                                        <p class="desc">6月28日-29日，限量送保护套</p>
                                        <p class="price"><span class="num">199</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-gift">有赠品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/d872b1d6-c8ba-4fc7-ac29-b0b3caa19c90"
                                                        width="150" height="150" alt="米家小白智能摄像机"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家小白智能摄像机</a></h3>
                                        <p class="desc">6月28日-29日，限量送米家签字笔</p>
                                        <p class="price"><span class="num">399</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-gift">有赠品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1498643144.48446520!220x220.png"
                                                        width="150" height="150" alt="九号平衡车 Plus"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">九号平衡车 Plus</a></h3>
                                        <p class="desc">35km超长续航，一键自动跟随</p>
                                        <p class="price"><span class="num">3499</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-new">新品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1467962689.97551741!220x220.jpg"
                                                        width="150" height="150" alt="小米手环2"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米手环2</a></h3>
                                        <p class="desc">OLED 显示屏幕，升级计步算法</p>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-postfree">免邮费</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">真不错，超喜欢，不知道耐不耐用，防不防水？</span> <span
                                                        class="author"> 来自于 及时雨 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1464615180.86261317!220x220.jpg"
                                                        width="150" height="150" alt="米兔智能故事机"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米兔智能故事机</a></h3>
                                        <p class="desc">6月28日-29日，限量送表情贴纸</p>
                                        <p class="price"><span class="num">199</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-gift">有赠品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1498526059.78899603!220x220.jpg"
                                                        width="150" height="150" alt="米兔儿童电话手表2"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米兔儿童电话手表2</a></h3>
                                        <p class="desc">AMOLED高清彩屏，6 天超长续航</p>
                                        <p class="price"><span class="num">399</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-new">新品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1494930931.15085806!220x220.jpg"
                                                        width="150" height="150" alt="小米无人机特惠套装"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米无人机特惠套装</a></h3>
                                        <p class="desc">探索触手可及的新视角</p>
                                        <p class="price"><span class="num">3549</span>元
                                            <del><span class="num">3616</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9.9折</div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1477985364.89714934!220x220.jpg"
                                                        width="80" height="80" alt="小米VR眼镜"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank"
                                                             onclick="">小米VR眼镜</a></h3>
                                        <p class="price"><span class="num">299</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>热门</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1491312153.28261682!220x220.jpg"
                                                        width="150" height="150" alt="米家全景相机套装"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家全景相机套装</a></h3>
                                        <p class="desc">6月28日-29日，限量送32G存储卡</p>
                                        <p class="price"><span class="num">1699</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-gift">有赠品</div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/2b69b930-a2fd-4d09-a46a-8690cb79f764"
                                                        width="150" height="150" alt="电助力折叠自行车"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">电助力折叠自行车</a></h3>
                                        <p class="desc">力矩传感电助力，折叠便携设计</p>
                                        <p class="price"><span class="num">2999</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">车子很轻，男人拎着没压力，女人稍微有些吃力。各个部位...</span> <span
                                                        class="author"> 来自于 寂寞独自凉 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1488449975.74164506!220x220.jpg"
                                                        width="150" height="150" alt="小米米家对讲机"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米米家对讲机</a></h3>
                                        <p class="desc">8天超长待机，位置共享，FM收音机</p>
                                        <p class="price"><span class="num">249</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">还是蓝色版耐脏！</span> <span class="author"> 来自于 陈成 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1488338229.6467773!220x220.jpg"
                                                        width="150" height="150" alt="米家行车记录仪"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家行车记录仪</a></h3>
                                        <p class="desc">晚上能拍清车牌的行车记录仪</p>
                                        <p class="price"><span class="num">349</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">行车记录仪做工精美，使用方便，录像清晰。</span> <span class="author"> 来自于 与子偕老 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1478761096.92412274!220x220.jpg"
                                                        width="150" height="150" alt="Amazfit 运动手表"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">Amazfit 运动手表</a></h3>
                                        <p class="desc">蓝牙听歌，运动心率，智能通知提醒</p>
                                        <p class="price"><span class="num">799</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">好喜欢，听说客服妹子好靓妹，能约吗</span> <span class="author"> 来自于 小卫 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1496730880.16174470!220x220.jpg"
                                                        width="150" height="150" alt="小蚁微单相机M1双镜头套机"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小蚁微单相机M1双镜头套机</a></h3>
                                        <p class="desc">2016 万有效像素，4K视频录制</p>
                                        <p class="price"><span class="num">2999</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">听说晒单有客服妹子点赞，我就晒了，不知妹子是不是照片...</span> <span
                                                        class="author"> 来自于 中国米 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/cbabf443-1ff1-4014-a1bf-06c45476f1e6"
                                                        width="150" height="150" alt="米兔定位电话"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米兔定位电话</a></h3>
                                        <p class="desc">高清双向通话，五重精准定位</p>
                                        <p class="price"><span class="num">169</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">孩子掌握很简单，设置也不复杂，好用易用，性价比也不错...</span> <span
                                                        class="author"> 来自于 不二法门 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1492509229.84515978!220x220.jpg"
                                                        width="80" height="80" alt="米家车载空气净化器滤芯"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">米家车载空气净化器滤芯</a>
                                        </h3>
                                        <p class="price"><span class="num">69</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>出行</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1473125484.8332236!220x220.jpg"
                                                        width="150" height="150" alt="米家飞利浦智睿台灯二代"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家飞利浦智睿台灯二代</a></h3>
                                        <p class="desc">感知环境光，主动优化场景照明</p>
                                        <p class="price"><span class="num">199</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">给儿子买的，佷不错，如当年我要有这个台灯，我现在都从...</span> <span
                                                        class="author"> 来自于 黄连松 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1GxCvBghT1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="Yeelight床头灯"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">Yeelight床头灯</a></h3>
                                        <p class="desc">触摸式操作体验，给卧室1600万种颜色</p>
                                        <p class="price"><span class="num">229</span>元
                                            <del><span class="num">249</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9.2折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">哈哈，快齐了所有套装万事俱备只差客服妹子！客服大汉也...</span> <span
                                                        class="author"> 来自于 夏柒帅 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1sWd_B7VT1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米体重秤"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米体重秤</a></h3>
                                        <p class="desc">100克，喝杯水都可感知的精准</p>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">很是喜欢哈，客服妹子，等我瘦了去找你哈！！</span> <span
                                                        class="author"> 来自于 lucifer 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1488190122.83567909!220x220.jpg"
                                                        width="150" height="150" alt="米家智能摄像机 1080P"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家智能摄像机 1080P</a></h3>
                                        <p class="desc">10米红外夜视范围，双向语音沟通</p>
                                        <p class="price"><span class="num">199</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">用来做店里的监控，很清晰，特别是夜视功能很强大。</span> <span
                                                        class="author"> 来自于 舞雨伦比 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1HQA_BCd_1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="米家iHealth血压计"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家iHealth血压计</a></h3>
                                        <p class="desc">爸妈上手就会用的智能血压计</p>
                                        <p class="price"><span class="num">399</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">血压仪是给妈妈买的，家里用的血压仪还是很古老的那种了...</span> <span
                                                        class="author"> 来自于 米粉° 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1477980865.4569720!220x220.jpg"
                                                        width="150" height="150" alt="米家PM2.5检测仪"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家PM2.5检测仪</a></h3>
                                        <p class="desc">一体黑 OLED 屏，智能联动</p>
                                        <p class="price"><span class="num">399</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">实时了解空气质量，再也不怕忘拆滤芯塑料袋了</span> <span
                                                        class="author"> 来自于 那爱 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1476425102.6997704!220x220.jpg"
                                                        width="150" height="150" alt="空气净化器滤芯"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">空气净化器滤芯</a></h3>
                                        <p class="desc">高效净化，可吸入颗粒物、甲醛</p>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">客服你看我这样用帅不帅，</span> <span class="author"> 来自于 你没见面的爹 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/T1KzbQBvbT1RXrhCrK.jpg" width="80"
                                                        height="80" alt="小米水质TDS检测笔"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">小米水质TDS检测笔</a>
                                        </h3>
                                        <p class="price"><span class="num">39</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>健康</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1479367293.94368573!220x220.jpg"
                                                        width="150" height="150" alt="米兔儿童手表Q"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米兔儿童手表Q</a></h3>
                                        <p class="desc">11重安全设计，五重精准定位</p>
                                        <p class="price"><span class="num">249</span>元
                                            <del><span class="num">299</span>元</del>
                                        </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-saleoff"> 享9折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">这个需要买什么样套餐的卡？？需要剪卡嘛？</span> <span class="author"> 来自于 坚坚 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1464615180.86261317!220x220.jpg"
                                                        width="150" height="150" alt="米兔智能故事机"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米兔智能故事机</a></h3>
                                        <p class="desc">微信远程互动，智能语音交互</p>
                                        <p class="price"><span class="num">199</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">很好。给宝宝买了一个。宝宝非常喜欢。老婆也夸我了，买...</span> <span
                                                        class="author"> 来自于 li 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/xmad_14927605434196_fmGSl.png"
                                                        width="150" height="150" alt="米家智能家庭礼品装"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家智能家庭礼品装</a></h3>
                                        <p class="desc">智能联动，让生活更便捷</p>
                                        <p class="price"><span class="num">329</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">功能强大！颜值一流！支持小米！支持米家！不忘初心！</span> <span
                                                        class="author"> 来自于 心佛 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1480474019.52478532!220x220.jpg"
                                                        width="150" height="150" alt="米家多功能网关"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家多功能网关</a></h3>
                                        <p class="desc">米家智能配件控制中心</p>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">双网关连接，信号强不少，一楼二楼一个网关常常断开连接...</span> <span
                                                        class="author"> 来自于 颜玲建 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1495181352.27622640!220x220.jpg"
                                                        width="150" height="150" alt="烟雾报警器"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">烟雾报警器</a></h3>
                                        <p class="desc">远程报警，定期自检提醒</p>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">外形小巧，圆润。质感不错，一节3v电池，报警蜂鸣音很...</span> <span
                                                        class="author"> 来自于 老金 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1481272542.18866110!220x220.jpg"
                                                        width="150" height="150" alt="米家智能插座(ZigBee版)"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家智能插座(ZigBee版)</a></h3>
                                        <p class="desc">实际功率检测，电量统计，定时开关</p>
                                        <p class="price"><span class="num">69</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">确实很不错，不但解决了定时开关问题，还可以看到耗电量...</span> <span
                                                        class="author"> 来自于 坚挺 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1489563242.40586106!220x220.jpg"
                                                        width="150" height="150" alt="小米网络收音机增强版"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米网络收音机增强版</a></h3>
                                        <p class="desc">蓝牙 Wi-Fi 双无线，专业扬声器</p>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">无聊的时候听听广播还是挺好的么</span> <span class="author"> 来自于 空宇 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1483942428.16162503!220x220.jpg"
                                                        width="80" height="80" alt="小方智能摄像机"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank"
                                                             onclick="">小方智能摄像机</a></h3>
                                        <p class="price"><span class="num">129</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>酷玩</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/376f5f19-d1f5-4f87-8ef9-38e86891bc87"
                                                        width="150" height="150" alt="小米路由器3"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米路由器3</a></h3>
                                        <p class="desc">四天线设计，更快更强</p>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-postfree">免邮费</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">穿墙信号杠杠的，对一般家庭来说足够了，网速无损，超过...</span> <span
                                                        class="author"> 来自于 虎啸山林 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1470288129.01686992!220x220.jpg"
                                                        width="150" height="150" alt="小米路由器3C"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米路由器3C</a></h3>
                                        <p class="desc">APP智能控制，安全防蹭网</p>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-postfree">免邮费</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">爽！好看！客服妹子，能否获得你的回复呢</span> <span class="author"> 来自于 善变丶 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1481188619.07736357!220x220.jpg"
                                                        width="150" height="150" alt="小米WiFi放大器 2"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米WiFi放大器 2</a></h3>
                                        <p class="desc">适配主流路由器，两步完成设置</p>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">听说用小米产品的汉子都不好找对象，真是这样的吗，有没...</span> <span
                                                        class="author"> 来自于 沈松滨 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1488268224.14952632!220x220.jpg"
                                                        width="150" height="150" alt="小米路由器 HD"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米路由器 HD</a></h3>
                                        <p class="desc">全新金属机身设计，4x4全向性天线</p>
                                        <p class="price"><span class="num">1299</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">坠手，有分量…稳重又大方！</span> <span class="author"> 来自于 张育杰 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1491009389.88616921!220x220.jpg"
                                                        width="150" height="150" alt="小米WiFi电力猫"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米WiFi电力猫</a></h3>
                                        <p class="desc">需要与路由器产品搭配使用</p>
                                        <p class="price"><span class="num">249</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">这个感觉比华为的好用很多。</span> <span class="author"> 来自于 红米1s 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1488268195.02396947!220x220.jpg"
                                                        width="150" height="150" alt="小米路由器 Pro"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米路由器 Pro</a></h3>
                                        <p class="desc">全新金属机身设计，4x4全向性天线</p>
                                        <p class="price"><span class="num">499</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">速度真的好快，下载速度杠杠的，我家140平米，哪里都...</span> <span
                                                        class="author"> 来自于 CitrusIce 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1496289112.05343314!220x220.jpg"
                                                        width="150" height="150" alt="小米路由器3G"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米路由器3G</a></h3>
                                        <p class="desc">双核全千兆设计，USB 3.0</p>
                                        <p class="price"><span class="num">249</span>元 </p>
                                        <p class="rank"></p>
                                        <div class="flag flag-new">新品</div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/T13y_vBgJT1RXrhCrK!220x220.jpg"
                                                        width="80" height="80" alt="小米千兆网线"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank"
                                                             onclick="">小米千兆网线</a></h3>
                                        <p class="price"><span class="num">14.9</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>路由器</small>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="match"
                 class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
                <div class="box-hd">
                    <h2 class="title">搭配</h2>
                    <!-- <h2 class="title">快奔驰过田野，我们欢笑又歌唱   φ(゜▽゜*)♪</h2> -->
                    <div class="more J_brickNav">
                        <ul class="tab-list J_brickTabSwitch" data-tab- target="match-content">
                            <li class="">热门</li>
                            <li class="">耳机音箱</li>
                            <li class="">电源</li>
                            <li class="tab-active">电池存储卡</li>
                        </ul>
                    </div>
                </div>
                <div class="box-bd J_brickBd">
                    <div class="row">
                        <div class="span4 span-first">
                            <ul class="brick-promo-list clearfix">
                                <li class="brick-item brick-item-m"><a href="" class="exposure" target="_blank"
                                                                       onclick=""><img
                                                src="//i3.mifile.cn/a4/cca260f6-7adc-488a-bffa-e5c173490a84" width="160"
                                                height="160" alt=""></a></li>
                                <li class="brick-item brick-item-m"><a href="" class="exposure" target="_blank"
                                                                       onclick=""><img
                                                src="//i3.mifile.cn/a4/xmad_14984462064729_IKEOD.jpg" width="160"
                                                height="160" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="span16">
                            <div id="match-content" class="tab-container">
                                <ul class="brick-list tab-content clearfix tab-content-active J_recommendActive hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="小米运动蓝牙耳机"
                                                                          target="_blank" data-stat-aid="小米运动蓝牙耳机"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1476674302.67179007.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="小米运动蓝牙耳机"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="小米运动蓝牙耳机" target="_blank"
                                                             data-stat-aid="小米运动蓝牙耳机" onclick=""> 小米运动蓝牙耳机 </a></h3>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank">9455人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="小米运动蓝牙耳机" target="_blank"
                                                                       data-stat-aid="小米运动蓝牙耳机" onclick=""> <span
                                                        class="review">感觉挺好，希望小米继续用物美价廉的美好品质打动消费者。</span> <span
                                                        class="author"> 来自于 大卫 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="20000mAh小米移动电源2"
                                                                          target="_blank"
                                                                          data-stat-aid="20000mAh小米移动电源2"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1482816047.72829695.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="20000mAh小米移动电源2"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="20000mAh小米移动电源2" target="_blank"
                                                             data-stat-aid="20000mAh小米移动电源2" onclick="">
                                                20000mAh小米移动电源2 </a></h3>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank">1.6万人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="20000mAh小米移动电源2"
                                                                       target="_blank" data-stat-aid="20000mAh小米移动电源2"
                                                                       onclick=""> <span class="review">做工精致，爱不释手；至今仍是单身狗；妹子可愿跟我走？</span>
                                                <span class="author"> 来自于 254576465 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="小米移动电源10000mAh高配版"
                                                                          target="_blank"
                                                                          data-stat-aid="小米移动电源10000mAh高配版"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1481269289.59498154.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="小米移动电源10000mAh高配版"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="小米移动电源10000mAh高配版" target="_blank"
                                                             data-stat-aid="小米移动电源10000mAh高配版" onclick="">
                                                小米移动电源10000mAh高配版 </a></h3>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank">7823人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="小米移动电源10000mAh高配版"
                                                                       target="_blank" data-stat-aid="小米移动电源10000mAh高配版"
                                                                       onclick=""> <span class="review">特意为亮蓝陶瓷尊享版米6买的，评价我只打四星，之所以...</span>
                                                <span class="author"> 来自于 随&amp;缘 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="小米活塞耳机 清新版"
                                                                          target="_blank" data-stat-aid="小米活塞耳机清新版"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1482321199.12589253.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="小米活塞耳机 清新版"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="小米活塞耳机 清新版" target="_blank"
                                                             data-stat-aid="小米活塞耳机清新版" onclick=""> 小米活塞耳机 清新版 </a></h3>
                                        <p class="price"><span class="num">29</span>元 </p>
                                        <p class="rank">4.4万人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="小米活塞耳机 清新版"
                                                                       target="_blank" data-stat-aid="小米活塞耳机清新版"
                                                                       onclick=""> <span class="review">满怀忐忑的打开小方盒，那一抹银光闪爆我的24k钛合金...</span>
                                                <span class="author"> 来自于 微笑 的评价 <span class="date"></span> </span> </a>
                                        </div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="小米网络音响"
                                                                          target="_blank" data-stat-aid="小米网络音响"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1493189048.87486734.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="小米网络音响"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="小米网络音响" target="_blank"
                                                             data-stat-aid="小米网络音响" onclick=""> 小米网络音响 </a></h3>
                                        <p class="price"><span class="num">399</span>元 </p>
                                        <p class="rank">5870人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="小米网络音响" target="_blank"
                                                                       data-stat-aid="小米网络音响" onclick=""> <span
                                                        class="review">最美好的礼物，母亲节的礼物，送给妈妈</span> <span class="author"> 来自于 很狂沙 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="小米蓝牙耳机青春版"
                                                                          target="_blank" data-stat-aid="小米蓝牙耳机青春版"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1478248721.42297795.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="小米蓝牙耳机青春版"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="小米蓝牙耳机青春版" target="_blank"
                                                             data-stat-aid="小米蓝牙耳机青春版" onclick=""> 小米蓝牙耳机青春版 </a></h3>
                                        <p class="price"><span class="num">59</span>元 </p>
                                        <p class="rank">2.7万人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="小米蓝牙耳机青春版"
                                                                       target="_blank" data-stat-aid="小米蓝牙耳机青春版"
                                                                       onclick=""> <span
                                                        class="review">我觉得还是客服大汉更酷 你觉得呢</span> <span class="author"> 来自于 撩妹纸箱?? 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="小米圈铁耳机Pro"
                                                                          target="_blank" data-stat-aid="小米圈铁耳机Pro"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1478510064.36397738.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="小米圈铁耳机Pro"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="小米圈铁耳机Pro" target="_blank"
                                                             data-stat-aid="小米圈铁耳机Pro" onclick=""> 小米圈铁耳机Pro </a></h3>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank">1.8万人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="小米圈铁耳机Pro"
                                                                       target="_blank" data-stat-aid="小米圈铁耳机Pro"
                                                                       onclick=""> <span class="review">不知不知觉买了好多小米的东西了，客服姐姐都没回复过我</span>
                                                <span class="author"> 来自于 罗维 的评价 <span class="date"></span> </span> </a>
                                        </div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" data-stat-text="小米小钢炮蓝牙音箱2 白色"
                                                                          target="_blank" data-stat-aid="小米小钢炮蓝牙音箱2白色"
                                                                          onclick=""> <img
                                                        src="//i2.mifile.cn/a1/T1F5K_BjVv1RXrhCrK.jpg?width=80&amp;height=80"
                                                        width="80" height="80" alt="小米小钢炮蓝牙音箱2 白色"> </a></div>
                                        <h3 class="title"><a href="" data-stat-text="小米小钢炮蓝牙音箱2 白色" target="_blank"
                                                             data-stat-aid="小米小钢炮蓝牙音箱2白色" onclick="">小米小钢炮蓝牙音箱2 白色</a>
                                        </h3>
                                        <p class="price"><span class="num">129</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>热门</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1482301662.61336109!220x220.jpg"
                                                        width="150" height="150" alt="小米头戴式耳机 轻松版"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米头戴式耳机 轻松版</a></h3>
                                        <p class="price"><span class="num">189</span>元
                                            <del><span class="num">199</span>元</del>
                                        </p>
                                        <p class="rank">1852人评价</p>
                                        <div class="flag flag-saleoff"> 享9.5折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">，物流超快，不到一天就到了，
听着耳机里的告白气球，...</span> <span class="author"> 来自于 甘振 的评价 <span class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1SkV_BCd_1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米胶囊耳机"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米胶囊耳机</a></h3>
                                        <p class="price"><span class="num">59</span>元
                                            <del><span class="num">69</span>元</del>
                                        </p>
                                        <p class="rank">3.6万人评价</p>
                                        <div class="flag flag-saleoff"> 享9折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">万水千山总是情，不知妹纸行不行？</span> <span class="author"> 来自于 176209457 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1478510064.36397738!220x220.jpg"
                                                        width="150" height="150" alt="小米圈铁耳机Pro"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米圈铁耳机Pro</a></h3>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank">1.8万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">客户妹子怎么看</span> <span class="author"> 来自于 1271309082 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1LqYgBCWv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米随身蓝牙音箱"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米随身蓝牙音箱</a></h3>
                                        <p class="price"><span class="num">59</span>元
                                            <del><span class="num">69</span>元</del>
                                        </p>
                                        <p class="rank">1.8万人评价</p>
                                        <div class="flag flag-saleoff"> 享9折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">看在我拍照辣磨认真的份上，客服妹纸就给回一个嘛(｡･...</span> <span
                                                        class="author"> 来自于 longB院 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1Tfd_BjAv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米小钢炮蓝牙音箱2"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米小钢炮蓝牙音箱2</a></h3>
                                        <p class="price"><span class="num">129</span>元 </p>
                                        <p class="rank">2.7万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">我想请客服妹子给第二张图的答案</span> <span class="author"> 来自于 米粉 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490865582.0815024!220x220.jpg"
                                                        width="150" height="150" alt="小米方盒子蓝牙音箱2"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米方盒子蓝牙音箱2</a></h3>
                                        <p class="price"><span class="num">129</span>元 </p>
                                        <p class="rank">1169人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">这款音箱整体效果还是不错，音质也挺好，就是没有充电器...</span> <span
                                                        class="author"> 来自于 962691088 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1481098202.44798045!220x220.jpg"
                                                        width="150" height="150" alt="ROIDMI音乐蓝牙车充"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">ROIDMI音乐蓝牙车充</a></h3>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank">1781人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">其实我买它都用不着就是想和客服妹子聊聊……呵呵……</span> <span
                                                        class="author"> 来自于 1052916712 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/T1MDK_B_YT1RXrhCrK!220x220.jpg"
                                                        width="80" height="80" alt="小米蓝牙音箱"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank"
                                                             onclick="">小米蓝牙音箱</a></h3>
                                        <p class="price"><span class="num">189</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>耳机音箱</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/T1AcE_Bghv1RXrhCrK.jpg" width="150"
                                                        height="150" alt="移动电源5000mAh"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">移动电源5000mAh</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">10.2万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">用了几天很好，不知客服妹子对我好不好</span> <span class="author"> 来自于 1179061360 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1atV_BQLT1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="ZMI移动电源10000mAh"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">ZMI移动电源10000mAh</a></h3>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank">4378人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">好看，挑了我喜欢的金色，赞，昨天上午下的单，今天一大...</span> <span
                                                        class="author"> 来自于 萍 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1481273468.72564539!220x220.jpg"
                                                        width="150" height="150" alt="小米移动电源10000mAh高配版"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米移动电源10000mAh高配版</a>
                                        </h3>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank">7823人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">一如既往的好  如某巧克力般顺滑～这里求客服妹子对下...</span> <span
                                                        class="author"> 来自于 MI_970177140 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1482110626.95581660!220x220.jpg"
                                                        width="150" height="150" alt="20000mAh小米移动电源2"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">20000mAh小米移动电源2</a></h3>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank">1.6万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">20000mA的小米移动电源2真心不错（配合紫米二合...</span> <span
                                                        class="author"> 来自于 千与千寻 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1476688190.21955893!220x220.jpg"
                                                        width="150" height="150" alt="10000mAh小米移动电源2"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">10000mAh小米移动电源2</a></h3>
                                        <p class="price"><span class="num">79</span>元 </p>
                                        <p class="rank">4.4万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">很好用，充电快，轻便，容量足。。客服妹子漂亮(｡･ω...</span> <span
                                                        class="author"> 来自于 尤熙 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/T1Ihd_BTCv1RXrhCrK.jpg" width="150"
                                                        height="150" alt="小米插线板 5孔位"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米插线板 5孔位</a></h3>
                                        <p class="price"><span class="num">39</span>元 </p>
                                        <p class="rank">2.6万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">很棒的产品，很好的客服。因为一台手机晚到货产生的不愉...</span> <span
                                                        class="author"> 来自于 冯俊一 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1469410847.29693876!220x220.jpg"
                                                        width="150" height="150" alt="USB Type-C充电套装"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">USB Type-C充电套装</a></h3>
                                        <p class="price"><span class="num">15</span>元 </p>
                                        <p class="rank"></p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/T13mDQBjCT1RXrhCrK.jpg" width="80"
                                                        height="80" alt="小米智能插线板"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank"
                                                             onclick="">小米智能插线板</a></h3>
                                        <p class="price"><span class="num">69</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>电源</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide" style="display: block;">
                                    <li class="brick-item brick-item-m brick-item-active">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1481098212.65597197!220x220.jpg"
                                                        width="150" height="150" alt="ROIDMI音乐蓝牙车充"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">ROIDMI音乐蓝牙车充</a></h3>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank">1781人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">哇，东西很好用，很适合老车</span> <span class="author"> 来自于 南北城 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1484034162.02747540!220x220.jpg"
                                                        width="150" height="150" alt="小米USB充电器（2口）"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米USB充电器（2口）</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">8427人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">挺不错的，充电好快，已经是小米的忠诚粉，听说可以调戏...</span> <span
                                                        class="author"> 来自于 冰倩 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1xxVTBghv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="彩虹5号电池（10粒装）"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">彩虹5号电池（10粒装）</a></h3>
                                        <p class="price"><span class="num">9.9</span>元 </p>
                                        <p class="rank">10.2万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">赤橙黄绿青蓝紫，谁持彩练当空舞?  客服美眉，快来调...</span> <span
                                                        class="author"> 来自于 志 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1492658221.34618453!220x220.jpg"
                                                        width="150" height="150" alt="睿米一分二点烟器"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">睿米一分二点烟器</a></h3>
                                        <p class="price"><span class="num">79</span>元 </p>
                                        <p class="rank">388人评价</p>
                                        <div class="flag flag-new">新品</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">小小的身体有着大大的力量！~客服妹子你怎么看？</span> <span
                                                        class="author"> 来自于 Westlife 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1vFEjBbWT1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米USB充电器（4口）"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米USB充电器（4口）</a></h3>
                                        <p class="price"><span class="num">69</span>元 </p>
                                        <p class="rank">1.3万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">我喜欢的白色，四个插口很方便，超爱，小米我的最爱</span> <span
                                                        class="author"> 来自于 涵兮 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490163713.86453564!220x220.png"
                                                        width="150" height="150" alt="SanDisk 32GB存储卡"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">SanDisk 32GB存储卡</a></h3>
                                        <p class="price"><span class="num">89</span>元
                                            <del><span class="num">98</span>元</del>
                                        </p>
                                        <p class="rank">808人评价</p>
                                        <div class="flag flag-new">新品</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">客服妹子手机没到内存先到！做个解释！</span> <span class="author"> 来自于 1264478195 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T142A_BXEv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米车载充电器"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米车载充电器</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">4.9万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">美得不可方物，就跟客服妹子一样精致，你觉呢？听说客服...</span> <span
                                                        class="author"> 来自于 李灯辉 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1490165991.05655005!220x220.png"
                                                        width="80" height="80" alt="SanDisk 16GB存储卡"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">SanDisk
                                                16GB存储卡</a></h3>
                                        <p class="price"><span class="num">44.9</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>电池存储卡</small>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="accessories"
                 class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
                <div class="box-hd">
                    <h2 class="title">配件</h2>
                    <!-- <h2 class="title">马儿铃声响叮当，令人精神多欢畅   ヾ(≧▽≦*)o</h2> -->
                    <div class="more J_brickNav">
                        <ul class="tab-list J_brickTabSwitch" data-tab- target="accessories-content">
                            <li class="">热门</li>
                            <li class="">保护套</li>
                            <li class="">贴膜</li>
                            <li class="tab-active">其他配件</li>
                        </ul>
                    </div>
                </div>
                <div class="box-bd J_brickBd">
                    <div class="row">
                        <div class="span4 span-first">
                            <ul class="brick-promo-list clearfix">
                                <li class="brick-item brick-item-m"><a href="" class="exposure" target="_blank"
                                                                       onclick=""><img
                                                src="//i3.mifile.cn/a4/xmad_14985547205071_NuFHK.jpg" width="160"
                                                height="160" alt=""></a></li>
                                <li class="brick-item brick-item-m"><a href="" class="exposure" target="_blank"
                                                                       onclick=""><img
                                                src="//i3.mifile.cn/a4/xmad_14951679051921_JWQpV.jpg" width="160"
                                                height="160" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="span16">
                            <div id="accessories-content" class="tab-container">
                                <ul class="brick-list tab-content clearfix tab-content-active J_recommendActive hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="红米4X 标准高透贴膜"
                                                                          target="_blank" data-stat-aid="红米4X标准高透贴膜"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1488522399.17728020.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="红米4X 标准高透贴膜"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="红米4X 标准高透贴膜" target="_blank"
                                                             data-stat-aid="红米4X标准高透贴膜" onclick=""> 红米4X 标准高透贴膜 </a>
                                        </h3>
                                        <p class="price"><span class="num">9.9</span>元
                                            <del><span class="num">19</span>元</del>
                                        </p>
                                        <p class="rank">3801人评价</p>
                                        <div class="flag flag-saleoff"> 享6折</div>
                                        <div class="review-wrapper"><a href="" data-stat-text="红米4X 标准高透贴膜"
                                                                       target="_blank" data-stat-aid="红米4X标准高透贴膜"
                                                                       onclick=""> <span class="review">我对小米的爱天地可鉴，小米妹子敢不敢回复我的一片真心。</span>
                                                <span class="author"> 来自于 钟大帅 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href=""
                                                                          data-stat-text="红米note4X 3GB+16GB/32GB，4GB+64GB（蓝色）标准高透贴膜"
                                                                          target="_blank"
                                                                          data-stat-aid="红米note4X3GB+16GB/32GB，4GB+64GB（蓝色）标准高透贴膜"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1487742227.27595029.jpg?width=150&amp;height=150"
                                                        width="150" height="150"
                                                        alt="红米note4X 3GB+16GB/32GB，4GB+64GB（蓝色）标准高透贴膜"></a></div>
                                        <h3 class="title"><a href=""
                                                             data-stat-text="红米note4X 3GB+16GB/32GB，4GB+64GB（蓝色）标准高透贴膜"
                                                             target="_blank"
                                                             data-stat-aid="红米note4X3GB+16GB/32GB，4GB+64GB（蓝色）标准高透贴膜"
                                                             onclick=""> 红米NOTE 4X 红米note4X
                                                3GB+16GB/32GB，4GB+64GB（蓝色）标准高透贴膜 </a></h3>
                                        <p class="price"><span class="num">9.9</span>元
                                            <del><span class="num">19</span>元</del>
                                        </p>
                                        <p class="rank">8617人评价</p>
                                        <div class="flag flag-saleoff"> 享6折</div>
                                        <div class="review-wrapper"><a href=""
                                                                       data-stat-text="红米note4X 3GB+16GB/32GB，4GB+64GB（蓝色）标准高透贴膜"
                                                                       target="_blank"
                                                                       data-stat-aid="红米note4X3GB+16GB/32GB，4GB+64GB（蓝色）标准高透贴膜"
                                                                       onclick=""> <span class="review">世上最浪漫和最自私的话就是：你是我一个人的。求妹纸神...</span>
                                                <span class="author"> 来自于 天涯 的评价 <span class="date"></span> </span> </a>
                                        </div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href=""
                                                                          data-stat-text="红米note4X（3GB+32GB）高透软胶保护套"
                                                                          target="_blank"
                                                                          data-stat-aid="红米note4X（3GB+32GB）高透软胶保护套"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1486980879.11199962.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="红米note4X（3GB+32GB）高透软胶保护套"></a>
                                        </div>
                                        <h3 class="title"><a href="" data-stat-text="红米note4X（3GB+32GB）高透软胶保护套"
                                                             target="_blank" data-stat-aid="红米note4X（3GB+32GB）高透软胶保护套"
                                                             onclick=""> 红米NOTE 4X 红米note4X（3GB+32GB）高透软胶保护套 </a></h3>
                                        <p class="price"><span class="num">19</span>元 </p>
                                        <p class="rank">4263人评价</p>
                                        <div class="review-wrapper"><a href=""
                                                                       data-stat-text="红米note4X（3GB+32GB）高透软胶保护套"
                                                                       target="_blank"
                                                                       data-stat-aid="红米note4X（3GB+32GB）高透软胶保护套"
                                                                       onclick=""> <span
                                                        class="review">一直都是买小米，值得拥有值得信赖</span> <span class="author"> 来自于 杨安 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="小米支架式自拍杆"
                                                                          target="_blank" data-stat-aid="小米支架式自拍杆"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1487839278.99934443.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="小米支架式自拍杆"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="小米支架式自拍杆" target="_blank"
                                                             data-stat-aid="小米支架式自拍杆" onclick=""> 小米支架式自拍杆 </a></h3>
                                        <p class="price"><span class="num">89</span>元 </p>
                                        <p class="rank">2388人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="小米支架式自拍杆" target="_blank"
                                                                       data-stat-aid="小米支架式自拍杆" onclick=""> <span
                                                        class="review">用来自拍还真是不错，不用在手抬起来做动作了。</span> <span
                                                        class="author"> 来自于 小先又 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="小米指环支架"
                                                                          target="_blank" data-stat-aid="小米指环支架"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1482221011.26064844.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="小米指环支架"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="小米指环支架" target="_blank"
                                                             data-stat-aid="小米指环支架" onclick=""> 小米指环支架 </a></h3>
                                        <p class="price"><span class="num">19</span>元 </p>
                                        <p class="rank">1.4万人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="小米指环支架" target="_blank"
                                                                       data-stat-aid="小米指环支架" onclick=""> <span
                                                        class="review">我不相信一个指环客服都会过问？</span> <span class="author"> 来自于 为发烧而生 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="米家随身风扇"
                                                                          target="_blank" data-stat-aid="米家随身风扇"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1468287589.40786199.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="米家随身风扇"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="米家随身风扇" target="_blank"
                                                             data-stat-aid="米家随身风扇" onclick=""> 米家随身风扇 </a></h3>
                                        <p class="price"><span class="num">19.9</span>元 </p>
                                        <p class="rank">1.9万人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="米家随身风扇" target="_blank"
                                                                       data-stat-aid="米家随身风扇" onclick=""> <span
                                                        class="review">凉快，好用。可是……妹纸，咋办？</span> <span class="author"> 来自于 口天由页 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a href="" data-stat-text="小米自拍杆（线控版）"
                                                                          target="_blank" data-stat-aid="小米自拍杆（线控版）"
                                                                          onclick=""><img
                                                        src="//i2.mifile.cn/a1/pms_1474430362.70018703.jpg?width=150&amp;height=150"
                                                        width="150" height="150" alt="小米自拍杆（线控版）"></a></div>
                                        <h3 class="title"><a href="" data-stat-text="小米自拍杆（线控版）" target="_blank"
                                                             data-stat-aid="小米自拍杆（线控版）" onclick=""> 小米自拍杆（线控版） </a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">1.2万人评价</p>
                                        <div class="review-wrapper"><a href="" data-stat-text="小米自拍杆（线控版）"
                                                                       target="_blank" data-stat-aid="小米自拍杆（线控版）"
                                                                       onclick=""> <span class="review">挺好用的</span>
                                                <span class="author"> 来自于 圻 的评价 <span class="date"></span> </span> </a>
                                        </div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" data-stat-text="红米4X 天鹅绒质感保护壳 星空黑"
                                                                          target="_blank"
                                                                          data-stat-aid="红米4X天鹅绒质感保护壳星空黑" onclick="">
                                                <img src="//i2.mifile.cn/a1/pms_1488523016.01497956.jpg?width=80&amp;height=80"
                                                     width="80" height="80" alt="红米4X 天鹅绒质感保护壳 星空黑"> </a></div>
                                        <h3 class="title"><a href="" data-stat-text="红米4X 天鹅绒质感保护壳 星空黑" target="_blank"
                                                             data-stat-aid="红米4X天鹅绒质感保护壳星空黑" onclick="">红米4X 天鹅绒质感保护壳
                                                星空黑</a></h3>
                                        <p class="price"><span class="num">29</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>热门</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1493261830.47158342!220x220.jpg"
                                                        width="150" height="150" alt="小米6 硅胶保护套"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米6 硅胶保护套</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">2403人评价</p>
                                        <div class="flag flag-new">新品</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">漂亮吧</span> <span
                                                        class="author"> 来自于 初见丶阳泽 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1486980879.11199962!220x220.jpg"
                                                        width="150" height="150" alt="红米Note 4X 高透软胶保护套 透明"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">红米Note 4X 高透软胶保护套 透明</a>
                                        </h3>
                                        <p class="price"><span class="num">19</span>元 </p>
                                        <p class="rank">4263人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">不错，孔没有偏差，手感还不错</span> <span class="author"> 来自于 叛逆~双鱼座 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1480580129.24255998!220x220.jpg"
                                                        width="150" height="150" alt="小米Note  2 高透软胶保护套"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米Note 2 高透软胶保护套</a>
                                        </h3>
                                        <p class="price"><span class="num">9.9</span>元
                                            <del><span class="num">19</span>元</del>
                                        </p>
                                        <p class="rank">2325人评价</p>
                                        <div class="flag flag-saleoff"> 享6折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">超级米粉，家用电器能用的都用小米，客服妹子，能不能给...</span> <span
                                                        class="author"> 来自于 小俊哥 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1474888521.26868202!220x220.jpg"
                                                        width="150" height="150" alt="小米5s Plus 智能翻盖保护套"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米5s Plus 智能翻盖保护套</a>
                                        </h3>
                                        <p class="price"><span class="num">29</span>元
                                            <del><span class="num">49</span>元</del>
                                        </p>
                                        <p class="rank">3298人评价</p>
                                        <div class="flag flag-saleoff"> 享6折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">超爱，我要的客服汉子呢</span> <span class="author"> 来自于 图门★诺谨 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1474888072.78155129!220x220.jpg"
                                                        width="150" height="150" alt="小米5s 智能立显点阵式保护套"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米5s 智能立显点阵式保护套</a></h3>
                                        <p class="price"><span class="num">49</span>元
                                            <del><span class="num">79</span>元</del>
                                        </p>
                                        <p class="rank">3708人评价</p>
                                        <div class="flag flag-saleoff"> 享7折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">手机壳真心不错哦！！哈哈，价格便宜，这手机壳简直帅呆...</span> <span
                                                        class="author"> 来自于 黄令勇 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1jWWjBsET1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米Max 超薄肤感软胶保护套"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米Max 超薄肤感软胶保护套</a></h3>
                                        <p class="price"><span class="num">29</span>元 </p>
                                        <p class="rank">1.2万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">还不错喜欢，客服可以给我介绍一个妹子不？ 给我介绍一...</span> <span
                                                        class="author"> 来自于 清晨 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1478163840.49069197!220x220.jpg"
                                                        width="150" height="150" alt="红米4高配版 超薄肤感软胶保护套"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">红米4高配版 超薄肤感软胶保护套</a>
                                        </h3>
                                        <p class="price"><span class="num">9.9</span>元
                                            <del><span class="num">19</span>元</del>
                                        </p>
                                        <p class="rank">831人评价</p>
                                        <div class="flag flag-saleoff"> 享6折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">大小合适，和舒服，材质很不错</span> <span class="author"> 来自于 闻所未闻 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1472198624.61936711!220x220.jpg"
                                                        width="80" height="80" alt="红米Note4 智能显示保护套"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">红米Note4
                                                智能显示保护套</a></h3>
                                        <p class="price"><span class="num">39</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>保护套</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1487742227.27595029!220x220.jpg"
                                                        width="150" height="150" alt="红米Note 4X 标准高透贴膜"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">红米Note 4X 标准高透贴膜</a>
                                        </h3>
                                        <p class="price"><span class="num">9.9</span>元
                                            <del><span class="num">19</span>元</del>
                                        </p>
                                        <p class="rank">8617人评价</p>
                                        <div class="flag flag-saleoff"> 享6折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">贴上感觉小了一圈，不过也能用</span> <span class="author"> 来自于 王歆 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1SSJ_B4E_1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米平板2 标准高透贴膜"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米平板2 标准高透贴膜</a></h3>
                                        <p class="price"><span class="num">29</span>元 </p>
                                        <p class="rank">1813人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">小米平板最好也是必须的保护神器……</span> <span class="author"> 来自于 Zdz 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1t2K_B4L_1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米手机5 钢化玻璃贴膜"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米手机5 钢化玻璃贴膜</a></h3>
                                        <p class="price"><span class="num">29</span>元 </p>
                                        <p class="rank">4.8万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">四轴防抖摄像头真不是盖的，如果客服小妹做模特激动手抖...</span> <span
                                                        class="author"> 来自于 窗外 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1482136335.88325212!220x220.jpg"
                                                        width="150" height="150" alt="小米5s Plus 标准高透贴膜"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米5s Plus 标准高透贴膜</a>
                                        </h3>
                                        <p class="price"><span class="num">9.9</span>元
                                            <del><span class="num">19</span>元</del>
                                        </p>
                                        <p class="rank">6157人评价</p>
                                        <div class="flag flag-saleoff"> 享6折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">很清晰，家里一大堆小米 米1米2米3，note，pu...</span> <span
                                                        class="author"> 来自于 媚儿 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1482136306.7944683!220x220.jpg"
                                                        width="150" height="150" alt="小米5s 标准高透贴膜"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米5s 标准高透贴膜</a></h3>
                                        <p class="price"><span class="num">19</span>元 </p>
                                        <p class="rank">7024人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">嗯贴歪了。</span> <span
                                                        class="author"> 来自于 U宇 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1482136277.01722149!220x220.jpg"
                                                        width="150" height="150" alt="红米4高配版 标准高透贴膜"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">红米4高配版 标准高透贴膜</a></h3>
                                        <p class="price"><span class="num">9.9</span>元
                                            <del><span class="num">19</span>元</del>
                                        </p>
                                        <p class="rank">3163人评价</p>
                                        <div class="flag flag-saleoff"> 享6折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">为什么这膜比手机屏小那么多</span> <span class="author"> 来自于 美女来吧 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1y7JQBbCT1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米Max 标准高透贴膜"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米Max 标准高透贴膜</a></h3>
                                        <p class="price"><span class="num">19</span>元 </p>
                                        <p class="rank">1.3万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">手机屏幕都档不完，感觉一元钱一张都贵</span> <span class="author"> 来自于 刘大洪 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1469787992.44385373!220x220.jpg"
                                                        width="80" height="80" alt="红米Pro 标准高透贴膜"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">红米Pro
                                                标准高透贴膜</a></h3>
                                        <p class="price"><span class="num">9.9</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>贴膜</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide" style="display: block;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490702347.3628109!220x220.png"
                                                        width="150" height="150" alt="悦米机械键盘"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">悦米机械键盘</a></h3>
                                        <p class="price"><span class="num">299</span>元 </p>
                                        <p class="rank">517人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">非常漂亮，老婆用起舒服，不知道客服妹子舒不舒服</span> <span
                                                        class="author"> 来自于 灰郎 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1482221011.26064844!220x220.jpg"
                                                        width="150" height="150" alt="小米指环支架 金色"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米指环支架 金色</a></h3>
                                        <p class="price"><span class="num">19</span>元 </p>
                                        <p class="rank">1.4万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">为我还没出库的米6所买，隔一晚就到了，也很精致。最后...</span> <span
                                                        class="author"> 来自于 萨克斯 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1488437436.38237666!220x220.jpg"
                                                        width="150" height="150" alt="小米USB-C电源适配器（45W）"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米USB-C电源适配器（45W）</a>
                                        </h3>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank">447人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">线够长，充电快……买了几个备用</span> <span class="author"> 来自于 139854971 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T11oW_B4dv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="蓝牙语音体感遥控器"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">蓝牙语音体感遥控器</a></h3>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank">3636人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">要能送你一个VIP永久会员就更好啦。</span> <span class="author"> 来自于 小米 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1488533926.06453673!220x220.jpg"
                                                        width="150" height="150" alt="小米便携鼠标"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米便携鼠标</a></h3>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank">8639人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">你还要我怎样</span> <span class="author"> 来自于 185872351 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1469523170.25518983!220x220.jpg"
                                                        width="150" height="150" alt="USB-C至HDMI多功能转接器"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">USB-C至HDMI多功能转接器</a>
                                        </h3>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank">1477人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">还行、米粉就是什么都买、从小米手机到小米电脑、然后在...</span> <span
                                                        class="author"> 来自于 小陈 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1xLxQBgVT1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="USB Type-C 转接头"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">USB Type-C 转接头</a></h3>
                                        <p class="price"><span class="num">5</span>元 </p>
                                        <p class="rank">6.7万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">天灵灵地灵灵，叫抠脚大叔快快现身！</span> <span class="author"> 来自于 麻辣香锅 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1480066629.77799920!220x220.jpg"
                                                        width="80" height="80" alt="小米二合一数据线100cm"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">小米二合一数据线100cm</a>
                                        </h3>
                                        <p class="price"><span class="num">24.9</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>其他配件</small>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="around"
                 class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
                <div class="box-hd">
                    <h2 class="title">周边</h2>
                    <!-- <h2 class="title">我们今晚滑雪真快乐，把滑雪歌儿唱  (♥◠‿◠)ﾉ  ʅ(‾◡◝)</h2> -->
                    <div class="more J_brickNav">
                        <ul class="tab-list J_brickTabSwitch" data-tab- target="around-content">
                            <li class="">热门</li>
                            <li class="">服装</li>
                            <li class="">米兔</li>
                            <li class="">生活周边</li>
                            <li class="tab-active">箱包</li>
                        </ul>
                    </div>
                </div>
                <div class="box-bd J_brickBd">
                    <div class="row">
                        <div class="span4 span-first">
                            <ul class="brick-promo-list clearfix">
                                <li class="brick-item brick-item-m"><a href="" class="exposure" target="_blank"
                                                                       onclick=""><img
                                                src="//i3.mifile.cn/a4/xmad_1493109150882_opGFm.jpg" width="160"
                                                height="160" alt=""></a></li>
                                <li class="brick-item brick-item-m"><a href="" class="exposure" target="_blank"
                                                                       onclick=""><img
                                                src="//i3.mifile.cn/a4/xmad_14976758284205_LubiE.jpg" width="160"
                                                height="160" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="span16">
                            <div id="around-content" class="tab-container">
                                <ul class="brick-list tab-content clearfix tab-content-active J_recommendActive hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490949492.24196486!220x220.jpg"
                                                        width="150" height="150" alt="米家运动鞋(智能版) 男款"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家运动鞋(智能版) 男款</a></h3>
                                        <p class="price"><span class="num">249</span>元 </p>
                                        <p class="rank">1.1万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">不错，物流快。收到后试穿，大小合适，就按正常码买就好...</span> <span
                                                        class="author"> 来自于 天勤小草 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1479972924.07568234!220x220.jpg"
                                                        width="150" height="150" alt="最生活浴巾·青春系列"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">最生活浴巾·青春系列</a></h3>
                                        <p class="price"><span class="num">79</span>元
                                            <del><span class="num">99</span>元</del>
                                        </p>
                                        <p class="rank">1639人评价</p>
                                        <div class="flag flag-postfree">免邮费</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">客服美女陪哥哥聊聊天</span> <span class="author"> 来自于 刘家先生 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1493030484.68163070!220x220.jpg"
                                                        width="150" height="150" alt="8H乳胶床垫"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">8H乳胶床垫</a></h3>
                                        <p class="price"><span class="num">999</span>元 </p>
                                        <p class="rank">274人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">我家大白准备开车去取床垫，东西还不错，没什么异味，就...</span> <span
                                                        class="author"> 来自于 阮世龙 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/T1RRCjBKJv1RXrhCrK.jpg" width="150"
                                                        height="150" alt="90分旅行箱 20寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">90分旅行箱 20寸</a></h3>
                                        <p class="price"><span class="num">299</span>元 </p>
                                        <p class="rank">2.2万人评价</p>
                                        <div class="flag flag-postfree">免邮费</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">刚刚收到，箱子很不错，很喜欢，就是想问一下客服，箱子...</span> <span
                                                        class="author"> 来自于 唐朝的宇宙 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/T1TvJ_B_Kv1RXrhCrK.jpg" width="150"
                                                        height="150" alt="90分旅行箱 24寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">90分旅行箱 24寸</a></h3>
                                        <p class="price"><span class="num">349</span>元 </p>
                                        <p class="rank">2.1万人评价</p>
                                        <div class="flag flag-postfree">免邮费</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">箱子美到爆了，很美。带着它去来一场说走就走的旅行，客...</span> <span
                                                        class="author"> 来自于 周亚哲 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1472711253.2453066!220x220.jpg"
                                                        width="150" height="150" alt="8H护颈乳胶枕"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">8H护颈乳胶枕</a></h3>
                                        <p class="price"><span class="num">199</span>元
                                            <del><span class="num">239</span>元</del>
                                        </p>
                                        <p class="rank">1.1万人评价</p>
                                        <div class="flag flag-saleoff"> 享9折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">割开，膨的一声。。。涨了！</span> <span class="author"> 来自于 明 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1a3DvB7hv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米极简都市双肩包"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米极简都市双肩包</a></h3>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank">2.4万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">听说收集5种小米产品就能召唤客服mm?</span> <span class="author"> 来自于 L    先生     的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1487582229.50527597!220x220.jpg"
                                                        width="80" height="80" alt="小米支架式自拍杆"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">小米支架式自拍杆</a>
                                        </h3>
                                        <p class="price"><span class="num">89</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>热门</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1489482572.28451512!220x220.jpg"
                                                        width="150" height="150" alt="米兔图案圆领短袖T恤 男款"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米兔图案圆领短袖T恤 男款</a></h3>
                                        <p class="price"><span class="num">69</span>元 </p>
                                        <p class="rank">1269人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">快递到了，我还没拆开呢，但是我激动了！么么哒！先上图...</span> <span
                                                        class="author"> 来自于 姽婳 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1489482713.59884063!220x220.jpg"
                                                        width="150" height="150" alt="MI LOGO图案圆领短袖T恤 男款"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">MI LOGO图案圆领短袖T恤 男款</a>
                                        </h3>
                                        <p class="price"><span class="num">69</span>元 </p>
                                        <p class="rank">1014人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">穿着很自由，很放松，不信你买来试试</span> <span class="author"> 来自于 Taushine 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1489482769.0537587!220x220.jpg"
                                                        width="150" height="150" alt="MIX图案圆领短袖T恤 男款"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">MIX图案圆领短袖T恤 男款</a></h3>
                                        <p class="price"><span class="num">69</span>元 </p>
                                        <p class="rank">585人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">外形像客服小妹，质量像我的颜值，希望客服小妹的身材保...</span> <span
                                                        class="author"> 来自于 李超 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1489482473.58444489!220x220.jpg"
                                                        width="150" height="150" alt="小米功能短袖Polo衫 男款"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米功能短袖Polo衫 男款</a></h3>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank">1592人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">很透气，适合旅行穿，一口气到北八楼。米6什么时候才有...</span> <span
                                                        class="author"> 来自于 渫吻痕 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490079731.77948210!220x220.png"
                                                        width="150" height="150" alt="小米运动功能圆领短袖T恤 男款"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米运动功能圆领短袖T恤 男款</a></h3>
                                        <p class="price"><span class="num">69</span>元 </p>
                                        <p class="rank">515人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">七年了，说实话我们应该谢谢你们，做出了这么多优秀的产...</span> <span
                                                        class="author"> 来自于 王帅锋 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490698921.90768471!220x220.png"
                                                        width="150" height="150" alt="小米V领短袖T恤 男款"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米V领短袖T恤 男款</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">3147人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">不错！一下买了6件！全家人</span> <span class="author"> 来自于 906084083 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490699618.39895727!220x220.png"
                                                        width="150" height="150" alt="小米短袖T恤 科技艺术"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米短袖T恤 科技艺术</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">684人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">非常不错的T恤，性价比超高</span> <span class="author"> 来自于 华哥 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1490699313.83423551!220x220.png"
                                                        width="80" height="80" alt="小米短袖T恤 米兔昆仑游 男款"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">小米短袖T恤
                                                米兔昆仑游 男款</a></h3>
                                        <p class="price"><span class="num">49</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>服装</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1470896116.76978423!220x220.jpg"
                                                        width="150" height="150" alt="60cm柔软米兔抱枕"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">60cm柔软米兔抱枕</a></h3>
                                        <p class="price"><span class="num">99</span>元
                                            <del><span class="num">129</span>元</del>
                                        </p>
                                        <p class="rank">1112人评价</p>
                                        <div class="flag flag-saleoff"> 享8折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">送给未来的老婆大人应该是，她是武大的，雷总学妹。虽然...</span> <span
                                                        class="author"> 来自于 萧峰 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1466499316.73488636!220x220.jpg"
                                                        width="150" height="150" alt="13cm皮质米兔挂饰"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">13cm皮质米兔挂饰</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">350人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">第一次米兔饰品，就爱上了米兔，一个字  帅</span> <span
                                                        class="author"> 来自于 Wei卫 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1468221391.115311!220x220.jpg"
                                                        width="150" height="150" alt="米兔多功能护颈枕"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米兔多功能护颈枕</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">3269人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">客服妹纸，你看怎么样(-o-)／敢不敢评论一下(๑•...</span> <span
                                                        class="author"> 来自于 陈灵 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1495795724.388634!220x220.jpg"
                                                        width="150" height="150" alt="经典款米兔（25cm）"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">经典款米兔（25cm）</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">133人评价</p>
                                        <div class="flag flag-new">新品</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">米粉，没米兔兔怎么行，果断为信仰充值。只好狠下心少抽...</span> <span
                                                        class="author"> 来自于 苦中¾作乐 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490699512.44292156!220x220.png"
                                                        width="150" height="150" alt="小米短袖T恤 扑克脸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米短袖T恤 扑克脸</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">813人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">为体育中考买的，希望能考好</span> <span class="author"> 来自于 Jessica 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490699581.0642639!220x220.png"
                                                        width="150" height="150" alt="小米短袖T恤 程序艺术"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米短袖T恤 程序艺术</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">745人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">客服妹子做我女朋友吧！客服妹子我爱你！</span> <span class="author"> 来自于 小无言 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1490699545.98792281!220x220.png"
                                                        width="150" height="150" alt="小米短袖T恤 吃豆人"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米短袖T恤 吃豆人</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">678人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">穿成情侣装，更有夫妻相</span> <span class="author"> 来自于 夜晨 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1490699260.62076018!220x220.png"
                                                        width="80" height="80" alt="小米V领短袖T恤 女款"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">小米V领短袖T恤
                                                女款</a></h3>
                                        <p class="price"><span class="num">49</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>米兔</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide hide"
                                    style="display: none;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1480477598.47892154!220x220.jpg"
                                                        width="150" height="150" alt="米家中性笔专用笔芯"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家中性笔专用笔芯</a></h3>
                                        <p class="price"><span class="num">6.9</span>元 </p>
                                        <p class="rank">1万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">客服妹子出来卖个萌(づ˘ﻬ˘)づ~~~</span> <span class="author"> 来自于 13号gly 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1465724476.99494960!220x220.jpg"
                                                        width="150" height="150" alt="花花草草监测仪"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">花花草草监测仪</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">6462人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">挺喜欢的挺满意的，之前养碰碰香老是挂掉，这回看能不能...</span> <span
                                                        class="author"> 来自于 joni5277 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/5a28d943-ef5d-4920-a89a-7f1bce6c5b35"
                                                        width="150" height="150" alt="米家LED随身灯 增强版"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家LED随身灯 增强版</a></h3>
                                        <p class="price"><span class="num">19.9</span>元 </p>
                                        <p class="rank">3.5万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">比我想象的要好，太完美了，每次买一堆米，客服妹子也不...</span> <span
                                                        class="author"> 来自于 幸福 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1468287589.40786199!220x220.jpg"
                                                        width="150" height="150" alt="米家随身风扇"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">米家随身风扇</a></h3>
                                        <p class="price"><span class="num">19.9</span>元 </p>
                                        <p class="rank">1.8万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">大风车吱溜溜的转，客服快出来～</span> <span class="author"> 来自于 King 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1463971828.3961404!220x220.jpg"
                                                        width="150" height="150" alt="变形金刚特别版声波"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">变形金刚特别版声波</a></h3>
                                        <p class="price"><span class="num">169</span>元 </p>
                                        <p class="rank">2730人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">质量不错，孩子很喜欢，翻来覆去的玩……</span> <span class="author"> 来自于 吕兰昌 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/T1yo_gBm_v1RXrhCrK.jpg" width="150"
                                                        height="150" alt="金属鼠标垫 小号"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">金属鼠标垫 小号</a></h3>
                                        <p class="price"><span class="num">49</span>元 </p>
                                        <p class="rank">1.2万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">高端 大气 上档次 我喜欢这种有后现代感的东东，所以...</span> <span
                                                        class="author"> 来自于 世界第一的公主殿下 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1eKdgB4xv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米电源线收纳盒"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米电源线收纳盒</a></h3>
                                        <p class="price"><span class="num">39</span>元
                                            <del><span class="num">49</span>元</del>
                                        </p>
                                        <p class="rank">3614人评价</p>
                                        <div class="flag flag-saleoff"> 享8折</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">我是个追求完美的人，这个东东做到了。</span> <span class="author"> 来自于 第二天 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/T1fODjBsbT1RXrhCrK!220x220.jpg"
                                                        width="80" height="80" alt="鼠标垫加大号"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank"
                                                             onclick="">鼠标垫加大号</a></h3>
                                        <p class="price"><span class="num">19</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>生活周边</small>
                                        </a></li>
                                </ul>
                                <ul class="brick-list tab-content clearfix tab-content-hide" style="display: block;">
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/T1RRCjBKJv1RXrhCrK.jpg" width="150"
                                                        height="150" alt="90分旅行箱 20寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">90分旅行箱 20寸</a></h3>
                                        <p class="price"><span class="num">299</span>元 </p>
                                        <p class="rank">2.2万人评价</p>
                                        <div class="flag flag-postfree">免邮费</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">刚刚收到，箱子很不错，很喜欢，就是想问一下客服，箱子...</span> <span
                                                        class="author"> 来自于 唐朝的宇宙 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/T1TvJ_B_Kv1RXrhCrK.jpg" width="150"
                                                        height="150" alt="90分旅行箱 24寸"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">90分旅行箱 24寸</a></h3>
                                        <p class="price"><span class="num">349</span>元 </p>
                                        <p class="rank">2.1万人评价</p>
                                        <div class="flag flag-postfree">免邮费</div>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">箱子美到爆了，很美。带着它去来一场说走就走的旅行，客...</span> <span
                                                        class="author"> 来自于 周亚哲 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/pms_1469429887.76894954!220x220.jpg"
                                                        width="150" height="150" alt="90分轻户外旅行洗漱包"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">90分轻户外旅行洗漱包</a></h3>
                                        <p class="price"><span class="num">39</span>元 </p>
                                        <p class="rank">3423人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">蛮不错</span> <span
                                                        class="author"> 来自于 陈佳宝 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/T1G9Y_BmCv1RXrhCrK.jpg" width="150"
                                                        height="150" alt="90分便携收纳袋"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">90分便携收纳袋</a></h3>
                                        <p class="price"><span class="num">29</span>元 </p>
                                        <p class="rank">3986人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">评论已经很多了，也不缺我一个。</span> <span class="author"> 来自于 马明援 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i3.mifile.cn/a4/6ddc1df6-ce8e-4cb5-a26a-b5ef80f1adf7"
                                                        width="150" height="150" alt="小米经典商务双肩包"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米经典商务双肩包</a></h3>
                                        <p class="price"><span class="num">99</span>元 </p>
                                        <p class="rank">1.1万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">这款包包我喜欢了很久，里面的隔断超级实用，快快入手啊</span> <span
                                                        class="author"> 来自于 1009256359 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1a3DvB7hv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米极简都市双肩包"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米极简都市双肩包</a></h3>
                                        <p class="price"><span class="num">149</span>元 </p>
                                        <p class="rank">2.4万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">据说，小黄车和小米包包是绝配哦，你觉着呢客服姐姐</span> <span
                                                        class="author"> 来自于 何世林 的评价 <span class="date"></span> </span>
                                            </a></div>
                                    </li>
                                    <li class="brick-item brick-item-m">
                                        <div class="figure figure-img"><a class="exposure" href="" target="_blank"
                                                                          onclick=""><img
                                                        src="//i1.mifile.cn/a1/T1FtKgBvZv1RXrhCrK!220x220.jpg"
                                                        width="150" height="150" alt="小米多功能都市休闲胸包"></a></div>
                                        <h3 class="title"><a href="" target="_blank" onclick="">小米多功能都市休闲胸包</a></h3>
                                        <p class="price"><span class="num">69</span>元 </p>
                                        <p class="rank">2.8万人评价</p>
                                        <div class="review-wrapper"><a href="" target="_blank" onclick=""> <span
                                                        class="review">这个包看着小，但是容量可以放下俩客服妹子，一个捶背一...</span> <span
                                                        class="author"> 来自于 我爱故我在、 的评价 <span
                                                            class="date"></span> </span> </a></div>
                                    </li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-img"><a href="" class="exposure" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i1.mifile.cn/a1/T1tzL_BjYT1RXrhCrK!220x220.jpg"
                                                        width="80" height="80" alt="学院风简约双肩包"> </a></div>
                                        <h3 class="title"><a href="" class="exposure" target="_blank" onclick="">学院风简约双肩包</a>
                                        </h3>
                                        <p class="price"><span class="num">59</span>元</p></li>
                                    <li class="brick-item brick-item-s">
                                        <div class="figure figure-more"><a href="" target="_blank" onclick=""><i
                                                        class="iconfont"></i></a></div>
                                        <a class="more" href="" target="_blank" onclick="">浏览更多
                                            <small>箱包</small>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="recommend"
                 class="home-recm-box home-brick-box home-brick-row-1-box xm-plain-box J_itemBox J_recommendBox is-visible">
                <div class="box-hd">
                    <h2 class="title">为你推荐</h2>
                    <!-- <h2 class="title">叮叮当，叮叮当，铃儿响叮当   (」o^∀^)」*゜</h2> -->
                    <div class="more J_brickNav">
                        <div class="xm-controls xm-controls-line-small xm-carousel-controls"><a
                                    class="control control-prev iconfont control-disabled" href="" onclick=""></a><a
                                    class="control control-next iconfont" href="" onclick=""></a></div>
                    </div>
                </div>
                <div id="recommend-bd" class="box-bd J_brickBd J_recommend-like container xm-carousel-container">
                    <div class="xm-recommend">
                        <div class="xm-carousel-wrapper" style="height: 320px; overflow: hidden;">
                            <ul class="xm-carousel-col-5-list xm-carousel-list clearfix"
                                style="width: 4960px; margin-left: 0px; transition: margin-left 0.5s ease;">
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米无人机4K版套装" target="_blank"
                                               data-stat-aid="小米无人机4K版套装" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1487824962.01314237.jpg?width=140&amp;height=140"
                                                        alt="小米无人机4K版套装"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米无人机4K版套装"
                                                                         target="_blank" data-stat-aid="小米无人机4K版套装"
                                                                         onclick=""> 小米无人机4K版套装 </a></dd>
                                        <dd class="xm-recommend-price">2999元</dd>
                                        <dd class="xm-recommend-tips"> 435人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米电视3s 65英寸 影院版" target="_blank"
                                               data-stat-aid="小米电视3s65英寸影院版" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1475052168.43877575.jpg?width=140&amp;height=140"
                                                        alt="小米电视3s 65英寸 影院版"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米电视3s 65英寸 影院版"
                                                                         target="_blank" data-stat-aid="小米电视3s65英寸影院版"
                                                                         onclick=""> 小米电视3s 65英寸 影院版 </a></dd>
                                        <dd class="xm-recommend-price">6499元</dd>
                                        <dd class="xm-recommend-tips"></dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="Amazfit 运动手表" target="_blank"
                                               data-stat-aid="Amazfit运动手表" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1477389928.07792706.jpg?width=140&amp;height=140"
                                                        alt="Amazfit 运动手表"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="Amazfit 运动手表"
                                                                         target="_blank" data-stat-aid="Amazfit运动手表"
                                                                         onclick=""> Amazfit 运动手表 </a></dd>
                                        <dd class="xm-recommend-price">799元</dd>
                                        <dd class="xm-recommend-tips"> 5415人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米米家电动滑板车" target="_blank"
                                               data-stat-aid="小米米家电动滑板车" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1481507050.2285518.jpg?width=140&amp;height=140"
                                                        alt="小米米家电动滑板车"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米米家电动滑板车"
                                                                         target="_blank" data-stat-aid="小米米家电动滑板车"
                                                                         onclick=""> 小米米家电动滑板车 </a></dd>
                                        <dd class="xm-recommend-price">1999元</dd>
                                        <dd class="xm-recommend-tips"> 2059人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米运动蓝牙耳机" target="_blank"
                                               data-stat-aid="小米运动蓝牙耳机" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1476674302.67179007.jpg?width=140&amp;height=140"
                                                        alt="小米运动蓝牙耳机"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米运动蓝牙耳机"
                                                                         target="_blank" data-stat-aid="小米运动蓝牙耳机"
                                                                         onclick=""> 小米运动蓝牙耳机 </a></dd>
                                        <dd class="xm-recommend-price">149元</dd>
                                        <dd class="xm-recommend-tips"> 9455人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="10000mAh小米移动电源2" target="_blank"
                                               data-stat-aid="10000mAh小米移动电源2" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1476688193.46995320.jpg?width=140&amp;height=140"
                                                        alt="10000mAh小米移动电源2"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="10000mAh小米移动电源2"
                                                                         target="_blank" data-stat-aid="10000mAh小米移动电源2"
                                                                         onclick=""> 10000mAh小米移动电源2 </a></dd>
                                        <dd class="xm-recommend-price">79元</dd>
                                        <dd class="xm-recommend-tips"> 4.4万人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米路由器 HD" target="_blank" data-stat-aid="小米路由器HD"
                                               onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1490666381.06634471.jpg?width=140&amp;height=140"
                                                        alt="小米路由器 HD"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米路由器 HD"
                                                                         target="_blank" data-stat-aid="小米路由器HD"
                                                                         onclick=""> 小米路由器 HD </a></dd>
                                        <dd class="xm-recommend-price">1299元</dd>
                                        <dd class="xm-recommend-tips"> 577人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米VR眼镜PLAY2" target="_blank"
                                               data-stat-aid="小米VR眼镜PLAY2" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1492398532.4835734.jpg?width=140&amp;height=140"
                                                        alt="小米VR眼镜PLAY2"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米VR眼镜PLAY2"
                                                                         target="_blank" data-stat-aid="小米VR眼镜PLAY2"
                                                                         onclick=""> 小米VR眼镜PLAY2 </a></dd>
                                        <dd class="xm-recommend-price">99元</dd>
                                        <dd class="xm-recommend-tips"> 593人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="米家运动鞋(智能版) 女款" target="_blank"
                                               data-stat-aid="米家运动鞋(智能版)女款" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1490949546.96088774.jpg?width=140&amp;height=140"
                                                        alt="米家运动鞋(智能版) 女款"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="米家运动鞋(智能版) 女款"
                                                                         target="_blank" data-stat-aid="米家运动鞋(智能版)女款"
                                                                         onclick=""> 米家运动鞋(智能版) 女款 </a></dd>
                                        <dd class="xm-recommend-price">249元</dd>
                                        <dd class="xm-recommend-tips"> 1482人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米移动电源10000mAh高配版" target="_blank"
                                               data-stat-aid="小米移动电源10000mAh高配版" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1481269289.59498154.jpg?width=140&amp;height=140"
                                                        alt="小米移动电源10000mAh高配版"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米移动电源10000mAh高配版"
                                                                         target="_blank"
                                                                         data-stat-aid="小米移动电源10000mAh高配版" onclick="">
                                                小米移动电源10000mAh高配版 </a></dd>
                                        <dd class="xm-recommend-price">149元</dd>
                                        <dd class="xm-recommend-tips"> 7823人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米网络音响" target="_blank" data-stat-aid="小米网络音响"
                                               onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1493189048.87486734.jpg?width=140&amp;height=140"
                                                        alt="小米网络音响"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米网络音响" target="_blank"
                                                                         data-stat-aid="小米网络音响" onclick=""> 小米网络音响 </a>
                                        </dd>
                                        <dd class="xm-recommend-price">399元</dd>
                                        <dd class="xm-recommend-tips"> 5870人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米活塞耳机 清新版" target="_blank"
                                               data-stat-aid="小米活塞耳机清新版" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1482321199.12589253.jpg?width=140&amp;height=140"
                                                        alt="小米活塞耳机 清新版"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米活塞耳机 清新版"
                                                                         target="_blank" data-stat-aid="小米活塞耳机清新版"
                                                                         onclick=""> 小米活塞耳机 清新版 </a></dd>
                                        <dd class="xm-recommend-price">29元</dd>
                                        <dd class="xm-recommend-tips"> 4.4万人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米蓝牙耳机青春版" target="_blank"
                                               data-stat-aid="小米蓝牙耳机青春版" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1478248721.42297795.jpg?width=140&amp;height=140"
                                                        alt="小米蓝牙耳机青春版"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米蓝牙耳机青春版"
                                                                         target="_blank" data-stat-aid="小米蓝牙耳机青春版"
                                                                         onclick=""> 小米蓝牙耳机青春版 </a></dd>
                                        <dd class="xm-recommend-price">59元</dd>
                                        <dd class="xm-recommend-tips"> 2.7万人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米家庭影院" target="_blank" data-stat-aid="小米家庭影院"
                                               onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1479795811.90232017.jpg?width=140&amp;height=140"
                                                        alt="小米家庭影院"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米家庭影院" target="_blank"
                                                                         data-stat-aid="小米家庭影院" onclick=""> 小米家庭影院 </a>
                                        </dd>
                                        <dd class="xm-recommend-price">1999元</dd>
                                        <dd class="xm-recommend-tips"></dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="90分旅行箱 20寸" target="_blank"
                                               data-stat-aid="90分旅行箱20寸" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/T1Ay_gBKKv1RXrhCrK.jpg?width=140&amp;height=140"
                                                        alt="90分旅行箱 20寸"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="90分旅行箱 20寸"
                                                                         target="_blank" data-stat-aid="90分旅行箱20寸"
                                                                         onclick=""> 90分旅行箱 20寸 </a></dd>
                                        <dd class="xm-recommend-price">299元</dd>
                                        <dd class="xm-recommend-tips"> 2.3万人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="90分旅行箱 24寸" target="_blank"
                                               data-stat-aid="90分旅行箱24寸" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/T1CDbjBgAT1RXrhCrK.jpg?width=140&amp;height=140"
                                                        alt="90分旅行箱 24寸"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="90分旅行箱 24寸"
                                                                         target="_blank" data-stat-aid="90分旅行箱24寸"
                                                                         onclick=""> 90分旅行箱 24寸 </a></dd>
                                        <dd class="xm-recommend-price">349元</dd>
                                        <dd class="xm-recommend-tips"> 2.1万人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米插线板（含3口USB 2A快充）" target="_blank"
                                               data-stat-aid="小米插线板（含3口USB2A快充）" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1484272997.12298611.jpg?width=140&amp;height=140"
                                                        alt="小米插线板（含3口USB 2A快充）"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米插线板（含3口USB 2A快充）"
                                                                         target="_blank"
                                                                         data-stat-aid="小米插线板（含3口USB2A快充）" onclick="">
                                                小米插线板（含3口USB 2A快充） </a></dd>
                                        <dd class="xm-recommend-price">49元</dd>
                                        <dd class="xm-recommend-tips"> 28.4万人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="小米小钢炮蓝牙音箱2" target="_blank"
                                               data-stat-aid="小米小钢炮蓝牙音箱2" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/T1F5K_BjVv1RXrhCrK.jpg?width=140&amp;height=140"
                                                        alt="小米小钢炮蓝牙音箱2"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="小米小钢炮蓝牙音箱2"
                                                                         target="_blank" data-stat-aid="小米小钢炮蓝牙音箱2"
                                                                         onclick=""> 小米小钢炮蓝牙音箱2 </a></dd>
                                        <dd class="xm-recommend-price">129元</dd>
                                        <dd class="xm-recommend-tips"> 2.7万人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="米兔积木机器人" target="_blank" data-stat-aid="米兔积木机器人"
                                               onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1478076543.58248227.jpg?width=140&amp;height=140"
                                                        alt="米兔积木机器人"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="米兔积木机器人"
                                                                         target="_blank" data-stat-aid="米兔积木机器人"
                                                                         onclick=""> 米兔积木机器人 </a></dd>
                                        <dd class="xm-recommend-price">499元</dd>
                                        <dd class="xm-recommend-tips"> 4213人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                                <li class="J_xm-recommend-list">
                                    <dl>
                                        <dt><a href="" data-stat-text="米家IH电饭煲 4L" target="_blank"
                                               data-stat-aid="米家IH电饭煲4L" onclick=""> <img
                                                        src="//i1.mifile.cn/a1/pms_1490770630.65576964.png?width=140&amp;height=140"
                                                        alt="米家IH电饭煲 4L"> </a></dt>
                                        <dd class="xm-recommend-name"><a href="" data-stat-text="米家IH电饭煲 4L"
                                                                         target="_blank" data-stat-aid="米家IH电饭煲4L"
                                                                         onclick=""> 米家IH电饭煲 4L </a></dd>
                                        <dd class="xm-recommend-price">599元</dd>
                                        <dd class="xm-recommend-tips"> 623人好评</dd>
                                        <dd class="xm-recommend-notice"></dd>
                                    </dl>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="comment" class="home-review-box xm-plain-box J_itemBox J_reviewBox is-visible">
                <div class="box-hd">
                    <h2 class="title">热评产品</h2>
                    <!-- <h2 class="title">今晚滑雪多快乐，我们坐在雪橇上  ︿(￣︶￣)︿</h2> -->
                </div>
                <div class="box-bd J_brickBd">
                    <ul class="review-list clearfix">
                        <li class="review-item review-item-first">
                            <div class="figure figure-img"><a class="exposure" href="" target="_blank" onclick=""> <img
                                            src="//i3.mifile.cn/a4/a5886d24-b443-4a15-88ca-5dbd43b72de3" width="296"
                                            height="220" alt="小米空气净化器2"> </a></div>
                            <p class="review"><a href="" target="_blank" onclick="">先五星好评。再来说说小米空气净化器，北方的天气雾霾越来越常态，这就迫切需要一台性价比高的空气净化器，...</a>
                            </p>
                            <p class="author"> 来自于 sddyboy 的评价 <span class="date"></span></p>
                            <div class="info"><h3 class="title"><a href="" target="_blank" onclick="">小米空气净化器2</a></h3>
                                <span class="sep">|</span>
                                <p class="price"><span class="num">699</span>元</p></div>
                        </li>
                        <li class="review-item">
                            <div class="figure figure-img"><a class="exposure" href="" target="_blank" onclick=""> <img
                                            src="//i3.mifile.cn/a4/05972209-0c29-4f2f-9844-09de1093ab02" width="296"
                                            height="220" alt="米家小白智能摄像机"> </a></div>
                            <p class="review"><a href="" target="_blank" onclick="">样子好可爱，特别是转来转去时很有趣。让它休眠时它就会把头转过去背对着你了，唤醒它又会自动转回来。你叫...</a>
                            </p>
                            <p class="author"> 来自于 随风 的评价 <span class="date"></span></p>
                            <div class="info"><h3 class="title"><a href="" target="_blank" onclick="">米家小白智能摄像机</a></h3>
                                <span class="sep">|</span>
                                <p class="price"><span class="num">399</span>元</p></div>
                        </li>
                        <li class="review-item">
                            <div class="figure figure-img"><a class="exposure" href="" target="_blank" onclick=""> <img
                                            src="//i3.mifile.cn/a4/aa6b038a-2946-4549-acff-17c58e701556" width="296"
                                            height="220" alt="小米插线板"> </a></div>
                            <p class="review"><a href="" target="_blank" onclick="">东西真心不错，用过最好用的插线板，做工外观没得挑剔，3个USB接口很实用，充电快，建议不包邮的应该在...</a>
                            </p>
                            <p class="author"> 来自于 yinyin19891117 的评价 <span class="date"></span></p>
                            <div class="info"><h3 class="title"><a href="" target="_blank" onclick="">小米插线板</a></h3>
                                <span class="sep">|</span>
                                <p class="price"><span class="num">49</span>元</p></div>
                        </li>
                        <li class="review-item">
                            <div class="figure figure-img"><a class="exposure" href="" target="_blank" onclick=""> <img
                                            src="//i3.mifile.cn/a4/62d44838-f464-4c11-887c-9168645ae797" width="296"
                                            height="220" alt="90分旅行箱 20寸"> </a></div>
                            <p class="review"><a href="" target="_blank" onclick="">这箱子很好，外观漂亮，实用性强。很轻，有点软但不影响它的坚固。</a>
                            </p>
                            <p class="author"> 来自于 子书雁 的评价 <span class="date"></span></p>
                            <div class="info"><h3 class="title"><a href="" target="_blank" onclick="">90分旅行箱 20寸</a>
                                </h3> <span class="sep">|</span>
                                <p class="price"><span class="num">299</span>元</p></div>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="content" class="home-content-box xm-plain-box J_itemBox J_contentBox is-visible">
                <div class="box-hd">
                    <h2 class="title">内容</h2>
                    <!-- <h2 class="title">叮叮当，叮叮当，铃儿响叮当  (」o^∀^)」*゜</h2> -->
                </div>
                <div class="box-bd J_brickBd">
                    <ul class="content-list clearfix">
                        <li class="content-item content-item-book content-item-first xm-carousel-container"><h2
                                    class="title">图书</h2>
                            <div class="xm-carousel-wrapper" style="height: 340px; overflow: hidden;">
                                <ul class="item-list clearfix"
                                    style="width: 888px; margin-left: 0px; transition: margin-left 0.5s ease;">
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">哈利·波特与被诅咒的孩子</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank" onclick="">“哈利·波特”第八个故事中文版震撼来袭！特别彩排版剧本！ </a>
                                        </p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick="">29.37元</a>
                                        </p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/5e5da924-84e3-4959-9e25-5891cdf30757"
                                                        width="160" height="140" alt="哈利·波特与被诅咒的孩子"> </a></div>
                                    </li>
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">好吗好的</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank" onclick="">畅销作家大冰2016年新书！讲给你听，好吗好的！</a>
                                        </p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick="">17.99元</a>
                                        </p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/61e1385e-54de-48f3-8717-5e4f4b1cdd14"
                                                        width="160" height="140" alt="好吗好的"> </a></div>
                                    </li>
                                    <li class="more"><p class="desc">海量好书，享受精品阅读时光<br>漂亮的中文排版，千万读者选择！</p> <a
                                                class="btn btn-small btn-line-orange" href="" tabindex="-1"
                                                target="_blank" onclick="">前往多看阅读</a> <img class="thumb"
                                                                                           src="//s01.mifile.cn/i/index/more-duokan.jpg"
                                                                                           width="160" height="140"
                                                                                           alt="多看阅读"></li>
                                </ul>
                            </div>
                            <div class="xm-pagers-wrapper">
                                <ul class="xm-pagers">
                                    <li class="pager pager-active"><span class="dot">1</span></li>
                                    <li class="pager"><span class="dot">2</span></li>
                                    <li class="pager"><span class="dot">3</span></li>
                                </ul>
                            </div>
                            <div class="xm-controls xm-controls-block-small xm-carousel-controls"><a
                                        class="control control-prev iconfont control-disabled" href=""
                                        onclick=""></a><a class="control control-next iconfont" href=""
                                                           onclick=""></a></div>
                        </li>
                        <li class="content-item content-item-theme xm-carousel-container"><h2 class="title">MIUI 主题</h2>
                            <div class="xm-carousel-wrapper" style="height: 340px; overflow: hidden;">
                                <ul class="item-list clearfix"
                                    style="width: 1184px; margin-left: 0px; transition: margin-left 0.5s ease;">
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">bilibili夏季主题</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank" onclick="">夏天赛高！哔哩哔哩
                                                (゜-゜)つロ 干杯~ ​​​​</a></p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick="">免费</a></p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/xmad_14985356500545_ePIEB.jpg"
                                                        width="160" height="140" alt="bilibili夏季主题"> </a></div>
                                    </li>
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">几何</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank" onclick="">最新官方主题，带你感受极简视觉冲击</a>
                                        </p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick="">免费</a></p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/xmad_14982103643442_KCZrH.jpg"
                                                        width="160" height="140" alt="几何"> </a></div>
                                    </li>
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">几何·简黑</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank" onclick="">最新官方主题，带你感受极简视觉冲击，简黑版更加酷炫</a>
                                        </p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick="">免费</a></p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/xmad_14982104498726_oWGlK.jpg"
                                                        width="160" height="140" alt="几何·简黑"> </a></div>
                                    </li>
                                    <li class="more"><p class="desc">众多个性主题、百变锁屏与自由桌面<br>让你的手机与众不同！</p> <a
                                                class="btn btn-small btn-line-green" href="" tabindex="-1"
                                                target="_blank" onclick="">前往MIUI主题市场</a> <img class="thumb"
                                                                                               src="//s01.mifile.cn/i/index/more-miui.jpg"
                                                                                               width="160" height="140"
                                                                                               alt="MIUI主题市场"></li>
                                </ul>
                            </div>
                            <div class="xm-pagers-wrapper">
                                <ul class="xm-pagers">
                                    <li class="pager pager-active"><span class="dot">1</span></li>
                                    <li class="pager"><span class="dot">2</span></li>
                                    <li class="pager"><span class="dot">3</span></li>
                                    <li class="pager"><span class="dot">4</span></li>
                                </ul>
                            </div>
                            <div class="xm-controls xm-controls-block-small xm-carousel-controls"><a
                                        class="control control-prev iconfont control-disabled" href=""
                                        onclick=""></a><a class="control control-next iconfont" href=""
                                                           onclick=""></a></div>
                        </li>
                        <li class="content-item content-item-game xm-carousel-container"><h2 class="title">游戏</h2>
                            <div class="xm-carousel-wrapper" style="height: 340px; overflow: hidden;">
                                <ul class="item-list clearfix"
                                    style="width: 1184px; margin-left: 0px; transition: margin-left 0.5s ease;">
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">米柚手游模拟器</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank"
                                                           onclick="">在电脑上玩遍小米所有手游</a></p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick="">免费</a></p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/T1czW_BXCv1R4cSCrK.png" width="160"
                                                        height="140" alt="米柚手游模拟器"> </a></div>
                                    </li>
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">剑侠世界</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank" onclick="">一生不容错过的浪漫武侠！！</a>
                                        </p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick="">免费</a></p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/695c909b-f541-4575-bace-d08b6465025b"
                                                        width="160" height="140" alt="剑侠世界"> </a></div>
                                    </li>
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">老九门</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank" onclick="">九门恩怨，盗墓笔记前传上线</a>
                                        </p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick="">免费</a></p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/6032cb36-587f-4366-89ef-aefed2546552"
                                                        width="160" height="140" alt="老九门"> </a></div>
                                    </li>
                                    <li class="more"><p class="desc">免费下载海量的手机游戏<br>天天都有现金福利赠送</p> <a
                                                class="btn btn-small btn-line-red" href="" tabindex="-1" target="_blank"
                                                onclick="">前往小米游戏商店</a> <img class="thumb"
                                                                             src="//s01.mifile.cn/i/index/more-game.jpg"
                                                                             width="160" height="140" alt="小米游戏商店"></li>
                                </ul>
                            </div>
                            <div class="xm-pagers-wrapper">
                                <ul class="xm-pagers">
                                    <li class="pager pager-active"><span class="dot">1</span></li>
                                    <li class="pager"><span class="dot">2</span></li>
                                    <li class="pager"><span class="dot">3</span></li>
                                    <li class="pager"><span class="dot">4</span></li>
                                </ul>
                            </div>
                            <div class="xm-controls xm-controls-block-small xm-carousel-controls"><a
                                        class="control control-prev iconfont control-disabled" href=""
                                        onclick=""></a><a class="control control-next iconfont" href=""
                                                           onclick=""></a></div>
                        </li>
                        <li class="content-item content-item-app xm-carousel-container"><h2 class="title">应用</h2>
                            <div class="xm-carousel-wrapper" style="height: 340px; overflow: hidden;">
                                <ul class="item-list clearfix"
                                    style="width: 1184px; margin-left: 0px; transition: margin-left 0.5s ease;">
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">2017金米奖</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank"
                                                           onclick="">最优秀的应用和游戏</a></p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick=""></a></p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/3332da7d-4056-4694-9548-c83b7b3af7d3"
                                                        width="160" height="140" alt="2017金米奖"> </a></div>
                                    </li>
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">Forest</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank" onclick="">帮助您专心于生活中每个重要时刻</a>
                                        </p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick="">免费</a></p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/T1TkKvBCKv1R4cSCrK.png" width="160"
                                                        height="140" alt="Forest"> </a></div>
                                    </li>
                                    <li><h4 class="name"><a href="" class="exposure" tabindex="-1" target="_blank"
                                                            onclick="">小米应用</a></h4>
                                        <p class="desc"><a href="" tabindex="-1" target="_blank" onclick="">小米出品
                                                必属精品</a></p>
                                        <p class="price"><a href="" tabindex="-1" target="_blank" onclick="">免费</a></p>
                                        <div class="figure figure-img"><a href="" tabindex="-1" target="_blank"
                                                                          onclick=""> <img
                                                        src="//i3.mifile.cn/a4/T15VZvB5Kv1R4cSCrK.png" width="160"
                                                        height="140" alt="小米应用"> </a></div>
                                    </li>
                                    <li class="more"><p class="desc">帮助小米手机和其他安卓手机用户<br>发现好用的安卓应用</p> <a
                                                class="btn btn-small btn-line-ocean" href="" tabindex="-1"
                                                target="_blank" onclick="">前往小米应用商店</a> <img class="thumb"
                                                                                             src="//s01.mifile.cn/i/index/more-app.jpg"
                                                                                             width="160" height="140"
                                                                                             alt="小米应用商店"></li>
                                </ul>
                            </div>
                            <div class="xm-pagers-wrapper">
                                <ul class="xm-pagers">
                                    <li class="pager pager-active"><span class="dot">1</span></li>
                                    <li class="pager"><span class="dot">2</span></li>
                                    <li class="pager"><span class="dot">3</span></li>
                                    <li class="pager"><span class="dot">4</span></li>
                                </ul>
                            </div>
                            <div class="xm-controls xm-controls-block-small xm-carousel-controls"><a
                                        class="control control-prev iconfont control-disabled" href=""
                                        onclick=""></a><a class="control control-next iconfont" href=""
                                                           onclick=""></a></div>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="video" class="home-video-box xm-plain-box J_itemBox J_videoBox is-visible">
                <div class="box-hd">
                    <h2 class="title">视频</h2>
                    <!-- <h2 class="title">今晚滑雪多快乐，我们坐在雪橇上  ︿(￣︶￣)︿</h2> -->
                    <div class="more J_brickNav"><a class="more-link" href="" target="_blank" onclick="">查看全部<i
                                    class="iconfont"></i></a></div>
                </div>
                <div class="box-bd J_brickBd">
                    <ul class="video-list clearfix">
                        <li class="video-item video-item-first">
                            <div class="figure figure-img"><a class="J_videoTrigger exposure" href=""
                                                              data-video="//v.mifile.cn/b2c-mimall-media/dd431020c9e7bb06a89b6959fa91f97d.mp4"
                                                              data-video-poster="//i8.mifile.cn/b2c-mimall-media/64e4e5e97af343c8a016cb04d0cd863b.jpg"
                                                              data-video-title="听雷总讲述小米7年工艺探索之路" title="点击播放视频"
                                                              onclick=""> <img
                                            src="//i3.mifile.cn/a4/xmad_1492588199164_Jykpx.jpg" width="296"
                                            height="180" alt="听雷总讲述小米7年工艺探索之路"> <span class="play"><i
                                                class="iconfont"></i></span> </a></div>
                            <h3 class="title"><a class="J_videoTrigger" href=""
                                                 data-video="//v.mifile.cn/b2c-mimall-media/dd431020c9e7bb06a89b6959fa91f97d.mp4"
                                                 data-video-poster="//i8.mifile.cn/b2c-mimall-media/64e4e5e97af343c8a016cb04d0cd863b.jpg"
                                                 data-video-title="听雷总讲述小米7年工艺探索之路" title="点击播放视频" onclick="">听雷总讲述小米7年工艺探索之路</a>
                            </h3>
                            <p class="desc">小米6，7年工艺探索的巅峰之作</p></li>
                        <li class="video-item">
                            <div class="figure figure-img"><a class="J_videoTrigger exposure" href=""
                                                              data-video="//v.mifile.cn/b2c-mimall-media/5b1095e47091cdb14ba54e0a91479f41.mp4"
                                                              data-video-poster="//cdn.cnbj0.fds.api.mi-img.com/b2c-mimall-media/3cd56d2d96159da2c8dc57a43ff74c86.jpg"
                                                              data-video-title="小米6外观设计视频" title="点击播放视频" onclick="">
                                    <img src="//i3.mifile.cn/a4/xmad_14925882923733_lghaJ.jpg" width="296" height="180"
                                         alt="小米6外观设计视频"> <span class="play"><i class="iconfont"></i></span> </a></div>
                            <h3 class="title"><a class="J_videoTrigger" href=""
                                                 data-video="//v.mifile.cn/b2c-mimall-media/5b1095e47091cdb14ba54e0a91479f41.mp4"
                                                 data-video-poster="//cdn.cnbj0.fds.api.mi-img.com/b2c-mimall-media/3cd56d2d96159da2c8dc57a43ff74c86.jpg"
                                                 data-video-title="小米6外观设计视频" title="点击播放视频" onclick="">小米6外观设计视频</a>
                            </h3>
                            <p class="desc">震惊！小米6竟然如此之美</p></li>
                        <li class="video-item">
                            <div class="figure figure-img"><a class="J_videoTrigger exposure" href=""
                                                              data-video="//v.mifile.cn/b2c-mimall-media/415d1d3d6ff7e60e60234402b9ad3fe9.mp4"
                                                              data-video-poster="//i8.mifile.cn/b2c-mimall-media/7d69e2ca6b9a21792da38d71177094ac.jpg"
                                                              data-video-title="小米电视4 外观设计视频" title="点击播放视频" onclick="">
                                    <img src="//i3.mifile.cn/a4/xmad_14954491368955_oHlMm.jpg" width="296" height="180"
                                         alt="小米电视4 外观设计视频"> <span class="play"><i class="iconfont"></i></span> </a>
                            </div>
                            <h3 class="title"><a class="J_videoTrigger" href=""
                                                 data-video="//v.mifile.cn/b2c-mimall-media/415d1d3d6ff7e60e60234402b9ad3fe9.mp4"
                                                 data-video-poster="//i8.mifile.cn/b2c-mimall-media/7d69e2ca6b9a21792da38d71177094ac.jpg"
                                                 data-video-title="小米电视4 外观设计视频" title="点击播放视频" onclick="">小米电视4
                                    外观设计视频</a></h3>
                            <p class="desc">美哭了！史上最美的小米电视</p></li>
                        <li class="video-item">
                            <div class="figure figure-img"><a class="J_videoTrigger exposure" href=""
                                                              data-video="//v.mifile.cn/b2c-mimall-media/834a34a1308c4214d501df703197847c.mp4"
                                                              data-video-poster="//i8.mifile.cn/b2c-mimall-media/97296b30fd2ee1aabe5d73f44da29149.jpg"
                                                              data-video-title="4.9mm极超薄电视的诞生揭秘" title="点击播放视频"
                                                              onclick=""> <img
                                            src="//i3.mifile.cn/a4/xmad_14954492313573_fOVNG.jpg" width="296"
                                            height="180" alt="4.9mm极超薄电视的诞生揭秘"> <span class="play"><i
                                                class="iconfont"></i></span> </a></div>
                            <h3 class="title"><a class="J_videoTrigger" href=""
                                                 data-video="//v.mifile.cn/b2c-mimall-media/834a34a1308c4214d501df703197847c.mp4"
                                                 data-video-poster="//i8.mifile.cn/b2c-mimall-media/97296b30fd2ee1aabe5d73f44da29149.jpg"
                                                 data-video-title="4.9mm极超薄电视的诞生揭秘" title="点击播放视频" onclick="">4.9mm极超薄电视的诞生揭秘</a>
                            </h3>
                            <p class="desc">小米电视工程师讲述极致之作的背后故事</p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- 主要内容 end -->
    @include('home.public.footer')
@endsection

@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/js/home/index.js') }}?ver=<?php echo time();  ?>"></script>
    <script>
        layui.use(['jquery', 'element', 'layer'], function () {
            var $ = layui.jquery,
                element = layui.element,
                layer = layui.layer;

        });
    </script>
@endsection

