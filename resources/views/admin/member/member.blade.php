<?php
/**
 * File Name: member.blade.php
 * Description:会员列表
 * Created by PhpStorm.
 * Auth: Long
 * Date: 2017/6/19 0019
 * Time: 下午 7:38
 */
?>

@extends('admin.master.master')

@section('content')

    <div>
        <table class="layui-table">

            <colgroup>
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>会员Id</th>
                <th>加入时间</th>
                <th>会员昵称</th>
                <th>会员邮箱</th>
                <th>会员电话</th>
                <th>会员状态</th>
                <th>最后登陆IP</th>
                <th>操作</th>
            </tr>
            <tr>

            </tr>
            </thead>
            <tbody>

            @foreach( $data as $v )

                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->created_at}}</td>
                    <td>{{$v->nick_name}}</td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->phone}}</td>
                    <td>{{$state[$v->status]}}</td>
                    <td>{{$v->last_ip}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination center-block" style="text-align:center">

            {{ $data->links() }}

        </div>
    </div>
    <script>
        layui.use('layer',function(){
            var layer=layui.layer;

            layer.msg('hello!GAY明');
        });
    </script>
@endsection
