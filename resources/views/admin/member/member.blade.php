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
@extends('layouts.iframe')

@section('title','会员管理首页')

@section('css')
    @parent
@endsection

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
                    <form action="{{url('admin/member/'.$v->id )}}" method="post">
                        <td>
                            <a class="layui-btn ayui-btn-normal" href="{{url('admin/member/'.$v->id.'/edit')}}">编辑</a>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="layui-btn layui-btn-danger"
                                   value="删除" style="text-color:#fff">
                        </td>
                    </form>
            @endforeach
                </tr>
            </tbody>
        </table>
        <div class="pagination center-block" style="text-align:center">

            {{ $data->links() }}

        </div>
    </div>
@endsection

@section('js')
    @parent

    @if(session('success') == 1)
        <script>
            layui.use('layer', function () {
                var layer = layui.layer;
                layer.msg('删除成功');
            });
        </script>
    @endif
@endsection
