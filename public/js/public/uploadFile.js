/*
* 文件上传
* auth  showkw
*
* param  url   文件上传处理地址
* param  token  防csrf令牌
* param  dir    文件上传保存目录名(相对于/public/uploads/下的目录)
* param rtUri   上传成功后后台需要后续处理的操作 uri
* param rtParams   需要传递的参数 json格式
* param  rtMethod   后续处理请求方式 GET/POST/PUT/DELETE
*
*
*
* 使用方法
* 引入js文件 与 show.css
*
* HTML:
*
* 添加一个div  id为:upload-div-1   因为可能存在一个页面多个上传所以这里的1可以变
* <div id="upload-div-1"></div>
*
* <script>
*   uploadFile( url, token, dir, rtUri, rtParams, rtMethod  );  //传入相应参数调用,ok
* </script>
*/

function uploadFile ( url, token, dir, rtUri, rtParams, rtMethod ) {
    layui.use(['jquery','layer','form', 'upload','layedit','element'], function () {
        var form = layui.form()
            ,$ = layui.jquery
            ,layer = layui.layer;

        var  src;

        //上传按钮
        $('div[id^=upload-div]').on('click', 'div#uploadFile' , function(){
            var th = $(this),
                id = th.attr('id'),
                str;

            str = '<div class="upload-alert-box"><input type="file" name="file" class="layui-upload-file" id="up" lay-title="点击此处或拖拽文件至此处"></div>';

            //显示弹窗
            var op = layer.open({
                type: 1,
                skin: 'layui-layer-molv', //样式类名
                closeBtn: 1, //显示关闭按钮
                anim: 3,//动画类型
                shade: 0.5,//遮罩透明
                area: ['500px', '245px'],//设置弹窗区域宽高
                shadeClose: true, //开启遮罩关闭
                title:"文件上传",
                content: str
            });

            //执行上传
            layui.upload({
                elem: '#up', //文件input上传域 id
                method: 'post', //文件上传传输方式
                url: url,
                before: function(input){
                    //上传前回调
                    $('input#up').parent().append('<input type="hidden" name="_token" value="' + token + '"><input type="hidden" name="path" value="' + dir + '">');
                    l = layer.msg('正在上传 请稍后...', {icon: 6});
                }
                ,success: function(res){
                    console.log(res);
                  if( res.status == 0 ){
                      layer.close(l);
                      layer.msg('上传成功,图片路径:'+ res.src , {icon: 6, time:2000});
                      layer.close(op);

                      var src = res.src;
                      rtParams.src = src;
                      rtParams._token = token;
                      $.ajax({
                          url: rtUri,
                          type: rtMethod,
                          data: rtParams,
                          success:function(res){
                              console.log(res);
                          }
                      });
                  }
                }
            });

        });
    });
}