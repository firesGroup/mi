<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Home\BaseController;
use Redis;
use Session;
use DB;

class AddCartController extends BaseController
{
    public function addCart(Request $request)
    {

//        dd(session('goods'));

        $data = $request->all();
//        dd($data);
        $p_id = $data['p_id'];

//        dd(explode(' ', $data['total']));

        $arr = explode(' ', $data['pName']);

        $sum = count($arr);
//        dd($sum);

        $price = $arr[$sum - 1];
//        dd($price);

        array_pop($arr);
        $str = implode('', $arr);
//        dd($str);

        $img = DB::table('product')->where('id', $p_id)->lists('p_index_image');

        $goods = [
            [
                'img' => $img[0],
                'pName' => $str,
                'price' => $price,
                'p_id' => $p_id,
                'num' => 1
            ]
        ];

        if (session('goods')) {
//            dd(1);
            $goods = array_merge(session('goods'), $goods);
//            dd($goods);

            session([
                'goods' => $goods
            ]);

            return session('goods');

        } else {

//            dd(2);
            session([

                'goods' => $goods

            ]);


            return session('goods');
        }

    }

    public function addCartSuccess()
    {
        return view('home.addCart.addCart');
    }

    public function searchCart()
    {
//        dd(1);
//        dd(session('goods'));
        return session('goods');

    }

}
