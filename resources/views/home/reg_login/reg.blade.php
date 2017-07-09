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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/mi_reg/layout.css') }}">
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
                <li id="nb">手机注册</li>
                <li id="mail">邮件注册</li>
                >
            </ul>
            <div class="layui-tab-content" style="height: 500px;">
                <div class="layui-tab-item layui-show" style="">
                    <div class="shu layui-form">
                        <div class="xiao layui-form">
                            <form class="layui-form" action="{{url('admin/member')}}" method="post">
                                {{csrf_field()}}
                            <input type="text" name="phone" required lay-verify="required|phone|number" placeholder="请输入手机号码"
                                   autocomplete="off" class="layui-input qing" value="{{old('phone')}}">
                                <span class="code">{{$errors->first('phone')}}</span>
                            <input type="password" id="pass" name="password" required lay-verify="required|pass" placeholder="请输入密码"
                                   autocomplete="off" class="layui-input qing" value="{{old('password')}}">
                            <input type="password" name="password_confirmation" required lay-verify="required" placeholder="请再次输入密码"
                                   autocomplete="off" class="layui-input qing" value="{{old('password_confirmation')}}">
                            <span class="code">{{$errors->first('password')}}</span>
                            <div style="display: inline-table;clear:both;">
                                <input type="text" id="verify" name="code" required lay-verify="required" placeholder="请输入图片验证码"
                                       autocomplete="off" class="layui-input qing" style="width:200px" value="{{old('code')}}">
                            </div>
                            <a onclick="javascript:re_captcha();">
                                <img src="{{ url('/kit/captcha/1') }}" alt="验证码" title="刷新图片" width="100"
                                     height="40" id="code" border="1"
                                     style="float:right;margin-top: 20px;">
                            </a>
                                <div class="code">{{session('error')?session('error'):''}}</div>
                            <div style="display: inline-table;clear:both;">
                                <input type="text" id="moblieVerify" name="sms_code" required lay-verify="required" placeholder="请输入短信验证码"
                                       autocomplete="off" class="layui-input qing" style="width:220px" value="{{old('sms_code')}}">
                            </div>
                            <button type="button" id="sendVerify" class="layui-btn layui-btn-small"
                                    style="">发送手机验证码
                            </button>
                                <div class="code">{{session('sms')?session('error'):''}}</div>
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
                    <div class="shu layui-form">
                        <div class="xiao layui-form" >
                            <form id="em" class="layui-form">
                            <input type="text" name="email" required lay-verify="required|email" placeholder="请输入邮箱地址"
                                   autocomplete="off" class="layui-input qing">
                            <input type="password" id='pass' name="password" required lay-verify="required|pass" placeholder="请输入密码"
                                   autocomplete="off" class="layui-input qing password">
                            <input type="password" id="con_password" name="password_confirmation" required lay-verify="required" placeholder="请再次输入密码"
                                   autocomplete="off" class="layui-input qing">

                            <div style="display: inline-table;clear:both;">
                                <input type="text" id="email-code" name="code" required lay-verify="required" placeholder="请输入图片验证码"
                                       autocomplete="off" class="layui-input qing" style="width:220px">
                            </div>
                            <a onclick="javascript:re();">
                                <img src="{{ url('/kit/capt/1') }}" alt="验证码" title="刷新图片" width="100"
                                     height="40" id="img_code" border="1"
                                     style="float:right;margin-top: 25px;">
                            </a>
                                <div style="display: inline-table;clear:both;">
                                    <input type="text" id="moblieVerify" name="email_code" required lay-verify="required" placeholder="请输入邮件验证码"
                                           autocomplete="off" class="layui-input qing" style="width:200px" value="{{old('sms_code')}}">
                                </div>
                                <button type="button" id="emailVerify" class="layui-btn layui-btn-small"
                                        style="">发送邮件验证码
                                </button>

                            </form>
                            <button class="liji" id="sub">立即注册</button>

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
        </div>
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

                    function re(){
                        $url = "{{ URL('kit/capt') }}";
                        $url = $url + "/" + Math.random();
                        document.getElementById('img_code').src = $url;
                    }

                    layui.use(['layer', 'element', 'jquery', 'form'], function () {

                        var $ = layui.jquery
                            , layer = layui.layer
                            , laypage = layui.laypage
                            , element = layui.element()
                            , form = layui.form();

                        element.on('tab(demo)', function (data) {

                        });

                        $('input[name=password_confirmation]').blur(function () {

                            var password = $(this).prev('#pass').val();
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
                        });
                        form.verify({

                            verify: function (value) {
                                if (value == '') {
                                    return '请输入验证码！';
                                    $('#verify').addClass('input-error');
                                }
                            },
                            mobileVerify: function (value) {
                                if (value == '') {
                                    return '请输入手机验证码！';
                                    $('#mobileVerify').addClass('input-error');
                                }
                            }
                        });
                        $('#sendVerify').click(function () {
                            var phone = $('input[name=phone]').val();
                            if (phone == '') {
                                layer.msg('请填写正确的手机号', {time: 2000, icon: 5});
                                return false;
                            }
                            var $btn = $(this);
                            $.ajax({
                                url: "{{url('/sms')}}",
                                type: 'post',
                                data: {'_token': "{{csrf_token()}}", 'phone': phone},
                                success: function (data) {
                                    var $data = JSON.parse(data);
                                    if ($data['ResultData'] == '0') {
                                        var n = 60;
                                        $btn.attr('disabled', 'true');
                                        $btn.addClass('layui-btn-disabled').removeClass('bg-color');
                                        var timeid = setInterval(function () {
                                            $btn.html('重新发送(' + n + ')');
                                            if (n == 0) {
                                                clearInterval(timeid);
                                                $btn.html('发送手机验证码');
                                                $btn.removeAttr('disabled').removeClass('layui-btn-disabled').addClass('bg-color');
                                            }
                                            n--;
                                        }, 1000);
                                    } else {
                                        alert('短信发送失败, 请等会在尝试');
                                    }
                                }
                            })
                        })


                        $('#emailVerify').click(function () {
//                            alert(123);
                            var email = $('input[name=email]').val();
                            if (email == '') {
                                layer.msg('请填写正确的邮箱号', {time: 2000, icon: 5});
                                return false;
                            }
                            var $btn = $(this);
                            $.ajax({
                                url: "{{url('/mailBox')}}",
                                type: 'post',
                                data: {'_token': "{{csrf_token()}}", 'email': email},
                                success: function (data) {
//                                    alert(data);
                                    if (data == 1) {
                                        layer.msg('邮件已发送, 请登录邮箱查看');
                                        var n = 60;
                                        $btn.attr('disabled', 'true');
                                        $btn.addClass('layui-btn-disabled').removeClass('bg-color');
                                        var timeid = setInterval(function () {
                                            $btn.html('重新发送(' + n + ')');
                                            if (n == 0) {
                                                clearInterval(timeid);
                                                $btn.html('发送邮件验证码');
                                                $btn.removeAttr('disabled').removeClass('layui-btn-disabled').addClass('bg-color');
                                            }
                                            n--;
                                        }, 1000);
                                    } else {
                                        alert('邮箱发送失败, 请等会在尝试');
                                    }
                                }
                            })
                        })
                        $('#sub').click( function () {
                            var data = $('#em').serializeArray();
                            var email = $('input[name=email]').val();
                            var pass = $('.password').val();
                            var pass_con = $('#con_password').val();
                            var code = $('#email-code').val();
                            var email_code = $('input[name=email_code]').val();
                            $('code').remove();
                            $.ajax({
                                url:"{{url('admin/mail_code')}}",
                                type:'post',
                                data:{'_token':"{{csrf_token()}}",'email':email, 'password':pass,'password_confirmation': pass_con, 'code':code, 'email_code':email_code },
                                success:function (data) {

                                    switch(data)
                                    {
                                        case 0:
                                            window.location = "http://www.mi.cn";
                                            break;
                                        case 1:
                                            layer.msg('验证码错误');
                                            break;
                                        case 2:
                                            layer.msg('邮箱验证码错误');
                                            break;
                                        case 3:
                                            layer.msg('注册会员失败');
                                            break;
                                    }



                                },
                                error:function (error) {
                                    var msgObj=JSON.parse(error.responseText);
                                    var msg = '';
                                    for(var name in msgObj){//遍历对象属性名
                                        msg += msgObj[name] + "<br>";
                                    }
                                    layer.msg(msg,{icon:2,time:3000});
                                },
                                dataType:"json"
                            })
                        })

                    });
                </script>
@endsection
