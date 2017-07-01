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
                <div class="layui-tab-item layui-show" style="padding-top:20px">
                    <div class="form-body">
                        <form class="layui-form" method="post" id="productDetail">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
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
                                <label class="layui-form-label">活动提醒</label>
                                <div class="layui-input-block">
                                    <textarea type="text" name="remind_title" lay-verify="required" placeholder="请输入位于商品简介前的活动提醒" autocomplete="off" class="layui-input">{{ $detail->remind_title }}</textarea>
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
                                <label class="layui-form-label">商品价格</label>
                                <div class="layui-input-block">
                                    <input type="text" name="price" lay-verify="required" placeholder="请输入商品价格" autocomplete="off" class="layui-input" value="{{ $info->price }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">商品货号</label>
                                <div class="layui-input-block">
                                    <input type="text" name="p_num"  placeholder="为空将自动生成" autocomplete="off" class="layui-input" value="{{ $info->p_num }}">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">商品总库存</label>
                                <div class="layui-input-block">
                                    <input type="text" name="store" lay-verify="required" placeholder="请输入商品总库存量" autocomplete="off" class="layui-input" value="{{ $info->store }}" onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">商品成交量</label>
                                <div class="layui-input-block">
                                    <div class="layui-input">{{ $info->sell_num }}<font style="color:#e2e2e2">(无法修改)</font></div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">商品点击量</label>
                                <div class="layui-input-block">
                                    <div class="layui-input">{{ $info->click_num }}<font style="color:#e2e2e2">(无法修改)</font></div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">是否包邮</label>
                                <div class="layui-input-block">
                                    @if( $detail->is_free_shipping == 0 )
                                        <input type="radio" name="is_free_shipping" value="0" checked title="包邮">
                                        <input type="radio" name="is_free_shipping" value="1" title="不包邮">
                                    @elseif( $detail->is_free_shipping == 1 )
                                        <input type="radio" name="is_free_shipping" value="0" title="包邮">
                                        <input type="radio" name="is_free_shipping" value="1" checked title="不包邮">
                                    @endif
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">是否推荐</label>
                                <div class="layui-input-block">
                                    @if( $info->recommend == 0 )
                                    <input type="radio" name="recommend" value="0" checked title="推荐">
                                    <input type="radio" name="recommend" value="1" title="不推荐">
                                    @elseif( $info->recommend == 1 )
                                    <input type="radio" name="recommend" value="0" title="推荐">
                                    <input type="radio" name="recommend" value="1" checked title="不推荐">
                                    @endif
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">商品状态</label>
                                <div class="layui-input-block">
                                    <select name="status">
                                        @for( $i=0;$i<5;$i++ )
                                            @if( $i == $info->status  )
                                                <option value="{{$info->status}}" selected>{{ $zhStatus[$i]}}</option>
                                            @else
                                                <option value="{{$i}}">{{ $zhStatus[$i]}}</option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">商品关键字</label>
                                <div class="layui-input-block">
                                    <input type="text" name="tags" lay-verify="required" placeholder="请输入商品关键字" autocomplete="off" class="layui-input" value="{{ $detail->tags }}">
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
                                    <!-- 加载uefitor编辑器的容器 -->
                                    <script id="ueditor" name="description" type="text/plain">{{ $description }}</script>
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
            ue.sync('productDetail');//设置编辑器内容同步到from的id
        });
    </script>
    <script>
    layui.use(['jquery','layer','form', 'upload','element'], function () {
        var form = layui.form()
            ,$ = layui.jquery
            ,layedit = layui.layedit
            ,element = layui.element()
            ,layer = layui.layer;
        var token = $('meta[name=_token]').attr('content');
        var id = {{ $info->id }};
        var rootUrl = '{{ url('/') }}';
        //页面加载时一些处理
        $('div#edui1').css('width','auto').css('z-index','2');
        $('div#edui1_iframeholder').css('width','auto');

        $('select[name=status] option').each(function(){
            if( $(this).val() == {{ $info->status }} ){
                $(this).attr('selected','true');
            }
        });

        //加载已存在的规格项id
        loadAjaxSpecItem();
        function loadAjaxSpecItem()
        {
            $.ajax({
                url: '{{ url('/admin/product/getSpecKeyExists/'.$info->id) }}',
                type: 'get',
                success: function(data){
                    $('div.layui-form-item input[type=checkbox]').each(function(){
                        var itemId = $(this).data('item_id');
                        var bool =  $.inArray(itemId, data);
                        if( bool >= 0 ){
                            $(this).attr('checked','true');
                            $(this).next('div.layui-unselect').addClass('layui-form-checked');
                            form.render();
                        }
                    });
                    ajaxGetSpecInput();
                }
            });
        }


        //序列化表单值 用于判断是否被修改过
        var loadFormData = $('form#productDetail').serialize();
        //表单提交监听
        form.on('submit(editInfo)', function(data){
            var submitFormData = $('form#productDetail').serialize();
            if( submitFormData == loadFormData ){
                layer.msg('您什么都没修改呀!', {'icon':3, 'time':2000,anim: Math.ceil(Math.random() * 6)});
            }else{
                var index = layer.msg('正在修改信息!请稍后...', {
                    icon: 16
                });
                $.ajax({
                    url:'{{ url('/admin/product').'/'.$info->id }}',
                    type: 'put',
                    data: data.field,
                    success: function(res){
                        if( res == 0 ){
                            layer.msg('修改成功!', {'icon':6, 'time':1000,end:function(){
                                layer.close(index);
                                location.href = location.href;
                            }});
                        }else if( res == 1 ){
                            layer.msg('修改失败!', {'icon':2, 'time':3000, end:function(){
                                layer.close(index);
                                location.href = location.href;
                            }});
                        }
                    }
                });
            }
            return false;
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

        //封面图片修改
        $( '#uploadImage' ).on('click', function(){
            openUpload(id,'{{ $info->p_name }}', 'product',"@admin@product@indexImage@"+ id, function(){
                $.ajax({
                    url: "{{ url('/admin/product/indexImage/'.$info->id) }}",
                    type:"get",
                    success:function(data){
                        $('input#upload-input').val(data);
                    }
                });
            });
        });

        //相册图片上传
        $('div#upload-div-1').on('click', '#uploadFile',function(){
            if( $('div.images-list li').length < 5 ){
                openUpload( id ,'{{ $info->p_name }}' ,'product', '@admin@product@images@' + id)
            }else{
                layer.alert('最多上传5张图片!',{title:'提示',icon:2});
            }
        });

        //相册图片删除
        $('div#upload-div-1').on( 'click', 'span.del', function(){
             var index = layer.load(),
                 img = $( this ).siblings('img'),
                 iid = img.attr('data-id'),
                 path = img.attr('src');
             $.ajax({
                 url: "{{ url('/admin/product') }}/images/" + iid,
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
            // 选中了哪些属性
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
                url:'{{ url('/admin/product/ajaxGetSpecInput/'.$info->id) }}',
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


        form.on('submit(editSpecInfo)', function(data){
//            layer.alert(JSON.stringify(data.field));
            $.ajax({
                url:'{{ url('/admin/product/editModelInfo/'.$info->id) }}',
                type: 'POST',
                data: data.field,
                success:function(res){
                    if( res == 0 ){
                        layer.msg('修改成功!',{time:2000, icon:6});
                        location.href="{{ url('/admin/product') }}";
                    }else if( res == 1 ){
                        layer.msg('修改失败!',{time:3000, icon:2});
                    }else{
                        layer.msg('服务器错误!',{time:3000, icon:2});
                    }
                }
            });
            return false;
        });
    });
</script>
@endsection