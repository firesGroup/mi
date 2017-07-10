<?php
/**
 * File Name: comment.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/29
 * Time: 16:07
 */
?>

@extends('layouts.home')

@section('title','我的订单')

@section('css')
    @parent

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/comment.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/member_center.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/home/order.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/home/orderbase.css') }}">
@endsection

@section('content')
    @include('home.public.header_top')
    @include('home.public.header_nav')


    <div id="J_proHeader">
        <div class="xm-product-box">
            <div class="nav-bar" id="J_headNav">
                <div class="container J_navSwitch"><h2 class="J_proName">{{$shop[0]->p_name}}</h2>
                    <div class="con">
                        <div class="right"><a href="//www.mi.com/max2/" data-stat-id="0d06d9d5f98ac836"
                            >概述</a>
                            <span class="separator">|</span>
                            <a href="//www.mi.com/max2/gallery/" data-stat-id="0294fea29808d50d"
                            >图集</a>
                            <span class="separator">|</span> <a href="//www.mi.com/max2/specs/"
                                                                data-stat-id="04826b3bb4b6eb29"
                            >参数</a>
                            <span class="separator">|</span> <a href="//order.mi.com/queue/f2code" target="_blank"
                                                                data-stat-id="4f2de66f68e4a36e"
                            >F码通道</a>
                            <span class="separator">|</span> <a href="javascript:void(0);" class="cur"
                                                                data-stat-id="63093bcebf4ac2f6"
                            >用户评价</a>
                            <a href="//item.mi.com/product/10000057.html" class="btn btn-small btn-primary"
                               data-stat-id="b0afc07e03997006"
                            >立即购买</a>
                        </div>
                    </div>
                </div>
            </div>
                <div class="xm-product-box nav-bar-hidden " id="J_fixNarBar">
                <div class="nav-bar">
                    <div class="container J_navSwitch">
                        <h2 class="J_proName">{{$shop[0]->p_name}}</h2>
                        <div class="con">

                            <div class="right">
                                <a href="" data-stat-id="">概述</a>
                                <span class="separator">|</span>
                                <a href="">性能</a>
                                <span class="separator">|</span>
                                <a href="">设计</a>
                                <span class="separator">|</span>
                                <a href="">参数</a>
                                <span class="separator">|</span>
                                <a href="">F码通道</a>
                                <span class="separator">|</span>
                                <a href="javascript:void(0);" class="cur">用户评价</a>
                                <a href="" class="btn btn-small btn-primary">立即购买</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="m-comment-wrap h-comment-wrap">
        <div class="container J_commentWrap">
            <div class="m-comment-nav J_nav"><h2>大家认为</h2>
                <div class="nav-box">
                    <a class="item cur" data-profileid="0" href="javascript:;"> 全部 （<span
                                id="allnum">{{$num}}</span>）</a>
                    <a class="item item1" data-profileid="2" href="javascript:;"> 外观漂亮（528） </a>
                    <a class="item item2" data-profileid="9" href="javascript:;"> 值得拥有（341） </a>
                    <a class="item item3" data-profileid="11" href="javascript:;"> 手感很棒（288） </a>
                    <a class="item item4" data-profileid="5" href="javascript:;"> 电池耐用（270） </a>
                    <a class="item item5" data-profileid="10" href="javascript:;"> 快递给力（124） </a>
                </div>
            </div>
            <div class="row">
                <div class="span13 h-comment-main  m-comment-main J_commentCon">
                    <div class="comment-top">
                        <h2 class="m-tit">热门评价</h2>
                        <a class="J_showImg show-img " href="javascript:;" id="remove">
                            <i class="iconfont">√</i> 只显示带图评价
                        </a>
                    </div>
                    <div class="m-comment-box J_commentList">
                        {{--全部图片--}}
                        <ul class="m-comment-list J_listBody ass" style="display: block;">


                            @foreach($data as $v)
                                @if($v->comment_id == null)
                                @if($v->member_id != 4)

                                    <li class="com-item J_resetImgCon J_canZoomBox" data-id="144906250">
                                        <input type="hidden" value="{{$v->id}}" id="commentid">
                                        <input type="hidden" value="{{$v->p_id}}" id="p_id">
                                        <a class="user-img" href="/comment/user?user_id=679923323">
                                            {{--头像--}}
                                            <img src="https://s1.mi-img.com/mfsv2/avatar/s010/p01YK9vgR0Lj/2knbWH5I3lXsA1_90.jpg">
                                        </a>

                                        <div class="comment-info">
                                            <a class="user-name"
                                               href="/comment/user?user_id=679923323">{{ $v->member->nick_name }}</a>
                                            <p class="time">{{$v->created_at}}</p>
                                        </div>

                                        <div class="comment-eval"><i class="iconfont"></i> 超爱</div>

                                        <div class="comment-txt">
                                            <a href="/comment/detail?comment_id=144906250" target="_blank">
                                                {{$v->content}}
                                            </a>
                                        </div>
                                        <!-- 评论图片 -->
                                        @if($v->images != null)
                                        <div class="m-img-list clearfix h-img-list">
                                            {{--这里循环图片--}}

                                            <div class="img-item img-item1  showimg">
                                                <img data-src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg"
                                                     class="J_resetImgItem J_canZoom" data-index="0"
                                                     src="{{$v->images}}"
                                                     data-width="1080" data-height="1920"
                                                     style="width: 160px; margin-top: -62.2222px;">
                                                <div class="loader loader-gray"></div>
                                            </div>

                                        </div>
                                        @endif

                                        <div class="comment-handler">
                                            <a href="javascript:;" data-commentid="144906250" class="J_hasHelp "> <i
                                                        class="iconfont"></i>&nbsp;
                                                <span class="amount">  89 </span>
                                            </a>
                                        </div>
                                        <div class="comment-input">
                                            <input type="text" placeholder="回复楼主"
                                                   class="J_commentAnswerInput replyinput">
                                            <a href="Javascript:;" class="btn  answer-btn J_commentAnswerBtn reply_"
                                               data-commentid="144906250">回复</a>
                                        </div>
                                        @endif



                                        <div class="comment-answer" id="suibian">
                                            @foreach( $data as $value )

                                            @if($v->id == $value->comment_id && $value->type == 2 )
                                                    <div class="answer-item">
                                                        <img class="answer-img" src="//s01.mifile.cn/i/logo.png">
                                                        <div class="answer-content">
                                                            <h3 class="official-name">{{ $value->member->nick_name }}</h3>
                                                            <p> {{$value->content}}
                                                                <a href="javascript:void(0);" class="J_csLike "
                                                                   data-commentid="144906250"> <i class="iconfont"></i>&nbsp;<span
                                                                            class="amount">  158 </span>
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>

                                    </li>
                                    @endif
                                    @endforeach
                        </ul>

                        {{--只显示带图评论--}}
                        <ul class="m-comment-list J_listBody ass1" style="display: none;">
                            @foreach($data as $v)
                                @if($v->images != null)
                                    @if($v->member_id != 4)
                                    <li class="com-item J_resetImgCon J_canZoomBox" data-id="144906250">
                                        <input type="hidden" value="{{$v->id}}" id="commentid">
                                        <input type="hidden" value="{{$v->p_id}}" id="p_id">
                                        <a class="user-img" href="/comment/user?user_id=679923323">
                                            {{--头像--}}
                                            <img src="https://s1.mi-img.com/mfsv2/avatar/s010/p01YK9vgR0Lj/2knbWH5I3lXsA1_90.jpg">
                                        </a>

                                        <div class="comment-info">
                                            <a class="user-name"
                                               href="/comment/user?user_id=679923323">{{ $v->member->nick_name }}</a>
                                            <p class="time">{{$v->created_at}}</p>
                                        </div>

                                        <div class="comment-eval"><i class="iconfont"></i> 超爱</div>

                                        <div class="comment-txt">
                                            <a href="/comment/detail?comment_id=144906250" target="_blank">
                                                {{$v->content}}
                                            </a>
                                        </div>
                                        <!-- 评论图片 -->
                                        <div class="m-img-list clearfix h-img-list">
                                            {{--这里循环图片--}}
                                            <div class="img-item img-item1  showimg">
                                                <img data-src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg"
                                                     class="J_resetImgItem J_canZoom" data-index="0"
                                                     src="//i1.mifile.cn/a2/1498234933_7644320_s729_1296wh.jpg"
                                                     data-width="1080" data-height="1920"
                                                     style="width: 160px; margin-top: -62.2222px;">
                                                <div class="loader loader-gray"></div>
                                            </div>
                                            <div class="img-item img-item1  showimg">
                                                <img data-src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg"
                                                     class="J_resetImgItem J_canZoom" data-index="0"
                                                     src="//i1.mifile.cn/a2/1498234933_7644320_s729_1296wh.jpg"
                                                     data-width="1080" data-height="1920"
                                                     style="width: 160px; margin-top: -62.2222px;">
                                                <div class="loader loader-gray"></div>
                                            </div>
                                            <div class="img-item img-item1  showimg">
                                                <img data-src="//i1.mifile.cn/a2/1498965769_6463408_s720_720wh.jpg"
                                                     class="J_resetImgItem J_canZoom" data-index="0"
                                                     src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg"
                                                     data-width="1080" data-height="1920"
                                                     style="width: 160px; margin-top: -62.2222px;">
                                                <div class="loader loader-gray"></div>
                                            </div>
                                            <div class="img-item img-item1  showimg">
                                                <img data-src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg"
                                                     class="J_resetImgItem J_canZoom" data-index="0"
                                                     src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg"
                                                     data-width="1080" data-height="1920"
                                                     style="width: 160px; margin-top: -62.2222px;">
                                                <div class="loader loader-gray"></div>
                                            </div>


                                            <div class="J_zoomImgList" style="display: none;">
                                                <span data-src="//i1.mifile.cn/a2/1498699087_9622448_s1080_1920wh.jpg"></span>
                                                <span data-src="//i1.mifile.cn/a2/1498699088_1061119_s972_1296wh.jpg"></span>
                                            </div>

                                        </div>

                                        <div class="comment-handler">
                                            <a href="javascript:;" data-commentid="144906250" class="J_hasHelp "> <i
                                                        class="iconfont"></i>&nbsp;
                                                <span class="amount">  89 </span>
                                            </a>
                                        </div>
                                        <div class="comment-input">
                                            <input type="text" placeholder="回复楼主"
                                                   class="J_commentAnswerInput replyinput">
                                            <a href="Javascript:;" class="btn  answer-btn J_commentAnswerBtn reply_"
                                               data-commentid="144906250">回复</a>
                                        </div>
                                        @endif



                                        <div class="comment-answer" id="suibian">
                                            @foreach( $data as $value )

                                                @if($v->id == $value->comment_id && $value->type == 2 )
                                                    <div class="answer-item">
                                                        <img class="answer-img" src="//s01.mifile.cn/i/logo.png">
                                                        <div class="answer-content">
                                                            <h3 class="official-name">{{ $value->member->nick_name }}</h3>
                                                            <p> {{$value->content}}
                                                                <a href="javascript:void(0);" class="J_csLike "
                                                                   data-commentid="144906250"> <i class="iconfont"></i>&nbsp;<span
                                                                            class="amount">  158 </span>
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>

                                        <div class="J_canZoomData">
                                            <div class="h-userInfo" data-username="不爱请远离." data-showtime="星期四"
                                                 data-txt="客服妹子嫁给我吧，我会踩着七色云彩迎娶你的"
                                                 data-avatar="https://s1.mi-img.com/mfsv2/avatar/s010/p01YK9vgR0Lj/2knbWH5I3lXsA1_90.jpg"
                                                 data-upnum="89" data-commentid="144906250"></div>
                                            <div class="h-answerInfo">
                                                <div class="answer-item" data-name="官方回复"
                                                     data-txt="我的意中人是个盖世英雄，有一天 他会五杀摧搭MVP，带我从青铜到荣耀王者~~(✿◡‿◡)感谢您对小米的支持。"
                                                     data-upnum="158" data-office="true"></div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                            @endforeach
                        </ul>

                        <div class="comment-more">
                            <a class="load-more J_loadMore" href="javascript:;" data-stat-id="5a1e4e882c6db2b9"
                               style="display: block;">加载更多</a></div>
                    </div>
                </div>

                <div class="span7 h-comment-fr m-comment-spe">
                    <div class="m-comment-summary J_commentSummary">
                        <div class="num"><p class="percent-num"><span class="m-num">5643</span> 人购买后满意 </p></div>
                        <div class="m-percent-box"><p class="percent" style="width:97.6%;">满意度 97.6%</p></div>
                    </div>
                    <h2 class="m-tit">最新评价</h2>
                    <ul class="m-spe-list J_speList">

                        @foreach($lim as $v)
                            @if($v->type != 2 && $v->elite == 0 )
                                <li class="" data-id="144940948">
                                    <div class="spe-top">
                                <span class="time">
                                    {{$time = $v->created_at}}

                                </span>.
                                        <a class=""
                                           href="/comment/user?user_id=137816676">{{$v->member->nick_name}} </a>
                                    </div>

                                    <div class="txt">
                                        <a href="/comment/detail?comment_id=144940948" target="_blank">
                                            {{$v->content}} </a>
                                    </div>

                                    <div class="comment-handler">
                                        <a href="javascript:void(0);" data-commentid="144940948" class="J_hasHelp ">
                                            <i class="iconfont"></i>&nbsp;<span class="amount hide">  0 </span>
                                        </a>
                                    </div>

                                    <div class="comment-eval"><i class="iconfont"></i> 超爱</div>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                    <a href="javascript:;" class="m-scroll-top J_scrollTop " id="topp"
                    > </a>
                </div>
            </div>
        </div>
    </div>






    <div class="modal fade modal-hide comment-modal in" id="J_commentModal" aria-hidden="true" style="display: none;"><a
                class="close" data-dismiss="modal" href="javascript: void(0);">
            <i class="iconfont"></i></a>
        <div class="modal-body">
            <div class="txt"><h2 class="tit">回复不能为空</h2></div>
            <a href="javascript: void(0);" class="btn btn-primary affirm" data-dismiss="modal">确定</a>
        </div>
    </div>

    <div class="modal2 fade modal-hide comment-modal in" id="bigimg" style="display: none;height: 800px;background-color:
    #808080;margin-top: -400px;">

    </div>

    <div class="modal-backdrop fade in" style="width: 100%; height: 5695px;display: none;"></div>

    @include('home.public.footer')

@endsection

@section('js')
    @parent

    <script>

        layui.use(['jquery', 'layer', 'form'], function () {
            var $ = layui.jquery,
                form = layui.form(),
                layer = layui.layer;
            var index;

            var num = $('#allnum').text();


            var a = $('.reply_');

            var divnum = $('.m-comment-box').children('answer-item');


            $.each(a, function () {
                $(this).click(function () {

                    var t = $(this);

                    //拿到回复内容
                    var input = $(this).siblings().val();

                    var vall = $(this).siblings();

                    //判断不为空
                    if (vall.val() == '') {

                        $('#J_commentModal').css("display", "block");
                        $('.modal-backdrop').css("display", "block");

                        $('.affirm').on('click', function () {

                            $('#J_commentModal').css("display", "none");
                            $('.modal-backdrop').css("display", "none");

                        });
                        $('.iconfont').on('click', function () {

                            $('#J_commentModal').css("display", "none");
                            $('.modal-backdrop').css("display", "none");


                        });


                    } else {

                        //清空文本内容
                        $(this).siblings().val('').focus();

                        //拿到评价ID
                        var cid = $(this).parent().parent().children('#commentid').val();

                        //获取本商品ID
                        var pid = $('#p_id').val();

                        //定义路由
                        var url = '{{url('comment')}}';


                        $.ajax({
                            url: url,
                            type: 'post',
                            data: {'input': input, 'cid': cid, '_token': "{{csrf_token()}}", 'pid': pid},
                            success: function (data) {

                                if (data) {
                                    console.log(data);
                                    var append =
                                        " <div class='comment-answer' id='suibian'>"+
                                        "<div class='answer-item'>" +
                                        "<img class='answer-img' src='//s01.mifile.cn/i/logo.png' style='width: 32px;height: 32px;'>" +
                                        "<div class='answer-content'> " +
                                        "<h3 class='official-name'>" + data.name + "</h3>" +
                                        "<p>" + data.content + "<a href='javascript:void(0);' class='J_csLike 'data-commentid='144906250'> <i class='iconfont'></i>&nbsp;<spanclass='amount'>  158 </span> </a> " +
                                        "</p> " +
                                        "</div> " +
                                        "</div> " +
                                        "</div>";

                                    t.parent().next('.comment-answer').after(append);
                                    form.render();

                                }
                            }

                        });

                    }

                });


            });






            //点击图片放大 把图片给到另一个DIV
            $('.J_resetImgItem').on('click', function () {

                var src = $(this).attr('src');

                $('.modal-backdrop').css('display','block');
                    imgSrc = "<img src='"+src+"' alt='' style='width: 440px;height: 700px;' id='daimg' />";


                $('#bigimg').css('display','block').html(imgSrc);
//                    $('#bigimg').html(imgSrc);
            });


            //点击图片 隐藏
            $('.modal-backdrop,#bigimg').on('click',function () {

                $('#bigimg').css('display','none');
                $('.modal-backdrop').css('display','none');

            });


            //点击'只显示带图评价样式'
            $('.J_showImg').on('click', function () {

                var ifclass = $(this).hasClass('cur');



                    if(ifclass){

                        $(this).removeClass("cur");
                        $('.ass1').css('display','none');
                        $('.ass').css('display','block');
                    } else {
                        $(this).addClass("cur");
                        $('.ass').css('display','none');
                        $('.ass1').css('display','block');

                    }
            });


            //点击回到顶部
            $('#topp').on('click', function () {
                var speed = 200;//滑动的速度
                $('body,html').animate({scrollTop: 0}, speed);
                return false;
            });

            //跟随鼠标滚动
            $(document).ready(function () {
                $(window).scroll(function () {
                    if ($(window).scrollTop() == 400) {

                        $('#J_fixNarBar').addClass('nav_fix');
                    }
                    if($(window).scrollTop() < 400) {

                        $('#J_fixNarBar').removeClass('nav_fix');

                    }


                    if($(window).scrollTop() >300){

                        $('#topp').addClass('hidden fixed');

                    }else{

                        $('#topp').removeClass('hidden fixed');

                    }

                });
            });


        });


    </script>

@endsection
