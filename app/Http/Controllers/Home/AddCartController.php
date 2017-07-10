<?php

namespace App\Http\Controllers\Home;

use App\Entity\OrderDetail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Home\BaseController;
use Redis;
use Session;
use DB;
use App\Entity\Order;;

class AddCartController extends BaseController
{
    public function addCart(Request $request)
    {
        $data = $request->all();
//        dd($data);
        $p_id = $data['p_id'];

        $ver_id = $data['ver_id'];

        $price = $data['Price'];

        $pName = $data['pName'];

        $img = DB::table('product')->where('id', $p_id)->lists('p_index_image');
//        dd(session('goods'));

        $goods = [
            [
                'p_id' => $p_id,
                'ver_id' => $ver_id,
                'ver_id-p_id' => $ver_id . '-' . $p_id,
                'img' => $img[0],
                'pName' => $pName,
                'price' => $price,
                'num' => 1
            ]
        ];

//        dd(session('goods'));
        if (session('goods') != null) {

            for ($i = 0; $i < count(session('goods')); $i++) {

                if (session('goods')[$i]['ver_id-p_id'] == $ver_id . '-' . $p_id) {

                    $sum = "";
                    $sum = 1 + (session('goods')[$i]['num']);
                    $goods[$i]['num'] = $sum;

//                        dd($goods);
                    if ($request->session()->put('goods', $goods)) {

                        return 0;

                    } else {

                        return 1;

                    }

                } else {

                    $goods = array_merge(session('goods'), $goods);

                    if (session(['goods' => $goods])) {

                        return 0;
                    } else {
                        return 1;
                    }

                }
            }

        } else {

            if (session(['goods' => $goods])) {
                return 0;
            } else {
                return 1;
            }

        }


    }


    public function addCartSuccess($p_id, $ver_id)
    {
//        dump($p_id);
//        dump($ver_id);
//        dd(session('goods'));

        for ($i = 0; $i < count(session('goods')); $i++) {

            if (in_array($ver_id . '-' . $p_id, session('goods')[$i])) {
//                dd(session('goods')[$i]['pName']);

                $pName = session('goods')[$i]['pName'];
//                    dd($pName);
                return view('home.addCart.addCart', compact('pName'));
            }
        }

    }

    public function searchCart()
    {
//        dd(session('goods'));
        return session('goods');

    }

    public function delSession(Request $request)
    {

        $i = intval($request->all()['i']);
//    dd($i);
        $request->session()->forget("goods." . $i);
//        dd(session('goods'));
        $goods = array_values(session('goods'));

        session(['goods' => $goods]);
//    dd(session('goods'));

        if (session('goods')[0]) {

            return session('goods');

        } else {

            dd(session('goods'));

        }

    }

    public function delGoods(Request $request, $id)
    {
//        dd($id);
        $request->session()->forget("goods." . $id);
//        session('goods',array_values(session('goods')));
        $goods = array_values(session('goods'));
//        dd($goods);
        session(['goods' => $goods]);
//    dd(session('goods'));

        if (session('goods')[0]) {

            return session('goods');

        } else {

            dd(session('goods'));

        }

    }

    public function goBalance(Request $request)
    {

        $data = $request->all();

//        dd($data['goodsId']);
        $Num = 0;
        $total = 0;
        foreach ($data['goodsId'] as $k => $v) {

//            dd($v);

//                return session('goods')[$k];
            $Num += session('goods')[$v]['num'];
            $total += session('goods')[$v]['price']*session('goods')[$v]['num'];
            $array[$k] =
                [

                    'img' => session('goods')[$v]['img'],
                    'p_id' => session('goods')[$v]['p_id'],
                    'ver_id' => session('goods')[$v]['ver_id'],
                    'pName' => session('goods')[$v]['pName'],
                    'price' => session('goods')[$v]['price'],
                    'num' => session('goods')[$v]['num'],

                ];

        }

        session([
            'goBlance' => $array,
            'Num' => $Num,
            'total' => $total
        ]);

        return 1;
    }

    public function toPay(Request $request)
    {
//        dump(session('goods'));
//        dump(session('goBlance'));
//        $request->session()->forget('goBlance');

        $member_id = session('user_deta')['id'];
//        dd($member_id);
        $name = $request->all()['name'];
        $phone = $request->all()['phone'];
        $address = $request->all()['address'];
        $order_sn = mt_rand(1000, 9999);
        $total = session('total');
//        $add_time = date('Y-m-d H:i:s');
        $order_status = 0;
//        dd($add_time);

        $array = ['member_id' => $member_id, 'buy_user' => $name, 'buy_phone'=>$phone, 'order_sn'=>$order_sn, 'address' => $address, 'total'=>$total, 'order_status' => $order_status];

            $id = DB::table('order')->insertGetId($array);
//            dd($id);

            for($i=0;$i<count(session('goBlance'));$i++){

                $p_id = session('goBlance')[$i]['p_id'];

                $pName = DB::table('product')->where('id', $p_id)->select('p_name')->get()[0];
//            dd($pName);
                $p_name = $pName->p_name;

                $p_price = session('goBlance')[$i]['price'];
                $buy_num = session('goBlance')[$i]['num'];

                $arr = ['order_id'=>$id, 'p_id'=>$p_id, 'p_name'=>$p_name, 'p_price'=>$p_price, 'buy_num'=>$buy_num];
//            dump($arr);

                OrderDetail::create($arr);

            }
            $request->session()->forget('goBlance');

            $request->session()->forget('goods');

            $ord_sn = DB::table('order')->where('id', $id)->select('order_sn')->get()[0];
            $orderSn = $ord_sn->order_sn;
            return $orderSn;

    }


}
