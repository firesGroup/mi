<?php
/**
 * File Name: smart.blade.php
 * Description: 首页智能区模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/29
 * Time: 20:50
 */
?>
<div id="smart" class="home-brick-box home-brick-row-2-box xm-plain-box J_itemBox J_brickBox is-visible loaded" >
    <div class="box-hd">
        <h2 class="title">智能</h2>
        <div class="more J_brickNav">
            <ul class="tab-list J_brickTabSwitch" data-tab-target="smart-content">
                <li class="tab-active">热门</li>
                <li class="">出行</li>
                <li class="">健康</li>
            </ul>
        </div>
    </div>
    <div class="box-bd J_brickBd"><div class="row"><div class="span4 span-first"><ul class="brick-promo-list clearfix"> <li class="brick-item brick-item-m"> <a href="" class="exposure" target="_blank"  onclick=""><img class="cacheload" src="/images/public/default.gif" data-url="//i3.mifile.cn/a4/xmad_14985531398739_lozpr.jpg" width="160" height="160" alt=""></a> </li> <li class="brick-item brick-item-m"> <a href="" class="exposure" target="_blank"  onclick=""><img class="cacheload" src="/images/public/default.gif" data-url="//i3.mifile.cn/a4/xmad_14985534167387_SHfvP.jpg" width="160" height="160" alt=""></a> </li></ul></div><div class="span16">
                <div id="smart-content" class="tab-container">

                    <ul class="brick-list tab-content clearfix tab-content-active J_recommendActive" style="">
                        @for($i=0;$i<=7;$i++)
                        <li class="brick-item brick-item-m" > <div class="figure figure-img"> <a class="exposure" href="{{url('product/info/'.$smart[$i]->id)}}"  target="_blank"   onclick=""><img class="cacheload" src="/images/public/default.gif" data-url="{{url($smart[$i]->p_index_image)}}" width="150" height="150" alt="{{$smart[$i]->p_name}}"></a> </div> <h3 class="title"> <a href="" target="_blank"  onclick="">{{$smart[$i]->p_name}}</a></h3>  <p class="desc">{{$smart[$i]->flag}}</p>  <p class="price"> <span class="num">{{$smart[$i]->price}}</span>元  </p> <p class="rank"></p>  <div class="flag flag-gift">有赠品</div>   </li>
                        @endfor
                    </ul>
                    <ul class="brick-list tab-content clearfix tab-content-hide hide" style="display: none;">
                        @for($i=7;$i<=14;$i++)
                        <li class="brick-item brick-item-m" > <div class="figure figure-img"> <a class="exposure" href="{{url('product/info/'.$smart[$i]->id)}}"  target="_blank"   onclick=""><img class="cacheload" src="/images/public/default.gif" data-url="{{url('product/info/'.$smart[$i]->id)}}" width="150" height="150" alt="{{$smart[$i]->p_name}}"></a> </div> <h3 class="title"> <a href="" target="_blank"  onclick="">{{$smart[$i]->p_name}}</a></h3>  <p class="desc">{{$smart[$i]->flag}}</p>  <p class="price"> <span class="num">{{$smart[$i]->price}}</span>元  </p> <p class="rank"></p>  <div class="flag flag-gift">有赠品</div>   </li>
                          @endfor

                    </ul>
                    <ul class="brick-list tab-content clearfix tab-content-hide hide" style="display: none;">
                        @for($i=14;$i<=21;$i++)
                        <li class="brick-item brick-item-m" > <div class="figure figure-img"> <a class="exposure" href="{{url('product/info/'.$smart[$i]->id)}}"  target="_blank"   onclick=""><img class="cacheload" src="/images/public/default.gif" data-url="{{url($smart[$i]->p_index_image)}}" width="150" height="150" alt="{{$smart[$i]->p_name}}"></a> </div> <h3 class="title"> <a href="" target="_blank"  onclick="">{{$smart[$i]->p_name}}</a></h3>  <p class="desc">{{$smart[$i]->flag}}</p>  <p class="price"> <span class="num">{{$smart[$i]->price}}</span>元  </p> <p class="rank"></p>   <div class="review-wrapper"> <a href="" target="_blank"  onclick=""> <span class="review"></span> <span class="author"> <span class="date" ></span> </span> </a> </div>  </li>
                     @endfor
                    </ul>

                </div>
                  </div>

            </div>
        </div>
    </div>


