/*
* 商品图片上传弹窗
* auth  showkw
*
* param  id     商品id
* param pname   商品名称
* param  path   上传文件保存目录名称(相对于/public/uploads/下的目录)
* param  url    php后台处理程序的url
* param  func   上传成功回调函数
*
* 使用方法
* 引入js文件 与 show.css
*
* HTML:
*
*   <div class="layui-box layui-upload-button" id="uploadImage">
            <span class="layui-upload-icon"><i class="layui-icon"></i>上传商品封面图片</span>
    </div>
*
*/

//商品图片上传弹窗
function openUpload(id, pName, path, url , func)
{
    layer.open({
        type: 2,
        skin: 'layui-layer-molv', //样式类名
        closeBtn: 1, //显示关闭按钮
        anim: Math.ceil(Math.random() * 6),//动画类型
        shade: 0.5,//遮罩透明
        area: ['500px', '245px'],//设置弹窗区域宽高
        shadeClose: false, //开启遮罩关闭
        resize:false,//关闭弹窗大小自由
        title: "文件上传",
        content: '/upload/'+ path + '/' + id + '/' +url,
        end: function(index, layero){
            if( !func ){
                ajaxGetImagesList(id, pName);
            }else{
                func(id);
            }
        }
    });
}



//请求图片列表
function ajaxGetImagesList(id,pName)
{
    var index = layer.msg('正在加载!请稍后...', {
            icon: 16
        });
    $.ajax({
        url: '/admin/product/images/'+ id,
        method: 'get',
        statusCode:{400:function(){
            layer.msg('资源不存在!',{ icon:2,time:1000 });
        },
            500: function(){
                layer.msg('服务器错误!',{ icon:2,time:1000 });
            }
        },
        success: function (res) {
            layer.close(index);
            var str = '<div class="images-list request"><ul>';
            for (var i = 0; i < res.length; i++) {
                str += '<li>';
                str += '<img src="'+ res[i].path + '" data-id="'+ res[i].id +'" alt="'+ pName +'">';
                str += '<span class="del layui-btn">删除</span>'
                str += '</li>';
            }
            str += '</ul></div><div class="uploadFile" id="uploadFile" style="display: none;" ><i class="layui-icon"></i> </div>';

            $('div#upload-div-1').html(str);

            if( res.length < 5 ){
                $('div#uploadFile').show();
            }
        }
    });
}
