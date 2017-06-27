<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Entity\Product;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    /*
     * 商品详情页
     * @param $id int 商品id
     *
     */
    public function productInfo($p_id)
    {
        $info = Product::find($p_id);
        $detail = $info->detail;
        $images = $info->images;
        $specPrice = $info->specPrice;
        $attr = $info->attr;
        return view('home.product.info',compact('info','detail','images','specPrice','attr'));
    }
}
