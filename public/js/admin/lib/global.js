/**
 * Created by showkw on 2017/6/24.
 *
 * 公共js函数库
 * 使用都是在layui下
 */
layui.define(['jquery','layer'],function(exports){
    var $ = layui.jquery,
        layer = layui.layer;

    var globalobj = {
        /**
         *
         * 后台列表页添加按钮
         * @param element [string] a按钮选择器
         * @param url  [string] 请求地址
         * @param event  [事件]  默认为 click
         *
         */
        aAdd:function(element, url, event){
            var th = $(element);
            var event = event||'click';
            th.on(event, function(){
                layer.msg('正在加载!请稍后...', {
                    icon: 16
                });
                location.href=url;
            });
        },
        /**
         *  后台列表页删除按钮弹窗
         *
         * @param element  [string] a按钮选择器
         * @param title   [string]  弹窗标题
         * @param tipText [string]  弹窗提示文字
         * @param token  [string] token
         * @param url  [string]  删除请求地址
         *
         */
        aDelete: function(element,title,tipText,token, url,event){
            var th = $(element);
            var event = event||'click';
            $('table').on(event, element, function(){
                var t = $(this);
                layer.confirm(tipText, {
                    btn: ['确定','取消'] //按钮
                    ,btnAlign: 'c'
                    ,shade: 0.8
                    ,id: 'MI_delTips' //设定一个id，防止重复弹出
                    ,moveType: 1 //拖拽模式，0或者1
                    ,resize: false
                    ,title: title
                    ,anim: Math.ceil(Math.random() * 6)
                }, function(){
                        var l = layer.msg('正在删除!请稍后...', {
                            icon: 16
                        });
                        var id = t.data('id');
                        $.ajax({
                            url: url + id
                            , type: "POST"
                            , data: {'_method': 'DELETE', '_token': token}
                            , success: function (data) {
                                if (data != '') {
                                    layer.close(l);
                                    if (data == 0) {
                                        layer.msg('删除成功', {
                                            icon: 1, time: 2000, yes: function () {
                                                location.href = location.href;
                                            }
                                        });
                                    } else if (data == 1) {
                                        layer.alert('删除失败!', {icon: 2});
                                    } else {
                                        layer.alert('删除错误!', {icon: 2});
                                    }
                                } else {
                                    layer.alert('服务器错误!', {icon: 2});
                                }
                            }
                        });
                }, function(Index){
                    layer.close(Index);
                });
            });
        }
    };

    //输出接口
    exports('global', globalobj);
});