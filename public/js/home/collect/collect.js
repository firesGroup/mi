var token = $('meta[name=_token]').attr('content');
function collect(product_id) {

         $.ajax({
             url:"collect",
             type:'post',
             data:{'_token':token, 'product_id':product_id},
             success:function(data) {
                switch(parseInt(data)){
                    case 0:
                        layer.msg('收藏商品成功', {time:2000});
                        break;
                    case 1:
                        layer.msg('商品已收藏', {time:2000});
                        break;
                    case 2:
                        layer
                }
             }
         })
    }

function collect_delete(collect_id){
    layui.use('layer', function () {
       var layer = layui.layer;

        $.ajax({
            url:'collect_delete',
            type:'post',
            data:{'_token':token, 'id':collect_id},
            success:function(data) {
                if(data == 0){
                    layer.msg('删除成功', {time:2000, icon:6});
                    location.reload();
                }else if(data == 1)
                {
                    layer.msg('删除失败 请稍后再试', {time:2000, icon:2});
                }
            }
        })
    });

}
