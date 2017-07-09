
var token = $('meta[name=_token]').attr('content');
$('a#update').on('click', function () {
   var pp =  layer.open({
        type: 1
        ,
        title: false //不显示标题栏
        ,
        closeBtn: false
        ,
        area: '600px'
        ,
        closeBtn: 1
        ,
        shade: 0.8
        ,
        id: 'LAY_layuipro' //设定一个id，防止重复弹出
        ,
        moveType: 1 //拖拽模式，0或者1
        ,
        content: '<h1 align="center">修改密码</h1>' +
        '<div class="layui-form">'+
            '<div style="width:600px;height:300px;" class="layui-form">' +
        ' <div class="layui-form-item" align="center">'+
        '<input type="password" name="oldpass" lay-verify="" autocomplete="off" placeholder="请输入旧密码" class="layui-input" style="width:300px" id="oldpass">'+
        '</div>'+
        ' <div class="layui-form-item" align="center">'+
        '<input type="password" name="email" lay-verify="" autocomplete="off" placeholder="请输入新密码" class="layui-input" style="width:300px" id="newpass">'+
        '</div>'+
        ' <div class="layui-form-item" align="center">'+
        '<input type="password" name="email" lay-verify="" autocomplete="off" placeholder="请再次输入新密码" class="layui-input" style="width:300px" id="newpass_confirmation">'+
        '</div>'+
        '<div align="center" style="margin-top:10px">'+
        '<button lay-submit class="layui-btn layui-btn-big layui-btn-normal layui-btn-warm" style="width:300px" align="center" id="update">立即修改</button>' +
        '</div>'+
        '</div>'+
        '</div>'
        ,
        success: function (layero, index) {
            $('#oldpass').blur( function () {
            that = $(this);
            var orig = that.attr('data-id');
            if(orig != that.val()){
                $.ajax({
                    url:"member_update",
                    type:'post',
                    data:{'_token':token,'data':that.val()},
                    success:function (data) {

                        if(data == 1){
                            layer.msg('旧密码输入不能为空', {time:1000, icon:2});
                        };
                        if(data == 2){
                            layer.msg('旧密码输入错误', {time:2000, icon:2});
                        };

                        that.attr('data-id', that.val());
                    }
                });
            }

            });



            $('#newpass_confirmation').blur( function () {
                var newpass = $('#newpass').val();

                var againpass = $('#newpass_confirmation').val();
                if(newpass != againpass){
                    layer.msg('两次密码不一样', {time:2000, icon:2});
                }
            });

            $('button#update').click( function () {
               var oldpass =  $('#oldpass').val();
               var newpass = $('#newpass').val();
               var newpass_confirmation = $('#newpass_confirmation').val();

                $.ajax({
                    url:'member_update',
                    type:'post',
                    data:{'_token':token, 'data': oldpass, 'newpass':newpass, 'newpass_confirmation':newpass_confirmation},
                    success:function (data) {
                        if(data == 0){
                            layer.close(pp);
                            layer.alert('修改成功', {time:1000, icon:6});
                        }

                    }
                })

            })
        }
    })

});


$('#editInfo').click( function () {
    var name = $('span#nick_name').html();
    var birthday = $('span#birthday').html();
    var sex = parseFloat($('span#sex').attr('data-id'));
    // var checked = "checked";


    var op = layer.open({
        type: 1
        ,
        title: false //不显示标题栏
        ,
        closeBtn: false
        ,
        area: '600px'
        ,
        closeBtn: 1
        ,
        shade: 0.8
        ,
        id: 'LAY_layuipro' //设定一个id，防止重复弹出
        ,
        moveType: 1 //拖拽模式，0或者1
        ,
        content: '<h1 align="center" style="font-size:40px; font-family: 落落补 时光体 jojisin">修改信息</h1>' +
        '<div class="layui-form">' +
        '<div style="width:600px;height:300px;" class="layui-form">' +
        ' <div class="layui-form-item" align="center">' +
        '<input type="text" name="oldpass" lay-verify="" autocomplete="off" value="'+name+'" class="layui-input" style="width:300px" id="newname">' +
        '</div>' +
        ' <div class="layui-form-item" align="center" >' +
        '<input class="layui-input" name="birthday" placeholder="自定义日期格式" id="date" onclick="layui.laydate({elem: this, festival: true, istime: false,})" value="'+birthday+'" lay-verify="required"  style="width:300px">'+
        '</div>' +
        '<div style="text-align: center">'+
        '<input class="radio" type="radio" name="sex" value=1 '+((sex==1)?"checked":"")+' title="男" lay-filter="radio">'+
        '<input class="radio" type="radio" name="sex" value=2 '+((sex==2)?"checked":"")+' title="女" lay-filter="radio">'+
        '<input class="radio" type="radio" name="sex" value=0 '+((sex==0)?"checked":"")+' title="保密" lay-filter="radio">'+
        '</div>'+
        '<div align="center" style="margin-top:10px">' +
        '<button lay-submit class="layui-btn layui-btn-big layui-btn-normal layui-btn-warm" style="width:300px" align="center" id="update">立即修改</button>' +
        '</div>' +
        '</div>' +
        '</div>'
        , success: function () {
            layui.use(['form','upload', 'laydate'],function() {
                var form = layui.form();
                var laydate = layui.laydate;
                form.render();

                $('#update').click(function () {

                    var nick_name = $('#newname').val();
                    var birthday = $('input[name=birthday]').val();
                    var sex = $('input[name=sex]:checked').val();

                      $.ajax({
                          url:"personal_update",
                          type:'post',
                          data:{'_token':token, 'nick_name':nick_name, 'birthday':birthday, 'sex':sex, 'name':name},
                          success:function (msg) {

                              if(msg == 1){
                                  layer.msg('用户名已存在', {time:2000, icon:2} );
                                  return false;
                              }
                              var data = $.parseJSON(msg);
                              console.log(data);
                              $('#nick_name').html(data.nick_name);

                              var arr =  [];
                              arr = new Array('保密', '男', '女');

                              var int = data.sex;

                              $('#sex').html(arr[int]);
                              $('#birthday').html(data.birthday);
                              layer.msg('修改成功', {time:1000, icon:6});
                              layer.close(op);
                              top.location.reload();



                          }

                    });


                });
            });

        }
    });

});

