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

@section('title'){{ isset($word)?$word.' - ':''  }}{{ isset($cate_name)?$cate_name.' - ':'' }}{{ $C['seo']['search_title'] or $C['web']['web_title'] }}@endsection
@section('keywords'){{ isset($word)?$word.',':''  }}{{ isset($cate_name)?$cate_name.',':'' }}{{ $C['seo']['search_keys'] or $C['web']['web_keys'] }}@endsection
@section('description'){{ $C['seo']['search_desc'] or $C['web']['web_desc']}}@endsection

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
                <ul class="order-list" id="sort">
                    <li class="active first">
                        <a href="javascript:void(0);" id="recommend">推荐</a></li>
                    <li><a href="javascript:void(0);" id="new">新品</a></li>
                    <li class="up">
                        <a href="javascript:void(0);" id="price" data-id="">价格 <i class="iconfont"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="goods-list-box">
                <div class="goods-list clearfix">
                    @foreach( $data as $pro )
                    <div class="goods-item">
                        <div class="figure">
                            <a href="{{ url('/product/info/'.$pro['id']) }}"  >
                                <img src="{{ $pro['p_index_image'] }}!250_200" width="250" height="200" alt="{{ $pro['p_name'] }}"></a></div>
                        <p class="desc"></p>
                        <h2 class="title"><a href="{{ url('/product/info/'.$pro['id']) }}">{{ $pro['p_name'] }}</a></h2>
                        <p class="price">{{ $pro['price'] }}元 起</p>
                        <div class="thumbs">
                            <ul class="thumb-list">
                                <li ><a  ><img src="{{ $pro['p_index_image'] }}!34_34" width="34" height="34" alt="{{ $pro['p_name'] }}"></a></li>                        </ul>
                        </div>
                        <div class="actions clearfix">
                            <a class="btn-like J_likeGoods
                               @if( in_array( $pro['id'], $collect ) )
                                    btn-liked
                               @endif     " data-cid="{{ $pro['id'] }}" href="javascript: void(0);"><i class="iconfont"></i> <span>喜欢</span></a>
                            <a class="btn-buy btn-buy-detail J_buyGoods" href=""  ><span>立即购买</span> <i class="iconfont"></i></a>                    </div>
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
            if( '{{ isset($sort) }}' != ''){
                if( '{{ $sort }}' == 'price_up' ){
                    $('a#price').data('id','up');
                    $('a#price').parent('li').addClass('active up').removeClass('down');
                    $('a#price').parent('li').siblings().removeClass('active');
                    $('a#price').children('i').html('');
                }else if( '{{ $sort }}' == 'price_down' ){
                    $('a#price').data('id','down');
                    $('a#price').parent('li').addClass('active down').removeClass('up');
                    $('a#price').parent('li').siblings().removeClass('active');
                    $('a#price').children('i').html('');
                }else if( '{{ $sort }}' == 'new' ){
                    $('a#new').parent('li').addClass('active').siblings().removeClass('active');
                }else if( '{{ $sort }}' == 'recommend' ){
                    $('a#recommend').parent('li').addClass('active').siblings().removeClass('active');
                }
            }
        });

        //like
        $('div.goods-list').find('div.goods-item a.J_likeGoods i').on('click',function(){
            var id = $(this).parent().attr('data-cid');
            var t = $(this);
            $.ajax({
                url:"collect",
                type:'post',
                data:{'_token':'{{ csrf_token() }}', 'product_id': id },
                success:function(data) {
                    switch(parseInt(data)){
                        case 0:
                            layer.msg('收藏商品成功', {time:2000});
                            t.parent().addClass('btn-liked');
                            break;
                        case 1:
                            layer.msg('商品已收藏', {time:2000});
                            break;
                        case 2:
                            var index = layer.alert('您还没有登陆!请先登陆',{title:'提醒',icon:3,btnAlign: 'c',btn:['立即登陆','取消'],yes:function(){
                                location.href="/login";
                            },canale:function(){
                                layui.close(index);
                            }});
                    }
                }
            })
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

        $('a#price').click(function(){
            $(this).parent().addClass('active').siblings().removeClass('active');
            if( $(this).data('id') == 'up' ){
                $(this).data('id','down');
                setParam('sort','price_down');
                $(this).parent().addclass('down').removeClass('up');
                $(this).children('i').html('');
            }else if( $(this).data('id')  == 'down' ){
                $(this).data('id','up');
                setParam('sort','price_up');
                $(this).parent().addclass('up').removeClass('down');
                $(this).children('i').html('');
            }else{
                $(this).data('id','up');
                setParam('sort','price_up');
                $(this).parent().addclass('up').removeClass('down');
                $(this).children('i').html('');
            }
        });
        $('a#new').click(function(){
            $(this).parent().addClass('active').siblings().removeClass('active');
            setParam('sort','new');
        });
        $('a#recommend').click(function(){
            $(this).parent().addClass('active').siblings().removeClass('active');
            setParam('sort','recommend');
        });
        function setParam(name, value){
            var url = location.search; //获取url中"?"符后的字串
            if (url.indexOf("?") != -1) { //有问号存在,说明有参数
                var urlStr ="//"+location.host + location.pathname;
                if( '{{ isset($cid)?$cid:'' }}' != '' ){
                    urlStr += "?cid=" + '{{ $cid }}';
                }else if( '{{ isset($word)?$word:'' }}' != '' ){
                    urlStr += "&keyword=" + '{{ $word }}';
                }
                urlStr += "&"+ name + "=" + value;
                location.href=urlStr;
            }else{
                location.href=location.href + "?"+ name + "=" + value;
            }
        }

    </script>
@endsection
