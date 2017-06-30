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
@section('title', '登陆')
    @section('css')
        @parent
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin/mi_reg/layout.css') }}">

        @endsection
@section('content')
   <div class="biggest">
        <div class="logo posb" id="log">
            <img src="{{ asset('/images/home/logo.png')  }}" width="49">
        </div>
   </div>
@endsection
@section('js')
    @parent
@endsection
