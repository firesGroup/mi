<?php
/**
 * File Name: topNav.blade.php
 * Description: 全站顶部导航模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 23:14
 */
?>
{{--{{ dd(session('goods')) }}--}}
<!-- 公共顶部 start -->
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
            <a rel="nofollow" href="./">小米商城</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">MIUI</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">米聊</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">游戏</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">多看阅读</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">云服务</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">金融</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">小米商城移动版</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">问题反馈</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="#J_modal-globalSites" data-toggle="modal">Select Region</a>
        </div>
        <div class="topbar-cart" id="J_miniCartTrigger">
            <a rel="nofollow" class="cart-mini" id="J_miniCartBtn" href="{{url('cart')}}">
                <i class="iconfont">&#xe60c;</i>购物车
                <span class="cart-mini-num J_cartNum"></span>
            </a>
            <div class="cart-menu" id="J_miniCartMenu">
                <div class="loading">
                    <div class="loader">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="topbar-info" id="J_userInfo">
            {{--{{dd(session('user_deta'))}}--}}
            @if(session('user_deta') != null )
                <div class="topbar-info" id="J_userInfo">
                    <span class="user">
                        <a rel="nofollow" class="user-name" href="{{url('user_detail')}}" target="_blank">
                            <span class="name" id="user">{{session('user_deta')['nick_name']}}</span>
                            <i class="iconfont"></i>
                        </a>
                        <ul id="hidden" class="user-menu" style="display: none;">
                            <li>
                            <a rel="nofollow" href="{{url('user_detail')}}" target="_blank" data-stat-id="e0b9e1d1fa8052a2" onclick="_msq.push(['trackEvent', '79fe2eae924d2a2e-e0b9e1d1fa8052a2', '//my.mi.com/portal', 'pcpid', '']);">个人中心
                            </a>
                            </li>
                            <li>
                            <a rel="nofollow" href="//order.mi.com/user/comment" target="_blank" data-stat-id="6d05445058873c2c" onclick="">评价晒单</a>
                            </li>
                            <li>
                            <a rel="nofollow" href="//order.mi.com/user/favorite" target="_blank" data-stat-id="32e2967e9a749d3d" onclick="">我的喜欢
                            </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="{{url('login/exit')}}" data-stat-id="770a31519c713b11" onclick="">退出登录</a>
                            </li>
                        </ul>
                    </span>
                    <span class="sep">|</span><span class="sep">|</span>
                    <a rel="nofollow" class="link" href="{{url('order/'.session('user_deta') ['id'])}}" data-needlogin="true">我的订单</a>
            @else
                    <a rel="nofollow" class="link" href="{{url('login')}}" data-needlogin="true">登录</a>
                    <span class="sep">|</span>
                    <a rel="nofollow" class="link" href="{{url('reg')}}">注册</a>
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!-- 公共顶部 end -->

@section('js')
    @parent

    <script>

        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery,
                layer = layui.layer;
            var index;
            $('a#J_miniCartBtn').on('mouseover', function () {

                   {{--$('div.loading').replaceWith("<ul class='cart-list'><li><div class='cart-item clearfix first'><a class='thumb' href=''><img src='{{session(session('goods')['id'])}}'></a><a class='name' href=''>{{session('goods')['total']}}</a><span class='price'>{{session('goods')['price']}}</span><a class='btn-del J_delItem' href='javascript:;' data-isbigtap='false'><i class='iconfont'></i></a></div></li></ul><div class='cart-total clearfix'><span class='total'>共 <em>{{session('goods')['num']}}</em>件商品<span class='price'><em>{{session('goods')['price']}}</em>元</span></span><a class='btn btn-primary btn-cart' href='{{url('cart')}}'>去购物车结算</a></div>");--}}

//                }

                $.ajax({
                    url: "{{url('searchCart')}}",
                    type: 'post',
                    data: {'_token': '{{csrf_token()}}'},
                    success:function (data) {
//                        alert(1);
                        if(data){

                            $('div#J_miniCartMenu').children().remove();

                            var str = "<ul class='cart-list'>";

                            var totalPrice = 0;

                            for (var i =0; i< data.length; i++) {

                                str += "<li><div class='cart-item clearfix first'>";

                                str += "<a class='thumb' href=''><img src='"+data[i]['img']+"!60_60'></a>";

                                str += "<a class='name' href=''>"+data[i]['pName']+"</a>";

                                str += "<span class='price'>"+data[i]['price']+"</span><a class='btn-del J_delItem' href='javascript:;' data-isbigtap='false'><i class='iconfont'></i>";

                                str += "</a></div></li>";
                                totalPrice += parseInt(data[i]['price']) * data[i]['num'];
                            }

                            str += "</ul><div class='cart-total clearfix'>";

                            str += "<span class='total'>共 <em>"+data.length+"</em>件商品<span class='price'><em>"+totalPrice+"</em>元</span></span>";

                            str += "<a class='btn btn-primary btn-cart' href='{{url('cart')}}'>去购物车结算</a></div>";

                            $('div#J_miniCartMenu').append(str);
                        }

                    },
                    dataType: 'json'
                });


            });


        });
    </script>

@endsection


