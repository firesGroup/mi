/**
 * Created by Administrator on 2017/6/28.
 */

    //焦点轮播图
    var slideObj = {
        id:2,
        time:2300,//定义轮播图切换时间
        show:'z-index: 50;display: block;',
        hide:'float: none; list-style: none; position: absolute; width: 1226px; z-index: 0; display: none;',
        timer:null,
        //执行初始化
        init:function(){
            var th = $('#J_homeSlider'), p = th.parent(), t = this;
            var slideHtml = p.html();
            var num = this.imgNum(),
                str = '<div class="ui-controls ui-has-pager ui-has-controls-direction"><div class="ui-controls-direction"><a class="ui-prev" href="javascript:;">上一张</a><a class="ui-next" href="javascript:;">下一张</a></div><div class="ui-pager ui-default-pager">';
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
        //开始轮播
        start:function(){
            var t = this;
            var num = this.imgNum();
            var time = this.time;
            this.timer = setInterval(function () {
                var index = t.check();
                var th = $('#J_homeSlider div.slide').eq(index);
                if (index == num - 1) {
                    th.removeClass('loaded').attr('style',t.hide);
                    $('#J_homeSlider div.slide').eq(0).addClass('loaded').attr('style', t.show);
                    t.page(0);
                    t.stop();
                    t.start();
                } else {
                    th.attr('style',t.hide);
                    th.next().attr('style', t.show).addClass('loaded').siblings().removeClass('loaded');
                    t.page();
                }
            }, time);
        },
        //检查当前显示图片 返回索引
        check: function () {
            var index = 0;
            $('#J_homeSlider div').each(function (i) {
                if ($(this).hasClass('loaded')) {
                    index = i;
                }
            });
            return index;
        },
        //检查图片数量
        imgNum: function () {
            return $('#J_homeSlider div').size();
        },
        //执行切换右下角圆点切换
        page:function(i){
          var index = i||this.check();
          var p = $('#J_homeSlider').next().find('div.ui-pager div.ui-pager-item');
            p.find('a.ui-pager-link').removeClass('active');;
          p.eq(index).children('a').addClass('active');
        },
        //停止轮播
        stop: function () {
            clearInterval(this.timer);
        },
        //上一页
        prev: function () {
            clearInterval(this.timer);
            var index = this.check(), num = this.imgNum() , th = $('#J_homeSlider div');
            if( index == 0 ){
                th.removeClass('loaded').attr('style',this.hide);
                th.eq(num-1).addClass('loaded').attr('style',this.show);
                this.page();
            }else{
                th.eq(index).removeClass('loaded').attr('style',this.hide);
                th.eq(index).prev().addClass('loaded').attr('style',this.show);
                this.page();
            }
            this.start();
        },
        //下一页
        next: function () {
            clearInterval(this.timer);
            var index = this.check(), num = this.imgNum() , th = $('#J_homeSlider div');
            if( index == num-1 ){
                th.removeClass('loaded').attr('style',this.hide);
                th.eq(0).addClass('loaded').attr('style',this.show);
                this.page(0);
            }else{
                th.eq(index).removeClass('loaded').attr('style',this.hide);
                th.eq(index).next().addClass('loaded').attr('style',this.show);
                this.page();
            }
            this.start();
        },
    };
    $(window).on('load',function(){
        $('#J_homeSlider div.slide img').each(function(i){
            if( i !== 0 ){
                $(this).attr('src',$(this).data('url'));
            }
        });
        //执行轮播图滚动
        slideObj.init();
        $('a.ad2').attr('style','background-image:url(//c1.mifile.cn/f/i/g/2015/gif/yyymix.gif)');
    });
    //上一页点击事件
    $('.home-hero-slider').on('click','div.ui-controls-direction a.ui-prev', function(){
        slideObj.prev();
    });
    //下一页点击事件
    $('.home-hero-slider').on('click','div.ui-controls-direction a.ui-next', function(){
        slideObj.next();
    });

    //轮播图上 分类导航
    $('#J_categoryList').on('mouseover', 'li.category-item' , function(){
        $(this).find('a.link img.thumb').each(function(){
            var src = $(this).data('url');
            $(this).attr('src',src);
        });
        $(this).addClass('category-item-active').siblings().removeClass('category-item-active');
    }).on('mouseleave','li.category-item',function(){
        $(this).removeClass('category-item-active');
    });

    //tab切换
    $('div.J_brickNav ul.J_brickTabSwitch').on('mouseover','li', function(){
       var contentClass = $(this).parent().data('tabTarget');
       var pId = (contentClass.split('-'))[0];
        var index=0;
        $(this).addClass('tab-active').siblings().removeClass('tab-active');
        $('div#'+ pId +' div.J_brickNav ul.J_brickTabSwitch li').each(function(i){
            if( $(this).hasClass('tab-active') ){
                index=i;
            }
        });
       $('div#'+contentClass+' ul').eq(index).show().removeClass('hide').siblings().hide().addClass('hide');
    });

    //显示评价
    $('body').on('mouseover','li.brick-item',function(){
        $(this).addClass('brick-item-active').siblings().removeClass('brick-item-active');
    }).on('mouseout','li.brick-item', function(){
        $(this).removeClass('brick-item-active');
    });

    //明星单品 滚动
    var superObj = {
        time:3000,//定义滚动间隔时间,  3000=3秒
        timmer:null,//滚动定时器id
        superCon:$('div.xm-carousel-controls').eq(0).parent().parent().next().find('div.xm-carousel-wrapper').eq(0),
        superA:$('div.xm-carousel-controls').eq(0),
        //初始化
        init:function(){
            var superCon = this.superCon;
            superCon.attr('style', 'height: 340px; overflow: hidden;');
            superCon.find('ul').attr('style','width:2480px; margin-left: 0px; transition: margin-left 0.5s ease;');
            this.start();
        },
        //开始滚动
        start:function(){
            var that = this;
            var superCon = this.superCon;
            this.timmer = setInterval(function(){
                superCon.find('ul').css('marginLeft','-1240px');
                setTimeout(function(){
                    superCon.find('ul').css('marginLeft','0px');
                },that.time)
            },(that.time)*2);
        },
        //上一页
        prev:function(){
            var superCon = this.superCon;
            var superA = this.superA;
            superA.children('a.control-prev').addClass('control-disabled');
            superCon.find('ul').css('marginLeft','0px');
            superA.children('a.control-prev').next('a').removeClass('control-disabled');
        },
        //下一页
        next:function(){
            var superCon = this.superCon;
            var superA = this.superA;
            superA.children('a.control-next').addClass('control-disabled');
            superCon.find('ul').css('marginLeft','-1240px');
            superA.children('a.control-next').prev('a').removeClass('control-disabled');
        }
    };
    superObj.init();
    var superCon = superObj.superCon;
    var superA = superObj.superA;
    //点击上一页
    superA.on('click','a.control-prev', function(){
        clearInterval(superObj.timmer);
        superObj.prev();
        superObj.start();
    });
    //点击下一页
    superA.on('click','a.control-next', function(){
        clearInterval(superObj.timmer);
        superObj.next();
        superObj.start();
    });

    //为您推荐 滚动
    var recommendObj = {
        time:3000,//定义滚动间隔时间,  3000=3秒
        timmer:null,//滚动定时器id
        superCon:$('div.xm-carousel-controls').eq(1).parent().parent().next().find('div.xm-carousel-wrapper').eq(1),
        superA:$('div.xm-carousel-controls').eq(1),
        //初始化
        init:function(){
            var imgNum = superCon.find('ul li').size();
            var superCon = this.superCon;
            superCon.attr('style', 'height: 340px; overflow: hidden;');
            superCon.find('ul').attr('style','width:2480px; margin-left: 0px; transition: margin-left 0.5s ease;');
            this.start();
        },
    }
