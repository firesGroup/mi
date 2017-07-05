<?php

namespace App\Http\Controllers\Home;

use App\Entity\ProductColor;
use App\Entity\ProductDetail;
use App\Entity\ProductVersions;
use App\Entity\ProductVersionsColors;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use App\Http\Requests;
use App\Entity\Product;
use App\Entity\ProductSpecPrice;
use App\Http\Controllers\Home\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return view('home.index',compact('nav'));
    }

    public static function headerNav()
    {
        //横排导航
        //小米手机
        $nav['xiaomi'] = self::getNavSql(99,6);
        //红米手机
        $nav['hongmi'] = self::getNavSql(98,6);
        //平板笔记本
        $nav['pingban'] =self::getNavSql([48,42],6);
        //电视
        $nav['dianshi'] = self::getNavSql(37,5);
        //盒子.影音
        $nav['hezi']= self::getNavSql([33,36,17,38],6);
        //路由器
        $nav['luyou'] = self::getNavSql(3,6);
        //智能硬件
        $nav['zhineng'] = self::getNavSql([24,94],6);

        return $nav;

    }

    public static function getNavSql($category_id, $num)
    {
        if( is_array($category_id) ){
            $sql = Product::whereIn('category_id',$category_id)->where('recommend',0)->orderBy('id','desc')->limit($num)->get();
        }else{
            $sql = Product::where('category_id',$category_id)->where('recommend',0)->orderBy('id','desc')->limit($num)->get();
        }
        return $sql;
    }

    /*
     * 商品详情页
     *
     */
    public function productIndex($p_id)
    {
        $info = Product::find($p_id);
        $detail = $info->detail;
        $desc =new HtmlString(html_entity_decode($detail->description));
        $is_btn = true;//按钮是否显示
        if( $desc != '' ){
            return view('home.product.info',compact('info','detail','desc','is_btn'));
        }else{
            return redirect('/product/buy/'.$p_id);
        }
    }
    /*
     * 商品购买页
     *@param $p_id int 商品id
     */
    public function productBuy($p_id)
    {
        $info = Product::find($p_id);
        if( !$info ){
            return redirect('/');
        }
        $detail= $info->detail;
        $versions = $info->versions->toArray();
        if( $versions != null ){
            //拿到数组第一个版本的id
            $firstVersionId = $versions[0]['id'];

            //取得所有版本的图片的信息
            foreach( $versions as $ver ){
                if( $ver['ver_img'] !== null ){
                    $imgArr = json_decode($ver['ver_img']);
                }
            }
        }else{
            $versions=null;
        }
        $allColor = $info->color->toArray();
//        dd($allColor);
        //将所有颜色按颜色id为键 重组数组
        if( $allColor != null){
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
        }

        //先拿到商品封面图
        $imgIndex = $info->p_index_image;
        if( !isset($imgArr)){
            $imgArr[]=$imgIndex;
        }
        return view('home.product.buy', compact('p_id', 'imgArr','info','noversions','versions','colorArr'));
    }

    /*
     * ajax 获取商品版本的状态
     * @param $id int 商品id
     *
     */
    public function getVersionStatus($p_id)
    {
        $pro = Product::find($p_id);
        $versions = $pro->versions->toArray();
        if( $versions ){
            return $versions[0]['status'];
        }else{
            return $pro->status;
        }
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
     * ajax 获取商品版本的信息
     * @param $id int 商品id
     *
     */
    public function ajaxGetVersion($ver_id)
    {
        $info = ProductVersions::where('id', $ver_id)->get();
        return $info;
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
