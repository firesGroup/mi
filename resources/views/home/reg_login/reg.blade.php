<?php
/**
 * File Name: reg.blade.php
 * Description:前台会员登陆
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/28 0028
 * Time: 下午 10:54
 */
?>
@extends('layouts.iframe')
@section('title', '注册')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/mi_reg/layout.css') }}">
@endsection
@section('content')
    <div class="zhuti">
        <div class="tou">
            <img class="logo" src="{{url('images/home/logo.png')}}">
        </div>

        <div class="biao">
            <h6 class="zi">注册小米账号</h6>
        </div>
        <div class="layui-tab layui-tab-card" lay-filter="demo">
            <ul class="layui-tab-title" align="center">
                <li class="layui-this">手机注册</li>
                <li>邮件注册</li>
                >
            </ul>
            <div class="layui-tab-content" style="height: 500px;">
                <div class="layui-tab-item layui-show" style="">
                    <div class="shu layui-form">
                        <div class="xiao layui-form">
                            <form class="layui-form" action="{{url('admin/member')}}" method="post">
                                {{csrf_field()}}
                            <input type="hidden" name=""
                            <input type="text" name="phone" required lay-verify="required|phone" placeholder="请输入手机号码"
                                   autocomplete="off" class="layui-input qing">
                            <input type="password" name="password" required lay-verify="required|pass" placeholder="请输入密码"
                                   autocomplete="off" class="layui-input qing">
                            <input type="password" name="again_pass" required lay-verify="required" placeholder="请再次输入密码"
                                   autocomplete="off" class="layui-input qing">

                            <div style="display: inline-table;clear:both;">
                                <input type="text" id="verify" name="title" required lay-verify="required" placeholder="请输入图片验证码"
                                       autocomplete="off" class="layui-input qing" style="width:200px">
                            </div>
                            <a onclick="javascript:re_captcha();" style="margin-top: 10px;">
                                <img src="{{ url('/kit/captcha/1') }}" alt="验证码" title="刷新图片" width="130"
                                     height="40" id="code" border="1"
                                     style="float:right;margin-top: 13px;">
                            </a>
                            <div style="display: inline-table;clear:both;">
                                <input type="text" id="moblieVerify" name="sms_code" required lay-verify="required" placeholder="请输入短信验证码"
                                       autocomplete="off" class="layui-input qing" style="width:220px">
                            </div>
                            <button type="button" id="sendVerify" class="layui-btn layui-btn-small"
                                    style="">发送手机验证码
                            </button>
                                <input type="submit" value="立即注册" class="liji">
                            </form>


                            <div class="dian">
                                点击“立即注册”，即表示您同意并愿意遵守小米<b class="dian-1"><a href=""> 用户协议 </a></b> 和<b class="dian-2"><a
                                            href=""> 隐私政策</a></b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-tab-item">
                    <div class="shu">
                        <div class="xiao">

                            <input type="text" name="title" required lay-verify="required" placeholder="请输入邮箱地址"
                                   autocomplete="off" class="layui-input qing">
                            <input type="text" name="title" required lay-verify="required" placeholder="请输入密码"
                                   autocomplete="off" class="layui-input qing">
                            <input type="text" name="title" required lay-verify="required" placeholder="请再次输入密码"
                                   autocomplete="off" class="layui-input qing">

                            <div style="display: inline-table;clear:both;">
                                <input type="text" name="title" required lay-verify="required" placeholder="请输入图片验证码"
                                       autocomplete="off" class="layui-input qing" style="width:220px">
                            </div>
                            <a onclick="javascript:re_captcha();" style="margin-top: 10px;">
                                <img src="{{ url('/kit/captcha/1') }}" alt="验证码" title="刷新图片" width="100"
                                     height="40" id="" border="1"
                                     style="float:right;margin-top: 13px;">
                            </a>
                            <div style="display: inline-table;clear:both;">
                                <input type="text" name="title" required lay-verify="required" placeholder="请输入短信验证码"
                                       autocomplete="off" class="layui-input qing" style="width:220px">
                            </div>
                            <button type="button" id="sendVerify" class="layui-btn layui-btn-small"
                                    style="">发送手机验证码
                            </button>
                            <button class="liji">立即注册</button>


                            <div class="dian">
                                点击“立即注册”，即表示您同意并愿意遵守小米<b class="dian-1"><a href=""> 用户协议 </a></b> 和<b class="dian-2"><a
                                            href=""> 隐私政策</a></b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="weizi">
                <a href="" class="ziyi">简体</a> |
                <a href="" class="fan">繁体</a> |
                <a href="" class="yinyu">English</a> |
                <a href="" class="chang">常见问题</a>
            </div>
            <div class="gong">
                小米公司版权所有-京ICP备案1004644-<span class="gong-1"><img
                            src="./img/ghs.png">京公网安备11010802020134号-京ICP证110507号</span>
            </div>
            @endsection
            @section('js')
                @parent
                <script>
                    function re_captcha() {
                        $url = "{{ URL('kit/captcha') }}";
                        $url = $url + "/" + Math.random();
                        document.getElementById('code').src = $url;
                    }

                    layui.use(['layer', 'element', 'jquery', 'form'], function () {

                        var $ = layui.jquery
                            , layer = layui.layer
                            , laypage = layui.laypage
                            , element = layui.element()
                            , form = layui.form();

                        element.on('tab(demo)', function (data) {
                            layer.msg('切换了：' + this.innerHTML);
                        });

                        $('input[name=again_pass]').blur(function () {

                            var password = $('input[name=password]').val();
                            var pass = $(this).val();
                            var str = "<div style='color:red' id='deng'>输入的密码不一致</div>";
                            if (password != pass) {
                                $('#deng').remove();
                                $(this).after(str)
                                form.on('submit(go)', function () {
                                    layer.msg('密码请保持一致');
                                    return false;
                                })
                            } else {
                                $('#deng').remove();
                            }
                        })
                        form.verify({
                            pass:[
                                /^[a-zA-Z]+/
                                ,'请输入至少6位并以字母开头的密码'
                            ],
                            verify: function(value){
                                if (value == '') {
                                    return '请输入验证码！';
                                    $( '#verify' ).addClass( 'input-error' );
                                }
                            },
                            mobileVerify:function(value){
                                if (value == '') {
                                    return '请输入手机验证码！';
                                    $( '#mobileVerify' ).addClass( 'input-error' );
                                }
                            }
                        });
                        $('#sendVerify').click(function(){
                            var phone = $('input[name=phone]').val();
                                $.ajax({
                                    url:"{{url('/sms')}}",
                                    type:'post',
                                    data:{'_token':"{{csrf_token()}}", 'phone':phone},
                                    success:function (data){
                                       console.log(data);
                                    }
                                })
                        })

                    });
                </script>
@endsection
