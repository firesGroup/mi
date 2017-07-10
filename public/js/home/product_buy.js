/**
 * Created by Administrator on 2017/6/30.
 */
$(function () {
    $(".cacheload").scrollLoading();
    $(".done").scrollLoading();
    //自执行滚动 到 商品信息导航条
    $("html,body").animate({scrollTop: $("#J_proHeader").offset().top}, 1000);
    $('#J_nav_buy_btn').remove();
});

//商品信息导航条 跟随
$(window).scroll(function () {
    var srollTop = $(document).scrollTop();
    if (srollTop >= 200) {
        $('div#J_fixNarBar').addClass('nav_fix');
    } else {
        $('div#J_fixNarBar').removeClass('nav_fix');
        $('div#J_img').removeClass('fix').removeAttr('style');
    }
    if (srollTop >= 500) {
        $('div#J_img').addClass('fix').attr('style', 'left: 19.5px; margin-top: 0px;');
    }
    //获取div容器 高度
    var nh = $("#J_proInfo").offset().top;
    var h = $('div.pro-choose-main').height();
    var xh = nh - h;
    //获取img容器 高度
    var imgh = $('div#J_img').height();
    if (srollTop >= (h - 50 - xh)) {
        $('div#J_img').removeClass('fix').attr('style', 'left: 19.5px; margin-top: ' + (h - imgh - 40) + 'px;');
    }
})


//关闭登陆提示
$('div.J_notic').on('click', 'a.J_proLoginClose', function () {
    $('div.J_notic').attr('style', 'display:none');
});

//选择版本事件
$('div#version ul').on('click', 'li', function () {
    var that = $(this);
    // console.log(that);
    //获取版本id
    var verId = that.data('ver_id');
    // console.log(verId);
    //获取版本索引
    var index = that.data('index');
    //获取价格
    var price = that.data('price');
    //获取名称
    var name = that.data('name');
    //获取简介
    var desc = that.data('desc');
    //获取当前选择的颜色
    var colorName = $('div#color ul li.active').data('value');
    if (colorName == undefined) {
        colorName = '';
    }
    //获取商品名称
    var proName = $('h1.J_proName').text();

    //自执行请求数据
    // 获取版本的颜色
    $.ajax({
        url: '/product/ajaxGetVersionColor/' + verId,
        type: 'get',
        success: function (data) {
            var str = '';
            for (var i = 0; i < data.length; i++) {
                if (i == 0) {
                    str += '<li class="btn btn-biglarge active" data-ver_id="' + data[i].ver_id + '" data-color_id="' + data[i].color_id + '" data-value="' + data[i].color_name + '" data-index="' + i + '"><a href="javascript:void(0);"><img class="cacheload" src="' + data[i].color_img + '" data-src="' + data[i].color_img + '" alt="' + data[i].color_name + '">' + data[i].color_name + '</a></li>';
                } else {
                    str += '<li class="btn btn-biglarge" data-ver_id="' + data[i].ver_id + '" data-color_id="' + data[i].color_id + '" data-value="' + data[i].color_name + '" data-index="' + i + '"><a href="javascript:void(0);"><img class="cacheload" src="' + data[i].color_img + '" data-src="' + data[i].color_img + '" alt="' + data[i].color_name + '">' + data[i].color_name + '</a></li>';
                }
                $('div#color ul').html(str);
            }
        }
    });

    var status;
    //获取版本信息 状态 再次比对
    $.ajax({
        url: '/product/ajaxGetVersion/' + verId,
        type: 'get',
        success: function (data) {
            //版本价格
            var ajaxPrice = parseFloat(data[0].price);
            var dataPrice = parseFloat(price);
            if (ajaxPrice != dataPrice) {
                price = ajaxPrice;
            }
            //版本状态
            status = data[0].status;
            var str = '';
            if (status == 0) {
                str += '<a href="javascript:void(0);" class="btn btn-primary btn-biglarge J_proBuyBtn" data-type="0">加入购物车</a>';
            } else if (status == 1) {
                str += '<a class="btn btn-gray  btn-biglarge btn-line-gray J_setRemind" href="javascript:void(0);" data-type="1" disabled>已下架</a>';
            } else if (status == 2) {
                str += '<a class="btn btn-line-primary btn-biglarge btn- J_setRemind" href="javascript:void(0);" data-type="2">新品预售</a>';
            } else if (status == 3) {
                str += '<a class="btn btn-red btn-biglarge btn-line-red J_setRemind" href="javascript:void(0);" data-type="3" disabled>缺货中</a>';
            } else if (status == 4) {
                str += '<a class="btn btn-line-primary btn-biglarge btn- J_setRemind" href="javascript:void(0);" data-type="4">新品上市</a>';
            }
            $('ul#J_buyBtnBox li').html(str);

            //版本图片
            var imgJson = data[0].ver_img;
            if (imgJson != null) {
                var imgArr = eval('' + imgJson + '');
                var str = '';
                for (var i = 0; i < imgArr.length; i++) {
                    if (i == 0) {
                        str += '<img class="loaded slider done" src="' + imgArr[i] + '!560_560">';
                    } else {
                        str += '<img class="slider done" src="' + imgArr[i] + '!560_560">';
                    }
                }
                $('div#J_sliderView').html(str);
                slideObj.start();
            }
        }

    });


    // 改变价格
    $('span.J_proPrice').html(price + '元');
    //改变简介
    $('div#version div.step-title span').html(desc);
    //改变总价
    $('div#J_proList li.totleName').html(proName + ' ' + name + ' ' + colorName + '<span>' + price + '元</span>');
    $('div#J_proList li.totlePrice').html('总计  ：' + price + '元');
    $(this).addClass('active').siblings().removeClass('active');
});

//选择颜色事件
$('div#color ul').on('click', 'li', function () {
    var that = $(this);
    //获取选中颜色
    var colorName = that.data('value');
    //获取选中版本信息
    var name = $('div#version ul li.active').data('name');
    //获取价格
    var price = $('div#version ul li.active').data('price');

    //获取商品名称
    var proName = $('h1.J_proName').text();

    $('div#J_proList li.totleName').html(proName + ' ' + name + ' ' + colorName + '<span>' + price + '元</span>');
    $('div#J_proList li.totlePrice').html('总计  ：' + price + '元');
    $(this).addClass('active').siblings().removeClass('active');
});

//焦点轮播图
var slideObj = {
    id: 2,
    time: 2300,//定义轮播图切换时间
    show: 'float: none; list-style: none; position: absolute; width: 560px; z-index: 50; display: block;',
    hide: 'float: none; list-style: none; position: absolute; width: 560px; z-index: 0; display: none;',
    timer: null,
    //执行初始化
    init: function () {
        var th = $('#J_sliderView'), p = th.parent(), t = this;
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
        var lastStr = '<div class="ui-wrapper" style="max-width: 100%;"><div class="ui-viewport" style="width: 100%; overflow: hidden; position: relative; height: 560px;">' + slideHtml + str + '</div></div>';
        p.html(lastStr);
        $('#J_sliderView img').each(function (i) {
            if (i == 0) {
                $(this).attr('style', t.show);
            } else {
                $(this).attr('style', t.hide);
            }
        });
        this.start();
    },
    //开始轮播
    start: function () {
        clearInterval(this.timer);
        var t = this;
        var num = this.imgNum();
        var time = this.time;
        this.timer = setInterval(function () {
            var index = t.check();
            var th = $('#J_sliderView img').eq(index);
            if (num == 1) {
                t.stop();
            } else {
                if (index == num - 1) {
                    th.removeClass('loaded').attr('style', t.hide);
                    $('#J_sliderView img').eq(0).addClass('loaded').attr('style', t.show);
                    t.page(0);
                    t.stop();
                    t.start();
                } else {
                    th.attr('style', t.hide);
                    th.next().attr('style', t.show).addClass('loaded').siblings().removeClass('loaded');
                    t.page();
                }
            }

        }, time);
    },
    //检查当前显示图片 返回索引
    check: function () {
        var index = 0;
        $('#J_sliderView img').each(function (i) {
            if ($(this).hasClass('loaded')) {
                index = i;
            }
        });
        return index;
    },
    //检查图片数量
    imgNum: function () {
        return $('#J_sliderView img').size();
    },
    //执行切换右下角圆点切换
    page: function (i) {
        var index = i || this.check();
        var p = $('#J_sliderView').next().find('div.ui-pager div.ui-pager-item');
        p.find('a.ui-pager-link').removeClass('active');
        ;
        p.eq(index).children('a').addClass('active');
    },
    //停止轮播
    stop: function () {
        clearInterval(this.timer);
    },
    //上一页
    prev: function () {
        clearInterval(this.timer);
        var index = this.check(), num = this.imgNum(), th = $('#J_sliderView img');
        if (index == 0) {
            th.removeClass('loaded').attr('style', this.hide);
            th.eq(num - 1).addClass('loaded').attr('style', this.show);
            this.page();
        } else {
            th.eq(index).removeClass('loaded').attr('style', this.hide);
            th.eq(index).prev().addClass('loaded').attr('style', this.show);
            this.page();
        }
        this.start();
    },
    //下一页
    next: function () {
        clearInterval(this.timer);
        var index = this.check(), num = this.imgNum(), th = $('#J_sliderView img');
        if (index == num - 1) {
            th.removeClass('loaded').attr('style', this.hide);
            th.eq(0).addClass('loaded').attr('style', this.show);
            this.page(0);
        } else {
            th.eq(index).removeClass('loaded').attr('style', this.hide);
            th.eq(index).next().addClass('loaded').attr('style', this.show);
            this.page();
        }
        this.start();
    },
};
//执行轮播图滚动
slideObj.init();
//上一页点击事件
$('#J_img').on('click', 'div.ui-controls-direction a.ui-prev', function () {
    slideObj.prev();
});
//下一页点击事件
$('#J_img').on('click', 'div.ui-controls-direction a.ui-next', function () {
    slideObj.next();
});
