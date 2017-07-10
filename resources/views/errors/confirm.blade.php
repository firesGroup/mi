<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>提示消息</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugin/layui/css/layui.css') }}" media="all">
    <script type="text/javascript" src="{{ asset('/plugin/layui/layui.js') }}"></script>
</head>
<body>
<script>
    layui.use(['layer'],function(){
        var layer=layui.layer;

        layer.alert('对不起!您没有权限', {icon: 6,btnAlign:'c',btn:['返回后台首页','取消'],yes:function(){

            if(top.location!=self.location){
                top.location ="/admin";
            }
        },cancle:function(index){
            layui.close(index);
        },end:function(index){
            layui.close(index);
        }});
    });

</script>
</body>
</html>