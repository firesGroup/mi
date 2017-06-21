<?php
/**
 * File Name: edit.blade.php
 * Description:
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/20
 * Time: 0:18
 */
?>
<?php
/**
 * File Name: index.blade.php
 * Description: 商品列表页模版
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/19
 * Time: 16:09
 */
?>
@extends('layouts.iframe')

@section('title','修改商品信息')

@section('css')
    @parent
    <meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('content')
{{--    {{var_dump($detail)}}--}}
    <section class="larry-grid">
    <div class="larry-personal">
        <header class="larry-personal-tit">
            <span>商品管理-修改信息</span>
        </header>
        <div class="row" id="infoSwitch">
            <blockquote class="layui-elem-quote col-md-12 head-con">
                <div class="title">
                    <i class="larry-icon larry-caozuo"></i>
                    <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                </div>
                <ul>
                    <li>请务必正确填写商品信息</li>
                </ul>
                <i class="larry-icon larry-guanbi close" id="closeInfo"></i>
            </blockquote>
        </div>
        <div class="larry-personal-body clearfix">
            <div class="layui-tab"  lay-filter="tab">
                <ul class="layui-tab-title">
                    <li class="layui-this">商品信息</li>
                    <li  id="p-images">商品相册</li>
                    <li>商品模型</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show" style="padding-top:20px">
                        <div class="form-body">
                            <form class="layui-form" method="post">
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品名称</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="p_name" lay-verify="required" placeholder="请输入商品名称" autocomplete="off" class="layui-input" value="{{ $info->p_name }}">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品简介</label>
                                    <div class="layui-input-block">
                                        <textarea type="text" name="summary" lay-verify="required" placeholder="请输入商品简介" autocomplete="off" class="layui-input">{{ $detail->summary }}</textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品分类</label>
                                    <div class="layui-input-block">
                                        <div class="layui-input-inline">
                                            <select >
                                                <option value="">请选择分类</option>
                                                <option value="你的工号">江西省</option>
                                                <option value="你最喜欢的老师">福建省</option>
                                            </select>
                                        </div>
                                        <div class="layui-input-inline">
                                            <select >
                                                <option value="">请选择分类</option>
                                                <option value="杭州">杭州</option>
                                                <option value="宁波" disabled="">宁波</option>
                                                <option value="温州">温州</option>
                                                <option value="温州">台州</option>
                                                <option value="温州">绍兴</option>
                                            </select>
                                        </div>
                                        <div class="layui-input-inline">
                                            <select >
                                                <option value="">请选择分类</option>
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
                                        <select lay-filter="brand">
                                            <option value=""></option>
                                            <option value="0">写作</option>
                                            <option value="1" selected="">阅读</option>
                                            <option value="2">游戏</option>
                                            <option value="3">音乐</option>
                                            <option value="4">旅行</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品价格</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="price" lay-verify="required" placeholder="请输入商品价格" autocomplete="off" class="layui-input" value="{{ $info->price }}">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">市场价格</label>
                                    <div class="layui-input-block">
                                        <input type="text" name="market_price" lay-verify="required" placeholder="请输入市场价格" autocomplete="off" class="layui-input" value="{{ $info->market_price }}">
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品封面</label>
                                    <div class="layui-input-block">
                                            <input id="upload-input" type="text" class="layui-input layui-input-inline" name="p_index_image" value="{{ $detail->p_index_image }}" style="width:520px;height:38px;margin:0px" placeholder="输入图片地址或点击上传">
                                            <span class="layui-btn" id="uploadImage"><i class="layui-icon"></i>上传商品封面图片</span>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">商品详情</label>
                                    <div class="layui-input-block">
                                        <textarea class="layui-textarea" id="editor" style="display: none" name="description">{{ $detail->description }}</textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <div class="layui-input-block">
                                        <button class="layui-btn" lay-submit="" lay-filter="editInfo">立即提交</button>
                                        <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="layui-tab-item">
                        <div class="p-images-list-box clearfix" id="upload-div-1">
                        </div>
                    </div>
                    <div class="layui-tab-item">内容3</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    @parent
    <!--上传文件插件-->
    <script type="text/javascript" src="{{ asset('/js/public/jquery-1.12.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/public/uploadFile.js') }}"></script>
    <script>
    layui.use(['jquery','layer','form', 'upload','layedit','element'], function () {
        var form = layui.form()
            ,$ = layui.jquery
            ,layedit = layui.layedit
            ,element = layui.element()
            ,layer = layui.layer;
        var token = $('meta[name=_token]').attr('content');


        //构建一个默认的编辑器
        var index = layedit.build('editor');
        var id = '{{ $info->id }}';
        var rootUrl = '{{ url('/') }}';

        //修改商品信息

        form.on('submit(editInfo)', function(){
            $.ajax({
                url:'{{ url('/admin/product').'/'.$info->id }}',
                type:PUT,
                data: serializeArray(),
                success: function(res){
                    console.log(res);
                }
            });
        });

        //tab切换到相册
        element.on('tab(tab)',function(){
            var i = 2;
            var th = $(this);
            if (th.attr('id') == 'p-images') {
                if( !$('div.images-list').hasClass('request') ){
                    ajaxGetImagesList('{{ $info->id }}', '{{ $info->p_name }}');
                }

            }
        } );

        $( '#uploadImage' ).on('click', function(){
            openUpload(id,'{{ $info->p_name }}', 'product',"@admin@product@"+ id +"@indexImage", function(){
                $.ajax({
                    url: "{{ url('/admin/product/'.$info->id.'/indexImage') }}",
                    type:"get",
                    success:function(data){
                        $('input#upload-input').val(data);
                    }
                });
            });
        });

        $('div#upload-div-1').on('click', '#uploadFile',function(){
            if( $('div.images-list li').length < 5 ){
                openUpload( id ,'{{ $info->p_name }}' ,'product', '@admin@product@' + id + '@images')
            }else{
                layer.alert('最多上传5张图片!',{title:'提示',icon:2});
            }
        } );

        $('div#upload-div-1').on( 'click', 'span.del', function(){
             var index = layer.load(),
                 img = $( this ).siblings('img'),
                 iid = img.attr('data-id'),
                 path = img.attr('src');
             $.ajax({
                 url: '{{ url('/admin/product') }}/' + iid + "/images",
                 type: 'DELETE',
                 data: {'id': iid, 'path': path , '_token': token },
                 success: function(res){
                     layer.close(index);
                        if( res == 0 ){
                            layer.msg('删除成功!',{ icon:6,time:1000 });
                        }else if( res == 1 ){
                            layer.msg('磁盘文件删除失败!',{ icon:2,time:1000 });
                        }else if( res == 2 ){
                            layer.msg('数据删除失败!',{ icon:2,time:1000 });
                        }else{
                            layer.msg('未知错误!删除失败!',{ icon:2,time:1000 });
                        }
                     ajaxGetImagesList('{{ $info->id }}', '{{ $info->p_name }}');
                 }
             });

        } );
        });
</script>
@endsection