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
                }
             }
         })

 }
