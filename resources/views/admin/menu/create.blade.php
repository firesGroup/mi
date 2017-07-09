@extends('layouts.iframe')

@section('title','菜单管理首页')

@section('css')
    @parent
@endsection

@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>菜单管理</span>
            </header>
            <div class="larry-personal-body clearfix">
                <div class="form-body">
                    <form class="layui-form" method="post" id="group">
                        {{ csrf_field() }}
                        <div class="layui-form-item">
                            <label class="layui-form-label">菜单标题</label>
                            <div class="layui-input-block" style="width:80%">
                                <input type="text" name="menu_title" lay-verify="required" placeholder="请输入菜单标题" autocomplete="off" class="layui-input" value="">
                            </div>
                        </div>
                        <div class="layui-form-item" id="menu_parent">
                            <label class="layui-form-label">父级菜单</label>
                            <div class="layui-input-block">
                                <div class="layui-input-inline">
                                    <select name='parent_id[1]' id='select1' lay-verify="required"   lay-filter='select1'>
                                        <option value="">请选择父级菜单</option>
                                        <option value="0">顶极菜单</option>
                                        @foreach( $menus as $m )
                                            <option value="{{ $m['id'] }}">{{ $m['menu_title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">对应权限</label>
                            <div class="layui-input-block"  style="width:80%">
                                <select name='menu_role_id'>
                                    <option value="">请选择对应权限</option>
                                    @foreach( $roles as $role )
                                        <option value="{{ $role['id'] }}">{{ $role['role_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item" id="">
                            <label class="layui-form-label">菜单分组</label>
                            <div class="layui-input-block"style="width:80%">
                                <select name='menu_group_id' lay-verify="required">
                                    <option value="">请选择菜单分组</option>
                                    @foreach( $group as $g )
                                        <option value="{{ $g->id }}">{{ $g->menu_group_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">菜单图标</label>
                            <div class="layui-input-block" style="width:80%">
                                <input type="text" name="menu_icon" placeholder="请输入图标文字代码" autocomplete="off" class="layui-input" value="">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">菜单状态</label>
                            <div class="layui-input-block" style="width:80%">
                                <input type="radio" name="status" value="0" title="显示">
                                <input type="radio" name="status" value="1" checked title="不显示">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit="" lay-filter="addmenu">添加</button>
                                <a class="layui-btn layui-btn-primary" href="{{ url('/admin/menu') }}">返回</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    @parent
    <script>
        layui.use( ['jquery','layer','form'], function(){
            var $ = layui.jquery,
                layer = layui.layer,
                form = layui.form();

            form.on('submit(addmenu)',function(data){
                var index = layer.msg('正在添加!请稍后...', {
                    icon: 16
                });
                $.ajax({
                    url:'{{ url('admin/menu') }}',
                    type: 'POST',
                    data: data.field,
                    success:function(res){
                        layer.close(index);
                        if( res == 0 ){
                            layer.msg('添加成功', {icon:6, time:1000, end:function(){
                                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                                parent.layer.close(index);
                                location.href= '{{ url('admin/menu') }}';
                            }});
                        }else{
                            layer.msg('添加失败', {icon:2, time:2000, end:function(){
                                var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
                                parent.layer.close(index);
                                location.href= '{{ url('admin/menu/create') }}';
                            }});
                        }
                    },
                    error:function (XMLHttpRequest) {
                        var msgObj = XMLHttpRequest.responseJSON;
                        var msg = '';
                        for(var name in msgObj){//遍历对象属性名
                            msg += msgObj[name] + "<br>";
                        }
                        layer.msg(msg,{icon:2,time:3000});
                    },
                });
                return false;
            });


            setInterval(function(){
                addSelect();
            },1000);

            function addSelect()
            {
                var num = $('div#menu_parent div.layui-input-inline').size();
                for( var i=1;i <= num; i++ ){
                    formOn(i);
                }
            }

            function formOn(n)
            {
                form.on('select(select' + n + ')', function (data) {
                    if( n == 1 ){
                        $('select#select1').parent().siblings('div').remove();
                        $('select#select1').data('id',1)
                    }
                    $.ajax({
                        url: "{{url('admin/menu/getAjaxChild')}}/"+data.value
                        , type: 'get'
                        , success: function (data) {
                            if (data == 1) {
                                return false;
                            } else if(data == 2){
                                //说明选择的是顶级分类
                                //那么如果存在之前选择的子分类,就应该删掉元素
                                $('select#select1').parent().next('div').remove();
                                return false;
                            }else if( data == null ){
                                return false;
                            }else{
                                var did = $('select#select1').data('id');
                                var newDid = did+1;
                                var str = "<div class='layui-input-inline'><select " +
                                    "name='parent_id["+ newDid +"]' id='select"+newDid+"'  lay-filter='select"+newDid+"'><option value=''>请选择分类</option>";
                                for (var i = 0; i < data.length; i++) {
                                    str += "<option value='" + data[i].id +"'>" + data[i].menu_title + "</option>";
                                }
                                str += "</select></div>";
                                $('select#select'+n).parent().next('div').remove();
                                $('select#select'+n).parent().parent().append(str);
                                $('select#select1').data('id',n+1);
                                form.render();
                            }
                        },
                        typeOf: 'json'
                    })
                });
            }
        } );
    </script>
@endsection
