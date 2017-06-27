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

use App\Entity\Product;
use App\Entity\ProductAttribute;
use Illuminate\Http\Request;
use App\Entity\ProductModel;
use App\Entity\ProductSpec;
use App\Entity\ProductSpecItem;
use App\Entity\ProductSpecPrice;
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
    public function index()
    {
        $productList = Product::paginate(10);
        return view('admin.product.index',compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRequest $request,$id)
    {
        //
    }

    /**
     * 修改商品信息页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Product::find($id);
        $detail = $info->detail;
        $description = new HtmlString($detail->description);
        $zhStatus = ['在售','下架','预购','缺货','新品上市'];
        $brand = (new Brand())->getIdAndName();

        //查询所有模型
        $modelList = ProductModel::all();
        return view('admin.product.edit',compact('info', 'detail','brand', 'description','zhStatus', 'modelList'));
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
        $product = [
            'category_id'          => '3',
            'brand_id'          => $request->input('brand_id'),
            'price'        => $request->input('price'),
            'market_price' => $request->input('market_price'),
            'p_name'       => $request->input('p_name'),
            'status'       => $request->input('status'),
            'recommend'    => $request->input('recommend'),
        ];
        $detail = [
            'p_index_image' => $request->input('p_index_image'),
            'summary'       => $request->input('summary'),
            'description'   => $request->input('description'),
            'remind_title'  => $request->input('remind_title'),
            'store'         => $request->input('store'),
            'unit'         => $request->input('unit')
        ];
        //开启事务处理
        $res = DB::transaction(function() use($id, $product, $detail){
            DB::table('product')->where('id',$id)->update($product);
            DB::table('product_detail')->where('p_id',$id)->update($detail);
            return true;
        });
        return $res?0:1;
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
        $product = Product::find($id);
        $detail = $product->detail;
        $images = $product->images();

        if( $detail ){
            //获取封面图片地址
            $p_index_image = $detail->p_index_image;
            //若存在则删除
            if( $p_index_image ){
                //在磁盘删除封面图片
                Storage::delete($p_index_image);
            }
            //删除商品详情表中的当前商品数据
            $detail->delete();
        }

        //获取商品相册所有图片
        //存在图片则删除
        if( $images ){
            foreach( $images as $img ){
                //从磁盘删除封面图片
                Storage::delete($img->path);
            }
            //从数据库删除
            $images->delete();
        }

        //删除商品详情
        if($product->delete()){
            return 0;
        }else{
            return 1;
        }
    }

    /*
     * 获取指定商品的封面图片
     *
     */
    public function getIndexImage($img_id)
    {
        $path = DB::table('product_detail')->where('p_id',$img_id)->value('p_index_image');
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
        if( $request->isMethod('post') ) {
            $id = $request->input('id');
            $src = $request->input('src');
            //先获取数据库中原来的图片地址
            $path = Product::find($id)->p_index_image;
            //分割路径
            $path = substr( $path, 8 );
            //从磁盘删除原来的图片
            $bool1 = Storage::disk('uploads')->delete($path);
            if( $bool1 ){
                $id = DB::table('product_detail')->where('p_id', $id)->update(['p_index_image' => $src]);
                return $id != -1?0:1;
            }else{
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
        $list = ProductImages::where('p_id',$img_id)->get();
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
        if( $request->isMethod('post') ){
            $id = $request->input('id');
            $src = $request->input('src');

//            dd($id.$src);
            //获取当前商品已上传的数量
            $count = ProductImages::where('p_id',$id)->count();
            if( $count < 6 ){
                $id = DB::table('product_images')->insertGetId(['p_id'=>$id, 'path' => $src]);
                if( $id ){
                    return '{"id":'.$id.', "status":0}';
                }
            }else{
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
    public function deleteImages(ProductRequest $request)
    {
        //接收表单传递的id与path
        $id = $request->input('id');
        $path = $request->input('path');
        //分割路径
        $path = substr( $path, 8 );
        //从磁盘删除图片
        $bool1 = Storage::disk('uploads')->delete($path);
        //从数据库删除对应id的图片数据
        $bool2 = DB::table('product_images')->delete($id);
        if( $bool1 && $bool2 ){
            return 0;
        }elseif ( !$bool1 ) {
            return 1;
        }else{
            return 2;
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
      foreach( $specKeyArr as $key=>$value ){
          $spec_key[] = $value['spec_key'];
          $keyArr = explode('_',$value['spec_key']);
          for( $i = 0; $i < count($keyArr); $i++ ){
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
    public function ajaxGetSpecInput(Request $request, $id)
    {

        $id = $id||0;
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
//        //获取已存在的规格的价格与键名
//        $keySpecGoodsPrice = ProductSpecPrice::where('p_id',$id)->select('spec_key','spec_key_name','price','store','sku')->get()->toArray();//规格项
//
//        foreach( $keySpecGoodsPrice as $key=>$value ){
//            $keySpecGoodsPrice[$value['spec_key']] = [
//                'price' => $value['price'],
//                'store' => $value['store'],
//                'sku' => $value['sku'],
//                'spec_key_name' => $value['spec_key_name'],
//            ];
//        }

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
            $str .="<td><input name='specItem[$item_key][price]' value='0' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")' /></td>";
            $str .="<td><input name='specItem[$item_key][store]' value='0' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")'/></td>";
            $str .="<td><input name='specItem[$item_key][sku]' value='' /><input type='hidden' name='specItem[$item_key][spec_key_name]' value='$item_name' /></td>";
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
        $id = $request->id;
        $token = csrf_token();
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
        $res = DB::transaction(function() use($specData, $attrData){
            DB::table('product_spec_price')->insert($specData);
            DB::table('product_attribute_value')->insert($attrData);
            return true;
        });
        return $res?0:1;
    }
}
