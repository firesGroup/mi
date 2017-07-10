/**
 * Created by showkw on 2017/6/25.
 */
//前台全局引用
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
        $('div#J_navMenu').slideDown();
        $('div#J_navMenu').html(item);
        $('div#J_navMenu ul li img').each(function(){
            var src = $(this).attr('data-url');
            $(this).attr('src', src);
        });
    }else{
        $('div#J_navMenu').slideUp('fast');
        // $('div#J_navMenu').css('display','none');
    }
    $(this).addClass('nav-item-active').siblings().removeClass('nav-item-active');
});
$('div#J_navMenu').on('mouseleave', function(){
    // $('div#J_navMenu').css('display','none');
});
$('div.site-header').on('mouseleave', function(){
    $('div#J_navMenu').slideUp('fast');
    // $('div#J_navMenu').css('display','none');
    $('ul.J_navMainList li.nav-item').each(function(){
        $(this).removeClass('nav-item-active');
    })
    $('li#J_navCategory').removeClass('nav-item-active');
});

//全部商品分类
$('ul.J_navMainList').find('li#J_navCategory').on('mouseover','a.link-category', function(){
    $(this).next('div.site-category').css('display','block');
    $(this).parent().addClass('nav-item-active').siblings().removeClass('nav-item-active');
    $(this).parent().find('a.link img.thumb').each(function(){
        var src = $(this).attr('data-url');
        $(this).attr('src',src);
    });
    $('div#J_navMenu').css('display','none');

}).on('mouseleave',function(){
    $(this).removeClass('nav-item-active');
    if(window.location.pathname !== '/'){
        $(this).children('div.site-category').css('display','none');
    }
});
$('#J_navCategory ul#J_categoryList').on('mouseover','li.category-item', function(){
    $(this).addClass('category-item-active');
}).on('mouseleave','li.category-item',function(){
    $(this).removeClass('category-item-active').siblings().removeClass('category-item-active');
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

$(document).ready(function() {
    $('#scrollTop').click(function(){
        $("html,body").animate({scrollTop:0},1000);
        return false;// 返回false可以避免在原链接后加上#
    });
    $(window).scroll(function(){
        var srollTop = $(document).scrollTop();
        if( srollTop >= 300 ){
            $('div#scrollTop').css('display','block');
        }else{
            $('div#scrollTop').css('display','none');
        }
    })
});

//顶部用户登陆成功后的下拉菜单
$('span.user').mouseenter( function(){
    // alert(123);

    $('ul.user-menu').slideDown();


    $('span.user').addClass('user-active');

});

$('span.user').mouseleave( function () {

    $('ul.user-menu').slideUp("fast");

    $('span.user').removeClass('user-active');

});

