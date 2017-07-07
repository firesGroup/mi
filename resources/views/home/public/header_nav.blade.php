<?php
/**
 * File Name: header_nav.blade.php
 * Description: 公共头部导航片段
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/28
 * Time: 14:13
 */
?>
<!-- 头部导航 start -->
    <div class="site-header">
        <div class="container">
            <div class="header-logo">
                <a class="logo ir" href="/" title="小米官网">小米官网</a>
                <!--广告位-->
                <div class="doodle" style="display: block;">
                    <!-- 里面是示例广告 start-->
                    <a class="link-block ad2" style="" href=""  target="_blank"></a>
                    <!-- 里面是示例广告 end-->
                </div>
            </div>
            <div class="header-nav">
                <ul class="nav-list J_navMainList clearfix">
                    <li id="J_navCategory" class="nav-category">
                        <a class="link-category" href="">
                            <span class="text">全部商品分类</span></a>
                        <div class="site-category">
                            <ul id="J_categoryList" class="site-category-list clearfix">
                                <li class="category-item">
                                    <a class="title" href=""  >
                                        手机 电话卡<i class="iconfont"></i>
                                    </a>
                                    <div class="children clearfix children-col-{{ ceil(count($header_nav_port['mobile'])/6) }}">
                                        @for( $i=0;$i < ceil(count($header_nav_port['mobile'])/6); $i++)
                                            <ul class="children-list children-list-col children-list-col-{{ ($i+1) }}">
                                                @foreach($header_nav_port['mobile'] as $key => $v  )
                                                    @for( $k=$i*6;$k<($i+1)*6;$k++ )
                                                        @if( $k == $key )
                                                            <li class="star-goods">
                                                                <a class="link" href="{{ url('/product/info/'.$v->id) }}" >
                                                                    <img class="thumb" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!55_40" width="55" height="40" alt="{{ $v->p_name }}">
                                                                    <span class="text" style="text-overflow-ellipsis: 1em">{{ $v->p_name }}</span>
                                                                </a>
                                                                <a class="btn btn-line-primary btn-small btn-buy" href="{{ url('/product/info/'.$v->id) }}" >选购</a>
                                                            </li>
                                                        @else
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            </ul>
                                        @endfor
                                    </div>
                                </li>
                                <li class="category-item">
                                    <a class="title" href=""  >
                                        笔记本 平板
                                        <i class="iconfont"></i>
                                    </a>
                                    <div class="children clearfix children-col-{{ ceil(count($header_nav_port['computer'])/6) }}">
                                        @for( $i=0;$i < ceil(count($header_nav_port['computer'])/6); $i++)
                                            <ul class="children-list children-list-col children-list-col-{{ ($i+1) }}">
                                                @foreach($header_nav_port['computer'] as $key => $v  )
                                                    @for( $k=$i*6;$k<($i+1)*6;$k++ )
                                                        @if( $k == $key )
                                                            <li class="star-goods">
                                                                <a class="link" href="{{ url('/product/info/'.$v->id) }}" >
                                                                    <img class="thumb" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!55_40" width="55" height="40" alt="{{ $v->p_name }}">
                                                                    <span class="text" style="text-overflow-ellipsis: 1em">{{ $v->p_name }}</span>
                                                                </a>
                                                                <a class="btn btn-line-primary btn-small btn-buy" href="{{ url('/product/info/'.$v->id) }}" >选购</a>
                                                            </li>
                                                        @else
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            </ul>
                                        @endfor
                                    </div>
                                </li>
                                <li class="category-item">
                                    <a class="title" href="">
                                        电视 盒子
                                        <i class="iconfont"></i>
                                    </a>
                                    <div class="children clearfix children-col-{{ ceil(count($header_nav_port['dianshi'])/6) }}">
                                        @for( $i=0;$i < ceil(count($header_nav_port['dianshi'])/6); $i++)
                                            <ul class="children-list children-list-col children-list-col-{{ ($i+1) }}">
                                                @foreach($header_nav_port['dianshi'] as $key => $v  )
                                                    @for( $k=$i*6;$k<($i+1)*6;$k++ )
                                                        @if( $k == $key )
                                                            <li>
                                                                <a class="link" href="{{ url('/product/info/'.$v->id) }}" >
                                                                    <img class="thumb" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!55_40" width="55" height="40" alt="{{ $v->p_name }}">
                                                                    <span class="text" style="text-overflow-ellipsis: 1em">{{ $v->p_name }}</span>
                                                                </a>
                                                            </li>
                                                        @else
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            </ul>
                                        @endfor
                                    </div>
                                </li>
                                <li class="category-item">
                                    <a class="title" href="">
                                        路由器 智能硬件
                                        <i class="iconfont"></i>
                                    </a>
                                    <div class="children clearfix children-col-{{ ceil(count($header_nav_port['zhineng'])/6) }}">
                                        @for( $i=0;$i < ceil(count($header_nav_port['zhineng'])/6); $i++)
                                            <ul class="children-list children-list-col children-list-col-{{ ($i+1) }}">
                                                @foreach($header_nav_port['zhineng'] as $key => $v  )
                                                    @for( $k=$i*6;$k<($i+1)*6;$k++ )
                                                        @if( $k == $key )
                                                            <li>
                                                                <a class="link" href="{{ url('/product/info/'.$v->id) }}" >
                                                                    <img class="thumb" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!55_40" width="55" height="40" alt="{{ $v->p_name }}">
                                                                    <span class="text" style="text-overflow-ellipsis: 1em">{{ $v->p_name }}</span>
                                                                </a>
                                                            </li>
                                                        @else
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            </ul>
                                        @endfor
                                    </div>
                                </li>
                                <li class="category-item">
                                    <a class="title" href="">
                                        移动电源 电池 插线板
                                        <i class="iconfont"></i>
                                    </a>
                                    <div class="children clearfix children-col-{{ ceil(count($header_nav_port['dianyuan'])/6) }}">
                                    @for( $i=0;$i < ceil(count($header_nav_port['dianyuan'])/6); $i++)
                                        <ul class="children-list children-list-col children-list-col-{{ ($i+1) }}">
                                            @foreach($header_nav_port['dianyuan'] as $key => $v  )
                                                @for( $k=$i*6;$k<($i+1)*6;$k++ )
                                                    @if( $k == $key )
                                                        <li>
                                                            <a class="link" href="{{ url('/product/info/'.$v->id) }}" >
                                                                <img class="thumb" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!55_40" width="55" height="40" alt="{{ $v->p_name }}">
                                                                <span class="text" style="text-overflow-ellipsis: 1em">{{ $v->p_name }}</span>
                                                            </a>
                                                        </li>
                                                    @else
                                                    @endif
                                                @endfor
                                            @endforeach
                                        </ul>
                                    @endfor
                                    </div>
                                </li>
                                <li class="category-item">
                                    <a class="title" href="">
                                        耳机 音箱
                                        <i class="iconfont"></i>
                                    </a>
                                    <div class="children clearfix children-col-{{ ceil(count($header_nav_port['yinxiang'])/6) }}">
                                        @for( $i=0;$i < ceil(count($header_nav_port['yinxiang'])/6); $i++)
                                            <ul class="children-list children-list-col children-list-col-{{ ($i+1) }}">
                                                @foreach($header_nav_port['yinxiang'] as $key => $v  )
                                                    @for( $k=$i*6;$k<($i+1)*6;$k++ )
                                                        @if( $k == $key )
                                                            <li>
                                                                <a class="link" href="{{ url('/product/info/'.$v->id) }}" >
                                                                    <img class="thumb" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!55_40" width="55" height="40" alt="{{ $v->p_name }}">
                                                                    <span class="text" style="text-overflow-ellipsis: 1em">{{ $v->p_name }}</span>
                                                                </a>
                                                            </li>
                                                        @else
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            </ul>
                                        @endfor
                                    </div>
                                </li>
                                <li class="category-item">
                                    <a class="title" href="">
                                        保护套 贴膜
                                        <i class="iconfont"></i>
                                    </a>
                                    <div class="children clearfix children-col-{{ ceil(count($header_nav_port['tiemo'])/6) }}">
                                        @for( $i=0;$i < ceil(count($header_nav_port['tiemo'])/6); $i++)
                                            <ul class="children-list children-list-col children-list-col-{{ ($i+1) }}">
                                                @foreach($header_nav_port['tiemo'] as $key => $v  )
                                                    @for( $k=$i*6;$k<($i+1)*6;$k++ )
                                                        @if( $k == $key )
                                                            <li>
                                                                <a class="link" href="{{ url('/product/info/'.$v->id) }}" >
                                                                    <img class="thumb" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!55_40" width="55" height="40" alt="{{ $v->p_name }}">
                                                                    <span class="text" style="text-overflow-ellipsis: 1em">{{ $v->p_name }}</span>
                                                                </a>
                                                            </li>
                                                        @else
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            </ul>
                                        @endfor
                                    </div>
                                </li>
                                <li class="category-item">
                                    <a class="title" href="">
                                        线材 支架 存储卡
                                        <i class="iconfont"></i>
                                    </a>
                                    <div class="children clearfix children-col-{{ ceil(count($header_nav_port['xiancai'])/6) }}">
                                        @for( $i=0;$i < ceil(count($header_nav_port['xiancai'])/6); $i++)
                                            <ul class="children-list children-list-col children-list-col-{{ ($i+1) }}">
                                                @foreach($header_nav_port['xiancai'] as $key => $v  )
                                                    @for( $k=$i*6;$k<($i+1)*6;$k++ )
                                                        @if( $k == $key )
                                                            <li>
                                                                <a class="link" href="{{ url('/product/info/'.$v->id) }}" >
                                                                    <img class="thumb" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!55_40" width="55" height="40" alt="{{ $v->p_name }}">
                                                                    <span class="text" style="text-overflow-ellipsis: 1em">{{ $v->p_name }}</span>
                                                                </a>
                                                            </li>
                                                        @else
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            </ul>
                                        @endfor
                                    </div>
                                </li>
                                <li class="category-item">
                                    <a class="title" href="">
                                        箱包 服饰 鞋 眼镜
                                        <i class="iconfont"></i>
                                    </a>
                                    <div class="children clearfix children-col-{{ ceil(count($header_nav_port['fushi'])/6) }}">
                                        @for( $i=0;$i < ceil(count($header_nav_port['fushi'])/6); $i++)
                                            <ul class="children-list children-list-col children-list-col-{{ ($i+1) }}">
                                                @foreach($header_nav_port['fushi'] as $key => $v  )
                                                    @for( $k=$i*6;$k<($i+1)*6;$k++ )
                                                        @if( $k == $key )
                                                            <li>
                                                                <a class="link" href="{{ url('/product/info/'.$v->id) }}" >
                                                                    <img class="thumb" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!55_40" width="55" height="40" alt="{{ $v->p_name }}">
                                                                    <span class="text" style="text-overflow-ellipsis: 1em">{{ $v->p_name }}</span>
                                                                </a>
                                                            </li>
                                                        @else
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            </ul>
                                        @endfor
                                    </div>
                                </li>
                                <li class="category-item">
                                    <a class="title" href="">
                                        米兔 生活周边
                                        <i class="iconfont"></i>
                                    </a>
                                    <div class="children clearfix children-col-{{ ceil(count($header_nav_port['zhoubian'])/6) }}">
                                        @for( $i=0;$i < ceil(count($header_nav_port['zhoubian'])/6); $i++)
                                            <ul class="children-list children-list-col children-list-col-{{ ($i+1) }}">
                                                @foreach($header_nav_port['zhoubian'] as $key => $v  )
                                                    @for( $k=$i*6;$k<($i+1)*6;$k++ )
                                                        @if( $k == $key )
                                                            <li>
                                                                <a class="link" href="{{ url('/product/info/'.$v->id) }}" >
                                                                    <img class="thumb" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!55_40" width="55" height="40" alt="{{ $v->p_name }}">
                                                                    <span class="text" style="text-overflow-ellipsis: 1em">{{ $v->p_name }}</span>
                                                                </a>
                                                            </li>
                                                        @else
                                                        @endif
                                                    @endfor
                                                @endforeach
                                            </ul>
                                        @endfor
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="link" href="javascript: void(0);"><span class="text">小米手机</span><span class="arrow"></span></a>
                        <div class="item-children">
                            <div class="container">
                                <ul class="children-list clearfix">
                                    @foreach( $header_nav['xiaomi'] as $k=>$v )
                                        @if( $k == 0 )
                                            <li class="first">
                                        @else
                                            <li>
                                        @endif
                                            <div class="figure figure-thumb">
                                                <a href="{{ url('/product/info/'.$v->id) }}">
                                                    <img class="nav_img_load" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!160_110" alt="{{ $v->p_name }}"/>
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="{{ url('/product/info/'.$v->id) }}">{{ $v->p_name }}</a>
                                            </div>
                                            <p class="price">{{ $v->price }}元起</p>
                                            @if( $v->flag )
                                                <div class="flags">
                                                    <div class="flag">{{ $v->flag }}</div>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="link" href="javascript: void(0);"><span class="text">红米</span><span class="arrow"></span></a>
                        <div class="item-children">
                            <div class="container">
                                <ul class="children-list clearfix">
                                    @foreach( $header_nav['hongmi'] as $k=>$v )
                                        @if( $k == 0 )
                                            <li class="first">
                                        @else
                                        <li>
                                            @endif
                                            <div class="figure figure-thumb">
                                                <a href="{{ url('/product/info/'.$v->id) }}">
                                                    <img class="nav_img_load" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!160_110"   alt="{{ $v->p_name }}" />
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="{{ url('/product/info/'.$v->id) }}">{{ $v->p_name }}</a>
                                            </div>
                                            <p class="price">{{ $v->price }}元起</p>
                                            @if( $v->flag )
                                                <div class="flags">
                                                    <div class="flag">{{ $v->flag }}</div>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="link" href="javascript: void(0);"><span class="text">平板 · 笔记本</span><span class="arrow"></span></a>
                        <div class="item-children">
                            <div class="container">
                                <ul class="children-list clearfix">
                                    @foreach( $header_nav['pingban'] as $k=>$v )
                                        @if( $k == 0 )
                                            <li class="first">
                                        @else
                                        <li>
                                            @endif
                                            <div class="figure figure-thumb">
                                                <a href="{{ url('/product/info/'.$v->id) }}">
                                                    <img class="nav_img_load" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!160_110"   alt="{{ $v->p_name }}" />
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="{{ url('/product/info/'.$v->id) }}">{{ $v->p_name }}</a>
                                            </div>
                                            <p class="price">{{ $v->price }}元起</p>
                                            @if( $v->flag )
                                                <div class="flags">
                                                    <div class="flag">{{ $v->flag }}</div>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="link" href="javascript: void(0);"><span class="text">电视</span><span class="arrow"></span></a>
                        <div class="item-children">
                            <div class="container">
                                <ul class="children-list clearfix">
                                    @foreach( $header_nav['dianshi'] as $k=>$v )
                                        @if( $k == 0 )
                                            <li class="first">
                                        @else
                                            <li>
                                                @endif
                                                <div class="figure figure-thumb">
                                                    <a href="{{ url('/product/info/'.$v->id) }}">
                                                        <img class="nav_img_load" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!160_110"   alt="{{ $v->p_name }}" />
                                                    </a>
                                                </div>
                                                <div class="title">
                                                    <a href="{{ url('/product/info/'.$v->id) }}">{{ $v->p_name }}</a>
                                                </div>
                                                <p class="price">{{ $v->price }}元起</p>
                                                @if( $v->flag )
                                                    <div class="flags">
                                                        <div class="flag">{{ $v->flag }}</div>
                                                    </div>
                                                @endif
                                            </li>
                                            @endforeach
                                    <li>
                                        <div class="figure figure-thumb">
                                            <a href="//www.mi.com/buytv/"><img src="/images/public/default.gif" data-url="/images/home/dianshi.png" width="160" height="110"   alt="查看全部<br/>小米电视" /></a>
                                        </div>
                                        <div class="title"><a href="//www.mi.com/buytv/">查看全部<br/>小米电视</a></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="link" href="javascript: void(0);"><span class="text">盒子 · 影音</span><span class="arrow"></span></a>
                        <div class="item-children">
                            <div class="container">
                                <ul class="children-list clearfix">
                                    @foreach( $header_nav['hezi'] as $k=>$v )
                                        @if( $k == 0 )
                                            <li class="first">
                                        @else
                                            <li>
                                        @endif
                                            <div class="figure figure-thumb">
                                                <a href="{{ url('/product/info/'.$v->id) }}">
                                                    <img class="nav_img_load" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!160_110"   alt="{{ $v->p_name }}" />
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="{{ url('/product/info/'.$v->id) }}">{{ $v->p_name }}</a>
                                            </div>
                                            <p class="price">{{ $v->price }}元起</p>
                                            @if( $v->flag )
                                                <div class="flags">
                                                    <div class="flag">{{ $v->flag }}</div>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="link" href="javascript: void(0);"><span class="text">路由器</span><span class="arrow"></span></a>
                        <div class="item-children">
                            <div class="container">
                                <ul class="children-list clearfix">
                                    @foreach( $header_nav['luyou'] as $k=>$v )
                                        @if( $k == 0 )
                                            <li class="first">
                                        @else
                                            <li>
                                        @endif
                                            <div class="figure figure-thumb">
                                                <a href="{{ url('/product/info/'.$v->id) }}">
                                                    <img class="nav_img_load" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!160_110"   alt="{{ $v->p_name }}" />
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="{{ url('/product/info/'.$v->id) }}">{{ $v->p_name }}</a>
                                            </div>
                                            <p class="price">{{ $v->price }}元起</p>
                                            @if( $v->flag )
                                                <div class="flags">
                                                    <div class="flag">{{ $v->flag }}</div>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="link" href="javascript:void(0);"><span class="text">智能硬件</span><span class="arrow"></span></a>
                        <div class="item-children">
                            <div class="container">
                                <ul class="children-list clearfix">
                                    @foreach( $header_nav['zhineng'] as $k=>$v )
                                        @if( $k == 0 )
                                            <li class="first">
                                        @else
                                            <li>
                                        @endif
                                            <div class="figure figure-thumb">
                                                <a href="{{ url('/product/info/'.$v->id) }}">
                                                    <img class="nav_img_load" src="/images/public/default.gif" data-url="{{ $v->p_index_image }}!160_110"   alt="{{ $v->p_name }}" />
                                                </a>
                                            </div>
                                            <div class="title">
                                                <a href="{{ url('/product/info/'.$v->id) }}">{{ $v->p_name }}</a>
                                            </div>
                                            <p class="price">{{ $v->price }}元起</p>
                                            @if( $v->flag )
                                                <div class="flags">
                                                    <div class="flag">{{ $v->flag }}</div>
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a  class="link" href="" target="_blank"><span class="text">服务</span></a>
                    </li>
                    <li class="nav-item">
                        <a rel="nofollow" class="link" href="" target="_blank"><span class="text">社区</span></a>
                    </li>
                </ul>
            </div>
            <div class="header-search">
                <form id="J_searchForm" class="search-form clearfix" action="/search" method="get">
                    <label for="search" class="hide">站内搜索</label>
                    @if( isset($cid) && $cid != 0 )
                        <input value="{{ $cid }}" type="hidden" name="cid">
                    @endif
                    <input value="{{ isset($word)?$word:'' }}" class="search-text" type="search" id="search" name="keyword" autocomplete="off" data-search-config="{'defaultWords':[{'Key':'小米6','Rst':7},{'Key':'红米Note&nbsp;4X','Rst':8},{'Key':'小米MIX','Rst':1},{'Key':'小米Max2','Rst':3},{'Key':'小米手机5c','Rst':3},{'Key':'手环','Rst':6},{'Key':'耳机','Rst':19},{'Key':'充电宝','Rst':19},{'Key':'运动鞋','Rst':2},{'Key':'路由器','Rst':17},{'Key':'小米盒子','Rst':8}]}" />
                    <input type="submit" class="search-btn iconfont" value="&#xe616;" />
                    <div class="search-hot-words">
                        <a href="https://item.mi.com/product/10000031.html">红米4X</a>
                        <a href="https://www.mi.com/scooter/">平衡车</a>
                    </div>
                    <div id="J_keywordList" class="keyword-list hide">
                        <ul class="result-list">
                            <li data-key="小米6">
                                <a href="//search.mi.com/search_%E5%B0%8F%E7%B1%B36">
                                    小米6
                                    <span class="result">约有7件</span>
                                </a>
                            </li>
                            <li data-key="红米Note&nbsp;4X">
                                <a href="//search.mi.com/search_%E7%BA%A2%E7%B1%B3Note%C2%A04X">
                                    红米Note&nbsp;4X
                                    <span class="result">
                                        约有8件
                                    </span>
                                </a>
                            </li>
                            <li data-key="小米MIX">
                                <a href="//search.mi.com/search_%E5%B0%8F%E7%B1%B3MIX">小米MIX
                                    <span class="result">约有1件</span>
                                </a>
                            </li>
                            <li data-key="小米Max2">
                                <a href="//search.mi.com/search_%E5%B0%8F%E7%B1%B3Max2">小米Max2
                                    <span class="result">约有3件</span></a></li>
                            <li data-key="小米手机5c"><a href="//search..com/search_%E5%B0%8F%E7%B1%B3%E6%89%8B%E6%9C%BA5c">小米手机5c
                                    <span class="result">约有3件</span></a>
                            </li>
                            <li data-key="手环">
                                <a href="//search.mi.com/search_%E6%89%8B%E7%8E%AF">手环
                                    <span class="result">约有6件</span>
                                </a>
                            </li>
                            <li data-key="耳机">
                                <a href="//search.mi.com/search_%E8%80%B3%E6%9C%BA">耳机
                                    <span class="result">约有19件</span>
                                </a>
                            </li>
                            <li data-key="充电宝"><a href="//search.mi.com/search_%E5%85%85%E7%94%B5%E5%AE%9D">充电宝<span
                                            class="result">约有19件</span></a></li>
                            <li data-key="运动鞋"><a href="//search.mi.com/search_%E8%BF%90%E5%8A%A8%E9%9E%8B">运动鞋<span
                                            class="result">约有2件</span></a></li>
                            <li data-key="路由器"><a href="//search.mi.com/search_%E8%B7%AF%E7%94%B1%E5%99%A8">路由器<span
                                            class="result">约有17件</span></a></li>
                            <li data-key="小米盒子"><a href="//search.mi.com/search_%E5%B0%8F%E7%B1%B3%E7%9B%92%E5%AD%90">小米盒子<span
                                            class="result">约有8件</span></a></li>
                        </ul>
                    </div>

                </form>
            </div>
        </div>
        <div id="J_navMenu" class="header-nav-menu header-nav-menu-active" style="display: none;"></div>
    </div>
<!-- 头部导航 end -->
