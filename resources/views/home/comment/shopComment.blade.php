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
                                        <li class="first"><a href="">待评价商品</a></li>
                                        <li><a href="">已评价商品</a></li>
                                        <li class="active"><a href="">评价失效商品</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="box-bd">
                                <div class="xm-goods-list-wrap">
                                    <ul class="xm-goods-list clearfix">
                                        @foreach($orderdetail as $v)
                                        <li class="xm-goods-item">
                                            <div class="figure figure-img">
                                                <a href="" target="_blank">
                                                    <img src="//i1.mifile.cn/a1/T1ycK_BjYv1RXrhCrK!200x200.jpg"></a>
                                            </div>
                                            <h3 class="title">
                                                <a href="">{{$v->p_name}}</a>
                                            </h3>
                                            <p class="price">{{$v->p_price}}</p>
                                            <p class="rank">1111人评价</p>

                                                @foreach($data as $d)
                                                    @if($d->order_status == 1)
                                            <div class="actions">
                                                <a class="btn btn-small btn-primary comment1 J_payOrder"
                                                   href="javascript:void(0)">立即评价</a>
                                                <span  style="display: none;" id="ordersn">{{$v->p_id}}</span>
                                                <span  style="display: none;" id="memid">{{$d->member_id}}</span>
                                            </div>
                                                    @else
                                                        <div class="actions">
                                                            <a class="btn btn-small btn-disabled" href="">暂不能评价</a>
                                                        </div>
                                                        @endif
                                                @endforeach
                                        </li>

                                        @endforeach

                                    </ul>

                                </div>

                                {{--文本编辑--}}
                                <div style="margin-bottom: 20px; width: 750px;display: none; height: 300px;" class="layuitext">
                                    <form action="{{url('commentshop')}}" method="get">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pid" value="" id="pid">
                                        <input type="hidden" name="mid" value="" id="mid">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                ,before: function (input) {
                    //上传前回调
                    $('input#createUpload').parent().append('<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="path" value="ad">');
                }
                , success: function (res) {
                        console.log(res);
                }
            }

        });

        layedit.build('demo');

        layedit.build('id', {
            height: 60 //设置编辑器高度
        });



        $('.J_payOrder').each(function (i) {
            $(this).click(function () {

                //获取点击的商品id
                var ordersn = $(this).next('#ordersn').text();
                var mid = $(this).next().next('#memid').text();

                $('#LAY_demo2').css('display','block');
                $('.layuitext').css('display','block');


                //讲获取的商品id 写入form里面 传过去
               $('#pid').attr('value',ordersn);

                //讲获取的会员id 写入form里面 传过去
                $('#mid').attr('value',mid);

            });

        });
    });

</script>

    @endsection