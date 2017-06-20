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
*/

function uploadFile ( url, token, dir, rtUri, rtParams, rtMethod ) {
    layui.use(['jquery','layer','form', 'upload','layedit','element'], function () {
        var form = layui.form()
            ,$ = layui.jquery
            ,layer = layui.layer;

        var  src;

        //上传按钮
        $('div#p-images-list').on('click', 'div#uploadFile' , function(){
            var th = $(this),
                id = th.attr('id'),
                str;

            str = '<div class="form-body"><div class="layui-input-block"><input type="file" name="file" class="layui-upload-file" id="up"></div></div>';

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