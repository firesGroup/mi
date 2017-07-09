<?php

/**
 * File Name: ProductController.php
 * Description: 商品管理控制器
 * Created by PhpStorm.
 * Group: FiresGroup
 * Auth: Showkw
 * Date: 2017/6/19
 * Time: 11:34
 */


namespace App\Http\Controllers\Admin;

use App\Entity\CateGory;
use App\Entity\Product;
use App\Entity\ProductAttribute;
use App\Entity\ProductAttributeValue;
use App\Entity\ProductBrand;
use App\Entity\ProductColor;
use App\Entity\ProductDetail;
use Illuminate\Http\Request;
use App\Entity\ProductImages;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ProductBrandController as Brand;
use Illuminate\Support\HtmlString;
use Storage;
use DB;


class ProductController extends Controller
{
    /**
     * 商品列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if( $request->has('search') ){
            $search = $request->search;
            $category_id = $request->category;
            $sort_price = $request->sort_price;
            $word = $request->word;
            if( $search == 'oneSelect' ){
                if( $category_id ){
                    $productList = Product::where('category_id', $category_id)->paginate(15);
                }else{
                    $productList = Product::orderBy('id', 'desc')->paginate(15);
                }
                if( $sort_price == 1 ){
                    $productList = Product::orderBy('id', 'desc')->paginate(15);
                }elseif( $sort_price == 2 ){
                    $productList = Product::orderBy('price', 'desc')->paginate(15);
                }elseif( $sort_price == 3 ){
                    $productList = Product::orderBy('price','asc')->paginate(15);
                }
                if( $word ){
                    $productList = Product::where('p_name','like',"%{$word}%")->paginate(15);
                }
            }
        }else{
            $productList = Product::orderBy('id', 'desc')->paginate(15);
        }
        $category = CateGory::all();
        return view('admin.product.index',compact('category_id','sort_price', 'word','productList', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //商品状态
        $zhStatus = ['在售','下架','预购','缺货','新品上市'];
        //颜色列表
        $colorList = ProductColor::all();
        //查询所有顶级分类列表
        $categoryList = CateGory::where('status',1)->get();
        return view('admin.product.create', compact('categoryList','zhStatus','colorList'));
    }

    /*
     * 获取选择的分类的子类 ajax
     *
     * @param $category_id 选择的分类 (也就是父id)
     *
     */

    public function getAjaxCategoryChild($category_id)
    {
        if( $category_id == 0 ){
            return 2;
        }
        $childArr = CateGory::where('parent_id',$category_id)->get()->toArray();
        if( $childArr){
            return response()->json($childArr);
        }else{
            return 1;
        }

    }

    /**
     * Store a newly created resource in storage.
     * 添加商品处理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //传递过来的分类是数组
        $category = $request->category;
        //找出最大的键名
        $key = array_keys($category, max($category));
        //那么选择的分类id为
        $cate_id = $category[$key[0]];
        $productData = [
            'category_id'      => $cate_id,
            'price'            => $request->price,
            'p_name'           => $request->p_name,
            'status'           => $request->status,
            'store'            => $request->store,
            'recommend'        => $request->recommend,
            'is_free_shipping' => $request->is_free_shipping,
            'flag'             => $request->flag,
            'tags'             => $request->tags,
        ];
        $detailData = [
            'summary'          => $request->summary,
            'description'      => $request->description,
            'remind_title'     => $request->remind_title,
        ];

        //生成商品货号
        if( !($request->p_num) ){
            $productData['p_num'] = "mi".date('mdHi',time()).mt_rand(000,999);
        }else{
            $productData['p_num'] = $request->p_num;
        }
        //接收商品封面图片
        $img = $request->p_index_image;
        //如果是远程图片就获取到本地
        $imageSrc = getUrlImages($img,'product');

        $productData['p_index_image'] = $imageSrc;
        //先写入商品表,获得商品id;
        $id = Product::insertGetId($productData);

        if ($id) {
            //将商品id 放入将要写入的各个数组中
            $detailData['p_id'] = $id;

            //开启事务处理
            $res = DB::transaction(function () use ($detailData) {
                //写入详情表
                ProductDetail::insert($detailData);
                return true;
            });
            if($res){
                $return['colors'] = Product::find($id)->p_colors;
                $return['status'] = 0;
                $return['id'] = $id;;
                return response()->json($return);
            }else{
                //如果事务失败,那么就删除之前商品表添加的商品
                Product::destroy($id);
                $return['status'] = 1;
                return response()->json($return);
            }
        }
        else {
            $return['status'] = 1;
            return response()->json($return);
        }
    }

    /**
     * 修改商品信息页面 模板
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取商品信息
        $info = Product::find($id);

        //获取商品详情
        $detail = $info->detail;

        //$description = new HtmlString($detail->description);
        //商品状态
        $zhStatus = ['在售','下架','预购','缺货','新品上市'];
        //$brand = (new Brand())->getIdAndName();

        //查询当前商品的分类的id 与 父类路径
        $id = $info->category->id;
        $path = $info->category->parent_path;

        //获取父类路径逗号个数
        $num = substr_count($path,',');
        //大于1 说明是多级分类
        if($num > 1){
            //将路径分割为数组
            $ids = explode(',',rtrim($path,','));
            //从1开始循环,因为0 为 分类的根分类 0 ,
            //父类路径中 第一个都为0;
            for( $i=1; $i< $num; $i++ ){
                //获取分类的子类
                $cid = $ids[$i];
                $category[$i] = $this->getCategoryChild($cid);
            }
            $ids[$num] = $id;
        }else{
            //$num 不大于1 说明商品的分类本身就是顶级分类
            $ids[1] = $id;
        }
        //查询顶级分类列表
        $category[0] = CateGory::where('parent_id',0)->get()->toArray();

        return view('admin.product.edit',compact('info', 'num', 'ids', 'category', 'detail','brand', 'description','zhStatus'));
    }


    /*
     *
     * 获取分类的所有子类
     *
     * @param $category_id int 分类id
     */
    public function getCategoryChild($category_id)
    {
        $childArr = CateGory::where('parent_id',$category_id)->get()->toArray();
        return $childArr;
    }


    /**
     * 处理商品信息修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $category = $request->category;
        //传递的选择分类id数组中,最大的键 的 值才是该商品的最后分类id
        //找出最大的键,
        $key = max(array_keys($category));
        //获得分类id
        $category_id = $category[$key];
        $product = [
            'category_id' => $category_id,
            'price'       => $request->price,
            'p_name'      => $request->p_name,
            'store'       => $request->store,
            'flag'        => $request->flag,
            'tags'             => $request->tags,
            'status'      => $request->status,
            'recommend'   => $request->recommend,
            'is_free_shipping' => $request->is_free_shipping,
        ];
        $detail = [
            'summary'          => $request->summary,
            'remind_title'     => $request->remind_title,
            'description'      => $request->description,
        ];
        //若商品货号不存在 则生成商品货号
        if( !($request->p_num) ){
            $productData['p_num'] = "mi".date('mdH',time()).mt_rand(000,999);
        }else{
            $productData['p_num'] = $request->p_num;
        }
        //接收商品封面图片
        $img = $request->p_index_image;;
        //如果是远程图片就获取
        $image = getUrlImages($img,'product');

        //查询数据库中封面图片
        $oldImg = Product::find($id)->p_index_image;
        if( $image ){
            if( $image !== $oldImg ){
                //分割路径
                $path = substr($oldImg, 8);
                //从磁盘删除原来的图片
                Storage::disk('uploads')->delete($path);
                $product['p_index_image'] = $image;
            }
        }
        //开启事务处理
        $res = DB::transaction(function () use ($id, $product, $detail) {
            Product::where('id', $id)->update($product);
            //查询一下是否存在详情 不存在就改为写入
            $re = ProductDetail::where('p_id', $id)->first();
            if ($re) {
                ProductDetail::where('p_id', $id)->update($detail);
            }else {
                $detail['p_id'] = $id;
                ProductDetail::create($detail);
            }
            return true;
        });

        return $res ? 0 : 1;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //查询该商品的所有图片信息
        $product  = Product::find($id);
        $detail   = $product->detail;
        $images   = $product->images();
        $version  = $product->versions();
        $colors   = $product->color();

        //获取封面图片地址
        $p_index_image = $product->p_index_image;
        //若存在则删除
        if ($p_index_image) {
            //在磁盘删除封面图片
            Storage::delete($p_index_image);
        }
        
        //获取商品相册所有图片
        //存在图片则删除
        if ($images) {
            foreach ($images as $img) {
                //从磁盘删除封面图片
                Storage::delete($img->path);
            }
        }

        $res = DB::transaction(function () use ($id, $product, $version, $colors, $images, $detail) {
            $product->delete();
            //删除版本
            if ($version) {
                $version->delete();
            }
            if ($colors) {
                $colors->delete();
            }
            if ($images) {
                $images->delete();
            }
            if ($detail) {
                $detail->delete();
            }

            return true;
        });
        //删除商品详情
        if ($res) {
            return 0;
        }
        else {
            return 1;
        }
    }

    /*
     * 获取指定商品的封面图片
     *
     */
    public function getIndexImage($img_id)
    {
        $path = Product::where('id', $img_id)->value('p_index_image');

        return $path;
    }

    /*
     *
     * 修改商品封面图片
     *
     *
     */
    public function postIndexImage(ProductRequest $request)
    {
        //判断是否post提交
        if ($request->isMethod('post')) {
            $id = $request->input('id');
            $src = $request->input('src');
            //先获取数据库中原来的图片地址
            $path = Product::find($id)->p_index_image;
            //分割路径
            $path = substr($path, 8);
            //从磁盘删除原来的图片
            $bool1 = Storage::disk('uploads')->delete($path);
            if ($bool1) {
                $id = Product::where('id', $id)->update(['p_index_image' => $src]);

                return $id? 0 : 1;
            }
            else {
                //图片删除失败
                return 2;
            }
        }
    }



    /**
     * 获取商品相册图片
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getImages($img_id)
    {
        $list = ProductImages::where('p_id', $img_id)->get();

        return $list;
    }

    /**
     * 存储商品相册图片到数据库
     *
     * @return \Illuminate\Http\Response
     */

    public function postImages(ProductRequest $request)
    {
        //判断是否post提交
        if ($request->isMethod('post')) {
            $id = $request->input('id');
            $src = $request->input('src');

//            dd($id.$src);
            //获取当前商品已上传的数量
            $count = ProductImages::where('p_id', $id)->count();
            if ($count < 6) {
                $id = DB::table('product_images')->insertGetId(['p_id' => $id, 'path' => $src]);
                if ($id) {
                    return '{"id":' . $id . ', "status":0}';
                }
            }
            else {
                return 1;
            }

        }
    }

    /**
     * 删除商品相册中图片
     *
     * 需表单传递参数:  id   int       被删除图片的id
     *               path string     被删除图片的以/uploads开头的路径
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteImages(Request $request)
    {
        //接收表单传递的id与path
        $id = $request->input('id');
        $path = $request->input('path');
        //分割路径
        $path = substr($path, 9);
        //从磁盘删除图片
        $bool1 = Storage::disk('uploads')->delete($path);
        //如果不为0 则是编辑页面相册图片删除,若为0 则是添加商品页面相册图片删除
        if ($id != 0) {
            //从数据库删除对应id的图片数据
            $bool2 = DB::table('product_images')->delete($id);
            if ($bool1 && $bool2) {
                return 0;
            }
            elseif (!$bool1) {
                return 1;
            }
            else {
                return 2;
            }
        }
        else {
            return $bool1 ? 0 : 1;
        }

    }

    /*
     *
     * 获得商品已存在的Spec规格的规格项的id 列表
     *
     * @param  int  $id 商品id
     *
     */
    public function getSpecKeyExists($id)
    {
        $specKeyArr = ProductSpecPrice::where('p_id', $id)->get()->toArray();
        //先获得所有已存在的spec_key 键
        foreach ($specKeyArr as $key => $value) {
            $spec_key[] = $value['spec_key'];
            $keyArr = explode('_', $value['spec_key']);
            for ($i = 0; $i < count($keyArr); $i++) {
                $specItemIdArr[] = intval($keyArr[$i]);
            }
            $keyArr = null;
        }
        //去除重复
        $specItemIdArr = array_unique($specItemIdArr);
        $specItemIdArr = array_values($specItemIdArr);

        return $specItemIdArr;
    }



    /*
     *
     * 商品模型规格选择AjAx
     *
     * @param  int  $id 商品id
     *
     */
    public function ajaxGetSpecInput(Request $request, $id=0)
    {
        $spec_arr = $request->spec_arr;
        //生成 笛卡尔积
        $str = $this->getSpecInput( $id, $spec_arr );
        return $str;
    }



    /**
     * 获取 规格的 笛卡尔积
     * @param $id 商品 id
     * @param $spec_arr 规格数组
     * @return string 返回表格字符串
     */
    public function getSpecInput($id, $spec_arr)
    {
        if($spec_arr == null){
            exit('');
        }
        foreach ($spec_arr as $k => $v)
        {
            $spec_arr_sort[$k] = count($v); //统计选中的规格数量
        }
        asort($spec_arr_sort);//按每个规格选中的数量排序,少的在前面

        //循环得出 以规格id为键名,选中的规格项的值 为数组值的二维数组
        foreach ($spec_arr_sort as $key =>$val)
        {
            $spec_arr2[$key] = $spec_arr[$key];
        }

        $clo_name = array_keys($spec_arr2); //排序的规格id与规格项值的数组
        $spec_arr2 = combineDika($spec_arr2); //  获取 规格的 笛卡尔积

        //获取所有规格的id与name值 转为数组
        $spec = ProductSpec::select('id','spec_name')->get()->toArray();

        //在转为 键名为规格id,值为规格name 的一维数组
        foreach( $spec as $k=>$value ){
            $spec[$value['id']] = $value['spec_name'];
            unset($spec[$k]);
        }
        //获取所有 规格项的id,规格id,规格项的值 并转为数组
        $specItem = ProductSpecItem::select('id','spec_id','spec_item')->get()->toArray();

        //循环 得出 以规格项id为键 ,规格id与规格项的值为 数组的值
        foreach( $specItem as $key=>$value ){
            $specItem[$value['id']] = ['spec_id'=>$value['spec_id'], 'spec_item'=> $value['spec_item']];
            unset($specItem[$k]);
        }

        //获取已存在的规格的价格与键名
        $keySpecPrice = ProductSpecPrice::where('p_id',$id)->select('spec_key','spec_key_name','price','store','sku')->get()->toArray();//规格项


        if( $keySpecPrice ){
            foreach( $keySpecPrice as $key=>$value ){
                $keySpecPrice[$value['spec_key']] = [
                    'price' => $value['price'],
                    'store' => $value['store'],
                    'sku' => $value['sku'],
                    'spec_key_name' => $value['spec_key_name'],
                ];
                unset($keySpecPrice[$key]);
            }
        }

        $str = "<table class='layui-table larry-table-info' id='spec_table_2'>";
        $str .="<tr>";
        // 显示table表格第一行的数据:名称行
        foreach ($clo_name as $k => $v)
        {
            $str .=" <td><b>{$spec[$v]}</b></td>"; //输出规格名称
        }
        $str .="<td><b>价格</b></td>
               <td><b>库存</b></td>
               <td><b>SKU</b></td>
             </tr>";
        // 显示第二行开始

        foreach ($spec_arr2 as $k => $v)
        {
            $str .="<tr>";
            $item_key_name = array();
            foreach($v as $k2 => $v2) //此时$v2 是规格项的id
            {
                $str .="<td>{$specItem[$v2]['spec_item']}</td>"; //输出规格项的名称
                $item_key_name[$v2] = $spec[$specItem[$v2]['spec_id']].':'.$specItem[$v2]['spec_item'];
            }
            ksort($item_key_name);
            $item_key = implode('_', array_keys($item_key_name));
            $item_name = implode(' ', $item_key_name);
            if(!array_key_exists($item_key, $keySpecPrice)){
                $keySpecPrice[$item_key]['price']=0;//价格默认为0
                $keySpecPrice[$item_key]['store']=0;//库存默认为0
                $keySpecPrice[$item_key]['sku'] = '';
            }
            $str .="<td><input name='specItem[$item_key][price]' value='".$keySpecPrice[$item_key]['price']."' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")' /></td>";
            $str .="<td><input name='specItem[$item_key][store]' value='".$keySpecPrice[$item_key]['store']."' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")'/></td>";
            $str .="<td><input name='specItem[$item_key][sku]' value='".$keySpecPrice[$item_key]['sku']."' /><input type='hidden' name='specItem[$item_key][spec_key_name]' value='$item_name' /></td>";
            $str .="</tr>";
        }
        $str .= "</table>";
        return $str;
    }

    /**
     * 根据不同模型id 返回模型下所有的规格及规格项列表
     * @param $modelId 模型
     * @return string 返回表格字符串
     */
    public function ajaxGetSpecList(Request $request,$modelId)
    {
        $specList = ProductSpec::where('model_id',$modelId)->get();
//        $id = $request->id;
//        $token = csrf_token();
        $str = '';
        foreach( $specList as $spec ){
            $str .='<tr><td>'.$spec->spec_name.'</td>';
            $str .='<td style="text-align:left!important;padding-top:15px;"><div class="layui-form-item">';
            foreach( $spec->item as $item ){
                $str .='<input type="checkbox" data-spec_id="'.$spec->id.'" data-item_id="'.$item->id.'"  title="'.$item->spec_item.'">';
            }
            $str .='</div></td></tr>';
        }
        return $str;
    }

    /*
     *
     * 商品模型 属性 AjAx返回输入项
     *
     * @param  int  $id 商品id
     *
     */
    public function ajaxGetAttrInput($modelId)
    {
        $attrList = ProductAttribute::where('model_id',$modelId)->get();
        $str = '';
        foreach( $attrList as $attr ){
            $str .= '<tr><td>'.$attr->attr_name.'</td>';
            $str .= '<td style="text-align:left!important;padding-top:15px;"><div class="layui-form-item">';
            if( $attr->attr_input_type == 0 ){
                $str.='<input type="text" class="layui-input" name="attrValue['.$attr->id.']" data-attr_name="'.$attr->attr_name.'"  value="">';
            }elseif( $attr->attr_input_type == 1 ){
                 $str .='<select name="attrValue['.$attr->id.']" data-attr_name="'.$attr->attr_name.'"><option value="">请选择</option>';
                 //统计逗号格式
                $num = substr_count($attr->attr_values, ',');
                if( $num > 0 ){
                    $attrValuesArr = explode(',',$attr->attr_values);
                    foreach( $attrValuesArr as $key=>$value ){
                        $str .='<option value="'.($key+1).'">'.$value.'</option>';
                    }
                }else{
                    $str .='<option value="1">'.$attr->attr_values.'</option>';
                }
                $str .='</select>';
            }
            $str .= '</div></td></tr>';
        }
        return $str;
    }

    /*
     *
     * 商品信息修改页--模型修改信息 处理
     *
     * @param  int  $id 商品id
     *
     */
    public function editModelInfo(Request $request, $id)
    {
        $model_id = $request->model;
        $specItem = $request->specItem;
        $attrValue = $request->attrValue;
        //重组specItem数组
        if( $specItem ){
            foreach( $specItem as $key=>$value ){
                $specData[] = [
                    'p_id' => $id,
                    'spec_key' => $key,
                    'spec_key_name' => $value['spec_key_name'],
                    'price' => $value['price'],
                    'store' => $value['store'],
                    'sku' => $value['sku'],
                ];
            }
        }
        if( $attrValue ){
            foreach( $attrValue as $key=>$value  ){
                $attrData[] = [
                    'p_id' => $id,
                    'attr_id' => $key,
                    'attr_value' => $value
                ];
            }
        }
        //开启事务处理
        $res = DB::transaction(function() use($id,$specData, $attrData){
            //在添加之前,先删除之前所有的
            ProductSpecPrice::where('p_id', $id)->delete();
            ProductAttributeValue::where('p_id', $id)->delete();
            //在添加
            ProductSpecPrice::insert($specData);
            ProductAttributeValue::insert($attrData);
            return true;
        });
        return $res?0:1;
    }
}
