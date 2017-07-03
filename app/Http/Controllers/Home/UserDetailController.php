<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Entity\Member;

class UserDetailController extends Controller
{

    public function user_detail(Request $request)
    {
        $data = session('user_detail');
//        dd($data);
        $arr = DB::table('member')->where('nick_name', '=', $data)->get();
//        dd($arr);

        $arr = $arr[0];
//        dd($arr);
        $string = $arr->email?$arr->email:'';


        $str = substr($arr->phone,3,6);
        $string = substr($string, 3, 7);
        $char = "******";
        $str = str_replace($str,$char,$arr->phone);
        $string = str_replace($string,$char,$arr->email);
//        dd($string);
        $arr->phone = $str;
        $arr->email = $string;
        return view('/home/member/index', compact('arr'));

    }
}
