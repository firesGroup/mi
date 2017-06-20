<?php
/**
 * File Name: user.php
 * Description:管理员列表页
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/19
 * Time: 20:24
 */
?>

@extends('admin.index')

@section('admin')
    <tr>
        <th>ID</th>
        <th>用户组id</th>
        <th>用户名</th>
        <th>管理员状态</th>
        <th>密码</th>
        <th>添加时间</th>
        <th>最后登录时间</th>
        <th>最后登录ip</th>
        <th>创建时间</th>
        <th>修改时间</th>
        <th>操作</th>
    </tr>
    {{--{{dd($data)}}--}}

    @foreach($data as $v)
        {{--{{dd($v)}}--}}
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->gid}}</td>
            <td>{{$v->username}}</td>
            <td>{{$status[$v->status]}}</td>
            <td>{{$v->password}}</td>
            <td>{{$v->add_time}}</td>
            <td>{{$v->last_time}}</td>
            <td>{{$v->last_ip}}</td>
            <td>{{$v->created_at}}</td>
            <td>{{$v->updated_at}}</td>
            <td>
                <a href="{{url('admin/user/'.$v->id.'/edit ')}}">编辑</a>
                <a href="">删除</a>
            </td>
        </tr>
    @endforeach

@endsection
