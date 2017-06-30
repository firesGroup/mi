/**
 * Created by Administrator on 2017/6/28.
 */
layui.use(['jquery','element','MI','layer'], function(){
    var $ = layui.jquery,
        element = layui.element,
        MI = layui.MI,
        layer = layui.layer;
    //顶部购物车
    $('a#J_miniCartBtn').on('mouseenter',function(e){
        $('#J_miniCartTrigger').addClass('topbar-cart-active');
        $('#J_miniCartMenu').css('display','block');
        //请求后台购物车数据
        //$.ajax();
    });
    $('#J_miniCartTrigger').on('mouseleave', function(e){
        $('#J_miniCartTrigger').removeClass('topbar-cart-active');
        $('#J_miniCartMenu').css('display','none');
        layui.stope(e);
    });

    //头部导航
    $('ul.J_navMainList').find('li.nav-item').on('mouseover', function(){
        var item = $(this).children('div.item-children').html();
        if( item ){
            $('div#J_navMenu').attr('style','block').html(item);
            $('div#J_navMenu ul li img').each(function(){
                var src = $(this).data('src');
                $(this).attr('src', src);
            });
        }else{
            $('div#J_navMenu').css('display','none');
        }
        $(this).addClass('nav-item-active').siblings().removeClass('nav-item-active');
    });
    $('div#J_navMenu').on('mouseleave', function(){
        $('div#J_navMenu').css('display','none');
    });
    $('div.site-header').on('mouseleave', function(){
        $('div#J_navMenu').css('display','none');
        $('ul.J_navMainList li.nav-item').each(function(){
            $(this).removeClass('nav-item-active');
        })
    });

    //头部搜索
    $('form#J_searchForm').on('focusin', function(){
        $(this).addClass('search-form-focus');
        $(this).children('div.search-hot-words').hide();
        $('div#J_keywordList').removeClass('hide');
    }).on('focusout', function(){
        $(this).removeClass('search-form-focus');
        $(this).children('div.search-hot-words').show();
        $('div#J_keywordList').addClass('hide');
    });

    //焦点轮播图
    var slideObj = {
        id:2,
        time:2500,//定义轮播图切换时间
        show:'z-index: 50;display: block;',
        hide:'float: none; list-style: none; position: absolute; width: 1226px; z-index: 0; display: none;',
        timer:null,

        init:function(){ //执行初始化
            var th = $('#J_homeSlider'), p = th.parent(), t = this;
            var slideHtml = p.html();
            var num = this.imgNum(),
                str = '<div class="ui-controls ui-has-pager ui-has-controls-direction"><div class="ui-controls-direction"><a class="ui-prev" href="javascript:;" onclick="">上一张</a><a class="ui-next" href="javascript:;" onclick="">下一张</a></div><div class="ui-pager ui-default-pager">';
            for (var i = 0; i < num; i++) {
                if (i == 0) {
                    str += '<div class="ui-pager-item"><a href="" data-slide-index="' + i + '" class="ui-pager-link active">' + (i + 1) + '</a></div>';
                } else {
                    str += '<div class="ui-pager-item"><a href="" data-slide-index="' + i + '" class="ui-pager-link">' + (i + 1) + '</a></div>';
                }
            }
            str += '</div>';
            var lastStr = '<div class="ui-wrapper" style="max-width: 100%;"><div class="ui-viewport" style="width: 100%; overflow: hidden; position: relative; height: 460px;">' + slideHtml + str + '</div></div>';
            p.html(lastStr);
            $('#J_homeSlider div').each(function (i) {
                if (i == 0) {
                    $(this).attr('style', t.hide);
                } else {
                    $(this).attr('style', t.show);
                }
            });
          this.start();
        },

        start:function(){
            var t = this;
            var num = this.imgNum();
            var time = this.time;
            this.timer = setInterval(function () {
                var index = t.check();
                var th = $('#J_homeSlider div.slide').eq(index);
                if (index == num - 1) {
                    th.removeClass('loaded');
                    $('#J_homeSlider div.slide').eq(0).addClass('loaded').attr('style', t.show);
                    t.stop();
                    t.start();
                } else {
                    th.attr('style',t.hide);
                    th.next().attr('style', t.show).addClass('loaded').siblings().removeClass('loaded');
                    t.page();
                }
            }, time);
        },
        check: function () {
            var index = 0;
            $('#J_homeSlider div').each(function (i) {
                if ($(this).hasClass('loaded')) {
                    index = i;
                }
            });
            return index;
        },
        imgNum: function () {
            return $('#J_homeSlider div').size();
        },
        page:function(){i
          var index = this.check();
          $('#J_homeSlider').next().find('div.ui-pager div.ui-pager-item').eq(index).children('a').addClass('active').siblings().removeClass('active');
        },
        stop: function () {
            clearInterval(this.timer);
        },
        prev: function () {
            clearInterval(this.timer);
            var index = this.check(), th = $('#J_homeSlider div').eq(index);
            th.removeClass('loaded').attr('style',this.hide);
            th.prev().addClass('loaded').attr('style',this.show);
        }
    };
    //执行轮播图滚动
    slideObj.init();

});