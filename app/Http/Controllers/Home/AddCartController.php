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

        $ver_id = $data['ver_id'];

        $price = $data['Price'];

        $pName = $data['pName'];

        $img = DB::table('product')->where('id', $p_id)->lists('p_index_image');

        $goods = [
            [
                'ver_id' => $ver_id,
                'img' => $img[0],
                'pName' => $pName,
                'price' => $price,
                'p_id' => $p_id,
                'num' => 1
            ]
        ];

        if (session('goods')) {

            for ($i = 0; $i < count(session('goods')); $i++) {
                if (session('goods')[$i]['ver_id'] == null) {

                    if (session('goods')[$i]['p_id'] == $p_id) {
                        $sum = "";
                        $sum = 1 + (session('goods')[$i]['num']);
                        $goods[$i]['num'] = $sum;

//                        dd($goods);
                        $request->session()->put('goods', $goods);

//                        dd(session('goods'));

                        return session('goods');
                    } else {
                        $goods = array_merge(session('goods'), $goods);
                        session([
                            'goods' => $goods
                        ]);
                        return session('goods');
                    }

                } else {

                    if (session('goods')[$i]['ver_id'] == $ver_id) {

                        $sum = "";
                        $sum = 1 + (session('goods')[$i]['num']);
                        $goods[$i]['num'] = $sum;
                        $request->session()->put('goods', $goods);
                        return session('goods');

                    } else {
                        $goods = array_merge(session('goods'), $goods);
                        session([
                            'goods' => $goods
                        ]);
                        return session('goods');
                    }

                }
            }

        } else {

            session([

                'goods' => $goods

            ]);


            return session('goods');
        }

    }

    public function addCartSuccess($p_id, $ver_id = 0)
    {
//        dd($p_id);
//        dd($ver_id);
//        dd(session('goods'));

        if ($ver_id === 'undefined') {
            for ($i = 0; $i < count(session('goods')); $i++) {

                if (in_array($p_id, session('goods')[$i])) {
//                dd(session('goods')[$i]['pName']);

                    $pName = session('goods')[$i]['pName'];
//                    dd($pName);
                    return view('home.addCart.addCart', compact('pName'));
                }
            }
        } else {
            for ($i = 0; $i < count(session('goods')); $i++) {

                if (in_array($ver_id, session('goods')[$i])) {
//                dd(session('goods')[$i]['pName']);

                    $pName = session('goods')[$i]['pName'];
//                    dd($pName);
                    return view('home.addCart.addCart', compact('pName'));
                }
            }
        }


    }

    public function searchCart()
    {
//        dd(1);
//        dd(session('goods'));
        return session('goods');

    }

    public function delSession(Request $request)
    {

        $i = $request->all()['i'];

        $request->session()->pull('goods', $i);

        dd(session('goods'));
        return session('goods');

    }


}
