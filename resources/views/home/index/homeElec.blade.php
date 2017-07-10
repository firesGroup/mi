<?php
/**
 * File Name: homeElec.blade.php
 * Description: 首页家电区模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/29
 * Time: 20:49
 */
?>
<div id="homeelec" class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded">
    <div class="box-hd">
        <h2 class="title">家电</h2>
        <div class="more J_brickNav">
            <ul class="tab-list J_brickTabSwitch" data-tab-target="homeelec-content">
                <li class="tab-active">热门</li>
                <li class="">电视</li>
                <li class="">电脑</li>
            </ul>
        </div>
    </div>
    <div class="box-bd J_brickBd">
        <div class="row">
            <div class="span4 span-first">
                <ul class="brick-promo-list clearfix">
                    <li class="brick-item brick-item-l">
                        <a href="" class="exposure" target="_blank" onclick=""><img class="cacheload"
                                                                                    src="/images/public/default.gif"
                                                                                    data-url="//i3.mifile.cn/a4/xmad_14985509176175_GZPwv.jpg"
                                                                                    width="160" height="160" alt=""></a>
                    </li>
                </ul>
            </div>
            <div class="span16">
                <div id="homeelec-content" class="tab-container">
                    <ul class="brick-list tab-content clearfix tab-content-active J_recommendActive" style="">
                        @for($i=0; $i<8; $i++)
                            <li class="brick-item brick-item-m">
                                <div class="figure figure-img"><a class="exposure" href="{{url('product/info/'.$homeElec[$i]->id)}}" target="_blank"
                            onclick=""><img class="cacheload" src="/images/public/default.gif" data-url="{{url($homeElec[$i]->p_index_image)}}!150_150" width="150" height="150" alt="{{$homeElec[$i]->p_name}}"></a>
                                </div>
                                <h3 class="title"><a href="" target="_blank" onclick="">{{$homeElec[$i]->p_name}}</a>
                                </h3>
                                <p class="desc">{{$homeElec[$i]->flag}}</p>
                                <p class="price"><span class="num">{{$homeElec[$i]->price}}</span>元 </p>
                                <p class="rank"></p>
                            </li>
                        @endfor
                    </ul>

                    <ul class="brick-list tab-content clearfix tab-content-hide hide" style="display: none;">
                        @foreach($television as $v)
                            <li class="brick-item brick-item-m">
                                <div class="figure figure-img"><a class="exposure" href="{{url('product/info/'.$v->id)}}" target="_blank"
                                                                  onclick=""><img class="cacheload"
                                                                                  src="/images/public/default.gif"
                                                                                  data-url="{{$v->p_index_image}}!150_150"
                                                                                  width="150" height="150"
                                                                                  alt="{{$v->p_name}}"></a></div>
                                <h3 class="title"><a href="" target="_blank" onclick="">{{$v->p_name}}</a></h3>
                                <p class="desc">{{$v->flag}}</p>
                                <p class="price"><span class="num">{{$v->price}}</span>元 </p>
                                <p class="rank"></p>
                                <div class="flag flag-saleoff"> 享9.2折</div>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="brick-list tab-content clearfix tab-content-hide hide" style="display: none;">
                        @for($i=8;$i<16;$i++)
                            <li class="brick-item brick-item-m">
                                <div class="figure figure-img"><a class="exposure" href="{{url('product/info/'.$homeElec[$i]->id)}}" target="_blank"
                                                                  onclick=""><img class="cacheload"
                                                                                  src="/images/public/default.gif"
                                                                                  data-url="{{url($homeElec[$i]->p_index_image)}}!150_150"
                                                                                  width="150" height="150"
                                                                                  alt="{{$homeElec[$i]->p_name}}"></a>
                                </div>
                                <h3 class="title"><a href="" target="_blank" onclick="">{{$homeElec[$i]->p_name}}</a>
                                </h3>
                                <p class="desc">{{$homeElec[$i]->flag}}</p>
                                <p class="price"><span class="num">{{$homeElec[$i]->price}}</span>元 </p>
                                <p class="rank"></p>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
