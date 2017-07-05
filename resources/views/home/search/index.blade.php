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
                
<a href="/">首页
</a>
                <span class="sep">&gt;</span>
                
<a href="//search.mi.com/search_小米mix">全部结果
</a>
                <span class="sep">&gt;</span>
                <span class="J_search_word">小米mix</span>
            </div>
        </div>
    <!-- 面包屑 end -->
    <!-- 筛 选 start-->
    <div class="container">
        <div class="filter-box">
            <div class="filter-list-wrap">
                <dl class="filter-list clearfix filter-list-row-8">
                    <dt>分类：</dt>
                    <dd class="active">全部</dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-29" data-stat-id="d426855f91db1022" >路由器
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-177" data-stat-id="d3a19a2b8d1e942e" >路由器配件
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-9" data-stat-id="7952816396f5db94" >贴膜
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-8" data-stat-id="95d18e1cea1b5dee" >保护套/保护壳
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-118" data-stat-id="d3ea22ca65d0f055" >小米头戴式耳机
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-143" data-stat-id="211cc5bb53efcee6" >小米圈铁耳机
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-16" data-stat-id="dbf06401359654ad" >线材
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-102" data-stat-id="49ced4245b086f7d" >小米活塞耳机
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-116" data-stat-id="7eaadfbd621238e3" >净化器
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-128" data-stat-id="f77e9406d2644748" >小米蓝牙耳机
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-132" data-stat-id="621dbf03945d0633" >净水器
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-12" data-stat-id="5f2c1b3aa723f717" >小米移动电源
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-30" data-stat-id="152cefd8a485d658" >配件优惠套装
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-23" data-stat-id="df9fc6d00de5922e" >箱包
                        </a>
                    </dd>
                    <dd>
                        <a href="//search.mi.com/search_小米-114" data-stat-id="c4d8629f07f5f7dd" >摄像机
                        </a>
                    </dd>
                        <dd>
                        <a href="//search.mi.com/search_小米-22" data-stat-id="61a69bc294565397" >服装
                        </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-13" data-stat-id="b74eec78634bd213" >品牌移动电源
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-59" data-stat-id="1d3e5a4c2c1eef2a" >小米鼠标垫
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-124" data-stat-id="17baaf54ea9433d0" >体重秤
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-24" data-stat-id="3524b624120d432a" >生活周边
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-14" data-stat-id="e8f698460211f422" >电池
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-5" data-stat-id="2d35e754ae560c86" >手机支架
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-15" data-stat-id="8d86c366428d9f22" >充电器
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-19" data-stat-id="ed0a20aca62eb875" >音箱
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-130" data-stat-id="d5adb259063d5e22" >智能家庭套装
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-115" data-stat-id="65f44a6475b45d76" >智能插座
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-136" data-stat-id="4892d746536771b1" >智能硬件配件
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-32" data-stat-id="1f634b3a13c8d484" >小米电视
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-33" data-stat-id="c63835902ab8df25" >小米盒子
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-182" data-stat-id="478a5a5d8d6e5cbc" >降噪耳机
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-111" data-stat-id="1421ffbf80adf497" >小米手环及配件
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-162" data-stat-id="430b8316ed21a616" >笔记本电脑
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-180" data-stat-id="db2ee47f71f02547" >笔记本电脑配件
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-178" data-stat-id="2c49b22b13601fbe" >滑板车
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-172" data-stat-id="3378cefee5c7e242" >小米杂志
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-163" data-stat-id="e944dd85f66e6b62" >VR眼镜
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-123" data-stat-id="5d992c1e59e2b3e6" >低音炮
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-155" data-stat-id="b8fc0e21f595326f" >无人机
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-152" data-stat-id="386060295df71403" >小米胶囊耳机
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-109" data-stat-id="e326e78c89b71ec1" >小米平板
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-146" data-stat-id="516a003e504702f7" >网络收音机
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-119" data-stat-id="9fe772f64a79a25a" >小米电视/盒子配件
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-137" data-stat-id="989db566429868a3" >移动电源保护套
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-125" data-stat-id="220bbcec6b2162ed" >插线板
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-150" data-stat-id="30c1faf255ced747" >手表
                    </a>
                    </dd></dl>
                    <a class="more J_filterToggle" href="javascript: void(0);" data-stat-id="3306e9b581810c0b" >更多<i class="iconfont"></i>
                    </a></div>
            <div class="filter-list-wrap">
                <dl class="filter-list clearfix filter-list-row-7">
                    <dt>机型：</dt>
                    <dd class="active">全部
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-55669" data-stat-id="12f9d04fd7163ecb" >小米6
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-55667" data-stat-id="04d69fcf6ce9b31f" >小米5c
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-55668" data-stat-id="79935aba88cff786" >红米4X
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-11224" data-stat-id="8bcd144a49f008b6" >小米Note2
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-54322" data-stat-id="ac5fba6d40ab091b" >小米MIX
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-54329" data-stat-id="dc988962b044b969" >红米Note4X
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-6235" data-stat-id="44955f2fb368b478" >小米5S
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-6236" data-stat-id="0fbc5cfb47b7146e" >小米5S Plus
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-54321" data-stat-id="07075f96c30a73b6" >小米Max
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-6234" data-stat-id="80508e130c94577a" >小米手机5
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-7193" data-stat-id="42c677c0076ea16d" >小米手机4S
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-54323" data-stat-id="d03f8796fe26087a" >红米4
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-54324" data-stat-id="6d170e9b3f5218c4" >红米4A
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-54325" data-stat-id="6d54bf3980b27f8a" >小米平板3
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-45622" data-stat-id="30e2560efa8ee43f" >红米Note4
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-45615" data-stat-id="56198cd5242a10d9" >红米Pro
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-12432" data-stat-id="fd18cf89a570d5d4" >红米Note3
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-45614" data-stat-id="05eff4f9ad6ae68f" >红米手机3S
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-45613" data-stat-id="d3013d5c87685fca" >红米手机3高配版
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-45612" data-stat-id="2b61719ea1269aad" >红米手机3标准版
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-32134" data-stat-id="d1de55779e2925d5" >小米平板2
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-4321" data-stat-id="f733f54cf976ae6f" >小米Note
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-45231" data-stat-id="15a3774b8e0f2130" >小米手机4c
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-112" data-stat-id="b21bc0766f08b8a7" >红米Note 2
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-123" data-stat-id="3bd96ed76ae11940" >小米手机4
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-8192" data-stat-id="65d5bb87e164b361" >红米Note/增强版
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-321" data-stat-id="ef5eaaf4100b90c5" >红米2A
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-34567" data-stat-id="9eedb95b47966a7e" >小米电视2
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-128" data-stat-id="8addc79057b9623a" >小米手机3
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-6543" data-stat-id="5dadb97bd1700451" >红米手机2
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-64" data-stat-id="011b4079cabd3970" >红米手机
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-16" data-stat-id="aca7538a45bf7d1e" >小米手机2/2S
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-8" data-stat-id="856ef9ea70519c2f" >小米盒子
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-256" data-stat-id="b6f0a88b591a78d3" >小米电视
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-32768" data-stat-id="a5aafa533d442739" >小米盒子增强版
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-4567890" data-stat-id="758addcef19c3ba8" >小米平板
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-32" data-stat-id="c618b3296f480508" >小米手机2A
                    </a>
                    </dd>
                    <dd>
                    <a href="//search.mi.com/search_小米-0-2" data-stat-id="ad5ecae48dad322f" >小米手机1/1S
                    </a>
                    </dd></dl>
                <a class="more J_filterToggle" href="javascript: void(0);" data-stat-id="3306e9b581810c0b" >更多<i class="iconfont"></i>
                </a>
            </div>
            <div class="filter-list-wrap">
                <dl class="filter-list clearfix filter-list-row-2">
                    <dt>品牌：</dt>
                    <dd class="active">全部
                        </dd>
                        <dd>
                        <a href="//search.mi.com/search_小米-0-0-1" data-stat-id="88787fa76a04449e" >小米
                        </a>
                        </dd>
                        <dd>
                        <a href="//search.mi.com/search_小米-0-0-20" data-stat-id="431aed69830c020d" >第三方品牌
                        </a>
                        </dd>
                        <dd>
                        <a href="//search.mi.com/search_小米-0-0-35" data-stat-id="33e14789544b5456" >ZMI
                        </a>
                        </dd>
                        <dd>
                        <a href="//search.mi.com/search_小米-0-0-40" data-stat-id="d8a9faeb89f379b2" >90分
                        </a>
                        </dd>
                        <dd>
                        <a href="//search.mi.com/search_小米-0-0-42" data-stat-id="f4e9d23727c663ed" >米家
                        </a>
                        </dd>
                        <dd>
                        <a href="//search.mi.com/search_小米-0-0-49" data-stat-id="4794ef5784d7da10" >硕米
                        </a>
                        </dd>            </dl>
                
<a class="more J_filterToggle" href="javascript: void(0);" data-stat-id="3306e9b581810c0b" >更多<i class="iconfont"></i>
</a></div>
        </div>
    </div>
    <!-- 筛 选 end -->
    @include('home.public.footer')
@endsection

@section('js')
    @parent
    <script>
        $(function() {
            $(".cacheload").scrollLoading();
        });
    </script>
@endsection
