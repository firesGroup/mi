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

@extends('layouts.commentHead')

@section('title','')

@section('css')
    @parent
@endsection

@section('content')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/comment.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/global.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/font.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/common.css') }}">


    <div class="head">
        <div class="container">

            <h2 class="name">{{$shop[0]->p_name}}</h2>

            <div class="right">
                <a href="">概述</a>
                &nbsp;
                <span class="span">|</span>&nbsp;
                <a href="">艺术与设计</a>&nbsp;
                <span class="span">|</span>&nbsp;
                <a href="">参数</a>&nbsp;
                <span class="span">|</span>&nbsp;
                <a href="">F码通道</a>&nbsp;
                <span class="span">|</span>&nbsp;
                <a href="">用户评价</a> &nbsp;
                &nbsp;
                <a href="" class="btn pay">立即购买</a>
            </div>
        </div>
    </div>

    <br>
    <div class="comt">
        <div class="comment-nav">

            <div class="commenthead">

                <h2 class="da">大家认为</h2>

                <div class="nav-box">
                    <a href="" class="a a1">全部 <span>( {{$num}} )</span></a>
                    <a href="" class="a">值得拥有</a>
                    <a href="" class="a">外观漂亮</a>
                    <a href="" class="a">手感很棒</a>
                    <a href="" class="a">快递给力</a>
                    <a href="" class="a">速度很快</a>
                </div>
            </div>



                <div class="h2a">
                    <h2 class="remen">热门评价</h2>
                    <a href="#" class="show">只显示带图评价</a>
                </div>
                {{--{{dd($data)}}--}}

            @foreach($data as $v)
                @if(($v->type) != 2 )
                <div class="content">

                <div class="pinlun">

                    {{--<ul>--}}
                        <a href="" class="avatar"><img src="" alt="" class="img"></a>

                        {{--<li class="li">--}}
                            <div class="username">
                                <span>用户名</span>
                                <div class="time">{{$v->created_at}}</div>
                            </div>

                            <div class="commentcontent">
                                <h2>{{$v->content}}</h2>
                            </div>

                            <div class="price">
                                <img src="" alt="" class="commentimg">
                            </div>

                            <div class="zan">
                                <p>大拇指</p>
                            </div>

                            <div class="input">
                                <input type="text" placeholder="回复楼主" class="huifu"><a href="" class="hf">回复</a>
                            </div>
@endif
                            @if(($v->type) == 2)
                            {{--回复--}}
                            <div class="official">
                                <img class="answer-img" src="//s01.mifile.cn/i/logo.png">
                                <div class="ti">
                                    <h3 class="h3f">官方回复</h3>
                                    <p>{{$v->content}}</p>
                                </div>
                            </div>

                        {{--</li>--}}
                    {{--</ul>--}}

                </div>

            </div>
@endif
            @endforeach

            {{--右边--}}
            <div class="rightt">

                <div class="num">
                    <div class="rightone">
                        <span class="renshu">23167</span><span class="status">人购买后满意</span>
                    </div>

                    <div class="plan">
                        <div class="tiao">
                            <p class="planman">满意度 98.2%</p>
                        </div>
                    </div>
                </div>


                <h3 class="newp">最新评论</h3>

                {{--{{dd($limit)}}--}}
                @foreach($lim as $m)
                    @if(($m->type) != 2)
                <div class="newcomment">

                        <ul>
                            <li>
                                <div class="commentall">

                                    <div class="huitime">
                                        <span class="huise">14分钟前 --  </span>
                                    </div>

                                    <div class="ncomment">
                                        <span>帮老师买的,应该不错{{$m->content}}</span>
                                    </div>

                                    <div class="muzhi">
                                        <span>大拇指</span>
                                    </div>

                                    <br>
                                    <br>
                                    <hr>


                                </div>

                            </li>

                        </ul>

                </div>
                    @endif
                    @endforeach
            </div>

        </div>
    </div>

@endsection


