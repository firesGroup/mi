<?php
/**
 * File Name: recommend.blade.php
 * Description: 首页为您推荐区模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/29
 * Time: 20:54
 */
?>
<div id="recommend" class="home-recm-box home-brick-box home-brick-row-1-box xm-plain-box J_itemBox J_recommendBox is-visible" >
    <div class="box-hd">
        <h2 class="title">为你推荐</h2>
        <div class="more J_brickNav">
            <div class="xm-controls xm-controls-line-small xm-carousel-controls">
                <a class="control control-prev iconfont control-disabled" href="javascript: void(0);"></a>
                <a class="control control-next iconfont" href="javascript: void(0);" ></a>
            </div>
        </div>
    </div>
    <div id="recommend-bd" class="box-bd J_brickBd J_recommend-like container xm-carousel-container">
        <div class="xm-recommend">
            <div class="xm-carousel-wrapper" style="height: 320px; overflow: hidden;">
                <ul class="xm-carousel-col-5-list xm-carousel-list clearfix"  style="width: 4960px; margin-left: 0px; transition: margin-left 0.5s ease;">
                    @foreach($recommen as $v)
                    <li class="J_xm-recommend-list">
                        <dl>
                            <dt>
                                <a href="" data-stat-text="{{$v->p_name}}" target="_blank"
                                   data-stat-aid="{{$v->p_name}}">
                                    <img class="cacheload" src="/images/public/default.gif" data-url="{{$v->p_index_image}}" alt="{{$v->p_name}}">
                                </a>
                            </dt>
                            <dd class="xm-recommend-name">
                                <a href="" data-stat-text="{{$v->p_name}}" target="_blank" data-stat-aid="小米无人机4K版套装" onclick="">{{$v->p_name}}</a>
                            </dd>
                            <dd class="xm-recommend-price">{{$v->price}}元</dd>
                            <dd class="xm-recommend-notice"></dd>
                        </dl>
                    </li>
                    @endforeach
                    </ul></div></div></div>
</div>

