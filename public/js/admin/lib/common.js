/**
 * 自定义公共基础信息提示模块
 */
layui.define(['layer'],function(exports){
    "use strict";
	var $ = layui.jquery,
	    layer = layui.layer;
       
	var CmsCommon = {
        /**
         * 抛出异常错误信息
         * @param {String} msg
         */
        cmsError: function(msg,title){
			parent.layer.alert(msg, {
				title: title,
				icon: 2,
				time: 0,
				resize: false,
				zIndex: layer.zIndex,
				anim: Math.ceil(Math.random() * 6)
			});
			return;
        },
        cmsInfo: function(msg,title){
            parent.layer.alert(msg, {
                title: title,
                icon: 6,
                time: 0,
                resize: false,
                zIndex: layer.zIndex,
                anim: Math.ceil(Math.random() * 6)
            });
            return;
        },
        cmsConfirm: function(){

        },
        //退出系统
        logOut: function (title, text, url,type, dataType, data, callback) {
            parent.layer.confirm(text, {
                title: title,
                resize: false,
                btn: ['确定退出系统', '不，我点错了！'],
                btnAlign: 'c',
                icon: 3

            }, function () {

			location.href = url;
            });
        }

	};

	exports('common',CmsCommon);
})