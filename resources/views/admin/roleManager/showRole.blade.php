<?php
/**
 * File Name: show.blade.php
 * Description: 权限详情
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Wim
 * Date: 2017/6/26
 * Time: 9:39
 */
?>

{{--{{dd($data)}}--}}
@extends('layouts.iframe')

@section('title','权限展示')

@section('css')
    @parent
@endsection

@section('content')

    <div>
        <div style="text-align:center;margin-left: 300px">

            <table class="layui-table " lay-skin="row" style="width:80%;" lay-even>
                <tr>
                    <th colspan="4" style="font: 25px/1.5 楷体">权限详细信息</th>
                </tr>

                <tr>
                    <td style="width:25%">权限id号</td>
                    <td style="width:25%">权限名称</td>
                    <td style="width:25%">权限方法</td>
                    <td style="width:25%">权限状态</td>
                </tr>
                @foreach($data as $v)
                    <tr>
                        <td>
                            <div style="color:#01AAED">
                                {{$v->id}}
                            </div>
                        </td>
                        <td>
                            <div style="color:#01AAED">
                                {{$v->role_name}}
                            </div>
                        </td>
                        <td>
                            <div style="color:#01AAED">
                                {{$v->role}}
                            </div>
                        </td>
                        <td>
                            <div style="color:#01AAED">
                                {{$status[$v->status]}}
                            </div>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td style="width:25%" colspan="4">权限描述</td>
                </tr>

                @foreach($data as $v)
                    <tr>
                        <td colspan="4">
                            <div style="color:#01AAED">
                                {{$v->role_name.'  :  '.$v->role_desc}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection