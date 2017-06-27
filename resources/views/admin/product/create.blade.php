<?php
/**
 * File Name: create.blade.php
 * Description: 添加商品页面模板
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/27
 * Time: 9:32
 */
?>
@extends('layouts.iframe')

@section('title','添加商品信息')

@section('css')
    @parent
    <meta name="_token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <section class="larry-grid">
        <div class="larry-personal">
            <header class="larry-personal-tit">
                <span>商品管理-添加商品</span>
            </header>
            <div class="row" id="infoSwitch">
                <blockquote class="layui-elem-quote col-md-12 head-con">
                    <div class="title">
                        <i class="larry-icon larry-caozuo"></i>
                        <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                    </div>
                    <ul>
                        <li>请务必正确填写商品信息</li>
                        <li>商品相册最多只能上传5张图片</li>
                    </ul>
                    <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
                </blockquote>
            </div>
            <div class="larry-personal-body clearfix">
                <form class="layui-form" method="post" id="addProduct">
                    <div class="layui-tab"  lay-filter="tab">
                        <ul class="layui-tab-title">
                            <li class="layui-this">商品信息</li>
                            <li  id="p-images">商品相册</li>
                            <li>商品模型</li>
                        </ul>
                        <div class="layui-tab-content">
                            <!-- 商品信息 -->
                            <div class="layui-tab-item layui-show" style="padding-top:20px">
                                <div class="form-body">
                                        {{ csrf_field() }}
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品名称</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="p_name" lay-verify="required" placeholder="请输入商品名称" autocomplete="off" class="layui-input" value="{{ old('p_name') }}">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品简介</label>
                                            <div class="layui-input-block">
                                                <textarea type="text" name="summary" lay-verify="required" placeholder="请输入商品简介" autocomplete="off" class="layui-input">{{ old('summary') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">活动提醒</label>
                                            <div class="layui-input-block">
                                                <textarea type="text" name="remind_title"  placeholder="请输入位于商品简介前活动提醒" autocomplete="off" class="layui-input">{{ old('remind_title') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品分类</label>
                                            <div class="layui-input-block">
                                                <div class="layui-input-inline">
                                                    <select >
                                                        <option value="">请选择商品分类</option>
                                                        <option value="你的工号">江西省</option>
                                                        <option value="你最喜欢的老师">福建省</option>
                                                    </select>
                                                </div>
                                                <div class="layui-input-inline">
                                                    <select >
                                                        <option value="">请选择商品分类</option>
                                                        <option value="杭州">杭州</option>
                                                        <option value="宁波" disabled="">宁波</option>
                                                        <option value="温州">温州</option>
                                                        <option value="温州">台州</option>
                                                        <option value="温州">绍兴</option>
                                                    </select>
                                                </div>
                                                <div class="layui-input-inline">
                                                    <select >
                                                        <option value="">请选择商品分类</option>
                                                        <option value="西湖区">西湖区</option>
                                                        <option value="余杭区">余杭区</option>
                                                        <option value="拱墅区">临安市</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品品牌</label>
                                            <div class="layui-input-block">
                                                <select name="brand_id" lay-verify="required">
                                                    <option value="">请选择品牌</option>
                                                    @foreach( $brand as $b )
                                                            <option value="{{ $b->id  }}">{{ $b->brand_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品价格</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="price" lay-verify="required" placeholder="请输入商品价格" autocomplete="off" class="layui-input" value="{{ old('price') }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">市场价格</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="market_price" lay-verify="required" placeholder="请输入市场价格" autocomplete="off" class="layui-input" value="{{ old('market_price') }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品总库存</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="store" lay-verify="required" placeholder="请输入商品总库存量" autocomplete="off" class="layui-input" value="{{ old('store') }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品单位</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="unit" lay-verify="required" placeholder="请输入商品单位(默认:件)" autocomplete="off" class="layui-input" value="{{ old('unit')  }}">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品重量</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="weight" lay-verify="required" placeholder="请输入商品重量(单位:kg)" autocomplete="off" class="layui-input" value="{{ old('weight')  }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">是否包邮</label>
                                            <div class="layui-input-block">
                                                <input type="radio" name="is_free_shipping" value="0" title="包邮">
                                                <input type="radio" name="is_free_shipping" value="1" checked title="不包邮">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">是否推荐</label>
                                            <div class="layui-input-block">
                                                    <input type="radio" name="recommend" value="0" title="推荐">
                                                    <input type="radio" name="recommend" value="1" checked title="不推荐">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品状态</label>
                                            <div class="layui-input-block">
                                                <select name="status">
                                                    @for( $i=0;$i<5;$i++ )
                                                        <option value="{{$i}}">{{ $zhStatus[$i]}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品关键字</label>
                                            <div class="layui-input-block">
                                                <input type="text" name="tags" lay-verify="required" placeholder="请输入商品关键字" autocomplete="off" class="layui-input" value="{{ old('tags')  }}">
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品封面</label>
                                            <div class="layui-input-block">
                                                <input id="upload-input" type="text" class="layui-input layui-input-inline" name="p_index_image" value="" style="width:520px;height:38px;margin:0px" placeholder="输入图片地址或点击上传">
                                                <div id="brand_logo">
                                                    <input type="file" name="file" id="indexImagesUpload" class="layui-upload-file" accept="image/*"  lay-ext="jpg|png|gif|bmp" lay-title="点击或拖拽文传上传">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="layui-form-item">
                                            <label class="layui-form-label">商品详情</label>
                                            <div class="layui-input-block">
                                                <!-- 加载uefitor编辑器的容器 -->
                                                <script id="ueditor" name="description" type="text/plain"></script>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- 商品相册 -->
                            <div class="layui-tab-item">
                                <div class="p-images-list-box clearfix" id="upload-div-1">
                                    <div class="images-list"><ul></ul></div>
                                    <div id="p-images-upload" style="">
                                        <input type="file" name="file" id="imagesUpload" accept="image/*"  lay-ext="jpg|png|gif|bmp" lay-title=" ">
                                    </div>
                                    <div id="p-images-hidden"></div>
                                </div>
                            </div>
                            <!-- 商品模型 -->
                            <div class="layui-tab-item">
                                <div class="form-body">
                                    <div class="layui-form">
                                            <div class="layui-form-item">
                                                <label class="layui-form-label">商品模型</label>
                                                <div class="layui-input-block">
                                                    <select name="model"  lay-filter="modelSelect">
                                                        <option value="">请选择商品模型</option>
                                                        @foreach( $modelList as $model )
                                                                <option value="{{ $model->id  }}">{{ $model->model_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="layui-form-item">
                                                <table class="layui-table larry-table-info" id="spec_table_1">
                                                    <colgroup>
                                                        <col width="100">
                                                        <col>
                                                    </colgroup>
                                                    <thead>
                                                    <tr>
                                                        <th>规格名称</th>
                                                        <th>规格项</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                                <div id="spec_table">
                                                </div>
                                            </div>
                                            <div class="layui-form-item" >
                                                <table class="layui-table larry-table-info" id="attr_table">
                                                    <colgroup>
                                                        <col width="200">
                                                        <col>
                                                    </colgroup>
                                                    <thead>
                                                    <tr>
                                                        <th>属性名称</th>
                                                        <th>属性值</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <center>
                                <button class="layui-btn" lay-submit="" lay-filter="createProduct">立即提交</button>
                                <a class="layui-btn" id="back">返回列表</a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    @parent
    <!--上传文件插件-->
    <script type="text/javascript" src="{{ asset('/js/public/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/public/uploadFile.js') }}"></script>
    <!--富文本编辑器插件-->
    <script type="text/javascript" src="{!!asset('/plugin/ueditor/ueditor.config.js')!!}"></script>
    <script type="text/javascript" src="{!!asset('/plugin/ueditor/ueditor.all.min.js')!!}"></script>
    {{-- 载入语言文件,根据laravel的语言设置自动载入 --}}
    <script type="text/javascript" src="{!!asset($UeditorLangFile)!!}"></script>
    <script type="text/javascript">
        //富文本编辑器
        var ue = UE.getEditor('ueditor');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
            ue.sync('addProduct');//设置编辑器内容同步到from的id
        });
    </script>
    <script>
        layui.use(['jquery','layer','form', 'upload','element','global'], function () {
            var form = layui.form()
                , $ = layui.jquery
                , layedit = layui.layedit
                , global= layui.global
                , element = layui.element()
                , layer = layui.layer;
            var token = $('meta[name=_token]').attr('content');
            var rootUrl = '{{ url('/') }}';

            //页面加载时一些处理
            $('div#edui1').css('width', 'auto').css('z-index', '2');
            $('div#edui1_iframeholder').css('width', 'auto');

            global.aAdd('a#back','{{ url('/admin/product') }}');


            //表单提交监听
            form.on('submit(createProduct)', function(data){
                    $.ajax({
                        url: '{{ url('/admin/product') }}',
                        type: 'post',
                        data: data.field,
                        success: function(res){
                            if( res == 0 ){
                                layer.msg('添加商品成功',{
                                    icon: 6,
                                    time: 1000 //1秒关闭（如果不配置，默认是3秒）
                                }, function(index){
                                    location.href='{{ url('/admin/product') }}';
                                    layer.close(index);
                                });
                            }else if( res == 1 ){
                                layer.msg('添加商品失败',{
                                    icon: 6,
                                    time: 1000 //1秒关闭（如果不配置，默认是3秒）
                                });
                            }else{
                                layer.msg('添加商品失败!未知错误',{
                                    icon: 6,
                                    time: 1000 //1秒关闭（如果不配置，默认是3秒）
                                });
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

            //监听上传商品封面图片
            layui.upload({
                elem: '#indexImagesUpload', //文件input上传域 id
                method: 'post', //文件上传传输方式
                url: '{{ url('/upload') }}', //后台处理程序地址
                before: function (input) {
                    //上传前回调
                    //定义存储路径与token
                    $('input#indexImagesUpload').parent().append('<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="path" value="temp">');
                    l = layer.msg('正在上传 请稍后...', {icon: 6});
                }
                , success: function (res) {
                    if (res.status == 0) {
                        layer.close(l);
                        layer.msg('上传成功',{
                            icon: 6,
                            time: 1000 //1秒关闭（如果不配置，默认是3秒）
                        });
                        $('input[name=p_index_image]').val(res.src);
                    }else if( res == 1 ){
                        layer.close(l);
                        layer.msg('上传失败', {'time': 2000});
                    }
                }
            });

            //监听上传商品相册图片
            layui.upload({
                elem: '#imagesUpload', //文件input上传域 id
                method: 'post', //文件上传传输方式
                url: '{{ url('/upload') }}', //后台处理程序地址
                before: function (input) {
                    //上传前回调
                    //定义存储路径与token
                    $('input#imagesUpload').parent().append('<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="path" value="temp">');
                    l = layer.msg('正在上传 请稍后...', {icon: 6});
                }
                , success: function (res) {
                    if (res.status == 0) {
                        layer.close(l);
                        layer.msg('上传成功',{
                            icon: 6,
                            time: 1000 //1秒关闭（如果不配置，默认是3秒）
                        });
                        $('div.images-list ul').append('<li><img src="'+ res.src +'"><span class="del layui-btn">删除</span></li>');
                        $('div#p-images-hidden').append('<input type="hidden" name="p_images[]" value="'+res.src+'">');
                        checkImagesNum();
                    }else if( res == 1 ){
                        layer.close(l);
                        layer.msg('上传失败', {'time': 2000});
                    }
                }
            });

            //删除相册图片
            $('div#upload-div-1').on( 'click', 'span.del', function(){
                var index = layer.load(),
                    t = $(this).parent('li');
                    img = $( this ).siblings('img'),
                    path = img.attr('src');
                $.ajax({
                    url: "{{ url('/admin/product') }}/images/0",
                    type: 'DELETE',
                    data: {'id': 0, 'path': path , '_token': token },
                    success: function(res){
                        layer.close(index);
                        if( res == 0 ){
                            layer.msg('删除成功!',{ icon:6,time:1000 });
                            t.remove();
                            $('div#p-images-hidden input').each( function(){
                                if( $(this).val() == path ){
                                    $(this).remove();
                                }
                            } );
                            checkImagesNum();
                        }else if( res == 1 ){
                            layer.msg('磁盘文件删除失败!',{ icon:2,time:1000 });
                        }else{
                            layer.msg('未知错误!删除失败!',{ icon:2,time:1000 });
                        }
                    }
                });
            });

            //检查商品相册图片数量
            function checkImagesNum(){
                var num = $('div.images-list ul li').length;
                if( num >= 5 ){
                    $('div#p-images-upload').css('display','none');
                }else{
                    $('div#p-images-upload').show();
                }
            }


            //用户选择模型  根据选择不同模型id,返回不同的表格
            form.on('select(modelSelect)', function(data){
                var modelId = data.value;
                if( modelId ){
                    $("div#spec_table").html('');
                }
                //返回规格项
                $.ajax({
                    url: '{{ url('/admin/product/ajaxGetSpecList') }}/' + modelId,
                    type: 'get',
                    success: function(data){
                        $('#spec_table_1 tbody').html('');
                        $('#spec_table_1 tbody').append(data);
                        form.render();
                    }
                });
                //返回属性项
                $.ajax({
                    url: '{{ url('/admin/product/ajaxGetAttrInput') }}/' + modelId,
                    type: 'get',
                    success: function(data){
                        if( data == '' ){
                            var str = '<tr><td colspan="2" style="font-size:14px;">该模型还没有属性项!&nbsp;<a href="{{ url('/admin/product/attr/create') }}" class="layui-btn layui-btn-small" >立即添加</a></td></tr>';
                            $('table#attr_table tbody').html(str);
                        }else{
                            $('table#attr_table tbody').html('');
                            $('table#attr_table tbody').append(data);
                        }
                        form.render();//刷新渲染
                    }
                });
            });
            $('#spec_table_1').on('click', 'div.layui-unselect', function(){
                if( $(this).hasClass('layui-form-checked') ){
                    $(this).prev('input[type=checkbox]').attr('checked','true');
                }else{
                    $(this).prev('input[type=checkbox]').removeAttr('checked');
                }
                ajaxGetSpecInput();
            } );

            /**
             *  点击商品规格触发 下面输入框显示
             *  @param id  商品id;
             */
            function ajaxGetSpecInput()
            {
                var spec_arr = {};// 用户选择的规格数组
                // 选中了哪些规格项
                $("#spec_table_1 input[type=checkbox]:checked").each(function(){
                    var spec_id = $(this).data('spec_id');
                    var item_id = $(this).data('item_id');
                    if(!spec_arr.hasOwnProperty(spec_id))
                        spec_arr[spec_id] = [];
                    spec_arr[spec_id].push(item_id);
                });

                ajaxGetSpecInput2(spec_arr); // 显示下面的输入框
            }

            /**
             * 根据用户选择的不同规格选项
             * 返回 不同的输入框选项
             */
            function ajaxGetSpecInput2(spec_arr)
            {
                $.ajax({
                    type:'POST',
                    data:{'spec_arr':spec_arr,'_token': '{{ csrf_token() }}' },
                    url:'{{ url('/admin/product/ajaxGetSpecInput/') }}',
                    success:function(data){
                        $("div#spec_table").html('');
                        $("div#spec_table").append(data);

                        mergeTableTr();  // 合并单元格
                        form.render();//刷新渲染
                    }
                });
            }

            //合并相同单元格
            function mergeTableTr()
            {
                var tab = $('#spec_table_2');
                var trs = $('#spec_table_2 tbody tr'); //获取行数
                var maxCol = 2,val, count, start; //合并单元格作用到多少列
                if( tab){
                    for( var col = maxCol-1; col >= 0; col-- ){
                        count = 1;
                        val = '';
                        for(var i = 0; i < trs.length; i++){
                            if( val == trs.eq(i).children('td').eq(col).html() ){
                                count++;
                            }else{
                                if( count > 1 ){
                                    start = i - count;
                                    trs.eq(start).children('td').eq(col).attr('rowspan',count);
                                    for (var j = start + 1; j < i; j++) {
                                        trs.eq(j).children('td').eq(col).css('display','none');
                                    }
                                    count = 1;
                                }
                                val = trs.eq(i).children('td').eq(col).html();
                            }
                        }
                        if (count > 1) { //合并，最后几行相同的情况下
                            start = i - count;
                            trs.eq(start).children('td').eq(col).attr('rowspan',count);
                            for (var j = start + 1; j < i; j++) {
                                trs.eq(j).children('td').eq(col).css('display','none');
                            }
                        }
                    }
                }
            }

        });
    </script>
@endsection
