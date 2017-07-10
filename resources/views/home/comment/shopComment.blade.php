<?php
/**
 * File Name: shopComment.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/7/9
 * Time: 3:44
 */
?>

@extends('layouts.home')

@section('title','我的订单')

@section('css')
    @parent

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/comment.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/member_center.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/home/shopcomment.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/home/base.css') }}">
@endsection

@section('content')
    @include('home.public.header_top')
    {{--@include('home.public.header_nav')--}}
    <div class="breadcrumbs">
        <div class="container">
            <a href="">首页</a><span class="sep">&gt;</span><span>个人中心</span>    </div>
    </div>

    <div class="page-main user-main">
        <div class="container">
            <div class="row">
                @include('home.member.member_modoul')

                <div class="span16">
                    <div class="uc-box uc-main-box">
                        <div class="uc-content-box">
                            <div class="box-hd">
                                <h1 class="title">商品评价</h1>
                                <div class="more clearfix">
                                    <ul class="filter-list J_addrType">
                                        <li class="first pinjia active">
                                            <a href="javascript:void(0)">待评价商品</a>
                                        </li>
                                        <li class=" ypinjia">
                                            <a href="javascript:void(0)">已评价商品</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-bd">
                                <div class="xm-goods-list-wrap">

                                    {{--已评价--}}
                                    <ul class="xm-goods-list clearfix ycomment" style="display: none;">
                                        @foreach($orderdetail as $v)
                                            @if($v->comment_status == 0)
                                                <li class="xm-goods-item">
                                            <div class="figure figure-img">
                                                <a href="{{ url('/product/info/'.$v->id) }}" target="_blank">
                                                    <img src=""></a>
                                            </div>
                                            <h3 class="title">
                                                <a href="">{{$v->p_name}}</a>
                                            </h3>
                                            <p class="price">{{$v->p_price}}</p>
                                            <p class="rank">1111人评价</p>

                                                @foreach($order as $d)
                                                    @if($d->order_status == 4 && $v->comment_status != 0)
                                            <div class="actions">
                                                <a class="btn btn-small btn-primary comment1 J_payOrder"
                                                   href="javascript:void(0)">立即评价</a>
                                            </div>
                                                    @break
                                                    @else
                                                        <div class="actions">
                                                            <a class="btn btn-small btn-disabled"
                                                               href="javascript:void(0)">已评价</a>
                                                        </div>
                                                        @break
                                                        @endif
                                                @endforeach
                                        </li>
                                            @endif
                                        @endforeach

                                    </ul>

                                    {{--待评价--}}
                                    <ul class="xm-goods-list clearfix dcomment" style="display: block;">
                                        @foreach($orderdetail as $v)
                                            @if($v->comment_status == 1)
                                            <li class="xm-goods-item">
                                                <div class="figure figure-img">
                                                    <a href="{{ url('product/info/'.$v->p_id) }}" target="_blank">
                                                        <img src="!200_200"></a>
                                                </div>
                                                <h3 class="title">
                                                    <a href="">{{$v->p_name}}</a>
                                                </h3>
                                                <p class="price">{{$v->p_price}}</p>
                                                <p class="rank">1111人评价</p>

                                                @foreach($order as $d)
                                                    @if($d->order_status == 4 && $v->comment_status == 1)
                                                        <div class="actions">
                                                            <a class="btn btn-small btn-primary comment1 J_payOrder"
                                                               href="javascript:void(0)">立即评价</a>
                                                            <span  style="display: none;" id="ordersn">{{$v->p_id}}</span>
                                                            <span  style="display: none;" id="memid">{{$d->member_id}}</span>
                                                            <span  style="display: none;" id="detailid">{{$v->order_id}}</span>
                                                        </div>
                                                        @break
                                                    @else
                                                        <div class="actions">
                                                            <a class="btn btn-small btn-disabled"
                                                               href="javascript:void(0)">已评价</a>
                                                        </div>
                                                        @break
                                                    @endif
                                                @endforeach
                                            </li>
                                            @endif
                                        @endforeach

                                    </ul>

                                </div>

                                {{--文本编辑--}}
                                <div style="margin-bottom: 20px; width: 750px;display: none; height: 300px;" class="layuitext">
                                    <form action="{{url('commentshop')}}" method="get">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pid" value="" id="pid">
                                        <input type="hidden" name="mid" value="" id="mid">
                                        <input type="hidden" name="img" value="" id="image">
                                        <input type="hidden" name="oid" value="" id="oid">
                                        <textarea class="layui-textarea" id="demo" name="text"
                                                  style="display: none">
                                                    </textarea>


                                        <button class="layui-btn layui-btn-danger"
                                                style="margin-left: 780px;margin-top: -60px;"
                                                id="submit"  data-type="content">提交</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>



            </div>
        </div>
    </div>


    <div class="modal fade modal-hide comment-modal in" id="J_commentModal" aria-hidden="true" style="display: none;text-align: center;"><a
                class="close" data-dismiss="modal" href="javascript: void(0);">
            <i class="iconfont"></i></a>
        <div class="modal-body">
            <div class="txt"><h2 class="tit">评价成功</h2></div>
            <br>
            <br>
            <a href="" class="btn btn-primary" id="goorder">确定</a>

        </div>

        <div class="modal-backdrop fade in" style="width: 100%; height: 5695px;display: none;"></div>





    @include('home.public.footer')
@endsection


@section('js')
    @parent
<script>

    layui.use(['jquery', 'layer','layedit'], function () {
        var $ = layui.jquery,
            layedit = layui.layedit;
            layer = layui.layer;

        function extra_data(input,data){
            var item=[];
            $.each(data,function(k,v){
                item.push('<input type="hidden" name="'+k+'" value="'+v+'">');
            });
            $(input).after(item.join(''));
        }

        layedit.set({
            uploadImage: {
                url: '{{ url('/commit_upload') }}'
                ,type: 'post' //默认post
                ,dataType: "json"
                ,success:function (data){
                    console.log(parseJSON(data));
                }
            }

        });

        layedit.build('demo');

        layedit.build('id', {
            height: 60 //设置编辑器高度
        });



        $('.J_payOrder').each(function (i){

            $(this).click(function () {

                $('#LAY_demo2').css('display','block');
                $('.layuitext').css('display','block');

                //获取点击的商品id
                var ordersn = $(this).next('span#ordersn').html();
                var mid = $(this).next().next('#memid').text();
                var oid = $(this).next().next().next('#detailid').text();

                //将获取的商品id 写入form里面 传过去
                $('#pid').attr('value',ordersn);

                //将获取的订单详情id 写入form里面 传过去
                $('#oid').attr('value',oid);

                //将获取的会员id 写入form里面 传过去
                $('#mid').attr('value',mid);



            });

        });


        $('.pinjia').on('click',function () {

            $(this).addClass('active');
            $('.ypinjia').removeClass('active');
            $('.dcomment').css('display','block');
            $('.ycomment').css('display','none');

        });


        $('.ypinjia').on('click',function () {

            $(this).addClass('active');
            $('.pinjia').removeClass('active');
            $('.ycomment').css('display','block');
            $('.dcomment').css('display','none');
        });


    });

</script>

    @endsection