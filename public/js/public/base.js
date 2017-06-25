/**
 * Created by showkw on 2017/6/25.
 */

function load(o){
    var imgSrc = o.getAttribute('data-src');
    o.src=imgSrc;
    o.width=o.width||165;
    o.height=o.height||65;
    if( o.width > 165  ){
        o.width=165;
    }else{
        o.width = o.width;
    }
    if( o.height > 65 ){
        o.height=65;
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
            t.attr('src',baseUrl + "/images/public/loading.gif");
            t.attr('onload','load(this)');
        });
});