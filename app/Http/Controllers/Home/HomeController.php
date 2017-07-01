<?php

namespace App\Http\Controllers\Home;

use App\Entity\ProductSpecItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Entity\Product;
use App\Entity\ProductSpecPrice;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    /*
     * 商品详情页
     *@param $p_id int 商品id
     */
    public function productInfo($p_id)
    {
        $info = Product::find($p_id);
        $info->detail;
        $info->detail;
        $info->images;
        $info->specPrice;
        return view('home.product.info', compact('p_id','info'));
    }

    /*
     * ajax商品信息详情
     * @param $id int 商品id
     *
     */
    public function ajaxGetInfo($p_id)
    {
        $info = Product::find($p_id);
        $info->detail;
        $info->images;
        $info->specPrice;
        $info = $info->tojson();
        dd($info);
    }

    /*
     *
     * 获得商品已存在的Spec规格的规格项的id 列表
     *
     * @param  int  $id 商品id
     *
     */
    public function AjaxGetSpecToInfo($p_id)
    {
        $specKeyArr = ProductSpecPrice::where('p_id', $p_id)->get()->toArray();
        //先获得所有已存在的spec_key 键
        foreach( $specKeyArr as $key=>$value ){
            $spec_key[] = $value['spec_key'];
            $keyArr = explode('_',$value['spec_key']);
            for( $i = 0; $i < count($keyArr); $i++ ){
                $specItemIdArr[] = intval($keyArr[$i]);
            }
            $keyArr = null;
        }
        //去除重复 得出 该商品 的 规格项id
        $specItemIdArr = array_values(array_unique($specItemIdArr));
        //获得 规格名称
        foreach( $specItemIdArr as $spec_item_id ){
            $specId= ProductSpecItem::find($spec_item_id)->spec->spec_name;

        }

    }
}
