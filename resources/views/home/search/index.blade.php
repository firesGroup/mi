<?php
/**
 * File Name: index.blade.php
 * Description: 搜索列表模板文件
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/7/4
 * Time: 13:54
 */
?>
@extends('layouts.home')

@section('title', '首页')
@section('keywords','')
@section('description','')

@section('css')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home/list.css') }}?ver=<?php echo time()?>">
@endsection
@section('content')
    @include('home.public.header_top')
    @include('home.public.header_nav')
    <!-- 面包屑 start -->
        <div class="breadcrumbs">
            <div class="container">
                <a href="/">首页</a>
                <span class="sep">&gt;</span>
                <a href="/search">全部结果</a>
                @if( isset( $word ) )
                <span class="sep">&gt;</span>
                <span class="J_search_word">{{ $word }}</span>
                @endif
            </div>
        </div>
    <!-- 面包屑 end -->
    @if( $data != null )
    <!-- 筛 选 start-->
    <div class="container">
        <div class="filter-box">
            @if( isset($cate_name) )
            <div class="filter-selected-list-wrap">
                <dl class="selected-list clearfix">
                    <dt>已选：</dt>
                    <dd><a href="/search{{ isset($word)?"?keyword=".htmlentities($word):'' }}" >分类:{{ $cate_name }}<i class="iconfont">×</i></a></dd>
                </dl>
            </div>
            @endif
            <div class="filter-list-wrap">
                <dl class="filter-list clearfix filter-list-row-8">
                    <dt>分类：</dt>
                    <dd class="active">全部</dd>
                    @foreach( $category as $key=>$cate )
                        <dd>
                            <a href="/search?cid={{ $cate[0]->id }}{{ isset($word)?"&keyword=".htmlentities($word):'' }}">
                                {{ $cate[0]->category_name }}
                            </a>
                        </dd>
                    @endforeach
                </dl>
                    <a class="more J_filterToggle" href="javascript: void(0);"  >更多<i class="iconfont"></i>
                    </a>
            </div>
        </div>
    </div>
    <!-- 筛 选 end -->
    <!-- 内容 start -->
    <div class="content">
        <div class="container">
            <div class="order-list-box clearfix">
                <ul class="order-list">
                    <li class="active first">
                        <a href="javascript:void(0);" id="recommend">推荐</a></li>
                    <li><a href="javascript:void(0);" id="new">新品</a></li>
                    <li class="up">
                        <a href="javascript:void(0);" id="price">价格 <i class="iconfont"></i>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" id="comment">评论最多</a>
                    </li>
                </ul>
            </div>
            <div class="goods-list-box">
                <div class="goods-list clearfix">
                    @foreach( $data as $pro )
                    <div class="goods-item">
                        <div class="figure">
                            <a href="{{ url('/product/info'.$pro['id']) }}"  >
                                <img src="{{ $pro['p_index_image'] }}!250_200" width="250" height="200" alt="{{ $pro['p_name'] }}"></a></div>
                        <p class="desc"></p>
                        <h2 class="title"><a href="{{ url('/product/info/'.$pro['id']) }}">{{ $pro['p_name'] }}</a></h2>
                        <p class="price">{{ $pro['price'] }}元 起</p>
                        <div class="thumbs">
                            <ul class="thumb-list">
                                <li ><a  ><img src="{{ $pro['p_index_image'] }}!34_34" width="34" height="34" alt="小米MIX 黑色"></a></li>                        </ul>
                        </div>
                        <div class="actions clearfix">
                            <a class="btn-like J_likeGoods" data-cid="1164400010" href="javascript: void(0);"  ><i class="iconfont"></i> <span>喜欢</span></a>
                            <a class="btn-buy btn-buy-detail J_buyGoods" href="//www.mi.com/mix/?cfrom=search"  ><span>立即购买</span> <i class="iconfont"></i></a>                    </div>
                        <div class="flags">

                            @if( $pro['flag'] == "新品" )
                                <div class="flag flag-new">{{ $pro['flag'] }}</div>
                            @elseif( $pro['flag'] )
                                <div class="flag flag-saleoff">{{ $pro['flag'] }}</div>
                            @endif
                        </div>
                        <div class="notice"></div>
                    </div>
                    @endforeach
                </div>
                 {{ $paginator->render()  }}
                </div>
            </div>
        </div>
    </div>
        @else
        <div class="container">
            <div class="filter-box">
                <div class="box-hd">
                    <h3 class="title">
                        抱歉，没有搜索到与 “<span class="keyword">{{ isset($cate_name)?$cate_name:'' }} {{ isset($word)?$word:'' }}</span>” 相关的商品            </h3>
                    <p class="tip">请检查您的输入是否有误<br>如有任何意见或建议，期待您<a href="javascript:void(0);" target="_blank">反馈给我们</a></p>
                </div>
            </div>
        </div>
    @endif
    <!-- 内容 end -->
    @include('home.public.footer')
@endsection

@section('js')
    @parent
    <script>
        $(function() {
            $(".cacheload").scrollLoading();
        });
        $('div.filter-box').on('click','a.J_filterToggle', function(){
            if($(this).parent().hasClass('filter-list-wrap-toggled')){
                $(this).parent().removeClass('filter-list-wrap-toggled');
            }else{
                $(this).parent().addClass('filter-list-wrap-toggled');
            }
        });
        $('form#J_searchForm').on('click','input[type=submit]',function(){
            if($('input#search').val() == '' || $('input#search').val() == ' ' ){
                return false;
            }
        });

    </script>
@endsection
