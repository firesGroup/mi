<?php
/**
 * File Name: member_detail.blade.php
 * Description:会员详细信息
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/20 0020
 * Time: 下午 9:45
 */
?>

@extends('layouts.iframe')
@section('title', '会员详情页')
@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/jquery.Jcrop.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugin/bootstrap/css/bootstrap.css') }}">
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>会员管理-列表</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请务必正确填写会员信息</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <div class="layui-form layui-form-pane">
                        <img src="{{$user_detail->avator}}" width="100" id="upload" class="img-circle">
                        <input type="file" name="avator" class="layui-upload-file" id="sumbit">
                    <div class="layui-form-item">
                        <div class="layui-form-label">会员ID</div>
                        <div class="layui-input-inline" style="width:300px">
                            <div class="layui-input">
                                {{$data->id}}
                        </div>
                    </div>
            </div>
                    <div class="layui-form-item">
                        <div class="layui-form-label">会员昵称</div>
                        <div class="layui-input-inline" style="width:300px">
                            <div class="layui-input">
                                {{$data->nick_name}}
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-form-label">会员生日</div>
                        <div class="layui-input-inline" style="width:300px">
                            <div class="layui-input">
                                {{$user_detail->birthday}}
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">会员邮箱</label>
                        <div class="layui-input-inline">
                            <div class="layui-input" style="width:300px">
                                {{$data->email}}
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">会员电话</label>
                        <div class="layui-input-inline" style="width:300px">
                            <div class="layui-input">
                                {{$data->phone}}
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">会员性别</label>
                        <div class="layui-input-inline" style="width:300px">
                            <div class="layui-input">
                                {{$arr[$user_detail->sex]}}
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">会员状态</label>
                        <div class="layui-input-inline" style="width:300px">
                            <div class="layui-input">
                                {{$state[$data->status]}}
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">最后登陆IP</label>
                        <div class="layui-input-inline" style="width:300px">
                            <div class="layui-input">
                                {{$data->last_ip}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                {!! Form::open( [ 'url' => ['/admin/change'], 'method' => 'POST', 'onsubmit'=>'return checkCoords();','files' => true ] ) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color: #ffffff">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">裁剪头像</h4>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <div class="crop-image-wrapper">
                            <img src="/images/default-avatar.png"
                                    class="ui centered image" id="cropbox" >
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="hidden" id="photo" name="photo" />
                            <input type="hidden" id="x" name="x" />
                            <input type="hidden" id="y" name="y" />
                            <input type="hidden" id="w" name="w" />
                            <input type="hidden" id="h" name="h" />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">裁剪头像</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('js')
    @parent
    <script type="text/javascript" src="{{ asset('/js/public/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/public/jquery.Jcrop.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/plugin/bootstrap/js/bootstrap.js') }}"></script>
    <script>
        layui.use(['form','upload','jquery'],function(){
            var $ = layui.jquery;
            var form = layui.form();
            function extra_data(input,data){
                var item=[];
                $.each(data,function(k,v){
                    item.push('<input type="hidden" name="'+k+'" value="'+v+'">');
                })
                $(input).after(item.join(''));
            }

            layui.upload({
                    url: '{{url('admin/avator')}}' ,//上传接口
                before: function(input){
                     var data = {"id":"{{$data->id}}"};
                     extra_data(input, data);
                }
                ,title : '上传头像'
                ,success: function(res){
                //上传成功后的回调
                $("#upload").attr("src", res.src);
                    var cropBox = $("#cropbox");
                    cropBox.attr('src', res.src);
                    $('#photo').val(res.src);
                    $('#upload-avatar').html('更换新头像');
                    $('#exampleModal').modal('show');
                    cropBox.Jcrop({
                        aspectRatio: 1,
                        onSelect: updateCoords,
                        setSelect: [120,120,10,10]
                    });
                    $('.jcrop-holder img').attr('src',response.avatar);
                    function updateCoords(c)
                    {
                        $('#x').val(c.x);
                        $('#y').val(c.y);
                        $('#w').val(c.w);
                        $('#h').val(c.h);
                    }
                    function checkCoords()
                    {
                        if (parseInt($('#w').val())) return true;
                        alert('请选择图片.');
                        return false;
                    }
            }


        });

        });
    </script>
@endsection
