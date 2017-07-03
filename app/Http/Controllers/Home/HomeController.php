<?php

namespace App\Http\Controllers\Home;

use App\Entity\ProductColor;
use App\Entity\ProductSpecItem;
use App\Entity\ProductVersionsColors;
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
        if( !$info ){
            return redirect('/');
        }
        $detail= $info->detail;
        $versions = $info->versions->toArray();
        //拿到数组第一个版本的id
        $firstVersionId = $versions[0]['id'];
        $allColor = $info->color->toArray();
//        dd($allColor);
        //将所有颜色按颜色id为键 重组数组
        foreach( $allColor as $color ){
            if( $color['ver_id'] == $firstVersionId ){
                $colorArr[]=[
                    'ver_id'=> $color['ver_id'],
                    'color_id'=>$color['color_id'],
                    'color_name'=> $color['color_name'],
                    'color_img'=>$color['color_img']
                ];
            }
        }

        return view('home.product.info', compact('p_id','info','versions','colorArr'));
    }

    /*
     * ajax 获取商品版本的颜色
     * @param $id int 商品id
     *
     */
    public function ajaxGetVersionColor($ver_id)
    {
        $color = ProductVersionsColors::where('ver_id', $ver_id)->get();
       return response()->json($color);
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
