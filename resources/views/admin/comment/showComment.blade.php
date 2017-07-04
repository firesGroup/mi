<?php
/**
 * File Name: showComment.blade.php
 * Description:
 * Created by PhpStorm.
 * Group FiresGroup
 * Auth: Jun
 * User: ppjun
 * Date: 2017/6/24
 * Time: 19:45
 */

?>
@extends('layouts.iframe')

@section('title','评价回复')
@section('css')
    @parent
@endsection

<section class="larry-grid">
    <header class="larry-personal-tit">
        <span style="font-size: 20px;">商品评价管理-评价回复</span>
    </header>
    <div class="row" id="infoSwitch">
        <blockquote class="layui-elem-quote col-md-12 head-con">
            <div class="title">
                <i class="larry-icon larry-caozuo"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            </div>
            <ul>
                <li>商品评价回复</li>
                <li>点击<i class="layui-icon">&#xe63a;</i> 回复评论</li>
            </ul>
            <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
        </blockquote>
    </div>
    {{--评价外部div--}}
    <div class="" style="width: auto;height: auto;background-color: white;border: 1px solid #e2e2e2;">
        <div style="width: auto;height: 60px;background-color: #eeeeee;">
            <span style="padding-left: 30px;font-size: 30px;"><i class="layui-icon" style="font-size: 20px;">&#xe611; 评价回复</i></span>
        </div>

        <br>
        {{--用户评论div--}}
        <div style="width:auto;height:auto!important;  height: 400px; border: 1px solid #eeeeee;text-align: center;margin: 0 auto;background-color: white ;margin-left: 25px;margin-right: 25px;">
            <div style="width: auto;height: 60px;background-color: white;border:1px solid #dddddd;border-radius:10px 10px 0px 0px;">
                <h2 style="text-align: left;font-size: 20px;margin: 10px;">用户评论</h2>
            </div>

            <table style="width:1500px ;height: auto;">
                <tbody>


                        @foreach($comment as $v)

                            @if($v->member_id == $id && $v->type == 0 )
                                <tr>
                            <td style="height: 300px;">
                                <div style="width:800px;height: auto;background-color: white;float: left;">

                                    <div style="text-align: left;padding-left: 20px;width: 100px;height: 60px;">
                                        <h2 style="padding-top: 20px;">{{$member[0]->nick_name}}</h2></div>

                                    <div style="width:150px;height:20px; text-align: right;padding-left: 400px;white-space:nowrap;color:#d2d2d2;">
                                        <span>{{$v->created_at}}</span></div>

                                    <div style="width: 100px;height: 100px;background-color: blue;float: left;">头像


                                        <div style="width:0px;height:0px;font-size: 0;border:solid 10px;border-color:#FFFFFF #F8C301 #FFFFFF #FFFFFF;padding-left:100px;"></div>


                                        <div style="width:1000px;height:auto;background:#F8C301;margin-left: 120px;margin-top: -35px;font-size: 18px;line-height: 40px;border-radius:5px;
                        "><span>{{$v->content}}</span></div>
                                    </div>

                                </div>
                            </td>
                        </tr>

                            @endif

                        @if($v->member_id == 4 && $v->type == 2 )
                        <tr>
                            <td>
                                <div style="width: 1400px;height: 150px;background-color: white;margin-top: 10px;float: right;">

                                    <div style="text-align: right;height: 20px; ">

                                        <span>管理员</span>

                                    </div>
                                    <div style="width: 100px;height: 80px;background-color: blue;float: right;">头像

                                        <div style="width:0px;height:0px;font-size:0;border:solid 10px;border-color:#FFFFFF #FFFFFF #FFFFFF #F8C301 ;margin-top: 20px;padding-right: 50px;"></div>

                                        <div style="width:900px;height:auto;background:#F8C301;border-radius:4px;margin-right: 100px;margin-top: -35px;float: right;line-height: 40px;word-wrap:break-word;
                ">{{$v->content}}

                                        </div>

                                        <div style="width:150px;height:20px; text-align: right;float:right;padding-right: 300px;padding-top:-140px;white-space:nowrap;color:#d2d2d2;">
                                            <span>{{$v->created_at}}</span>
                                        </div>

                                    </div>

                                </div>
                            </td>

                        </tr>

                        @endif
@endforeach
                </tbody>
            </table>

        </div>

        <div style="background-color: white;text-align: left;width: auto;padding-left: 25px;padding-top: 100px;padding-right: 25px;">

            <form action="{{url('admin/commentShow')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$v->p_id}}">
                <input type="hidden" name="member_id" value="{{$id}}">

                <textarea id="demo" style="text-indent: 20px;font-size: 20px;
                line-height: 30px;margin-left: 30px; display: none;text-align: left;" name="text"></textarea>
                <br><br>

                <div style="width:100px;height: 100px;padding-top: -20px;text-align: right;">

                    <button class="layui-btn layui-btn-big layui-btn-normal"
                            style="text-align: right;margin-right: 30px;" id="button">回复
                    </button>

                </div>
            </form>
        </div>

    </div>
</section>

@section('js')
    @parent
    <script>
        layui.use('layedit', function () {
            var layedit = layui.layedit;
            layedit.build('demo'); //建立编辑器

            layedit.build('id', {
                height: 60 //设置编辑器高度
            });

        });

        layui.use(['jquery', 'layer'], function () {
            var $ = layui.jquery;

            $('#button').on('click',function () {

                pid = $('#pid').text();

            });
        });


    </script>
@endsection
