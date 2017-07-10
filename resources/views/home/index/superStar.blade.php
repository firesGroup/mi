<?php
/**
 * File Name: superStar.blade.php
 * Description: 小米明星单品片段
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/28
 * Time: 22:06
 */
?>
<!-- 小米明星单品 start -->
    <div class="home-star-goods xm-carousel-container" id="J_homeStar">
        <div class="xm-plain-box">
            <div class="box-hd">
                <h2 class="title">小米明星单品</h2>
                <div class="more">
                    <div class="xm-controls xm-controls-line-small xm-carousel-controls">
                        <a class="control control-prev iconfont control-disabled" href="javascript: void(0);" ></a>
                        <a class="control control-next iconfont" href="javascript: void(0);"></a>
                    </div>
                </div>
            </div>
            <div class="box-bd">
                <div class="xm-carousel-wrapper">
                    <ul class="xm-carousel-list xm-carousel-col-5-list goods-list rainbow-list clearfix J_carouselList" id="J_carouselList">
                        @foreach($recommended as $k=>$v)
                        <li class="{{'rainbow-item-'.$k}}">
                            <a class="thumb exposure" href="/product/info/{{ $v->id }}" target="_blank"><img class='cacheload' data-url="{{url($v->p_index_image)}}!160_160" alt="{{ $v->p_name }}"></a>
                            <h3 class="title"><a href="/product/info/{{ $v->id }}" target="_blank">{{$v->p_name}}</a></h3>
                            <p class="desc">{{$v->flag}}</p>
                            <p class="price">{{$v->price}}</p>
                        </li>
                    @endforeach
                    </ul></div>
            </div>
        </div>

    </div>
<!-- 小米明星单品 end -->