<?php


namespace App\Http\Controllers\Home;

use App\Entity\CateGory;
use App\Entity\Product;
use App\Entity\SlideShow;
use App\Entity\ProductVersions;
use App\Entity\ProductVersionsColors;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use App\Http\Controllers\Home\BaseController;
use DB;


class HomeController extends BaseController
{

    public function index()
    {
        $slide = $this->SlideShow();
        $recommended = Product::orderBy('click_num', 'desc')->limit(10)->get();

        $Elecarray = array(98, 14, 36, 42 ,48, 4, 14,11);

        $homeElec = DB::table('product')->whereIn('category_id', $Elecarray)->get();
//        dd($homeElec);
        $television = DB::table('product')->where('category_id', 37)->limit(8)->get();
//        dd($television);

        $smartaraay = array(97, 29, 45,99, 37,98);
        $smart =DB::table('product')->whereIn('category_id', $smartaraay)->get();
//        dd($smart);

        $aroundaraay = array(75, 76, 20, 11, 14, 27, 92, 76, 94, 6, 5, 3);
        $around =DB::table('product')->whereIn('category_id', $aroundaraay)->get();
//        dd($around);
        $recommen = Product::orderBy('click_num')->limit(10)->get();

        $accessArray = array(5, 6, 96, 14);
        return view('home.index',compact('nav','slide', 'recommended', 'homeElec', 'television', 'smart', 'around', 'recommen'));
    }
  
    /*
     *
     * 获得头部横排导航商品数据
     *
     * return $arr  关联数组
     *
     */
    public static function headerNav()
    {
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

    /*
     *
     * 获得首页纵向分类导航商品数据
     *
     * return $arr  关联数组
     *
     */

    public static function headerNavPort()
    {
        //头部纵向分类导航
        //手机分类
        //获取所有的手机分类id 然后查询数据
        $mobileIds = CateGory::where('parent_path','like',"%1,%")->lists('id')->toArray();
        $navPort['mobile'] = self::getPortNavSql($mobileIds);
        // 笔记本电脑分类
        $navPort['computer'] = self::getPortNavSql([14,42,48]);
        //电视及盒子
        $navPort['dianshi'] = self::getPortNavSql([33,36,37,]);
        //智能硬件
        //获取智能硬件下所有分类id
        $zhinengIds = CateGory::where('parent_path','like',"%50,%")->lists('id')->toArray();
        $navPort['zhineng'] = self::getPortNavSql($zhinengIds);
        //获取移动电源插线版下所有分类id
        $dianyuanIds = CateGory::where('parent_path','like',"%65,%")->lists('id')->toArray();
        $navPort['dianyuan'] = self::getPortNavSql($dianyuanIds);
        //耳机音箱
        $yinxiangIds = CateGory::where('parent_path','like',"%7,%")->lists('id')->toArray();
        $navPort['yinxiang'] = self::getPortNavSql($yinxiangIds);
        //保护套贴膜
        $tiemoIds = CateGory::where('parent_path','like',"%81,%")->lists('id')->toArray();
        $navPort['tiemo'] = self::getPortNavSql($tiemoIds);
        //线材支架存储卡
        $xiancaiIds = CateGory::where('parent_path','like',"%46,%")->lists('id')->toArray();
        $navPort['xiancai'] = self::getPortNavSql($xiancaiIds);
        //箱包服饰
        $fushiIds = CateGory::where('parent_path','like',"%83,%")->lists('id')->toArray();
        $navPort['fushi'] = self::getPortNavSql($fushiIds);
        //生活周边
        $zhoubianIds = CateGory::where('parent_path','like',"%86,%")->lists('id')->toArray();
        $navPort['zhoubian'] = self::getPortNavSql($zhoubianIds);
        return $navPort;
    }

    public static function getNavSql($category_id, $num)
    {
        if( is_array($category_id) ){
            $sql = Product::whereIn('category_id',$category_id)->where('recommend',0)->where('status',0)->orderBy('id','desc')->limit($num)->get();
        }else{
            $sql = Product::where('category_id',$category_id)->where('recommend',0)->where('status',0)->orderBy('id','desc')->limit($num)->get();
        }
        return $sql;
    }

    public static function getPortNavSql($category_id)
    {
        if( is_array($category_id) ){
            $sql = Product::whereIn('category_id',$category_id)->where('status',0)->orderBy('id','desc')->limit(24)->get();
        }else{
            $sql = Product::where('category_id',$category_id)->where('status',0)->orderBy('id','desc')->limit(24)->get();
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

    /*
     *
     * 获得首页轮播图数据
     *
     */

    public function slideShow()
    {
        $slide = SlideShow::where('status',0)->get();
        return  $slide;
    }


    /*
     * 获取商品默认版本
     *
     */
    public function getVersion($p_id)
    {
        $res = ProductVersions::where('p_id',$p_id)->lists('id')->toArray();
        if( $res ){
            return $res[0];
        }else{
            return 0;
        }
    }
}