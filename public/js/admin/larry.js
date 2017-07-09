var navtab;
layui.config({
   base:'/js/admin/lib/' //layui自定义layui组件目录
}).extend({
	larry:'larry',
	navtab:'navtab',
	elemnts:'elements',
	common: 'common',
	global: 'global'
});
layui.use(['elements','jquery','layer','larry','navtab','form','common','global'],function(){
	var $ = layui.jquery,
	    layer = layui.layer,
	    device = layui.device(),
	    elements = layui.elements(),
	    larry = layui.larry(),
	    form = layui.form(),
        global=layui.global,
	    common = layui.common,
      navtab = layui.navtab({
           elem: '#larry-tab'
      });
	    
    // 页面禁止双击选中
    $('body').bind("selectstart", function() {return false;});

    $(document).ready(function(){
		// 浏览器兼容检查
		if (device.ie && device.ie < 9) {
			layer.alert('最低支持ie9，您当前使用的是古老的 IE' + device.ie + '！');
		}
		// 001界面初始化
		AdminInit();
		//绑定导航数据
		$.ajaxSettings.async = false;
		$.getJSON('/admin/menu/getMenu', {
			position: 'top'
		}, function(result) {
			larry.set({
				elem: '#menu',
				data: result,
				cached: false
			});
			larry.render();
		});

		var $menu = $('#menu');
		$menu.find('li.layui-nav-item').each(function() {
			var $that = $(this);
			//绑定一级导航的点击事件
			$that.on('click', function() {
				var id = $that.data('pid');
				$.ajaxSettings.async = false;
				$.getJSON('/admin/menu/getMenu', {
					pid: id,
                    position: 'left'
				}, function(result) {
					larry.set({
						elem: '#larrySideNav',
						data: result,
						spreadOne: true
					});
					larry.render();
                    //监听左侧导航点击事件
					larry.on('click(side)', function(data){
                navtab.tabAdd(data.field);
					});
				});
			});

		});
		// 左侧导航点击事件			
		$menu.find('li[data-pid=1]').click();
		$("#larrySideNav").find("li").eq(0).addClass('layui-this');
        $.ajaxSettings.async = true;

        
    }); 

    $('#larry-tab').bind("contextmenu", function () { return false; });
    
    // 常用操作
	$('#buttonRCtrl').find('dd').each(function() {
		$(this).on('click', function() {
			var eName = $(this).children('a').attr('data-eName');
			navtab.tabCtrl(eName);
		});
	});
    // 窗口自适应    
    $(window).on('resize', function() {
        AdminInit();
        // iframe窗口自适应
        var $content = $('#larry-tab .layui-tab-content');
        $content.height($(this).height() - 153);
        $content.find('iframe').each(function () {
            $(this).height($content.height());
        });
    }).resize();
    
    // 刷新iframe
    $("#refresh_iframe").click(function(){
       $(".layui-tab-content .layui-tab-item").each(function(){
          if($(this).hasClass('layui-show')){
             $(this).children('iframe')[0].contentWindow.location.reload(true);
          }
       });
    });
   
	function AdminInit(){
		$('.layui-layout-admin').height($(window).height());
		$('body').height($(window).height());
		$('#larry-body').width($('.layui-layout-admin').width() - $('#larry-side').width());
		$('#larry-footer').width($('.layui-layout-admin').width() - $('#larry-side').width());
	}

    //清除缓存
    $('#clearCached').on('click', function () {
        larry.cleanCached();
        $.ajax({
            url:'/admin/cancle',
            type:'get',
            success:function(status){
                if( status == 0 ){
                    layer.alert('缓存文件清除完成!本地存储数据也清理成功！', { icon: 1, title: '系统提示' }, function () {
                        location.reload();//刷新
                    });
                }else{
                    layer.alert('缓存文件清除失败!本地存储数据也清理成功！', { icon: 3, title: '系统提示' }, function () {
                        location.reload();//刷新
                    });
                }
            }
        });
    });

    // 设置主题
    var fScreen = localStorage.getItem("fullscreen_info");
    var themeName = localStorage.getItem('themeName');
	if (themeName) {
		$("body").attr("class", "");
		$("body").addClass("larryTheme-" + themeName);
	}
	if(fScreen && fScreen != 'false'){
		var fScreenIndex = layer.alert('按ESC退出全屏',{
            title:'进入全屏提示信息',
            skin: 'layui-layer-lan',
            closeBtn: 0,
            anim: 4 ,
            offset: '100px'
		},function(){
            entryFullScreen();
            $('#FullScreen').html('<i class="larry-icon larry-quanping"></i>退出全屏');
            layer.close(fScreenIndex);
		});
	}
    $('#larryTheme').on('click',function(){
        var fScreen = localStorage.getItem('fullscreen_info');
        var themeName  = localStorage.getItem('themeName');
        layer.open({
               type: 1,
			   title: false,
			   closeBtn: true,
			   shadeClose: false,
			   shade: 0.35,
			   area: ['450px', '300px'],
			   isOutAnim: true,
			   resize:false,
			   anim: Math.ceil(Math.random() * 6),
			   content: $('#LarryThemeSet').html(),
			   success: function(layero,index){
			   	   if(fScreen && fScreen != 'false'){
			   	   	   $("input[lay-filter='fullscreen']").attr("checked", "checked");
			   	   }
			   	   if(themeName){
			   	   	   $("#themeName option[value='"+themeName+"']").attr("selected","selected");
			   	   }
			   	   form.render();
			   }
        });
       
        // 全屏开启
        form.on('switch(fullscreen)',function(data){
            var fValue = data.elem.checked;
            localStorage.setItem('fullscreen_info',fValue); //fullscreen_info:fValue

        });
        // 主题设置
        form.on('select(larryTheme)',function(data){
            var themeValue = data.value;
            localStorage.setItem('themeName',themeValue);//themeName:themeValue
            if(themeName){
            	$("body").attr("class", "");
            	$("body").addClass("larryTheme-" + themeName);
            }
            form.render('select');
        });
        
        // form.on('submit(submitlocal)',function(data){
        	
        // })
    });
   
   
   // 全屏切换
   $('#FullScreen').bind('click',function(){
       var fullscreenElement =
            document.fullscreenElement ||
            document.mozFullScreenElement ||
            document.webkitFullscreenElement;
        if (fullscreenElement == null) {
            entryFullScreen();
            $(this).html('<i class="larry-icon larry-quanping"></i>退出全屏');
        } else {
            exitFullScreen();
             $(this).html('<i class="larry-icon larry-quanping"></i>全屏');
        }
   });

   // 进入全屏：
   function entryFullScreen(){
   	   var docE = document.documentElement;
   	   if(docE.requestFullScreen){
   	   	  docE.requestFullScreen();
   	   }else if(docE.mozRequestFullScreen){
   	   	  docE.mozRequestFullScreen();
   	   }else if(docE.webkitRequestFullScreen){
   	   	  docE.webkitRequestFullScreen();
   	   }
   }

   // 退出全屏
	function exitFullScreen() {
		var docE = document;
		if (docE.exitFullscreen) {
			docE.exitFullscreen();
		} else if (docE.mozCancelFullScreen) {
			docE.mozCancelFullScreen();
		} else if (docE.webkitCancelFullScreen) {
			docE.webkitCancelFullScreen();
		}
	}

    // 顶部左侧导航控制开关
	$('#toggle').click(function() {
		  var sideWidth = $('#larry-side').width();
		  var bodyW = $('#larry-body').width();
		  if(sideWidth === 200){
               bodyW += 203;
			   $('#larry-body').animate({
			   	  left: '0',
			   	  width: bodyW
			   });
			   $('#larry-footer').animate({
			   	  left: '0',
			   	  width: bodyW
			   });
			   $('#larry-side').animate({
			   	  width: '0'
			   });
		  }else{
		  	   bodyW -=203;
			   $('#larry-body').animate({
			   	  left: '203px',
			   	  width: bodyW
			   });
               $('#larry-footer').animate({
                  left: '203px',
                  width: bodyW
               });
               $('#larry-side').animate({
                  width: '200px'
               });
		  }
	});
	// 锁屏控制
    $('#lock').mouseover(function(){
   	   layer.tips('请按Alt+L快速锁屏！', '#lock', {
             tips: [1, '#FF5722'],
             time: 2000
       });
    });
    // 快捷键锁屏设置
    $(document).keydown(function(e){
         if(e.altKey && e.which == 76){
         	 lockSystem();
         }
    });
    checkLockStatus('0');
    // 锁定屏幕
   function lockSystem(){
   		
   	   var url = '/backstage/datas/lock.php';
   	   $.post(
   	   	   url,
   	   	   function(data){
   	   	   if(data=='1'){
   	   	   	  checkLockStatus(1);
   	   	   }else{
              layer.alert('锁屏失败，请稍后再试！');
   	   	   }
   	   });
   	   startTimer();
   }
   //解锁屏幕
   function unlockSystem(){
        // 与后台交互代码已移除，根据需求定义或删除此功能
        
   	    checkLockStatus(0);
    }
   // 点击锁屏
   $('#lock').click(function(){
   	    lockSystem();
   });
   // 解锁进入系统
   $('#unlock').click(function(){
        unlockSystem();
   });
   // 监控lock_password 键盘事件
   $('#lock_password').keypress(function(e){
        var key = e.which;
        if (key == 13) {
            unlockSystem();
        }
    });

    function startTimer(){
   	    var today=new Date();
        var h=today.getHours();
        var m=today.getMinutes();
        var s=today.getSeconds();
        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        $('#time').html(h+":"+m+":"+s);
        t=setTimeout(function(){startTimer()},500);
   }
   // 锁屏状态检测
   function checkLockStatus(locked){
        // 锁屏
        if(locked == 1){
        	$('.lock-screen').show();
            $('#locker').show();
            $('#layui_layout').hide();
            $('#lock_password').val('');
        }else{
        	$('.lock-screen').hide();
            $('#locker').hide();
            $('#layui_layout').show();
        }
    }

   


	$('#dianzhan').click(function(event) {
		layer.open({
			type: 1,
			title: false,
			closeBtn: true,
			shadeClose: false,
			shade: 0.15,
			area: ['505px', '288px'],
			content: '<img src="images/dianzhan.jpg"/>'
		})
	});

	// 登出系统
	$('#logout').on('click',function(){
		var url ='/admin/logout';
		common.logOut('退出登陆提示！','你真的确定要退出系统吗？',url);
	})
     // 左侧导航菜单控制
	// $('#larrySideNav').on('click', function() {
	// 	if($('#larrySideNav .layui-this').length>0){
     //    $('.sys-public-menu .layui-nav li').removeClass('layui-this');
	// 	}
	// });
	// $('.sys-public-menu .layui-nav li').on('click',function(){
     //    $('#larrySideNav .layui-this').removeClass('layui-this');
	// });

    $('i#closeInfo').on('click', function(){
        $(this).parent().parent().remove();
    });


	//禁止全局回车键提交表单功能
	$('form').each(function(event){
		$(this).on('keydown',function(){
			if( event.keyCode == 13 ){
				return false;
			}
		});
	});

	//刷新按钮
    $('button#refresh').on('click', function(){
        layer.msg('正在加载!请稍后...', {
            icon: 16
        });
        location.href=location.href;
    });

})