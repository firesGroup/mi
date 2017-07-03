/**
 * Created by wim on 2017/6/28.
 */

function load(o){
    var imgSrc = o.getAttribute('data-src');
    o.src=imgSrc;
    o.width=o.width||200;
    o.height=o.height||100;
    if( o.width > 200  ){
        o.width=200;
    }else{
        o.width = o.width;
    }
    if( o.height > 100 ){
        o.height=100;
    }else{
        o.height = o.height;
    }
}
layui.use(['jquery'],function(){
    var $ = layui.jquery;
    var baseUrl = location.origin;
    $('img').each(function(){
        var t = $(this),imgSrc = t.attr('src');
        //先显示加载中
        t.attr('data-src',imgSrc);
        t.attr('src',baseUrl + "/images/home/b_pic_error.png");
        t.attr('onload','load(this)');
    });
});